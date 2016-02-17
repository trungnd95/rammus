@extends('teamplate.main')
@section('title', 'Cart Rammus')
@section ('content')

<!-- MAINCONTAIN-AREA START-->
<div class="maincontain-area">
	<div class="container">
		<div class="row">
			<div class="maincontain">
				<div class="col-lg-3 col-md-3">
					<div class="row">
					<!-- BLOG CATEGORIES START-->
						<div class="col-lg-12 col-md-12 col-sm-6">
						<h2 class="category-heding">Bài viết mới nhất.</h2>
							<div class="manufacturers-color-menu">
								<nav>
									<ul>
										<?php 
											$blogs = DB::table('blogs')->select('id', 'title', 'slug')->skip(0)->take(10)->get();
										?>
										@foreach ($blogs as $item)
										<li><a href="{{ url('baiviet', ['id' => $item->id, 'slug' => $item->slug]) }}"><i class="fa fa-arrow-right"></i>{{ $item->title }}</a></li>
										@endforeach
									</ul>
								</nav>
							</div>
						</div>
					<!-- BLOG CATEGORIES END-->
					
					</div>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-12">
					<div class="row">
						<!-- BLOAG_MAIN_AREA START-->
						<div class="bloag_main_area">
							<!-- BLOG-DETAILS START-->
							<div class="col-lg-12 col-md-12">
								<div class="single-blog">
									
									<div class="blog-header">
										<div class="blog-wrap" style="width:100%;height: 100px;">
											<a>
												<h3>{{ $blog->title }} </h3>
											</a>
											<?php 
												$name = DB::table('users')->select('display_name')->where('id', $blog->user_id)->first();
											?>
											<div class="blog-info">
												<a href="#">
													<span class="author"><i class="fa fa-user"></i>{{ $name->display_name }}</span>
												</a>
												<a href="#">
													<span class="comment"><i class="fa fa-times"></i>{{ $blog->created_at }}</span>
												</a>
											</div>
										</div>
									</div>
									<div class="description_details">
										<p>{!! $blog->content !!}</p>
										
									</div>
								</div>
							</div>
							<div class="comment">
											
							</div>
							<!-- BLOG-DETAILS END-->
						</div>
						<!-- BLOAG_MAIN_AREA END-->
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>

<!-- MAINCONTAIN-AREA END-->
@endsection