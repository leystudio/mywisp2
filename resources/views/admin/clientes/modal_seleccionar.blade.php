<div class="modal fade" id="seleccionar_cliente"  tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Formulario --}}
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
                    <input id="nombre_seleccion" readonly type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Apellido</span>
                    <input id="apellido_seleccion" readonly type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Telefono</span>
                    <input id="telefono_seleccion" readonly type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>



                <div class="mb-3">
                    <i>Plan</i>
                    <div id="plan_cliente">
                    </div>
                </div>
                 <div class="mb-3">
                    <i>Pago</i>
                    <div id="dia_flujo">
                    </div>
                </div>

                <hr>
                <div id="div_instalation">
                    <i>Instalacion</i>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default"> Direccion</span>
                        <input id="direccion_seleccion" readonly  type="text" class="  form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Costo</span>
                        <input id="costo_seleccion" readonly  readonly type="text  " class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha</span>
                        <input id="fecha_seleccion" readonly  readonly type="text  " class="form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>

                 
                    
                    <i>Materiales</i>
                    <table class="table table-sm table-responsive-sm table-secondary">
                        <thead>
                            <th>Marca</th>
                            <th>modelo</th>
                            <th>propietario</th>
                        </thead>
                        <tbody id="tabla_gastos_instalacion"></tbody>
                    </table>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Comentario</span>
                        <input id="comentario_seleccion"  type="text" readonly  class=" form-control"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                </div>


            </div>
            
        </div>
    </div>
</div>

<button type="button" class="btn btn-primary visually-hidden btn_seleccionar" data-bs-toggle="modal"
    data-bs-target="#seleccionar_cliente">
</button>