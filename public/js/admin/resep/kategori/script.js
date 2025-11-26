$(document).ready(function () {
    $("#modal-tambah-kategori").click(function () {
        $("#formKategori")[0].reset();
        $("#formKategori .form-control").removeClass("is-invalid");
        $("#formKategori .invalid-feedback").text("");
        $("#kategori_id").val("");
        $("#modalKategoriLabel").text("Tambah Kategori");
        $("#modalKategori").modal("show");
    });
});