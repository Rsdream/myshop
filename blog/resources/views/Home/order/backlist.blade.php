<!DOCTYPE html>
<html lang="en">
<head>
	<title>商城首页</title>
	<meta charset="utf-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- GOOGLE WEB FONTS -->
	<link rel="stylesheet" href="{{asset('Home/css/font-awesome.min.css')}}">

	<!-- BOOTSTRAP 3.3.7 CSS -->
	<link rel="stylesheet" href="{{asset('Home/css/bootstrap.min.css')}}" />

	<!-- SLICK v1.6.0 CSS -->
	<link rel="stylesheet" href="{{asset('Home/css/slick-1.6.0/slick.css')}}" />
	<style type="text/css">
	    *{text-decoration: none;list-style: none}
	</style>

	<link rel="stylesheet" href="{{asset('Home/css/jquery.fancybox.css')}}" />
	<link rel="stylesheet" href="{{asset('Home/css/yith-woocommerce-compare/colorbox.css')}}" />
	<link rel="stylesheet" href="{{asset('Home/css/owl-carousel/owl.carousel.min.css')}}" />
	<link rel="stylesheet" href="{{asset('Home/css/owl-carousel/owl.theme.default.min.css')}}" />
	<link rel="stylesheet" href="{{asset('Home/css/js_composer/js_composer.min.css')}}" />
	<link rel="stylesheet" href="{{asset('Home/css/woocommerce/woocommerce.css')}}" />
	<link rel="stylesheet" href="{{asset('Home/css/yith-woocommerce-wishlist/style.css')}}" />


	<link rel="stylesheet" href="{{asset('Home/css/yith-woocommerce-wishlist/style.css')}}" />
	<link rel="stylesheet" href="{{asset('Home/css/custom.css')}}" />
	<link rel="stylesheet" href="{{asset('Home/css/app-orange.css')}}" id="theme_color" />
	<link rel="stylesheet" href="" id="rtl" />
	<link rel="stylesheet" href="{{asset('Home/css/app-responsive.css')}}" />

	<link href="{{asset('/Ui/AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css" />

	<link href="{{asset('/Ui/basic/css/mydemo.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('/Ui/css/cartstyle.css')}}" rel="stylesheet" type="text/css" />

	<link href="{{asset('/Ui/css/jsstyle.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('/Ui/jq/css/style.css')}}" rel="stylesheet" type="text/css" />

	<script type="text/javascript" src="{{asset('/Ui/js/address.js')}}"></script>
	<script type="text/javascript" src="{{asset('/Ui/jq/jq.js')}}"></script>
	<script type="text/javascript" src="{{asset('/Ui/jq/js/ui.js')}}"></script>

<link rel="stylesheet"  type="text/css" href="{{asset('Ui/AmazeUI-2.4.2/assets/css/amazeui.css')}}"/>
<link href="{{asset('Ui/AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css">


<link href="{{asset('Ui/css/sustyle.css')}}" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{{asset('Ui/basic/js/jquery-1.7.min.js')}}"></script>
<title>发表评论</title>

<link href="{{asset('/Ui/AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('/Ui/AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css">

<link href="{{asset('/Ui/css/personal.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('/Ui/css/appstyle.css')}}" rel="stylesheet" type="text/css">
<script type="text/javascript" src="{{asset('/Ui/js/jquery-1.7.2.min.js')}}"></script>
	
</head>

<body class="page page-id-6 home-style1">




	<div class="body-wrapper theme-clearfix">
		@include('Layouts/head')
<div style="clear: both"></div>
@if (session('backlist'))
    <center>
    <div class="alert alert-success" style="width: 200px">
        <span style="text-align: center;">{{ session('backlist') }}</span>
    </div>
    </center>
	    <script type="text/javascript">
                //3秒后清除提示样式
                setTimeout(function () {
        	        $('.alert-success').remove();
                    },3000);
        </script>
@endif

