"use strict";

let currentSearch = "";

// CSRF Setup
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

// Load tabel user
function loadTabelUser(page = 1) {
    $.ajax({
        url: "/pengguna/user/data",
        method: "GET",
        data: { page: page, search: currentSearch },
        success: function (res) {
            let tbody = $("#tabel-user tbody");
            tbody.empty();

            if (res.data.length === 0) {
                tbody.append(
                    '<tr><td colspan="8" class="text-center">Data tidak ditemukan</td></tr>'
                );
                $(".pagination").html("");
                return;
            }

            res.data.forEach((user, index) => {
                tbody.append(`
                    <tr>
                        <td>${index + 1 + (page - 1) * 10}</td>
                        <td>${user.nama}</td>
                        <td>${user.email}</td>
                        <td>${user.jkl}</td>
                        <td>${user.alamat}</td>
                        <td>${user.no_hp}</td>
                        <td>
                            <button class="btn btn-warning btn-edit" data-id="${
                                user.id
                            }">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-delete" data-id="${
                                user.id
                            }">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `);
            });

            $(".card-footer .pagination").html(res.pagination);
        },
    });
}

// Pagination click
$(document).on("click", ".pagination a", function (e) {
    e.preventDefault();
    let page = $(this).attr("href").split("page=")[1];
    loadTabelUser(page);
});

// Search
$(document).on("submit", ".card-header-form form", function (e) {
    e.preventDefault();
    currentSearch = $(this).find("input").val();
    loadTabelUser();
});

$(document).ready(function () {
    loadTabelUser();

    // Tambah User
    $("#modal-tambah-user").click(function () {
        $("#formUser")[0].reset();
        $("#user_id").val("");
        $("#modalUserLabel").text("Tambah User");
        $("#modalUser").modal("show");
    });

    // Edit User
    $(document).on("click", ".btn-edit", function () {
        let id = $(this).data("id");

        $.get(`/pengguna/user/${id}`, function (res) {
            let u = res.user;

            $("#user_id").val(u.id);
            $("#formUser [name=nama]").val(u.nama);
            $("#formUser [name=email]").val(u.email);
            $("#formUser [name=jkl]").val(u.jkl);
            $("#formUser [name=alamat]").val(u.alamat);
            $("#formUser [name=no_hp]").val(u.no_hp);

            $("#modalUserLabel").text("Edit User");
            $("#modalUser").modal("show");
        });
    });

    // Save User
    $("#formUser").submit(function (e) {
        e.preventDefault();
        let id = $("#user_id").val();
        let formData = new FormData(this);

        let url = id ? `/pengguna/user/${id}` : `/pengguna/user`;
        if (id) formData.append("_method", "PUT");

        $.ajax({
            url: url,
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (res) {
                iziToast.success({
                    title: "Berhasil",
                    message: res.message,
                    position: "topRight",
                });
                $("#modalUser").modal("hide");
                loadTabelUser();
            },
            error: function (err) {
                if (err.status === 422) {
                    let errors = err.responseJSON.errors;

                    $("#formUser .form-control").removeClass("is-invalid");
                    $("#formUser .invalid-feedback").text("");

                    $.each(errors, function (key, messages) {
                        let input = $(`#formUser [name="${key}"]`);
                        input.addClass("is-invalid");
                        input
                            .closest(".form-group")
                            .find(".invalid-feedback")
                            .text(messages[0]);
                    });

                    let firstError = Object.values(errors)[0][0];

                    iziToast.error({
                        title: "Gagal!",
                        message: firstError,
                        position: "topRight",
                    });

                    return;
                }

                iziToast.error({
                    title: "Gagal!",
                    message: "Terjadi kesalahan saat menyimpan data.",
                    position: "topRight",
                });
            },
        });
    });

    // Delete User
    $(document).on("click", ".btn-delete", function () {
        let id = $(this).data("id");

        swal({
            title: "Yakin?",
            text: "Data akan dihapus permanen!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((yes) => {
            if (yes) {
                $.post(
                    `/pengguna/user/${id}`,
                    { _method: "DELETE" },
                    function (res) {
                        iziToast.success({
                            title: "Berhasil",
                            message: res.message,
                            position: "topRight",
                        });
                        loadTabelUser();
                    }
                );
            }
        });
    });
});
