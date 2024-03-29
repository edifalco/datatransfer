@extends('layouts.master')

@section('title', 'Invite User')

@section('content_header')
  <h1>
    Invite User
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Invite User</li>
  </ol>
@stop

@section('content')
    @include('includes.form_errors')
    <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Invite User</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
        <div class="box-body">
            {!! Form::open(['method'=>'POST', 'action'=>'InviteController@store', 'files'=>true]) !!}
                {{ csrf_field() }}
                <div class="form-group">
                    {!! Form::label('name', 'Full Name:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email:') !!}
                    {!! Form::email('email', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('provider_id', 'Provider:') !!}
                    {!! Form::select('provider_id', [''=>'Choose one option'] + $providers, null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('role_id', 'Role:') !!}
                    {!! Form::select('role_id', [''=>'Choose one option'] + $roles, null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('is_active', 'Status:') !!}
                    {!! Form::select('is_active', ['1'=>'Active', '0'=>'Not Active'], 0, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Invite User', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    
@endsection