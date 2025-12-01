$(document).ready(function () {

    $("#inputAddGambar").on("change", function (event) {
        let file = event.target.files[0];
        if (!file) return;

        let reader = new FileReader();

        reader.onload = function (e) {

            let previewHtml = `
                <div class="gambar-box" style="background-image: url('${e.target.result}')">
                    <button type="button" class="btn-remove-gambar">&times;</button>
                    <input type="file" name="gambar[]" class="gambar-input-real" hidden>
                </div>
            `;

            $(".add-gambar").before(previewHtml);

            let inputReal = $("#gambar-grid .gambar-input-real").last()[0];
            let dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            inputReal.files = dataTransfer.files;

            $("#inputAddGambar").val("");
        };

        reader.readAsDataURL(file);
    });

    $(document).on("click", ".btn-remove-gambar", function (e) {
        e.stopPropagation();
        $(this).parent().remove();
    });
});