$(function () {
    $("#usuarios").DataTable({
        language: {
            url: base_url + "/app/es-ES.json",
        },
        responsive: true,
    });
});
