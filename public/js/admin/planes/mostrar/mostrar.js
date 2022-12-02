window.addEventListener("load", function () {
    //mostrar

    mostrar_planes();
});

function mostrar_planes() {
    let datatable = $("#tabla_mostrar_planes").DataTable({
        order: [],
        Response: true,
        autoWidth: false,
        ajax: "/admin/load_planes",
        language: espanol,

        columns: [
            {
                data: "nombre",
            },
            {
                data: "up",
            },
            {
                data: "down",
            },
            {
                data: "precio",
            },
            {
                defaultContent: `
                 
                <button type="button" class="editar_plan mb-2  btn btn-sm btn-secondary">Editar</button>
                <button type="button" class="eliminar_plan mb-2 btn btn-sm btn-danger">Eliminar</button>
                `,
            },
        ],
    });
    eliminar(datatable);
    editar(datatable);
}
