<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cart</title>
	<meta charset="utf-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<!-- GOOGLE WEB FONTS -->
	<link rel="stylesheet" href="{{asset('Home/css/font-awesome.min.css')}}">

	<!-- BOOTSTRAP 3.3.7 CSS -->
	<link rel="stylesheet" href="{{asset('Home/css/bootstrap.min.css')}}" />

	<!-- SLICK v1.6.0 CSS -->
	<link rel="stylesheet" href="{{asset('Home/css/slick-1.6.0/slick.css')}}" />

	<link rel="stylesheet" href="{{asset('Home/css/jquery.fancybox.css')}}" />
	<link rel="stylesheet" href="{{asset('Home/css/yith-woocommerce-compare/colorbox.css')}}" />
	<link rel="stylesheet" href="{{asset('Home/css/owl-carousel/owl.carousel.min.css')}}" />
	<link rel="stylesheet" href="{{asset('Home/css/owl-carousel/owl.theme.default.min.css')}}" />
	<link rel="stylesheet" href="{{asset('Home/css/js_composer/js_composer.min.css')}}" />
	<link rel="stylesheet" href="{{asset('Home/css/woocommerce/woocommerce.css')}}" />
	<link rel="stylesheet" href="{{asset('Home/css/woocommerce/woocommerce-layout.css')}}" />
	<link rel="stylesheet" href="{{asset('Home/css/woocommerce/woocommerce-smallscreen.css')}}" />
	<link rel="stylesheet" href="{{asset('Home/css/yith-woocommerce-wishlist/style.css')}}" />


	<link rel="stylesheet" href="{{asset('Home/css/custom.css')}}" />
	<link rel="stylesheet" href="{{asset('Home/css/app-orange.css')}}" id="theme_color" />
	<link rel="stylesheet" href="" id="rtl" />
	<link rel="stylesheet" href="{{asset('Home/css/app-responsive.css')}}" />

	<script type="text/javascript" src="{{asset('Home/js/jquery/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/jquery/jquery-migrate.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/jquery/js.cookie.min.js')}}"></script>

	<style type="text/css">
	    #clear{background-color: orange}
	    #clear:hover{background-color: #E0C15F;cursor: pointer;}
	</style>

</head>

