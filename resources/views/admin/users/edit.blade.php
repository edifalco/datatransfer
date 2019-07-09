@extends('layouts.master')

@section('title', 'Edit User')

@section('content_header')
  <h1>
    Edit or Delete User
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Edit User</li>
  </ol>
@stop

@section('content')
    
    <div class="row">
        
        <div class="col-sm-2">
            <img class="img-responsive" src="{{ $user->photo ? $user->photo->file : "/img/place_holder.jpg" }}" alt="">
        </div>
        
        <div class="col-sm-10">
            <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Category</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}
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
                        {!! Form::select('is_active', ['1'=>'Active', '0'=>'Not Active'], null, ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password', 'Password:') !!}
                        {!! Form::password('password', ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::file('photo_id', ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" name="password_changed_at" id="password_changed_at" {{ $user->password_changed_at == "1980-01-01 00:00:00" ? "checked" : "" }} >
                      <label class="form-check-label" for="password_changed_at">Check this box to ask the user to change the password next time they sign in</label>
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Update User', ['class'=>'btn btn-primary pull-left']) !!}
                    </div>
                {!! Form::close() !!}
                
                {!! Form::model($user, ['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}
                    {{ csrf_field() }}
                    <div class="form-group">
                        {!! Form::submit('Delete User', ['class'=>'btn btn-danger pull-right']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    
    <div class="row">
        @include('includes.form_errors')
    </div>
    
@endsection