window.addEventListener("load", function () {
    mostrar_notas();
});

function mostrar_notas() {
    let datatable = $("#tabla_mostrar_notas").DataTable({
        Response: true,
        autoWidth: false,
        ajax: "/admin/cargar_notas",
        language: espanol,

        columns: [
            {
                data: "id",
            },
            {
                data: "nota",
            },

            {
                defaultContent: `
                <button type="button" class="eliminar mb-2 btn btn-sm btn-danger">Eliminar</button>
                             `,
            },
        ],
    });
    nueva_nota(datatable);
    eliminar(datatable);
    /*  seleccionar(datatable) */
}
