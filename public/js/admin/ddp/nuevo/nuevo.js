function nuevo_ddp(datatable) {
    //boton nueva nota
    $("#btn_modal_nuevo_ddp").on("click", function () {
        $("#btn_nuevo_ddp").click();
    });

    $("#guardar").on("click", function () {
        if ($("#dia").val()) {
            if ($("#plazo").val()) {
                registrar(datatable);
            } else {
                Swal.fire("Escriba los dias de plazo. sino coloque 0 (cero)");
            }
        } else {
            Swal.fire("Escriba el dia de pago.");
        }
    });
}

function registrar(datatable) {
    const datos = {
        dia: $("#dia").val(),
        plazo: $("#plazo").val(),
        _token: $("#token").val(),
    };

    $.ajax({
        type: "POST",
        url: "nuevo_ddp",
        data: datos,
        dataType: "json",
        success: function (result) {
            if (result) {
                Swal.fire({
                    title: "Registrado !",
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
