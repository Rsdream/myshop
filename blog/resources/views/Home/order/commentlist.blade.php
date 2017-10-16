<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>发表评论</title>
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

		<link href="{{asset('/Ui/AmazeUI-2.4.2/assets/css/admin.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('/Ui/AmazeUI-2.4.2/assets/css/amazeui.css')}}" rel="stylesheet" type="text/css">

		<link href="{{asset('/Ui/css/personal.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('/Ui/css/appstyle.css')}}" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="{{asset('/Ui/js/jquery-1.7.2.min.js')}}"></script>
	</head>

	<body>
		<!--头 -->
			@include('Layouts/head')
		<div class="center" >
			<div class="col-main" >
				<div >
@if (session('commentlist'))
    <center>
    <div class="alert alert-success" style="width: 100px">
        <span style="text-align: center;">{{ session('commentlist') }}</span>
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
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">发表评论</strong> / <small>Make&nbsp;Comments</small></div>
						</div>
						<hr/>

						<div class="comment-main" >
						<!--多个商品评论-->
						    @if (!empty($data))
						    @foreach ($data as $v)
						    <form action="{{url('order/comment')}}" method="post" onSubmit="return check(this)" >
						    {{ csrf_field() }}
						    <input type="hidden" name="gid" value="{{$v->id}}">
						    <input type="hidden" name="id" value="{{$v->gid}}">
								<input type="hidden" name="oid" value="{{$v->oid}}">
							<div class="comment-list">
								<div class="item-pic">
									<a href="" class="J_MakePoint">
										<img style="width:148px;height: 148px" src="{{asset('/').json_decode($v->gpic, true)[0]}}" class="itempic">
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
											价格：<strong>{{$v->gprice}}</strong>
										</div>
									</div>
								</div>
								<div class="clear"></div>
								<div class="item-comment">
									<textarea placeholder="请写下对宝贝的感受吧，对他人帮助很大哦！" name="comment" class="comment{{$v->id}}" id="text"></textarea>
								</div>

							</div>
							<div class="info-btn">
								<button type="submit"><div class="am-btn am-btn-danger" >发表评论</div></button>
							</div>
							</form>
							@endforeach
							@else
							<div>
							    <center>
							        <h2>暂无可评论订单</h2><a style="color:red" href="{{url('order/showComment')}}">查看我的评论</a>
							    </center>
							    
							</div>
							@endif
					<script type="text/javascript">
						$(document).ready(function() {
							$(".comment-list .item-opinion li").click(function() {
								$(this).prevAll().children('i').removeClass("active");
								$(this).nextAll().children('i').removeClass("active");
								$(this).children('i').addClass("active");

							});
				     })
					</script>



						</div>

					</div>

				</div>
				<!--底部-->
                @include('Layouts/footer')
			</div>

		</div>
	<script type="text/javascript" src="{{asset('/layer/layer.js')}}"></script>
	<script type="text/javascript">
	    var text = false;
	    function check(obj){
	    	var key = $(obj).children().first().next().val();
	    	var text = $('#text').parent().children().val();
	    	if (!text) {
	    		layer.alert('评论内容不能为空！');
	    		return false;
	    	}else {
	    		return true;
	    	}
	    }

	</script>

	</body>

</html>
