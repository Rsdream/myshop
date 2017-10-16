<!DOCTYPE html>
<html lang="en">
<head>
	<title>提交订单</title>
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
        @include('Layouts/head')
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

				<form method="post" action="{{url('order/add')}}" id="add">
                {{ csrf_field() }}
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
								<input type="hidden" name="like[]" value="{{$v['id']}}">
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
														<span class="sku-line">配置:{{$v['setmeal']}}</span>
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
							<div class="order-extra" style="float:right;">
								<div class="order-user-info">
									<div id="holyshit257" class="memo" style="float:right;">
										积分说明：只能使<br>
										用100倍数的积分<br>
										你有：<label>{{$score}}</label>积分<br>
										<label id="score"></label>
										<input type="checkbox" name="score" value='1'>
									</div>
								</div>

							</div>

							<div class="clear"></div>
							</div>

							@foreach ($address as $v)
							 <input type="hidden" name="address" value="{{$v['pro']}}{{$v['city']}}{{$v['area']}}{{$v['comment']}}">
							 <input type="hidden" name="uphone" value="{{$v['phone']}}">
							 <input type="hidden" name="uname" value="{{$v['name']}}">
							@endforeach

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
								               <span class="province myprovince">@foreach ($address as $v){{$v['pro']}}@endforeach</span>

												<span class="city mycity">@foreach ($address as $v){{$v['city']}}@endforeach</span>
												<span class="dist mydist">@foreach ($address as $v){{$v['area']}}@endforeach</span>
												<span class="street mystreet">@foreach ($address as $v){{$v['comment']}}@endforeach</span>
												</span>
												</span>
											</p>
											<p class="buy-footer-address">
												<span class="buy-line-title">收货人：</span>

												<span class="buy-address-detail">

		                    <span class="buy-user mybuy-user">@foreach ($address as $v){{$v['name']}}@endforeach</span>

												<span class="buy-phone mybuy-phone">@foreach ($address as $v){{$v['phone']}}@endforeach</span>
												</span>
											</p>
										</div>
									 <input type="hidden" name="myaddress" value="@foreach ($address as $v){{$v['pro']}}{{$v['city']}}{{$v['area']}}{{$v['comment']}}@endforeach">
									<input type="hidden" name="myphone" value="@foreach ($address as $v){{$v['phone']}}@endforeach">
									<input type="hidden" name="myname" value="@foreach ($address as $v){{$v['name']}}@endforeach">

									</div>

									<div id="holyshit269" class="submitOrder">
										<div class="go-btn-wrap">
										<div class="button">
										    <button type="submit" class="btn btn-warning" style="font-size: 18px">提交订单</butto>
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

			</form>
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
					<form class="am-form am-form-horizontal" id="address" action="{{url('/address/add')}}" method="post">
					    {{csrf_field()}}
					    <input type="hidden" id="test" name="id" >
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
								<textarea class="" rows="3" id="user-comment" name="address" placeholder="输入详细地址" required=""></textarea>
								<small>100字以内写出你的详细地址...</small>
							</div>
						</div>

						<div class="am-form-group theme-poptit">
							<div class="am-u-sm-9 am-u-sm-push-3">
								<button style="background: white;border:hidden;position: relative;top: 5px" type="submit"><div class="am-btn am-btn-danger" id="save">保存</div></button>
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

		@include('Layouts/footer')
	</div>
	<script type="text/javascript">

	</script>
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
	<script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
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
    //清除地址编辑时留下的缓存
    $('.tc-btn').click(function () {
		$('#user-name').val('');
		$('#user-phone').val('');
		$('#user-comment').val('');
		$('#pro').val(-1);
		$('#city').val(-1);
		$('#area').val(-1);
		$('#test').val('');
    })
    //提交时验证
    $('#add').submit(function () {
	    $('.theme-popover-mask').css('display', 'none');
	    $('.theme-popover').css('display', 'none');
	    $('body').css('overflow', 'visible');
	    $('.theme-popover').css('overflow', 'visible');
        return true;
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
			type : 'post',
			url  : '{{url("/address/select")}}',
			data : 'upid='+currentId+'&_token={{csrf_token()}}',
			success: function (msg) {
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
					if (data[i].status == 0) { //选择默认时样式
						var d = 'user-addresslist';
						var span = 'display:block';
					} else {
						var span = 'display:none';

					}
					if (data[i].status == 1) { //清除样式
						var d = 'user-addresslist defaultAddr';
						var box = 'display:black';
					} else {
						var box = 'display:none';
					}
					str += `<div class="per-border"></div>
							<li class="`+d+` mybox">

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

									<ins class="deftip" style="`+box+`">默认地址</ins>

								</div>
								<div class="address-right">
									<a href="{">
										<span class="am-icon-angle-right am-icon-lg"></span></a>
								</div>
								<div class="clear"></div>

								<div class="new-addr-btn" atr="`+data[i].id+`">

									<a href="javascript:;" onclick="change(this, id=`+data[i].id+`)" class="default" style="`+span+`">设为默认</a>
									<span class="new-addr-bar hidden">|</span>
									<a href="javascript:;" onclick="update(this, id=`+data[i].id+`);">编辑</a>
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

	//调用地址，地址展示
	show();
    showChange();

	//删除地址
	function del(obj) {
		var id = $(obj).parent().attr('atr');
		$.ajax({
			type : 'post',
			data : 'id='+id+'&_token={{csrf_token()}}',
			url  : '{{url("/address/del")}}',
			success:function(data) {
				show();
				showChange();
			},
			dataType:'json',
		})
		$(obj).parent().parent().remove();
	}

	//编辑地址
	function update(obj, id) {
	    $('.theme-popover-mask').css('display', 'block');
	    $('.theme-popover').css('display', 'block');
	    $('body').css('overflow', 'visible');
	    $('.theme-popover').css('overflow', 'visible');
		$.ajax({
			type : 'post',
			data : 'id='+id+'&_token={{csrf_token()}}',
			url  : '{{url("address/update")}}',
			success:function(data) {
				$('#user-name').val(data.name);
				$('#user-phone').val(data.phone);
				$('#user-comment').val(data.comment);
				$('#pro').val(data.pro);
				$('#city').val(data.city);
				$('#area').val(data.area);
				$('#test').val(data.id);
				showChange();
			},
			dataType: 'json',
		})

	}

	function change(obj, id) {
		$('.default').css('display', 'block');
		$('.deftip').css('display', 'none');
		$('.mybox').removeClass('user-addresslist defaultAddr');
		$('.mybox').addClass('user-addresslist');
		$(obj).css('display', 'none');
		$(obj).parent().parent().children().children('ins').css('display', 'block');
		$.ajax({
			type : 'post',
			data : 'id='+id+'&_token={{csrf_token()}}',
			url  : '{{url("address/change")}}',
			success:function(data) {
				//刷新
				showChange();
				show();
			},
			dataType: 'json',
		})
	}

	//提交订单时默认地址
	function showChange() {
		$.ajax({
			type : 'post',
			data : '_token={{csrf_token()}}',
			url  : '{{url("address/showChange")}}',
			success:function(data) {
				if (data != 'no') {
					$('.myprovince').html(data[0].pro);
					$('.mycity').html(data[0].pro);
					$('.mydist').html(data[0].area);
					$('.mystreet').html(data[0].comment);
					$('.mybuy-user').html(data[0].name);
					$('.mybuy-phone').html(data[0].phone);
					$('input[name="myname"]').val(data[0].name);
					$('input[name="myphone"]').val(data[0].phone);
					$('input[name="myaddress"]').val(data[0].pro+data[0].pro+data[0].area);
				} else {
					$('.myprovince').html('');
					$('.mycity').html('');
					$('.mydist').html('');
					$('.mystreet').html('');
					$('.mybuy-user').html('');
					$('.mybuy-phone').html('');
				}
			},
			dataType: 'json',
		})
	}


	//提交订单
	$('#add').submit(function () {
		//判断是否选择的地址
		var pro = $('.myprovince').html();
		if(pro == '' || pro == 'undefind') {
			layer.alert('请选择地址！');
			return false;
		} else {
			return true;
		}
	})
   </script>
	 <script type="text/javascript">
	 	var num = $('#J_ActualFee').html();
	 </script>
	 <script type="text/javascript">
	 	function s() {
			var sum = parseInt({{$score}} / 100) * 100;
			var money = $('#J_ActualFee').html()
			if (sum / 100 > money) {
				$('#score').html('使用' + money * 100 + '积分抵现' + money + '元')
			} else {
				$('#score').html('使用' + sum + '积分抵现' + parseInt({{$score}} / 100) + '元')
			}
		}
		s();
	 	$('input[name="score"]').on('click', function () {
			var score = parseInt({{$score}} / 100)
			if ($("input[name='score']").is(':checked')) {
				if (score > $('#J_ActualFee').html()) {
					$('#J_ActualFee').html('0');
				} else {
					$('#J_ActualFee').html($('#J_ActualFee').html() - score)
				}
			} else {
			  $('#J_ActualFee').html(num)
			}
		})

	//提交地址时验证
	$('#address').submit(function () {
		var pro = $("#pro").val();
		var city = $('#city').val();
		var area = $('#area').val();
		if (pro == '-1') {
			layer.msg('省份不能为空')
			return false;
		} else if (city == '-1') {
			layer.msg('城市不能为空')
			return false;
		} else if (area == '-1') {
			layer.msg('区/县不能为空')
			return false;		
		} else {
			return true;
		}
	});
	 </script>
   </body>
</html>
