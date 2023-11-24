$(function () {
    const table = $("#usuarios").DataTable({
        language: {
            url: base_url + "/app/es-ES.json",
        },
        responsive: true,
    });

    $("#form-new").submit(function (event) {
        event.preventDefault();

        // Obtener los datos del formulario
        const formData = $(this).serialize();

        // Realizar la solicitud POST usando jQuery
        $.ajax({
            type: "POST",
            url: "api/users", // Reemplaza con tu endpoint correcto
            data: formData,
            success: function (response) {
                swal({
                    type: "success",
                    title: "El usuario ha sido guardado exitosamente!",
                    showConfirButton: false,
                }).then((r) => {
                    if (r.value) {
                        location.reload();
                    }
                });
                console.log("Solicitud POST exitosa:", response);
                // Manejar la respuesta si es necesario
            },
            error: function (error) {
                swal({
                    type: "error",
                    title: "Hubo un error!",
                    showConfirButton: true,
                    confirmButtonText: "Cerrar",
                }).then((r) => {
                    if (r.value) {
                        location.reload();
                    }
                });
                console.error("Error en la solicitud POST:", error);
                // Manejar errores si es necesario
            },
        });
    });
});
