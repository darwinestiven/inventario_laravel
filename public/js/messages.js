// messages.js

document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        document.querySelectorAll('.hide-message').forEach(function (message) {
            message.style.display = 'none';
        });
    }, 2000);
});

$(document).ready( function () {
    $('#table-programs').DataTable({
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"
        }
    });;
});
