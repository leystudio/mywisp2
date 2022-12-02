window.addEventListener("load", function () {
    $("#guardar_diapago").on("click", function () {
        const datos = [$("#dia").val(), $("#plazo").val()];
        if (verificar_campos(datos) == 0) {
            Swal.fire("Rellene todos los campos");
        } else {
            (async () => {
                const { value: confirmar } = await Swal.fire({
                    title: "Esta apunto de guardar este dia de pago",
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
            dia: $("#dia").val(),
            plazo: $("#plazo").val(),
            _token: $("#token").val(),
        };

        $.ajax({
            type: "POST",
            url: "nuevo_ddp",
            data: datos,
            dataType: "json",
            success: function (result) {
                if (result) {
                    $("#dia").val("");
                    $("#plazo").val("");

                    Swal.fire({
                        title: "Registrado !",
                        icon: "success",
                    });
                    $(".close-nuevo_diapago").click();

                    listarDiapago();
                }
            },
            error: function (jqXHR, exception) {
                if (jqXHR.status === 419) {
                    location.reload();
                }
            },
        });
    }
});
