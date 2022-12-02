window.addEventListener("load", function () {
    //carga la lista de planes
    listarPlanes();
    //carga la lista de dias de pago
    listarDiapago();

    document
        .getElementsByClassName("crear")[0]
        .addEventListener("click", function () {
            //verifica campos
            if (
                verificar_campos([
                    id_plan,
                    diapago_id,
                    document.getElementById("nombre").value,
                    document.getElementById("apellido").value,
                    document.getElementById("telefono").value,
                    document.getElementById("direccion").value,
                ]) != 0
            ) {
                const datos = {
                    nombre: document.getElementById("nombre").value,
                    apellido: document.getElementById("apellido").value,
                    telefono: document.getElementById("telefono").value,
                    direccion: document.getElementById("direccion").value,
                    gps: document.getElementById("gps").value,
                    comentario: document.getElementById("comentario").value,
                    costo: document.getElementById("costo").value,
                    plan_id: id_plan,
                    ddp: diapago_id,
                    materialesIns: materiales,
                    _token: $("#token").val(),
                };
                /* enviar los datos al backend */
                $.ajax({
                    type: "POST",
                    url: "/admin/store",
                    data: datos,
                    dataType: "json",
                    success: function (result) {
                        if (result) {
                            presentar(result["id"]);
                            Swal.fire({
                                title: "Registrado !",
                                icon: "success",
                            });
                        }
                    },
                    error: function (jqXHR, exception) {
                        //si la session se perdio->
                        if (jqXHR.status === 419) {
                            location.reload();
                        }
                    },
                });
            } else {
                Swal.fire("falta informacion necesaria.!");
            }
        });
});
