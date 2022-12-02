function nueva_nota(datatable) {
    //boton nueva nota
    $("#btn_modal_nn").on("click", function () {
        $("#btn_nueva_nota").click();
    });

    $("#guardar").on("click", function () {
        if ($("#nota").val()) {
            registrar(datatable);
        } else {
            Swal.fire("Escriba una nota.!!!");
        }
    });
}
function registrar(datatable) {
    const datos = {
        nota: $("#nota").val(),
        _token: $("#token").val(),
    };

    $.ajax({
        type: "POST",
        url: "nueva_nota",
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
