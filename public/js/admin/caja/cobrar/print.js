function print(data) {
    $(".contenedor_factura").hide();s
    $(".btn_cerrar_factura").click(function () {
        $(".contenedor_factura").hide(); //esconde el contenedor
    });

    $("#tabla_lista_facturas").on("click", ".print", function () {
        clicked = $(this).parent().parent().parent();
        id_cliente = data.id;
        nombre_cliente = data.nombre + " " + data.apellido;
        //limpiar campos de factura
        //rellenar campos de la factura
        $("#monto").html("");
        $("#fecha_pago").html("");
        $("#fecha_limite").html("");

        $("#nombre_usuario").html("");
        $("#id_usuario").html("");
        $("#descripcion_servicio").html("");

        //rellenar campos de la factura
        $("#monto").html(clicked.find("#monto_lista").html());
        $("#fecha_pago").html(clicked.find("#fpago").html());
        $("#fecha_limite").html(clicked.find("#f_limite_pago").html());

        $("#nombre_usuario").html(nombre_cliente);
        $("#id_usuario").html(data.id);
        $("#descripcion_servicio").html("Internet fijo");
        $(".contenedor_factura").show(100);

        //FECHA DE PAGO
        $("#f_de_p").html(
            sessionStorage.getItem("updated_at_" + clicked.find("#idf").html())
        );
    });
    //boton para  imprimir facturas
    $(".btn_imprimir_factura").click(function () {
        ficha = "";
        ventimp = "";
        var ficha = document.getElementById("factura");
        var ventimp = window.open();
        ventimp.document.write(ficha.innerHTML);
        ventimp.document.close();
        ventimp.focus();
        ventimp.onload = function () {
            ventimp.print();
            ventimp.close();
        };
    });
}
