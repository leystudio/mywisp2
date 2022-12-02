function editar(datatable) {
    //prepara boton lista materiales
    div_lM = $(".div_l_m").hide();
    btnLm = $(".btn_l_m");
    btnLm_C = $(".btn_l_m_c");
    btnLm_C.hide();

    //abrir lista
    btnLm.click(function () {
        div_lM.show(150);
        btnLm_C.show();
        btnLm.hide();
    });
    //cerrar lista
    btnLm_C.click(function () {
        div_lM.hide(150);
        btnLm_C.hide();
        btnLm.show();
    });
    $("#tabla_mostrar_clientes").on("click", ".editar", function () {
        (async () => {
            let data = datatable.row($(this).parents()).data();
            id = data.id;
            nombre = data.nombre + " " + data.apellido;

            const { value: confirmar } = await Swal.fire({
                title: "Esta apunto de editar a " + nombre,
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
                $.ajax({
                    type: "POST",
                    url: "editar_cliente",
                    data: {
                        _token: $("#token").val(),
                        id: id,
                    },
                    dataType: "json",
                    success: function (result) {
                        cargar_datos(result);
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
