const flashdata = $('.flash-data').data('flashdata');

if (flashdata) {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Data berhasil ' + flashdata
    });
}

$('.btn_hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Yakin Hapus Data ?',
        text: "Data akan di hapus permanent!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});
