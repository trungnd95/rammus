@extends('teamplate.main')
@section('title', 'Contact')
@section ('content')
<!-- CART_LIST_AREA START-->
<?php 
	$ct = DB::table('infos')->where('page', 'contact')->first();
	$contact = unserialize($ct->content);
?>
<!-- MAINCONTAIN-AREA START-->
<div class="maincontain-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<!-- CONTACT_INFO START-->
				<div class="contact_info">
					<div class="contact_text">
						<h2>Contact info</h2>
						<p>get in touch</p>
					</div>
					<div class="contact_social_media">
						<ul>
							<li>
								<span class="contact_icon"><i class="fa fa-envelope"></i></span>
								<span class="social_text">E-mail: {{ $contact['email'] }}</span>
							</li>
							<li>
								<span class="contact_icon"><i class="fa fa-phone"></i></span>
								<span class="social_text">Phone: {{ $contact['phone'] }}</span>
							</li>
							<li>
								<span class="contact_icon"><i class="fa fa-map-marker"></i></span>
								<span class="social_text">Address: {{ $contact['address'] }}</span>
							</li>
						</ul>
					</div>
				</div>
				<!-- CONTACT_INFO END-->
			</div>
		</div>
		<!-- MAP_COMMENT_AREA START-->
		<div class="map_comment_area">
			<div class="row">
				<!-- MAP START-->
				<div class="col-lg-7 col-md-7">
					<div class="contact-map">
						<div id="googleMap" style="width:100%;height:360px;">{!! $contact['map'] !!}</div>
					</div>
				</div>
				<!-- MAP END-->
				<!-- COMMENT_FORM START-->
				<div class="col-lg-5 col-md-5">
					<h2 class="heading_comments">Leave a comments</h2>
					<div class="comment_form">
						<form method="post" action="{{ route('postContact') }}">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<p>
								<label>Your Name(*)</label>
								<input type="text" name="your_name" value="{{ old('your_name') }}">
							</p>
							<p>
								<label>Email Address(*)</label>
								<input type="email" name="email" value="{{ old('email') }}">
							</p>
							<p><textarea rows="3" placeholder="Message(*)" name="message">{{ old('message') }}</textarea></p>
							<div class="button_for_text">
								<button type="submit">Post comment</button>
							</div>
						</form>
					</div>
				</div>
				<!-- COMMENT_FORM END-->
			</div>
		</div>
		<!-- MAP_COMMENT_AREA END-->
	</div>
</div>
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <ul id="error-contact">
        
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php $html = ''; ?>
@if(count($errors) > 0)
	@foreach ($errors->all() as $error)
	<?php 
		$html .= "<li>" . $error . "</li>";
	?>
	@endforeach
	<script type="text/javascript">
		html = '{!! $html !!}'
		$('.modal-title').text('Error');
		$('#error-contact').html(html);
		$('#myModal').modal('show');
	</script>
@elseif (Session::has('success'))
	<?php 
		$html = "<li>" . Session::get('success') . "</li>";
	?>
	<script type="text/javascript">
		html = '{!! $html !!}'
		$('.modal-title').text('Success');
		$('#error-contact').html(html);
		$('#myModal').modal('show');
	</script>
@endif
<!-- MAINCONTAIN-AREA END-->

@endsection