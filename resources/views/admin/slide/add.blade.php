@extends('admin.main')
@section('title', 'Khu vực quản trị của website Rammus | Add new slide')
@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Slides
    <small></small>
  </h1>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-lg-12">
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
					  	<li><a href="{{ url('admin/system/slide-list') }}"> Sang trang list slide </a></li>
					</ul>
				</div>	
		@endif
		</div>
	</div>
	<div class="row">
	<div class="col-lg-12">
        	<div class="box box-warning box-solid">
	            <div class="box-header with-border">
	              <h3 class="box-title">Example Content Slide</h3>
	
	              <div class="box-tools pull-right">
	                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	                </button>
	              </div>
	              <!-- /.box-tools -->
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body" style="display: block;">
	            <?php 
	            	$html = '<div class="tp-caption large_black sfr" data-x="140" data-y="100" data-speed="1100" data-start="1500" data-easing="easeInOutBack" style="font-size: 18px; font-weight: 400; text-transform: normal; color: #ffaa31; font-family: Playfair Display; font-style: italic">
										Sale up to 50% off
									</div>
									<div class="tp-caption large_black sfr" data-x="170" data-y="120" data-speed="1100" data-start="1500" data-easing="easeInOutBack" style="font-size: 18px; font-weight: bold; text-transform: uppercase; color: #FFF; font-family: Montserrat;">
										<img src="'.url('public/teamplate/img/slider/slider-border.jpg').'" alt="" />
									</div>
									<div class="tp-caption large_black sfr" data-x="70" data-y="140" data-speed="1100" data-start="2000" data-easing="easeInOutBack" style="font-family: Open Sans; font-size: 54px; font-weight: 700; text-transform: uppercase; color: #fff; text-align: center; line-height: 60px">
										handBags <br />For men
									</div>
									<div class="tp-caption large_black sfr" data-x="170" data-y="260" data-speed="1100" data-start="2300" data-easing="easeInOutBack" style="font-size: 18px; font-weight: bold; text-transform: uppercase; color: #FFF; font-family: Montserrat;">
										<img src="'.url('public/teamplate/img/slider/slider-border.jpg').'" alt="" />
									</div>
									<div class="tp-caption large_black sfr" data-x="30" ata-y="300" data-speed="1100" data-start="2700" data-easing="easeInOutBack" style="font-family: Open Sans; font-size: 14px; font-weight: 300; color: #FFF; line-height: 25px; text-transform: normal; text-align: center"> 
										Fusce ac consectetur neque, nec pharetra dolor. Aenean metus <br />mauris, facilisis vel leo non, ornare pretium eros.
									</div>
									<div class="tp-caption lfb carousel-caption-inner" data-x="150" data-y="370" data-speed="1300" data-start="3000" data-easing="easeInOutBack" style="font-family: Montserrat; font-size: 12px; font-weight: bold; text-transform: uppercase; color: #F3F3F3;">
										<a href="#" class="s-btn" style="background: none; color: #fff; display: block; padding: 12px 28px; border: 2px solid #fff">
										shop now
										</a>
									</div>';
	            ?>
	            
	            <div class="form-group">
	                  <label for="example">Example Content Slide</label>
	                  <textarea class="form-control" rows="6" placeholder="Example Content Slide ..." name="example" id="example" style="height: 600px;">{{ $html }}</textarea>
	                  
                	</div> 
	            </div>
	            <!-- /.box-body -->
          </div>
          <!-- /.box -->         
        </div>
     </div>
	<form action="{{ route('admin.system.getSlideAdd') }}" method="POST" enctype="multipart/form-data">
	<div class="row">
		<div class="col-lg-12">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Add New Slide</h3>
				</div>
				<div class="box-body">						
					<div class="form-group">
			            <label for="avatar">Slide Image <span>*</span></label>
			            <div>
		                  <span class="btn btn-success fileinput-button">
		                  <i class="glyphicon glyphicon-plus"></i>
		                  <span>Add Slide...</span>
		                  <input type="file" name="slide" id="slide">
		                   </span>
			             </div>
			         </div>
			         <div class="form-group" id="display-img"></div>
	                <div class="form-group">
	                  <label for="slider-border">Slider Border Url</label>
	                  <input class="form-control" type="text" name="slider-border" id="slider-border" value="{{ url('public/teamplate/img/slider/slider-border.jpg') }}">
	                </div>
	                
	                <div class="form-group">
	                  <label for="content">Content</label>
	                  <textarea class="form-control" rows="6" placeholder="Content ..." name="content" id="content"  style="height: 600px;">{{ old('content') }}</textarea>
                	</div>  
				</div>
				<div class="box-footer">
	                <button type="submit" class="btn btn-primary">Add New Slide</button>
	            </div>
			<!-- /.box-body -->
			</div> 	
		</div>		
	</div>		
	</form>
	
</section>
<script>
File.prototype.convertToBase64 = function(callback){
    var FR= new FileReader();
    FR.onload = function(e) {
         callback(e.target.result)
    };       
    FR.readAsDataURL(this);
}

$("#slide").on('change',function(){
	var selectedFile = this.files[0];
	selectedFile.convertToBase64(function(base64){
	  // alert(base64);
		   	html = '<div class="row">';
		  	html += '<div class="col-xs-6 col-md-3">';
		    html += '<a href="#" class="thumbnail" id="display-img">';
		    html += '<img src="'+base64+'" class="img-avata-upload" />';
		    html += '</a>';
		  	html += '</div>';
			html += '</div>';
	   $('#display-img').html(html);
	}); 
});		
</script>
<!-- /.content -->
<!-- Button trigger modal -->
@endsection