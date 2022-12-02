<div class="modal fade" id="agregar_equipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        {{-- titulo --}}
        <h5 class="modal-title" id="exampleModalLabel">Seleccione materiales</h5>
        <button type="button" class="btn-close visually-hidden" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{-- tabla --}}
        @include('admin.clientes.agregar.table_lista_materiales')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary agregar" data-bs-dismiss="modal">Añadir a la lista</button>
      </div>
    </div>
  </div>
</div>