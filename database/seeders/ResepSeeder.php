<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Resep;
use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Database\Seeder;

class ResepSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Kategori
        $kategoriSarapan = Kategori::firstOrCreate(['slug' => 'sarapan'], ['nama' => 'Sarapan']);
        $kategoriUtama   = Kategori::firstOrCreate(['slug' => 'makanan-utama'], ['nama' => 'Makanan Utama']);
        $kategoriCamilan = Kategori::firstOrCreate(['slug' => 'camilan'], ['nama' => 'Camilan']);
        $kategoriMinuman = Kategori::firstOrCreate(['slug' => 'minuman'], ['nama' => 'Minuman']);
        $kategoriDessert = Kategori::firstOrCreate(['slug' => 'dessert'], ['nama' => 'Dessert']);

        // 2. Daftar Resep
        $daftarResep = [
            [
                'nama' => 'Nasi Goreng Spesial Resto',
                'kategori_id' => $kategoriUtama->id,
                'des' => 'Nasi goreng harum dengan bumbu spesial, suwiran ayam, telur mata sapi, dan acar segar.',
                'persiapan' => 15,
                'masak' => 15,
                'hasil' => 2,
                'gambar' => json_encode(['reseps/r1.jpg']),
                'bahan' => json_encode([
                    '2 piring nasi putih dingin',
                    '2 butir telur ayam',
                    '100 gr dada ayam suwir',
                    '3 siung bawang putih, cincang halus',
                    '5 butir bawang merah, iris tipis',
                    '2 sdm kecap manis berkualitas',
                    '1 sdm saus tiram',
                    '1 sdm minyak wijen',
                    'Garam, lada bubuk, dan kaldu bubuk secukupnya',
                    '1 batang daun bawang, iris tipis'
                ]),
                'langkah' => json_encode([
                    'Panaskan minyak di wajan wok dengan api besar, tumis bawang putih dan merah hingga harum.',
                    'Sisihkan bumbu ke samping wajan, masukkan telur dan orak-arik hingga matang.',
                    'Masukkan ayam suwir, aduk rata bersama telur dan bumbu.',
                    'Masukkan nasi putih dingin, tuang kecap manis, saus tiram, minyak wijen, garam, dan lada.',
                    'Aduk cepat dengan api besar hingga bumbu merata dan mengeluarkan aroma asap (wok hei).',
                    'Taburi irisan daun bawang, aduk sebentar, lalu angkat dan sajikan selagi panas.'
                ]),
            ],
            [
                'nama' => 'Rendang Daging Sapi Khas Padang',
                'kategori_id' => $kategoriUtama->id,
                'des' => 'Olahan daging sapi empuk dengan bumbu rempah kelapa tradisional yang gurih dan meresap sempurna.',
                'persiapan' => 30,
                'masak' => 180,
                'hasil' => 6,
                'gambar' => json_encode(['reseps/r2.jpg']),
                'bahan' => json_encode([
                    '1 kg daging sapi gandik/paha, potong-potong',
                    '1 liter santan kental dari 3 butir kelapa tua',
                    '1 liter santan encer',
                    '4 batang serai, memarkan',
                    '5 lembar daun jeruk purut',
                    '2 lembar daun kunyit, simpulkan',
                    '2 buah asam kandis',
                    'Bumbu halus: 15 cabai merah, 10 bawang merah, 6 bawang putih, 2 cm jahe, 3 cm lengkuas'
                ]),
                'langkah' => json_encode([
                    'Tumis bumbu halus bersama serai, daun jeruk, dan daun kunyit sampai harum berminyak.',
                    'Tuangkan santan encer, aduk perlahan secara berkala agar santan tidak pecah hingga mendidih.',
                    'Masukkan potongan daging sapi, aduk rata dan masak dengan api sedang hingga daging empuk.',
                    'Setelah kuah mengental dan menyusut, tuang santan kental dan masukkan asam kandis.',
                    'Kecilkan api, aduk perlahan secara teratur hingga santan mengeluarkan minyak cokelat kehitaman.',
                    'Masak hingga bumbu meresap kering dan berminyak hitam eksotis. Angkat dan sajikan.'
                ]),
            ],
            [
                'nama' => 'Soto Ayam Lamongan Kuah Kuning',
                'kategori_id' => $kategoriSarapan->id,
                'des' => 'Soto ayam berkuah kuning gurih segar dengan taburan bubuk koya renyah yang khas.',
                'persiapan' => 20,
                'masak' => 45,
                'hasil' => 4,
                'gambar' => json_encode(['reseps/r3.jpg']),
                'bahan' => json_encode([
                    '1/2 ekor ayam kampung segar',
                    '2 liter air kaldu ayam',
                    '2 batang serai, memarkan',
                    '4 lembar daun jeruk',
                    'Bumbu halus: 8 bawang merah, 5 bawang putih, 4 kemiri sangrai, 3 cm kunyit bakar, 1 cm jahe',
                    'Pelengkap: soun seduh, kol iris, tauge, telur rebus, sambal cabai rawit',
                    'Bahan koya: 5 kerupuk udang goreng + 3 siung bawang putih goreng, haluskan'
                ]),
                'langkah' => json_encode([
                    'Rebus ayam kampung dalam air mendidih dengan api kecil hingga keluar kaldu gurihnya.',
                    'Tumis bumbu halus dengan serai dan daun jeruk sampai matang dan wangi harum.',
                    'Masukkan tumisan bumbu ke dalam panci kuah rebusan ayam, bumbui garam, merica, dan gula.',
                    'Angkat ayam dari kuah, tiriskan, goreng sebentar lalu suwir-suwir dagingnya.',
                    'Susun soun, kol, tauge, dan ayam suwir di mangkuk saji.',
                    'Siram dengan kuah soto kuning panas, lalu taburi bubuk koya dan perasan jeruk nipis.'
                ]),
            ],
            [
                'nama' => 'Pancake Pisang Cokelat Lembut',
                'kategori_id' => $kategoriSarapan->id,
                'des' => 'Pancake empuk dan lembut dengan aroma pisang alami serta lelehan cokelat lezat.',
                'persiapan' => 10,
                'masak' => 15,
                'hasil' => 3,
                'gambar' => json_encode(['reseps/r4.jpg']),
                'bahan' => json_encode([
                    '150 gr tepung terigu serbaguna',
                    '2 buah pisang ambon matang, lumatkan halus',
                    '1 butir telur ayam',
                    '200 ml susu cair full cream',
                    '2 sdm gula pasir',
                    '1 sdt baking powder',
                    '2 sdm margarin, lelehkan',
                    'Saus cokelat ganache & potongan pisang untuk topping'
                ]),
                'langkah' => json_encode([
                    'Campur pisang lumat, telur, gula pasir, dan susu cair dalam mangkuk, kocok rata.',
                    'Ayak tepung terigu dan baking powder ke dalam adonan basah, aduk perlahan.',
                    'Tuang margarin leleh, aduk balik hingga rata dan tidak ada gumpalan tepung.',
                    'Panaskan wajan anti lengket (teflon) di api kecil, tuangkan 1 sendok sayur adonan.',
                    'Tunggu hingga muncul gelembung pori di permukaan, lalu balik perlahan hingga matang keemasan.',
                    'Tata pancake bertumpuk di piring, siram saus cokelat lezat dan taburan buah segar.'
                ]),
            ],
            [
                'nama' => 'Ayam Bakar Madu Gurih Manis',
                'kategori_id' => $kategoriUtama->id,
                'des' => 'Potongan ayam panggang dengan olesan madu murni dan bumbu rempah manis legit yang meresap.',
                'persiapan' => 20,
                'masak' => 40,
                'hasil' => 4,
                'gambar' => json_encode(['reseps/r5.jpg']),
                'bahan' => json_encode([
                    '1 ekor ayam broiler, potong 4 bagian',
                    '4 sdm madu murni',
                    '3 sdm kecap manis',
                    '1 sdm air perasan asam jawa',
                    'Bumbu halus: 6 bawang merah, 4 bawang putih, 1 sdm ketumbar sangrai, 2 cm jahe, 1 sdt garam',
                    '400 ml air kelapa untuk ungkep'
                ]),
                'langkah' => json_encode([
                    'Ungkep ayam bersama bumbu halus, air kelapa, dan asam jawa sampai kuah menyusut empuk.',
                    'Campur sisa bumbu ungkepan dengan madu murni dan kecap manis untuk bahan olesan.',
                    'Panaskan panggangan atau wajan teflon anti lengket.',
                    'Panggang ayam sambil diolesi bumbu madu bolak-balik hingga terkaramelisasi harum.',
                    'Angkat saat permukaan ayam berwarna kecokelatan mengilap.',
                    'Sajikan selagi hangat bersama nasi putih, lalapan kemangi, dan sambal terasi pedas.'
                ]),
            ],
            [
                'nama' => 'Es Cendol Dawet Nangka Segar',
                'kategori_id' => $kategoriMinuman->id,
                'des' => 'Minuman tradisional manis gurih perpaduan cendol kenyal, santan kelapa, nangka, dan saus gula merah aren.',
                'persiapan' => 15,
                'masak' => 15,
                'hasil' => 4,
                'gambar' => json_encode(['reseps/r6.jpg']),
                'bahan' => json_encode([
                    '200 gr cendol dawet hijau siap pakai',
                    '500 ml santan segar, rebus bersama sejumput garam dan pandan',
                    '250 gr gula aren/merah, sisir halus',
                    '150 ml air putih',
                    '2 lembar daun pandan wangi',
                    '6 buah nangka matang, potong dadu',
                    'Es batu atau es serut secukupnya'
                ]),
                'langkah' => json_encode([
                    'Masak gula aren, air, dan daun pandan hingga larut mengental, saring dan biarkan dingin.',
                    'Rebus santan dengan api kecil sambil diaduk perlahan agar tidak pecah, lalu dinginkan.',
                    'Siapkan gelas saji, tuang 3 sendok makan saus gula aren di bagian dasar gelas.',
                    'Masukkan cendol dawet hijau dan potongan nangka manis di atas saus gula.',
                    'Tuangkan santan gurih hingga memenuhi tiga perempat gelas.',
                    'Tambahkan es serut melimpah di atasnya, nikmati dingin saat cuaca terik.'
                ]),
            ],
            [
                'nama' => 'Puding Karamel Cokelat Lembut',
                'kategori_id' => $kategoriDessert->id,
                'des' => 'Puding sutra cokelat meleleh dengan lapisan karamel manis yang legit menggoda selera.',
                'persiapan' => 15,
                'masak' => 20,
                'hasil' => 6,
                'gambar' => json_encode(['reseps/bg1.jpg']),
                'bahan' => json_encode([
                    '1 bungkus agar-agar cokelat',
                    '1 bungkus bubuk jelly instan',
                    '800 ml susu cair cokelat',
                    '100 gr dark cooking chocolate (DCC), cincang',
                    '4 sdm gula pasir',
                    'Bahan sirup karamel: 100 gr gula pasir + 60 ml air panas'
                ]),
                'langkah' => json_encode([
                    'Panaskan gula pasir di panci hingga mencair jadi karamel cokelat keemasan.',
                    'Tuang air panas perlahan sambil diaduk rata, tuang ke dasar cetakan puding.',
                    'Dalam panci lain, campur susu cair, agar-agar, jelly bubuk, dan gula pasir.',
                    'Masak di api sedang sambil diaduk hingga mulai mendidih.',
                    'Masukkan DCC cincang, aduk cepat hingga cokelat meleleh sempurna dan lembut.',
                    'Tuang adonan perlahan ke atas lapisan karamel, simpan di lemari es hingga mengeras sempurna.'
                ]),
            ],
            [
                'nama' => 'Bakwan Sayur Krispi Renyah Gurih',
                'kategori_id' => $kategoriCamilan->id,
                'des' => 'Gorengan renyah kaya sayuran segar dengan bumbu rempah gurih yang nikmat disantap hangat.',
                'persiapan' => 15,
                'masak' => 15,
                'hasil' => 10,
                'gambar' => json_encode(['reseps/bg2.jpg']),
                'bahan' => json_encode([
                    '150 gr tepung terigu protein sedang',
                    '50 gr tepung beras renyah',
                    '100 gr kol, iris tipis halus',
                    '1 buah wortel, iris korek api tipis',
                    '50 gr tauge segar',
                    '1 batang daun bawang & seledri, iris halus',
                    'Bumbu halus: 4 bawang putih, 2 kemiri sangrai, 1/2 sdt ketumbar, garam, kaldu bubuk',
                    'Air es secukupnya untuk adonan super krispi'
                ]),
                'langkah' => json_encode([
                    'Campurkan tepung terigu, tepung beras, dan bumbu halus dalam wadah besar.',
                    'Tuangkan air es sedikit demi sedikit hingga mendapatkan kekentalan adonan yang pas.',
                    'Masukkan kol, wortel, tauge, dan daun seledri, aduk rata bersama adonan tepung.',
                    'Panaskan minyak goreng yang banyak dalam wajan cekung.',
                    'Sendokkan adonan ke pinggir wajan terendam minyak panas agar melebar pipih renyah.',
                    'Goreng hingga berwarna kuning keemasan, tiriskan minyaknya dan sajikan dengan cabai rawit hijau.'
                ]),
            ],
            [
                'nama' => 'Pisang Goreng Keju Karamel',
                'kategori_id' => $kategoriCamilan->id,
                'des' => 'Pisang kepok manis berbalut tepung renyah dengan taburan keju cheddar parut dan susu kental manis.',
                'persiapan' => 10,
                'masak' => 15,
                'hasil' => 5,
                'gambar' => json_encode(['reseps/bg3.jpg']),
                'bahan' => json_encode([
                    '1 sisir pisang kepok matang, belah bentuk kipas',
                    '120 gr tepung terigu',
                    '30 gr tepung beras',
                    '1 sdm gula pasir',
                    '1/4 sdt garam halus & vanili bubuk',
                    'Tepung panir/roti secukupnya',
                    'Keju cheddar parut melimpah',
                    'Susu kental manis vanila untuk kucuran'
                ]),
                'langkah' => json_encode([
                    'Kupas pisang kepok dan potong membentuk kipas yang cantik.',
                    'Campur tepung terigu, tepung beras, gula, garam, vanili, dan air hingga jadi adonan celup kental.',
                    'Celupkan pisang ke adonan basah, lalu gulingkan ke tepung panir sampai tertutup rata.',
                    'Goreng dalam minyak panas sedang hingga matang kuning keemasan dan krispi.',
                    'Angkat, tiriskan dan tata rapi di atas piring saji.',
                    'Beri kucuran susu kental manis dan taburi keju parut melimpah sebelum dinikmati.'
                ]),
            ],
            [
                'nama' => 'Mango Sago Creamy Delight',
                'kategori_id' => $kategoriMinuman->id,
                'des' => 'Dessert drink mangga segar berpadu kuah susu evaporasi gurih, sagu mutiara, dan nata de coco kenyal.',
                'persiapan' => 15,
                'masak' => 15,
                'hasil' => 3,
                'gambar' => json_encode(['reseps/bg4.jpg']),
                'bahan' => json_encode([
                    '2 buah mangga harum manis matang manis',
                    '60 gr sagu mutiara merah, rebus hingga transparan',
                    '250 ml susu evaporasi',
                    '100 ml susu kental manis',
                    '100 gr nata de coco',
                    '1 sdm biji selasih, rendam air hangat',
                    'Es batu secukupnya'
                ]),
                'langkah' => json_encode([
                    'Potong 1 buah mangga dadu kecil untuk topping, blender sisa 1 buah mangga menjadi puree halus.',
                    'Rebus sagu mutiara dalam air mendidih hingga matang bening, bilas air dingin lalu tiriskan.',
                    'Campurkan susu evaporasi dan susu kental manis dalam wadah terpisah, aduk rata.',
                    'Siapkan gelas saji, tuang puree mangga di bagian paling bawah.',
                    'Masukkan sagu mutiara, nata de coco, biji selasih, dan potongan mangga dadu.',
                    'Siram dengan kuah susu evaporasi creamy dan sajikan dingin menyegarkan.'
                ]),
            ],
        ];

        // Ambil user admin untuk sample ulasan
        $user = User::where('role', 'admin')->first() ?? User::first();

        foreach ($daftarResep as $item) {
            $resep = Resep::updateOrCreate(
                ['nama' => $item['nama']],
                $item
            );

            // 3. Ulasan & Rating dummy (agar dashboard menampilkan rating bintang)
            if ($user) {
                Ulasan::firstOrCreate(
                    [
                        'user_id' => $user->id,
                        'resep_id' => $resep->id,
                    ],
                    [
                        'rating' => rand(4, 5),
                        'ulasan' => 'Resepnya sangat mudah dipahami dan rasanya sangat lezat! Keluarga saya suka sekali.',
                    ]
                );
            }
        }
    }
}