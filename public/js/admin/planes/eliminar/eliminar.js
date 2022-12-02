function eliminar(datatable) {
    $("#tabla_mostrar_planes").on("click", ".eliminar_plan", function () {
        let data = datatable.row($(this).parents()).data();
        id_plan = data.id;
        nombre = data.nombre;
        cantidad_clientes = "clientes";

        //verifica si ningun cliente esta utilizando el plan
        $.ajax({
            type: "POST",
            url: "v_plan",
            data: {
                _token: $("#token").val(),
                id: id_plan,
            },
            dataType: "json",
            success: function (result) {
                if (result.length == 1) {
                    cantidad_clientes = "cliente";
                }

                if (result == 0) {
                    proceder(datatable, id_plan);
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
                        title: "No puede eliminar un plan en uso",
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
            error: function (jqXHR, exception) {
                if (jqXHR.status === 419) {
                    location.reload();
                }
            },
        });

        function proceder(datatable, id_plan) {
            (async () => {
                const { value: confirmar } = await Swal.fire({
                    title: "Esta apunto de eliminar el plan " + nombre,
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
                        url: "elimina_plan",
                        data: {
                            _token: $("#token").val(),
                            id: id_plan,
                        },
                        dataType: "json",
                        success: function (result) {
                            if (result == 1) {
                                result_eliminarCliente(datatable);
                                Swal.fire({
                                    text: "Eliminado !",
                                    icon: "success",
                                });
                            } else {
                                Swal.fire({
                                    text: "Ups!  Algo salio mal.",
                                    icon: "warning",
                                });
                            }
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
        }
    });
}

function result_eliminarCliente(datatable) {
    datatable.ajax.reload();
}
