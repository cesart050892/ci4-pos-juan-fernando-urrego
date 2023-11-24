let table;
let isEditing = false;

$(function () {
    /**
     * RENDER
     */
    table = $("#usuarios").DataTable({
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
                            '<img src="uploads/' +
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

    function getUserFromLocalStorage() {
        var user = localStorage.getItem("user");
        if (user) {
            return JSON.parse(user);
        } else {
            return null;
        }
    }

    $(".user-photo").change(function (e) {
        e.preventDefault();
        let file = this.files[0];

        // Validación del formato de la imagen
        if (!file.type.match("image/jpeg") && !file.type.match("image/png")) {
            // Si el formato no es JPG o PNG, mostrar un SweetAlert2 informando sobre los formatos permitidos
            swal({
                title: "Formato inválido",
                text: "Los formatos permitidos son JPG y PNG",
                type: "error",
                confirmButtonText: "Aceptar",
            });
            // Limpiar el campo de carga de la imagen (opcional)
            $(this).val("");
            return;
        }

        // Validación del tamaño de la imagen (2 MB)
        if (file.size > 2 * 1024 * 1024) {
            // Si la imagen excede el tamaño máximo, mostrar un SweetAlert2 indicando el tamaño máximo permitido
            swal({
                title: "Tamaño excedido",
                text: "El tamaño máximo de la foto es de 2 MB",
                type: "error",
                confirmButtonText: "Aceptar",
            });
            // Limpiar el campo de carga de la imagen (opcional)
            $(this).val("");
            return;
        }

        // Si pasa las validaciones, aquí puedes continuar con otras acciones, como cargar la imagen, etc.
        // Por ejemplo, podrías mostrar previamente la imagen en una vista previa antes de cargarla al servidor
        // Mostrar la imagen seleccionada en la vista previa

        let reader = new FileReader();
        reader.onload = function (e) {
            $(".previsualizar").attr("src", e.target.result).show();
        };
        reader.readAsDataURL(file);
    });

    function renderModal(
        title,
        headerBgColor,
        headerTextColor,
        buttonText,
        buttonClass
    ) {
        $(".modal-title").text(title);
        $(".modal-header").css({
            background: headerBgColor,
            color: headerTextColor,
        });
        $('button[type="submit"]')
            .removeClass("btn-primary btn-warning")
            .addClass(buttonClass)
            .text(buttonText);
    }

    function renderUserData(userData) {
        $('input[name="nombre"]').val(userData.nombre);
        $('input[name="usuario"]').val(userData.usuario);
        $('select[name="perfil"]').val(userData.perfil);
        $(".previsualizar").attr("src", "uploads/" + userData.foto);
    }

    function resetUserData() {
        $("#form-new")[0].reset();
        $(".previsualizar").attr(
            "src",
            "../app/img/template/user/anonymous.png"
        );
    }

    function resetModal() {
        isEditing = false;
        console.log("Editing >>:", isEditing);
        resetUserData();
        $('input[name="password"]').prop("required", true);
        renderModal(
            "Agregar Usuario",
            "#3c8dbc",
            "white",
            "Guardar",
            "btn-primary"
        );
    }

    $("#modalAgregarUsuario").on("hidden.bs.modal", function () {
        resetModal();
    });

    /**
     * CRUD
     */

    function show(itemId) {
        $.ajax({
            type: "GET",
            url: base_url + "api/users/" + itemId,
            success: function (response) {
                isEditing = true;
                localStorage.setItem("user", JSON.stringify(response.data));
                renderUserData(response.data);
                renderModal(
                    "Editar Usuario",
                    "#ec971f",
                    "white",
                    "Editar",
                    "btn-warning"
                );
                $("#modalAgregarUsuario").modal("show");
                console.log("Editing >>:", isEditing);
            },
            error: function (error) {
                // Manejar errores al obtener un usuario específico
                // ...
            },
        });
    }

    function saveUser() {
        // Obtener los datos del formulario
        // const formData = $(this).serialize();

        // Obtener los datos del formulario, incluyendo archivos

        const formData = new FormData($("#form-new")[0]);

        // Realizar la solicitud POST usando jQuery
        $.ajax({
            type: "POST",
            url: base_url + "api/users", // Reemplaza con tu endpoint correcto
            data: formData,
            contentType: false, // Importante: desactivar la configuración predeterminada de contentType (para archivos)
            processData: false, // Importante: desactivar la configuración predeterminada de processData (para archivos)
            success: function (response) {
                swal({
                    type: "success",
                    title: "El usuario ha sido guardado exitosamente!",
                    showConfirButton: false,
                }).then((r) => {
                    if (r.value) {
                        table.ajax.reload();
                        $("#modalAgregarUsuario").modal("hide"); // Cerrar el modal
                        resetModal();
                    }
                });
                console.log("Solicitud POST exitosa:", response);
                // Manejar la respuesta si es necesario
            },
            error: function (xhr, status, error) {
                let response = xhr.responseJSON || {};

                let mensajesError = "<ul>";
                if (response.messages && response.messages.errors) {
                    Object.values(response.messages.errors).forEach(
                        (errorMessage) => {
                            mensajesError += `<li>${errorMessage}</li>`;
                        }
                    );
                }
                mensajesError += "</ul>";

                let errorMessage = `<br><br>`;
                errorMessage += "Errores:<br>" + mensajesError;

                swal({
                    type: "error",
                    title: "¡Hubo un error en la solicitud!",
                    html: errorMessage,
                }).then((result) => {
                    if (result.value) {
                        location.reload();
                    }
                });
            },
        });
    }

    function updateUser() {
        // Obtener los datos del formulario
        // const formData = $(this).serialize();

        // Obtener los datos del formulario, incluyendo archivos
        const formData = new FormData($("#form-new")[0]);
        let user = getUserFromLocalStorage();

        // Realizar la solicitud POST usando jQuery
        $.ajax({
            type: "PUT",
            url: base_url + "api/users/" + user.id, // Reemplaza con tu endpoint correcto
            data: formData,
            contentType: false, // Importante: desactivar la configuración predeterminada de contentType (para archivos)
            processData: false, // Importante: desactivar la configuración predeterminada de processData (para archivos)
            success: function (response) {
                swal({
                    type: "success",
                    title: "El usuario ha sido actualizado exitosamente!",
                    showConfirButton: false,
                }).then((r) => {
                    if (r.value) {
                        table.ajax.reload();
                        $("#modalAgregarUsuario").modal("hide"); // Cerrar el modal
                        resetModal();
                    }
                });
                console.log("Solicitud PUT exitosa:", response);
                // Manejar la respuesta si es necesario
            },
            error: function (xhr, status, error) {
                let response = xhr.responseJSON || {};

                let mensajesError = "<ul>";
                if (response.messages && response.messages.errors) {
                    Object.values(response.messages.errors).forEach(
                        (errorMessage) => {
                            mensajesError += `<li>${errorMessage}</li>`;
                        }
                    );
                }
                mensajesError += "</ul>";

                let errorMessage = `<br><br>`;
                errorMessage += "Errores:<br>" + mensajesError;

                swal({
                    type: "error",
                    title: "¡Hubo un error en la solicitud!",
                    html: errorMessage,
                }).then((result) => {
                    if (result.value) {
                        location.reload();
                    }
                });
            },
        });
    }

    function deleteUser(itemId) {
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

    /**
     * EVENTS
     */

    $("#form-new").submit(function (event) {
        event.preventDefault();

        if (isEditing) {
            updateUser();
        } else {
            saveUser();
        }
    });

    $("#usuarios tbody").on("click", "button.edit-btn", function () {
        var itemId = $(this).data("item");
        swal({
            title: "Editar elemento",
            text: "¿Estás seguro de editar el elemento con ID " + itemId + "?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ec971f",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Sí, editar",
        }).then((result) => {
            if (result.value) {
                $('input[name="password"]').removeAttr("required");
                show(itemId);
            }
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
                deleteUser(itemId);
            }
        });
    });
});
