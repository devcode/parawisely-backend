const flashdata = $('.flash-data').data('flashdata');
const flashdata_cek = $('.flash-data').data('cek');

if (flashdata_cek == "success") {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: 'Data berhasil ' + flashdata
    });
} else if (flashdata == "gagal") {
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'Data sudah tersedia'
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
