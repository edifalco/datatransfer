@extends('layouts.master')

@section('title', 'Edit Provider')

@section('content_header')
  <h1>
    Edit or Delete Provider
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Edit Provider</li>
  </ol>
@stop

@section('content')
    
    <div class="row">
        
        <div class="col-sm-12">
            <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Provider</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                {!! Form::model($provider, ['method'=>'PATCH', 'action'=>['ProviderController@update', $provider->id], 'files'=>true]) !!}
                    {{ csrf_field() }}
                    <div class="form-group">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Update Provider', ['class'=>'btn btn-primary pull-left']) !!}
                    </div>
                {!! Form::close() !!}
                
                {!! Form::model($provider, ['method'=>'DELETE', 'action'=>['ProviderController@destroy', $provider->id]]) !!}
                    {{ csrf_field() }}
                    <div class="form-group">
                        {!! Form::submit('Delete Provider', ['class'=>'btn btn-danger pull-right']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    
    <div class="row">
        @include('includes.form_errors')
    </div>
    
@endsection