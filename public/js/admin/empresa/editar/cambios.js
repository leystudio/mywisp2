window.addEventListener("load", function () {
    btnGuardar = $(".btn_guardar").attr("disabled", true);

    nombre_db = $("#nombre").val();
    slogan_db = $("#slogan").val();
    direccion_db = $("#direccion").val();
    rnc_db = $("#rnc").val();

    nombre_bol = false;
    slogan_bol = false;
    direccion_bol = false;
    rnc_bol = false;

    $("#nombre").on("change", function () {
        if (nombre_db != $(this).val()) {
            nombre_bol = true;
        } else {
            nombre_bol = false;
        }
        v_c();
    });
    $("#slogan").on("change", function () {
        if (slogan_db != $(this).val()) {
            slogan_bol = true;
        } else {
            slogan_bol = false;
        }
        v_c();
    });
    $("#direccion").on("change", function () {
        if (direccion_db != $(this).val()) {
            direccion_bol = true;
        } else {
            direccion_bol = false;
        }
        v_c();
    });
    $("#rnc").on("change", function () {
        if (rnc_db != $(this).val()) {
            rnc_bol = true;
        } else {
            rnc_bol = false;
        }
        v_c();
    });

    function v_c() {
        if (nombre_bol || slogan_bol || direccion_bol || rnc_bol) {
            btnGuardar = $(".btn_guardar").attr("disabled", false);
        } else {
            btnGuardar = $(".btn_guardar").attr("disabled", true);
        }
    }
    guardar_cambios();
    cambios_logo();
});
