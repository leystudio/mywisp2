window.addEventListener("load", function () {
    $(".suspendidos").click(function () {
        $(".activos").attr("disabled", false);
        $(".suspendidos").attr("disabled", true);

        $("#div_tabla_estados").html(" cargando....");
        //crea tabla
        $("#div_tabla_estados").html(`
     <table class="table table-danger" id="tabla_estado">
     <thead>
         <tr>
             <th scope="col">Id</th>
             <th scope="col">Nombre</th>
             <th scope="col">Apellido</th>
         </tr>
     </thead>
     
     </table>
     `);

        suspendidos();
    });
});

function suspendidos() {
    $.fn.dataTable.ext.errMode = "none";
    let datatable = $("#tabla_estado")
        .on("xhr.dt", function (e, settings, json, xhr) {
            if (xhr.status === 401) {
                location.reload();
            }
        })
        .DataTable({
            order: [],
            Response: true,
            autoWidth: false,
            ajax: { url: "/admin/clientes_suspendidos" },
            language: espanol,

            columns: [
                {
                    data: "id",
                },
                {
                    data: "nombre",
                },
                {
                    data: "apellido",
                },
                /*    {
                'defaultContent': `
                <div class='btn-group'>
                <button type="button" class="editar mb-2 btn btn-sm btn-secondary">Editar</button>
                <button type="button" class="eliminar mb-2 btn btn-sm btn-danger">Eliminar</button>
                          </div>   `
            }, */
            ],
        });
    /*  editar(datatable)
    eliminar(datatable)
    nuevo_flujo(datatable)
 seleccionar(datatable) */
}
