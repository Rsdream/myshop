<!DOCTYPE html>
<html lang="en">
<head>
	<title>订单详情</title>
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


	<link href="{{asset('/Ui/basic/css/mydemo.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('/Ui/css/cartstyle.css')}}" rel="stylesheet" type="text/css" />

	<link href="{{asset('/Ui/css/jsstyle.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('/Ui/jq/css/style.css')}}" rel="stylesheet" type="text/css" />

	<script type="text/javascript" src="{{asset('/Ui/js/address.js')}}"></script>
	<script type="text/javascript" src="{{asset('/Ui/jq/jq.js')}}"></script>
	<script type="text/javascript" src="{{asset('/Ui/jq/js/ui.js')}}"></script>

		<link href="{{asset('/Ui/AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('/Ui/AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css">

		<link href="{{asset('/Ui/css/personal.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('/Ui/css/orstyle.css')}}" rel="stylesheet" type="text/css">

		<script src="{{asset('/Ui/AmazeUI-2.4.2/assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('/Ui/AmazeUI-2.4.2/assets/js/amazeui.js')}}"></script>

</head>

<body class="page woocommerce-cart woocommerce-page">

		@include('Layouts/head')

	<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">订单管理</strong> / <small>Order</small></div>
						</div>
						<hr/>

						<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">
									<div class="order-top">
										<div class="th th-item">
											<td class="td-inner">商品</td>
										</div>
										<div class="th th-price">
											<td class="td-inner">单价</td>
										</div>
										<div class="th th-number">
											<td class="td-inner">数量</td>
										</div>
										<div class="th th-operation">
											<td class="td-inner">合计</td>
										</div>
										<div class="th th-amount">
											<td class="td-inner">商品操作</td>
										</div>

									</div>

									<div class="order-main">
										<div class="order-list">

											@if (!empty($data))
											@foreach ($data as $v)
											<?php $sum=10 ?>
											<!--交易成功-->
											<div class="order-status5">
												<div class="order-title">
													<div class="dd-num">订单编号：<a href="javascript:;">{{$v->number}}</a></div>
													<span>成交时间：{{date('Y-m-d H:i', $v->addtime)}}</span>
													<!--    <em>店铺：小桔灯</em>-->
												</div>
												<div class="order-content">
													<div class="order-left">
														@foreach($v->orderDetail as $val)
														@php
																$sum += $val->gprice*$val->gnum
														@endphp
														<ul class="item-list">
															<li class="td td-item">
																<div class="item-pic">
																	<a href="{{url('goods/detail/'.$val->gid)}}" class="J_MakePoint">
																		<img src="{{url('/').'/'.json_decode($val->gpic, true)[0]}}" class="itempic J_ItemImg">
																	</a>
																</div>
																<div class="item-info">
																	<div class="item-basic-info">
																		<a href="{{url('goods/detail/'.$val->gid)}}">
																			<p>{{$val->gname}}</p>
																			<p class="info-little">配置：{{$val->ram}} + {{$val->rom}} + {{$val->color}}
																			</p>
																		</a>
																	</div>
																</div>
															</li>
															<li class="td td-price">
																<div class="item-price">
																	{{$val->gprice}}
																</div>
															</li>
															<li class="td td-number">
																<div class="item-number">
																	<span>×</span>{{$val->gnum}}
																</div>
															</li>
															<li class="td td-operation">
																<div class="item-operation">

																</div>
															</li>
														</ul>
														@endforeach
													</div>
													<div class="order-right">
														<li class="td td-amount" style="margin-top:-10px;">
															<div class="item-amount" >

																合计：{{$v->tprice}}
																<p><span>
																	@if($v->oscore != 0 )
																		积分抵现：{{$v->oscore}}元
																	@endif
																</span>
																</p>
																<p>含运费：<span>10.00</span></p>
															</div>
														</li>
														<div class="move-right">
															<li class="td td-status">
																<div class="item-status">
																	<p class="Mystatus">交易状态</p>
																	<?php if ($v->status == 3) { ?>
																	<p class="order-info"><a href="javascript:;">交易完成</a></p>
																	<?php } else {?>
																	<p class="order-info"><a href="javascript:;">交易中</a></p>
																	<?php } ?>
																	<p class="order-info"><a href='{{url("/order/backlist?id=$v->number")}}'>申请退款</a></p>
																</div>
															</li>
															<?php $arr=[0=>'等待发货', 1=>'确认收货', 2=>'等待评价', 3=>'删除订单'] ?>
															<li class="td td-change">
															    <?php if($v->status == 2) { ?>

																<div class="am-btn am-btn-danger anniu change" onClick="change(id={{$v->id}}, this)"><a href='{{url("/order/commentlist/?number=$v->number")}}'><span style="color:white;">{{$arr[$v->status]}}</span></a></div>
																<?php } else if($v->status ==3){ ?>
																<div class="am-btn am-btn-danger anniu change" onClick="del({{$v->number}})"><a href='javascript:;'><span style="color:white;">{{$arr[$v->status]}}</span></a></div>

																<?php } else { ?>
																<div class="am-btn am-btn-danger anniu change" onClick="change(id={{$v->id}}, this, num={{$v->number}})">{{$arr[$v->status]}}</div>
																<?php } ?>
															</li>
														</div>
													</div>
												</div>
											</div>
											@endforeach
											@else
											<div style="margin-top:100px">
												<center><h2 style="font-size:20px">暂无订单信息</h2></center>
											</div>
											@endif
											<div style="float:right;">
												{{$data->links()}}
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

</div>


	<script type="text/javascript" src="{{asset('Home/js/jquery/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/jquery/jquery-migrate.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('Home/js/jquery/js.cookie.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('/layer/layer.js')}}"></script>

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
	<script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>

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

    //订单状态修改
    function change(id, obj, num) {
    	var status = $(obj).html();
    	var url = '{{url("/")}}';
    	$.ajax({
    		type : 'post',
    		url  : '{{url("order/change")}}',
    		data : 'id='+id+'&status='+status+'&_token={{csrf_token()}}',
    		success:function(data) {
    			if (data == '0') {
    				$(obj).html('等待发货');
    				layer.alert('亲，请耐心等待！', {icon: 6});
    			} else if (data == '1') {
    				$(obj).html('确认收货');
    				layer.alert('亲！已发货，请确认收货', {icon: 1});
    			} else if (data == '2') {
    				$(obj).parent().html("<div class='am-btn am-btn-danger anniu change'><a href='"+url+"/order/commentlist/?number="+num+"'><span style='color:white;'>等待评价</span></a></div>");
    				layer.alert('亲！收货成功', {icon: 1});
    			} else if (data == '3') {
	    			layer.alert(data, {icon: 1});
	    			$(obj).html(data);    				
    			}
    		},
    		dataType : 'json',
    	})
    }

    //删除订单
    function del(num) {
    	$.ajax({
    		type : 'post',
    		url  : '{{url("order/del")}}',
    		data : 'number='+num+'&_token={{csrf_token()}}',
    		beforeSend:function(){
                index = layer.load(3);;//显示加载动画
            },
    		success:function(data) {
    			layer.close(index);
    			window.location.reload();
    			layer.alert('删除成功！', {icon: 1});
    		},
    		dataType : 'json',
    	})
    }
   </script>
   </body>
</html>
