<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>我的收藏</title>

		<link href="{{asset('/Ui/AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('/Ui/AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('/Ui/css/colstyle.css')}}" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="{{asset('/Home/css/font-awesome.min.css')}}">

		<!-- BOOTSTRAP 3.3.7 CSS -->
		<link rel="stylesheet" href="{{asset('/Home/css/bootstrap.min.css')}}" />

		<!-- SLICK v1.6.0 CSS -->
		<link rel="stylesheet" href="{{asset('/Home/css/slick-1.6.0/slick.css')}}" />

		<link rel="stylesheet" href="{{asset('/Home/css/jquery.fancybox.css')}}" />
		<link rel="stylesheet" href="{{asset('/Home/css/yith-woocommerce-compare/colorbox.css')}}" />
		<link rel="stylesheet" href="{{asset('/Home/css/owl-carousel/owl.carousel.min.css')}}" />
		<link rel="stylesheet" href="{{asset('/Home/css/owl-carousel/owl.theme.default.min.css')}}" />
		<link rel="stylesheet" href="{{asset('/Home/css/js_composer/js_composer.min.css')}}" />
		<link rel="stylesheet" href="{{asset('/Home/css/woocommerce/woocommerce.css')}}" />
		<link rel="stylesheet" href="{{asset('/Home/css/yith-woocommerce-wishlist/style.css')}}" />


		<link rel="stylesheet" href="{{asset('/Home/css/custom.css')}}" />
		<link rel="stylesheet" href="{{asset('/Home/css/app-orange.css')}}" id="theme_color" />
		<link rel="stylesheet" href="" id="rtl" />
		<link rel="stylesheet" href="{{asset('/Home/css/app-responsive.css')}}" />

	</head>

	<body class="page woocommerce-account woocommerce-page woocommerce-edit-address">
		<div class="body-wrapper theme-clearfix">
			@include('Layouts/head')

			<div class="listings-title">
				<div class="container">
					<div class="wrap-title">
						<h1>我的收藏</h1>
						<div class="bread">
							<div class="breadcrumbs theme-clearfix">
								<div class="container">
									<ul class="breadcrumb">
										<li>
											<a href="{{url('/')}}">首页</a>
											<span class="go-page"></span>
										</li>

										<li class="active">
											<span>收藏列表</span>
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
										<h2 class="entry-title">收藏列表</h2>
									</header>

									<div class="entry-content">
										<div class="woocommerce">
											@include('Layouts/left')

											<div class="woocommerce-MyAccount-content">
												<div class="left">
													<div class="col-main">

															<div class="user-collection">

																<div class="you-like">
																	<div class="s-bar">
																		我的收藏

																	</div>
																</div>
																<div class="s-content">

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
					</div>
				</div>
			</div>

			@include('Layouts/footer')
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
			function show() {
		        $.ajax({
			   	    type: 'post',
			   	    url : '{{url("/collection/show")}}',
			   	    data: '_token={{csrf_token()}}',
			   	    success:function(data) {
			   	    	var str = '';
			   	    	var url = "{{url('/')}}";
			   	    	for (var i =0; i < data.length; i++) {
									var span = '';
									if (data[i].stock == 0) {
										span = '<span class="tip-title">商品暂无存货</span>';
									}
									if (data[i].status == 0) {
										span = '<span class="tip-title">商品已下架</span>';
									}
							 str +=	`<div class="s-item-wrap">
										<div class="s-item">

											<div class="s-pic" style="width: 186px;height: 186px">
												<a href="{{url('goods/detail')}}`+'/'+data[i].gid+`" class="s-pic-link">
													<img style="width: 186px;height: 186px" src="`+url+'/'+data[i].gpic[3]+`" >
												`+span+`
												</a>
											</div>
											<div class="s-info">
												<div class="s-title"><a href="{{url('goods/detail')}}`+'/'+data[i].gid+`" title="`+data[i].gname+`">`+data[i].gname+`</a></div>
												<div class="s-price-box">
													<span class="s-price"><em class="s-price-sign">¥</em><em class="s-value">`+data[i].price+`</em></span>
												</div>
												<div class="s-extra-box">
													<span class="s-comment">好评: 99.93%</span>
													<span class="s-sales">月销: `+data[i].workoff+`</span>
												</div>
											</div>
											<div class="s-tp">
												<span onClick='addcart(`+data[i].gid+`)' class="ui-btn-loading-before">加入购物车</span>
												<i class="am-icon-trash"></i>
												<span class="ui-btn-loading-before buy" onClick="cancel(id=`+data[i].gid+`, this)">取消收藏</span>
												<p>
													<a href="javascript:;" class="c-nodo J_delFav_btn"></a>
												</p>
											</div>
										</div>
									</div>`;
									$('.s-content').html(str);
						}

			   	    },
			   	    dataType: 'json',
			   });
			}
			show();
		</script>

		<script type="text/javascript">
		//取消收藏
		function cancel(id, obj) {
		    $.ajax({
		    	type : 'get',
		    	data : 'id='+id+'&_token={{csrf_token()}}',
		    	url  : '{{url("collection/add")}}',
		    	success:function(data) {
		    		console.log(data);
		    	},
		    	dataType: 'json',
		    });
		    $(obj).parent().parent().parent().remove();
		}
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
		 @include('Layouts/addcart')


</html>
