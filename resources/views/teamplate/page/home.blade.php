@extends('teamplate.main')
@section('title', 'Trang chủ Rammus')
@section ('content')
<div class="slider-and-category">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3">				
				@include ('teamplate.block.sidebar')
			</div>
			<div class="col-lg-9 col-md-9">
				<!-- SLIDER_AREA START-->
				<div class="slider">
					<div class="fullwidthbanner-container">
						<div class="fullwidthbanner2">
							<ul>
								<?php 
									$slide = DB::table('slides')->get();
								?>
								<!-- SLIDER_LAYOUT START-->
								@foreach ($slide as $item)
								<li data-transition="random" data-slotamount="7" data-masterspeed="1000">
									<img src="{{ url('public/teamplate/img/slider/' . $item->image) }}" alt="slide">
									{!! ($item->content != '') ? $item->content : '' !!}
								</li>
								@endforeach
								<!-- SLIDER_LAYOUT END-->
							</ul>
						</div>
					</div>
				</div>
				<!-- SLIDER_AREA END-->
				<div class="top"></div>
				<!--CATEGORY PRODUCT GIRD START-->
				<div class="row">
					<div class="category-gird-product-area">
						@foreach ($products as $item)
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<!--single-featured-product START-->
							<div class="single-featured-product">
								<div class="product_img">
									<a href="{{ url('chi-tiet-san-pham/' . $item->id . '/' . $item->slug) }}"> 
									<?php 
										$data_img = explode(',', $item->image);
										$img = DB::table('uploads')->select('name')->where('id', $data_img[0])->first();
										if(file_exists('resources/upload/images/' . $img->name)) {
											$imgUrl = url('resources/upload/images/' . $img->name);
										} else { $imgUrl = ''; }										
									?>
										<img src="{{ $imgUrl }}" alt="" class="primary-image" /> 
										<img src="{{ $imgUrl }}" alt="" class="secondary-image" />
									</a> 
									
									<div class="add-cart-area">
										<div class="fet-price">
											<span class="addcart-text">{{ number_format($item->price, 0, ',', '.') }} đ</span>
										</div>
										<div class="wish">
											<a class="shopping-cart" data-toggle="modal" data-target="#product-mua-hang-{{ $item->id }}" style="cursor: pointer;"> 
												<i class="fa fa-shopping-cart"></i>
											</a> 											
										</div>
									</div>
								</div>
								<div class="infor-text">
									<a href="#"><span>{{ $item->name }}</span></a>
								</div>
							</div>
							<!--single-featured-product END-->
						</div>
						<?php 
							$data_size 	= unserialize($item->size);
							$data_color = unserialize($item->color);
						?>
						<!-- Modal -->
						<div class="modal fade" id="product-mua-hang-{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
						  <div class="modal-dialog" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						        <h4 class="modal-title" id="myModalLabel">{{ $item->name }}</h4>
						      </div>
						      <div class="modal-body">
						      	<div class="size_color">
									<div class="size">
										<label>Size*</label> 
										<select name="size-{{ $item->id }}">
											<option value="">Size</option>
											@foreach ($data_size as $item_size) 
											<?php
												$size = DB::table('sizes')->select('id', 'name')->where('id', $item_size)->first();
											?>
											<option value="{{ $size->id }}">{{ $size->name }}</option>
											@endforeach
										</select>
									</div>
									<div class="color">
										<label>Color*</label> 
										<select name="color-{{ $item->id }}">
											<option value="">Color</option>
											@foreach ($data_color as $item_color) 
											<?php
												$color = DB::table('colors')->select('id', 'name')->where('id', $item_color)->first();
											?>
											<option value="{{ $size->id }}">{{ $color->name }}</option>
											@endforeach
										</select>
									</div>
								 </div>
								 <div class="inc_quentity">
									<input type="text" name="quentity-{{ $item->id }}" value="1">
								</div>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						        <button type="button" class="btn btn-primary" onclick="muahang({{ $item->id }}, '{{ url('mua-hang/') }}')">Add to cart</button>
						      </div>
						    </div>
						  </div>
						</div>
						
						@endforeach
					</div>
					<!--CATEGORY PRODUCT-AREA END-->
				</div>
				<!--CATEGORY PRODUCT GIRD END-->
				<!--PGAINATION AREA START-->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="pagination-area">
							@if ($products->lastPage() > 1)
							<ul class="pagination">
								@for ($i = 1;  $i <= $products->lastPage(); $i++)
								<li>
						          <a class="{{ ($products->currentPage() == $i) ? 'active_p' : '' }}" href="{{ str_replace('/?', '?', $products->url($i)) }}">{{ $i }}</a>
						       	</li>
								@endfor
							</ul>
							@endif
						</div>
					</div>
				</div>
				<!--PGAINATION AREA END-->
			</div>
			<!-- GIRD CATEGORY-FORM END-->
		</div>
	</div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thông báo!</h4>
      </div>
      <div class="modal-body">
        <ul id="error-product">
        	
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
@endsection