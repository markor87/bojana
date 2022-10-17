$(document).ready(function () {
    $('html').on('click', function (e) {
        if (e.target.id == 'dropdown') {
            $("#dropdown-menu").toggle();
        } else {
            $("#dropdown-menu").hide();
        }
    });
});
