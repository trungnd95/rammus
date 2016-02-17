@extends('admin.main')
@section('title', 'Khu vực quản trị của website Rammus | Add New Product')
@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Products
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
					  	<li><a href="{{ url('admin/product/list') }}"> Sang trang list product </a></li>
					</ul>
				</div>	
		@endif
		</div>
	</div>
	<form action="{{ route('admin.product.getAdd') }}" method="POST" enctype="multipart/form-data">
	<div class="row">
		<div class="col-lg-7">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Add New Product</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
		                  <label>Categories <span>*</span></label>
		                  <select class="form-control" name="category">
		                    <option value="">Please Choose Category</option>
		                    {!! $objCategory->create_select_category($parent_cate, 0, '', old('category')) !!}
		                  </select>
		                </div>
						<div class="form-group">
		                  <label for="name">Name <span>*</span></label>
		                  <input class="form-control" type="text" placeholder="Name" name="name" id="name" value="{{ old('name') }}">
		                </div>
		                <div class="form-group">
		                  <label for="price">Price</label>
		                  <input class="form-control" type="text" placeholder="Price" name="price" id="price" value="{{ old('price') }}">
		                </div>
		                <div class="form-group">
		                	<label for="Image">Image ID <span>*</span></label>
		                	<input type="text" class="image_id form-control" disabled name="disabled_img_id"  value="{{ old('disabled_img_id') }}" />
		                	<input type="hidden" name="image" id="Image" class="form-control image_id"  value="{{ old('image') }}"/>
		                </div>
		                <div class="form-group">
    						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Duyệt Ảnh</button>
    						<button type="button" class="btn btn-default" id="deleteImage">Xóa Ảnh</button>
		                </div>
		                <div class="form-group">
		                  <label for="info">Info</label>
		                  <textarea class="form-control" rows="6" placeholder="Info ..." name="info" id="info">{{ old('info') }}</textarea>
		                  <script>
	                  	ckeditor ("info")
					  </script>
	                </div>  
				</div>
				
				<!-- /.box-body -->
			</div> 	
		</div>
		<div class="col-lg-5">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Product</h3>   
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="display: block;">
              <div class="form-group">
              		<?php 
              			$number_color = DB::table('colors')->count();
              			$color1 = DB::table('colors')->skip(0)->take(ceil($number_color/2))->get();
              			$color2 = DB::table('colors')->skip(ceil($number_color/2))->take($number_color)->get();
              		?>
                  <label for="price">Color <span>*</span></label>
                  <div class="row">
                  	<div class="col-lg-6">
                  	  @foreach ($color1 as $item)
	                  <div class="checkbox">
	                    <label>
	                      <div>
	                      	<input type="checkbox" name="colors[]" value="{{ $item->id }}" <?php 
		                      	if(!empty(old('colors'))) {
		                      		$colors = old('colors');
		                      		echo (is_numeric(array_search($item->id, $colors)) == TRUE) ? 'checked="checked"' : '';
		                      	}
	                      	?> style="width: 22px;height: 22px;margin-top: 0px;">
	                      </div>
	                      <div style="margin-left: 5px;">
	                      	<label class="color-product" style="background-color: {{ $item->code }};"></label>{{ $item->name }}
	                      </div>	                      
	                    </label>
	                  </div> 
	                  @endforeach
	                </div>
	                <div class="col-lg-6">
	                   @foreach ($color2 as $item)
	                  <div class="checkbox">
	                    <label>
	                      <div>
	                      	<input type="checkbox" name="colors[]" value="{{ $item->id }}" <?php 
		                      	if(!empty(old('colors'))) {
		                      		$colors = old('colors');
		                      		echo (is_numeric(array_search($item->id, $colors)) == TRUE) ? 'checked="checked"' : '';
		                      	}
	                      	?> style="width: 22px;height: 22px;margin-top: 0px;">
	                      </div>
	                      <div style="margin-left: 5px;">
	                      	<label class="color-product" style="background-color: {{ $item->code }};"></label>{{ $item->name }}
	                      </div>  
	                    </label>
	                  </div> 
	                  @endforeach
	                </div>
                  </div>
              </div>
              <div class="form-group">
		      	<label for="price">Size <span>*</span></label>
		      	<?php 
              		$number_size 	= DB::table('sizes')->count();
              		$size1 			= DB::table('sizes')->skip(0)->take(ceil($number_size/2))->get();
              		$size2 			= DB::table('sizes')->skip(ceil($number_size/2))->take($number_size)->get();
              		echo old('availability');
              	?>
		      	<div class="row">
                  	<div class="col-lg-6">
                  	@foreach ($size1 as $item)
	                  <div class="checkbox">
	                    <label>
	                      <div>
	                      	<input type="checkbox" name="sizes[]" value="{{ $item->id }}" <?php 
		                      	if(!empty(old('colors'))) {
		                      		$sizes = old('sizes');
		                      		echo (is_numeric(array_search($item->id, $sizes)) == TRUE) ? 'checked="checked"' : '';
		                      	}
	                      	?> style="width: 22px;height: 22px;margin-top: 0px;">
	                      </div>
	                      <div style="margin-left: 5px;">
	                      {{ $item->name }}
	                      </div>	                      
	                    </label>
	                  </div> 
	                  @endforeach
	                </div>
	                <div class="col-lg-6">
	                @foreach ($size2 as $item)
	                  <div class="checkbox">
	                    <label>
	                      <div>
	                      	<input type="checkbox" name="sizes[]" value="{{ $item->id }}" <?php 
		                      	if(!empty(old('colors'))) {
		                      		$sizes = old('sizes');
		                      		echo (is_numeric(array_search($item->id, $sizes)) == TRUE) ? 'checked="checked"' : '';
		                      	}
	                      	?> style="width: 22px;height: 22px;margin-top: 0px;">
	                      </div>
	                      <div style="margin-left: 5px;">
	                      {{ $item->name }}
	                      </div>  
	                    </label>
	                  </div> 
	                  @endforeach
	                </div>
                  </div>
		      </div>
		      <div class="form-group">
		      	   <label for="name">Availability <span>*</span></label>
                  <div class="radio">
                    <label>
                      <div>
                      	<input type="radio" name="availability" id="optionsRadios1" value="1" <?php 
                      		$availability = old('availability');
                      		if(isset($availability)) {
                      			if(old('availability') == 1) {
                      				echo 'checked="checked"';
                      			} else echo '';
                      		} else echo 'checked="checked"';
                      	?> style="height: 22px;width: 22px;margin-top: -2px;">
                      </div>
                      <div style="margin-left: 5px;">
                      	Còn hàng
                      </div>
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                     <div>
                      	<input type="radio" name="availability" id="optionsRadios1" value="0" <?php 
                      		$availability = old('availability');
                      		if(isset($availability)) {
                      			if(old('availability') == 0) {
                      				echo 'checked="checked"';
                      			} else echo '';
                      		} 
                      	?>  style="height: 22px;width: 22px;margin-top: -2px;">
                      </div>
                      <div style="margin-left: 5px;">
                      	Hết hàng 
                      </div>
                    </label>
                  </div>
              </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Add New Product</button>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	</div>		
	</form>
	<!-- Modal -->
	<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document" style="width: 90%;">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Insert Media</h4>
	      </div>
	      <div class="modal-body">
		       <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active"><a href="#upload" aria-controls="home" role="tab" data-toggle="tab">Upload Files</a></li>
			    <li role="presentation"><a href="#media-library" aria-controls="profile" role="tab" data-toggle="tab" class="media-library">Media Library</a></li>
			  </ul>
			  <!-- Tab panes -->
			  <div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="upload">
			    	<div style="margin-top: 10px;">				
						<div class="jFiler jFiler-theme-dragdropbox">
							<input type="file" name="files[]" id="filer_input2" multiple="multiple">				
						</div>
					</div>
				</div>
			    <div role="tabpanel" class="tab-pane" id="media-library">
			    	<div class="row">
			    		<div class="col-lg-12">
			    			<ul id="ul-img-lib">	
			    			
			    			</ul>
			    		</div>
			    	</div>
			    </div>
			  </div>  
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary disabled" id="inser-into-post">Insert into post</button>
	      </div>
	    </div>
	  </div>
	</div>		
