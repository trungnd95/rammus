<!-- SAID-BAR START -->
<div class="side-bar">
	<h2>
		<i class="fa fa-align-justify"></i> Category
	<nav>
		<ul>
			<?php 
				$cates = DB::table('cates')->select('id', 'name', 'slug', 'icon', 'order', 'image')->where('parent_id', 0)->orderBy('order', 'ASC')->get();

			?>
			@foreach ($cates as $cate_par)
			<li>
				<?php 
					$c = DB::table('cates')->select('id', 'name', 'slug', 'order', 'image')->where('parent_id', $cate_par->id)->orderBy('order', 'ASC')->get();
				?>
				@if (!empty($c))
					<a style="cursor: pointer;" class="side-paren">
						{{ $cate_par->name }}					
						<span class="right-icon"><i class="fa fa-arrow-circle-o-right"></i></span>					
					</a>
					@if ($cate_par->image != '')

					<div class="category-mega-menu">
						<span class="menu-text"> 
							@foreach ($c as $item_c)
							<a href="{{ url('san-pham', ['id' => $item_c->id, 'tenloai' => $item_c->slug]) }}">{{ $item_c->name }}</a>
							@endforeach
						</span> 
						<?php 
							$data_img = explode(',', $cate_par->image);
							$img = DB::table('uploads')->select('name')->where('id', $data_img[0])->first();

						?>
						<span><img src="{{ url('resources/upload/images/' . $img->name) }}" alt="Mens" /></span>	
					</div>	
					@else
					<div class="category-mega-menu" style="width: 300px;">
						<span class="menu-text" style="width: 100%;"> 
							@foreach ($c as $item_c)
							<a href="{{ url('san-pham/' . $item_c->id . '/' . $item_c->slug) }}">{{ $item_c->name }}</a>
							@endforeach
						</span>
					</div>
					@endif
				@else 
				<a href="{{ url('san-pham/' . $cate_par->id . '/' . $cate_par->slug) }}" class="side-paren">
					{{ $cate_par->name }}			
				</a>
				@endif		
			</li>
			@endforeach
			
		</ul>
	</nav>
</div>
<!-- SAID-BAR END -->
<div class="row">
	
	<div class="col-lg-12 col-md-12 col-sm-6">
		<!-- MANUFACTURERS-AREA START-->
		
		<!-- MANUFACTURERS-AREA END-->
	</div>
	<div class="col-lg-12 col-md-12 col-sm-6">
		<!-- COLOR-AREA START-->
		
		<!-- COLOR-AREA END-->
	</div>
	
	<div class="col-lg-12 col-md-12 col-sm-6">
		<!-- POPULAR-TAGS START-->
		
		<!-- POPULAR-TAGS END-->
	</div>
	<!-- OFFER_AREA START-->
	<div class="col-lg-12 col-md-12 hidden-sm">
		<!-- OFFER_AREA START-->
		
		<!-- OFFER_AREA END-->
	</div>
</div>