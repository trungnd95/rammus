@extends('admin.main')
@section('css')
	<!--Stylesheets-->
	
	<!--jQuery-->
@endsection
@section('title', 'Khu vực quản trị của website Rammus | Add New Category')
@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Upload New Media
    <small></small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-lg-12">
			<form method="POST" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="jFiler jFiler-theme-dragdropbox">
					<input type="file" name="files[]" id="filer_input2" multiple="multiple">				
				</div>
			</form>
		</div>
	</div>		
</section>
<!-- /.content -->
	
@endsection
@section('footerscript')

@endsection