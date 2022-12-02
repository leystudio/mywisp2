<!-- Button trigger modal -->
<button type="button" class="btn btn-primary visually-hidden btn_edt_plazo" data-bs-toggle="modal"
    data-bs-target="#editar_ddp">

</button>

<!-- Modal -->
<div class="modal fade" id="editar_ddp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editar_ddpLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editar_ddpLabel">Editar</h5>
            </div>
            <div class="modal-body">
                <div class="input-group input-group-lg mb-3">
                    <div class="input-group-text">Dias de plazo</div>
                    <input type="number" class="form-control plazo_edit" id="plazo">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cerrar_mef" data-bs-dismiss="modal">cancelar</button>
                <button type="button" id="guardar_cambios" class="btn btn-primary">guardar</button>
            </div>
        </div>
    </div>
</div>