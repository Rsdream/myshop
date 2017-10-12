<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />
  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />
	<style type="text/css">
	    span{font-size: 5px;color: #989898}
	    #spna{font-size:5px;color:red;}
	    .red{color:red;}
	    #forget a:hover{color:orange;}
	</style>



	<!-- Animate.css -->
	<link rel="stylesheet" href="{{asset('/Home/login/css/animate.css')}}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{asset('/Home/login/css/icomoon.css')}}">
	<!-- Themify Icons-->
	<link rel="stylesheet" href="{{asset('/Home/login/css/themify-icons.css')}}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{asset('/Home/login/css/bootstrap.css')}}">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{asset('/Home/login/css/magnific-popup.css')}}">

	<!--Public-->
	<link rel="stylesheet" href="{{asset('/Home/login/Public/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('/Home/login/Public/js/bootstrap.min.js')}}">
	<link rel="stylesheet" href="{{asset('/Home/login/Public/js/jq.js')}}">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{asset('/Home/login/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('/Home/login/css/owl.theme.default.min.css')}}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{asset('/Home/login/css/style.css')}}">

	<!-- Modernizr JS -->
	<script src="{{asset('/Home/login/js/modernizr-2.6.2.min.js')}}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	<div id="page">

	<div class="page-inner" style="">
	<nav class="gtco-nav" role="navigation"  >
		<div class="gtco-container" >

			<div class="row" style="position:absolute; z-index:1">

					<div id="gtco-logo"><a href="{{url('')}}">商 城 首 页 <em>.</em></a></div>

			</div>

		</div>
	</nav>
	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image: url('{{asset('/Home/login/images/img_4.jpg')}}');">

    <!--判断用户名，手机号不存在，密码错误返回值，在页面显示错误提示-->
    @if(!empty(session('erro')))
        <div class="alert alert-danger alter-register-tip" style="position: relative;z-index: 2;width: 100%;height: 50px;text-align: center">
            {{session('erro')}}</div>
    @endif

    <!--登录注册成功提示-->
    @if(!empty(session('success')))
        <div class="alert alert-success alter-register-tip" style="position: relative;z-index: 2;width: 100%;height: 50px;text-align:center">
        {{session('success')}}</div>
            <script type="text/javascript">
                    setTimeout(function () {
        	            $('.alter-register-tip').remove();
        	            window.location.replace("{{url('/')}}");
                    },3000);
            </script>
    @endif

    <!--表单验证-->
    @if ($errors->any())
        <div class="alert alert-danger" style="position: relative;z-index: 2;width: 100%;height: auto;text-align:center">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <script type="text/javascript">
        //提交后返回错误值提示，定时器3秒后清除
        setTimeout(function () {
        	$('.alert-danger').remove();
        },5000);
    </script>
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">


					<div class="row row-mt-15em" >
						<div class="col-md-5 mt-text animate-box " data-animate-effect="fadeInUp" >
							<span class="intro-text-small">Welcome to Splash</span>
							<h1>Build website using this template.</h1>
						</div>
						<div class="col-md-5  animate-box col-md-offset-2" data-animate-effect="fadeInRight" >
							<div class="form-wrap" >
								<div class="tab">
									<ul class="tab-menu">
										<li class="active " style="width:100%"><a href="#" data-tab="signup">修改密码</a></li>
									</ul>
									<div class="tab-content form-horizontal" >
										<div  class="tab-content-inner active " data-content="signup">

											<form action="{{url('/send')}}" id="doregister" method="post">
											    {{csrf_field()}}

												<div class="form-group has-feedback">
													    <div class="col-md-3">
													        <label for="inputEmail3" class=" control-label">手机号</label>
													    </div>
													    <div class="col-md-9 ">
													        <input type="num" name="uphone" class="form-control" id="inputEmail3" placeholder="请输入手机号">
													        <span id="uphone" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true" style="color: green;display: none"></span>
													    </div>
													    <div class="my-uphone col-md-12" >
														   <span></span>
														</div>
												</div>
												<div class="form-group has-feedback">
													    <div class="col-md-3">
													        <label for="inputEmail3" class=" control-label">新密码</label>
													    </div>
													    <div class="col-md-9 ">
													        <input type="password" name="upass" class="form-control" id="inputEmail3" placeholder="请输入密码">
													        <span id="upass" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true" style="color: green;display: none"></span>
													    </div>
													    <div class="my-upass col-md-12" >
														   <span></span>
														</div>
												</div>
												<div class="form-group  has-feedback">
													    <div class="col-md-3">
													        <label for="inputEmail3" class=" control-label">确认密码</label>
													    </div>
													    <div class="col-md-9 ">
													        <input type="password" name="repeatpass" class="form-control" id="inputEmail3" placeholder="请再次输入密码">
													        <span id="repeatpass" class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true" style="color: green;display: none"></span>
													    </div>
													    <div class="my-repeatpass col-md-12" >
														   <span></span>
														</div>
												</div>
												<div class="form-group">
													    <div class="col-md-3">
													        <label for="inputEmail3" class=" control-label">手机验证</label>
													    </div>
													    <div class="col-md-5 ">
													        <input type="num" name="phonecode" class="form-control" id="inputEmail3" placeholder="手机验证码">
													    </div>
													    <div id="my-phonecode" style="width: 120px;height: 40px;background: #F5F5F5;cursor: pointer;" class="col-md-4 " onclick="makePhoneCode()">
													        <span style="font-size: 17px;line-height: 40px">获取验证码</span>
													    </div>
													    <div class="my-phonecode col-md-12" >
														   <span></span>
														</div>
												</div>

												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit"  class="btn btn-primary col-md-12" value="发送">
													</div>
												</div>
											</form>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
	</header>

	<div class="gtco-section border-bottom" >
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Beautiful Images</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="images/img_2.jpg" class="fh5co-project-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="{{asset('/Home/login/images/img_2.jpg')}}" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Constructive heading</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="images/img_3.jpg" class="fh5co-project-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="{{asset('/Home/login/images/img_3.jpg')}}" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Constructive heading</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="images/img_4.jpg" class="fh5co-project-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="{{asset('/Home/login/images/img_4.jpg')}}" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Constructive heading</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
						</div>
					</a>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="images/img_1.jpg" class="fh5co-project-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="{{asset('/Home/login/images/img_1.jpg')}}" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Constructive heading</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="images/img_5.jpg" class="fh5co-project-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="{{asset('/Home/login/images/img_5.jpg')}}" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Constructive heading</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<a href="images/img_6.jpg" class="fh5co-project-item image-popup">
						<figure>
							<div class="overlay"><i class="ti-plus"></i></div>
							<img src="{{asset('/Home/login/images/img_6.jpg')}}" alt="Image" class="img-responsive">
						</figure>
						<div class="fh5co-text">
							<h2>Constructive heading</h2>
							<p>Far far away, behind the word mountains, far from the countries Vokalia..</p>
						</div>
					</a>
				</div>

			</div>
		</div>
	</div>

	<div id="gtco-features" class="border-bottom" >
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Splash Features</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-vector"></i>
						</span>
						<h3>Pixel Perfect</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-tablet"></i>
						</span>
						<h3>Fully Responsive</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-settings"></i>
						</span>
						<h3>Web Development</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-ruler-pencil"></i>
						</span>
						<h3>Web Design</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
					</div>
				</div>

				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-paint-roller"></i>
						</span>
						<h3>Accent Colours</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-announcement"></i>
						</span>
						<h3>Theme Updates</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-stats-up"></i>
						</span>
						<h3>Increase Earnings</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6">
					<div class="feature-center animate-box" data-animate-effect="fadeIn">
						<span class="icon">
							<i class="ti-magnet"></i>
						</span>
						<h3>Passive Income</h3>
						<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. </p>
					</div>
				</div>

			</div>
		</div>
	</div>

	<div id="gtco-counter" class="gtco-section" >
		<div class="gtco-container">

			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading animate-box">
					<h2>Fun Facts</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>

			<div class="row">

				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-settings"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="22070" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Creativity Fuel</span>

					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-face-smile"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="97" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Happy Clients</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-briefcase"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="402" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Projects Done</span>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 animate-box" data-animate-effect="fadeInLeft">
					<div class="feature-center">
						<span class="icon">
							<i class="ti-time"></i>
						</span>
						<span class="counter js-counter" data-from="0" data-to="212023" data-speed="5000" data-refresh-interval="50">1</span>
						<span class="counter-label">Hours Spent</span>

					</div>
				</div>

			</div>
		</div>
	</div>

	<div id="gtco-products" >
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>More Products</h2>
					<p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
				</div>
			</div>
			<div class="row">
				<div class="owl-carousel owl-carousel-carousel">
					<div class="item">
						<a href="#"><img src="{{asset('/Home/login/images/img_1.jpg')}}" alt="Free HTML5 Bootstrap Template by "></a>
					</div>
					<div class="item">
						<a href="#"><img src="{{asset('/Home/login/images/img_2.jpg')}}" alt="Free HTML5 Bootstrap Template by "></a>
					</div>
					<div class="item">
						<a href="#"><img src="{{asset('/Home/login/images/img_3.jpg')}}" alt="Free HTML5 Bootstrap Template by "></a>
					</div>
					<div class="item">
						<a href="#"><img src="{{asset('/Home/login/images/img_4.jpg')}}" alt="Free HTML5 Bootstrap Template by "></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="gtco-subscribe" >
		<div class="gtco-container">
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center gtco-heading">
					<h2>Subscribe</h2>
					<p>Be the first to know about the new templates.</p>
				</div>
			</div>
			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2">
					<form class="form-inline">
						<div class="col-md-6 col-sm-6">
							<div class="form-group">
								<label for="email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="email" placeholder="Your Email">
							</div>
						</div>
						<div class="col-md-6 col-sm-6">
							<button type="submit" class="btn btn-default btn-block">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<footer id="gtco-footer" role="contentinfo" >
		<div class="gtco-container">
			<div class="row row-p	b-md">

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>About <span class="footer-logo">Splash<span>.<span></span></h3>
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore eos molestias quod sint ipsum possimus temporibus officia iste perspiciatis consectetur in fugiat repudiandae cum. Totam cupiditate nostrum ut neque ab?</p>
					</div>
				</div>

				<div class="col-md-4 col-md-push-1">
					<div class="gtco-widget">
						<h3>Links</h3>
						<ul class="gtco-footer-links">
							<li><a href="#">Knowledge Base</a></li>
							<li><a href="#">Career</a></li>
							<li><a href="#">Press</a></li>
							<li><a href="#">Terms of services</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-4">
					<div class="gtco-widget">
						<h3>Get In Touch</h3>
						<ul class="gtco-quick-contact">
							<li><a href="#"><i class="icon-phone"></i> +1 234 567 890</a></li>
							<li><a href="#"><i class="icon-mail2"></i> info@</a></li>
							<li><a href="#"><i class="icon-chat"></i> Live Chat</a></li>
						</ul>
					</div>
				</div>

			</div>

			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">Copyright &copy; 2016.Company name All rights reserved.<a target="_blank" href="http://sc.chinaz.com/moban/">&#x7F51;&#x9875;&#x6A21;&#x677F;</a></small>
					</p>
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="#"><i class="icon-twitter"></i></a></li>
							<li><a href="#"><i class="icon-facebook"></i></a></li>
							<li><a href="#"><i class="icon-linkedin"></i></a></li>
							<li><a href="#"><i class="icon-dribbble"></i></a></li>
						</ul>
					</p>
				</div>
			</div>

		</div>
	</footer>
	</div>

	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>

	<!-- jQuery -->
	<script src="{{asset('/Home/login/js/jquery.min.js')}}"></script>
	<!-- jQuery Easing -->
	<script src="{{asset('/Home/login/js/jquery.easing.1.3.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{asset('/Home/login/js/bootstrap.min.js')}}"></script>
	<!-- Waypoints -->
	<script src="{{asset('/Home/login/js/jquery.waypoints.min.js')}}"></script>
	<!-- Carousel -->
	<script src="{{asset('/Home/login/js/owl.carousel.min.js')}}"></script>
	<!-- countTo -->
	<script src="{{asset('/Home/login/js/jquery.countTo.js')}}"></script>
	<!-- Magnific Popup -->
	<script src="{{asset('/Home/login/js/jquery.magnific-popup.min.js')}}"></script>

	<script src="{{asset('/Home/login/js/magnific-popup-options.js')}}"></script>
	<!-- Main -->
	<script src="{{asset('/Home/login/js/main.js')}}"></script>

	<script type="text/javascript">

    //初始化字段值
    var uphone = false;
    var phonecode = false;
    var upass = false;
    var repeatpass = false;

    //手机号判断
    $('input[name="uphone"]').on('focus', function () {
    	var type = 'uphone';
    	var match = /^((13[0-9])|(14[5|7])|(15([0-3]|[5-9]))|(18[0,5-9]))\d{8}$/;
    	var array = [
    	    '请输入手机号',
    	    '手机号格式不正确',
    	]
    	var test = false;
    	var flat = false;
    	var status = 1001;
    	varildate (type, array, test, flat, match, status);
    });

    //密码判断
    $('input[name="upass"]').on('focus', function () {
    	var type = 'upass';
    	var match = /^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,20}$/;
    	var array = [
    	    '建议字母、数字2种字符组合，6-20个字符',
    	    '不能是纯字母、数字组合，6-20个字符',
    	]
    	var test = false;
    	var flat = true;
    	varildate (type, array, test, flat, match);
    });

   //确认密码判断
    $('input[name="repeatpass"]').on('focus', function () {
    	//获取焦点时给出提示
    	$('.my-repeatpass').html('<span>请再次输入密码</span>');
        $('#repeatpass').css('display','none');
        $('input[name="repeatpass"]').css('border','2px solid #E4E4E4');
    }).on('blur', function (){
    	//失去焦点时判断
    	repeatpass = $('input[name="repeatpass"]').val();
    	upass = $('input[name="upass"]').val();console.log()
        if (repeatpass == '') {
        	//值为空时隐藏提示
        	$('.my-repeatpass').html('');
        } else if (repeatpass != upass) {
        	//判断密码是否一致
        	$('.my-repeatpass').html('<span style="color:red">请输入一致的密码</span>');
        	$('input[name="repeatpass"]').css('border','2px solid red')
        } else {
        	//验证通过
         	$('.my-repeatpass').html('');
         	$('#repeatpass').css('display','block');
        }
    })

    //手机验证码判断
    $('input[name="phonecode"]').on('focus', function () {
    	var type = 'phonecode';
    	var match = /[0-9]/;
    	var array = [
    	    '请输入手机号',
    	    '请输入4位有效数字',
    	];
    	var test = false;
    	var flat = true;
    	varildate (type, array, test, flat, match);
    });

    //获取手机验证码
     function makePhoneCode() {
     	phoneTime(60);
    	var  uphone = $('input[name="uphone"]').val();
    	if (uphone == '') {
    		dotest('uphone', '请先输入手机号！', 'red');
    	} else {
    		$.ajax({
    			type : 'post',
    			url  : "{{url('/phonecode')}}",
    			data : 'uphone='+uphone+'&_token={{csrf_token()}}',
    			success:function(data) {
    				if (data.status == 1200) {
    					dotest('phonecode',data.msg,'red');
    				}
    			},
    			dataType: 'json'
    		});

    	}
    }

    //注册提交时验证
    $("#doregister").submit(function() {
    	if (!uphone) {
    		dotest('uphone', '请输入手机号！', 'red');
    		return false;
    	} else if (!pass) {
    		dotest('pass', '请输入密码！', 'red');
    		return false;
    	} else if (!repeatpass) {
    		dotest('phonecode', '请再次输入密码！', 'red');
    		return false;
    	} else if (!repeatpass) {
    		dotest('phonecode', '请输入手机验证码！', 'red');
    		return false;
    	} else{
    		return true;
    	}

	});


    /**
     * 提示封装
     * @param  {string} name   [字段名]
     * @param  {string} str    [提示内容]
     * @param  {string} color  [颜色：定义一个red类为红色，默认为#E4E4E4]
     */
    function dotest(name, str, color='#E4E4E4') {

    	//获得焦点给出格式提示
        $('input[name="'+name+'"]').css('border','2px solid '+color);

        //清除成功提示
        $('#'+name).css('display', 'none');

        //给边框颜色，三元运算符：ture为红色，false为#E4E4E4
    	$('.my-'+name).html(color=='red'?'<span class="'+color+' glyphicon glyphicon-minus-sign">'+str+'</span>':'<span class="'+color+'">'+str+'</span>');

        $('input[name="'+name+'"]').on('blur', function (){

    	    //失去焦点获取字段值
    	    value = $('input[name="'+name+'"]').val();
            if (value == '') {

                //字段值为空清除提示
                $('.my-'+name).html('');
            }
        })
    }

    /**
     * 注册登录，提示，正则，ajax封装
     * @param  {string}  type   [字段名（input中name的名字）]
     * @param  {array}   array  [0=>'格式提示内容',1=>'正则错误提示内容']
     * @param  {Boolean} test   [控制正则判断是否运行,true为禁用状态,反之]
     * @param  {Boolean} flat   [控制ajax是否运行,true为禁用状态,反之]
     * @param  {String}  match  [正则规则]
     * @param  {String}  status [错误类型状态码]
     * @return {bool}           [全部验证通过返回ture,反之false]
     */
    function varildate (type, array, test=true, flat=true, match='', status='') {

        	//获取焦点时
        	//给出格式提示
        	$('.my-'+type).html('<span>'+array[0]+'</span>');

        	//默认input边框颜色
        	$('input[name="'+type+'"]').css('border','2px solid #E4E4E4');

        	//清除成功时提示
        	$('#'+type).css('display', 'none');

        $('input[name="'+type+'"]').on('blur', function () {

        	//失去焦点时
        	//获取用户输入数据
        	var myname = $('input[name="'+type+'"]').val();
        	$('#'+type).css('display','none');

        	//清除格式提示
        	$('.my-'+type).html('');

        	if (myname == '') {

        		//值为空把获取焦点时给出的格式提示和成功提示清除
        		$('.my-'+type).html('');
        		$('#'+type).css('display','none');
        	}

            //test=false并且字段值不为空执行正则判断
        	if (!test && myname != '') {

        	    //用户名正则判断
        	    $('#'+type).css('display','none');

        		//不符合正则判断，给出错误提示,红边框
        		if ( !(match).test(myname) ) {
        			$('.my-'+type).html('<span class="red glyphicon glyphicon-minus-sign">'+array[1]+'</span>');
        			$('input[name="'+type+'"]').css('border','2px solid red');
        			return;
        		}
        	}

            //flat=false并且字段值不为空执行ajax
        	if(!flat && myname != ''){

        		//清除样式
        		$('#'+type).css('display','none');
	        	$.ajax({
	        		type : 'post',
	        		url  : "{{url('/handle')}}",
	        		data : type+'='+myname+'&_token={{csrf_token()}}',
	        		success:function(data) {

	        			//返回状态码
	        			if (data.status == status) {

	        				//根据状态码给出错误信息提示
	        				$('.my-'+type).html('<span class="red glyphicon glyphicon-minus-sign">'+data.msg+'</span>');
	        			    $('input[name="'+type+'"]').css('border','2px solid red');

	        			} else {

	        				//验证通过
	        				$('#'+type).css('display','block');

	        				//改变字段名初始化的值
	        				eval(type +'='+ true);
	        				return;
	        			}
	        		}
	        	});
        	}

        	//input 值不为空 同时禁用ajax才运行
        	if (myname != '' && flat == true) {

        		//验证通过，给出成功提示，同时清除格式提示和红边框
        	    $('#'+type).css('display','block');
                $('.my-'+type).html('');
                $('input[name="'+type+'"]').css('border','2px solid #E4E4E4');

                //改变字段名初始化的值
                eval(type +'='+ true);
                return;
        	}
        })
    }


    //获取手机验证码时定时器
    function phoneTime (time) {
    	//设置周期定时器
    	var id = setInterval(function () {
    		//自减
    		time--;
    		//倒计时提示
    		$('#my-phonecode').html('<span style="font-size: 17px;line-height: 40px">稍等('+time+')秒</spna>');
    		//禁用click事件
    		$('#my-phonecode').removeAttr("onclick");
    		    if(time <= 0) {
    		    	//time = 0时清除定时器
    		        clearInterval(id);
    		        //还原样式和事件
    		        $('#my-phonecode').html('<span style="font-size: 17px;line-height: 40px">获取验证码</spna>');
    		        $('#my-phonecode').attr("onclick","makePhoneCode();");
    	        }
    	},1000);
    }
	</script>
</body>
</html>
