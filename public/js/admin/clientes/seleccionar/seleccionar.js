function seleccionar(datatable) {
    $("#tabla_mostrar_clientes").on("click", ".ver", function () {
        let data = datatable.row($(this).parents()).data();
        id = data.id;
        $.ajax({
            type: "POST",
            url: "seleccionar_cliente",
            data: {
                _token: $("#token").val(),
                id: id,
            },
            dataType: "json",
            success: function (result) {
                cargar_datos_seleccion(result);
            },
            error: function (jqXHR, exception) {
                //si la session se perdio->
                if (jqXHR.status === 419) {
                    location.reload();
                }
            },
        });
    });
}
//datos
function cargar_datos_seleccion(datos) {
    gastos_instalacion = "";
    /////////////////////////////////////materiales
    for (let i = 0; i < datos["gastos"].length; i++) {
        gastos_instalacion +=
            `
        <tr>
            <td>` +
            datos["gastos"][i]["material"]["marca"] +
            `</td>
        <td>` +
            datos["gastos"][i]["material"]["modelo"] +
            `</td>
        <td>` +
            datos["gastos"][i]["propietario"] +
            `</td>
        </tr>`;
    }
    $("#tabla_gastos_instalacion").html("");
    $("#tabla_gastos_instalacion").append(gastos_instalacion);
    document.getElementsByClassName("btn_seleccionar")[0].click(); //abre modal

    //rellena los campos
    document.getElementById("nombre_seleccion").value =
        datos["cliente"]["nombre"];
    document.getElementById("apellido_seleccion").value =
        datos["cliente"]["apellido"];
    document.getElementById("telefono_seleccion").value =
        datos["cliente"]["telefono"];
    $("#plan_cliente").html("");
    $("#plan_cliente").append(
        `
            <div class="m-2">
                <label class="form-check-label">
                <span>` +
            datos["plan_cliente"]["nombre"] +
            `</span>
                <br>
                <span>
                    <i>precio</i>
                    <b>` +
            datos["plan_cliente"]["precio"] +
            `</b>
                    <i>up</i>
                    <b>` +
            datos["plan_cliente"]["up"] +
            `</b>
                    <i>down</i>
                    <b>` +
            datos["plan_cliente"]["down"] +
            `</b>
                </span>                
                </label>
            </div>
`
    );
    //dia de pago
    div_diapago = $("#dia_flujo").html(
        `
    <i>Dia </i>` +
            datos["dia_pago"]["dia"] +
            `<br><i>Dias de plazo</i>` +
            datos["dia_pago"]["plazo"]
    );

    document.getElementById("direccion_seleccion").value =
        datos["instalacion"]["direccion"];
    document.getElementById("comentario_seleccion").value =
        datos["instalacion"]["comentario"];

    document.getElementById("costo_seleccion").value =
        datos["instalacion"]["costo"];

    fecha = datos["cliente"]["created_at"].split("T");
    document.getElementById("fecha_seleccion").value = fecha[0];
}
