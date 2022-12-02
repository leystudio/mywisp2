@extends('adminlte::page'/* ,['iFrameEnabled' => true] */)
<input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">

 
@section('title', $empresa_id[0]['nombre'])
 

@section('content_header')
@stop

@section('content')
Empresa
@stop

