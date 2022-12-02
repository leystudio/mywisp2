<div class="modal fade" id="nueva_nota"  tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nota</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Formulario --}}
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nota</span>
                    <input id="nota" type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>              
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="guardar">Guardar</button>
            </div>
        </div>
    </div>
</div>

<button type="button" class="btn btn-primary visually-hidden " id="btn_nueva_nota" data-bs-toggle="modal"
    data-bs-target="#nueva_nota">
</button>