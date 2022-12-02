function eliminar(datatable) {
    $("#tabla_mostrar_clientes").on("click", ".eliminar", function () {
        (async () => {
            let data = datatable.row($(this).parents()).data();
            id = data.id;
            nombre = data.nombre + " " + data.apellido;

            const { value: confirmar } = await Swal.fire({
                title:
                    "Esta apunto de eliminar a " +
                    nombre +
                    " de su lista de clientes.",
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
                    url: "eliminar_cliente",
                    data: {
                        _token: $("#token").val(),
                        id: id,
                    },
                    dataType: "json",
                    success: function (result) {
                        result_eliminarCliente(datatable);
                    },
                    error: function (jqXHR, exception) {
                        //si la session se pierde->
                        if (jqXHR.status === 419) {
                            location.reload();
                        }
                    },
                });
            }
        })();
    });
}

function result_eliminarCliente(datatable) {
    datatable.ajax.reload();
    Swal.fire("Eliminado!");
}
