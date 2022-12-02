function eliminar(datatable) {
    $("#tabla_mostrar_materiales").on("click", ".eliminar", function () {
        let data = datatable.row($(this).parents()).data();
        id = data.id;
        //verifica si ningun cliente esta utilizando el material
        $.ajax({
            type: "POST",
            url: "v_material",
            data: {
                _token: $("#token").val(),
                id: id,
            },
            dataType: "json",
            success: function (result) {
                if (result["cantidad"] == 0) {
                    elimina(id);
                } else {
                    texto = "clientes";
                    if (result["cantidad"] == 1) {
                        texto = "cliente";
                    }
                    if (result["cliente"] != null) {
                        lista_clientes = "<hr>";

                        lista_clientes +=
                            `
                            <i>` +
                            result["cliente"]["nombre"] +
                            " " +
                            result["cliente"]["apellido"] +
                            ` <b>id.` +
                            result["cliente"]["id"] +
                            `</b></i><br>
                            `;
                        lista_clientes += `<p>Entre otros...</p>`;
                    } else {
                        lista_clientes = "";
                    }
                    Swal.fire({
                        title: "No puede eliminar un material en uso",
                        html:
                            "Aun tiene " +
                            result["cantidad"] +
                            " " +
                            texto +
                            "  utilizando este  material." +
                            lista_clientes,
                        icon: "info",
                    });
                }
            },
            error: function (jqXHR, exception) {
                if (jqXHR.status === 419) {
                    location.reload();
                }
            },
        });

        function elimina(id) {
            (async () => {
                const datos = {
                    id: id,
                    _token: $("#token").val(),
                };

                const { value: confirmar } = await Swal.fire({
                    title: "Esta apunto de eliminar este material.",
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
                    return console.log(23);
                    $.ajax({
                        type: "POST",
                        url: "eliminar_material",
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
    });
}
