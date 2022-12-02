@extends('adminlte::page'/* ,['iFrameEnabled' => true] */)
<input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">

@foreach ($empresa as $item)
@section('content')

<div class="container">
    <div class="row">
        <div class="col mt-3">
            <h2 for="" class="form-label"> Datos de mi empresa</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
           @include('admin.empresa.mostrar.editar.form_logo')
        </div>
        
    </div>
    <div class="row">
        <div class="col">
            <div class="card mt-4 form_edit">
                <div class="card-body ">
                    <div class="form-group">
                        <label class="form-label">Nombre</label><br>
                        <input id="nombre" type="text" class="form-control" value='{{$item->nombre}}'>
                    </div>
                
                    <div class="form-group">
                        <label class="form-label">Slogan</label><br>
                        <input id="slogan" type="text" class="form-control" value='{{$item->slogan}}'>
                    </div>
                
                    <div class="form-group">
                        <label class="form-label">Direccion</label><br>
                        <input id="direccion" type="text" class="form-control" value='{{$item->direccion}}'>
                    </div>
                
                    <div class="form-group">
                        <label class="form-label">RNC</label><br>
                        <input id="rnc" type="text" class="form-control" value='{{$item->rnc}}'>
                    </div>
                </div>
                <div class="card-footer d-flex justify-center">

                    <button class="btn btn-primary btn_guardar"> Guardar</button>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endforeach

{{-- ventana modal --}}

{{-- <script type="text/javascript" src="{{asset('js/admin/datatable_espanol.js')}}"></script> --}}
<script src="{{ asset('js/admin/empresa/editar/cambios.js') }}"></script>
<script src="{{ asset('js/admin/empresa/editar/guardar.js') }}"></script>
<script src="{{ asset('js/admin/empresa/editar/cambios_logo.js') }}"></script>
{{--<script src="{{ asset('js/admin/flujo/eliminar/eliminar.js') }}"></script>
<script src="{{ asset('js/admin/flujo/editar/editar.js') }}"></script> --}}

@endsection