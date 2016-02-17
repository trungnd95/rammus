@extends('admin.main')
@section('title', 'Khu vực quản trị của website Rammus | Edit File')
@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    File
    <small></small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-lg-8">
		@if (count($errors) > 0)
				<div class="alert alert-danger fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<ul>
						@foreach ($errors->all() as $error)
					  	<li> {!! $error !!} </li>
					  	@endforeach
					</ul>
				</div>	
		@elseif (Session::has('success'))
				<div class="alert alert-success fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<ul>
					  	<li> {!! Session::get('success') !!} </li>
					  	<li><a href="{{ url('admin/upload/list') }}"> Sang trang list Library </a></li>
					</ul>
				</div>	
		@endif
		</div>
	</div>
	<form method="POST" enctype="multipart/form-data">
	<div class="row">
		<div class="col-lg-8">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Edit File</h3>
				</div>
				<div class="box-body">						
					<div class="form-group">
	                  <label for="name">Title</label>
	                  <input class="form-control" type="text" placeholder="Title" name="title" id="title" value="{{ old('title', isset($img['title']) ? $img['title'] : null) }}">
	                </div>
	         
	                <div class="form-group">
	                  <label for="img">Img</label>
	                  <div><img alt="" src="{{ $img['url'] }}" style="max-width: 695px;"></div>
	                </div>
	                <div class="form-group">
	                  <label for="order">Caption</label>
	                  <textarea class="form-control" placeholder="Caption" name="caption" id="caption">{{ old('caption', isset($img['caption']) ? $img['caption'] : null) }}</textarea>
	                </div>
	                <div class="form-group">
	                  <label for="order">Alternative Text</label>
	                  <input class="form-control" type="text" placeholder="Alternative Text" name="alttext" id="alttext" value="{{ old('alttext', isset($img['alt_text']) ? $img['alt_text'] : null) }}">
	                </div>
	              
	                <div class="form-group">
	                  <label for="description">Description</label>
	                  <textarea class="form-control" rows="6" placeholder="Description ..." name="description" id="description">{{ old('description', isset($img['description']) ? $img['description'] : null) }}</textarea>
	                </div>  
				</div>
				
				<!-- /.box-body -->
			</div>		
		</div>
		<div class="col-lg-4">
          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Save</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">
            	<div>Uploaded on: {{ $img['created_at'] }}</div>
            	<div>
					File URL:
					<input class="form-control" type="text" readonly="readonly" name="attachment_url" value="{{ $img['url'] }}">
				</div>
				<div>File name: {{ $img['name'] }}</div>
				<div>File type: {{ $img['type'] }}</div>
				<div>File size: {{ $img['size'] }} Kb</div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
               <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
          <!-- /.box -->
        </div>
	</div>	
	</form> 	
</section>
<!-- /.content -->
@endsection