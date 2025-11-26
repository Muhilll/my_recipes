$(document).ready(function () {
    $("#modal-tambah-admin").click(function () {
        $("#formAdmin")[0].reset();
        $("#formAdmin .form-control").removeClass("is-invalid");
        $("#formAdmin .invalid-feedback").text("");
        $("#admin_id").val("");
        $("#modalAdminLabel").text("Tambah Admin");
        $("#modalAdmin").modal("show");
    });
});