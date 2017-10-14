<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
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
	<link rel="stylesheet" href="{{asset('Home/css/woocommerce/prettyPhoto.css')}}" />
	<link rel="stylesheet" href="{{asset('Home/css/yith-woocommerce-wishlist/style.css')}}" />

	<link rel="stylesheet" href="{{asset('Home/css/custom.css')}}" />
	<link rel="stylesheet" href="{{asset('Home/css/app-orange.css')}}" id="theme_color" />
	<link rel="stylesheet" href="" id="rtl" />
	<link rel="stylesheet" href="{{asset('Home/css/app-responsive.css')}}" />
</head>

<body class="product-template-default single single-product woocommerce woocommerce-page">


	<div class="body-wrapper theme-clearfix">
		@include('Layouts/head')

		<div class="listings-title">
			<div class="container">
				<div class="wrap-title">
					<h1>{{$goodsDetail[0]->gname}}</h1>
					<div class="bread">
						<div class="breadcrumbs theme-clearfix">
							<div class="container">
								<ul class="breadcrumb">
									<li><a href="#">首页</a><span class="go-page"></span></li>
									<li><a href="group_product.html">商品列表</a><span class="go-page"></span></li>
									<li class="active"><span>{{$goodsDetail[0]->gname}}</span></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="container">
			<div class="row">
				<div id="contents-detail" class="content col-lg-12 col-md-12 col-sm-12" role="main">
					<div id="container">
						<div id="content" role="main">
							<div class="single-product clearfix">
								<div id="product-01" class="product type-product status-publish has-post-thumbnail product_cat-accessories product_brand-global-voices first outofstock featured shipping-taxable purchasable product-type-simple">
									<div class="product_detail row">
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 clear_xs">
											<div class="slider_img_productd">
												<?php $img = $goodsDetail[0]->gpic ?>
												<!-- woocommerce_show_product_images -->
												<div id="product_img_01" class="product-images loading" data-rtl="false">
													<div class="product-images-container clearfix thumbnail-bottom">
														<!-- Image Slider -->
														<div class="slider product-responsive">
															<div class="item-img-slider">
																<div class="images">
																	<a href="{{asset(json_decode($img, true)[3])}}" data-rel="prettyPhoto[product-gallery]" class="zoom">
																		<img width="600" height="600" src="{{asset(json_decode($img, true)[3])}}" class="attachment-shop_single size-shop_single" alt="" srcset="{{asset(json_decode($img, true)[3])}} 600w, {{asset(json_decode($img, true)[0])}} 150w, {{asset(json_decode($img, true)[2])}} 300w, {{asset(json_decode($img, true)[1])}} 180w" sizes="(max-width: 600px) 100vw, 600px">
																	</a>
																</div>
															</div>
															@foreach($goodsImg as $v)
															<div class="item-img-slider">
																<div class="images">
																	<a href="{{asset(json_decode($v->gimg, true)[3])}}" data-rel="prettyPhoto[product-gallery]" class="zoom">
																		<img width="600" height="600" src="{{asset(json_decode($v->gimg, true)[3])}}" class="attachment-shop_single size-shop_single" alt="" srcset="{{asset(json_decode($v->gimg, true)[3])}} 600w, {{asset(json_decode($v->gimg, true)[0])}} 150w, {{asset(json_decode($v->gimg, true)[2])}} 300w, {{asset(json_decode($v->gimg, true)[1])}} 180w" sizes="(max-width: 600px) 100vw, 600px">
																	</a>
																</div>
															</div>
															@endforeach
														</div>
														<!-- Thumbnail Slider -->
														<div class="slider product-responsive-thumbnail" id="product_thumbnail_247">
															<div class="item-thumbnail-product">
																<div class="thumbnail-wrapper">
																	<img width="180" height="180" src="{{asset(json_decode($img, true)[1])}}" class="attachment-shop_thumbnail size-shop_thumbnail" alt="" srcset="{{asset(json_decode($img, true)[1])}} 180w, {{asset(json_decode($img, true)[1])}} 150w, {{asset(json_decode($img, true)[2])}} 300w, {{asset(json_decode($img, true)[3])}} 600w" sizes="(max-width: 180px) 100vw, 180px">
																</div>
															</div>
															@foreach($goodsImg as $v)
															<div class="item-thumbnail-product">
																<div class="thumbnail-wrapper">
																	<img width="180" height="180" src="{{asset(json_decode($v->gimg, true)[1])}}" class="attachment-shop_thumbnail size-shop_thumbnail" alt="" srcset="{{asset(json_decode($v->gimg, true)[1])}} 180w, {{asset(json_decode($v->gimg, true)[1])}} 150w, {{asset(json_decode($v->gimg, true)[2])}} 300w, {{asset(json_decode($v->gimg, true)[3])}} 600w" sizes="(max-width: 180px) 100vw, 180px">
																</div>
															</div>
															@endforeach
														</div>
													</div>
												</div>
											</div>
										</div>

										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 clear_xs">
											<div class="content_product_detail">
												<h1 class="product_title entry-title">{{$goodsDetail[0]->gname}}</h1>

												<div class="reviews-content">
													<div class="star"></div>
													<a href="#reviews" class="woocommerce-review-link" rel="nofollow"><span class="count">0</span> Review(s)</a>
												</div>

												<div>
													<p class="price"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol">$</span>{{$goodsDetail[0]->price}}</span></p>
												</div>

												<div class="product-info clearfix">
													<div class="product-stock pull-left out-stock">
														<span>商品描述</span>
													</div>
												</div>

												<div class="description" itemprop="description">
													<p>{{$detail->gdetail}} {{$goodsDetail[0]->ram}} + {{$goodsDetail[0]->rom}} {{$goodsDetail[0]->color}}</p>
												</div>

												<p class="stock out-of-stock">Out of stock</p>
												<h3 class="title-share">选择</h3>
												<br>
												@foreach($goodsList as $v)
												<a <?php echo $goodsDetail[0]->pid==$v->id?'style="border:1px solid red"':''?> class="btn btn-default" href="{{url('/goods/detail/'.$v->id)}}" role="button">{{$v->gname}}: {{$v->ram}}+{{$v->rom}} {{$v->color}}</a>　<br><br>
												@endforeach
											</div>
											<br>
											<br>
											<div class="quantity buttons_added" style="width:107px;">
													<input type="button" value="-" class="minus">
													<input type="number" step="1" min="1" max="10" name="num" value="1" title="Qty" class="input-text qty text" size="4" pattern="[1-9]*" inputmode="numeric">
													<input type="button" value="+" class="plus">
											</div>
											<br>
											<br>
											@if($goodsDetail[0]->stock != 0)
											<button type="button" onclick="addCollection({{$goodsDetail[0]->pid}})" class="btn btn-danger">　收藏此商品　</button>　
											<button type="button" sub='{{$goodsDetail[0]->pid}}' class="btn btn-success sub">　加入购物车　</button>　
											@else
											<button type="button" onclick="addCollection({{$goodsDetail[0]->pid}})" class="btn btn-danger">　收藏此商品　</button>　
											<button type="button" class="btn btn-success" disabled>商品暂无存货</button>
											@endif
										</div>
									</div>
								</div>

								<div class="tabs clearfix">
									<div class="tabbable">
										<ul class="nav nav-tabs">
											<li class="description_tab active">
												<a href="#tab-description" data-toggle="tab">Description</a>
											</li>

											<li class="reviews_tab ">
												<a href="#tab-reviews" data-toggle="tab">Reviews (0)</a>
											</li>
										</ul>

										<div class="clear"></div>

										<div class=" tab-content">
											<div class="tab-pane active" id="tab-description">
												<h2>Product Description</h2>
												<p>Proident adipisicing laborum beef ribs tri-tip dolore meatball tempor rump flank prosciutto elit do. Duis tenderloin culpa excepteur. Fugiat irure est cupim dolor, ut nulla id andouille chicken spare ribs eiusmod brisket biltong. Eiusmod minim tail cupim labore ad filet mignon, andouille esse enim. Sausage salami dolor ex adipisicing consequat. Ground round nostrud ut fatback voluptate consequat in minim drumstick culpa dolore. Ea beef prosciutto in sirloin fatback enim velit consectetur in pork belly pancetta culpa shank.</p>
												<p>Shank quis in duis, id officia nulla. Pancetta sunt filet mignon porchetta doner turkey occaecat. Meatball corned beef elit ut fugiat. Hamburger biltong tail beef in cupim proident turducken picanha. Sausage chicken incididunt ad occaecat porchetta pancetta corned beef ham hock laborum nisi ullamco pork loin kielbasa aliqua.</p>
												<p>In jerky minim chicken duis ground round nostrud pork belly occaecat pastrami commodo adipisicing tongue doner short loin. Officia est do, filet mignon shank pork loin anim esse quis kevin corned beef enim. Magna sint sirloin ham hock cupidatat laboris. Boudin spare ribs kevin meatloaf id short loin swine flank brisket aute. Reprehenderit turkey qui, boudin swine voluptate ipsum fugiat.</p>
												<p>Salami in ball tip pig eiusmod occaecat pork chop, consequat excepteur incididunt. Ground round picanha ut boudin exercitation jerky meatball strip steak ipsum labore spare ribs turducken ribeye ut aliquip. Id ipsum esse nisi ball tip chuck adipisicing sint culpa t-bone brisket bresaola mollit. Enim eu kevin, tail in nisi nulla sirloin adipisicing veniam dolore.</p>
											</div>

											<div class="tab-pane " id="tab-reviews">
												<div id="reviews">
													<div id="comments">
														<h2>Reviews</h2>
														<p class="woocommerce-noreviews">There are no reviews yet.</p>
													</div>

													<div id="review_form_wrapper">
														<div id="review_form">
															<div id="respond" class="comment-respond">
																<h3 id="reply-title" class="comment-reply-title">
																	Be the first to review "turkey qui"
																	<small><a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Cancel reply</a></small>
																</h3>

																<form action="" method="post" id="commentform" class="comment-form">
																	<p class="comment-form-rating">
																		<label for="rating">Your Rating</label>
																		<select name="rating" id="rating">
																			<option value="">Rate ...</option>
																			<option value="5">Perfect</option>
																			<option value="4">Good</option>
																			<option value="3">Average</option>
																			<option value="2">Not that bad</option>
																			<option value="1">Very Poor</option>
																		</select>
																	</p>

																	<p class="comment-form-comment">
																		<label for="comment">Your Review</label>
																		<textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
																	</p>

																	<p class="form-submit">
																		<input name="submit" type="submit" id="submit" class="submit" value="Submit">
																	</p>
																</form>
															</div>
														</div>
													</div>

													<div class="clear"></div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="bottom-single-product theme-clearfix">
									<div class="widget-1 widget-first widget sw_related_upsell_widget-2 sw_related_upsell_widget" data-scroll-reveal="enter bottom move 20px wait 0.2s">
										<div class="widget-inner">
											<div id="slider_sw_related_upsell_widget-2" class="sw-woo-container-slider related-products responsive-slider clearfix loading" data-lg="4" data-md="3" data-sm="2" data-xs="2" data-mobile="1" data-speed="1000" data-scroll="1" data-interval="5000" data-autoplay="false">
												<div class="resp-slider-container">
													<div class="box-slider-title">
														<h2><span>Related Products</span></h2>
													</div>

													<div class="slider responsive">
														<div class="item ">
															<div class="item-wrap">
																<div class="item-detail">
																	<div class="item-img products-thumb">
																		<a href="simple_product.html">
																			<div class="product-thumb-hover">
																				<img width="300" height="300" src="{{asset('Home/images/1903/49-300x300.jpg')}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="images/1903/49-300x300.jpg 300w, images/1903/49-150x150.jpg 150w, images/1903/49-180x180.jpg 180w, images/1903/49.jpg 600w" sizes="(max-width: 300px) 100vw, 300px">
																			</div>
																		</a>

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

																	<div class="item-content">
																		<!-- rating  -->
																		<div class="reviews-content">
																			<div class="star"></div>
																			<div class="item-number-rating">
																				0 Review(s)
																			</div>
																		</div>
																		<!-- end rating  -->

																		<h4><a href="simple_product.html" title="turkey qui">Turkey Qui</a></h4>

																		<!-- price -->
																		<div class="item-price">
																			<span>
																				<span class="woocommerce-Price-amount amount">
																					<span class="woocommerce-Price-currencySymbol">$</span>300.00
																				</span>
																			</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>

														<div class="item ">
															<div class="item-wrap">
																<div class="item-detail">
																	<div class="item-img products-thumb">
																		<span class="onsale">Sale!</span>
																		<a href="simple_product.html">
																			<div class="product-thumb-hover">
																				<img width="300" height="300" src="{{asset('Home/images/1903/39-300x300.jpg')}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="images/1903/39-300x300.jpg 300w, images/1903/39-150x150.jpg 150w, images/1903/39-180x180.jpg 180w, images/1903/39.jpg 600w" sizes="(max-width: 300px) 100vw, 300px">
																			</div>
																		</a>

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

																	<div class="item-content">
																		<!-- rating  -->
																		<div class="reviews-content">
																			<div class="star"></div>
																			<div class="item-number-rating">
																				0 Review(s)
																			</div>
																		</div>
																		<!-- end rating  -->

																		<h4><a href="simple_product.html" title="iPad Mini 2 Retina">iPad Mini 2 Retina</a></h4>

																		<!-- price -->
																		<div class="item-price">
																			<span>
																				<del>
																					<span class="woocommerce-Price-amount amount">
																						<span class="woocommerce-Price-currencySymbol">$</span>300.00
																					</span>
																				</del>

																				<ins>
																					<span class="woocommerce-Price-amount amount">
																						<span class="woocommerce-Price-currencySymbol">$</span>290.00
																					</span>
																				</ins>
																			</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>

														<div class="item ">
															<div class="item-wrap">
																<div class="item-detail">
																	<div class="item-img products-thumb">
																		<a href="simple_product.html">
																			<div class="product-thumb-hover">
																				<img width="300" height="300" src="{{asset('Home/images/1903/22-300x300.jpg')}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="images/1903/22-300x300.jpg 300w, images/1903/22-150x150.jpg 150w, images/1903/22-180x180.jpg 180w, images/1903/22.jpg 600w" sizes="(max-width: 300px) 100vw, 300px">
																			</div>
																		</a>

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

																	<div class="item-content">
																		<!-- rating  -->
																		<div class="reviews-content">
																			<div class="star"></div>
																			<div class="item-number-rating">
																				0 Review(s)
																			</div>
																		</div>
																		<!-- end rating  -->

																		<h4><a href="simple_product.html" title="Philips HR2195">Philips HR2195</a></h4>

																		<!-- price -->
																		<div class="item-price">
																			<span>
																				<span class="woocommerce-Price-amount amount">
																					<span class="woocommerce-Price-currencySymbol">$</span>200.00
																				</span>
																			</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>

														<div class="item ">
															<div class="item-wrap">
																<div class="item-detail">
																	<div class="item-img products-thumb">
																		<a href="simple_product.html">
																			<div class="product-thumb-hover">
																				<img width="300" height="300" src="{{asset('Home/images/1903/14-300x300.jpg')}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="images/1903/14-300x300.jpg 300w, images/1903/14-150x150.jpg 150w, images/1903/14-180x180.jpg 180w, images/1903/14.jpg 600w" sizes="(max-width: 300px) 100vw, 300px">
																			</div>
																		</a>

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

																	<div class="item-content">
																		<!-- rating  -->
																		<div class="reviews-content">
																			<div class="star"></div>
																			<div class="item-number-rating">
																				0 Review(s)
																			</div>
																		</div>
																		<!-- end rating  -->

																		<h4><a href="simple_product.html" title="sony xperia s">sony xperia s</a></h4>

																		<!-- price -->
																		<div class="item-price">
																			<span>
																				<span class="woocommerce-Price-amount amount">
																					<span class="woocommerce-Price-currencySymbol">$</span>300.00
																				</span>
																			</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>

														<div class="item ">
															<div class="item-wrap">
																<div class="item-detail">
																	<div class="item-img products-thumb">
																		<a href="simple_product.html">
																			<div class="product-thumb-hover">
																				<img width="300" height="300" src="{{asset('Home/images/1903/58-300x300.jpg')}}" class="attachment-shop_catalog size-shop_catalog wp-post-image" alt="" srcset="images/1903/58-300x300.jpg 300w, images/1903/58-150x150.jpg 150w, images/1903/58-180x180.jpg 180w, images/1903/58.jpg 600w" sizes="(max-width: 300px) 100vw, 300px">
																			</div>
																		</a>

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

																	<div class="item-content">
																		<!-- rating  -->
																			<div class="reviews-content">
																			<div class="star"></div>
																			<div class="item-number-rating">
																				0 Review(s)
																			</div>
																		</div>
																		<!-- end rating  -->

																		<h4><a href="simple_product.html" title="nikon d7000">nikon d7000</a></h4>

																		<!-- price -->
																		<div class="item-price">
																			<span>
																				<span class="woocommerce-Price-amount amount">
																					<span class="woocommerce-Price-currencySymbol">$</span>300.00
																				</span>
																			</span>
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

									<div class="widget-2 widget-last widget sw_related_upsell_widget-3 sw_related_upsell_widget" data-scroll-reveal="enter bottom move 20px wait 0.2s">
										<div class="widget-inner"></div>
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
			var wc_single_product_params = {"i18n_required_rating_text":"Please select a rating","review_rating_required":"yes"};
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
	<script type="text/javascript" src="{{asset('Home/js/woocommerce/single-product.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/woocommerce/prettyPhoto/jquery.prettyPhoto.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/woocommerce/prettyPhoto/jquery.prettyPhoto.init.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('Home/js/plugins.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/megamenu.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/main.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('Home/js/wc-quantity-increment.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/woocommerce/cart.min.js')}}"></script>

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
