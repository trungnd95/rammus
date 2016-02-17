@extends('admin.main')
@section('title', 'Khu vực quản trị của website Rammus | About')
@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		About
		<small></small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-lg-12">
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
				</ul>
			</div>	
			@endif
		</div>
	</div>
	<?php
	$about = unserialize($ab->content);
	?>
	<div class="row">
		<div class="col-lg-12">
			<form action="{{ route('admin.system.getAbout') }}" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="_id" value="{{ $ab->id }}">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">About</h3>
					</div>
					<div class="box-body">
						<div class="row">	
							<div class="col-lg-12">					
								<div class="form-group">
									<label for="title">Title <span>*</span></label>
									<input class="form-control" type="text" placeholder="Title" name="title" id="title" value="{{ old('title', (isset($about['title'])) ? $about['title']: null) }}">
								</div>
							</div>		                
						</div>
						<div class="row">	
							<div class="col-lg-12">
								<div class="form-group">
									<label for="content">Content</label>
									<textarea class="form-control" rows="6" placeholder="Content ..." name="content" id="content">{{ old('content', (isset($about['content'])) ? $about['content']: null) }}</textarea>
									<script>
										ckeditor ("content")
									</script>
								</div> 
							</div>
						</div> 
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">About</button>
					</div>
					<!-- /.box-body -->
				</div> 
				
				
			</form>
		</div>	
	</div>		
</section>
<script>
	
</script>
<!-- /.content -->
<!-- Button trigger modal -->
@endsection