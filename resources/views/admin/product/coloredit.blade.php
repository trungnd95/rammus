@extends('admin.main') @section('title', 'Khu vực quản trị của website
Rammus | Color Product') @section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Edit Color Products <small></small>
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
					<li><a href="{{ route('admin.product.getColor') }}">Sang trang list color</a></li>
				</ul>
			</div>
			@endif
		</div>
	</div>

	<div class="row">
		<form action="{{ url('admin/product/color-edit/' . $id) }}" method="POST" enctype="multipart/form-data">
			<div class="col-lg-12">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Edit Color</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label for="name">Name <span>*</span></label> 
							<input class="form-control" type="text" placeholder="Name" name="name" id="name" value="{{ old('name', isset($color['name']) ? $color['name'] : null) }}">
						</div>
						<div class="form-group">
							<label for="price">Code <span>*</span></label> 
							<input class="form-control" type="color" placeholder="Color" name="code" id="code" value="{{ old('code', isset($color['code']) ? $color['code'] : null) }}">
						</div>
						<div class="form-group">
							<div class="checkbox">
								<label> <input type="checkbox" name="textcode"> Nhập code
								</label>
							</div>
						</div>
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Edit Color</button>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</form>

	</div>
	
</section>
<script>
	
	$('[name="textcode"]').change(function () {
		if($(this).is(':checked') == true) {
			$('#code').attr('type', 'text');
		} else {
			$('#code').attr('type', 'color');
		}
	});
</script>
<!-- /.content -->
<!-- Button trigger modal -->
@endsection
