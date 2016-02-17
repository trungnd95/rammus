<?php date_default_timezone_set('Asia/Ho_Chi_Minh'); $t=time(); ?>
<div class="header-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<!--HEADER-TOP-MENU LEFT START-->
				<div class="header-top-menu">
					<nav>
						<ul>
							@if (Auth::check())
							<li>
								<a href="#">
									<i class="fa fa-sign-out"></i>
									<span>
										<i class="fa fa-angle-down"></i>
									</span>
								</a>
								<ul class="sup-menu">
									<li><a href="{{ route('admin.order.getOrderNew') }}">Khu vực quản trị</a></li>
									<li><a href="{{ route('auth.getLogout') }}">Logout</a></li>
								</ul>
							</li>
							@else
							<li>
								<a href="{{ route('auth.getLogin') }}">
									<i class="fa fa-user">Login</i>
								</a>
							</li>
							@endif
						</ul>
						
					</nav>
				</div>
				<!--HEADER-TOP-MENU-LEFT END-->
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<!--HEADER-TOP-MENU-RIGHT START-->
				<div class="header-top-right">
					<div class="form-and-cart">
						<form method="get">
							<input type="text" placeholder="Search..." name="seach" value="{{ old('seach') }}" />
							<button class="search-button"><i class="fa fa-search"></i></button>
						</form>
						<div class="cart-empty shopping_cart">
							<a href="{{ url('gio-hang') }}"><i class="fa fa-shopping-cart"></i></a>
						</div>
					</div>
				</div>
				<!--HEADER-TOP-MENU-RIGHT END-->
			</div>
		</div>
	</div>
</div>
<!--HEADER AREA TOP END-->

<!--MAINMENU AREA START-->
<div class="mainmenu-area">
	<div class="container">
		<div class="main-menu">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="row">							
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<!--LOGO AREA START-->
							<div class="logo">
								<a href="{{ url('/') }}"><img src="{{ url('public/teamplate/img/logo-3.png') }}" alt="" /></a>
							</div>
							<!--LOGO AREA END-->
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8">
						<!--MAINMENU START-->									
							<div class="mainmenu">
								<nav>
									<ul id="nav">
										<li class="current"><a href="{{ url('/') }}"><span><i class="fa fa-home tmp"></i></span>Home</a></li>
										<li><a href="{{ url('about') }}"><span><i class="fa fa-briefcase"></i></span>About</a></li>
										<li><a href="{{ url('blog') }}"><span><i class="fa fa-pencil-square-o"></i></span>Blogs</a></li>
										<li><a href="{{ url('contact') }}"><span><i class="fa fa-envelope"></i></span>Contact</a></li>
									</ul>						
								</nav>
							</div>
							<!--MAINMENU END-->
						</div>
					</div>
				</div>
			</div>
			<!-- MOBILE-MENU START-->
			<div class="row">
				<div class="col-md-12">
					<div class="mobile-menu">
						<ul id="mobile-menu">
							<li><a href="{{ url('/') }}">Home</a></li>
							<li><a href="{{ url('about') }}">About</a></li>
							<li><a href="{{ url('blog') }}">Blogs</a></li>
							<li><a href="{{ url('contact') }}">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- MOBILE-MENU END-->
		</div>
	</div>
</div>
<!--MAINMENU AREA END-->