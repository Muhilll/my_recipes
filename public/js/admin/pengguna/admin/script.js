"use strict";

let currentSearch = "";

// CSRF
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

// Load tabel admin
function loadTabelAdmin(page = 1) {
    $.ajax({
        url: "/pengguna/admin/data",
        method: "GET",
        data: { page: page, search: currentSearch },
        success: function (res) {
            let tbody = $("#tabel-admin tbody");
            tbody.empty();

            if (res.data.length === 0) {
                tbody.append(
                    '<tr><td colspan="8" class="text-center">Data tidak ditemukan</td></tr>'
                );
                $(".pagination").html("");
                return;
            }

            res.data.forEach((admin, index) => {
                tbody.append(`
                    <tr>
                        <td>${index + 1 + (page - 1) * 10}</td>
                        <td>${admin.email}</td>
                        <td>${admin.created_at}</td>
                        <td>
                            <button class="btn btn-warning btn-edit" data-id="${admin.id}">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-delete" data-id="${admin.id}">
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

// Pagination
$(document).on("click", ".pagination a", function (e) {
    e.preventDefault();
    let page = $(this).attr("href").split("page=")[1];
    loadTabelAdmin(page);
});

// Search
$(document).on("submit", ".card-header-form form", function (e) {
    e.preventDefault();
    currentSearch = $(this).find("input").val();
    loadTabelAdmin();
});

$(document).ready(function () {
    loadTabelAdmin();

    // Modal Tambah
    $("#modal-tambah-admin").click(function () {
        $("#formAdmin")[0].reset();
        $("#admin_id").val("");
        $("#modalAdminLabel").text("Tambah Admin");
        $("#modalAdmin").modal("show");
    });

    // Edit
    $(document).on("click", ".btn-edit", function () {
        let id = $(this).data("id");

        $.get(`/pengguna/admin/${id}`, function (res) {
            let a = res.admin;

            $("#admin_id").val(a.id);
            $("#formAdmin [name=email]").val(a.email);

            $("#modalAdminLabel").text("Edit Admin");
            $("#modalAdmin").modal("show");
        });
    });

    // Save
    $("#formAdmin").submit(function (e) {
        e.preventDefault();

        let id = $("#admin_id").val();
        let formData = new FormData(this);
        let url = id ? `/pengguna/admin/${id}` : `/pengguna/admin/`;
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
                $("#modalAdmin").modal("hide");
                loadTabelAdmin();
            },
            error: function (err) {
                if (err.status === 422) {
                    let errors = err.responseJSON.errors;

                    $("#formAdmin .form-control").removeClass("is-invalid");
                    $("#formAdmin .invalid-feedback").text("");

                    $.each(errors, function (key, messages) {
                        let input = $(`#formAdmin [name="${key}"]`);
                        input.addClass("is-invalid");
                        input.closest(".form-group").find(".invalid-feedback").text(messages[0]);
                    });

                    iziToast.error({
                        title: "Gagal!",
                        message: Object.values(errors)[0][0],
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

    // Delete
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
                $.post(`/pengguna/admin/${id}`, { _method: "DELETE" }, function (res) {
                    iziToast.success({
                        title: "Berhasil",
                        message: res.message,
                        position: "topRight",
                    });
                    loadTabelAdmin();
                });
            }
        });
    });
});
