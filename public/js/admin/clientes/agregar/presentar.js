function presentar(id) {
    window.location.href = "http://wisp.test/admin/show-client";

    /* 
    $.ajax({
        type: 'POST',
        url: "seleccionar_cliente",
        data: {
            _token: $('#token').val(),
            id: id,
        },
        dataType: 'json',
        success: function (result) {

            cargar_datos_seleccion(result)

        }
    }); */
}
