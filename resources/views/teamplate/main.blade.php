<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>@yield('title')</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Fonts======================= -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
		
		<link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,700italic,700,400italic' rel='stylesheet' type='text/css'>
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
		<link rel="shortcut icon" href="{{ url('public/teamplate/img/favicon.ico') }}" type="image/x-icon">
		<!-- countdown.css ======================== -->
        <link rel="stylesheet" href="{{ url('public/teamplate/css/jquery.countdown.css') }}">
		<!-- Bootstrap CSS
		============================================ -->
        <link rel="stylesheet" href="{{ url('public/teamplate/css/bootstrap.min.css') }}">
		<!-- Mobile Menu Slicknav CSS
		============================================ -->
        <link rel="stylesheet" href="{{ url('public/teamplate/css/slicknav.css') }}">
		<!-- Font-awesome CSS
		============================================ -->
        <link rel="stylesheet" href="{{ url('public/teamplate/css/font-awesome.min.css') }}">
		<!-- rs-plugin CSS
		============================================ -->			
		<link href="{{ url('public/teamplate/lib/rs-plugin/css/settings.css') }}" rel="stylesheet" />	
		
		<!-- owl.carousel CSS
		============================================ -->
        <link rel="stylesheet" href="{{ url('public/teamplate/css/owl.carousel.css') }}">
		
		<!-- FILTER_PRICE CSS
		============================================ -->
        <link rel="stylesheet" href="{{ url('public/teamplate/css/jquery-ui.min.css') }}">
		
		<!-- normalize CSS
		============================================ -->
        <link rel="stylesheet" href="{{ url('public/teamplate/css/normalize.css') }}">
		<!-- main CSS
		============================================ -->
        <link rel="stylesheet" href="{{ url('public/teamplate/css/main.css') }}">
		<!-- Style CSS
		============================================ -->
        <link rel="stylesheet" href="{{ url('public/teamplate/css/style.css') }}">
		<!-- Responsive CSS
		============================================ -->
        <link rel="stylesheet" href="{{ url('public/teamplate/css/responsive.css') }}">
		<!-- modernizr js
		============================================ -->
        <script src="{{ url('public/teamplate/js/vendor/modernizr-2.6.2.min.js') }}"></script>
		<!-- jquery-1.11.3.min js -->
        <script src="{{ url('public/teamplate/js/vendor/jquery-1.11.3.min.js') }}"></script>
		<!-- bootstrap.min js -->
        <script src="{{ url('public/teamplate/js/bootstrap.min.js') }}"></script>
		<!-- FILTER_PRICE js -->
        <script src="{{ url('public/teamplate/js/jquery-ui.min.js') }}"></script>
        <meta property="fb:app_id" content="937742886296204" />
		<meta property="fb:admins" content="042e0459b6a3ca2cd16899a21b7f8bb1"/>
		
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=937742886296204";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>

    </head>
    <body class="@yield('class-body') home_1 home_2">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		
		
		<!--HEADER AREA START-->
		<header>
		@include ('teamplate.block.header')
		</header>
		<!--HEADER AREA END-->
		
		<!--MENU-BOTTOM START-->
		<div class="menu-bottom">
			
		</div>
		<!--MENU-BOTTOM END-->
		@yield('content')		
		
		@include ('teamplate.block.footer')

		<!-- owl.carousel.min js -->
        <script src="{{ url('public/teamplate/js/owl.carousel.min.js') }}"></script>
		<!-- jquery.slicknav.min js -->
        <script src="{{ url('public/teamplate/js/jquery.slicknav.min.js') }}"></script>
		<!-- plugins js -->
        <script src="{{ url('public/teamplate/js/plugins.js') }}"></script>
		<!-- jquery.scrollUp js -->
        <script src="{{ url('public/teamplate/js/jquery.scrollUp.min.js') }}"></script>
        <!-- RS Lib js -->		
		<script src="{{ url('public/teamplate/lib/rs-plugin/js/jquery.themepunch.plugins.min.js') }}"></script>
		<script src="{{ url('public/teamplate/lib/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
		<script src="{{ url('public/teamplate/lib/rs-plugin/rs.home.js') }}"></script>
		<!-- Countdown JS-->
		<script src="{{ url('public/teamplate/js/jquery.plugin.min.js') }}"></script>
		<script src="{{ url('public/teamplate/js/jquery.countdown.min.js') }}"></script>
		<!-- main JS -->
		<script src="{{ url('public/teamplate/js/main.js') }}"></script>
		<!-- myjs js -->
        <script src="{{ url('public/teamplate/js/myjs.js') }}"></script> 
    </body>

<!-- Tieu Long Lanh Kute -->
</html>