<div class="user-comment">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">申请退款</strong> / <small>Make&nbsp;Comments</small></div>
						</div>
						<hr/>

						<div class="comment-main">
						<!--多个商品评论-->
						    @if (!empty($data))
						    @foreach ($data as $v)
						    <form action="{{url('order/back')}}" method="post" onSubmit="return check(this)" >
						    {{ csrf_field() }}
						    <input type="hidden" name="id" value="{{$v->id}}">
						    <input type="hidden" name="oid" value="{{$v->oid}}">
						    <input type="hidden" name="gid" value="{{$v->gid}}">
							<div class="comment-list">
								<div class="item-pic">
									<a href="#" class="J_MakePoint">
										<img style="width:148px;height: 148px" src="{{url('/').json_decode($v->gpic, true)[0]}}" class="itempic">
									</a>
								</div>

								<div class="item-title">

									<div class="item-name">
										<a href="#">
											<p class="item-basic-info">{{$v->gname}}</p>
										</a>
									</div>
									<div class="item-info">
										<div class="info-little">
											<span>{{$v->setmeal}}</span>
											
										</div>
										<div class="item-price">
											退款金额：<strong>{{$v->gprice*$v->gnum}}</strong>
										</div>										
									</div>
								</div>
								<div class="clear"></div>
								<div class="item-comment">
									<textarea placeholder="请写明退款/退货原因！" name="comment" class="comment{{$v->id}}"></textarea>
								</div>
							</div>
							<div class="info-btn">
								<button type="submit"><div class="am-btn am-btn-danger" >申请退款</div></button>
							</div>
							</form>	
							@endforeach
							@else
							<div>
							    <center>
							        <h2>暂无可退款商品</h2><a style="color:red" href="{{url('order/showBack')}}">查看我的退款信息</a>
							    </center>
							    
							</div>
							@endif

		@include('Layouts/footer')
	</div>

	<!-- DIALOGS -->
	<div class="modal fade" id="search_form" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog block-popup-search-form">
			<form role="search" method="get" class="form-search searchform" action="">
				<input type="text" value="" name="s" class="search-query" placeholder="Enter your keyword..." />

				<button type="submit" class="fa fa-search button-search-pro form-button"></button>

				<a href="javascript:void(0)" title="Close" class="close close-search" data-dismiss="modal">X</a>
			</form>
		</div>
	</div>

   <div class="modal fade" id="login_form" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog block-popup-login">
			<a href="javascript:void(0)" title="Close" class="close close-login" data-dismiss="modal">Close</a>

			<div class="tt_popup_login">
				<strong>Sign in Or Register</strong>
			</div>

			<form action="" method="post" class="login">
				<div class="block-content">
					<div class="col-reg registered-account">
						<div class="email-input">
							<input type="text" class="form-control input-text username" name="username" id="username" placeholder="Username" />
						</div>

						<div class="pass-input">
							<input class="form-control input-text password" type="password" placeholder="Password" name="password" id="password" />
						</div>

						<div class="ft-link-p">
							<a href="#" title="Forgot your password">Forgot your password?</a>
						</div>

						<div class="actions">
							<div class="submit-login">
								<input type="submit" class="button btn-submit-login" name="login" value="Login" />
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

						<a href="create_account.html" title="Register" class="btn-reg-popup">Create an account</a>
					</div>
				</div>
			</form>
			<div class="clear"></div>
		</div>
	</div>

	<a id="etrostore-totop" href="#"></a>

	<div id="subscribe_popup" class="subscribe-popup" style="background: url({{asset('Home/images/icons/bg_newsletter.jpg')}})">
		<div class="subscribe-popup-container">
			<h2>Join our newsletter</h2>
			<div class="description">Subscribe now to get 40% of on any product!</div>
			<div class="subscribe-form">
				<form id="mc4wp-form-2" class="mc4wp-form mc4wp-form-275" method="post" data-id="275" data-name="">
					<div class="mc4wp-form-fields">
						<div class="newsletter-content">
							<input type="email" class="newsletter-email" name="EMAIL" placeholder="Your email" required="" />
							<input class="newsletter-submit" type="submit" value="Subscribe" />
						</div>
					</div>
					<div class="mc4wp-response"></div>
				</form>
			</div>

			<div class="subscribe-checkbox">
				<label for="popup_check">
					<input id="popup_check" name="popup_check" type="checkbox" />
					<span>Don't show this popup again!</span>
				</label>
			</div>

			<div class="subscribe-social">
				<div class="subscribe-social-inner">
					<a href="#" class="social-fb">
						<span class="fa fa-facebook"></span>
					</a>

					<a href="#" class="social-tw">
						<span class="fa fa-twitter"></span>
					</a>

					<a href="#" class="social-gplus">
						<span class="fa fa-google-plus"></span>
					</a>

					<a href="#" class="social-pin">
						<span class="fa fa-instagram"></span>
					</a>

					<a href="#" class="social-linkedin">
						<span class="fa fa-pinterest-p"></span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="{{asset('Home/js/jquery/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/jquery/jquery-migrate.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/jquery/js.cookie.min.js')}}"></script>

	<!-- OPEN LIBS JS -->
	<script type="text/javascript" src="{{asset('Home/js/owl-carousel/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/slick-1.6.0/slick.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('Home/js/yith-woocommerce-compare/jquery.colorbox-min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/sw_core/isotope.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/sw_core/jquery.fancybox.pack.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/sw_woocommerce/category-ajax.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/sw_woocommerce/jquery.countdown.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/js_composer/js_composer_front.min.js')}}"></script>

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

   <!--[if gte IE 9]><!-->
   <script type="text/javascript">
		var request, b = document.body, c = 'className', cs = 'customize-support', rcs = new RegExp('(^|\\s+)(no-)?'+cs+'(\\s+|$)');
		request = true;

      	b[c] = b[c].replace( rcs, ' ' );
      	// The customizer requires postMessage and CORS (if the site is cross domain)
      	b[c] += ( window.postMessage && request ? ' ' : ' no-' ) + cs;
   </script>
   <!--<![endif]-->
	<script src="{{asset('/layer/layer.js')}}"></script>
	<script type="text/javascript">
	    var text = false;
	    function check(obj){
	    	var key = $(obj).children().first().next().val();
	    	var text = $('.comment'+key).parent().children().val();console.log(text);
	    	if (!text) {
	    		layer.alert('申请内容不能为空！');
	    		return false;
	    	}else {
	    		return true;
	    	}
	    }
	</script>
   </body>
</html>
