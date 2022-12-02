function eliminar(datatable) {
    $("#tabla_mostrar_notas").on("click", ".eliminar", function () {
        (async () => {
            let data = datatable.row($(this).parents()).data();
            id = data.id;
            const datos = {
                id: id,
                _token: $("#token").val(),
            };

            const { value: confirmar } = await Swal.fire({
                title: "Esta apunto de eliminar esta tarea.",
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
                    url: "eliminar_nota",
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
    });
}
