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
	    .button a:hover{background: #D35D1F}
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

</head>

<body class="page page-id-6 home-style1">




	<div class="body-wrapper theme-clearfix">
		<header id="header" class="header header-style1">
			<div class="header-top clearfix">
				<div class="container">
					<div class="rows">
						<!-- SIDEBAR TOP MENU -->
						<div class="pull-left top1">
							<div class="widget text-2 widget_text pull-left">
								<div class="widget-inner">
									<div class="textwidget">
										<div class="call-us"><span>欢迎</span>xxx<span>来到ETRO商城</span></div>
									</div>
								</div>
							</div>

							<div class="widget text-3 widget_text pull-left">
								<div class="widget-inner">
									<div class="textwidget">
										<div id="lang_sel">
											<ul class="nav">
												<li>
													<a class="lang_sel_sel icl-en">
														<!-- <img class="iclflag" title="English" alt="en" src="{{asset('Home/images/icons/en.png')}}" width="18" height="12" /> --> 会员登录
													</a>
<!-- 													<ul>
														<li class="icl-en">
															<a href="#">
																<img class="iclflag" title="English" alt="en" src="{{asset('Home/images/icons/en.png')}}" width="18" height="12" /> English
															</a>
														</li>

														<li class="icl-ar">
															<a href="#">
																<img class="iclflag" title="Arabic" alt="ar" src="{{asset('Home/images/icons/ar.png')}}" width="18" height="12" /> Arabic
															</a>
														</li>
													</ul> -->
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>

							<div class="widget woocommerce_currency_converter-2 widget_currency_converter pull-left">
								<div class="widget-inner">
									<form method="post" class="currency_converter" action="">
										<ul class="currency_w">
											<li>
												<a href="#" class="">会员注册</a>
<!-- 												<ul class="currency_switcher">
													<li><a href="#" class="reset default active" data-currencycode="USD">USD</a></li>
													<li><a href="#" class="" data-currencycode="EUR">EUR</a></li>
												</ul> -->
											</li>
										</ul>
									</form>
								</div>
							</div>
						</div>

						<div class="wrap-myacc pull-right">
							<div class="sidebar-account pull-left">
								<div class="account-title">我的管理</div>

								<div id="my-account" class="my-account">
									<div class="widget-1 widget-first widget nav_menu-4 widget_nav_menu">
										<div class="widget-inner">
											<ul id="menu-my-account" class="menu">
												<li class="menu-my-account">
													<a class="item-link" href="{{url('user/myaccount')}}">
														<span class="menu-title">个人中心</span>
													</a>
												</li>

												<li class="menu-cart">
													<a class="item-link" href="cart.html">
														<span class="menu-title">购物车</span>
													</a>
												</li>

												<li class="menu-checkout">
													<a class="item-link" href="checkout.html">
														<span class="menu-title">我的订单</span>
													</a>
												</li>

												<li class="menu-wishlist">
													<a class="item-link" href="#">
														<span class="menu-title">我的评价</span>
													</a>
												</li>
											</ul>
										</div>
									</div>

									<div class="widget-2 widget-last widget sw_top-4 sw_top">
										<div class="widget-inner">
											<div class="top-login">
												<div class="div-logined">
													<ul>
														<li>
															<a href="javascript:void(0);" data-toggle="modal" data-target="#login_form">
																<span>我的积分</span>
															</a>
															<span class="wg">Welcome Guest</span>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="pull-left top2">
								<div class="widget-1 widget-first widget nav_menu-2 widget_nav_menu">
									<div class="widget-inner">
										<ul id="menu-checkout" class="menu">
											<li class="menu-checkout">
												<a class="item-link" href="checkout.html">
													<span class="menu-title">收藏夹</span>
												</a>
											</li>
											<li class="menu-checkout">
												<a class="item-link" href="{{url('/outlogin')}}">
													<span class="menu-title">退出</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="header-mid clearfix">
				<div class="container">
					<div class="rows">
						<!-- LOGO -->
						<div class="etrostore-logo pull-left">
							<a href="#">
								<img src="{{asset('Home/images/icons/logo-orange.png')}}" alt="Shoopy">
							</a>
						</div>

						<div class="mid-header pull-right">
							<div class="widget-1 widget-first widget sw_top-2 sw_top">
								<div class="widget-inner">
									<div class="top-form top-search">
										<div class="topsearch-entry">
											<form method="get" action="{{url('/search')}}">
												 {{ csrf_field() }}
												<div>
												   <input type="text" value="" name="key" placeholder="Enter your keyword...">
													<div class="cat-wrapper">
														<label class="label-search">
															<select name="search_category" class="s1_option">
																<option value="">查找所有商品</option>
																<option value="">Computers  Laptops</option>
																<option value="13">Computers & Networking</option>
																<option value="14">Smartphones & Tablet</option>
																<option value="15">Home Furniture</option>
																<option value="16">Home Appliances</option>
																<option value="17">Electronic Component</option>
																<option value="18">Household Goods</option>
																<option value="32">Appliances</option>
																<option value="49">Accessories</option>
																<option value="51">Electronics</option>
																<option value="78">Televisions</option>
																<option value="80">Cameras & Accessories</option>
															</select>
														</label>
													</div>

													<button type="submit" title="Search" class="fa fa-search button-search-pro form-button"></button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>

							<div class="widget sw_top-3 sw_top pull-left">
								<div class="widget-inner">
									<div class="top-form top-form-minicart etrostore-minicart pull-right">
										<div class="top-minicart-icon pull-right">
											<i class="fa fa-shopping-cart"></i>
											<a class="cart-contents" href="cart.html" title="View your shopping cart">
												<span class="minicart-number">2</span>
											</a>
										</div>

										<div class="wrapp-minicart">
											<div class="minicart-padding">
												<div class="number-item">
													购物车有 <span>2</span> 件商品
												</div>

												<ul class="minicart-content">
													<li>
														<a href="simple_product.html" class="product-image">
															<img 	width="100" height="100" src="{{asset('Home/images/1903/45-150x150.jpg')}}" class="attachment-100x100 size-100x100 wp-post-image" alt=""
																	srcset="{{asset('Home/images/1903/45-150x150.jpg')}} 150w, {{asset('Home/images/1903/45-300x300.jpg')}} 300w, {{asset('Home/images/1903/45-180x180.jpg')}} 180w, {{asset('Home/images/1903/45.jpg')}} 600w"
																	sizes="(max-width: 100px) 100vw, 100px" />
														</a>

														<div class="detail-item">
															<div class="product-details">
																<h4>
																	<a class="title-item" href="simple_product.html">Veniam Dolore</a>
																</h4>

																<div class="product-price">
																	<span class="price">
																		<span class="woocommerce-Price-amount amount">
																			<span class="woocommerce-Price-currencySymbol">$</span>190.00
																		</span>
																	</span>

																	<div class="qty">
																		<span class="qty-number">1</span>
																	</div>
																</div>

																<div class="product-action clearfix">
																	<a href="#" class="btn-remove" title="Remove this item">
																		<span class="fa fa-trash-o"></span>
																	</a>

																	<a class="btn-edit" href="cart.html" title="View your shopping cart">
																		<span class="fa fa-pencil"></span>
																	</a>
																</div>
															</div>
														</div>
													</li>

													<li>
														<a href="simple_product.html" class="product-image">
															<img 	width="100" height="100" src="{{asset('Home/images/1903/22-150x150.jpg')}}" class="attachment-100x100 size-100x100 wp-post-image" alt=""
																	srcset="{{asset('Home/images/1903/22-150x150.jpg')}} 150w, {{asset('Home/images/1903/22-300x300.jpg')}} 300w, {{asset('Home/images/1903/22-180x180.jpg')}} 180w, {{asset('Home/images/1903/22.jpg')}} 600w"
																	sizes="(max-width: 100px) 100vw, 100px" />
														</a>

														<div class="detail-item">
															<div class="product-details">
																<h4>
																	<a class="title-item" href="simple_product.html">Cleaner with bag</a>
																</h4>

																<div class="product-price">
																	<span class="price">
																		<span class="woocommerce-Price-amount amount">
																			<span class="woocommerce-Price-currencySymbol">$</span>350.00
																		</span>
																	</span>

																	<div class="qty">
																		<span class="qty-number">1</span>
																	</div>
																</div>

																<div class="product-action clearfix">
																	<a href="#" class="btn-remove" title="Remove this item">
																		<span class="fa fa-trash-o"></span>
																	</a>

																	<a class="btn-edit" href="cart.html" title="View your shopping cart">
																		<span class="fa fa-pencil"></span>
																	</a>
																</div>
															</div>
														</div>
													</li>
												</ul>

												<div class="cart-checkout">
													<div class="price-total">
														<span class="label-price-total">总金额</span>

														<span class="price-total-w">
															<span class="price">
																<span class="woocommerce-Price-amount amount">
																	<span class="woocommerce-Price-currencySymbol">$</span>540.00
																</span>
															</span>
														</span>
													</div>

													<div class="cart-links clearfix">
														<div class="cart-link">
															<a href="cart.html" title="Cart">继续购物</a>
														</div>

														<div class="checkout-link">
															<a href="checkout.html" title="Check Out">结算</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="widget nav_menu-3 widget_nav_menu pull-left">
								<div class="widget-inner">
									<ul id="menu-wishlist" class="menu">
										<li class="menu-wishlist">
											<a class="item-link" href="#">
												<span class="menu-title">Wishlist</span>
											</a>
										</li>

										<li class="yith-woocompare-open menu-compare">
											<a class="item-link compare" href="#">
												<span class="menu-title">Compare</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="header-bottom clearfix">
				<div class="container">
					<div class="rows">
						<!-- Primary navbar -->
						<div id="main-menu" class="main-menu">
							<nav id="primary-menu" class="primary-menu">
								<div class="navbar-inner navbar-inverse">
									<div class="resmenu-container">
										<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#ResMenuprimary_menu">
											<span class="sr-only">Categories</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
										</button>

										<div id="ResMenuprimary_menu" class="collapse menu-responsive-wrapper">
											<ul id="menu-primary-menu" class="etrostore_resmenu">
												<li><a href="index.html">商城</a></li>
												<li><a href="cart.html">秒杀</a></li>
												<li><a href="checkout.html">热销商品</a></li>
												<li><a href="my_account.html">促销商品</a></li>
												<li><a href="shop.html">联系我们</a></li>
												<!-- <li><a href="simple_product.html">Simple Product</a></li>
												<li><a href="about_us.html">About Us</a></li>
												<li><a href="contact_us.html">Contact Us</a></li> -->
											</ul>
										</div>
									</div>

									<ul id="menu-primary-menu-1" class="nav nav-pills nav-mega etrostore-mega etrostore-menures">
										<li><a href="index.html">商城</a></li>
										<li><a href="cart.html">秒杀</a></li>
										<li><a href="checkout.html">热销商品</a></li>
										<li><a href="my_account.html">促销商品</a></li>
										<li><a href="shop.html">联系我们</a></li>
										<li><a href="simple_product.html">我的积分</a></li>
										<!-- <li><a href="about_us.html">About Us</a></li>
										<li><a href="contact_us.html">Contact Us</a></li> -->
									</ul>
								</div>
							</nav>
						</div>
						<!-- /Primary navbar -->

						<div class="top-form top-form-minicart etrostore-minicart pull-right">
							<div class="top-minicart-icon pull-right">
								<i class="fa fa-shopping-cart"></i>
								<a class="cart-contents" href="cart.html" title="View your shopping cart">
									<span class="minicart-number">2</span>
								</a>
							</div>

							<div class="wrapp-minicart">
								<div class="minicart-padding">
									<div class="number-item">
										There are <span>items</span> in your cart
									</div>

									<ul class="minicart-content">
										<li>
											<a href="simple_product.html" class="product-image">
												<img 	width="100" height="100" src="{{asset('Home/images/1903/45-150x150.jpg')}}" class="attachment-100x100 size-100x100 wp-post-image" alt=""
														srcset="{{asset('Home/images/1903/45-150x150.jpg')}} 150w, {{asset('Home/images/1903/45-300x300.jpg')}} 300w, {{asset('Home/images/1903/45-180x180.jpg')}} 180w, {{asset('Home/images/1903/45.jpg')}} 600w"
														sizes="(max-width: 100px) 100vw, 100px" />
											</a>

											<div class="detail-item">
												<div class="product-details">
													<h4>
														<a class="title-item" href="simple_product.html">Veniam Dolore</a>
													</h4>

													<div class="product-price">
														<span class="price">
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol">$</span>190.00
															</span>
														</span>

														<div class="qty">
															<span class="qty-number">1</span>
														</div>
													</div>

													<div class="product-action clearfix">
														<a href="#" class="btn-remove" title="Remove this item">
															<span class="fa fa-trash-o"></span>
														</a>

														<a class="btn-edit" href="cart.html" title="View your shopping cart">
															<span class="fa fa-pencil"></span>
														</a>
													</div>
												</div>
											</div>
										</li>

										<li>
											<a href="simple_product.html" class="product-image">
												<img	 width="100" height="100" src="{{asset('Home/images/1903/22-150x150.jpg')}}" class="attachment-100x100 size-100x100 wp-post-image" alt=""
														srcset="{{asset('Home/images/1903/22-150x150.jpg')}} 150w, {{asset('Home/images/1903/22-300x300.jpg')}} 300w, {{asset('Home/images/1903/22-180x180.jpg')}} 180w, {{asset('Home/images/1903/22.jpg')}} 600w"
														sizes="(max-width: 100px) 100vw, 100px" />
											</a>

											<div class="detail-item">
												<div class="product-details">
													<h4>
														<a class="title-item" href="simple_product.html">Cleaner with bag</a>
													</h4>

													<div class="product-price">
														<span class="price">
															<span class="woocommerce-Price-amount amount">
																<span class="woocommerce-Price-currencySymbol">$</span>350.00
															</span>
														</span>

														<div class="qty">
															<span class="qty-number">1</span>
														</div>
													</div>

													<div class="product-action clearfix">
														<a href="#" class="btn-remove" title="Remove this item">
															<span class="fa fa-trash-o"></span>
														</a>

														<a class="btn-edit" href="cart.html" title="View your shopping cart">
															<span class="fa fa-pencil"></span>
														</a>
													</div>
												</div>
											</div>
										</li>
									</ul>

									<div class="cart-checkout">
										<div class="price-total">
											<span class="label-price-total">Total</span>

											<span class="price-total-w">
												<span class="price">
													<span class="woocommerce-Price-amount amount">
														<span class="woocommerce-Price-currencySymbol">$</span>540.00
													</span>
												</span>
											</span>
										</div>

										<div class="cart-links clearfix">
											<div class="cart-link">
												<a href="cart.html" title="Cart">View Cart</a>
											</div>

											<div class="checkout-link">
												<a href="checkout.html" title="Check Out">Check Out</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="mid-header pull-right">
							<div class="widget sw_top">
								<span class="stick-sr">
									<i class="fa fa-search" aria-hidden="true"></i>
								</span>

								<div class="top-form top-search">
									<div class="topsearch-entry">
										<form role="search" method="get" class="form-search searchform" action="">
											<label class="hide"></label>
											<input type="text" value="" name="s" class="search-query" placeholder="Keyword here..." />
											<button type="submit" class="button-search-pro form-button">Search</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>


		<div class="container">
			<div class="row">
				<div id="contents" role="main" class="main-page  col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="post-6 page type-page status-publish hentry">
						<div class="entry-content">
							<div class="entry-summary">
									</div>
								</div>

			<div class="clear"></div>
			<div class="concent">
				<!--地址 -->
				<div class="paycont">
					<div class="address">
						<h3>确认收货地址 </h3>
						<div class="control">
							<div class="tc-btn createAddr theme-login am-btn am-btn-danger">使用新地址</div>
						</div>
						<div class="clear"></div>
						<ul id="show">

						</ul>

						<div class="clear"></div>
					</div>

					<!--支付方式-->
					<div class="logistics">
						<h3>选择支付方式</h3>
						<ul class="pay-list">
							<li class="pay card">银联<span></span></li>
							<li class="pay qq">微信<span></span></li>
							<li class="pay taobao">支付宝<span></span></li>
						</ul>
					</div>
					<div class="clear"></div>

					<!--订单 -->
					<div class="concent">
						<div id="payTable">
							<h3>确认订单信息</h3>
							<div class="cart-table-th">
								<div class="wp">

									<div class="th th-item">
										<div class="td-inner">商品信息</div>
									</div>
									<div class="th th-price">
										<div class="td-inner">单价</div>
									</div>
									<div class="th th-amount">
										<div class="td-inner">数量</div>
									</div>
									<div class="th th-sum">
										<div class="td-inner">金额</div>
									</div>
									<div class="th th-oplist">
										<div class="td-inner">配送方式</div>
									</div>

								</div>
							</div>
							<div class="clear"></div>
							<?php $total=0 ?>
							@foreach ($orders as $v)
							<tr class="item-list">
								<div class="bundle  bundle-last">

									<div class="bundle-main">
										<ul class="item-content clearfix">
											<div class="pay-phone">
												<li class="td td-item">
													<div class="item-pic">

														<a href="#" class="J_MakePoint">

															<img style="width: 80px;height: 80px" src="{{$v['gpic'][0]}}" class="itempic J_ItemImg"></a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="#" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$v['gname']}}</a>
														</div>
													</div>
												</li>
												<li class="td td-info">
													<div class="item-props">
														<span class="sku-line">颜色：12#川南玛瑙</span>
														<span class="sku-line">包装：裸装</span>
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price price-promo-promo">
														<div class="price-content">
															<em class="J_Price price-now">{{$v['price']}}</em>
														</div>
													</div>
												</li>
											</div>
											<li class="td td-amount">
												<div class="amount-wrapper ">
													<div class="item-amount ">
														<span class="phone-title">购买数量</span>
														<div class="sl">
														    <span>{{$v['num']}}</span>
														</div>
													</div>
												</div>
											</li>
											<li class="td td-sum">
												<div class="td-inner">
													<em tabindex="0" class="J_ItemSum number">{{$v['price']*$v['num']}}</em>
												</div>
											</li>
											<li class="td td-oplist">
												<div class="td-inner">
													<span class="phone-title">配送方式</span>
													<div class="pay-logis">
														顺丰快递<b class="sys_item_freprice"></b>
													</div>
												</div>
											</li>

										</ul>
										<div class="clear"></div>

									</div>
							</tr>
							<div class="clear"></div>
							<?php $total +=$v['price']*$v['num'] ?>
							@endforeach
							</div>


						<!--留言-->
							<div class="order-extra">
								<div class="order-user-info">
									<div id="holyshit257" class="memo">
										<label>买家留言：</label>
										<input type="text" title="选填,对本次交易的说明（建议填写已经和卖家达成一致的说明）" placeholder="选填,建议填写和卖家达成一致的说明" class="memo-input J_MakePoint c2c-text-default memo-close">
										<div class="msg hidden J-msg">
											<p class="error">最多输入500个字符</p>
										</div>
									</div>
								</div>

							</div>

							<div class="clear"></div>
							</div>



							<!--信息 -->
							<div class="order-go clearfix">
								<div class="pay-confirm clearfix">
									<div class="box">
										<div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款(含运费10元)：</em>
											<span class="price g_price ">
                                    <span>¥</span> <em class="style-large-bold-red " id="J_ActualFee"><?php echo $total+10 ?></em>
											</span>
										</div>

										<div id="holyshit268" class="pay-address">

											<p class="buy-footer-address">
												<span class="buy-line-title buy-line-title-type">寄送至：</span>
												<span class="buy--address-detail">
								               <span class="province myprovince"></span>
												<span class="city mycity"></span>
												<span class="dist mydist"></span>
												<span class="street mystreet"></span>
												</span>
												</span>
											</p>
											<p class="buy-footer-address">
												<span class="buy-line-title">收货人：</span>
												<span class="buy-address-detail">
                                         <span class="buy-user mybuy-user"></span>
												<span class="buy-phone mybuy-phone"></span>
												</span>
											</p>
										</div>
									</div>

									<div id="holyshit269" class="submitOrder">
										<div class="go-btn-wrap">
										<div class="button">
											<a id="J_Go" href="javascript:;" class="btn-go" tabindex="0" title="点击此按钮，提交订单">提交订单</a>
										<div>
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>

						<div class="clear"></div>
					</div>
				</div>
				<div class="footer">

				</div>
			</div>
			<div class="theme-popover-mask"></div>
			<div class="theme-popover">

				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add address</small></div>
				</div>
				<hr/>

				<div class="am-u-md-12" id="show">
					<form class="am-form am-form-horizontal" id="add" action="{{url('/address/add')}}" method="post">
					    {{csrf_field()}}
						<div class="am-form-group">
							<label for="user-name" class="am-form-label">收货人</label>
							<div class="am-form-content">
								<input type="text" id="user-name" name="uname" placeholder="收货人" required="">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">手机号码</label>
							<div class="am-form-content">
								<input id="user-phone" placeholder="手机号必填" name="uphone" type="text" required="">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">所在地</label>
							<div class="am-form-content address">
								<select data-am-selected name="pro" id="pro" required="">
									<option  value="-1"  >省份</option>
								</select>
								<select data-am-selected name="city" id="city" required="">
									<option  value="-1" >城市</option>
								</select>
								<select data-am-selected name="area" id="area" required="">
									<option  value="-1" >区/县</option>
								</select>
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-intro" class="am-form-label">详细地址</label>
							<div class="am-form-content">
								<textarea class="" rows="3" id="user-intro" name="address" placeholder="输入详细地址" required=""></textarea>
								<small>100字以内写出你的详细地址...</small>
							</div>
						</div>

						<div class="am-form-group theme-poptit">
							<div class="am-u-sm-9 am-u-sm-push-3">
								<button style="background: white;border:hidden;position: relative;top: 5px"><div class="am-btn am-btn-danger" id="save">保存</div></button>
								<div class="am-btn am-btn-danger" id="close" >取消</div>
							</div>
						</div>
					</form>
				</div>

			</div>

			<div class="clear"></div>
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

		<footer id="footer" class="footer default theme-clearfix">
			<!-- Content footer -->
			<div class="container">
				<div class="vc_row wpb_row vc_row-fluid">
					<div class="wpb_column vc_column_container vc_col-sm-12">
						<div class="vc_column-inner ">
							<div class="wpb_wrapper">
								<div id="sw_testimonial01" class="testimonial-slider client-wrapper-b carousel slide " data-interval="0">
									<div class="carousel-cl nav-custom">
										<a class="prev-test fa fa-angle-left" href="#sw_testimonial01" role="button" data-slide="prev"><span></span></a>
										<a class="next-test fa fa-angle-right" href="#sw_testimonial01" role="button" data-slide="next"><span></span></a>
									</div>

									<div class="carousel-inner">
										<div class="item active">
											<div class="item-inner">
												<div class="image-client pull-left">
													<a href="#" title="">
														<img width="127" height="127" src="{{asset('Home/images/1903/tm3.jpg')}}" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" />
													</a>
												</div>

												<div class="client-say-info">
													<div class="client-comment">
														In auctor ex id urna faucibus porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit....
													</div>

													<div class="name-client">
														<h2><a href="#" title="">Jerry</a></h2>
														<p>Web Developer</p>
													</div>
												</div>
											</div>

											<div class="item-inner">
												<div class="image-client pull-left">
													<a href="#" title="">
														<img width="127" height="127" src="{{asset('Home/images/1903/tm1.png')}}" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" />
													</a>
												</div>

												<div class="client-say-info">
													<div class="client-comment">
														In auctor ex id urna faucibus porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit....
													</div>

													<div class="name-client">
														<h2>
															<a href="#" title="">David Gand</a>
														</h2>

														<p>Designer</p>
													</div>
												</div>
											</div>
										</div>

										<div class="item ">
											<div class="item-inner">
												<div class="image-client pull-left">
													<a href="#" title="">
														<img width="127" height="127" src="{{asset('Home/images/1903/tm2.png')}}" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" />
													</a>
												</div>

												<div class="client-say-info">
													<div class="client-comment">
														In auctor ex id urna faucibus porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit....
													</div>

													<div class="name-client">
														<h2>
															<a href="#" title="">Taylor Hill</a>
														</h2>

														<p>Developer</p>
													</div>
												</div>
											</div>

											<div class="item-inner">
												<div class="image-client pull-left">
													<a href="#" title="">
														<img width="127" height="127" src="{{asset('Home/images/1903/tm3.jpg')}}" class="attachment-thumbnail size-thumbnail wp-post-image" alt="" />
													</a>
												</div>

												<div class="client-say-info">
													<div class="client-comment">
														In auctor ex id urna faucibus porttitor. Lorem ipsum dolor sit amet, consectetur adipiscing elit....
													</div>

													<div class="name-client">
														<h2>
															<a href="#" title="">JOHN DOE</a>
														</h2>

														<p>Designer</p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid footer-style1 vc_row-no-padding">
					<div class="container float wpb_column vc_column_container vc_col-sm-12">
						<div class="vc_column-inner ">
							<div class="wpb_wrapper">
								<div class="vc_row wpb_row vc_inner vc_row-fluid footer-top">
									<div class="wpb_column vc_column_container vc_col-sm-8">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div class="wpb_text_column wpb_content_element ">
													<div class="wpb_wrapper">
														<div class="wrap-newletter">
															<h3>NEWSLETTER SIGNUP</h3>

															<form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-275" method="post" data-id="275" data-name="">
																<div class="mc4wp-form-fields">
																	<div class="newsletter-content">
																		<input type="email" class="newsletter-email" name="EMAIL" placeholder="Your email" required="" />
																		<input class="newsletter-submit" type="submit" value="Subscribe" />
																	</div>
																</div>
																<div class="mc4wp-response"></div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="wpb_column vc_column_container vc_col-sm-4">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div class="wpb_raw_code wpb_content_element wpb_raw_html">
													<div class="wpb_wrapper">
														<div class="shop-social">
															<ul>
																<li>
																	<a href="#">
																		<i class="fa fa-facebook"></i>
																	</a>
																</li>

																<li>
																	<a href="#">
																		<i class="fa fa-twitter"></i>
																	</a>
																</li>

																<li>
																	<a href="#">
																		<i class="fa fa-google-plus"></i>
																	</a>
																</li>

																<li>
																	<a href="#">
																		<i class="fa fa-linkedin"></i>
																	</a>
																</li>

																<li>
																	<a href="#">
																		<i class="fa fa-pinterest-p"></i>
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="vc_row wpb_row vc_inner vc_row-fluid footer-bottom">
									<div class="item-res wpb_column vc_column_container vc_col-sm-6 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div class="wpb_text_column wpb_content_element ">
													<div class="wpb_wrapper">
														<div class="ya-logo">
															<a href="#">
																<img src="{{asset('Home/images/icons/logo-footer.png')}}" alt="logo" />
															</a>
														</div>
													</div>
												</div>

												<div class="wpb_raw_code wpb_content_element wpb_raw_html">
													<div class="wpb_wrapper">
														<div class="infomation">
															<p>
																Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum is simply dummy text of the printing and typesetting industry.
															</p>

															<div class="info-support">
																<ul>
																   <li>No 1123, Marmora Road, Glasgow, D04 89GR.</li>
																   <li>(801) 2345 - 6788 / (801) 2345 - 6789</li>
																   <li><a href="mailto:contact@etrostore.com">support@etrostore.com</a></li>
																</ul>
															</div>

															<div class="store">
																<a href="#">
																	<img src="{{asset('Home/images/1903/app-store.png')}}" alt="store" title="store" />
																</a>

																<a href="#">
																	<img src="{{asset('Home/images/1903/google-store.png')}}" alt="store" title="store" />
																</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="item-res wpb_column vc_column_container vc_col-sm-6 vc_col-lg-2 vc_col-md-2 vc_col-xs-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div class="vc_wp_custommenu wpb_content_element">
													<div class="widget widget_nav_menu">
														<h2 class="widgettitle">Support</h2>

														<ul id="menu-support" class="menu">
															<li class="menu-product-support">
																<a class="item-link" href="#">
																	<span class="menu-title">Product Support</span>
																</a>
															</li>

															<li class="menu-pc-setup-support-services">
																<a class="item-link" href="#">
																	<span class="menu-title">PC Setup & Support Services</span>
																</a>
															</li>

															<li class="menu-extended-service-plans">
																<a class="item-link" href="#">
																	<span class="menu-title">Extended Service Plans</span>
																</a>
															</li>

															<li class="menu-community">
																<a class="item-link" href="#">
																	<span class="menu-title">Community</span>
																</a>
															</li>

															<li class="menu-product-manuals">
																<a class="item-link" href="#">
																	<span class="menu-title">Product Manuals</span>
																</a>
															</li>

															<li class="menu-product-registration">
																<a class="item-link" href="#">
																	<span class="menu-title">Product Registration</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="item-res wpb_column vc_column_container vc_col-sm-6 vc_col-lg-2 vc_col-md-2 vc_col-xs-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div class="vc_wp_custommenu wpb_content_element">
													<div class="widget widget_nav_menu">
														<h2 class="widgettitle">Your Links</h2>

														<ul id="menu-your-links" class="menu">
															<li class="menu-my-account">
																<a class="item-link" href="my_account.html">
																	<span class="menu-title">My Account</span>
																</a>
															</li>

															<li class="menu-order-tracking">
																<a class="item-link" href="#">
																	<span class="menu-title">Order Tracking</span>
																</a>
															</li>

															<li class="menu-watch-list">
																<a class="item-link" href="#">
																	<span class="menu-title">Watch List</span>
																</a>
															</li>

															<li class="menu-customer-service">
																<a class="item-link" href="#">
																	<span class="menu-title">Customer Service</span>
																</a>
															</li>

															<li class="menu-returns-exchanges">
																<a class="item-link" href="#">
																	<span class="menu-title">Returns / Exchanges</span>
																</a>
															</li>

															<li class="menu-faqs">
																<a class="item-link" href="#">
																	<span class="menu-title">FAQs</span>
																</a>
															</li>

															<li class="menu-financing">
																<a class="item-link" href="#">
																	<span class="menu-title">Financing</span>
																</a>
															</li>

															<li class="menu-card">
																<a class="item-link" href="#">
																	<span class="menu-title">Card</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="item-res wpb_column vc_column_container vc_col-sm-6 vc_col-lg-4 vc_col-md-4 vc_col-xs-12">
										<div class="vc_column-inner ">
											<div class="wpb_wrapper">
												<div class="wpb_raw_code wpb_content_element wpb_raw_html">
													<div class="wpb_wrapper">
														<div class="sp-map">
															<div class="title">
																<h2>find a store</h2>
															</div>

															<img src="{{asset('Home/images/1903/map.jpg')}}" alt="map" title="map" />

															<a href="#" class="link-map">Store locator</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="vc_wp_custommenu wpb_content_element wrap-cus">
									<div class="widget widget_nav_menu">
										<ul id="menu-infomation" class="menu">
											<li class="menu-about-us">
												<a class="item-link" href="about_us.html">
													<span class="menu-title">About Us</span>
												</a>
											</li>

											<li class="menu-customer-service">
												<a class="item-link" href="#">
													<span class="menu-title">Customer Service</span>
												</a>
											</li>

											<li class="menu-privacy-policy">
												<a class="item-link" href="#">
													<span class="menu-title">Privacy Policy</span>
												</a>
											</li>

											<li class="menu-site-map">
												<a class="item-link" href="#">
													<span class="menu-title">Site Map</span>
												</a>
											</li>

											<li class="menu-orders-and-returns">
												<a class="item-link" href="#">
													<span class="menu-title">Orders and Returns</span>
												</a>
											</li>

											<li class="menu-contact-us">
												<a class="item-link" href="contact_us.html">
													<span class="menu-title">Contact Us</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="vc_row-full-width vc_clearfix"></div>
			</div>

			<div class="footer-copyright style1">
				<div class="container">
					<!-- Copyright text -->
					<div class="copyright-text pull-left">
						<p>Copyright &copy; 2017.Company name All rights reserved.<a target="_blank" href="http://www.htmlsucai.com/">&#72;&#84;&#77;&#76;&#32032;&#26448;&#32593;</a></p>
					</div>

					<div class="sidebar-copyright pull-right">
						<div class="widget-1 widget-first widget text-4 widget_text">
							<div class="widget-inner">
								<div class="textwidget">
									<div class="payment">
										<a href="#">
											<img src="{{asset('Home/images/1903/paypal.png')}}" alt="payment" title="payment" />
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
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
   <script type="text/javascript">
       $('#close').click(function () {
       	    $('.theme-popover-mask').css('display', 'none');
       	    $('.theme-popover').css('display', 'none');
       	    $('body').css('overflow', 'visible');
       	    $('.theme-popover').css('overflow', 'visible');
       })
   </script>

   <script type="text/javascript">


    //初始化地址表单默认值
    var uname = false;
    var uphone = false;
    var address = false;
    var pro = false;
    var city = false;
    var area = false;

    $('input[name="uname"]').blur(function () {
    	var val = $('input[name="uname"]').val();
    	if (val) {
    		uname = true;
    	}
    })

    $('input[name="uphone"]').blur(function () {
    	var val = $('input[name="uphone"]').val();
    	if ( (/^((13[0-9])|(14[5|7])|(15([0-3]|[5-9]))|(18[0,5-9]))\d{8}$/).test(val) ) {
    		uphone = true;
    	}
    })

    $('#pro').change(function () {
    	var val = $('#pro').val();
    	if (val) {
    		pro = true;
    	}
    })

    $('#city').change(function () {
    	var val = $('#city').val();
    	if (val) {
    		city = true;
    	}
    })

    $('#area').change(function () {
    	var val = $('#area').val();
    	if (val) {
    		area = true;
    	}
    })



    $('#user-intro').blur(function () {
    	var val = $('#user-intro').val();
    	if (val) {
    		address = true;
    	}
    })

    $('#add').submit(function () {
        if (!uname) {
        	alert('收货人名字不能为空')
        	return false;
        } else if (!uphone) {
        	alert('输入正确手机格式');
        	return false;
        } else if (!pro) {
        	alert('省份不能为空');
        	return false;
        } else if (!city) {
        	alert('城市不能为空');
        	return false;
        } else if (!area) {
        	alert('区/县不能为空');
        	return false;
        } else if (!address) {
        	alert('详细地址不能为空');
        	return false;
        } else {
	       	$('.theme-popover-mask').css('display', 'none');
	       	$('.theme-popover').css('display', 'none');
	       	$('body').css('overflow', 'visible');
	       	$('.theme-popover').css('overflow', 'visible');
            return true;
        }
    })

    //三级联动地址选择
    $.ajax({
       	 type : 'post',
       	 data : 'upid='+0+'&_token={{csrf_token()}}',
       	 url  : '{{url("/address/select")}}',
       	 success:function(msg) {
       	  str = '';
       	  for (var i=0; i<msg.length; i++) {
       	   str += '<option value="'+msg[i].id+'"  title="'+msg[i].id+'">'+msg[i].name+'</option>';
       	  }
       	  $('#pro').append(str);
       	 },
       	 dataType : 'json'
    });

	//当select标签中的内容发生改变时，应该再触发ajax拿到省份对应的市的数据
	$('div#show').on('change', 'select', function () {


		//当前用户点击那个select
		var that = $(this);

		//将当前点击的select标签的下一个select标签的option长度变成1

            if(that.next().is('select')) {
            	that.next('select')[0].options.length = 1;
            	if(that.next('select').next().is('select')){
            		that.next('select').next('select')[0].options.length = 1;
            	}
            }

		//拿到是当前点击的select标签的value值
		var currentId = $(this).val();

		$.ajax({

			type: 'post',
			url: '{{url("/address/select")}}',
			data: 'upid='+currentId+'&_token={{csrf_token()}}',
			success: function (msg) {console.log(msg);

				var str = '';

				for (var i = 0; i<msg.length; i++) {

					str += '<option value="'+msg[i].id+'" >'+msg[i].name+'</option>';
				}

				//将拿到数据放到下一个select标签中
				that.next('select').append(str);

			},
			dataType:'json',

		});
	})

	function show() {
		$.ajax({
			type : 'post',
			url  : '{{url("/address/show")}}',
			data : '_token={{csrf_token()}}',
			success:function(data) {
				str = '';
				for (var i = 0; i < data.length; i++) {
					str += `<div class="per-border"></div>
							<li class="user-addresslist mybox">

								<div class="address-left">
									<div class="user DefaultAddr">

										<span class="buy-address-detail">
                                       <span class="buy-user" name="name">`+data[i].name+` </span>
										<span class="buy-phone" name="phone">`+data[i].phone+`</span>
										</span>
									</div>
									<div class="default-address DefaultAddr">
										<span class="buy-line-title buy-line-title-type">收货地址：</span>
										<span class="buy--address-detail">
								   <span class="province" name="pro">`+data[i].pro+`</span>
										<span class="city" name="city">`+data[i].city+`</span>
										<span class="dist" name="area">`+data[i].area+`</span>
										<span class="street" name="comment">`+data[i].comment+`</span>
										</span>

										</span>
									</div>

									<ins class="deftip" style="display:none">默认地址</ins>

								</div>
								<div class="address-right">
									<a href="{">
										<span class="am-icon-angle-right am-icon-lg"></span></a>
								</div>
								<div class="clear"></div>

								<div class="new-addr-btn" atr="`+data[i].id+`">
									<a href="javascript:;" onclick="change(this)" class="default" style="display:block">使用该地址</a>
									<span class="new-addr-bar hidden">|</span>
									<a href="javascript:;" onclick="update(this);">编辑</a>
									<span class="new-addr-bar">|</span>
									<a href="javascript:void(0);"  onclick="del(this);">删除</a>
								</div>

							</li>`

							$('#show').html(str);
				}
			},
			dataType : 'json',
		})
	}

	show();

	//删除地址
	function del(obj) {
		var id = $(obj).parent().attr('atr');
		$.ajax({
			type : 'post',
			data : 'id='+id+'&_token={{csrf_token()}}',
			url  : '{{url("/address/del")}}',
			success:function(data) {
				show();
			},
			dataType:'json',
		})
		$(obj).parent().parent().remove();
	}

	//编辑地址
	function update(obj) {
	    $('.theme-popover-mask').css('display', 'block');
	    $('.theme-popover').css('display', 'block');
	    $('body').css('overflow', 'visible');
	    $('.theme-popover').css('overflow', 'visible');

	}

	function change(obj) {
		$('.default').css('display', 'block');
		$('.deftip').css('display', 'none');
		$('.mybox').removeClass('user-addresslist defaultAddr');
		$('.mybox').addClass('user-addresslist');

		$(obj).css('display', 'none');
		$(obj).parent().parent('li').addClass('user-addresslist defaultAddr');
		$(obj).parent().parent().children().first().children(':last').css('display', 'block');
		var name = $(obj).parent().parent().children().first('div').children().first().children().children().first('span').html();
		var phone =$(obj).parent().parent().children().first('div').children().first().children().children().last('span').html();
		var pro = $(obj).parent().parent().children().first('div').children().next().children().last('span').children(':first').html();
		var city = $(obj).parent().parent().children().first('div').children().next().children().last('span').children().next(':first').html();
		var dist = $(obj).parent().parent().children().first('div').children().next().children().last('span').children().next().next(':first').html();
		var street = $(obj).parent().parent().children().first('div').children().next().children().last('span').children().last().html();

		$('.myprovince').html(pro);
		$('.mycity').html(city);
		$('.mydist').html(dist);
		$('.mystreet').html(street);
		$('.mybuy-user').html(name);
		$('.mybuy-phone').html(phone);

	}

	//提交订单
	$('.btn-go').click(function () {

		var pro = $('.province').html();
		var city = $('.city').html();
		var dist = $('.dist').html();
		var street = $('.street').html();
		var name = $('.buy-user').html();
		var phone = $('.buy-phone').html();
		var sum = $('#J_ActualFee').html();

		var address = pro+city+dist+street;

		if(pro == '') {
			alert('请选择地址');
			return;
		}

		$.ajax({
			type : 'post',
			data : 'sum='+sum+'&name='+name+'&phone='+phone+'&address='+address+'&_token={{csrf_token()}}',
			url  : '{{url("/order/add")}}',
			success:function(data) {
				 window.location.href = '{{url("/order/success")}}';
			},
			dataType:'json',
		});
	})
   </script>
   </body>
</html>
