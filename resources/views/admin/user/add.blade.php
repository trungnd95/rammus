@extends('admin.main')
@section('title', 'Khu vực quản trị của website Rammus | Add New User')
@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Users
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
					  	<li><a href="{{ url('admin/user/list') }}"> Sang trang list User </a></li>
					</ul>
				</div>	
		@endif
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
		<form action="{{ route('admin.user.getAdd') }}" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Add New User</h3>
				</div>
				<div class="box-body">
					<div class="row">	
						<div class="col-lg-6">					
							<div class="form-group">
			                  <label for="email">Email <span>*</span></label>
			                  <input class="form-control" type="text" placeholder="Email" name="email" id="email" value="{{ old('email') }}">
			                </div>
			                <div class="form-group">
			                  <label for="first_name">First Name</label>
			                  <input class="form-control" type="text" placeholder="First Name" name="first_name" id="first_name" value="{{ old('first_name') }}">
			                </div>
			                <div class="form-group">
			                  <label for="last_name">Last Name</label>
			                  <input class="form-control" type="text" placeholder="Last Name" name="last_name" id="last_name" value="{{ old('last_name') }}">
			                </div>
			                <div class="form-group">
			                  <label for="display_name">Display Name <span>*</span></label>
			                  <input class="form-control" type="text" placeholder="Display Name" name="display_name" id="display_name" value="{{ old('display_name') }}">
			                </div>
			                <div class="form-group">
			                  	<label for="password">Password <span>*</span></label>
				                <div class="input-group form-group">			                	
					                <input type="password" class="form-control" name="password" id="password">
				                    <span class="input-group-btn">
				                      <button type="button" class="btn btn-info" id="status-password">Show!</button>
				                    </span>
					             </div>
				             </div>
		                </div>
		                <div class="col-lg-6">
			                <div class="form-group">
			                  <label for="avatar">Avatar</label>
			                  <div>
			                  <span class="btn btn-success fileinput-button">
			                    <i class="glyphicon glyphicon-plus"></i>
			                    <span>Add avatar...</span>
			                    <input type="file" name="avatar" id="avatar">
			                   </span>
			                   </div>
			                </div>
			                <div class="form-group" id="display-img">
			                  
			                </div>
			              
			                <div class="form-group">
			                  <label for="level">Level</label>
			                  <select class="form-control" name="level">
			                    <option value="1" {{ (old('level') == 1) ? 'selected' : '' }}>Admin</option>
			                    <option value="2" {{ (old('level') == 2) ? 'selected' : '' }}>Member</option>
			                  </select>
			                </div>
			                <div class="form-group">
			                  <label for="status">Status</label>
			                  <select class="form-control"  name="status">
			                    <option value="1" {{ (old('status') == 1) ? 'selected' : '' }}>Hoạt động</option>
			                    <option value="0" {{ (old('status') == 0) ? 'selected' : '' }}>Tạm khóa</option>
			                  </select>
			                </div>
		                </div>
	                </div>
	                <div class="row">	
	                	<div class="col-lg-12">
			                <div class="form-group">
			                  <label for="description">Description</label>
			                  <textarea class="form-control" rows="6" placeholder="Description ..." name="description" id="description">{{ old('description') }}</textarea>
			                  <script>
			                  	ckeditor ("description")
							  </script>
			                </div> 
		                </div>
	                </div> 
				</div>
				<div class="box-footer">
                	<button type="submit" class="btn btn-primary">Add New User</button>
                </div>
				<!-- /.box-body -->
		</div> 
		
		
	</form>
	</div>	
	</div>		
</section>
<script>
	$('#status-password').on('click', function () {
		show = $(this).text();
		if(show == 'Show!') {
			$(this).text('Hidden!');
			$('#password').attr('type', 'text');
		} else {
			$(this).text('Show!');
			$('#password').attr('type', 'password');
		}
	});
	
	File.prototype.convertToBase64 = function(callback){
	    var FR= new FileReader();
	    FR.onload = function(e) {
	         callback(e.target.result)
	    };       
	    FR.readAsDataURL(this);
	}

	$("#avatar").on('change',function(){
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