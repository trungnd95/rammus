@extends('admin.main')
@section('title', 'Khu vực quản trị của website Rammus | Contact')
@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>Read Contact 
		
	</h1>
</section>
	
	
<section class="content">
	<div class="box" style="padding: 20px;">
		<div class="your-name">
			<label>Name: </label>
			{{ $contact->your_name }}
		</div>
		<div class="c-email">
			<label>Email: </label>
			{{ $contact->email }}
		</div>
		<div class="c-content">
			<label>Content: </label>
			{{ $contact->content }}
		</div>
	</div>
</section>
<script>
	
//$('#myModal').modal('show');
</script>
<!-- /.content -->
<!-- Button trigger modal -->
@endsection