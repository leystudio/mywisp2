<!-- Button trigger modal -->
<button type="button" class="btn btn-primary visually-hidden btn_modal_facturas" data-bs-toggle="modal"
    data-bs-target="#facturas">

</button>

<!-- Modal -->
<div class="modal fade" id="facturas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="facturasLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Caja</h3>
                <h5 class="modal-title" id="facturasLabel"></h5>

            </div>
            <div class="modal-body">

                @include('admin.caja.cobrar.factura')
                <div class="card">
                    <div class="card-header">
                        Lista de facturas
                    </div>
                    <div class="card-body alerta">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Monto</th>
                                        <th>Se ha generado</th>
                                        <th>Limite de pago</th>
                                        <th>Estado</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody id="tabla_lista_facturas"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <i>
                            <b class="text-success">
                                ((( SimpleWisp )))

                            </b>
                        </i>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-danger cerrar_mef" data-bs-dismiss="modal">cerrar</button>

                </div>
            </div>
        </div>
    </div>