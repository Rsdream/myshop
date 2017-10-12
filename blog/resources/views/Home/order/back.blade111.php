<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
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
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>退换货管理</title>

		<link href="{{asset('/Ui/AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('/Ui/AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css">

		<link href="{{asset('/Ui/css/personal.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('/Ui/css/orstyle.css')}}" rel="stylesheet" type="text/css">

		<script src="{{asset('/Ui/AmazeUI-2.4.2/assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('/Ui/AmazeUI-2.4.2/assets/js/amazeui.js')}}"></script>

	</head>

	<body>
		<!--头 -->
		@include('Layouts/head')
			<b class="line"></b>


						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">退换货管理</strong> / <small>Change</small></div>
						</div>
						<hr/>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

							<ul class="am-avg-sm-2 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">退款管理</a></li>


							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-orderprice th-price">
											<td class="td-inner">交易金额</td>
										</div>
										<div class="th th-changeprice th-price">
											<td class="td-inner">退款金额</td>
										</div>
										<div class="th th-status th-moneystatus">
											<td class="td-inner">交易状态</td>
										</div>
										<div class="th th-change th-changebuttom">
											<td class="td-inner">交易操作</td>
										</div>
									</div>

									@foreach ($data as $v)
									<div class="order-main">
										<div class="order-list">
											<div class="order-title">
												<div class="dd-num">退款编号：<a href="javascript:;">{{$v->number}}</a></div>
												<span>申请时间：{{date('Y-m-d', $v->addtime)}}</span>
												<!--    <em>店铺：小桔灯</em>-->
											</div>
											<div class="order-content">
												<div class="order-left">
													<ul class="item-list">
														<li class="td td-item">
															<div class="item-pic">
																<a href="#" class="J_MakePoint">
																	<img src="{{url('/').'/'.json_decode($val->gpic, true)[0]}}" class="itempic J_ItemImg">
																</a>
															</div>
															<div class="item-info">
																<div class="item-basic-info">
																	<a href="#">
																		<p>{{$v->gname}}</p>
																		<p class="info-little">{{$v->setmeal}}</p>
																	</a>
																</div>
															</div>
														</li>

														<ul class="td-changeorder">
															<li class="td td-orderprice">
																<div class="item-orderprice">
																	<span>交易金额：</span>{{$v->gprice*$v->gnum}}
																</div>
															</li>
															<li class="td td-changeprice">
																<div class="item-changeprice">
																	<span>退款金额：</span>{{$v->gprice*$v->gnum}}
																</div>
															</li>
														</ul>
														<div class="clear"></div>
													</ul>

													<div class="change move-right">
														<li class="td td-moneystatus td-status">
															<div class="item-status">
															    <?php if($v->status == 0) { ?>
																<p class="Mystatus">退款中</p>
																<?php } else if ($v->status == 1) {  ?>
																<p class="Mystatus">同意退款</p>
																<?php } else if ($v->status == 2) { ?>
																<p class="Mystatus">驳回退款</p>
																<?php } else {?>
																<p class="Mystatus">退款关闭</p>
																<?php } ?>
															</div>
														</li>
													</div>
													<li class="td td-change td-changebutton">
														<a href="javascript:;">
														@if ($v->status == 1 || $v->status == 2 || $v->status == 3)
														<div class="am-btn am-btn-danger anniu">退款完成</div>
														@else
														<div class="am-btn am-btn-danger anniu" onClick="drawback({{$v->id}}, this)">取消退款</div>
														@endif
														</a>
													</li>

												</div>
											</div>
										</div>

									</div>
									@endforeach

								</div>


							</div>

						</div>
					</div>


				<!--底部-->

		    @include('Layouts/footer')
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
		<script src="{{asset('/layer/layer.js')}}"></script>
		<script type="text/javascript">
		    function drawback(id, obj) {
		    	var status =3;
		    	$.ajax({
		    		type : 'post',
		    		url  : '{{url("/order/drawBack")}}',
		    		data : 'id='+id+'&status='+status+'&_token={{csrf_token()}}',
				    beforeSend:function(){
		                index = layer.load(3);
		            },
		    		success:function(data) {console.log(data);
		    			if (data == 3) {
		    				layer.close(index);
		    				layer.alert('取消退款成功', {icon: 1});
		    				$(obj).parent().parent().prev().children().children().html('<span style="position:relative;top:30px;color:#EA4846">退款关闭</span>');
		    				$(obj).html('订单完成');
		    			} else if (data == 1){
		    				layer.close(index);
		    				layer.alert('店家已同意退款', {icon: 1});
		    				$(obj).parent().parent().prev().children().children().html('<span style="position:relative;top:30px;color:#EA4846">同意退款</span>');
		    				$(obj).html('订单完成');
		    			} else if (data == 2) {
		    				layer.close(index);
		    				layer.alert('店家已驳回退款', {icon: 2});
		    				$(obj).parent().parent().prev().children().children().html('<span style="position:relative;top:30px;color:#EA4846">驳回退款</span>');
		    				$(obj).html('订单完成');
		    			} else if (data ==4) {
		    				layer.close(index);
		    				layeralert('退款失败', {icon: 2});
		    			}
		    		},
		    		dataType : 'json',
		    	});
		    }
		</script>

	</body>

</html>
