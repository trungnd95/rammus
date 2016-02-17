@extends('admin.main') @section('title', 'Khu vực quản trị của website
Rammus | Size Product') @section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Size Products <small></small>
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
		<form action="{{ route('admin.product.postSizeAdd') }}" method="POST" enctype="multipart/form-data">
			<div class="col-lg-3">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Add New Size</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
							<label for="name">Name <span>*</span></label> <input
								class="form-control" type="text" placeholder="Name" name="name"
								id="name" value="{{ old('name') }}">
						</div>
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Add New Size</button>
					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</form>
			<div class="col-lg-9">
				<div class="box box-default">
					<div class="box-header with-border">
						<h3 class="box-title">List Sizes</h3>
						<!-- /.box-tools -->
					</div>
					<!-- /.box-header -->
					<div class="box-body" style="display: block;">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th style="width: 50px;">STT</th>
									<th>Name</th>
									<th style="width: 50px;">Edit</th>
									<th style="width: 50px;">Delete</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$size = DB::table('sizes')->orderBy('id', 'DESC')->get();
									$i = 1;
								?>
								@foreach ($size as $item)
								<tr>
									<td>{{ $i }}</td>
									<td>
										<a href="{{ route('admin.product.getSizeEdit', $item->id) }}" class="fwbold">{{ $item->name }}</a>
									</td>									
									<td><a href="{{ route('admin.product.getSizeEdit', $item->id) }}">Edit</a></td>
									<td><a style="color: red; cursor: pointer;" data-toggle="modal" data-target="#delete-id-{{ $item->id }}">Delete</a></td>
									
									 <div class="modal fade" id="delete-id-{{ $item->id }}">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title">Delete Size</h4>
									      </div>
									      <div class="modal-body">
									        <p>Bạn chắc chắn muốn xóa size này!</p>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									        <a href="{{ route('admin.product.getSizeDelete', $item->id) }}" class="btn btn-primary">Delete</a>
									      </div>
									    </div><!-- /.modal-content -->
									  </div><!-- /.modal-dialog -->
									</div><!-- /.modal -->
								</tr>
								<?php $i++; ?>
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th>STT</th>
									<th>Name</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</tfoot>
						</table>
					</div>
					<!-- /.box-body -->
					<div class="box-footer"></div>
				</div>
				<!-- /.box -->
			</div>
			
			
	</div>
	
</section>
<script>
	
</script>
<!-- /.content -->
<!-- Button trigger modal -->
@endsection
