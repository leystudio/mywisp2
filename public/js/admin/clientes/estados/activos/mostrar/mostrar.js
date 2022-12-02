window.addEventListener("load", function () {
    $(".activos").click(function () {
        activos();
        $(".suspendidos").attr("disabled", false);
        $(".activos").attr("disabled", true);
    });
    $(".activos").click();
});

function activos() {
    //crea tabla
    $("#div_tabla_estados").html(`
<table class="table table-success" id="tabla_estado">
<thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
    </tr>
</thead>

</table>
`);
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
            language: espanol,

            ajax: { url: "/admin/clientes_activos" },
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
}
