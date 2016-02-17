@extends('admin.main')
@section('title', 'Khu vực quản trị của website Rammus | Edit Category')
@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Categories
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
					  	<li><a href="{{ url('admin/cate/list') }}"> Sang trang list category </a></li>
					</ul>
				</div>	
		@endif
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<form method="POST" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Edit Category</h3>
					</div>
					<div class="box-body">
						<div class="form-group">
		                  <label>Parent</label>
		                  <select class="form-control" name="parent">
		                    <option value="0">Please Choose Category</option>
		                    {!! $objCategory->create_select_category($parent_cate, 0, '', old('parent', isset($cate['parent_id']) ? $cate['parent_id'] : null)) !!}
		                  </select>
		                </div>
						<div class="form-group">
		                  <label for="name">Name <span>*</span></label>
		                  <input class="form-control" type="text" placeholder="Name" name="name" id="name" value="{{ old('name', isset($cate['name']) ? $cate['name'] : null) }}">
		                </div>
		                <div class="form-group">
		                  <label for="icon">Icon</label>
		                  <input class="form-control" type="text" placeholder="Icon" name="icon" id="icon" value="{{ old('icon', isset($cate['icon']) ? $cate['icon'] : null) }}">
		                </div>
		                <div class="form-group">
		                  <label for="order">Order</label>
		                  <input class="form-control" type="text" placeholder="Order" name="order" id="order" value="{{ old('order', isset($cate['order']) ? $cate['order'] : null) }}">
		                </div>
		                 <div class="form-group">
		                	<label for="Image">Image ID: </label>
		                	<input type="text" class="image_id form-control" disabled name="disabled_img_id"  value="{{ $cate['image'] }}" />
		                	<input type="hidden" name="image" id="Image" class="form-control image_id" value="{{ $cate['image'] }}"/>
		                </div>
		                <div class="form-group">
    						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Duyệt Ảnh</button>
    						<button type="button" class="btn btn-default" id="deleteImage">Xóa Ảnh</button>
		                </div>
		                <div class="form-group">
		                  <label for="description">Description</label>
		                  <textarea class="form-control" rows="6" placeholder="Description ..." name="description" id="description">{{ old('description', isset($cate['description']) ? $cate['description'] : null) }}</textarea>
		                </div>  
					</div>
					<div class="box-footer">
	                	<button type="submit" class="btn btn-primary">Edit Category</button>
	                </div>
					<!-- /.box-body -->
				</div> 
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
@endsection