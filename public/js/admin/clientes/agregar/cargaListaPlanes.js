function listarPlanes() {
    planes = "";
    $.ajax({
        type: "POST",
        url: "listarPlanes",
        data: {
            _token: $("#token").val(),
        },
        dataType: "json",
        success: function (result) {
            if (result.length > 0) {
                for (i = 0; i < result.length; i++) {
                    planes +=
                        `<div class="form-check  bg-secondary listaPlanes rounded p-2 mb-2" id_plan=` +
                        result[i]["id"] +
                        `>
                        <input class="form-check-input item_plan" name="planes" type="radio" id=` +
                        result[i]["id"] +
                        ` value=` +
                        result[i]["precio"] +
                        `>
                        <label class="form-check-label" for=` +
                        result[i]["id"] +
                        `> 
                            ` +
                        result[i]["nombre"] +
                        `
                            <div class="d-flex">
                                    <span class="mx-3">
                                        precio: 
                                        <b>` +
                        result[i]["precio"] +
                        `</b>
                                    </span>
                                    <span>Up: 
                                        <b>` +
                        result[i]["up"] +
                        `</b>
                                    </span>
                                    <span>Down: 
                                        <b>` +
                        result[i]["down"] +
                        `</b>
                                    </span>
                            </div>
                        </label>
                    </div>
            `;
                }

                $("#plan_contenedor").html("");
                $("#plan_contenedor").html(planes);
                select_plan = document.getElementById("plan_contenedor");
                select_plan.addEventListener("click", function (e) {
                    id_plan = e.path[1].getAttribute("id_plan");
                });
                $(".item_plan")[0].click();
                $(".crear").show(150);
            } else {
                $(".crear").hide();

                $("#plan_contenedor").html(`
                <div class='alert-info rounded-3'> <p class='m-2'>Para continuar primero debe registrar al menos un plan, el cual se le asignará al cliente.</p></div>
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
