/* enviar los datos al backend */
function sendData(datos, url, datatable) {
   /*  $.ajax({
        type: "POST",
        url: url,
        data: {
            _token: $("#token").val(),
            id: datos,
        },
        dataType: "json",
        success: function (result) {
            result_eliminarCliente(datatable);

            console.log(result);
            cargar_datos_seleccion(result);
        },
        error: function (jqXHR, exception) {
            //si la session se perdio->
            if (jqXHR.status === 419) {
                window.location.href = "http://wisp.test/admin/show-client";
            }
        },
    }); */
}
