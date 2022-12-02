@extends('adminlte::page'/* ,['iFrameEnabled' => true] */)
<input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">

@section('content')
<h2 class="mt-3">Materiales</h2>
<div class="card">
    <div class="card-body">
        <div class="btn btn-primary" id="btn_n_m">
            Nuevo material
        </div>

    </div>
</div>
<div class="card">
    <div class="card-body">


        <table class="table" id="tabla_mostrar_materiales">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">marca</th>
                    <th scope="col">modelo</th>
                    <th scope="col">descripcion</th>
                    <th scope="col">accion</th>
                </tr>

            </thead>

        </table>
    </div>
</div>


{{-- ventana modal --}}
@include('admin.materiales.modal_create')

<script type="text/javascript" src="{{asset('js/admin/datatable_espanol.js')}}"></script>
<script src="{{ asset('js/admin/materiales/mostrar/mostrar.js') }}"></script>
<script src="{{ asset('js/admin/materiales/nuevo/nuevo.js') }}"></script>
<script src="{{ asset('js/admin/materiales/eliminar/eliminar.js') }}"></script>
<script src="{{ asset('js/admin/materiales/nuevo/nuevo.js') }}"></script>

@stop
{{-- @section('footer')
{{$material->links()}}
@stop --}}