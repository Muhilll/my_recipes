"use strict";

let currentSearch = "";

// CSRF Setup
$.ajaxSetup({
    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
});

// ===== Load Tabel Resep =====
function loadTabelResep(page = 1) {
    $.ajax({
        url: "/resep/data",
        method: "GET",
        data: { page: page, search: currentSearch },
        success: function (res) {
            let tbody = $("#tabel-resep tbody");
            tbody.empty();

            if (res.data.length === 0) {
                tbody.append(
                    '<tr><td colspan="7" class="text-center">Data tidak ditemukan</td></tr>'
                );
                $(".card-footer .pagination").html("");
                return;
            }

            res.data.forEach((r, idx) => {
                tbody.append(`
                    <tr>
                        <td>${idx + 1 + (page - 1) * 10}</td>
                        <td>${r.nama}</td>
                        <td>${r.kategori?.nama ?? "-"}</td>
                        <td>${r.persiapan}</td>
                        <td>${r.masak}</td>
                        <td>${r.hasil}</td>
                        <td>
                            <button class="btn btn-warning btn-edit" data-id="${
                                r.id
                            }"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-danger btn-delete" data-id="${
                                r.id
                            }"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                `);
            });

            $(".card-footer .pagination").html(res.pagination);
        },
    });
}

// ===== Pagination Click =====
$(document).on("click", ".pagination a", function (e) {
    e.preventDefault();
    let page = $(this).attr("href").split("page=")[1];
    loadTabelResep(page);
});

// ===== Search =====
$(document).on("submit", ".card-header-form form", function (e) {
    e.preventDefault();
    currentSearch = $(this).find("input").val();
    loadTabelResep();
});

// ===== Modal Tambah Resep =====
$("#modal-tambah-resep").click(function () {
    $("#formResep")[0].reset();
    $("#resep_id").val("");
    $("#formResep .form-control").removeClass("is-invalid");
    $("#formResep .invalid-feedback").text("");
    $("#modalResepLabel").text("Tambah Resep");
    $("#modalResep").modal("show");
});

// ===== Edit Resep =====
$(document).on("click", ".btn-edit", function () {
    let id = $(this).data("id");

    $.get(`/resep/${id}`, function (res) {
        let r = res.resep;

        $("#resep_id").val(r.id);
        $("#formResep [name=nama]").val(r.nama);
        $("#formResep [name=kategori_id]").val(r.kategori_id);
        $("#formResep [name=des]").val(r.des);
        $("#formResep [name=estimasi_persiapan]").val(r.persiapan);
        $("#formResep [name=estimasi_masak]").val(r.masak);
        $("#formResep [name=perkiraan_hasil]").val(r.hasil);

        // Reset Gambar
        $("#gambar-grid .gambar-box").not(".add-gambar").remove();
        if (r.gambar) {
            r.gambar.forEach((src) => {
                let imgHtml = `
                    <div class="gambar-box" data-old="${src}" style="background-image: url('/storage/${src}')">
                        <button type="button" class="btn-remove-gambar">&times;</button>
                        <input type="hidden" name="gambar_old[]" value="${src}">
                    </div>
                `;
                $(".add-gambar").before(imgHtml);
            });
        }

        // Reset Bahan
        $("#bahan-container").empty();
        if (r.bahan) {
            r.bahan.forEach((b, idx) => {
                let html = `
                    <div class="input-group mb-2 bahan-item">
                        <div class="input-group-prepend">
                            <div class="input-group-text bahan-number">${
                                idx + 1
                            }.</div>
                        </div>
                        <input type="text" name="bahan[]" class="form-control" value="${b}">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-danger remove-bahan"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                `;
                $("#bahan-container").append(html);
            });
        }

        // Reset Langkah
        $("#step-container").empty();
        if (r.langkah) {
            r.langkah.forEach((l, idx) => {
                let html = `
                    <div class="input-group mb-2 step-item">
                        <div class="input-group-prepend">
                            <div class="input-group-text step-number">${
                                idx + 1
                            }.</div>
                        </div>
                        <input type="text" name="langkah[]" class="form-control" value="${l}">
                        <div class="input-group-append">
                            <button type="button" class="btn btn-danger remove-step"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                `;
                $("#step-container").append(html);
            });
        }

        $("#modalResepLabel").text("Edit Resep");
        $("#modalResep").modal("show");
    });
});

// ===== Submit Resep =====
$("#formResep").submit(function (e) {
    e.preventDefault();
    let id = $("#resep_id").val();
    let formData = new FormData(this);

    let url = id ? `/resep/${id}` : `/resep`;
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
            $("#modalResep").modal("hide");
            $("#formResep")[0].reset();
            $("#resep_id").val("");
            $("#gambar-grid .gambar-box").not(".add-gambar").remove();
            $("#bahan-container").empty();
            $("#step-container").empty();
            $("#formResep .form-control").removeClass("is-invalid");
            $("#formResep .invalid-feedback").text("");
            loadTabelResep();
        },
        error: function (err) {
            if (err.status === 422) {
                let errors = err.responseJSON.errors;

                $("#formResep .form-control").removeClass("is-invalid");
                $("#formResep .invalid-feedback").text("");

                $.each(errors, function (key, msgs) {
                    let input = $(`#formResep [name="${key}"]`);
                    input.addClass("is-invalid");
                    input
                        .closest(".form-group")
                        .find(".invalid-feedback")
                        .text(msgs[0]);
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

// ===== Delete Resep =====
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
            $.post(`/resep/${id}`, { _method: "DELETE" }, function (res) {
                iziToast.success({
                    title: "Berhasil",
                    message: res.message,
                    position: "topRight",
                });
                loadTabelResep();
            });
        }
    });
});

// ===== Init Load =====
$(document).ready(function () {
    loadTabelResep();
});
