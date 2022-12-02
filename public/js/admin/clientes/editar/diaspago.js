function dias_pago(datos) {
    //dia de pago
    $("#lista_dia_pago").html("");
    for (let i = 0; i < datos["ddp"].length; i++) {
        $("#lista_dia_pago").append(
            ` <tr>
            <td>
            <input class="form-check-input check_diapago"  type="radio" name="diapago" id="` +
                datos["ddp"][i]["id"] +
                `">
            </td>
            <td>` +
                datos["ddp"][i]["dia"] +
                `</td> 
             <td>` +
                datos["ddp"][i]["plazo"] +
                `</td>
             <tr>`
        );
    }
    $("#" + datos["dia_pago"]["id"]).prop("checked", true);
    $("input[name=diapago]").click(function () {
        diapago_id = $(this).attr("id");
    });
    $("input[name=diapago]")[datos["dia_pago"]["id"] - 1].click();
}
