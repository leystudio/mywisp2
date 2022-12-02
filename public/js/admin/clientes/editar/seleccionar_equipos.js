function cargar_materiales(instalation_id) {
    //datatable
    let datatable = $("#tabla_seleccionar_materiales").DataTable({
        Response: true,
        bPaginate: false,
        bInfo: false,
        autoWidth: false,
        ajax: "/admin/cargar_materiales",
        language: espanol,

        columns: [
            {
                defaultContent: `
                                    <div class="form-check">
                                        <input class="form-check-input b" type="radio" name="exampleRadios">
                                    </div>
                                    `,
            },
            {
                data: "marca",
            },
            {
                data: "modelo",
            },
        ],
    });

    //detecta el equipo cliqueado para su seleccion
    $("#tabla_seleccionar_materiales").on("click", ".b", function () {
        let data = datatable.row($(this).parents()).data();
        id_equipo = data.id;
        marca = data.marca;
        modelo = data.modelo;
    });

    //detecta el propietario cliqueado para su seleccion
    $(".pp").click(function () {
        id_propietario = $(this)[0].id;
        nombre_propietario = $(this).attr("texto");
    });
    $(".pp")[0].click();

    //agregando datos al array
}

function agregar_material() {
    btnLm_C.click();
    const datos = {
        _token: $("#token").val(),
        instalation_id: instalation_id,
        materiale_id: id_equipo,
        propietario_id: id_propietario,
    };

    guardar(marca, modelo, datos);
}

function guardar(marca, modelo, datos) {
    material = " ";
    $.ajax({
        type: "POST",
        url: "gasto_store",
        data: datos,
        dataType: "json",
        success: function (result) {
            if (result) {
                Swal.fire({
                    title: "ok!",
                    icon: "success",
                });
                //agregar a la lista
                material +=
                    `
                    <tr id=` +
                    result["id"] +
                    `>
                    <td>` +
                    marca +
                    `</td>
                    <td>` +
                    modelo +
                    `</td>
                    <td>` +
                    nombre_propietario +
                    `</td>
                    <td>
                        <div class='btn btn-danger eliminar' id=` +
                    result["id"] +
                    `>eliminar</div>
                    </td>
                    </tr>`;
                $("#materiales_instalados").append(material);
                material = " ";
            }
        },
        error: function (jqXHR, exception) {
            if (jqXHR.status === 419) {
                location.reload();
            }
        },
    });
}
btn_agregar = document.getElementsByClassName("agregar")[0];
btn_agregar.addEventListener("click", function () {
    agregar_material();
});
