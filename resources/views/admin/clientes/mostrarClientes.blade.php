@extends('adminlte::page'/* ,['iFrameEnabled' => true] */)
<input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">

@section('content')
@include('admin/clientes/modal_editar_cliente')
@include('admin/clientes/modal_seleccionar')
<div class="card  mt-3">

    <div class="card-header">

        Todos los clientes
    </div>
    <div class="card-body">


        <table class="table table-sm" id="tabla_mostrar_clientes">
            <thead>

                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

        </table>
    </div>
</div>
<script type="text/javascript" src="{{asset('js/admin/datatable_espanol.js')}}"></script>

<script src="{{ asset('js/admin/clientes/mostrar/mostrar.js') }}"></script>

<script src="{{ asset('js/admin/clientes/seleccionar/seleccionar.js') }}"></script>
<script src="{{ asset('js/admin/clientes/editar/editar_cliente.js') }}"></script>
<script src="{{ asset('js/admin/clientes/editar/cargar_datos.js') }}"></script>
<script src="{{ asset('js/admin/clientes/editar/seleccionar_equipos.js') }}"></script>
<script src="{{ asset('js/admin/clientes/editar/guardar_cambios.js') }}"></script>

<script src="{{ asset('js/admin/clientes/mostrar/eliminar.js') }}"></script>
<script src="{{ asset('js/admin/backend/send_data.js') }}"></script>
{{--lista dias de pago --}}
<script src="{{ asset('js/admin/clientes/editar/diaspago.js') }}"></script>


@stop