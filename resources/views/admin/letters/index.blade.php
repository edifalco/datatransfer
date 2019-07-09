@extends('layouts.master')

@section('title', 'Dashboard')

@section('content_header')
  <h1>
    All Support Letters
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">All Support Letters</li>
  </ol>
@stop
@section('content')

    @if(Session::has('letter_deleted'))
        <p class="alert alert-success alert-dismissible"><strong>Success!</strong> {{ session('letter_deleted') }}</p>
    @endif
    @if(Session::has('letter_updated'))
        <p class="alert alert-success alert-dismissible"><strong>Success!</strong> {{ session('letter_updated') }}</p>
    @endif
    
    <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">All Support Letters</h3>
              
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
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                    <th>ID</th>
                    <th>Logo</th>
                    <th>Organisation</th>
                    <th>Country</th>
                    <th>Website</th>
                    <th>Lead Person</th>
                    <th>User</th>
                    <th>Created</th>
                    <th>Last Updated</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                    @if($letters)    
                        @foreach($letters as $letter)
                            <tr>
                                <td>{{ $letter->id }}</td>
                                <td><img width="70px" src="{{ $letter->logo ? '/img/'.$letter->logo : "/img/place_holder.jpg" }}" alt=""></td>
                                <td>{{ $letter->organisation }}</td>
                                <td>{{ $letter->country }}</td>
                                <td>{{ $letter->website }}</td>
                                <td>{{ $letter->lead_person }}</td>
                                <td>{{ $letter->user ? $letter->user->name : "The Letter has no user" }}</td>
                                <td>{{ $letter->created_at->diffForHumans() }}</td>
                                <td>{{ $letter->updated_at->diffForHumans() }}</td>
                                <td class="text-center">{{ $letter->order }}</td>
                                <td>
                                  @if($letter->is_active == 1)
                                      <form method="POST" action="{{ route('letters.update', $letter->id) }}">
                                          {{ csrf_field() }}
                                          <input name="_method" type="hidden" value="PATCH">
                                          <input type="hidden" name="is_active" value="0">
                                          <div class="form-group">
                                              <button type="submit" class="btn btn-success">Published</button>
                                          </div>
                                      </form>
                                  @else
                                      <form method="POST" action="{{ route('letters.update', $letter->id) }}">
                                          {{ csrf_field() }}
                                          <input name="_method" type="hidden" value="PATCH">
                                          <input type="hidden" name="is_active" value="1">
                                          <div class="form-group">
                                              <button type="submit" class="btn btn-danger">Unpublished</button>
                                          </div>
                                      </form>
                                  @endif
                                </td>
                                <td><a class="btn btn-info" href="{{ route('admin.letters.edit', $letter->id) }}/">Edit</a></td>
                            </tr>
                        @endforeach
                    @endif
                </tbody></table>
            </div>
            <!-- /.box-body -->
            
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
    </div>
</div>
@endsection