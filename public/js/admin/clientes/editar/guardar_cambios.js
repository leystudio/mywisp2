document.getElementById("guardar").addEventListener("click", function () {
    const datos_cambiados = {
        nombre: document.getElementById("nombre").value,
        apellido: document.getElementById("apellido").value,
        telefono: document.getElementById("telefono").value,
        plan_id: plan_id,
        ddp: diapago_id,
        instalation_id: instalation_id,
        direccion: document.getElementById("direccion").value,
        comentario: document.getElementById("comentario").value,
        _token: $("#token").val(),
        id: cliente_id,
    };
    guarda_cambios(datos_cambiados);
});

function guarda_cambios(datos_cambiados) {
    (async () => {
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
                url: "store_editar_cliente",
                data: datos_cambiados,
                dataType: "json",
                success: function (result) {
                    if (result == 1) {
                        $(".close").click();
                        Swal.fire("ok");
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
