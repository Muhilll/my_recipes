$(document).ready(function(){

    // Tambah Bahan
    $('#add-bahan').click(function(){
        let bahanCount = $('#bahan-container .bahan-item').length + 1;

        let newBahan = `
            <div class="input-group mb-2 bahan-item">
                <div class="input-group-prepend">
                    <div class="input-group-text bahan-number">${bahanCount}.</div>
                </div>
                <input type="text" name="bahan[]" class="form-control" placeholder="Masukkan bahan">
                <div class="input-group-append">
                    <button type="button" class="btn btn-danger remove-bahan">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>
        `;

        $('#bahan-container').append(newBahan);
        updateBahanNumbers();
    });

    // Hapus Bahan
    $(document).on('click', '.remove-bahan', function(){
        $(this).closest('.bahan-item').remove();
        updateBahanNumbers();
    });

    // Update nomor bahan setiap kali perubahan
    function updateBahanNumbers() {
        $('#bahan-container .bahan-item').each(function(index){
            $(this).find('.bahan-number').text((index + 1) + '.');
        });
    }

});
