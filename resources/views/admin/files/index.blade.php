@extends('layouts.master')

@section('title', 'List Files')

@section('content_header')
  <h1>
    All Files
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">All Files</li>
  </ol>
@stop

@section('content')
    @if(Session::has('file_deleted'))
        <p class="alert alert-success"><strong>Success!</strong> {{ session('file_deleted') }}</p>
    @endif

    <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">All Files</h3>
          
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
        @if(count($files) > 0)
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tbody><tr>
                    <th>ID</th>
                    <th>Original Name</th>
                    <th>Our System Name</th>
                    <th>Code Change Name</th>
                    <th>Hashed Name</th>
                    <th>User</th>
                    <th>Provider</th>
                    <th>Message</th>
                    <th>Created</th>
                    <th>Last Updated</th>
                  </tr>
                </thead>
                <tbody>
                    @if($files)    
                        @foreach($files as $file)
                            <tr>
                                <td>{{ $file->id }}</td>
                                <td>{{ $file->original_name }}</td>
                                <td>{{ $file->file }}</td>
                                <td>{{ $file->change_name }}</td>
                                <td>{{ $file->hashed_name }}</td>
                                <td>{{ ($file->user) ? $file->user->name : "There is no User associated with this item" }}</td>
                                <td>{{ ($file->provider) ? $file->provider->name : "There is no Provider associated with this item" }}</td>
                                <td>{{ $file->file_message }}</td>
                                <td>{{ $file->created_at->diffForHumans() }}</td>
                                <td>{{ $file->updated_at->diffForHumans() }}</td>
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
        		There are no Files.
        	</div>
        @endif
        
@endsection