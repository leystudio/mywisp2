@extends('adminlte::page'/* ,['iFrameEnabled' => true] */)
<input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="btn btn-primary " id="btn_modal_nuevo_ddp">
                Nuevo dia de pago
            </div>
        </div>
        <div class="col-md-10">

            <table class="table" id="tabla_mostrar_ddp">
                <thead>

                    <tr>
                        <th scope="col">Id</th>

                        <th scope="col">Dia de pago</th>
                        <th scope="col">Dias de plazo</th>
                        <th scope="col">Accion</th>

                    </tr>
                </thead>

            </table>
        </div>
    </div>
</div>
{{-- ventana modal --}}
@include('admin.ddp.modal_nuevo_ddp')
@include('admin.ddp.modal_editar')

<script type="text/javascript" src="{{asset('js/admin/datatable_espanol.js')}}"></script>
<script src="{{ asset('js/admin/ddp/mostrar/mostrar.js') }}"></script>
<script src="{{ asset('js/admin/ddp/nuevo/nuevo.js') }}"></script>
<script src="{{ asset('js/admin/ddp/eliminar/eliminar.js') }}"></script>
<script src="{{ asset('js/admin/ddp/editar/editar.js') }}"></script>

@endsection