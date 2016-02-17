@extends('admin.main')
@section('title', 'Khu vực quản trị của website Rammus | Add New Post')
@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Blogs
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
				  	<li><a href="{{ url('admin/blog/list') }}"> Sang trang all post </a></li>
				</ul>
			</div>	
			@endif
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<form action="{{ route('admin.blog.getAdd') }}" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Add New Post</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
		                  <label for="title">Title <span>*</span></label>
		                  <input class="form-control" type="text" placeholder="Title" name="title" id="title" value="{{ old('title') }}">
		                </div>
		                <div class="form-group">
		                  <label for="image">Image <span>*</span></label>
		                  <div>
		                  <span class="btn btn-success fileinput-button">
		                    <i class="glyphicon glyphicon-plus"></i>
		                    <span>Add image...</span>
		                    <input type="file" name="image" id="image">
		                   </span>
		                   </div>
		                   <div class="form-group" id="display-img" style="margin-top: 10px;">			                  
			               </div>
		                </div>
		                <div class="form-group">
		                  <label for="content">Content</label>
		                  <textarea class="form-control" rows="6" placeholder="Content ..." name="content" id="content">{{ old('content') }}</textarea>
		                  <script>
		                  	ckeditor("content")
						  </script>
		                </div> 
		                <div class="form-group">
		                  <label>Status <span>*</span></label>
		                  <select class="form-control" name="status">
		                    <option value="publish">Publish</option>
		                    <option value="hidden">Hidden</option>
		                  </select>
		                </div> 
					</div>
					<div class="box-footer">
	                	<button type="submit" class="btn btn-primary">Add New Post</button>
	                </div>
					<!-- /.box-body -->
				</div> 
				
			</form> 
		</div>
		
	</div>		
</section>
<script>	
File.prototype.convertToBase64 = function(callback){
    var FR= new FileReader();
    FR.onload = function(e) {
         callback(e.target.result)
    };       
    FR.readAsDataURL(this);
}

$("#image").on('change',function(){
	var selectedFile = this.files[0];
	selectedFile.convertToBase64(function(base64){
	  // alert(base64);
		   	html = '<div class="row">';
		  	html += '<div class="col-xs-6 col-md-3">';
		    html += '<a href="#" class="thumbnail" id="display-img">';
		    html += '<img src="'+base64+'" class="img-avata-upload" />';
		    html += '</a>';
		  	html += '</div>';
			html += '</div>';
	   $('#display-img').html(html);
	}); 
});
</script>
<!-- /.content -->
<!-- Button trigger modal -->
@endsection