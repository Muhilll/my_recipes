"use strict";

let currentSearch = "";

// Load tabel ulasan
function loadTabelUlasan(page = 1) {
    $.ajax({
        url: "/ulasan/data",
        method: "GET",
        data: { page: page, search: currentSearch },
        success: function (res) {
            let tbody = $("#tabel-ulasan tbody");
            tbody.empty();

            if (res.data.length === 0) {
                tbody.append(`
                    <tr>
                        <td colspan="5" class="text-center">Data tidak ditemukan</td>
                    </tr>
                `);
                $(".pagination").html("");
                return;
            }

            res.data.forEach((item, index) => {
                tbody.append(`
                    <tr>
                        <td>${index + 1 + (page - 1) * 10}</td>
                        <td>${item.user?.nama ?? '-'}</td>
                        <td>${item.resep?.nama ?? '-'}</td>
                        <td>${item.rating}</td>
                        <td>${item.ulasan}</td>
                    </tr>
                `);
            });

            $(".card-footer .pagination").html(res.pagination);
        }
    });
}

// Pagination
$(document).on("click", ".pagination a", function (e) {
    e.preventDefault();
    let page = $(this).attr("href").split("page=")[1];
    loadTabelUlasan(page);
});

// Search
$(document).on("submit", ".card-header-form form", function (e) {
    e.preventDefault();
    currentSearch = $(this).find("input").val();
    loadTabelUlasan();
});

// Load pertama kali
$(document).ready(function () {
    loadTabelUlasan();
});