<body class="page woocommerce-cart woocommerce-page">


	<div class="body-wrapper theme-clearfix">
		@include('Layouts/head')

		<div class="listings-title">
			<div class="container">
				<div class="wrap-title">
					<h1>购物车</h1>
					<div class="bread">
						<div class="breadcrumbs theme-clearfix">
							<div class="container">
								<ul class="breadcrumb">
									<li>
										<a href="#">商城</a>
										<span class="go-page"></span>
									</li>

									<li class="active">
										<span>购物车</span>
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
				<div id="contents" role="main" class="main-page col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="page type-page status-publish hentry">
						<div class="entry-content">
							<div class="entry-summary">
								<div class="woocommerce">

								<div id="noshop" style="width: 100%;height: 100px;text-align: center;font-size: 15px;display: none">
								    <span>购物车内暂时没有商品，登录后将显示您之前加入的商品</span><br>
								    <span><a href="" style="color:red">登录</a></span>&nbsp;&nbsp;&nbsp;<span><a  href="" style="color:orange;">购物》</a></span>
								</div>
									<form action="javascript:;" method="post" id="cart" style="display: none;">
										<table class="shop_table shop_table_responsive cart" cellspacing="0">
											<thead>
												<tr>
													<th class="product-name">商品名</th>
													<th class="product-thumbnail">图片</th>
													<th class="product-price">价格</th>
													<th class="product-quantity">数量</th>
													<th class="product-subtotal">小计</th>
													<th class="product-remove">操作</th>
												</tr>

											</thead>
											<tbody>

											</tbody>

										</table>

										<div class="cart-collaterals">
											<div class="products-wrapper">
												<div class="cart_totals ">
													<h2>Cart Totals</h2>

													<table cellspacing="0" border="1" class="shop_table shop_table_responsive" style="width: 300px;">
														<tbody>
															<tr class="cart-subtotal">
																<td><strong> 购买商品数量：</strong> </td>
																<td data-title="总价">
																	<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span ><span class="myavg"></span>件</span>
																</td>
															</tr>
															<tr class="order-total">
																<td><strong> 实付：</strong> </td>
																<td data-title="实付">
																	<strong style="color:orange"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">￥</span ><span class="mytotal" ></span></span></strong>
																</td>
															</tr>
														</tbody>
													</table>

													<div class="wc-proceed-to-checkout" style="width: 300px">
														<a href="{{url('/order')}}" class="checkout-button button alt wc-forward">结算</a>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>

						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>

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
   <script type="text/javascript">

    //删除数据
    function del(obj) {

    	//获取id
    	var id = $(obj).attr('id');
    	$.ajax({
    		type : 'post',
    		data : 'id='+id+'&_token={{csrf_token()}}',
    		url  : '{{url("/cart/del")}}',
    		success:function(){
    			//刷新
    			showcart();
    		}
    	})
    	//删除页面数据
    	$(obj).parent().parent().remove();
    }

    //修改商品数量
    function change(obj) {
    	//获取数据
    	var num = $(obj).val();
    	var id  = $(obj).attr('id');
    	$.ajax({
    		type : 'post',
    		data : 'id='+id+'&num='+num+'&_token={{csrf_token()}}',
    		url  : "{{url('/cart/change')}}",
    		success:function(){
    			//刷新
    			showcart();
    		},
    		dataType: 'json',
    	});
    }


    //查看购物车商品
    function showcart() {
    	$.ajax({
    	    type : 'get',
    	    url  : "{{ url('cart/show')}}",
    	    data : '_token={{csrf_token()}}',
    	    success:function(data) {
    	    	if (data == 'noshop') {
    	    		//购物车内没有商品
    	    		$("#noshop").css('display', 'block');
    	    		$('#cart').css('display', 'none');
    	    	} else {
    	    		//显示商品
    	    		$('#cart').css('display', 'block');
    	    		$("#noshop").css('display', 'none');
    	    		var str = '';
    	    		var total = 0;
    	    		var sum = 0;
    	    		var url = "{{url('/')}}";
    	    		for (var i = 0; i<data.length; i++) {
    	    			str += `<tr class="cart_item">
							<td class="product-name" data-title="Product">
								<a href="simple_product.html">`+data[i].gname+`</a>
							</td>
							<td class="product-thumbnail">
								<a href="simple_product.html">
                              <img width="180" height="180" src="`+url+`/`+data[i].gpic[0]+`" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt=""
									srcset="`+url+`/`+data[i].gpic[0]+` 180w, `+url+`/`+data[i].gpic[1]+` 150w, `+url+`/`+data[i].gpic[2]+` 300w, `+url+`/`+data[i].gpic[3]+` 600w" sizes="(max-width: 180px) 100vw, 180px">
									</a>
							</td>

							<td class="product-price" data-title="Price">
								<span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">￥</span>`+data[i].price+`</span>
							</td>
							<td class="product-quantity" data-title="Quantity">
                                <div class="quantity buttons_added" style="width:110.2px;">
									<input type="button" value="-" class="minus">
									<input  type="number" id="`+data[i].id+`" step="1" onchange="change(this)" min="1" max="`+data[i].stock+`" name="number" value="`+data[i].num+`" title="Qty" class="input-text qty text" size="4" pattern="[1-9]*" inputmode="numeric">
									<input type="button" value="+" class="plus">
							    </div>
							</td>s
							</td>

							<td class="product-subtotal" data-title="Total">
								<span class="woocommerce-Price-amount amount" >

							    <span class="woocommerce-Price-currencySymbol" >￥</span ><span class="total" style="margin-right:10px">`+data[i].num*data[i].price+`</span></span>
							</td>
							<td class="product-remove">
								<a href="javascript:;" class="remove" onclick="del(this)" id="`+data[i].id+`" title="删除此商品"><i class="fa fa-times" aria-hidden="true"></i></a>
							</td>

						</tr>
						<hr>`;

					//统计总价
                    total += data[i].num*data[i].price;
                    sum   += parseInt(data[i].num);
    	    		}

    	    		//追加数据到购物车
    	    		$('tbody:first').html(str);
    	    		$('.myavg').html(sum);
    	    		$('.mytotal').html(total);

    	    	}

    	    },
    	    dataType: 'json',
    	});
    }

    //调用
    showcart();


   </script>

	<!-- OPEN LIBS JS -->
	<script type="text/javascript" src="{{asset('Home/js/owl-carousel/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/slick-1.6.0/slick.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('Home/js/yith-woocommerce-compare/jquery.colorbox-min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/sw_core/isotope.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/sw_core/jquery.fancybox.pack.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/sw_woocommerce/category-ajax.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/sw_woocommerce/jquery.countdown.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/wc-quantity-increment.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/woocommerce/cart.min.js')}}"></script>
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
   </body>
</html>
