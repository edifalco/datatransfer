@extends('layouts.master')

@section('title', 'Media')

@section('content_header')
  <h1>
    Media
  </h1>
  <ol class="breadcrumb">
    <li><a href="/admin/"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Media</li>
  </ol>
@stop

@section('content')
    @if(Session::has('user_deleted'))
        <p class="alert alert-success"><strong>Success!</strong> {{ session('user_deleted') }}</p>
    @endif
    <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Media</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Path</th>
                    <th>Created</th>
                    <th>Last Updated</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                    @if($photos)    
                        @foreach($photos as $photo)
                            <tr>
                                <td>{{ $photo->id }}</td>
                                <td><img width="50px" src="{{ $photo ? $photo->file : "/img/place_holder.jpg" }}" alt=""></td>
                                <td>{{ $photo->file }}</td>
                                <td>{{ $photo->created_at->diffForHumans() }}</td>
                                <td>{{ $photo->updated_at->diffForHumans() }}</td>
                                <td><a href="{{ route('admin.medias.edit', $photo->id) }}/">Edit</a></td>
                                <td>
                                    {!! Form::model($photo, ['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                        </div>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        <!-- /.box-body -->
                    @endif
                </tbody>
              </table>
              <div class="box-footer clearfix">
                  <ul class="pagination pagination-sm no-margin pull-right">
                    <li><a href="#">«</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">»</a></li>
                  </ul>
            </div>
        </div>
@endsection