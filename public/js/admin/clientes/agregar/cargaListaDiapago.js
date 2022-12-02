function listarDiapago() {
    diaspago = "";
    $.ajax({
        type: "POST",
        url: "listarDiapago",
        data: {
            _token: $("#token").val(),
        },
        dataType: "json",
        success: function (result) {
            if (result.length > 0) {
                diaspago += `
                <table class="table table-hover">
                <thead>
                    <th>#</th>
                    <th>Dia</th>
                    <th>Plazo</th>
                </thead>
                <tbody>
                `;
                for (i = 0; i < result.length; i++) {
                    diaspago +=
                        `
                       <tr>
                        <td><input class="form-check-input check_diapago" type="radio" name="diapago" id=` +
                        result[i]["id"] +
                        `>
                        </td>
                        <td>` +
                        result[i]["dia"] +
                        `</td>
                        <td>` +
                        result[i]["plazo"] +
                        `</td>
                    </tr>
            `;
                }
                diaspago += `
                </tbody>
            </table>
                `;
                $("#diapago_contenedor").html(diaspago);
                $(".check_diapago").click(function () {
                    diapago_id = $(this).attr("id");
                });
                $(".check_diapago")[0].click();
                $(".crear").show(150);
            } else {
                $(".crear").hide();

                $("#diapago_contenedor").html(`
                <div class='alert-info rounded-3'> <p class='m-2'>Para continuar primero debe registrar al menos un dia de pago, el cual se le asignará al cliente.</p></div>
                `);
            }
        },
        error: function (jqXHR, exception) {
            if (jqXHR.status === 419) {
                location.reload();
            }
        },
    });
}
