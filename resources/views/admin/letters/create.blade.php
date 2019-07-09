@extends('layouts.master')

@section('title', 'Create Support Letter')

@section('content_header')
  <h1>
    Create Support Letter
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.index') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li class="active">Create Support Letter</li>
  </ol>
@stop

@section('content')
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Create New Letter</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">

            <form method="POST" action="{{ route('letters.store') }}" enctype="multipart/form-data">
        		{{ csrf_field() }}
        		
        		<div class="form-group">
        			<label for="organisation">Organisation:</label>
        			<input name="organisation" type="text" class="form-control" id="organisation" placeholder="Organisation" maxlength="255" required="required" value="{{ old('organisation') }}">
        		</div>
        		
        		<div class="form-group">
        			<label for="country">Country:</label>
        			<input name="country" type="text" class="form-control" id="country" placeholder="Country" maxlength="255" required="required" value="{{ old('country') }}">
        		</div>
        		
        		<div class="form-group">
        			<label for="website">Website:</label>
        			<input name="website" type="text" class="form-control" id="website" placeholder="Website" value="{{ old('website') }}">
        		</div>
        		
        		<div class="form-group">
        			<label for="lead_person">Lead Person:</label>
        			<input name="lead_person" type="text" class="form-control" id="lead_person" placeholder="Lead Person" value="{{ old('lead_person') }}">
        		</div>
        		
        		<div class="form-group">
              <label>Status:</label>
              <select name="is_active" class="form-control">
                <option value="1">Active</option>
                <option value="0">Not Active</option>
              </select>
            </div>
                
            <div class="form-group">
        			<label for="order">Order:</label>
        			<input name="order" type="number" class="form-control" id="order" placeholder="Order" value="{{ old('order') }}">
        		</div>
        		
        		<div class="form-group">
        			<label for="logo">Logo:</label>
        			<input name="logo" type="file" class="form-control" id="logo" value="{{ old('logo') }}">
        		</div>
        		
        		<div class="form-group">
        			<label for="pdf">PDF:</label>
        			<input name="pdf" type="file" class="form-control" id="pdf" value="{{ old('pdf') }}">
        		</div>
        		
        		<div class="form-group">
        			<label for="image">PDF Image:</label>
        			<input name="image" type="file" class="form-control" id="image" value="{{ old('image') }}">
        		</div>
        		
        		<div class="form-group">
        			<button type="submit" class="btn btn-primary">Create Support Letter</button>
        		</div>
        	</form>

        </div>
    
    @include('includes.form_errors')
    
@endsection

@section('scripts')
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
      var options = {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
      };
    </script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
@endsection