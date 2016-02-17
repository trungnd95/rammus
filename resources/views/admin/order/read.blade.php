@extends('admin.main')
@section('title', 'Khu vực quản trị của website Rammus | Order Read')
@section ('content')
<?php 
	$thongtindonhang = unserialize($order['thongtindonhang']);
	$tongtien = 0;
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Thông tin chi tiết đơn hàng
    <small></small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-lg-12">	
		@if (Session::has('success'))
				<div class="alert alert-success fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<ul>
					  	<li> {!! Session::get('success') !!} </li>
					  	<li><a href="{{ route('admin.product.getList') }}"> Sang trang list product </a></li>
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
					<h3 class="box-title">Thông tin chi tiết đơn hàng.</h3>
				</div>
				<div class="box-body">  
				<table id="example1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Tên sản phẩm</th>
							<th>Số lượng</th>
							<th>Màu</th>
							<th>Kích cỡ</th>
							<th>Giá</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($thongtindonhang as $item)
						<tr>
							<td>{{ $item['name'] }}</td>
							<td>{{ $item['qty'] }}</td>
							<td>{{ $item['options']['color'] }}</td>
							<td>{{ $item['options']['size'] }}</td>
							<td>{{ number_format($item['subtotal'], 0, ',', '.') }} đ</td>
							<?php $tongtien += $item['subtotal']; ?>
						</tr>
						@endforeach
					</tbody>
				</table>
				</div>
			<!-- /.box-body -->
			</div> 	
		</div>
		<div class="col-lg-4">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Thông tin chi tiết người đặt hàng.</h3>   
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">
            	<div>Họ và Tên: <label>{{ $order['hovatendem'] . ' ' . $order['ten'] }}</label></div>
            	<div>Địa chỉ: <label>{{ $order['diachi'] }}</label></div>
            	<div>Điện thoại: <label>{{ $order['dienthoai'] }}</label></div>
            	<div>Email: <label>{{ $order['email'] }}</label></div>
            	<div>Tổng tiền: <label>{{ number_format($tongtien, 0, ',', '.') }} đ</label></div>
            	<div>Tình trạng: <label id="tinhtrang">{{ ($order['tinhtrang'] == 0) ? 'Chưa giao' : 'Đã giao' }}</label> <a style="cursor: pointer;" id="chinhsua">Chỉnh sửa</a></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	</div>		
	
</section>
<script>
	function update() {
		valueSelect = $('.form-control').val();
		$.ajax({
			url		: '{{ route("admin.order.update") }}',
			method	: 'GET',
			data	: {'id': <?php echo $order['id']; ?>, 'tinhtrang': valueSelect},
			success	: function (data) {
				if(data == 'ok') {
					html = (valueSelect == 0) ? 'Chưa giao' : 'Đã giao';
					$('#tinhtrang').html(html);
				}
			}
		});
	}
	$(document).ready(function () {
		$('#chinhsua').on('click', function () {
			tinhtrang = <?php echo $order['tinhtrang']; ?>;
			if(tinhtrang == 0) {
				html = '<select class="form-control" onchange="update();"><option selected="selected" value="0">Chưa giao</option><option value="1">Đã giao</option></select>';
			} else html = '<select class="form-control" onchange="update();"><option value="0">Chưa giao</option><option selected="selected" value="1">Đã giao</option></select>';
			
			$('#tinhtrang').html(html);
		});
	});
</script>
<!-- /.content -->
<!-- Button trigger modal -->
@endsection