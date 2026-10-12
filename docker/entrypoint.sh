#!/bin/bash
set -e

# Sesuaikan port Apache dengan environment variable PORT dari Render (Render default: 10000)
PORT="${PORT:-80}"
sed -i "s/Listen 80/Listen ${PORT}/g" /etc/apache2/ports.conf
sed -i "s/<VirtualHost \*:80>/<VirtualHost \*:${PORT}>/g" /etc/apache2/sites-available/000-default.conf

# Hapus symlink storage lama (jika terbawa dari Windows) dan buat ulang symlink Linux yang valid
rm -rf public/storage
php artisan storage:link || true

# Pastikan permission folder storage dan cache
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache || true
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache || true

# Clear cache untuk memastikan konfigurasi baru terbaca
php artisan config:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Jalankan migrasi database jika DB sudah terhubung
if [ -n "$DB_HOST" ] || [ -n "$DATABASE_URL" ]; then
    echo "Menjalankan migrasi database..."
    php artisan migrate --force || true
fi

# Jalankan Apache web server
exec apache2-foreground