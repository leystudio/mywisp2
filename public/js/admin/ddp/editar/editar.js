function editar(datatable) {
    $("#tabla_mostrar_ddp").on("click", ".editar", function () {
        (async () => {
            let data = datatable.row($(this).parents()).data();
            id = data.id;
            plazo = data.plazo;

            const { value: confirmar } = await Swal.fire({
                title: "Esta apunto de editar este ddp",
                icon: "info",
                input: "checkbox",
                inputPlaceholder: "Aceptar",
                confirmButtonText: "Editar",
                confirmButtonColor: "#808080",
                inputValidator: (result) => {
                    return !result && "Necesita aceptar para continuar.";
                },
            });
            if (confirmar) {
                $(".plazo_edit").val(plazo);

                $(".btn_edt_plazo").click();
            }
        })();
    });

    $("#guardar_cambios").on("click", function () {
        if ($(".plazo_edit").val()) {
            const datos = {
                plazo: $(".plazo_edit").val(),
                _token: $("#token").val(),
                id: id,
            };
            $.ajax({
                type: "POST",
                url: "editar_ddp",
                data: datos,
                dataType: "json",
                success: function (result) {
                    if (result) {
                        Swal.fire("Cambios guardados");
                        $(".cerrar_mef").click();
                        datatable.ajax.reload();
                    }
                },
                error: function (jqXHR, exception) {
                    if (jqXHR.status === 419) {
                        location.reload();
                    }
                },
            });
        } else {
            Swal.fire("inserte los dias de plazo.");
        }
    });
}
