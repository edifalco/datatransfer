@extends('layouts.master')

@section('title', 'List Users')

@section('content_header')
  <h1>
    All Users
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">All Users</li>
  </ol>
@stop

@section('content')
	@if(Session::has('user_created'))
        <div class="alert alert-success">{{ session('user_created') }}</div>
    @endif
    @if(Session::has('user_updated'))
        <div class="alert alert-success">{{ session('user_updated') }}</div>
    @endif
    @if(Session::has('user_deleted'))
        <div class="alert alert-success">{{ session('user_deleted') }}</div>
    @endif

    <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">All Users</h3>
          
          <!--
          <div class="box-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
          -->
          
        </div>
        <!-- /.box-header -->
        @if(count($users) > 0)
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tbody><tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Provider</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Last Updated</th>
                    <th>Password Changed</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                    @if($users)    
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><img width="50px" src="{{ $user->photo ? $user->photo->file : "/img/place_holder.jpg" }}" alt=""></td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->provider ? $user->provider->name : "User has no provider" }}</td>
                                <td>{{ $user->role ? $user->role->name : "User has no role" }}</td>
                                <td>{{ $user->is_active == 1 ? "Active" : "Not Active" }}</td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                <td>{{ $user->updated_at->diffForHumans() }}</td>
                                <td>{{ ($user->password_changed_at =="1980-01-01 00:00:00") ? "Password change requested" : $user->password_changed_at->diffForHumans() }}</td>
                                <td><a class="btn btn-info" href="{{ route('admin.users.edit', $user->id) }}/">Edit</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
              </table>
              
              <div class="box-footer clearfix">
                
                <!--
                <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">«</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">»</a></li>
                </ul>
                -->
      
              </div>
              
            @endif
        </div>
        
@endsection