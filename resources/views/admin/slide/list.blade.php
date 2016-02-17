@extends('admin.main') @section('title', 'Khu vực quản trị của website
Rammus | List slide') @section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Slides <small></small>
	</h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-lg-12">
			@if (count($errors) > 0)
			<div class="alert alert-danger fade in">
				<button type="button" class="close" data-dismiss="alert"
					aria-hidden="true">×</button>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{!! $error !!}</li> @endforeach
				</ul>
			</div>
			@elseif (Session::has('success'))
			<div class="alert alert-success fade in">
				<button type="button" class="close" data-dismiss="alert"
					aria-hidden="true">×</button>
				<ul>
					<li>{!! Session::get('success') !!}</li>
				</ul>
			</div>
			@endif
		</div>
	</div>
	<div class="row">
	@foreach($slides as $item)
	  <div class="col-sm-6 col-md-3">
	    <div class="thumbnail">
	      <img src="{{ url('public/teamplate/img/slider/' . $item['image']) }}" alt="..." style="height: 147px;width: 240px;">
	      <div class="caption">
	        <p  style="text-align: center;">
	        	<a href="{{ url('admin/system/slide-edit/' . $item['id']) }}" class="btn btn-primary" role="button">Edit</a> 
	        	<button type="button" class="btn" data-toggle="modal" data-target="#myModal-{{ $item['id'] }}">
  					Delete
				</button>
	        </p>
	      </div>
	    </div>
	  </div>
	  
	  <!-- Modal -->
		<div class="modal fade" id="myModal-{{ $item['id'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel">Delete Slide</h4>
		      </div>
		      <div class="modal-body">
		      	Bạn có chắc chắn muốn xóa slide này!
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <a href="{{ route('admin.system.getSlideDelete', ['id' => $item['id']]) }}" class="btn btn-primary">Ok</a>
		      </div>
		    </div>
		  </div>
		</div>

	 @endforeach 
	</div>
</section>
<script>

</script>
<!-- /.content -->
<!-- Button trigger modal -->
@endsection
