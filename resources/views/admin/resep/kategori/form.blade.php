{{-- Nama Kategori --}}
<div class="form-group">
    <label>Nama Kategori</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="fa fa-tag"></i> {{-- icon kategori --}}
            </div>
        </div>
        <input type="text" class="form-control" name="nama" placeholder="Masukkan nama kategori" required>
    </div>
</div>

{{-- Slug --}}
<div class="form-group">
    <label>Slug</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="fa fa-link"></i> {{-- icon slug/link --}}
            </div>
        </div>
        <input type="text" class="form-control" name="slug" placeholder="Masukkan slug kategori" required>
    </div>
</div>

{{-- Deskripsi --}}
<div class="form-group">
    <label>Deskripsi</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <i class="fa fa-align-left"></i> {{-- icon deskripsi --}}
            </div>
        </div>
        <textarea class="form-control" name="des" placeholder="Masukkan deskripsi kategori" rows="4" required></textarea>
    </div>
</div>
