@extends('layouts.master')

@section('title', 'List Providers')

@section('content_header')
  <h1>
    All Providers
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">All Providers</li>
  </ol>
@stop

@section('content')
    @if(Session::has('provider_created'))
        <div class="alert alert-success">{{ session('provider_created') }}</div>
    @endif
    @if(Session::has('provider_updated'))
        <div class="alert alert-success">{{ session('provider_updated') }}</div>
    @endif
    @if(Session::has('provider_deleted'))
        <div class="alert alert-success">{{ session('provider_deleted') }}</div>
    @endif

    <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">All Providers</h3>

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
        @if(count($providers) > 0)
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tbody><tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Data Provider Number</th>
                    <th>Created</th>
                    <th>Last Updated</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                    @if($providers)
                        @foreach($providers as $provider)
                            <tr>
                                <td>{{ $provider->id }}</td>
                                <td>{{ $provider->name }}</td>
                                <td>{{ $provider->number }}</td>
                                <td>{{ $provider->created_at->diffForHumans() }}</td>
                                <td>{{ $provider->updated_at->diffForHumans() }}</td>
                                <td><a class="btn btn-info" href="{{ route('admin.providers.edit', $provider->id) }}/">Edit</a></td>
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
