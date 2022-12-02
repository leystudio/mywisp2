@extends('adminlte::page')
<input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">


@section('content')
<div class="h2 m-3">Nuevo cliente</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h4">Informacion</div>
                <div class="card-body">
                    @include('admin.clientes.agregar.informacion')

                </div>
            </div>
        </div>

        <div class="col-md-4">
            {{-- plan --}}
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card ">
                            @include('admin.clientes.agregar.planes')
                            {{-- modal para nuevo plan --}}
                        </div>
                        @include('admin.planes.modal_nuevo')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            @include('admin.clientes.agregar.diaspago')

        </div>

        <div class="col">
            @include('admin.clientes.agregar.materiales')

        </div>
    </div>
    <div class="row">
        <div class="col d-flex justify-center">
            <h4 class="btn btn-lg btn-primary crear m-3">Registrar</h4>
        </div>
    </div>
</div>

{{-- ventana modal --}}
@include('admin.clientes.agregar.modal_listaEquipos')
@include('admin.materiales.modal_create')


<script type="text/javascript" src="{{asset('js/admin/datatable_espanol.js')}}"></script>
<script src="{{ asset('js/admin/clientes/agregar/cargaListaDiapago.js') }}"></script>
<script src="{{ asset('js/admin/clientes/agregar/seleccionar_equipos.js') }}"></script>
<script src="{{ asset('js/admin/clientes/agregar/cargaListaPlanes.js') }}"></script>
<script src="{{ asset('js/admin/ddp/nuevo/nuevo_desde_clientes.js') }}"></script>
<script src="{{ asset('js/admin/clientes/agregar/datos.js') }}"></script>
<script src="{{ asset('js/admin/materiales/nuevo/nuevo.js') }}"></script>
<script src="{{ asset('js/admin/clientes/agregar/presentar.js') }}"></script>
@endsection