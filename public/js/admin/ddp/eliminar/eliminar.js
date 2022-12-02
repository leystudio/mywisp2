function proceder_ddp(datatable, id, token) {
    const datos = {
        id: id,
        _token: token,
    };
    (async () => {
        const { value: confirmar } = await Swal.fire({
            title: "Esta apunto de eliminar este dia de pago",
            icon: "warning",
            input: "checkbox",
            inputPlaceholder: "Aceptar",
            confirmButtonText: "Eliminar",
            confirmButtonColor: "#dd6b55",
            inputValidator: (result) => {
                return !result && "Necesita aceptar para continuar.";
            },
        });
        if (confirmar) {
            $.ajax({
                type: "POST",
                url: "eliminar_ddp",
                data: datos,
                dataType: "json",
                success: function (result) {
                    if (result) {
                        Swal.fire({
                            title: "ok!",
                            icon: "success",
                        });
                        $(".close").click();

                        datatable.ajax.reload();
                    }
                },
                error: function (jqXHR, exception) {
                    if (jqXHR.status === 419) {
                        location.reload();
                    }
                },
            });
        }
    })();
}

function eliminar(datatable) {
    $("#tabla_mostrar_ddp").on("click", ".eliminar", function () {
        let data = datatable.row($(this).parents()).data();
        id = data.id;
        (token = $("#token").val()),
            //verifica que ningun cliente esta utilizando el dia de pago
            $.ajax({
                type: "POST",
                url: "v_uso_ddp",
                data: {
                    _token: token,
                    id: id,
                },
                dataType: "json",
                success: function (result) {
                    if (result.length == 1) {
                        cantidad_clientes = "cliente";
                    }

                    if (!result.length) {
                        proceder_ddp(datatable, id, token);
                    } else {
                        lista_clientes = "<hr>";

                        if (result.length <= 5) {
                            for (let i = 0; i < result.length; i++) {
                                lista_clientes +=
                                    `
                             <i>` +
                                    result[i]["nombre"] +
                                    " " +
                                    result[i]["apellido"] +
                                    ` <b>id.` +
                                    result[i]["id"] +
                                    `</b></i><br>
                             `;
                            }
                        } else {
                            for (let i = 0; i != 5; i++) {
                                lista_clientes +=
                                    `
                              <i>` +
                                    result[i]["nombre"] +
                                    " " +
                                    result[i]["apellido"] +
                                    ` <b>id.` +
                                    result[i]["id"] +
                                    `</b></i><br>
                              `;
                            }
                            lista_clientes += `<p>Entre otros...</p>`;
                        }

                        Swal.fire({
                            title: "No puede eliminar un dia de pago en uso",
                            html:
                                "Aun tiene " +
                                result.length +
                                " " +
                                cantidad_clientes +
                                "  utilizando este  plan." +
                                lista_clientes,
                            icon: "info",
                        });
                    }
                },
            });
    });
}
