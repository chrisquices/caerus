function swalFire(icon, title) {
    Swal.fire({
        toast: true,
        position: 'top-right',
        title: title,
        icon: icon,
        timer: 3000,
        showConfirmButton: false,
    });
}
