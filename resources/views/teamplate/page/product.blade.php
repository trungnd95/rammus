@extends('teamplate.main') 
@section('title', 'Trang chủ Rammus')
@section('class-body', 'product_details checkout')
@section ('content')
<div class="maincontain-area">
	<div class="container">
		<div class="row">
			<div class="maincontain">
				<div class="col-lg-9 col-md-9">
					<!-- PRODUCT-DETAILS-AREA START-->
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="category_single_list">
								<div class="category_image">
									<?php 
										$data_img = explode(',', $product->image);
										$i = 0;
										$x = 0;
									?>
									<div class="larg_img">
										<div class="tab-content">
											@foreach ($data_img as $id_image)
											<?php 
												if ($i == 4) break;
												$img = DB::table('uploads')->select('name')->where('id', $id_image)->first();
											?>
												@if(file_exists('resources/upload/images/' . $img->name))
													@if($i == 0)
													<div class="tab-pane fade in active" id="image{{ $i }}">
														<img src="{{ url('resources/upload/images/' . $img->name) }}" alt="" style="width: 370px; height: 370px;" />
													</div>
													@else 
													<div class="tab-pane fade in" id="image{{ $i }}">
														<img src="{{ url('resources/upload/images/' . $img->name) }}" alt=""  alt="" style="width: 370px; height: 370px;" />
													</div>
													@endif
												<?php $i++; ?>
												@endif
											@endforeach
										</div>
									</div>
									<div class="small_img">
										<ul class="nav nav-tabs">
											@foreach ($data_img as $id_image)
											<?php 
												if ($x == 4) break;
												$img = DB::table('uploads')->select('name')->where('id', $id_image)->first();
											?>
												@if(file_exists('resources/upload/images/' . $img->name))
													@if($x == 0)
													<li class="active">
														<a href="#image{{ $x }}" data-toggle="tab">
															<img src="{{ url('resources/upload/images/' . $img->name) }}" alt="" style="width: 87px; height: 87px;" />
														</a>
													</li>
													@else 
													<li>
														<a href="#image{{ $x }}" data-toggle="tab">
															<img src="{{ url('resources/upload/images/' . $img->name) }}" alt="" style="width: 87px; height: 87px;" />
														</a>
													</li>
													@endif
												<?php $x++; ?>
												@endif
											@endforeach
										</ul>
									</div>
								</div>
								<div class="category_text">
									<div class="price_old_new">
										<p>{{ number_format($product->price, 0, ',', '.') }} đ</p>
									</div>
									<div class="category_prod_description">
										<h3>{{ $product->name }}</h3>
										<p>Tình trạng: {{ ($product->availability == 1) ? 'Còn hàng' : 'Hết hàng' }}</p>
									</div>
									<?php 
										$data_size 	= unserialize($product->size);
										$data_color = unserialize($product->color);
									?>
									<div class="size_color">
										<div class="size">
											<label>Size*</label> 
											<select name="size-{{ $product->id }}">
												<option value="">Size</option>
												@foreach ($data_size as $item) 
												<?php
													$size = DB::table('sizes')->select('id', 'name')->where('id', $item)->first();
												?>
												<option value="{{ $size->id }}">{{ $size->name }}</option>
												@endforeach
											</select>
										</div>
										<div class="color">
											<label>Color*</label> <select name="color-{{ $product->id }}">
												<option value="">Color</option>
												@foreach ($data_color as $item) 
												<?php
													$color = DB::table('colors')->select('id', 'name')->where('id', $item)->first();
												?>
												<option value="{{ $size->id }}">{{ $color->name }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="inc_quentity">
										<input type="text" name="quentity-{{ $product->id }}" value="1" />
									</div>
									<div class="category_prod_card_area">
										<a class="cart" style="cursor: pointer;" onclick="muahang({{ $product->id }}, '{{ url('mua-hang/') }}')"> <i class="fa fa-shopping-cart"></i></a> 
										<a style="cursor: pointer;" class="add-text-lis" onclick="muahang({{ $product->id }}, '{{ url('mua-hang/') }}')"> Add to cart </a>						
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- PRODUCT-DETAILS-AREA END-->

					<!-- PRODUCT_DESCREIPTION START-->
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="product_descreiption">
								<div class="tab_menu">
									<ul class="nav nav-tabs">
										<li class="active"><a href="#description" data-toggle="tab">Thông tin sản phẩm</a></li>
										
									</ul>
								</div>
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane fade in active" id="description">
										{!! $product->info !!}
									</div>
									
								</div>
							</div>
						</div>
					</div>
					<!-- PRODUCT_DESCREIPTION END-->
					<!-- Faqs-PRODUCT-AREA START-->
					<div class="row">
						<div class="Faqs-product-area">
							<h3 class="area-heading">Related products</h3>
							<div class="Faqs-product-corusol">
								@foreach ($related_product as $item) 
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
											<a href="{{ url('chi-tiet-san-pham/' . $item->id . '/' . $item->slug) }}"><span>{{ $item->name }}</span></a>
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
						</div>
						<!--Faqs-PRODUCT-AREA END-->
					</div>
				</div>
				<?php
					$cate = DB::table('cates')->select('parent_id')->where('id', $product->cate_id)->first();
					$cates = DB::table('cates')->select('id', 'name', 'slug')->where('parent_id', $cate->parent_id)->get();
				?>
				<div class="col-lg-3 col-md-3">
					<div class="col-lg-12 col-md-12 col-sm-6">
					<h2 class="category-heding">Categories</h2>
						<div class="manufacturers-color-menu">
							<nav>
								<ul>
									@foreach ($cates as $item)
									<li><a href="{{ url('san-pham', ['id' => $item->id, 'tenloai' => $item->slug]) }}"><i class="fa fa-arrow-right"></i>{{ $item->name }}</a></li>
									@endforeach
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
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

<script>
	
</script>
@endsection
