"use strict";

let currentSearch = "";

// CSRF
$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

// Load tabel kategori
function loadTabelKategori(page = 1) {
    $.ajax({
        url: "/resep/kategori/data",
        method: "GET",
        data: { page: page, search: currentSearch },
        success: function (res) {
            let tbody = $("#tabel-kategori tbody");
            tbody.empty();

            if (res.data.length === 0) {
                tbody.append(
                    '<tr><td colspan="6" class="text-center">Data tidak ditemukan</td></tr>'
                );
                $(".pagination").html("");
                return;
            }

            res.data.forEach((ktg, index) => {
                tbody.append(`
                    <tr>
                        <td>${index + 1 + (page - 1) * 10}</td>
                        <td>${ktg.nama}</td>
                        <td>${ktg.slug}</td>
                        <td>
                            <button class="btn btn-warning btn-edit" data-id="${ktg.id}">
                                <i class="fa fa-edit"></i>
                            </button>
                            <button class="btn btn-danger btn-delete" data-id="${ktg.id}">
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
    loadTabelKategori(page);
});

// Search
$(document).on("submit", ".card-header-form form", function (e) {
    e.preventDefault();
    currentSearch = $(this).find("input").val();
    loadTabelKategori();
});

// Document ready
$(document).ready(function () {
    loadTabelKategori();

    // Tambah Kategori
    $("#modal-tambah-kategori").click(function () {
        $("#formKategori")[0].reset();
        $("#kategori_id").val("");
        $("#modalKategoriLabel").text("Tambah Kategori");
        $("#modalKategori").modal("show");
    });

    // Edit Kategori
    $(document).on("click", ".btn-edit", function () {
        let id = $(this).data("id");

        $.get(`/resep/kategori/${id}`, function (res) {
            let ktg = res.kategori;

            $("#kategori_id").val(ktg.id);
            $("#formKategori [name=nama]").val(ktg.nama);
            $("#formKategori [name=slug]").val(ktg.slug);

            $("#modalKategoriLabel").text("Edit Kategori");
            $("#modalKategori").modal("show");
        });
    });

    // Save (Tambah / Edit)
    $("#formKategori").submit(function (e) {
        e.preventDefault();
        let id = $("#kategori_id").val();
        let formData = new FormData(this);

        let url = id ? `/resep/kategori/${id}` : `/resep/kategori`;
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
                $("#modalKategori").modal("hide");
                loadTabelKategori();
            },
            error: function (err) {
                if (err.status === 422) {
                    let errors = err.responseJSON.errors;

                    $("#formKategori .form-control").removeClass("is-invalid");
                    $("#formKategori .invalid-feedback").text("");

                    $.each(errors, function (key, messages) {
                        let input = $(`#formKategori [name="${key}"]`);
                        input.addClass("is-invalid");
                        input.closest(".form-group").find(".invalid-feedback")
                             .text(messages[0]);
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
            text: "Data kategori akan dihapus permanen!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((yes) => {
            if (yes) {
                $.post(`/resep/kategori/${id}`, { _method: "DELETE" }, function (res) {
                    iziToast.success({
                        title: "Berhasil",
                        message: res.message,
                        position: "topRight",
                    });
                    loadTabelKategori();
                });
            }
        });
    });
});