</section>
<script>
	$(document).ready(function () {
		$('.media-library').click(function () {
			$.ajax({
				url: "{{ url('admin/upload/upload') }}",
				method: 'GET',
				dataType: "JSON",
				success: function (data) {
					html = '';
					$.each(data, function (i, val) {
						html += '<li class="li-img-lib">';
	    				html +=		'<div class="div-checkbox">';
						html += 		'<input type="checkbox" name="idImage[]" value="'+ val.id +'" style="width: 20px;height: 20px;">';
						html +=		'</div>';
					    html +=		'<div class="float-left">';
						html +=			'<img alt="" src="'+ val.url +'" style="width: 150px;height: 150px;">';
						html +=		'</div>';						    					
						html +=	'</li>';
					});
					html += '<script>';
					html += 	"$(':checkbox').on('change', function () {";
					html += 		'var img_id = [];'
					html += 		"checkbox = $('[name=\"idImage[]\"]:checked');";
					html +=			"if(checkbox.length > 0) {";
					html +=				"$('#inser-into-post').removeClass('disabled');";
					html += 			"$.each(checkbox, function(i, val) {"; 
					html += 				"img_id[i] = $(this).val();";
					html += 			"});";
					html += 		"} else {";
					html +=				"$('#inser-into-post').addClass('disabled');";
					html += 		"}";
					html +=     	"$('#inser-into-post').click(function () { if($(this).attr('class') == 'btn btn-primary') { $('.image_id').val(img_id); $('#myModal').modal('hide'); $('[name=\"idImage[]\"]:checked').prop('checked', false);  } });";
					html += 	"});";					
					html += '<\/script>';
					$("#ul-img-lib").append(html);
				}
			});
		});	
		$("#deleteImage").click(function () {
			$('.image_id').val('');
		});	
	});
</script>
<!-- /.content -->
<!-- Button trigger modal -->
@endsection