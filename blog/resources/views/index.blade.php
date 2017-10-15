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
	<link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
	<style>
		.block{

			display:block;
		}
		.hidden{
			display: none;
		}
		.box{

			display: none;
		}
		#display{
			display: block;
		}
		#yin{
			display: none;
		}
		#w{
			height:500px;
			width:350px;
		}
	</style>
</head>


<body class="page page-id-6 home-style1" onload="gain()">
	@include('Layouts/head')



		<div class="container">
			<div class="row">
				<div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="post-6 page type-page status-publish hentry">
						<div class="entry-content">
							<div class="entry-summary">
								<div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid bg-wrap vc_custom_1487642348040 vc_row-no-padding">
									<div class="container float wpb_column vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1481518924466">
													<div class="wrap-vertical wpb_column vc_column_container vc_col-sm-2">
														<div class="vc_column-inner vc_custom_1481518234612">
															<div class="wpb_wrapper">
																<div class="vc_wp_custommenu wpb_content_element wrap-title">
																	<div class="mega-left-title">
																		<strong>商品主题</strong>
																	</div>

																	<div class="wrapper_vertical_menu vertical_megamenu">
																		<div class="resmenu-container">
																			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#ResMenuvertical_menu">
																				<span class="sr-only">Categories</span>
																				<span class="icon-bar"></span>
																				<span class="icon-bar"></span>
																				<span class="icon-bar"></span>
																			</button>

																			<div id="ResMenuvertical_menu" class="collapse menu-responsive-wrapper">
																				<ul id="menu-vertical-menu" class="etrostore_resmenu">
																					<li class="menu-computers-laptops">
																						<a class="item-link" href="simple_product.html">Computers  Laptops</a>

																					</li>

																					<li class="fix-menu res-dropdown menu-smartphones-tablet">
																						<a class="item-link dropdown-toggle" href="simple_product.html">Smartphones & Tablet</a>
																						<span class="show-dropdown"></span>

																						<ul class="dropdown-resmenu">
																							<li class="res-dropdown menu-electronics">
																								<a class="item-link dropdown-toggle" href="#">Electronics</a>
																								<span class="show-dropdown"></span>

																								<ul class="dropdown-resmenu">
																									<li class="menu-laptop-desktop-accessories"><a href="#">Laptop & Desktop Accessories</a></li>
																									<li class="menu-storage-external-drives"><a href="#">Storage & External Drives</a></li>
																									<li class="menu-networking-wireless"><a href="#">Networking & Wireless</a></li>
																									<li class="menu-motherboards-cpus-psus"><a href="#">Motherboards, CPUs & PSUs</a></li>
																									<li class="menu-webcams"><a href="#">Webcams</a></li>
																								</ul>
																							</li>

																							<li class="res-dropdown menu-smartphone">
																								<a class="item-link dropdown-toggle" href="#">Smartphone</a>
																								<span class="show-dropdown"></span>

																								<ul class="dropdown-resmenu">
																									<li class="menu-mobile-phones"><a href="#">Mobile Phones</a></li>
																									<li class="menu-smart-watches-accessories"><a href="#">Smart Watches & Accessories</a></li>
																									<li class="menu-mobile-accessories"><a href="#">Mobile Accessories</a></li>
																									<li class="menu-cases-covers"><a href="#">Cases & Covers</a></li>
																									<li class="menu-power-banks"><a href="#">Power Banks</a></li>
																								</ul>
																							</li>

																							<li class="res-dropdown menu-tablets">
																								<a class="item-link dropdown-toggle" href="#">Tablets</a>
																								<span class="show-dropdown"></span>

																								<ul class="dropdown-resmenu">
																									<li class="menu-tablet-accessories"><a href="#">Tablet Accessories</a></li>
																									<li class="menu-cases-covers"><a href="#">Cases & Covers</a></li>
																									<li class="menu-power-banks"><a href="#">Power Banks</a></li>
																									<li class="menu-memory-cards"><a href="#">Memory Cards</a></li>
																								</ul>
																							</li>

																							<li class="res-dropdown menu-computer">
																								<a class="item-link dropdown-toggle" href="#">Computer</a>
																								<span class="show-dropdown"></span>

																								<ul class="dropdown-resmenu">
																									<li class="menu-macbooks-imacs"><a href="#">Macbooks & iMacs</a></li>
																									<li class="menu-computers-desktops"><a href="#">Computers & Desktops</a></li>
																									<li class="menu-printers-scanners-faxs"><a href="#">Printers, Scanners, & Faxs</a></li>
																									<li class="menu-laptop-desktop-accessories"><a href="#">Laptop & Desktop Accessories</a></li>
																									<li class="menu-storage-external-drives"><a href="#">Storage & External Drives</a></li>
																								</ul>
																							</li>

																							<li class="fix-position res-dropdown menu-image">
																								<a class="item-link dropdown-toggle" href="#">Image</a>
																								<span class="show-dropdown"></span>

																								<ul class="dropdown-resmenu">
																									<li class="menu-image-1"><a href="#">Image 1</a></li>
																									<li class="menu-image-2"><a href="#">Image 2</a></li>
																									<li class="menu-image-3"><a href="#">Image 3</a></li>
																								</ul>
																							</li>
																						</ul>
																					</li>

																					<li class="menu-cameras-camcorders">
																						<a class="item-link" href="simple_product.html">Cameras & Camcorders</a>
																					</li>

																					<li class="res-dropdown menu-electronic-component">
																						<a class="item-link dropdown-toggle" href="simple_product.html">Electronic Component</a>
																						<span class="show-dropdown"></span>

																						<ul class="dropdown-resmenu">
																							<li class="res-dropdown menu-electronics">
																								<a class="item-link dropdown-toggle" href="#">Electronics</a>
																								<span class="show-dropdown"></span>

																								<ul class="dropdown-resmenu">
																									<li class="menu-leds"><a href="#">Leds</a></li>
																									<li class="menu-laptop-desktop-accessories"><a href="#">Laptop & Desktop Accessories</a></li>
																									<li class="menu-storage-external-drives"><a href="#">Storage & External Drives</a></li>
																									<li class="menu-networking-wireless"><a href="#">Networking & Wireless</a></li>
																									<li class="menu-motherboards-cpus-psus"><a href="#">Motherboards, CPUs & PSUs</a></li>
																									<li class="menu-webcams"><a href="#">Webcams</a></li>
																									<li class="menu-gaming-mice"><a href="#">Gaming Mice</a></li>
																								</ul>
																							</li>

																							<li class="res-dropdown menu-smartphone">
																								<a class="item-link dropdown-toggle" href="#">Smartphone</a>
																								<span class="show-dropdown"></span>

																								<ul class="dropdown-resmenu">
																									<li class="menu-smartphones"><a href="#">Smartphones</a></li>
																									<li class="menu-mobile-phones"><a href="#">Mobile Phones</a></li>
																									<li class="menu-smart-watches-accessories"><a href="#">Smart Watches & Accessories</a></li>
																									<li class="menu-mobile-accessories"><a href="#">Mobile Accessories</a></li>
																									<li class="menu-cases-covers"><a href="#">Cases & Covers</a></li>
																									<li class="menu-power-banks"><a href="#">Power Banks</a></li>
																									<li class="menu-memory-cards"><a href="#">Memory Cards</a></li>
																								</ul>
																							</li>

																							<li class="res-dropdown menu-tablet">
																								<a class="item-link dropdown-toggle" href="#">Tablet</a>
																								<span class="show-dropdown"></span>

																								<ul class="dropdown-resmenu">
																									<li class="menu-tablets"><a href="#">Tablets</a></li>
																									<li class="menu-tablet-accessories"><a href="#">Tablet Accessories</a></li>
																									<li class="menu-cases-covers"><a href="#">Cases & Covers</a></li>
																									<li class="menu-power-banks"><a href="#">Power Banks</a></li>
																									<li class="menu-memory-cards"><a href="#">Memory Cards</a></li>
																									<li class="menu-headphonesheadsets"><a href="#">Headphones/Headsets</a></li>
																								</ul>
																							</li>
																						</ul>
																					</li>

																					<li class="menu-home-appliances">
																						<a class="item-link" href="simple_product.html">Home Appliances</a>
																					</li>

																					<li class="menu-home-furniture">
																						<a class="item-link" href="simple_product.html">Home Furniture</a>
																					</li>

																					<li class="menu-household-goods">
																						<a class="item-link" href="simple_product.html">Household Goods</a>
																					</li>

																					<li class="menu-television">
																						<a class="item-link" href="simple_product.html">Television</a>
																					</li>

																					<li class="menu-accessories-for-tablet">
																						<a class="item-link" href="simple_product.html">Accessories for Tablet</a>
																					</li>

																					<li class="menu-laptops-accessories">
																						<a class="item-link" href="simple_product.html">Laptops & Accessories</a>
																					</li>

																					<li class="menu-blender">
																						<a class="item-link" href="simple_product.html">Blender</a>
																					</li>

																					<li class="menu-vacuum-cleaner">
																						<a class="item-link" href="simple_product.html">Vacuum Cleaner</a>
																					</li>
																				</ul>
																			</div>
																		</div>

																		<ul id="menu-vertical-menu-1" class="nav vertical-megamenu etrostore-mega etrostore-menures">
																			@foreach($type as $v)
																			<li class="dropdown menu-electronic-component etrostore-mega-menu level1">
																				<a href="{{url('goods/list/category/'.$v->id)}}" link-id='{{$v->id}}' class="item-link typelink" >
																					<span class="have-title">
																						<span class="menu-color" data-color="#f03442"></span>

																						<span class="menu-title">{{$v->name}}</span>
																					</span>
																				</a>
																			</li>
																			@endforeach
																			<li class="menu-cameras-camcorders etrostore-menu-custom level1">
																				<a href="simple_product.html" class="item-link">
																					<span class="have-title">
																						<span class="menu-color" data-color="#fe9901"></span>

																						<span class="menu-title">Cameras & Camcorders</span>s
																					</span>
																				</a>
																			</li>







																			<li class="menu-blender etrostore-menu-custom level1" style="display: none;">
																				<a href="simple_product.html" class="item-link">
																					<span class="have-title">
																						<span class="menu-color" data-color="#e93434"></span>

																						<span class="menu-title">Blender</span>
																					</span>
																				</a>
																			</li>

																			<li class="menu-vacuum-cleaner etrostore-menu-custom level1" style="display: none;">
																				<a href="simple_product.html" class="item-link">
																					<span class="have-title">
																						<span class="menu-color" data-color="#f034ca"></span>

																						<span class="menu-title">Vacuum Cleaner</span>
																					</span>
																				</a>
																			</li>
																		</ul>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="wrap-slider wpb_column vc_column_container vc_col-sm-8">
														<div class="vc_column-inner vc_custom_1483000674370">
															<div class="wpb_wrapper">
																<!-- OWL SLIDER -->
																<div class="wpb_revslider_element wpb_content_element no-margin">
																	<div class="vc_column-inner ">
																		<div class="wpb_wrapper">
																			<div class="wpb_revslider_element wpb_content_element">
																				<div id="main-slider" class="fullwidthbanner-container" style="position:relative; width:100%; height:auto; margin-top:0px; margin-bottom:0px">
																					<div class="module slideshow no-margin">
																						@foreach($coverImg as $v)
																						<div class="item">
																							<a href="simple_product.html"><img data-original="{{asset('').json_decode($v->price, true)[1]}}" src="{{asset('Home/images/wpspin_light1.gif')}}" alt="slider1" class="img-responsive img"></a>
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

																<div class="wpb_raw_code wpb_content_element wpb_raw_html">
																	<div class="wpb_wrapper">
																		<div class="banner">
																			<a href="#" class="banner1">
																				<img src="{{asset('Home/images/1903/banner3.jpg')}}" alt="banner" title="banner" />
																			</a>

																			<a href="#" class="banner2">
																				<img src="{{asset('Home/images/1903/banner4.jpg')}}" alt="banner" title="banner" />
																			</a>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="wrap-banner wpb_column vc_column_container vc_col-sm-2">
														<div class="vc_column-inner vc_custom_1483000922579">
															<div class="wpb_wrapper">
																<div class="wpb_single_image wpb_content_element vc_align_center vc_custom_1481518385054">
																	<figure class="wpb_wrapper vc_figure">
																		<a href="#" target="_self" class="vc_single_image-wrapper vc_box_border_grey">
																			<img class="vc_single_image-img" src="{{asset('Home/images/1903/banner1.jpg')}}" width="193" height="352" alt="banner1" title="banner1" />
																		</a>
																	</figure>
																</div>

																<div class="wpb_single_image wpb_content_element vc_align_center">
																	<figure class="wpb_wrapper vc_figure">
																		<a href="#" target="_self" class="vc_single_image-wrapper vc_box_border_grey">
																			<img class="vc_single_image-img" src="{{asset('Home/images/1903/banner2.jpg')}}" width="193" height="175" alt="banner2" title="banner2" />
																		</a>
																	</figure>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="wpb_raw_code wpb_content_element wpb_raw_html">
													<div class="wpb_wrapper">
														<div class="wrap-transport">
															<div class="row">
																<div class="item item-1 col-lg-3 col-md-3 col-sm-6">
																	<a class="wrap">
																		<div class="icon">
																			<i class="fa fa-paper-plane"></i>
																		</div>

																		<div class="content">
																			<h3>退 款 保 障</h3>
																			<p>30 天无理由退款</p>
																		</div>
																	</a>
																</div>

																<div class="item item-2 col-lg-3 col-md-3 col-sm-6">
																	<a class="wrap">
																		<div class="icon">
																			<i class="fa fa-map-marker"></i>
																		</div>

																		<div class="content">
																			<h3>全 球 运 输</h3>
																			<p>每单订单运费 10 元</p>
																		</div>
																	</a>
																</div>

																<div class="item item-3 col-lg-3 col-md-3 col-sm-6">
																	<a class="wrap">
																		<div class="icon">
																			<i class="fa fa-tag"></i>
																		</div>

																		<div class="content">
																			<h3>积 分 抵 现</h3>
																			<p>每100积分抵现 1 元</p>
																		</div>
																	</a>
																</div>

																<div class="item item-4 col-lg-3 col-md-3 col-sm-6">
																	<a class="wrap">
																		<div class="icon">
																			<i class="fa fa-life-ring"></i>
																		</div>

																		<div class="content">
																			<h3>24 / 7 客 服 在 线</h3>
																			<p>服务时间 24/7 在线</p>
																		</div>
																	</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="vc_row-full-width vc_clearfix"></div>

								<div class="vc_row wpb_row vc_row-fluid margin-bottom-60">
									<div class="wpb_column vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div id="_sw_countdown_01" class="sw-woo-container-slider responsive-slider countdown-slider" data-lg="5" data-md="4" data-sm="2" data-xs="1" data-mobile="1" data-speed="1000" data-scroll="1" data-interval="5000" data-autoplay="false" data-circle="false">
													<div class="resp-slider-container">
														<div class="box-title clearfix">
															<h3>秒杀商品</h3>
														</div>

														<div class="banner-content clearfix">
															<img 	width="195" height="354" src="{{asset('Home/images/1903/image-cd.jpg')}}" class="attachment-larges size-larges" alt=""
																	srcset="{{asset('Home/images/1903/image-cd.jpg')}} 195w, {{asset('Home/images/1903/image-cd-165x300.jpg')}} 165w"
																	sizes="(max-width: 195px) 100vw, 195px" />
														</div>

														<div class="slider responsive" id='seckill'>
															@foreach($seckillList as $v)
																<div class="item-countdown product" id="product_sw_countdown_07">
																	<div class="item-wrap">
																		<div class="item-detail">
																			<div class="item-content">
																				<!-- rating  -->
																				<div class="reviews-content">
																					<div class="star"></div>
																					<div class="item-number-rating">{{$v->workoff}} 人已购买</div>
																				</div>
																				<!-- end rating  -->

																				<h4>
																					<a href="{{url('goods/detail/'.$v->id)}}" title="MacBook Air">{{$v->gname}}</a>
																				</h4>

																				<!-- Price -->
																				<div class="item-price">
																					<span>
																						<del>
																							<span class="woocommerce-Price-amount amount">
																								<span class="woocommerce-Price-currencySymbol">$</span>{{$v->price}}
																							</span>
																						</del>

																						<ins>
																							<span class="woocommerce-Price-amount amount">
																								<span class="woocommerce-Price-currencySymbol">$</span>{{$v->price}}
																							</span>
																						</ins>
																					</span>
																				</div>

																				<div class="sale-off">{{$v->price}}</div>

																				<div class="product-countdown" data-date="1517356800" data-price="$800" data-starttime="1483747200" data-cdtime="1517356800" data-id="product_sw_countdown_07"></div>
																			</div>

																			<div class="item-image-countdown">
																				<span class="onsale">Sale!</span>

																				<a href="{{url('goods/detail/'.$v->id)}}">
																					<div class="product-thumb-hover">
																						<img 	width="300" height="300" src="{{asset(json_decode($v->gpic, true)[0])}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt=""
																								srcset="{{asset(json_decode($v->gpic, true)[2])}} 300w, {{asset(json_decode($v->gpic, true)[0])}} 150w, {{asset(json_decode($v->gpic, true)[1])}} 180w, {{asset('Home/images/1903/50.jpg')}} 600w"
																								sizes="(max-width: 300px) 100vw, 300px" />
																					</div>
																				</a>

																				<!-- add to cart, wishlist, compare -->
																				<div class="item-bottom clearfix">
																					<a style="margin-left:15px;" onclick="addcart({{$v->id}})" rel="nofollow" href="javascript:;" class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="Add to Cart">Add to cart</a>
																					<div class="yith-wcwl-add-to-wishlist add-to-wishlist-248">
																						<div class="yith-wcwl-add-button show" style="display:block">
																							<a href="javascript:;" onclick="addCollection({{$v->id}})" rel="nofollow" class="">Add to Wishlist</a>
																							<img src="{{asset('Home/images/wpspin_light.gif')}}" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
																						</div>

																						<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
																							<span class="feedback">Product added!</span>
																							<a href="javascript:;"  rel="nofollow">Browse Wishlist</a>
																						</div>

																						<div class="yith-wcwl-wishlistexistsbrowse hide" style="display:none">
																							<span class="feedback">The product is already in the wishlist!</span>
																							<a href="#" rel="nofollow">Browse Wishlist</a>
																						</div>

																						<div style="clear:both"></div>
																						<div class="yith-wcwl-wishlistaddresponse"></div>
																					</div>

																					<div class="clear"></div>

																					<a href="{{url('img/'.$v->gid)}}" data-fancybox-type="ajax" class="sm_quickview_handler-list fancybox fancybox.ajax">Quick View </a>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
															@endforeach
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>


								<div class="vc_row wpb_row vc_row-fluid margin-bottom-60">
									<div class="wpb_column vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div id="slider_sw_woo_slider_widget_1" class="responsive-slider woo-slider-default sw-child-cat clearfix" data-lg="3" data-md="3" data-sm="2" data-xs="2" data-mobile="1" data-speed="1000" data-scroll="1" data-interval="5000" data-autoplay="false">
													<div class="child-top clearfix" data-color="#ff9901">
														<div class="box-title pull-left">
															<h3>热销商品</h3>

															<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#child_sw_woo_slider_widget_1" aria-expanded="false">
																<span class="icon-bar"></span>
																<span class="icon-bar"></span>
																<span class="icon-bar"></span>
															</button>
														</div>


														<div class="box-title-right clearfix">

															<div class="childcat-content pull-left" id="child_sw_woo_slider_widget_2" >
																<ul id="fuul" >

																	<li   id="relagood">
																	@foreach($category as $v)
																	<a data-id="{{$v->id}}">{{$v->name}}</a>
																	@endforeach
																	</li>

																</ul>
															</div>


															<div class="view-all">

															</div>
														</div>
													</div>


													<div class="content-slider" >

														<div class="childcat-slider-content clearfix"  >
															<div class="resp-slider-container" id="old" style="border:1px solid #ccc">
															@if($phone)
																@foreach($phone as $good)
																<div id='block' cnm="{{$good->categoryid}}" style="border:1px solid #ccc;padding:3px;float:left;width: 33.33333%;" >

																	<div class="item product" >
																		<div class="item-wrap">
																			<div class="item-detail">
																				<div class="item-content">

																					<h4>
																						<a href="simple_product.html" title="nisi ball tip">{{$good->gname}}</a>
																					</h4>

																					<!-- Price -->

																					<div class="item-price">
																						<span>
																							<ins>
																								<span class="woocommerce-Price-amount amount">
																									<span class="woocommerce-Price-currencySymbol">$</span>{{$good->price}}
																								</span>
																							</ins>
																						</span>
																					</div>


																					<div class="sale-off">-10%</div>
																				</div>

																				<div class="item-img products-thumb">
																					<span class="onsale">Sale!</span>

																					<a href="{{url('goods/detailtwo/'.$good->id)}}">

																						<div class="product-thumb-hover">
																							<img 	width="300" height="300" src="{{json_decode($good->gpic, true)[0]}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt=""
																									srcset="{{json_decode($good->gpic, true)[0]}} 300w, {{json_decode($good->gpic, true)[0]}} 150w, {{json_decode($good->gpic, true)[0]}} 180w, {{json_decode($good->gpic, true)[0]}} 500w"
																									sizes="(max-width: 300px) 100vw, 300px" />
																						</div>
																					</a>

																					<!-- add to cart, wishlist, compare -->
																					<div class="item-bottom clearfix">
																						<a rel="nofollow" href="javascript:;"  class="button product_type_simple add_to_cart_button ajax_add_to_cart" onclick=addcart('{{$good->pid}}') title="Add to Cart">Add to cart</a>

																						<div class="yith-wcwl-add-to-wishlist add-to-wishlist-248">
																							<div class="yith-wcwl-add-button show" style="display:block">
																								<a href="javscript:;" onclick=addCollection('{{$good->pid}}') rel="nofollow" class="">Add to Wishlist</a>
																								<img src="{{asset('Home/images/wpspin_light.gif')}}" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
																							</div>

																							<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
																								<span class="feedback"></span>
																								<a href="#" rel="nofollow">Browse Wishlist</a>
																							</div>
																							<div style="clear:both"></div>
																							<div class="yith-wcwl-wishlistaddresponse"></div>
																						</div>

																						<div class="clear"></div>
																						<a href="{{url('img/'.$good->id)}}" data-fancybox-type="ajax"  class="sm_quickview_handler-list fancybox fancybox.ajax">Quick View </a>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>

															@endforeach
															@endif
															</div>
														</div>






														<div class="best-seller-product">
															<div class="box-slider-title">
																<h2 class="page-title-slider">总排行榜</h2>
															</div>

															<div class="wrap-content">

															@foreach($salesvolume as $sales)
																<div class="item" style="border:1px solid pink;margin-top:20px">
																	<div class="item-inner">
																		<div class="item-img">
																			<a href="{{url('goods/detailtwo/'.$sales->id)}}" title="Sony BRAVIA 4K">
																				<img 	width="180" height="180" src="{{json_decode($sales->gpic, true)[0]}}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt=""
																						srcset="{{json_decode($sales->gpic, true)[0]}} 180w, {{json_decode($sales->gpic, true)[0]}} 150w, {{json_decode($sales->gpic, true)[0]}} 300w, {{json_decode($sales->gpic, true)[0]}} 600w"
																						sizes="(max-width: 180px) 100vw, 180px" />
																			</a>
																		</div>

																		<!-- <div class="item-sl pull-left">1</div> -->

																		<div class="item-content">
																			<!-- rating  -->
																			<!-- <div class="reviews-content">
																				<div class="star"></div>
																				<div class="item-number-rating"></div>
																			</div> -->
																			<!-- end rating  -->

																			<h4>
																				<a href="{{url('goods/detailtwo/'.$sales->id)}}" title="Sony BRAVIA 4K">{{$sales->gname}}</a>
																			</h4>

																			<div class="item-price">
																				<span class="woocommerce-Price-amount amount">
																					<span class="woocommerce-Price-currencySymbol">$</span>{{$sales->price}}
																				</span>
																			</div>
																		</div>
																	</div>
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

								<div class="vc_row wpb_row vc_row-fluid margin-bottom-60">
									<div class="wpb_column vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div id="slider_sw_woo_slider_widget_2" class="responsive-slider woo-slider-default sw-child-cat clearfix" data-lg="3" data-md="3" data-sm="2" data-xs="2" data-mobile="1" data-speed="1000" data-scroll="1" data-interval="5000" data-autoplay="false">
													<div class="child-top clearfix" data-color="#7ac143">
														<div class="box-title pull-left">
															<h3>新品推介</h3>

															<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#child_sw_woo_slider_widget_2" aria-expanded="false">
																<span class="icon-bar"></span>
																<span class="icon-bar"></span>
																<span class="icon-bar"></span>
															</button>
														</div>

														<div class="box-title-right clearfix">
															<div class="childcat-content pull-left" id="child_sw_woo_slider_widget_2">
																<ul id='newgoods'>
																	@foreach($type as $v)
																	<li data-id='{{$v->id}}'><a href="javascript:;" onclick="gain({{$v->id}})">　{{$v->name}}　</a></li>
																	@endforeach
																</ul>
															</div>

															<div class="view-all">

															</div>
														</div>
													</div>

													<div class="content-slider">
														<div class="childcat-slider-content clearfix">
															<!-- Brand -->
															<div class="child-cat-brand pull-left" id='brand'>

															</div>

															<!-- slider content -->
															<div class="resp-slider-container" >
																<div class="slider">
																	<div class="item product" id='new'>
																	</div>
																</div>
															</div>
														</div>

														<div class="best-seller-product">
															<div class="box-slider-title">
																<h2 class="page-title-slider">最新上架的商品</h2>
															</div>

															<div class="wrap-content">
																<?php $i = 1; ?>
																@foreach($new as $v)
																<div class="item">
																	<div class="item-inner">
																		<div class="item-img">
																			<a href="{{url('goods/detailtwo/'.$v->id)}}" title="corned beef enim">
																				<img 	width="180" height="180" src="{{asset(json_decode($v->gpic)[0])}}" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image" alt=""
																						srcset="{{asset(json_decode($v->gpic)[1])}} 180w, {{asset(json_decode($v->gpic)[0])}} 150w, {{asset(json_decode($v->gpic)[2])}} 300w, {{asset(json_decode($v->gpic)[3])}} 600w"
																						sizes="(max-width: 180px) 100vw, 180px" />
																			</a>
																		</div>

																		<div class="item-sl pull-left">{{$i++}}</div>

																		<div class="item-content">
																			<!-- rating  -->
																			<div class="reviews-content">
																				<div class="star"></div><br>
																				<div class="item-number-rating">{{$v->workoff}} 人已购买</div>
																			</div>
																			<!-- end rating  -->

																			<h4>
																				<a href="{{url('goods/detailtwo/'.$v->id)}}" title="{{$v->gname}}">{{$v->gname}}</a>
																			</h4>

																			<div class="item-price">
																				<span class="woocommerce-Price-amount amount">
																					<span class="woocommerce-Price-currencySymbol">$</span>{{$v->price}}
																				</span>
																			</div>
																		</div>
																	</div>
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

								<div class="vc_row wpb_row vc_row-fluid">
									<div class="wpb_column vc_column_container vc_col-sm-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper"></div>
										</div>
									</div>
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
	<script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>

	<script type="text/javascript" src="{{asset('Home/js/plugins.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/megamenu.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/main.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/jquery.lazyload.min.js')}}">	</script>
	<script type="text/javascript">
		img = $('.img')
		$(function(){
			$(".img").lazyload({
				effect: "fadeIn",
				skip_invisible : false,
				threshold :3000
			});
		});
		$(window).bind("load", function() {
			var timeout = setTimeout(function() {$(".img").trigger("sporty")}, 1000);
		});
	</script>
	<script type="text/javascript">
		// img = $('.img')
		// $(function(){
    //   $("img.img").lazyload({
		// 		effect: "fadeIn"
		// 	});
    // })
	</script>
	<script type="text/javascript">
		function gain(id) {
			if (!id) {
				var dataId = $('#newgoods').children().first().attr('data-id');
			} else {
				var dataId = id;
			}
			$('#new').children().attr('id', ' ');
			$('#brand').children().attr('id', ' ');
			if($('div[display='+dataId+']').length > 0){
				$('div[display='+dataId+']').attr('id', 'display')
				return;
			}
			var url = '{{url("newgoods")}}' + '/' + dataId;
			$.ajax({
				url: url,
				dataType: 'json',
				type: 'get',
				success: function (msg) {
					var str = '';
					var goods = msg['newgoods']
					var logo = msg['logoimg']
					for (i = 0; i<goods.length; i++) {
						var obj = JSON.parse(goods[i].gpic);
						str = `
						<div id='display' display='`+dataId+`' class='box' style='float:left;width: 33.33333%;border-bottom: 1px solid #EAEAEA;border-right: 1px solid #EAEAEA;'>
						<div class="item-wrap" >
							<div class="item-detail">
								<div class="item-content">
									<!-- rating  -->
									<div class="reviews-content">
										<div class="star"></div>
										<div class="item-number-rating">`+goods[i].workoff+` 人已购买</div>
									</div>
									<!-- end rating  -->

									<h4>
										<a href="{{url('goods/detailtwo')}}`+'/'+goods[i].id+`" title="voluptate ipsum">`+goods[i].gname+`</a>
									</h4>

									<!-- Price -->
									<div class="item-price">
										<span>
											<span class="woocommerce-Price-amount amount">
												<span class="woocommerce-Price-currencySymbol">$</span>`+goods[i].price+`
											</span>
										</span>
									</div>
								</div>

								<div class="item-img products-thumb">
									<a href="{{url('goods/detailtwo')}}`+'/'+goods[i].id+`">
										<div class="product-thumb-hover">
											<img 	width="300" height="300" src="{{asset('/')}}`+obj[2]+`" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt=""
													srcset="{{asset('/')}}`+obj[2]+` 300w, {{asset('/')}}`+obj[2]+` 150w, {{asset('/')}}`+obj[2]+` 180w, {{asset('Home/images/1903/52.jpg')}} 600w"
													sizes="(max-width: 300px) 100vw, 300px" />
										</div>
									</a>

									<!-- add to cart, wishlist, compare -->
									<div class="item-bottom clearfix">

										<a style='margin-left:15px;' rel="nofollow" href="javascript:;" onclick='addcart(`+goods[i].pid+`)' class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="加入购物车">加入购物车</a>

										<div class="yith-wcwl-add-to-wishlist add-to-wishlist-248">
											<div class="yith-wcwl-add-button show" style="display:block">
												<a href="javascript:;" onclick='addCollection(`+goods[i].pid+`)' rel="nofollow" title='收藏此商品' class="">收藏此商品</a>
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
										<a href="{{url('img')}}`+'/'+goods[i].id+`" data-fancybox-type="ajax" class="sm_quickview_handler-list fancybox fancybox.ajax">商品大图</a>
									</div>
								</div>
							</div>
						</div>
						<div>
						`;
						$('#new').append(str);
					}

					for (i = 0 , str = ''; i < logo.length; i++) {
						str += `
							<div id='display' display='`+dataId+`' class='box'>
								<div class="item-brand">
									<a href="javascript:;">
										<img width="170" height="90" src="{{asset('/upload/image')}}/`+logo[i].blogo+`" class="attachment-170x90 size-170x90" alt="" />
									</a>
								</div>
							</div>
						`;
					}
					$('#brand').append(str);
				}
			})
		};
	</script>
	<script type="text/javascript">

	setTimeout(function () {

	    $('#time').removeClass().html('');
	},2000);
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


   <!-- 热销商品的js -->
	<script>


		$('#relagood').on('click', 'a', function () {


			//获取到id
			var id = $(this).attr('data-id');

			var url = "{{url('/hotsale')}}";
			var that = $(this);

			//添加一个属性，隐藏
			$('#old').children().attr('id', 'yin');



			if($('div[cnm='+id+']').length > 0){
				$('div[cnm='+id+']').attr('id', 'block')
				return;
			}

			var bool = that.attr('haverequested');
			if (bool != 1) {

				$.ajax({

	        		type:"post",
	        		url:url,
	        		data:"id="+id+'&_token={{csrf_token()}}',
	        		success:function (data) {

	        			var str = '';


	        			for (var i=0; i<data.length; i++) {


	        				str += `<div id='block' cnm='`+id+`' style="border:1px solid #ccc;padding:3px;float:left;width: 33.33333%;" >

										<div class="item product" >
											<div class="item-wrap">
												<div class="item-detail">
													<div class="item-content">

														<h4>
															<a href="simple_product.html" title="nisi ball tip">`+data[i].gname+`</a>
														</h4>

														<!-- Price -->

														<div class="item-price">
															<span>
																<ins>
																	<span class="woocommerce-Price-amount amount">
																		<span class="woocommerce-Price-currencySymbol">$</span>`+data[i].price+`
																	</span>
																</ins>
															</span>
														</div>


														<div class="sale-off">-10%</div>
													</div>

													<div class="item-img products-thumb">
														<span class="onsale">Sale!</span>

														<a href="{{url('goods/detailtwo')}}`+'/'+data[i].id+`">
															<div class="product-thumb-hover">
																<img 	width="300" height="300" src="`+$.parseJSON(data[i].gpic)[0]+`" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt=""
																		srcset="`+$.parseJSON(data[i].gpic)[0]+` 300w, `+$.parseJSON(data[i].gpic)[0]+` 150w, `+$.parseJSON(data[i].gpic)[0]+` 180w, `+$.parseJSON(data[i].gpic)[0]+` 500w"
																		sizes="(max-width: 300px) 100vw, 300px" />
															</div>
														</a>

														<!-- add to cart, wishlist, compare -->
														<div class="item-bottom clearfix">
															<a style='margin-left:15px;' rel="nofollow" href="javascript:;" onclick='addcart(`+data[i].pid+`)' class="button product_type_simple add_to_cart_button ajax_add_to_cart" title="加入购物车">加入购物车</a>

															<div class="yith-wcwl-add-to-wishlist add-to-wishlist-248">
																<div class="yith-wcwl-add-button show" style="display:block">
																	<a href="javascript:;" onclick='addCollection(`+data[i].pid+`)' rel="nofollow" class="" title="收藏商品">收藏商品</a>
																	<img src="{{asset('Home/images/wpspin_light.gif')}}" class="ajax-loading" alt="loading" width="16" height="16" style="visibility:hidden" />
																</div>

																<div class="yith-wcwl-wishlistaddedbrowse hide" style="display:none;">
																	<span class="feedback">Product added!</span>
																	<a href="#" rel="nofollow">Browse Wishlist</a>
																</div>


																<div style="clear:both"></div>
																<div class="yith-wcwl-wishlistaddresponse"></div>
															</div>

															<div class="clear"></div>
															<a href="{{url('img')}}`+'/'+data[i].id+`" data-fancybox-type="ajax" class="sm_quickview_handler-list fancybox fancybox.ajax" title="商品大图">商品大图 </a>
														</div>
													</div>
												</div>
											</div>
										</div>

									</div>`;
	        			}

						that.attr('haverequested', 1);
		        		$('#old').append(str);

		        		if (data == '404') {
		        			var str = `<div id='display' display='`+id+`'  >没有商品了</div>`;
		        			$('#old').append(str);
		        		}
	        		},
	        		dataType:'json'
	        	});
			}

		});


		//实现url跳转
		$('#tiaozhuan').on('click', 'a', function () {

			var url = $(this).attr('type-url');

			window.location.href='http://' + url;
		})
	</script>
	@include('Layouts/addcart')
	<script type="text/javascript">
		$('.typelink').on('mouseenter', function (){
			var obj = $(this);
			if (obj.attr('msg')) {
				return;
			}
			var id = $(this).attr('link-id');
			var str = '<ul id="w" class="dropdown-menu nav-level1 column-4">';
			$.ajax({
				type: 'get',
				url: '{{url("menu")}}'+'/'+id,
				success: function (msg){
					for (var i=0; i<msg.length; i++) {
						str += `
							<li class="dropdown-submenu column-4 menu-electronics etrostore-menu-img">
								<a href="`+`{{url('goods/list/brand')}}`+'/'+msg[i].id+`">
									<span class="have-title">
										<span class="menu-img">
											<img width='110' height='55' src="`+`{{asset('upload/image')}}`+`/`+msg[i].blogo+`" alt="Menu Image">
										</span>

										<span class="menu-title">`+msg[i].bname+`</span>
									</span>
								</a>
						`;
						str += '<ul class="dropdown-sub nav-level2">';
						for(var j=0; j<msg[i].menuinfo.length; j++) {
							str+=`
								<li class="menu-leds">
									<a href="{{url('goods/detailtwo')}}`+`/`+msg[i].menuinfo[j].id+`">
										<span class="have-title">
											<span class="menu-title">`+msg[i].menuinfo[j].gname+`</span>
										</span>
									</a>
								</li>
							`;
						}
						str+=`
								</ul>
							</li>
						`;
					}
					obj.attr('msg', 'true');
					obj.parent().append(str);
				}
			})
		})
	</script>

   </body>
</html>
