$(document).ready(function () {
    $("#modal-tambah-resep").click(function () {
        $("#formResep")[0].reset();
        $("#formResep .form-control").removeClass("is-invalid");
        $("#formResep .invalid-feedback").text("");
        $("#resep_id").val("");
        $("#modalResepLabel").text("Tambah Resep");
        $("#modalResep").modal("show");
    });
});