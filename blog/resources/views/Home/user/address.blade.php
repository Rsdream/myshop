<!DOCTYPE html>
<!-- saved from url=(0067)http://demo.smartaddons.com/templates/html/etrostore/addresses.html -->
<html lang="en" class="js_active vc_desktop vc_transform vc_transform"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>My Account - Premium Multipurpose HTML5/CSS3 Theme</title>


	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- FAVICONS -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://demo.smartaddons.com/templates/html/etrostore/icons/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://demo.smartaddons.com/templates/html/etrostore/icons/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://demo.smartaddons.com/templates/html/etrostore/icons/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="http://demo.smartaddons.com/templates/html/etrostore/icons/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="http://demo.smartaddons.com/templates/html/etrostore/icons/favicon.png">

	<!-- GOOGLE WEB FONTS -->
	<link rel="stylesheet" href="{{asset('Home/css/font-awesome.min.css')}}">

	<!-- BOOTSTRAP 3.3.7 CSS -->
	<link rel="stylesheet" href="{{asset('Home/css/bootstrap.min.css')}}">

	<!-- SLICK v1.6.0 CSS -->
	<link rel="stylesheet" href="{{asset('Home/css/slick.css')}}">

	<link rel="stylesheet" href="{{asset('Home/css/jquery.fancybox.css')}}">
	<link rel="stylesheet" href="{{asset('Home/css/colorbox.css')}}">
	<link rel="stylesheet" href="{{asset('Home/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('Home/css/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{asset('Home/css/js_composer.min.css')}}">
	<link rel="stylesheet" href="{{asset('Home/css/woocommerce.css')}}">
	<link rel="stylesheet" href="{{asset('Home/css/woocommerce-layout.css')}}">
	<link rel="stylesheet" href="{{asset('Home/css/woocommerce-smallscreen.css')}}">
	<link rel="stylesheet" href="{{asset('Home/css/style.css')}}">


	<link rel="stylesheet" href="{{asset('Home/css/custom.css')}}">
	<link rel="stylesheet" href="{{asset('Home/css/app-orange.css')}}" id="theme_color">
	<link rel="stylesheet"  id="rtl">
	<link rel="stylesheet" href="{{asset('Home/css/app-responsive.css')}}">
<style type="text/css">.fancybox-margin{margin-right:17px;}</style></head>

<body class="page woocommerce-account woocommerce-page woocommerce-edit-address">
	<div class="body-wrapper theme-clearfix">
		@include('Layouts/head')

		<div class="listings-title">
			<div class="container">
				<div class="wrap-title">
					<h1>我的收货地址</h1>
					<div class="bread">
						<div class="breadcrumbs theme-clearfix">
							<div class="container">
								<ul class="breadcrumb">
									<li>
										<a href="{{url('/')}}">首页</a>
										<span class="go-page"></span>
									</li>

									<li class="active">
										<span>收货地址</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="post-6 page type-page status-publish hentry">
						<div class="entry">
							<div class="entry-content">
								<header>
									<h2 class="entry-title">收货地址</h2>
								</header>

								<div class="entry-content">
									<div class="woocommerce">
										@include('Layouts/left')

										<div class="woocommerce-MyAccount-content">
											<p>
												<a href="{{url('user/address/add')}}">添加新的地址</a>
											</p>
											@foreach($addressList as $v)
											<div class="u-column1 col-1 woocommerce-Address addresses">
												<header class="woocommerce-Address-title title">
													<h3>{{$v->name}}</h3>
													<a href="{{url('user/address/delete', ['id' => $v->id])}}" class="edit">删除</a>
													<a href="{{url('user/address/edit', ['id' => $v->id])}}" style="margin-right:10px;" class="edit">编辑</a>
												</header>

												<address>
													省市区　：　{{$v->pro}}　{{$v->city}}　{{$v->area}}<br>
													详细地址：　{{$v->comment}}<br>
													联系电话：　{{$v->phone}}<br>

												</address>
											</div>
											@endforeach

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		@include('Layouts/footer')
	</div>

	<!-- DIALOGS -->

   <div class="modal fade" id="login_form" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog block-popup-login">
			<a href="javascript:void(0)" title="Close" class="close close-login" data-dismiss="modal">Close</a>

			<div class="tt_popup_login">
				<strong>Sign in Or Register</strong>
			</div>

			<div class="block-content">
				<div class="col-reg registered-account">
					<div class="email-input">
						<input type="text" class="form-control input-text username" name="username" id="username" placeholder="Username">
					</div>

					<div class="pass-input">
						<input class="form-control input-text password" type="password" placeholder="Password" name="password" id="password">
					</div>

					<div class="ft-link-p">
						<a href="http://demo.smartaddons.com/templates/html/etrostore/lost_password.html" title="Forgot your password">Forgot your password?</a>
					</div>

					<div class="actions">
						<div class="submit-login">
							<input type="submit" class="button btn-submit-login" name="login" value="Login">
						</div>
					</div>
				</div>

				<div class="col-reg login-customer">
					<h2>NEW HERE?</h2>

					<p class="note-reg">Registration is free and easy!</p>

					<ul class="list-log">
						<li>Faster checkout</li>

						<li>Save multiple shipping addresses</li>

						<li>View and track orders and more</li>
					</ul>

					<a href="http://demo.smartaddons.com/templates/html/etrostore/create_account.html" title="Register" class="btn-reg-popup">Create an account</a>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>

	<a id="etrostore-totop" href="http://demo.smartaddons.com/templates/html/etrostore/addresses.html#" style="display: none;"></a>

	<script type="text/javascript" src="{{asset('Home/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/jquery-migrate.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/js.cookie.min.js')}}"></script>

	<!-- OPEN LIBS JS -->
	<script type="text/javascript" src="{{asset('Home/js/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/slick.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('Home/js/jquery.colorbox-min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/isotope.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/jquery.fancybox.pack.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/category-ajax.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/jquery.countdown.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/js_composer_front.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('Home/js/plugins.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/megamenu.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/main.min.js')}}"></script>

	<script type="text/javascript">
		var sticky_navigation_offset_top = $("#header .header-bottom").offset().top;
		var sticky_navigation = function(){
									var scroll_top = $(window).scrollTop();
									if (scroll_top > sticky_navigation_offset_top) {
										$("#header .header-bottom").addClass("sticky-menu");
										$("#header .header-bottom").css({ "top":0, "left":0, "right" : 0 });
									} else {
										$("#header .header-bottom").removeClass("sticky-menu");
									}
								};
		sticky_navigation();
		$(window).scroll(function() {
			sticky_navigation();
		});

		$(document).ready (function () {
			$( ".show-dropdown" ).each(function(){
				$(this).on("click", function(){
					$(this).toggleClass("show");
					var $element = $(this).parent().find( "> ul" );
					$element.toggle( 300 );
				});
			});
		});
   </script>


<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none; max-width: none;"></div></div></body></html>
