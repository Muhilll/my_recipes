$(document).ready(function(){

    // Tambah Step
    $('#add-step').click(function(){
        let stepCount = $('#step-container .step-item').length + 1;

        let newStep = `
            <div class="input-group mb-2 step-item">
                <div class="input-group-prepend">
                    <div class="input-group-text step-number">${stepCount}.</div>
                </div>
                <input type="text" name="langkah[]" class="form-control" placeholder="Masukkan langkah">
                <div class="input-group-append">
                    <button type="button" class="btn btn-danger remove-step">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
            </div>
        `;

        $('#step-container').append(newStep);
        updateStepNumbers();
    });

    // Hapus Step
    $(document).on('click', '.remove-step', function(){
        $(this).closest('.step-item').remove();
        updateStepNumbers();
    });

    // Update nomor step setiap kali ada perubahan
    function updateStepNumbers() {
        $('#step-container .step-item').each(function(index){
            $(this).find('.step-number').text((index + 1) + '.');
        });
    }

});
