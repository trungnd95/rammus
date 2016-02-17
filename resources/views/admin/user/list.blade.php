@extends('admin.main') 
@section('title', 'Khu vực quản trị của websiteRammus | List User') 

@section ('content')
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>List User 
		<small>
			<a href="{{ route('admin.user.getAdd') }}" class="btn btn-block btn-primary">Add New User</a>
		</small>
	</h1>
</section>
	
	
<section class="content">
	<div class="row">
		<div class="col-lg-12">
			@if (Session::has('success'))
			<div class="alert {{ Session::get('success') }} fade in">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<ul>
				  	<li>
				  		@if (Session::get('success') == 'alert-success')
				  			{{ "Bạn đã xóa thành công user!" }}
				  		@else 
				  			{{ "Bạn không được phép xóa user này!" }}
				  		@endif
				  	</li>
				</ul>
			</div>	
			@endif
		</div>
	</div>
	<div class="box">
		<div class="box-header">
			<h3 class="box-title">Danh sách các user</h3>
		</div>
		<!-- /.box-header -->
		<form method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="box-body">
				<div class="row" style="margin-bottom: 5px;">
					<div class="col-lg-3">
						
					</div>
					<div class="col-lg-offset-6 col-lg-3">
						<div class="input-group">
							<input type="text" name="txtSeach" class="form-control" placeholder="Search Categories" value="{{ $seach }}" > 
							<span class="input-group-btn">
								<button type="submit" name="search" id="search-btn" class="btn btn-flat" value="seach">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th style="width: 44px;">STT</th>
									<th>Email</th>
									<th>Display Name</th>
									<th>Level</th>
									<th>Status</th>
									<th style="width: 40px;">Edit</th>
									<th style="width: 60px;">Delete</th>
								</tr>
							</thead>
							<tbody><?php $i = 1; ?>
								@foreach ($users as $item)
								<tr>
									<td>{{ $i }}</td>
									<td>
										<a href="{{ url('admin/user/edit/' . $item['id']) }}" class="fwbold">{{ $item['email'] }}</a>
									</td>
									<td>{{ $item['display_name'] }}</td>
									<td><?php 
										$i++;
										switch ($item['level']) {
											case 0: echo "Supper Admin"; break;
											case 1: echo "Admin"; break;
											case 2: echo "Member"; break;
										}
									?></td>
									<td>{{ ($item['status'] == 1) ? "Hoạt động" : "Tạm ngừng" }}</td>
									<td><a href="{{ url('admin/user/edit/' . $item['id']) }}">Edit</a></td>
									<td><a style="color: red; cursor: pointer;" data-toggle="modal" data-target="#delete-id-{{ $item['id'] }}">Delete</a></td>

									  <div class="modal fade" id="delete-id-{{ $item['id'] }}">
									  <div class="modal-dialog">
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        <h4 class="modal-title">Delete Users</h4>
									      </div>
									      <div class="modal-body">
									        <p>Bạn chắc chắn muốn xóa user này!</p>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									        <a href="{{ url('admin/user/delete/' . $item['id'] . '/' . $seach) }}" class="btn btn-primary">Delete</a>
									      </div>
									    </div><!-- /.modal-content -->
									  </div><!-- /.modal-dialog -->
									</div><!-- /.modal -->
								</tr>
								@endforeach 
							</tbody>
							<tfoot>
								<tr>
									<th>STT</th>
									<th>Email</th>
									<th>Display Name</th>
									<th>Level</th>
									<th>Status</th>									
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						@if ($users->lastPage() > 1)
						<ul class="pagination" style="float:right; margin-top: -5px;">
								@if ($users->currentPage() != 1)
								<li class="paginate_button previous">
									<a href="{{ str_replace('/?', '?', $users->url($users->currentPage() - 1)) }}">Previous</a>
								</li>
								@endif
								@for ($i = 1;  $i <= $users->lastPage(); $i++)
								<li class="paginate_button {{ ($users->currentPage() == $i) ? 'active' : '' }}">
						          <a href="{{ str_replace('/?', '?', $users->url($i)) }}">{{ $i }}</a>
						       	</li>
								@endfor
								@if ($users->currentPage() != $users->lastPage() &&  $users->lastPage() > 1)
							    <li class="paginate_button next"><a href="{{ str_replace('/?', '?', $users->url($users->currentPage() + 1)) }}">Next</a></li>
							    @endif
						</ul>
						@endif
					</div>
				</div>
			</div>
			
			<div class="modal fade" id="myModal">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title">Delete Users</h4>
			      </div>
			      <div class="modal-body">
			        <p>Bạn chắc chắn muốn xóa những user được chọn!</p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary" name="apply" value="apply" >Delete</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- Main content -->	
		</form>
	</div>
	
	<div class="modal fade" id="modalError">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Error</h4>
	      </div>
	      <div class="modal-body">
	        <p>Bạn chưa chọn user!</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<div class="modal fade" id="modalDelete">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Delete</h4>
	      </div>
	      <div class="modal-body">
	        <p>Bạn chưa chọn hành động delete!</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</section>
<script>
	$(document).ready(function () {
		$('#aApply').click(function () {
			val = $('[name="selectDelete"]').val();
			if (val != 'delete') {
				$('#modalDelete').modal('show');
			} else {
				error = "";
				numberChecked = $('input:checked').length;
				if(numberChecked == 1) {
					error = "ok";
				} else {
					$.each($('input:checked'), function (i, val) {
						if($(this).val() == 'all') {
							if((numberChecked - 3) < 1) {
								error = "ok";
							}
						}
					});	
				}
	
				if(error == "ok") {
					$('#modalError').modal('show');
				} else {
					$('#myModal').modal('show');
				}
			}
		});
	});
//$('#myModal').modal('show');
</script>
<!-- /.content -->
@endsection
