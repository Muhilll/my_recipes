{{-- Nama Lengkap --}}
<div class="form-group">
    <label>Nama Lengkap</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="fas fa-user-tag"></i>
            </div>
        </div>
        <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap" required>
    </div>
    <div class="invalid-feedback"></div>
</div>


{{-- Email --}}
<div class="form-group">
    <label>Email</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="fas fa-user"></i>
            </div>
        </div>
        <input type="email" class="form-control" name="email" placeholder="Masukkan email" required>
    </div>
    <div class="invalid-feedback"></div>
</div>

{{-- Jenis Kelamin --}}
<div class="form-group">
    <label>Jenis Kelamin</label>
    <select class="form-control" name="jkl" required>
        <option value="">-- Pilih Jenis Kelamin --</option>
        <option value="L">Laki-laki</option>
        <option value="P">Perempuan</option>
    </select>
    <div class="invalid-feedback"></div>
</div>

{{-- Tanggal Lahir --}}
<div class="form-group">
    <label>Tanggal Lahir</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="fas fa-calendar"></i>
            </div>
        </div>
        <input type="date" class="form-control" name="tgl_lahir" required>
    </div>
    <div class="invalid-feedback"></div>
</div>

{{-- Alamat --}}
<div class="form-group">
    <label>Alamat</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="fas fa-map-marker-alt"></i>
            </div>
        </div>
        <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat lengkap" required>
    </div>
    <div class="invalid-feedback"></div>
</div>

{{-- Nomor HP --}}
<div class="form-group">
    <label>No. HP</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="fas fa-phone"></i>
            </div>
        </div>
        <input type="text" class="form-control" name="no_hp" placeholder="Contoh: 081234567890" required>
    </div>
    <div class="invalid-feedback"></div>
</div>


{{-- Password --}}
<div class="form-group">
    <label>Password</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="fas fa-lock"></i>
            </div>
        </div>
        <input type="password" class="form-control" name="password" placeholder="Masukkan password" required>
    </div>
</div>
