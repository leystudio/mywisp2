window.addEventListener("load", function () {
    //datatable
 
    let datatable = $("#tabla_seleccionar_materiales").DataTable({
        "bPaginate": false,
        Response: true,
        autoWidth: false,
        ajax: "/admin/cargar_materiales",
        language: espanol,

        columns: [{
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

    nuevo_material(datatable);
 

    /* crear array bidimensional para almacenar los los materiales con su duenio */
    materiales = [];
 

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

    document
        .getElementsByClassName("agregar")[0]
        .addEventListener("click", function () {
            materiales.push([
                id_equipo,
                marca+ ' '+modelo,
                id_propietario,
                nombre_propietario,
            ]);
            /*   lista_tabla_Equipos.innerHTML = "";
            lista_tabla_propietario.innerHTML = "";
            btn_elimibar.innerHTML = "";
 */
            actualizaListaMateriales();


        });

    //elimina material

    function act_eliminar() {

        $('.drop').on('click', function () {

            id = $(this).attr('id');
            materiales.splice(id, 1)
            actualizaListaMateriales();
        })
    }

    function actualizaListaMateriales() {
        lista = '';
        table = $(".table_materiales_select");
        table.html(' ');
        for (i = 0; i < materiales.length; i++) {
            lista +=
                `<tr>
                    <td>` +
                materiales[i][1] +
                `</td>
                    <td>` +
                materiales[i][3] +
                `</td>
                    <td><button class="btn btn-danger btn-sm drop" id='` + i + `'>Eliminar</button></td>
                </tr>`;
        }

        if (materiales.length) {
            table.append(lista)

            act_eliminar()
        }
    }
});
