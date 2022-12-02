@extends('adminlte::page'/* ,['iFrameEnabled' => true] */)

@section('content_header')
Registrar Material
@stop

@section('content')

@include('admin.materiales.form')

@stop


{{-- <script src="{{ asset('js/admin/agregar-cliente/materiales/create.js') }}"></script> --}}