function guardar_cambios() {
    $(".btn_guardar").on("click", function () {
        if ($("#nombre").val()) {
            const datos = {
                nombre: $("#nombre").val(),
                slogan: $("#slogan").val(),
                direccion: $("#direccion").val(),
                rnc: $("#rnc").val(),
                _token: $("#token").val(),
            };
            $.ajax({
                type: "POST",
                url: "editar_empresa",
                data: datos,
                dataType: "json",
                success: function (result) {
                    if (result) {
                        Swal.fire("Cambios guardados");
                    }
                },
                error: function (jqXHR, exception) {
                    //si la session se perdio->
                    if (jqXHR.status === 419) {
                        location.reload();
                    }
                },
            });
        } else {
            Swal.fire("Relleno el campo Nombre.");
        }
    });
}
