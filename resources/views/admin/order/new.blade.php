 @extends('admin.main') 
@section('title', 'Khu vực quản trị của website Rammus | ') 
@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>List Order New</h1>
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
			<h3 class="box-title">Danh sách các đơn hàng</h3>
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
							<input type="text" name="txtSeach" class="form-control" placeholder="Tìm tên người đặt hàng" value="{{ $seach }}" > 
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
									<th style="width: 180px;">Họ và Tên</th>
									<th>Địa chỉ</th>
									<th style="width: 250px;">Email</th>
									<th style="width: 120px;">Điện thoại</th>
									<th style="width: 130px;">Ngày đặt</th>
									<th style="width: 120px;">Tình trạng</th>
									<th style="width: 40px;">Xem</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($new as $item)
								<tr>
									<td><label><input type="checkbox" class="minimal" value="{{ $item['id'] }}" name="items[]" ></label></td>
									<td>{{ $item['hovatendem'] . ' ' . $item['ten'] }}</td>
									<td>{{ $item['diachi'] }}</td>
									<td>{{ $item['email'] }}</td>
									<td>{{ $item['dienthoai'] }}</td>
									<td>{{ \Carbon\Carbon::createFromTimestamp(strtotime($item['created_at']))->diffForHumans() }}</td>
									<td>{{ ($item['tinhtrang'] == 0) ? 'Chưa giao' : 'Đã giao' }}</td>
									<td><a href="{{ route('admin.order.read', $item['id']) }}" class="fwbold">Xem</a></td>
								</tr>
								@endforeach 
							</tbody>
							<tfoot>
								<tr>
									<th><input type="checkbox" class="minimal" name="checkAll" value="all"></th>
									<th>Họ và Tên</th>
									<th>Địa chỉ</th>
									<th>Email</th>
									<th>Điện thoại</th>
									<th>Ngày đặt</th>
									<th>Tình trạng</th>
									<th>Xem</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						@if ($new->lastPage() > 1)
						<ul class="pagination" style="float:right; margin-top: -5px;">
								@if ($new->currentPage() != 1)
								<li class="paginate_button previous">
									<a href="{{ str_replace('/?', '?', $new->url($new->currentPage() - 1)) }}">Previous</a>
								</li>
								@endif
								@for ($i = 1;  $i <= $new->lastPage(); $i++)
								<li class="paginate_button {{ ($new->currentPage() == $i) ? 'active' : '' }}">
						          <a href="{{ str_replace('/?', '?', $new->url($i)) }}">{{ $i }}</a>
						       	</li>
								@endfor
								@if ($new->currentPage() != $new->lastPage() &&  $new->lastPage() > 1)
							    <li class="paginate_button next"><a href="{{ str_replace('/?', '?', $new->url($new->currentPage() + 1)) }}">Next</a></li>
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
			        <h4 class="modal-title">Xóa đơn hàng</h4>
			      </div>
			      <div class="modal-body">
			        <p>Bạn chắc chắn muốn xóa những đơn hàng được chọn!</p>
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
	        <p>Bạn chưa chọn đơn hàng!</p>
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
