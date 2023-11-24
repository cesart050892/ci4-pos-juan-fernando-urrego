$(function () {
    const table = $("#usuarios").DataTable({
        language: {
            url: base_url + "/app/es-ES.json",
        },
        responsive: true,
        ajax: {
            url: "api/users", // Endpoint de la API para obtener los datos de los usuarios
            dataSrc: "data", // Si los datos están directamente en un array en la respuesta, dejar en blanco
        },
        columns: [
            { title: "Nombre", data: "nombre" }, // Nombre de la columna en la respuesta JSON
            { title: "Usuario", data: "usuario" }, // Nombre de la columna en la respuesta JSON
            { title: "Perfil", data: "perfil" }, // Nombre de la columna en la respuesta JSON
            {
                // Definición de la columna de la foto utilizando la opción render
                title: "Foto",
                data: null,
                render: function (data, type, row) {
                    // Verifica si hay una URL de imagen disponible en los datos
                    if (data.foto !== "") {
                        return (
                            '<img src="../app/img/template/user/' +
                            data.foto +
                            '" alt="" class="img-thumbnail" width="40px">'
                        );
                    } else {
                        // Si no hay URL de imagen, muestra una imagen predeterminada
                        return '<img src="../app/img/template/user/anonymous.png" alt="" class="img-thumbnail" width="40px">';
                    }
                },
            },
            {
                // Definición de la columna de acciones utilizando la opción render
                title: "Estado",
                data: null,
                render: function (data, type, row) {
                    return (
                        '<button class="btn btn-success btn-xs" data-state="' +
                        data.estado +
                        '">Activado</button>'
                    );
                },
            },
            {
                // Definición de la columna de acciones utilizando la opción render
                title: "Acciones",
                data: null,
                render: function (data, type, row) {
                    return (
                        '<div class="btn-group">' +
                        '<button class="btn btn-warning edit-btn" data-item="' +
                        data.id +
                        '">' +
                        '<i class="fa fa-pencil"></i>' +
                        "</button>" +
                        '<button class="btn btn-danger delete-btn" data-item="' +
                        data.id +
                        '">' +
                        '<i class="fa fa-times"></i>' +
                        "</button>" +
                        "</div>"
                    );
                },
            },
            // ... otras columnas según la estructura de tu respuesta JSON
        ],
    });

    $("#form-new").submit(function (event) {
        event.preventDefault();

        // Obtener los datos del formulario
        const formData = $(this).serialize();

        // Realizar la solicitud POST usando jQuery
        $.ajax({
            type: "POST",
            url: base_url + "api/users", // Reemplaza con tu endpoint correcto
            data: formData,
            success: function (response) {
                swal({
                    type: "success",
                    title: "El usuario ha sido guardado exitosamente!",
                    showConfirButton: false,
                }).then((r) => {
                    if (r.value) {
                        table.ajax.reload();
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

    $("#usuarios tbody").on("click", "button.delete-btn", function () {
        var itemId = $(this).data("item");

        // Mostrar SweetAlert2 con el ID del elemento
        swal({
            title: "Eliminar elemento",
            text:
                "¿Estás seguro de eliminar el elemento con ID " + itemId + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Sí, eliminar",
        }).then((result) => {
            if (result.value) {
                // Aquí puedes agregar la lógica para realizar la eliminación del elemento con el ID itemId
                // Por ejemplo, realizar una solicitud AJAX al endpoint correspondiente para eliminar el elemento
                // Una vez eliminado, puedes recargar la tabla DataTables si es necesario
                // Ejemplo: table.ajax.reload();

                $.ajax({
                    url: base_url + "api/users/" + itemId,
                    type: "DELETE",
                    success: function (response, status, xhr) {
                        // Manejar la respuesta exitosa
                        if (xhr.status === 200) {
                            // Mostrar una alerta SweetAlert2 indicando que el usuario ha sido eliminado
                            swal({
                                title: "Usuario Eliminado",
                                text: "El usuario ha sido eliminado satisfactoriamente",
                                type: "success",
                                confirmButtonText: "Aceptar",
                            });
                            table.ajax.reload();
                        } else {
                            // Manejar la respuesta en caso de éxito, pero con un mensaje de error o respuesta inesperada
                            swal({
                                title: "Error",
                                text: "Ha ocurrido un error al eliminar el usuario",
                                type: "error",
                                confirmButtonText: "Aceptar",
                            });
                            table.ajax.reload();
                        }
                    },
                    error: function (xhr, status, error) {
                        // Manejar los errores de la petición
                        console.error(error);

                        // Mostrar una alerta SweetAlert2 indicando que ha habido un error en la solicitud
                        swal({
                            title: "Error",
                            text: "Ha ocurrido un error en la solicitud",
                            icon: "error",
                            confirmButtonText: "Aceptar",
                        });
                        table.ajax.reload();
                    },
                });
            }
        });
    });
});
