function editar(datatable) {
    $("#tabla_mostrar_planes").on("click", ".editar_plan", function () {
        (async () => {
            let data = datatable.row($(this).parents()).data();
            plan_id = data.id;
            nombre = data.nombre;

            const { value: confirmar } = await Swal.fire({
                title: "Esta apunto de editar el plan " + nombre,
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
                $("#name").val(nombre);
                $("#precio").val(data.precio);
                $("#up").val(data.up);
                $("#down").val(data.down);
                $(".btn_edt_plan").click();
            }
        })();
    });

    $("#guardar").on("click", function () {
        const datos = {
            nombre: $("#name").val(),
            precio: $("#precio").val(),
            up: $("#up").val(),
            down: $("#down").val(),
            _token: $("#token").val(),
            id: plan_id,
        };
        $.ajax({
            type: "POST",
            url: "editar",
            data: datos,
            dataType: "json",
            success: function (result) {
                if (result) {
                    Swal.fire("Cambios guardados");
                    $(".btn_edt_plan").click();
                    datatable.ajax.reload();
                }
            },
            error: function (jqXHR, exception) {
                if (jqXHR.status === 419) {
                    location.reload();
                }
            },
        });
    });
}
