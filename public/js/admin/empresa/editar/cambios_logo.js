function cambios_logo() {
    //selecciona archivo logo
    $(".btn_select_logo").on("click", function () {
        $("#select_logo").click();
    });
    //cancelar archivo logo
    $(".btn_cancel_logo").on("click", function () {
        $("#select_logo").val("");
        src_logo_bol = false;

        v_c_logo();
    });
    btnGuardar = $(".btn_cambiar_logo").hide();
    btnCancelar = $(".btn_cancel_logo").hide();

    logo_src = $("#select_logo").val();
    src_logo_bol = false;

    $("#select_logo").on("change", function () {
        if (logo_src != $(this).val()) {
            src_logo_bol = true;
        } else {
            src_logo_bol = false;
        }
        v_c_logo();
    });

    function v_c_logo() {
        if (src_logo_bol) {
            btnGuardar.show();
            btnCancelar.show();
        } else {
            btnGuardar.hide();
            btnCancelar.hide();
        }
    }
}
