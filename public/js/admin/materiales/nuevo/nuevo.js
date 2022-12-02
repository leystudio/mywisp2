function nuevo_material(datatable) {
    //boton nueva nota
    $("#btn_n_m").on("click", function () {
        $("#btn_nuevo_material").click();
    });

    $("#guardar").on("click", function () {
        if ($("#marca").val()) {
            if ($("#modelo").val()) {
                registrar(datatable);
            } else {
                Swal.fire("debe rellenar los campos necesarios");
            }
        } else {
            Swal.fire("debe rellenar los campos necesarios");
        }
    });
}

function registrar(datatable) {
    const datos = {
        marca: $("#marca").val(),
        modelo: $("#modelo").val(),
        descripcion: $("#descripcion").val(),
        _token: $("#token").val(),
    };

    $.ajax({
        type: "POST",
        url: "material_store",
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
