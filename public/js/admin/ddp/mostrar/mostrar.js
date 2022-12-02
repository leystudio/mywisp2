window.addEventListener("load", function () {
    mostrar_ddp();
});

function mostrar_ddp() {
    let datatable = $("#tabla_mostrar_ddp").DataTable({
        Response: true,
        autoWidth: false,
        ajax: "/admin/cargar_ddp",
        language: espanol,

        columns: [
            {
                data: "id",
            },
            {
                data: "dia",
            },
            {
                data: "plazo",
            },
            {
                defaultContent: `
                <div class='btn-group'>
                <button type="button" class="editar mb-2 btn btn-sm btn-secondary">Editar</button>
                <button type="button" class="eliminar mb-2 btn btn-sm btn-danger">Eliminar</button>
                          </div>   `,
            },
        ],
    });
    editar(datatable);
    eliminar(datatable);
    nuevo_ddp(datatable);
    /*  seleccionar(datatable) */
}
