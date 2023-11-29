const swal =$s(' .swal').data('swal');
if (swal) {
    swal.fire({
        title: 'Data Berhasil',
        text: swal,
        icon: success
    })
}