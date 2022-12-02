@extends('adminlte::page'/* ,['iFrameEnabled' => true] */)
<input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">


@section('content')
<div class="card mt-3">
    <div class="card-header">

        Estado de clientes
        <hr>
        <div class="row">
            <div class="col">

                <input type="button" class="btn btn-success activos" value='Activos'>
                <input type="button" class="btn btn-danger suspendidos" value='Suspendidos'>
            </div>

        </div>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col"></div>
            </div>

            <div class="row">


                <div class="card-body">

                    <div id="div_tabla_estados"> </div>
                </div>
            </div>

        </div>
    </div>
</div>
{{-- ventana modal --}}
{{-- @include('admin.notas.modal_nueva_nota')

<script src="{{ asset('js/admin/notas/mostrar/mostrar.js') }}"></script>
<script src="{{ asset('js/admin/notas/nueva/nueva.js') }}"></script>--}}

<script src="{{ asset('js/admin/clientes/estados/activos/mostrar/mostrar.js') }}"></script>
<script src="{{ asset('js/admin/clientes/estados/suspendidos/mostrar/mostrar.js') }}"></script>
<script type="text/javascript" src="{{asset('js/admin/datatable_espanol.js')}}"></script>








@endsection