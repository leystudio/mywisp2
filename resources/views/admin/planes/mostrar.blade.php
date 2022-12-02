@extends('adminlte::page'/* ,['iFrameEnabled' => true] */)
<input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">

@section('content')

<div class="card">
    <div class="card-header ">
        <div class="d-flex justify-content-between">

            <h4>Planes</h4>
            <button type="button" class="btn btn-link btn_nuevo_plan" data-bs-toggle="modal"
                data-bs-target="#nuevo_plan">
                Registrar plan
            </button>
        </div>
    </div>
</div>
<table class="table" id="tabla_mostrar_planes">
    <thead>

        <tr>

            <th scope="col">Nombre</th>
            <th scope="col">Up</th>
            <th scope="col">Down</th>
            <th scope="col">Precio</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>

</table>

@include('admin.planes.modal_editar')
@include('admin.planes.modal_nuevo')


<script type="text/javascript" src="{{asset('js/admin/datatable_espanol.js')}}"></script>


<script src="{{ asset('js/admin/planes/mostrar/mostrar.js') }}"></script>
<script src="{{ asset('js/admin/planes/editar/editar.js') }}"></script>
<script src="{{ asset('js/admin/planes/eliminar/eliminar.js') }}"></script>


@stop