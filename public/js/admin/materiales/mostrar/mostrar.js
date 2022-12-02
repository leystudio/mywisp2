window.addEventListener('load', function () {

    mostrar_materiales()
})

function mostrar_materiales() {

    let datatable = $('#tabla_mostrar_materiales').DataTable({
        Response: true,
        autoWidth: false,

        "ajax": "/admin/cargar_materiales",
        "language": espanol,
        
        "columns": [

            {
                data: "id"
            },
            {
                data: "marca"
            },
            {
                data: "modelo"
            },
            {
                data: "descripcion"
            },

            {
                'defaultContent': `
                <button type="button" class="eliminar mb-2 btn btn-sm btn-danger">Eliminar</button>
                             `
            },

        ],


    })
   
    nuevo_material(datatable)
    eliminar(datatable)
    /*  seleccionar(datatable) */

}
