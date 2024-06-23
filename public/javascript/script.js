function confirmCreate() {
    return confirm("Apakah Ada Yakin Ingin Membuat Data?");
}

function confirmupdate() {
    return confirm("Apakah Anda Yakin Ingin Mengubah Data?");
}

function confirmdelete() {
    return confirm("Apakah Anda Yakin Ingin Menghapus Data?");
}

function confirmLogout() {
    return confirm("Apakah anda yakin ingin logout?");
}

// confirmation alert untuk hapus data
function confirmDelete(event, form) {
    event.preventDefault();
    Swal.fire({
        title: "Apakah anda yakin?",
        text: "anda akan menghapus data secara permanen!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya!",
        cancelButtonText: "Tidak!",
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
}
