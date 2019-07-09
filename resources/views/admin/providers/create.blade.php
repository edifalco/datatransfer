@extends('layouts.master')

@section('title', 'Create Provider')

@section('content_header')
  <h1>
    Create Provider
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Create Provider</li>
  </ol>
@stop

@section('content')
    @include('includes.form_errors')
    <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Create Provider</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
        <div class="box-body">
            {!! Form::open(['method'=>'POST', 'action'=>'ProviderController@store', 'files'=>true]) !!}
                {{ csrf_field() }}
                <div class="form-group">
                    {!! Form::label('name', 'Name:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Create Provider', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    
@endsection