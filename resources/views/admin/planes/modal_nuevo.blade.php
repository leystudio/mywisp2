<!-- Modal -->
<div class="modal fade" id="nuevo_plan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Plan</h5>
                <button type="button" class="btn-close btn-close-nuevo-plan" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
                    <input id="nombre_plan" type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Precio</span>
                    <input id="precio_plan" type="number" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Subida <i> - kbps</i></span>
                    <input id="up_plan" type="number" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Bajada <i> - kbps</i></span>
                    <input id="down_plan" type="number" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>





            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary " data-bs-dismiss="modal">Close</button>
                <div class="btn btn-primary" id="guardar_nuevo_plan">Guardar</div>

            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/admin/planes/nuevo/nuevo_desde_clientes.js') }}"></script>