<div class="modal fade" id="nuevo_ddp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dias de pago</h5>
                <button type="button" class="close-nuevo_diapago" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Formulario --}}
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Dia</span>
                    <input id="dia" type="number" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Plazo</span>
                    <input id="plazo" type="number" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="guardar_diapago">Guardar</button>
            </div>
        </div>
    </div>
</div>