function seleccionar(datatable) {
    //$("#factura").hide();
    url_logo();
    nombre_empresa();
    //nombre de la empresa para la plantilla de factura
    $("#tabla_cobrar").on("click", ".facturar", function () {
        let data = datatable.row($(this).parents()).data();
        print(data);
        id_cliente = data.id;
        nombre_cliente = data.nombre + " " + data.apellido;
        id_cliente = data.id;

        $.ajax({
            type: "POST",
            url: "ver_facturas",
            data: {
                _token: $("#token").val(),
                id: id_cliente,
            },
            dataType: "json",
            success: function (result) {
                listar_facturas(result, nombre_cliente, id_cliente);
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
function listar_facturas(datos, nombre_cliente, id_cliente) {
    lista_facturas = "";
    $("#tabla_lista_facturas").html("");

    if (datos.data.length > 0) {
        for (let i = 0; i < datos.data.length; i++) {
            sessionStorage.setItem(
                "updated_at_" + datos.data[i]["id"],
                datos.data[i]["updated_at"].split("T")[0]
            );
            estado = "<p class='text-danger estado'>vencida</p>";
            classes = "btn btn-sm btn-primary c";
            classes_btnPrint = "invisible print_dish btn btn-sm btn-primary";
            //console.log(datos.data[i]["estado"]);
            if (datos.data[i]["estado"] == 1) {
                estado = "<p class='text-success'>al dia</p>";
                classes_btnPrint = "btn btn-sm btn-info  print";
                classes = "hidden";
            }
            lista_facturas +=
                `
        <tr>
            <td id='idf'>` +
                datos.data[i]["id"] +
                `</td>
            |<td id='monto_lista'>` +
                datos.data[i]["monto"] +
                `</td>
            <td id='fpago'>` +
                datos.data[i]["fecha_pago"] +
                `</td>
             <td id='f_limite_pago'>` +
                datos.data[i]["vence"] +
                `</td>
             <td class='estado_t'>` +
                estado +
                `</td>
             <td>
             <div>
                <input type='button' value='cobrar' id=` +
                datos.data[i]["id"] +
                ` class='` +
                classes +
                `'>
            <input type='button' value='Ver' id=` +
                datos.data[i]["id"] +
                ` class='` +
                classes_btnPrint +
                `'>
            </div></td>
        </tr>`;
        }
    } else {
        lista_facturas =
            '<tr class="alert alert-info"><td>No se han generado facturas.</td></tr>';
    }
    $("#tabla_lista_facturas").append(lista_facturas);
    document.getElementsByClassName("btn_modal_facturas")[0].click(); //abre modal
    $("#facturasLabel").html(nombre_cliente);
    cobrar(id_cliente);
}
