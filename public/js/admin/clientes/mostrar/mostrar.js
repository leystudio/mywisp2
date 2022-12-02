window.addEventListener("load", function () {
    //mostrar
    mostrar_clientes();
});

function mostrar_clientes() {
    let datatable = $("#tabla_mostrar_clientes").DataTable({
        order: [],
        Response: true,
        autoWidth: false,
        ajax: "/admin/clientes_ajax",
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
            {
                data: "telefono",
            },
            {
                defaultContent: `
                    <button type="button" class="ver mb-2  btn btn-sm btn-primary">Ver</button>
                    <button type="button" class="editar mb-2  btn btn-sm btn-secondary">Editar</button>
                    <button type="button" class="eliminar mb-2 btn btn-sm btn-danger">Eliminar</button>
                                 `,
            },
        ],
    });
    eliminar(datatable);
    editar(datatable);
    seleccionar(datatable);
}
