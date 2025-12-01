"use strict";

let currentSearch = "";

function loadMember(page = 1) {
    $.ajax({
        url: "/pengguna/member/data",
        type: "GET",
        data: {
            page: page,
            search: currentSearch
        },
        success: function (res) {
            let tbody = $("#tabel-member tbody");
            tbody.empty();

            if (res.data.length === 0) {
                tbody.append(`
                    <tr>
                        <td colspan="7" class="text-center text-muted">Tidak ada data</td>
                    </tr>
                `);
                $(".pagination").html("");
                return;
            }

            res.data.forEach((user, index) => {
                tbody.append(`
                    <tr>
                        <td>${index + 1 + (page - 1) * 10}</td>
                        <td>${user.nama}</td>
                        <td>${user.email}</td>
                        <td>${user.jkl ?? '-'}</td>
                        <td><span class="badge badge-success">${user.status}</span></td>
                        <td>${user.tgl_daftar ?? '-'}</td>
                        <td>
                            <button class="btn btn-danger btn-delete" data-id="${user.id}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                `);
            });

            $(".pagination").html(res.pagination);
        }
    });
}

$(document).ready(function () {

    loadMember();

    // Tambah member
    $("#modal-tambah-member").click(function () {
        $("#formMember")[0].reset();
        $("#modalMemberLabel").text("Tambah Member");
        $("#modalMember").modal("show");
    });

    $("#formMember").submit(function (e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            url: "/pengguna/member",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            headers: { 
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") 
            },
            success: function (res) {
                iziToast.success({
                    message: res.message,
                    position: "topRight"
                });

                $("#modalMember").modal("hide");
                loadMember();
            }
        });

    });

    // Delete member
    $(document).on("click", ".btn-delete", function () {
        let id = $(this).data("id");

        swal({
            title: "Hapus Member?",
            text: "User akan kembali menjadi guest!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((yes) => {
            if (yes) {
                $.ajax({
                    url: `/pengguna/member/${id}`,
                    type: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    },
                    success: function (res) {
                        iziToast.success({
                            message: res.message,
                            position: "topRight"
                        });
                        loadMember();
                    }
                });
            }
        });
    });

});
