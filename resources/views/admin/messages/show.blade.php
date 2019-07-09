@extends('layouts.master')

@section('title', 'Show Message')

@section('content_header')
  <h1 class="inline-block">Message</h1>
  
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Messages</li>
  </ol>
@stop

    @section('content')
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Read Message</h3>
            </div>
            <!-- /.box-header -->
            @if(isset($message))
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3>From: {{ $message->name }}</h3>
                <h5>Email: {{ $message->email }}
                  <span class="mailbox-read-time pull-right">{{ $message->created_at->diffForHumans() }}</span></h5>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                </div>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                {{ $message->message }}
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
              </div>
            </div>
            <!-- /.box-footer -->
          </div>
    @else
        <p>There are no subfeatures.</p>
    @endif
    </div>

@endsection