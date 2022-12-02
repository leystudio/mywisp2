@extends('adminlte::page'/* ,['iFrameEnabled' => true] */)
<input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="btn btn-primary " id="btn_modal_nn">
                Nueva tarea
            </div>
        </div>
        <div class="col-md-10">

            <table class="table" id="tabla_mostrar_notas">
                <thead>

                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Accion</th>

                    </tr>
                </thead>

            </table>
        </div>
    </div>
</div>
{{-- ventana modal --}}
@include('admin.notas.modal_nueva_nota')

<script type="text/javascript" src="{{asset('js/admin/datatable_espanol.js')}}"></script>
<script src="{{ asset('js/admin/notas/mostrar/mostrar.js') }}"></script>
<script src="{{ asset('js/admin/notas/nueva/nueva.js') }}"></script>
<script src="{{ asset('js/admin/notas/eliminar/eliminar.js') }}"></script>








@endsection