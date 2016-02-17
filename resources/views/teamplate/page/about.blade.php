@extends('teamplate.main')
@section('title', 'Cart Rammus')
@section ('content')
<!-- CART_LIST_AREA START-->
<?php 
	$ab = DB::table('infos')->where('page', 'about')->first();
	$about = unserialize($ab->content);
?>
<div class="maincontain-area">
	<div class="container">
		<span class="title">{{ $about['title'] }}</span>
		<div class="content">
			{!! $about['content'] !!}
		</div>
	</div>
</div>
@endsection