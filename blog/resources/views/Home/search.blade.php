<!DOCTYPE html>
<html lang="en">
<head>
	<title>Products Archive</title>
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
	<link rel="stylesheet" href="{{asset('Home/css/yith-woocommerce-wishlist/style.css')}}" />


	<link rel="stylesheet" href="{{asset('Home/css/custom.css')}}" />
	<link rel="stylesheet" href="{{asset('Home/css/app-orange.css')}}" id="theme_color" />
	<link rel="stylesheet" href="" id="rtl" />
	<link rel="stylesheet" href="{{asset('Home/css/app-responsive.css')}}" />
</head>

<body class="archive post-type-archive woocommerce post-type-archive-product">




	<div class="body-wrapper theme-clearfix">
		@include('Layouts/head')

		<div class="listings-title">
			<div class="container">
				<div class="wrap-title">
					<h1>搜索商品</h1>

					<div class="bread">
						<div class="breadcrumbs theme-clearfix">
							<div class="container">
								<ul class="breadcrumb">
									<li>
										<a href="{{url('/')}}">首页</a>
										<span class="go-page"></span>
									</li>

									<li class="active">
										<span>搜索{{$key}}</span>
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
				<div id="contents" class="content col-lg-9 col-md-8 col-sm-8" role="main">
					<div class="listing-top">
						<div class="widget-1 widget-first widget rev-slider-widget-2 widget_revslider">
							<div class="widget-inner">
								<!-- OWL SLIDER -->
								<div class="wpb_revslider_element wpb_content_element no-margin">
									<div class="vc_column-inner ">
										<div class="wpb_wrapper">
											<div class="wpb_revslider_element wpb_content_element">
												<div id="main-slider" class="fullwidthbanner-container" style="position:relative; width:100%; height:auto; margin-top:0px; margin-bottom:0px">
													<div class="module slideshow no-margin">
														@foreach($coverImg as $v)
														<div class="item">
															<a href="javascript:;"><img src="{{asset('').json_decode($v->price, true)[2]}}" alt="slider1" class="img-responsive" height="559"></a>
														</div>
														@endforeach
													</div>
													<div class="loadeding"></div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- OWL LIGHT SLIDER -->
							</div>
						</div>

						<div class="widget-2 widget-last widget sw_brand-2 sw_brand">
							<div class="widget-inner">
								<div id="sw_brand_01" class="responsive-slider sw-brand-container-slider clearfix" data-lg="5" data-md="4" data-sm="3" data-xs="2" data-mobile="1" data-speed="1000" data-scroll="1" data-interval="5000" data-autoplay="false">
									<div class="resp-slider-container">
										<div class="slider responsive">
											@foreach($brand as $v)
											<div class="item item-brand-cat">
												<div class="item-image">
													<a href="{{url('/goods/list/brand/'.$v->id)}}"><img width="134" title="{{$v->bname}}" height="70" src="{{asset('upload/image/'.$v->blogo)}}" class="attachment-173x91 size-173x91" alt=""></a>
												</div>
											</div>
											@endforeach
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div id="container">
						<div id="content" role="main">
							<!--  Shop Title -->
							<div class="products-wrapper">

								<div class="products-nav clearfix">
									<div class="view-mode-wrap pull-left clearfix">
										<div class="view-mode">
											<a href="javascript:void(0)" class="grid-view active" title="Grid view"><span>Grid view</span></a>
											<a href="javascript:void(0)" class="list-view" title="List view"><span>List view</span></a>
										</div>
									</div>
									{{$goodsData}}
								</div>

								<div class="clear"></div>

								<ul class="products-loop row grid clearfix">
									@foreach($goodsData as $v)
										<li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6 post-255 product type-product status-publish has-post-thumbnail product_cat-electronics product_cat-home-appliances product_cat-vacuum-cleaner product_brand-apoteket first instock sale featured shipping-taxable purchasable product-type-simple">
											<div class="products-entry item-wrap clearfix">
												<div class="item-detail">
													<div class="item-img products-thumb">
														<span class="onsale">Sale!</span>
														<a href="{{url('/goods/detail', ['id' => $v['id']])}}">
															<div class="product-thumb-hover">
																<img src="{{asset('Home/images/wpspin_light.gif')}}" data-original="{{asset($v['gpic'])}}" class="attachment-shop_catalog size-shop_catalog wp-post-image img" alt=""  sizes="(max-width: 300px) 100vw, 300px">
															</div>
														</a>

														<!-- add to cart, wishlist, compare -->
														<div class="item-bottom clearfix">
															<a style='margin-left:15px;' rel="nofollow" onclick='addcart({{$v['id']}})' class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="加入购物车">加入购物车</a>


															<div class="yith-wcwl-add-to-wishlist add-to-wishlist-248">
																<div class="yith-wcwl-add-button show" style="display:block">
																	<a href="javascript:;" onclick='addCollection({{$v['id']}})' rel="nofollow" class="">Add to Wishlist</a>
																	<img src="{{asset('Home/images/wpspin_light.gif')}}" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
																</div>

																<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
																	<span class="feedback">Product added!</span>
																	<a href="javascript:;" rel="nofollow">Browse Wishlist</a>
																</div>

																<div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
																	<span class="feedback">The product is already in the wishlist!</span>
																	<a href="#" rel="nofollow">Browse Wishlist</a>
																</div>

																<div style="clear:both"></div>
																<div class="yith-wcwl-wishlistaddresponse"></div>
															</div>

															<div class="clear"></div>
															<a href="{{url('img/'.$v['id'])}}" data-fancybox-type="ajax" class="sm_quickview_handler-list fancybox fancybox.ajax">Quick View </a>
														</div>
													</div>

													<div class="item-content products-content">
														<div class="reviews-content">
															<div class="star"><span style="width: 63px"></span></div>
														</div>

														<h4 style="height:35px;"><a href="simple_product.html" title="Cleaner with bag">{{$v['gname']}}：{{$v['ram']}}+{{$v['rom']}} {{$v['color']}}</a></h4>

														<span class="item-price"><del><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"></span></span></del> <ins><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$v['price']}}.00</span></ins></span>

														<div class="item-description">Proin nunc nibh, adipiscing eu nisi id, ultrices suscipit augue. Sed rhoncus hendrerit lacus, et venenatis felis. Donec ut fringilla magna ultrices suscipit augue. Proin nunc nibh, adipiscing eu nisi id, ultrices suscipit augue. Sed rhoncus hendrerit lacus, et venenatis felis. Donec ut fringilla magna ultrices suscipit augue.</div>

														<!-- add to cart, wishlist, compare -->
														<div class="item-bottom clearfix">
															<a rel="nofollow" href="#" class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="Add to Cart">Add to cart</a>

															<a href="javascript:void(0)" class="compare button" rel="nofollow" title="Add to Compare">Compare</a>

															<div class="yith-wcwl-add-to-wishlist add-to-wishlist-248">
																<div class="yith-wcwl-add-button show" style="display:block">
																	<a href="#" rel="nofollow" class="add_to_wishlist">Add to Wishlist</a>
																	<img src="{{asset('Home/images/wpspin_light.gif')}}" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
																</div>

																<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
																	<span class="feedback">Product added!</span>
																	<a href="#" rel="nofollow">Browse Wishlist</a>
																</div>

																<div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
																	<span class="feedback">The product is already in the wishlist!</span>
																	<a href="#" rel="nofollow">Browse Wishlist</a>
																</div>

																<div style="clear:both"></div>
																<div class="yith-wcwl-wishlistaddresponse"></div>
															</div>

															<div class="clear"></div>
															<a href="#" data-fancybox-type="ajax" class="sm_quickview_handler-list fancybox fancybox.ajax">Quick View </a>
														</div>
													</div>
												</div>
											</div>
										</li>
									@endforeach
								</ul>

								<div class="clear"></div>

								<div class="products-nav clearfix">
									<div class="view-mode-wrap pull-left clearfix">
										<div class="view-mode">
											<a href="javascript:void(0)" class="grid-view active" title="Grid view"><span>Grid view</span></a>
											<a href="javascript:void(0)" class="list-view" title="List view"><span>List view</span></a>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>

				<aside id="right" class="sidebar col-lg-3 col-md-4 col-sm-4">
					<div class="widget-1 widget-first widget woocommerce_product_categories-3 woocommerce widget_product_categories">
						<div class="widget-inner">
							<div class="block-title-widget">
								<h2><span>所有分类</span></h2>
							</div>

							<ul class="product-categories">
								@foreach ($category as $v)
								<li class="cat-item"><a href="{{url('/goods/list/category/'.$v->id)}}">{{$v->name}}</a> <span class="count">({{$v->sum}})</span></li>
								@endforeach
							</ul>
						</div>
					</div>


					<div class="widget-4 widget woocommerce_price_filter-3 woocommerce widget_price_filter">
						<div class="widget-inner">
							<div class="block-title-widget">
								<h2><span>价格筛选</span></h2>
							</div>
							@php
								if (empty($min)) {
									$min = 1;
								}
								if (empty($max)) {
									$max = 100000;
								}
							@endphp
							<form method="get" action="{{url('/search')}}">
								<div class="price_slider_wrapper">
									<br><br>
									<div class="price_slider_amount">
										<input type="hidden" name="key" value="{{$key}}">
										<input type="text" id="min_price" name="min_price" value="{{$min}}" data-min="1" placeholder="Min price">
										<input type="text" id="max_price" name="max_price" value="{{$max}}" data-max="100000" placeholder="Max price">

										<button type="submit" class="button">筛选</button>

										<div class="price_label" style="display:none;">
											Price: <span class="from"></span> - <span class="to"></span>
										</div>
										<div class="clear"></div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</aside>
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
	<script type="text/javascript" src="{{asset('Home/js/jquery/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/jquery/jquery-migrate.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/jquery/js.cookie.min.js')}}"></script>

	<!-- OPEN LIBS JS -->
	<script type="text/javascript" src="{{asset('Home/js/owl-carousel/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/slick-1.6.0/slick.min.js')}}"></script>

	<script type="text/javascript">
		/* <![CDATA[ */
			var woocommerce_price_slider_params = {"currency_symbol":"$","currency_pos":"left","min_price":"100","max_price":"500"};
		/* ]]> */
	</script>

	<script type="text/javascript" src="{{asset('Home/js/widget.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/mouse.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/slider.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/js_composer/js_composer_front.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('Home/js/yith-woocommerce-compare/jquery.colorbox-min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/sw_core/isotope.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/sw_core/jquery.fancybox.pack.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/sw_woocommerce/category-ajax.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/sw_woocommerce/jquery.countdown.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/woocommerce/price-slider.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('Home/js/plugins.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/megamenu.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/main.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/jquery.lazyload.min.js')}}">	</script>
	<script type="text/javascript">
		img = $('.img')
		$(function(){
      $("img.img").lazyload({
				effect: "fadeIn"
			});
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
	 @include('Layouts/addcart')
   </body>
</html>
