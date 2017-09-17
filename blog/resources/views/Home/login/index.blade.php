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
	    /*.form-group{padding-top: 10px}*/
/*	    .my-name{border: 1px solid red;height: 25px;}*/
	    span{font-size: 5px;color: #989898}
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

	<div class="gtco-loader"></div>

	<div id="page">


	<div class="page-inner">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">

			<div class="row">
				<div class="col-sm-4 col-xs-12">
					<div id="gtco-logo"><a href="index.html">Splash <em>.</em></a></div>
				</div>
				<div class="col-xs-8 text-right menu-1">
					<ul>
						<li><a href="features.html">Features</a></li>
						<li><a href="tour.html">Tour</a></li>
						<li class="has-dropdown">
							<a href="#">Dropdown</a>
							<ul class="dropdown">
								<li><a href="#">Web Design</a></li>
								<li><a href="#">eCommerce</a></li>
								<li><a href="#">Branding</a></li>
								<li><a href="#">API</a></li>
							</ul>
						</li>
						<li><a href="pricing.html">Pricing</a></li>
						<li><a href="contact.html">Contact</a></li>
						<li class="btn-cta"><a href="#"><span>Get started</span></a></li>
					</ul>
				</div>
			</div>

		</div>
	</nav>

	<header id="gtco-header" class="gtco-cover" role="banner" style="background-image: url({{asset('/Home/login/images/img_4.jpg)')}}'">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-12 col-md-offset-0 text-left">


					<div class="row row-mt-15em">
						<div class="col-md-5 mt-text animate-box " data-animate-effect="fadeInUp">
							<span class="intro-text-small">Welcome to Splash</span>
							<h1>Build website using this template.</h1>
						</div>
						<div class="col-md-5  animate-box col-md-offset-2" data-animate-effect="fadeInRight">
							<div class="form-wrap" >
								<div class="tab">
									<ul class="tab-menu">
										<li class="active gtco-first"><a href="#" data-tab="signup">注册</a></li>
										<li class="gtco-second"><a href="#" data-tab="login">登录</a></li>
									</ul>
									<div class="tab-content" >
										<div class="tab-content-inner active form-horizontal" data-content="signup">
											<form action="#">
												<div class="form-group" >
													    <div class="col-md-3">
													        <label for="inputEmail3" class=" control-label">用户名</label>
													    </div>
													    <div class="col-md-9 ">
													        <input type="text" name="uname" class="form-control" id="inputEmail3" placeholder="请输入你的用户名"  aria-describedby="inputSuccess2Status">
													    </div>
													    <div class="my-name col-md-12" >
														   <span></span>
														</div>					    
												</div>
																																															
												<div class="form-group">
													    <div class="col-md-3">
													        <label for="inputEmail3" class=" control-label">密码</label>
													    </div>
													    <div class="col-md-9 ">
													        <input type="password" name="upass" class="form-control" id="inputEmail3" placeholder="请输入密码">
													    </div>
													    <div class="my-pass col-md-12" >
														   <span></span>
														</div>	 				    
												</div>													
												<div class="form-group">
													    <div class="col-md-3">
													        <label for="inputEmail3" class=" control-label">确认密码</label>
													    </div>
													    <div class="col-md-9 ">
													        <input type="password" name="unpass" class="form-control" id="inputEmail3" placeholder="请再次输入密码">
													    </div>
													    <div class="my-unpass col-md-12" >
														   <span></span>
														</div>					    
												</div>													
												<div class="form-group">
													    <div class="col-md-3">
													        <label for="inputEmail3" class=" control-label">手机号</label>
													    </div>
													    <div class="col-md-9 ">
													        <input type="text" name="uphone" class="form-control" id="inputEmail3" placeholder="建议使用常用手机">
													    </div>
													    <div class="my-phone col-md-12" >
														   <span></span>
														</div>					    
												</div>													
												<div class="form-group">
													    <div class="col-md-3">
													        <label for="inputEmail3" class=" control-label">验证码</label>
													    </div>
													    <div class="col-md-9 ">
													        <input type="text" name="ucode" class="form-control" id="inputEmail3" placeholder="请输入验证码">
													    </div>
													    <div class="my-code col-md-12" >
														   <span></span>
														</div>					    
												</div>													
												<div class="form-group">
													    <div class="col-md-3">
													        <label for="inputEmail3" class=" control-label">邮箱</label>
													    </div>
													    <div class="col-md-9 ">
													        <input type="email" name="uemail" class="form-control" id="inputEmail3" placeholder="建议使用常用邮箱">
													    </div>
													    <div class="my-email col-md-12" >
														   <span></span>
														</div>					    
												</div>												
												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit" class="btn btn-primary col-md-12" value="注册">
													</div>
												</div>
											</form>
										</div>

										<div class="tab-content-inner" data-content="login">
											<form action="#">
												<div class="row form-group">
													<div class="col-md-12">
														<label for="username">用户名</label>
														<input type="text" name="name" class="form-control" id="username" placeholder="请输入你的用户名">
													</div>
													<div class="my-uname col-md-12" >
														   <span></span>
													</div>														
												</div>												

												<div class="row form-group">
													<div class="col-md-12">
														<label for="password">密码</label>
														<input type="password" name="pass" class="form-control" id="password" placeholder="请输入你的密码">
													</div>
													<div class="my-upass col-md-12" >
														   <span></span>
													</div>
												</div>

												<div class="row form-group">
													<div class="col-md-12">
														<input type="submit" class="btn btn-primary col-md-12" value="登录">
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

	<div class="gtco-section border-bottom">
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

	<div id="gtco-features" class="border-bottom">
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

	<div id="gtco-counter" class="gtco-section">
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

	<div id="gtco-products">
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



	<div id="gtco-subscribe">
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

	<footer id="gtco-footer" role="contentinfo">
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
	    var name = $('input[name="uname"]').val();
	    var pass = $('input[name="upass"]').val();
	    var npass = $('input[name="unpass"]').val();
	    var code = $('input[name="ucode"]').val();
	    var email = $('input[name="uemail"]').val();
	    var phone = $('input[name="uphone"]').val();
        
        //用户名判断
        $('input[name="uname"]').on('focus',function () {
        	$('.my-name').html('<span>支持中文、字母、数字、"_"组合，4-20个字符</span>');
        }).on('blur',function (){
            if(name == '') {
            	$('.my-name').html('');
            }
            
        })        

        //密码判断判断
        $('input[name="upass"]').on('focus',function () {
        	$('.my-pass').html('<span>建议使用字母、数字2种组合，6-12个字符</span>');
        }).on('blur',function (){
            if(name == '') {
            	$('.my-pass').html('');
            }
        })        

        //确认密码判断
        $('input[name="unpass"]').on('focus',function () {
        	$('.my-unpass').html('<span>请再次输入密码</span>');
        }).on('blur',function (){
            if(name == '') {
            	$('.my-unpass').html('');
            }
        })        

        //手机号判断
        $('input[name="uphone"]').on('focus',function () {
        	$('.my-phone').html('<span>验证通过可以使用该手机找回密码和登录</span>');
        }).on('blur',function (){
            if(name == '') {
            	$('.my-phone').html('');
            }
        })        

        //验证码判断
        $('input[name="ucode"]').on('focus',function () {
        	$('.my-code').html('<span>?看不清，点击图片更换验证码</span>');
        }).on('blur',function (){
            if(name == '') {
            	$('.my-code').html('');
            }
        })        

        //邮箱判断
        $('input[name="uemail"]').on('focus',function () {
        	$('.my-email').html('<span>建议使用常用邮箱</span>');
        }).on('blur',function (){
            if(name == '') {
            	$('.my-email').html('');
            }
        })        


         //登录验证
        //邮箱判断
        $('input[name="name"]').on('focus',function () {
        	$('.my-uname').html('<span>请输入用户名</span>');
        }).on('blur',function (){
            if(name == '') {
            	$('.my-uname').html('');
            }
        })        

        //邮箱判断
        $('input[name="pass"]').on('focus',function () {
        	$('.my-upass').html('<span>请输入密码</span>');
        }).on('blur',function (){
            if(name == '') {
            	$('.my-upass').html('');
            }
        })
	</script>

	</body>
</html>
