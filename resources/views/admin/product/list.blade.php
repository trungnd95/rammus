@extends('admin.main') @section('title', 'Khu vực quản trị của website
Rammus | List Product') @section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>List Product 
		<small>
			<a href="{{ route('admin.product.getAdd') }}" class="btn btn-block btn-primary">Add New Product</a>
		</small>
	</h1>
</section>
	
	
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
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Danh sách các Product</h3>
		</div>
		<!-- /.box-header -->
		<form method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="box-body">
				<div class="row" style="margin-bottom: 5px;">
					<div class="col-lg-3">
						<select class="form-control form-list-select" name="selectDelete">
							<option value="">Bulk Actions</option>
							<option value="delete">Delete</option>
						</select>
						<a class="btn btn-block btn-default form-list-button" name="apply" value="apply" id="aApply" >Apply</a>
					</div>
					<div class="col-lg-offset-6 col-lg-3">
						<div class="input-group">
							<input type="text" name="txtSeach" class="form-control" placeholder="Search Products" value="{{ $seach }}" > 
							<span class="input-group-btn">
								<button type="submit" name="search" id="search-btn" class="btn btn-flat" value="seach">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th style="width: 40px;"><label><input type="checkbox" class="minimal" name="checkAll" value="all"></label></th>
									<th>Name</th>
									<th style="width: 180px;">price</th>
									<th style="width: 250px;">Category</th>
									<th style="width: 120px;">Availability</th>
									<th style="width: 130px;">Create Day</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($products as $item)
								<tr>
									<td><label><input type="checkbox" class="minimal" value="{{ $item['id'] }}" name="items[]" ></label></td>
									<td class="showAc">
										<a href="{{ route('admin.product.getEdit', $item['id']) }}" class="fwbold">{{ $item['name'] }}</a>
										<div class="show-edit-delete">
											<a href="{{ route('admin.product.getEdit', $item['id']) }}">Edit</a> | <a style="color: red; cursor: pointer;" data-toggle="modal" data-target="#delete-id-{{ $item['id'] }}">Delete</a>
										</div>
									</td>
									<td>{{ number_format($item['price'], 0, ',', '.') }} đ</td>
									<td>
									<?php 
										$parent = DB::table('cates')->where('id', $item['cate_id'])->first();
										echo (!empty($parent)) ? $parent->name : "None";
									?>
									</td>
									<td>{{ ($item['availability'] == 1) ? "Còn hàng" : "Hết hàng"  }}</td>
									<td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($item['created_at']))->diffForHumans() }}</td>
									
									  <div class="modal fade" id="delete-id-{{ $item['id'] }}">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title">Delete Products</h4>
									      </div>
									      <div class="modal-body">
									        <p>Bạn chắc chắn muốn xóa product này!</p>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									        <a href="{{ route('admin.product.getDelete', $item['id']) }}" class="btn btn-primary">Delete</a>
									      </div>
									    </div><!-- /.modal-content -->
									  </div><!-- /.modal-dialog -->
									</div><!-- /.modal -->
								</tr>
								@endforeach 
							</tbody>
							<tfoot>
								<tr>
									<th><input type="checkbox" class="minimal" name="checkAll" value="all"></th>
									<th>Name</th>
									<th>price</th>
									<th>Category</th>
									<th>Availability</th>
									<th>Create Day</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						@if ($products->lastPage() > 1)
						<ul class="pagination" style="float:right; margin-top: -5px;">
								@if ($products->currentPage() != 1)
								<li class="paginate_button previous">
									<a href="{{ str_replace('/?', '?', $products->url($products->currentPage() - 1)) }}">Previous</a>
								</li>
								@endif
								@for ($i = 1;  $i <= $products->lastPage(); $i++)
								<li class="paginate_button {{ ($products->currentPage() == $i) ? 'active' : '' }}">
						          <a href="{{ str_replace('/?', '?', $products->url($i)) }}">{{ $i }}</a>
						       	</li>
								@endfor
								@if ($products->currentPage() != $products->lastPage() &&  $products->lastPage() > 1)
							    <li class="paginate_button next"><a href="{{ str_replace('/?', '?', $products->url($products->currentPage() + 1)) }}">Next</a></li>
							    @endif
						</ul>
						@endif
					</div>
				</div>
			</div>
			
			<div class="modal fade" id="myModal">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title">Delete Products</h4>
			      </div>
			      <div class="modal-body">
			        <p>Bạn chắc chắn muốn xóa những product được chọn!</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary" name="apply" value="apply" >Delete</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- Main content -->	
		</form>
	</div>
	
	<div class="modal fade" id="modalError">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Error</h4>
	      </div>
	      <div class="modal-body">
	        <p>Bạn chưa chọn product!</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<div class="modal fade" id="modalDelete">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Delete</h4>
	      </div>
	      <div class="modal-body">
	        <p>Bạn chưa chọn hành động delete!</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</section>
<script>
	$(document).ready(function () {
		$('#aApply').click(function () {
			val = $('[name="selectDelete"]').val();
			if (val != 'delete') {
				$('#modalDelete').modal('show');
			} else {
				error = "";
				numberChecked = $('input:checked').length;
				if(numberChecked == 1) {
					error = "ok";
				} else {
					$.each($('input:checked'), function (i, val) {
						if($(this).val() == 'all') {
							if((numberChecked - 3) < 1) {
								error = "ok";
							}
						}
					});	
				}
	
				if(error == "ok") {
					$('#modalError').modal('show');
				} else {
					$('#myModal').modal('show');
				}
			}
		});
	});
//$('#myModal').modal('show');
</script>
<!-- /.content -->
@endsection
