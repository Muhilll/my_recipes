$(document).ready(function () {
    $("#modal-tambah-user").click(function () {
        $("#formUser")[0].reset();
        $("#formUser .form-control").removeClass("is-invalid");
        $("#formUser .invalid-feedback").text("");
        $("#user_id").val("");
        $("#modalUserLabel").text("Tambah User");
        $("#modalUser").modal("show");
    });
});