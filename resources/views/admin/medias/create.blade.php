@extends('layouts.master')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css" type="text/css" />
@endsection

@section('content_header')
  <h1>
    Upload Media
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Upload Media</li>
  </ol>
@stop

@section('content')
    {!! Form::open(['method'=>'POST', 'action'=>'AdminMediasController@store', 'class'=>'dropzone']) !!}
    {!! Form::close() !!}
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>
@endsection
