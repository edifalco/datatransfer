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
  <div class="row">
      <div class="col-sm-12 col-md-6">
          <div class="box box-solid">
              <div class="box-body">
                  <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                      List Uploads
                  </h4>
                  <div class="media">
                      <div class="media-body">
                          <div class="clearfix">
                              <p class="pull-right">
                                  <a href="{{ route('admin.files.index') }}" class="btn btn-primary">
                                      <i class="fa fa-users"></i> List Uploads
                                  </a>
                              </p>
  
                              <h4 style="margin-top: 0">Go to this section to:</h4>
                              <ul>
                                <li>See all uploaded files</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-12 col-md-6">
          <div class="box box-solid">
              <div class="box-body">
                  <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                      List Invites
                  </h4>
                  <div class="media">
                      <div class="media-body">
                          <div class="clearfix">
                              <p class="pull-right">
                                  <a href="{{ route('admin.invites.index') }}" class="btn btn-primary">
                                      <i class="fa fa-users"></i> List Invites
                                  </a>
                              </p>
  
                              <h4 style="margin-top: 0">Go to this section to:</h4>
                              <ul>
                                <li>See all Invites</li>
                                <li>Delete an Invite. Click on the Delete button.</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-sm-12 col-md-6">
          <div class="box box-solid">
              <div class="box-body">
                  <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                      Create Invite
                  </h4>
                  <div class="media">
                      <div class="media-body">
                          <div class="clearfix">
                              <p class="pull-right">
                                  <a href="{{ route('admin.invites.create') }}" class="btn btn-primary">
                                      <i class="fa fa-user-plus"></i> Create Invite
                                  </a>
                              </p>
  
                              <h4 style="margin-top: 0">Go to this section to:</h4>
                              <ul>
                                <li>Create an Invite.</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-12 col-md-6">
          <div class="box box-solid">
              <div class="box-body">
                  <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                      List Users
                  </h4>
                  <div class="media">
                      <div class="media-body">
                          <div class="clearfix">
                              <p class="pull-right">
                                  <a href="{{ route('admin.users.index') }}" class="btn btn-primary">
                                      <i class="fa fa-users"></i> List Users
                                  </a>
                              </p>
  
                              <h4 style="margin-top: 0">Go to this section to:</h4>
                              <ul>
                                <li>See all Users</li>
                                <li>Edit a User. Click on the edit button besides each user.</li>
                                <li>Delete a User. Click on the Edit button and then on the Delete button.</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-sm-12 col-md-6">
          <div class="box box-solid">
              <div class="box-body">
                  <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                      Create User
                  </h4>
                  <div class="media">
                      <div class="media-body">
                          <div class="clearfix">
                              <p class="pull-right">
                                  <a href="{{ route('admin.users.create') }}" class="btn btn-primary">
                                      <i class="fa fa-user-plus"></i> Create User
                                  </a>
                              </p>
  
                              <h4 style="margin-top: 0">Go to this section to:</h4>
                              <ul>
                                <li>Create a new User.</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-12 col-md-6">
          <div class="box box-solid">
              <div class="box-body">
                  <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                      List Providers
                  </h4>
                  <div class="media">
                      <div class="media-body">
                          <div class="clearfix">
                              <p class="pull-right">
                                  <a href="{{ route('admin.providers.index') }}" class="btn btn-primary">
                                      <i class="fa fa-users"></i> List Providers
                                  </a>
                              </p>
  
                              <h4 style="margin-top: 0">Go to this section to:</h4>
                              <ul>
                                <li>See all Providers</li>
                                <li>Edit a Provider. Click on the edit button besides each Provider.</li>
                                <li>Delete a Provider. Click on the Edit button and then on the Delete button.</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-sm-12 col-md-6">
          <div class="box box-solid">
              <div class="box-body">
                  <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                      Create Provider
                  </h4>
                  <div class="media">
                      <div class="media-body">
                          <div class="clearfix">
                              <p class="pull-right">
                                  <a href="{{ route('admin.providers.create') }}" class="btn btn-primary">
                                      <i class="fa fa-user-plus"></i> Create Provider
                                  </a>
                              </p>
  
                              <h4 style="margin-top: 0">Go to this section to:</h4>
                              <ul>
                                <li>Create a Provider.</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="row">
      <div class="col-sm-12 col-md-6">
          <div class="box box-solid">
              <div class="box-body">
                  <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                      List Roles
                  </h4>
                  <div class="media">
                      <div class="media-body">
                          <div class="clearfix">
                              <p class="pull-right">
                                  <a href="{{ route('admin.roles.index') }}" class="btn btn-primary">
                                      <i class="fa fa-users"></i> List Roles
                                  </a>
                              </p>
  
                              <h4 style="margin-top: 0">Go to this section to:</h4>
                              <ul>
                                <li>See all Roles</li>
                                <li>Edit a Role. Click on the edit button besides each Role.</li>
                                <li>Delete a Role. Click on the Edit button and then on the Delete button.</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="col-sm-12 col-md-6">
          <div class="box box-solid">
              <div class="box-body">
                  <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                      Create Role
                  </h4>
                  <div class="media">
                      <div class="media-body">
                          <div class="clearfix">
                              <p class="pull-right">
                                  <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">
                                      <i class="fa fa-user-plus"></i> Create Role
                                  </a>
                              </p>
  
                              <h4 style="margin-top: 0">Go to this section to:</h4>
                              <ul>
                                <li>Create a Role.</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
    <div class="row">
      <div class="col-sm-12 col-md-6">
          <div class="box box-solid">
              <div class="box-body">
                  <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                      List Messages
                  </h4>
                  <div class="media">
                      <div class="media-body">
                          <div class="clearfix">
                              <p class="pull-right">
                                  <a href="{{ route('admin.messages.index') }}" class="btn btn-primary">
                                      <i class="fa fa-list"></i> List Messages
                                  </a>
                              </p>
  
                              <h4 style="margin-top: 0">Go to this section to:</h4>
                              <ul>
                                <li>See a list with all Messages</li>
                                <li>See the entire message. Click on the show button besides each Partner to read the message in full.</li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  
@stop