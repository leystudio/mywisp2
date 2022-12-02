@extends('adminlte::page'/* ,['iFrameEnabled' => true] */)
<input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">


@section('content')

<div class="container">
    <div class="row">
        <div class="row">
            <div class="col m-4">
                <i>

                    <h4><b>Caja</b>.Facturas</h4>
                </i>
                {{-- <div class="card mt-5">
                    <div class="card-body">
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="col-md-10">

            <table class="table" id="tabla_cobrar">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Facturas</th>

                    </tr>
                </thead>

            </table>
        </div>
    </div>
</div>
{{-- ventana modal --}}
@include('admin.caja.cobrar.modal_cobrar')

<script type="text/javascript" src="{{asset('js/admin/datatable_espanol.js')}}"></script>
<script src="{{ asset('js/admin/caja/cobrar/seleccionar_cliente.js') }}"></script>
<script src="{{ asset('js/admin/caja/cobrar/seleccionar.js') }}"></script>
<script src="{{ asset('js/admin/caja/cobrar/cobrar.js') }}"></script>
<script src="{{ asset('js/admin/caja/cobrar/print.js') }}"></script>
<script src="{{ asset('js/admin/logo/url_logo.js') }}"></script>
<script src="{{ asset('js/admin/empresa/nombre/nombre_empresa.js') }}"></script>
{{-- url logo --}}
@endsection