@extends('admin.main')
@section('title', 'Khu vực quản trị của website Rammus | Contact')
@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Contact
    <small></small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-lg-5">
		@if (count($errors) > 0)
				<div class="alert alert-danger fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<ul>
						@foreach ($errors->all() as $error)
					  	<li> {!! $error !!} </li>
					  	@endforeach
					</ul>
				</div>	
		@elseif (Session::has('success'))
				<div class="alert alert-success fade in">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<ul>
					  	<li> {!! Session::get('success') !!} </li>
					</ul>
				</div>	
		@endif
		</div>
	</div>
	<?php
		$contact = unserialize($ct->content);
	?>
	<div class="row">
		<div class="col-lg-5">
			<form action="{{ route('admin.system.getContact') }}" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input type="hidden" name="_id" value="{{ $ct->id }}">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Contact</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
		                  <label for="email">Email <span>*</span></label>
		                  <input class="form-control" type="text" placeholder="Email" name="email" id="email" value="{{ old('email', (isset($contact['email'])) ? $contact['email']: null) }}">
		                </div>
		                <div class="form-group">
		                  <label for="phone">Phone <span>*</span></label>
		                  <input class="form-control" type="text" placeholder="Phone" name="phone" id="phone" value="{{ old('phone', (isset($contact['phone'])) ? $contact['phone']: null) }}">
		                </div>
		                <div class="form-group">
		                  <label for="address">Address</label>
		                  <input class="form-control" type="text" placeholder="Address" name="address" id="address" value="{{ old('address', (isset($contact['address'])) ? $contact['address']: null) }}">
		                </div>
		               
		                <div class="form-group">
		                  <label for="map">Map</label>
		                  <textarea class="form-control" rows="6" placeholder="Map..." name="map" id="map">{{ old('map', (isset($contact['map'])) ? $contact['map']: null) }}</textarea>
		                </div>  
					</div>
					<div class="box-footer">
	                	<button type="submit" class="btn btn-primary">Contact</button>
	                </div>
					<!-- /.box-body -->
				</div>				
			</form> 
		</div>
		<div class="col-lg-offset-1 col-lg-6">
          <div class="box box-warning box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Collapsable</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">
              The body of the box
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	</div>		
</section>
<script>
	
</script>
<!-- /.content -->
<!-- Button trigger modal -->
@endsection