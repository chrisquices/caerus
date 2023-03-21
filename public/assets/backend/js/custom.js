loadDataTable();

function loadDataTable() {
    $('.datatable').DataTable({
        paging: false,
        searching: false,
        bLengthChange: false,
        bFilter: true,
        bInfo: false,
    });
}

function redirectTo(url) {
    window.location.href = url;
}

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
