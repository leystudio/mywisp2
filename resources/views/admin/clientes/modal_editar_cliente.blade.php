<div class="modal fade" id="editar_cliente" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- Formulario --}}
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Nombre</span>
                    <input id="nombre" type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Apellido</span>
                    <input id="apellido" type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Telefono</span>
                    <input id="telefono" type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>



                <div>
                    <h3>Plan</h3>
                    <hr>
                    <div id="lista_planes">
                    </div>
                </div>

                <div>
                    <div class="card">
                        <div class="card-header h4">
                            Dia de pago
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <th>#</th>
                                    <th>Dia</th>
                                    <th>Plazo</th>
                                </thead>
                                <tbody id="lista_dia_pago"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <br>

                <div>
                    <h3>Materiales </h3>
                   
                    <table id="tabla_materiales_inst"class="table table-sm table-responsive-sm table-secondary">
                        <thead>
                            <th>Marca</th>
                            <th>modelo</th>
                            <th>propietario</th>
                            <th>Accion</th>
                        </thead>
                        <tbody id="materiales_instalados"></tbody>
                    </table>
                  @include('admin.clientes.editar.table_lista_materiales') 

                </div>

                <br>
                <div id="div_instalation">
                    <h3>Instalacion</h3>
                    <hr>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default"> Direccion</span>
                        <input id="direccion" type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>

                    <div class="input-group mb-3">

                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Costo</span>
                        <input id="costo" readonly type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Fecha</span>
                        <input id="fecha" readonly type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>

                    <hr>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">Comentario</span>
                        <input id="comentario" type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-default">
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="guardar">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<button type="button" class="btn btn-primary visually-hidden btn_editar" data-bs-toggle="modal"
    data-bs-target="#editar_cliente">
</button>