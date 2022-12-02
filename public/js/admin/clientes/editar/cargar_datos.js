function cargar_tabla(instalation_id) {
    $("#t_s_e").html("");

    $.ajax({
        type: "POST",
        url: "tabla_001",
        data: {
            _token: $("#token").val(),
        },
        dataType: "html",
        success: function (result) {
            $("#t_s_e").html(result);
            cargar_materiales(instalation_id);
        },
        error: function (jqXHR, exception) {
            if (jqXHR.status === 419) {
                location.reload();
            }
        },
    });
}

function cargar_datos(datos) {
    //abre modal
    document.getElementsByClassName("btn_editar")[0].click();

    document.getElementById("nombre").value = datos["cliente"]["nombre"];
    document.getElementById("apellido").value = datos["cliente"]["apellido"];
    document.getElementById("telefono").value = datos["cliente"]["telefono"];
    plan_id = datos["cliente"]["plan_id"];
    cliente_id = datos["cliente"]["id"];
    instalation_id = datos["instalacion"]["id"];

    frame = document.getElementById("lista_planes");
    $("#lista_planes").html("");
    for (let i = 0; i < datos["planes"].length; i++) {
        $("#lista_planes").append(
            `
            <div class="form-check border border-info m-2 border-rounde-2">
                    <input class="form-check-input check_plan"  type="radio" name="plan" id="` +
                datos["planes"][i]["id"] +
                `">
                    <label class="form-check-label" for="` +
                datos["planes"][i]["id"] +
                `">
                    <span>` +
                datos["planes"][i]["nombre"] +
                `</span>
                    <br>
                    <span>
                        <i>precio</i>
                        <b>` +
                datos["planes"][i]["precio"] +
                `</b>
                        <i>up</i>
                        <b>` +
                datos["planes"][i]["up"] +
                `</b>
                        <i>down</i>
                        <b>` +
                datos["planes"][i]["down"] +
                `</b>
                    </span>               
                    
                    </label>
                </div>
            `
        );
    }
    $("#" + datos["plan_cliente"]["id"]).prop("checked", true);
    dias_pago(datos);
    console.log(datos["plan_cliente"]["id"]);

    $("input[name=plan]").click(function () {
        plan_id = $(this).attr("id");
        //console.log(plan_id);
    });

    document.getElementById("direccion").value =
        datos["instalacion"]["direccion"];
    document.getElementById("comentario").value =
        datos["instalacion"]["comentario"];

    document.getElementById("costo").value = datos["instalacion"]["costo"];
    fecha = datos["cliente"]["created_at"].split("T");
    document.getElementById("fecha").value = fecha[0];

    /////////////////////////////////////materiales
    gastos = datos["materiales"].length;

    function cargar_gastos() {
        //materiales
        materiales = $("#materiales_instalados");
        materiales.html("");
        if (datos["materiales"].length) {
            for (let i = 0; i < datos["materiales"].length; i++) {
                materiales +=
                    `<tr id=` +
                    datos["materiales"][i]["gasto_id"] +
                    `>
        <td> ` +
                    datos["materiales"][i]["material"]["marca"] +
                    `</td>
        <td>` +
                    datos["materiales"][i]["material"]["modelo"] +
                    `</td>
        <td>` +
                    datos["materiales"][i]["propietario"] +
                    `</td>
        <td><div class='btn btn-danger eliminar' id=` +
                    datos["materiales"][i]["gasto_id"] +
                    `>eliminar</div></td>
        </tr> `;
            }
            $("#materiales_instalados").append(materiales);
        } else {
            $("#tabla_materiales").html("");
        }
    }
    cargar_gastos();

    cargar_tabla(instalation_id);
    //eliminar gasto
    $(".eliminar").click(function () {
        id_gasto = $(this).attr("id");

        (async () => {
            const datos = {
                id: id_gasto,
                _token: $("#token").val(),
            };

            const { value: confirmar } = await Swal.fire({
                title: "Eliminar este material?",
                icon: "warning",
                input: "checkbox",
                inputPlaceholder: "Aceptar",
                confirmButtonText: "Eliminar",
                confirmButtonColor: "#dd6b55",
                inputValidator: (result) => {
                    return !result && "Necesita aceptar para continuar.";
                },
            });
            if (confirmar) {
                $.ajax({
                    type: "POST",
                    url: "eliminar_gasto",
                    data: datos,
                    dataType: "json",
                    success: function (result) {
                        if (result) {
                            Swal.fire({
                                title: "ok!",
                                icon: "success",
                            });
                            $("#" + id_gasto).remove();
                        }
                    },
                    error: function (jqXHR, exception) {
                        //si la session se perdio->
                        if (jqXHR.status === 419) {
                            location.reload();
                        }
                    },
                });
            }
        })();
    });
}
