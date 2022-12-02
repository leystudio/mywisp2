window.addEventListener("load", function () {
    $.fn.dataTable.ext.errMode = "none";
    let datatable = $("#tabla_cobrar")
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

            ajax: { url: "/admin/cobrar_dt" },
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
                {
                    defaultContent: `
                <div class='btn-group'>
                <button type="button" class="ver_facturas mb-2 btn btn-sm btn-primary facturar">Ver</button>
                           </div>   `,
                },
            ],
        });
    seleccionar(datatable);
});
