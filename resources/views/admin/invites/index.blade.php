@extends('layouts.master')

@section('title', 'List Invites')

@section('content_header')
  <h1>
    All Invites
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">All Invites</li>
  </ol>
@stop

@section('content')
    @if( Session::has('invite_created') )
        <p class="alert alert-success"><strong>Success!</strong> {{ session('invite_created') }}</p>
    @endif
    @if( Session::has('invite_deleted') )
        <p class="alert alert-success"><strong>Success!</strong> {{ session('invite_deleted') }}</p>
    @endif

    <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">All Invites</h3>
          
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
        @if(count($invites) > 0)
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tbody><tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Provider</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Invited By</th>
                    <th>Created</th>
                    <th>Last Updated</th>
                  </tr>
                </thead>
                <tbody>
                    @if($invites)    
                        @foreach($invites as $invite)
                            <tr>
                                <td>{{ $invite->id }}</td>
                                <td>{{ $invite->name }}</td>
                                <td>{{ $invite->email }}</td>
                                <td>{{ $invite->provider ? $invite->provider->name : "Invite has no provider" }}</td>
                                <td>{{ $invite->role ? $invite->role->name : "Invite has no role" }}</td>
                                <td>{{ $invite->is_active == 1 ? "Active" : "Not Active" }}</td>
                                <td>{{ $invite->user ? $invite->user->name : "Don't know who send this invite" }}</td>
                                <td>{{ $invite->created_at->diffForHumans() }}</td>
                                <td>{{ $invite->updated_at->diffForHumans() }}</td>
                                <td>
                                	{!! Form::model($invite, ['method'=>'DELETE', 'action'=>['InviteController@destroy', $invite->id]]) !!}
                                        {{ csrf_field() }}
                                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
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
        	</div>
        @else
        	<div class="box-footer clearfix">
        		There are no Invites, click <a href="{{ route('admin.invites.create') }}">here</a> to create one.
        	</div>
        @endif
        
@endsection