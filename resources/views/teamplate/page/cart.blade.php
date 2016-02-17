@extends('teamplate.main')
@section('title', 'Cart Rammus')
@section ('content')
<!-- CART_LIST_AREA START-->
<div class="cart_list_area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="single_cart_list table-responsive">
					<table class="table">
						<tbody><tr>
							<th class="delete_icon">Delete</th>
							<th class="c_prod_images">Image</th>
							<th class="c_prod_name">Product Name</th>
							<th class="c_edit_button">Update</th>
							<th class="c_qnt">Quantity</th>
							<th class="sub_total">Subtotal</th>
							<th class="grand_total">Grandtotal</th>
						</tr>
						@foreach ($content as $item)
						<tr>
							<td><a href="{{ url('xoa-san-pham', ['id' => $item['rowid']]) }}"><i class="fa fa-trash-o"></i></a></td>
							<td><img src="{{ $item['options']['img'] }}" alt="Cart"></td>
							<td>
								<p class="prod_name"><a href="#">{{ $item['name'] }}</a></p><p>Size: {{ $item['options']['size'] }}</p><p>Color: {{ $item['options']['color'] }}</p>
							</td>
							<td><a style="cursor: pointer;" id="update-product" onclick="updatesanpham('{{ $item['rowid'] }}')">Update</a></td>
							<td><input type="text" name="number" value="{{ $item['qty'] }}"></td>
							<td><span class="cart_price">{{ number_format($item['price'], 0, ',', '.') }} đ</span></td>
							<td><span class="cart_price">{{ number_format($item['price']*$item['qty'], 0, ',', '.') }} đ</span></td>
						</tr>
						@endforeach						
					</tbody></table>
				</div>
			</div>
		</div>
		<div class="total_subtotal_area">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="total_subtotal">
						<div class="total_subtotal_amount">
							<div class="subtotal">
								<span>Total:</span>
								<span class="amount">{{ number_format($total, 0, ',', '.') }} đ</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- CART_LIST_AREA END-->
<!-- CLIENT_REQUEST_AREA START-->
<div class="client_request_area">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-6">
																											
			</div>
			<div class="col-lg-4 col-md-4 hidden-sm">
				
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6">
				<div class="button_area">
					<a class="button" href="#" data-toggle="modal" data-target="#checkout">procced to checkout</a>
					<a class="button" href="{{ url('/') }}">continue shopping</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- CLIENT_REQUEST_AREA END-->

<form action="{{ route('dathang') }}" method="post">
<div class="modal fade" tabindex="-1" role="dialog" id="checkout" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" style="text-align: center;color: red;font-size: 20px;font-weight: bold;">Checkout!</h4>
      </div>
      <div class="modal-body">
        <p style="text-align: center;color: red;">Bạn cần điền thông tin để đặt hàng!</p>
        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
        	<div class="row">
        		<div class="col-lg-2">Email <span>*</span>:</div>
        		<div class="col-lg-10 form-group">
        			<input class="form-control" type="text" placeholder="Email" name="email" id="email" value="{{ old('email') }}">
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-lg-2">Họ và tên đệm <span>*</span>:</div>
        		<div class="col-lg-10">
        			<div class="row">
        				<div class="col-lg-7 form-group">
				        	<input class="form-control" type="text" placeholder="Họ và tên đệm" name="hovatendem" id="hovatendem" value="{{ old('hovatendem') }}">
        				</div>
        				<div class="col-lg-5">
        					<div class="row">
				        		<div class="col-lg-3">Tên <span>*</span>:</div>
				        		<div class="col-lg-9 form-group">
				        			<input class="form-control" type="text" placeholder="Tên" name="ten" id="ten" value="{{ old('ten') }}">
				        		</div>
				        	</div>
        				</div>
        			</div>
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-lg-2">Địa chỉ <span>*</span>:</div>
        		<div class="col-lg-10 form-group">
        			<input class="form-control" type="text" placeholder="Địa chỉ" name="diachi" id="diachi" value="{{ old('diachi') }}">
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-lg-2">Số điện thoại di động <span>*</span>:</div>
        		<div class="col-lg-10 form-group">
        			<input class="form-control" type="text" placeholder="Số điện thoại di động" name="phone" id="phone" value="{{ old('phone') }}">
        		</div>
        	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</form>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thông báo!</h4>
      </div>
      <div class="modal-body">
        <ul id="error-contact">
        	
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php $html = ''; ?>
@if(count($errors) > 0)
	@foreach ($errors->all() as $error)
	<?php 
		$html .= "<li>" . $error . "</li>";
	?>
	@endforeach
	<script type="text/javascript">
		html = '{!! $html !!}'
		$('.modal-title').text('Error');
		$('#error-contact').html(html);
		$('#myModal').modal('show');
	</script>
@elseif (Session::has('success'))
	<?php 
		$html = "<li>" . Session::get('success') . "</li>";
	?>
	<script type="text/javascript">
		html = '{!! $html !!}'
		$('.modal-title').text('Success');
		$('#error-contact').html(html);
		$('#myModal').modal('show');
	</script>
@endif

<script type="text/javascript">
	function updatesanpham(rowid) {
		html = '';
		qty		= $('[name="number"]').val();
		if(is_qty(qty) == false) {
			html = '<li>Số lượng sản phẩm phải lớn hơn 0 và là số nguyên.</li>';
		}
		if(html != '') {
			$('#error-product').html(html);
			$('#myModal').modal('show');
		} else {
			update_product_url = "{{ url('update-san-pham') }}";
			url = update_product_url + '/' + rowid + '/' + qty;
			window.location = url;		
		}
	};
</script>
@endsection