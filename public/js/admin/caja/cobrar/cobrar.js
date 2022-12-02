//detecta el btn cobrar cliqueado
function cobrar(id_cliente) {
    $("#tabla_lista_facturas").on("click", ".c", function () {
        (async () => {
            id_factura = $(this)[0].id;
            estadoText = $(this)
                .parent()
                .parent()
                .parent()
                .find(".estado_t")
                .eq(0);

            // return console.log(estadoText);
            btn_cobrar = $(this);
            btn_print = $(this).parent().find(".print_dish");
            const { value: confirmar } = await Swal.fire({
                title: "Esta apunto de cobrar esta factura",
                icon: "info",
                input: "checkbox",
                inputPlaceholder: "Aceptar",
                confirmButtonText: "Saldar!",
                confirmButtonColor: "#808080",
                inputValidator: (result) => {
                    return !result && "Necesita aceptar para continuar.";
                },
            });
            if (confirmar) {
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "cobrar_factura",
                    data: {
                        _token: $("#token").val(),
                        id: id_factura,
                        cliente_id: id_cliente,
                    },
                    success: function (result) {
                         Swal.fire({
                            icon: "success",
                            title: "Pago exitoso!",
                            text: "Exito",
                        });
                        estadoText.html("<p class='text-success'>al dia</p>");
                        btn_cobrar.removeClass("c");
                        btn_cobrar.addClass("invisible");

                        btn_print.removeClass("invisible");
                        btn_print.addClass("print");
                    },
                    error: function (jqXHR, exception) {
                        //si la session se perdio->
                        if (jqXHR.status === 419) {
                            location.reload();
                        }
                    },
                });
            }
        })();
    });
}
