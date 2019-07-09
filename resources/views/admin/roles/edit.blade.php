@extends('layouts.master')

@section('title', 'Edit Role')

@section('content_header')
  <h1>
    Edit or Delete Role
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Edit Role</li>
  </ol>
@stop

@section('content')
    
    <div class="row">
        
        <div class="col-sm-12">
            <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Role</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                {!! Form::model($role, ['method'=>'PATCH', 'action'=>['RoleController@update', $role->id], 'files'=>true]) !!}
                    {{ csrf_field() }}
                    <div class="form-group">
                        {!! Form::label('name', 'Name:') !!}
                        {!! Form::text('name', null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Update Role', ['class'=>'btn btn-primary pull-left']) !!}
                    </div>
                {!! Form::close() !!}
                
                {!! Form::model($role, ['method'=>'DELETE', 'action'=>['RoleController@destroy', $role->id]]) !!}
                    {{ csrf_field() }}
                    <div class="form-group">
                        {!! Form::submit('Delete Role', ['class'=>'btn btn-danger pull-right']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    
    <div class="row">
        @include('includes.form_errors')
    </div>
    
@endsection