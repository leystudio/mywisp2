window.addEventListener("load", function () {
    $("#guardar_nuevo_plan").on("click", function () {
        const datos = [
            $("#nombre_plan").val(),
            $("#precio_plan").val(),
            $("#up_plan").val(),
            $("#down_plan").val(),
        ];
        console.log(datos);
        if (verificar_campos(datos) == 0) {
            Swal.fire("Rellene todos los campos");
        } else {
            (async () => {
                const { value: confirmar } = await Swal.fire({
                    title: "Esta apunto de guardar este plan",
                    icon: "info",
                    input: "checkbox",
                    inputPlaceholder: "Aceptar",
                    confirmButtonText: "Guardar",
                    confirmButtonColor: "#4DADF7",
                    inputValidator: (result) => {
                        return !result && "Necesita aceptar para continuar.";
                    },
                });
                if (confirmar) {
                    registrar();
                }
            })();
        }
    });

    function registrar() {
        const datos = {
            nombre: $("#nombre_plan").val(),
            precio: $("#precio_plan").val(),
            up: $("#up_plan").val(),
            down: $("#down_plan").val(),
            _token: $("#token").val(),
        };

        $.ajax({
            type: "POST",
            url: "nuevo",
            data: datos,
            dataType: "json",
            success: function (result) {
                if (result) {
                    $("#nombre_plan").val("");
                    $("#precio_plan").val("");
                    $("#up_plan").val("");
                    $("#down_plan").val("");
                    $(".btn-close-nuevo-plan").click();
                    Swal.fire({
                        title: "Registrado !",
                        icon: "success",
                    });

                    window.location.href = "http://wisp.test/admin/planes";
                }
            },
        });
    }
});
