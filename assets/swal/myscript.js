const flashData = $('.flash-data').data('flashdata');
if (flashData) {
    Swal({
        title: 'Data login' + flashData,
        text: 'disimpan',
        type: 'success'
    })
}

const data = $('.message').data('flashdata');

if (data) {
    Swal.fire({
        title: 'Good Job!',
        text: data,
        type: 'success'
    })
}

const error = $('.error').data('error');

if (error) {
    Swal.fire({
        title: 'Oppss!',
        text: error,
        type: 'error'
    })
}