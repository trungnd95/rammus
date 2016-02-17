@extends('teamplate.main')
@section('title', 'Blog Rammus')
@section ('content')
<div class="maincontain-area">
	<div class="container">
		<div class="row">
			@foreach ($blogs as $item)
			<!-- SINGLE-BLOG START-->
			<div class="col-lg-6 col-md-6" style="margin-top: 50px;">
				<div class="single-blog">
					<div class="blog-img">
						<a href="{{ url('baiviet', ['id' => $item->id, 'slug' => $item->slug]) }}"><img src="{{ url('public/teamplate/img/blog/' . $item->image) }}" alt="Blog" style="width:555px;height:252px;"></a>
					</div>
					<div class="blog-text-area">						
						<div class="block-desc" style="width:555px;height: 130px;">
							<a href="{{ url('baiviet', ['id' => $item->id, 'slug' => $item->slug]) }}">
								<h3>{{ $item->title }}...</h3>
							</a>
							<p>{{ $item->description }}...</p>
							<?php 
								$name = DB::table('users')->select('display_name')->where('id', $item->user_id)->first();
							?>
							<div class="comment-area">
								<a href="#">
									<span class="author"><i class="fa fa-user"></i>{{ $name->display_name }}</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- SINGLE-BLOG END-->
			@endforeach
			<div class="col-lg-12 col-md-12">
				<!--PGAINATION AREA START-->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="pagination-area">
							@if ($blogs->lastPage() > 1)
							<ul class="pagination">
								@for ($i = 1;  $i <= $blogs->lastPage(); $i++)
								<li>
						          <a class="{{ ($blogs->currentPage() == $i) ? 'active_p' : '' }}" href="{{ str_replace('/?', '?', $blogs->url($i)) }}">{{ $i }}</a>
						       	</li>
								@endfor
							</ul>
							@endif
						</div>
					</div>
				</div>
				<!--PGAINATION AREA END-->
			</div>
		</div>
	</div>
</div>
@endsection