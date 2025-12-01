{{-- Kategori --}}
<div class="form-group">
    <label>Kategori</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="fa fa-list"></i>
            </div>
        </div>
        <select name="kategori_id" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach ($dataKategori as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
            @endforeach
        </select>
    </div>
</div>

{{-- Nama Resep --}}
<div class="form-group">
    <label>Nama Resep</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="fa fa-utensils"></i>
            </div>
        </div>
        <input type="text" name="nama" class="form-control" placeholder="Masukkan nama resep" required>
    </div>
</div>

{{-- Upload Gambar --}}
<div class="form-group">
    <label>Gambar Resep</label>

    <div id="gambar-grid" class="gambar-grid">

        <label class="gambar-box add-gambar" for="inputAddGambar">
            <span class="text-center w-100 h-100 d-flex align-items-center justify-content-center">
                <i class="fa fa-plus fa-2x text-secondary"></i>
            </span>
        </label>
        <input type="file" id="inputAddGambar" class="input-add-gambar" accept="image/*" hidden>
    </div>
</div>

{{-- Deskripsi --}}
<div class="form-group">
    <label>Deskripsi</label>
    <textarea name="des" class="form-control" rows="3" placeholder="Masukkan deskripsi resep" required></textarea>
</div>

{{-- Estimasi Persiapan --}}
<div class="form-group">
    <label>Estimasi Persiapan (menit)</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="fa fa-stopwatch"></i>
            </div>
        </div>
        <input type="number" name="estimasi_persiapan" class="form-control" placeholder="Contoh: 15" required>
    </div>
</div>

{{-- Estimasi Masak --}}
<div class="form-group">
    <label>Estimasi Masak (menit)</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="fa fa-hourglass-half"></i>
            </div>
        </div>
        <input type="number" name="estimasi_masak" class="form-control" placeholder="Contoh: 30" required>
    </div>
</div>

{{-- Perkiraan Hasil --}}
<div class="form-group">
    <label>Perkiraan Hasil (porsi)</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="fa fa-users"></i>
            </div>
        </div>
        <input type="number" name="perkiraan_hasil" class="form-control" placeholder="Contoh: 4" required>
    </div>
</div>

{{-- Bahan-bahan --}}
<div class="form-group">
    <label>Bahan-bahan</label>

    <div id="bahan-container">
        <div class="input-group mb-2 bahan-item">
            <div class="input-group-prepend">
                <div class="input-group-text bahan-number">1.</div>
            </div>
            <input type="text" name="bahan[]" class="form-control" placeholder="Masukkan bahan">
            <div class="input-group-append">
                <button type="button" class="btn btn-danger remove-bahan">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-primary mt-2" id="add-bahan">
        <i class="fa fa-plus"></i> Tambah Bahan
    </button>
</div>


{{-- Langkah-langkah --}}
<div class="form-group">
    <label>Langkah-langkah</label>

    <div id="step-container">
        <div class="input-group mb-2 step-item">
            <div class="input-group-prepend">
                <div class="input-group-text step-number">1.</div>
            </div>
            <input type="text" name="langkah[]" class="form-control" placeholder="Masukkan langkah">
            <div class="input-group-append">
                <button type="button" class="btn btn-danger remove-step">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-primary mt-2" id="add-step">
        <i class="fa fa-plus"></i> Tambah Step
    </button>
</div>
