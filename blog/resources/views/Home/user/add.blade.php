<!DOCTYPE html>
<!-- saved from url=(0082)http://demo.smartaddons.com/templates/html/etrostore/address_shipping_details.html -->
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
	<link rel="stylesheet" href="{{asset('Home/css/select2.css')}}">

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
	<link rel="stylesheet" id="rtl">
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
										<span>添加新地址</span>
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
									<h2 class="entry-title">添加新地址</h2>
								</header>

								<div class="entry-content">
									<div class="woocommerce">
										@include('Layouts/left')

										<div class="woocommerce-MyAccount-content">
											<form id="info" method="post" onsubmit="return check()" action="/user/address/exadd">
												{{ csrf_field() }}
												<h3>添加收货地址</h3>
												<p class="form-row form-row form-row-first validate-required" id="billing_first_name_field">
													<label for="billing_first_name">
														收件人
														<abbr class="required" title="required">*</abbr>
													</label>
													<input title="收件人" type="text" class="input-text " name="name" id="billing_first_name" placeholder="请输入收件人姓名" autocomplete="given-name" >
												</p>

												<p class="form-row form-row form-row-last validate-required" id="billing_last_name_field">
													<label for="billing_last_name">
														联系电话
														<abbr class="required" title="required">*</abbr>
													</label>
													<input title="联系电话" placeholder="请输入您的联系电话" type="text" class="input-text " name="phone" id="billing_last_name" autocomplete="family-name" >
												</p>

												<div class="clear"></div>
												<div style="float:left;margin-right:20px;" class="">
													<label for="billing_company">
														省份
													</label>　　　　　　　　
													<label for="billing_company">
														城市
													</label>　　　　
													<label for="billing_company">
														区/县
													</label><br>
													<select title="省份" class="select" name="province">
														<option value="">-请选择-</option>
														@foreach($region as $v)
														<option data-id='{{$v->id}}' value="{{$v->id}}">{{$v->name}}</option>
														@endforeach
													</select>
													<select title="城市" class="select" name="city">
														<option value="">-请选择-</option>
													</select>
													<select title="区/县" class="select" name="district">
														<option value="">-请选择-</option>
													</select>
												</div>

												<div class="clear"></div>

												<p class="form-row form-row form-row-wide address-field validate-required" id="billing_address_1_field">
													<label for="billing_address_1">
														详细地址
														<abbr class="required" title="required">*</abbr>
													</label>

													<input title="详细地址" type="text" class="input-text " name="detail" id="billing_address_1" placeholder="请输入您的详细地址" autocomplete="address-line1" >
												</p>



												<div class="clear"></div>

												<p>
													<input type="submit" class="button" name="save_address" value="添加">
												</p>
										   </form>
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

	<a id="etrostore-totop" href="http://demo.smartaddons.com/templates/html/etrostore/address_shipping_details.html#" style="display: none;"></a>

	<script type="text/javascript" src="{{asset('Home/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/jquery-migrate.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/js.cookie.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/select2.min.js')}}"></script>

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
		function check() {
			var bool = true;
			$('#info').find('input[type="text"]').each(function () {
				if ($(this).val() == '')
				{
					var title = $(this).attr('title')
					alert('请输入'+title)
					return bool = false;
				}
			})
			if (!bool) {
				return bool;
			}
			$('#info').find('.select').each(function () {
				if ($(this).val() == ''){
					var title = $(this).attr('title')
					alert('请选择'+title)
					return bool = false;
				}
			})
			return bool;
		}
		function select() {

		}
	</script>
	<script type="text/javascript">
		$('.select').on('change', function() {
			$(this).val()
			$(this).nextAll().each(function (){
				this.options.length = 1;
			});
			var that = $(this);
			var id = $(this).find("option:selected").attr("data-id");
			console.log(id)
			$.ajax({
				type: 'get',
				url: '{{url("/user/select")}}',
				data: 'id='+id,
				dataType: 'json',
				success: function (msg) {
					var str = '';
					for (var i = 0; i<msg.length; i++) {
						str += '<option value='+msg[i].id+' data-id="'+msg[i].id+'">'+msg[i].name+'</option>';
					}
					that.next('select').append(str);
				}
			})
		})
	</script>
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

			$('#billing_country').select2();
		});
   </script>


<div id="cboxOverlay" style="display: none;"></div><div id="colorbox" class="" role="dialog" tabindex="-1" style="display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxTitle" style="float: left;"></div><div id="cboxCurrent" style="float: left;"></div><button type="button" id="cboxPrevious"></button><button type="button" id="cboxNext"></button><button id="cboxSlideshow"></button><div id="cboxLoadingOverlay" style="float: left;"></div><div id="cboxLoadingGraphic" style="float: left;"></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div style="clear: left;"><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position: absolute; width: 9999px; visibility: hidden; display: none; max-width: none;"></div></div></body></html>
