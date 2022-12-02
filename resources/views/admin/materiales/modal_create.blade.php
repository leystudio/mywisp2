<div class="modal fade" id="nuevo_material" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Material</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <span class="input-group-text">Marca</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="marca"
                        id="marca">

                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text">modelo</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="modelo"
                        id="modelo">

                </div>
                <div class="input-group mb-3">

                    <span class="input-group-text">descripcion</span>
                    <input type="text" class="form-control" aria-label="Sizing example input" id="descripcion"
                        aria-describedby="descripcion">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="guardar">Guardar</button>
            </div>
        </div>
    </div>
</div>

<button type="button" class="btn btn-primary visually-hidden " id="btn_nuevo_material" data-bs-toggle="modal"
    data-bs-target="#nuevo_material">
</button>