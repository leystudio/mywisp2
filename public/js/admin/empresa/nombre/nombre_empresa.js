function nombre_empresa() {
    $.ajax({
        url: "nombre-empresa",
        type: "POST",
        data: {
            _token: $("#token").val(),
        },
        dataType: "json",
        success: function (nombre_empresa) {
            $("#div_nombre_empresa").html(nombre_empresa.nombre);
        },
        error: function (jqXHR, exception) {
            //si la session se perdio->
            if (jqXHR.status === 419) {
                location.reload();
            }
        },
    });
}
