@extends('layouts.master')

@section('title', 'Dashboard')

@section('content_header')
  <h1>
    Dashboard
    <small>Control Panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Dashboard</li>
  </ol>
@stop

@section('content')
  <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ $count_files }}</h3>

              <p>Uploads</p>
            </div>
            <div class="icon">
              <i class="fa fa-upload"></i>
            </div>
            <a href="{{ route('admin.files.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $count_providers }}</h3>

              <p>Providers</p>
            </div>
            <div class="icon">
              <i class="fa fa-handshake-o"></i>
            </div>
            <a href="{{ route('admin.providers.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{ $count_roles }}</h3>

              <p>Roles</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-times"></i>
            </div>
            <a href="{{ route('admin.roles.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{ $count_messages }}</h3>

              <p>Messages</p>
            </div>
            <div class="icon">
              <i class="fa fa-envelope"></i>
            </div>
            <a href="{{ route('admin.messages.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      
      <div class="row">
        <div class="col-md-6">
          <!-- Bar chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Uploads Per Month</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="bar-chart" style="height: 300px; padding: 0px; position: relative;"><canvas class="flot-base" width="540" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 540px; height: 300px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 131px; top: 283px; left: 25px; text-align: center;">January</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 131px; top: 283px; left: 113px; text-align: center;">February</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 131px; top: 283px; left: 210px; text-align: center;">March</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 131px; top: 283px; left: 304px; text-align: center;">April</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 131px; top: 283px; left: 395px; text-align: center;">May</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 131px; top: 283px; left: 483px; text-align: center;">June</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 270px; left: 7px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 203px; left: 7px; text-align: right;">5</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 135px; left: 1px; text-align: right;">10</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 68px; left: 1px; text-align: right;">15</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 1px; text-align: right;">20</div></div></div><canvas class="flot-overlay" width="540" height="300" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 540px; height: 300px;"></canvas></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->

 		</div>
        <!-- /.col -->

	  <div class="col-md-6">
          <!-- USERS LIST -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Users With Photo</h3>

              <div class="box-tools pull-right">
                <span class="label label-danger">{{ $count_users }} Users with photo</span>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <ul class="users-list clearfix">
                
                @if($users)    
                    @foreach($users as $user)
                        <li>
                          <a href="/admin/users/{{$user->id}}/edit"><img src="{{ $user->photo ? $user->photo->file : "/img/place_holder.jpg" }}" alt="{{ $user->name }}"></a>
                          <a class="users-list-name" href="/admin/users/{{$user->id}}/edit">{{ $user->name }}</a>
                          <span class="users-list-date">{{ $user->created_at->diffForHumans() }}</span>
                        </li>
                    @endforeach
                @endif
                
              </ul>
              <!-- /.users-list -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="{{ route('admin.users.index') }}" class="uppercase">View All Users</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!--/.box -->
        </div>

      </div>      
      
</section>
  
@stop