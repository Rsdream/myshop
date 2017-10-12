<div class="body-wrapper theme-clearfix">
  <header id="header" class="header header-style1">
    <div class="header-top clearfix">
      <div class="container">
        <div class="rows">

        @if (session('msg'))
              <div id="time" class="alert alert-success">
                  {{ session('msg') }}
              </div>
          @endif

          @if (session('err'))
              <div id="time" class="alert alert-danger">
                  {{ session('err') }}
              </div>
          @endif
          <!-- SIDEBAR TOP MENU -->
          <div class="pull-left top1">
            <div class="widget text-2 widget_text pull-left">
              <div class="widget-inner">
                <div class="textwidget">

                  <div class="call-us">
                    <span>欢迎</span><span>来到
                    @if($logo)
                    {{$logo->name}}
                    @endif
                    </span>
                    @if (session()->has('userinfo') && isset(session('userinfo')['name']))
                      {{session('userinfo')['name']}}
                      <a href="{{url('/queit')}}">退出</a>
                    @elseif (session()->has('userinfo') && isset(session('userinfo')['uid']))
                      {{session('userinfo')['uid']}}
                      <a href="{{url('/queit')}}">退出</a>
                    @endif
                  </div>

                </div>
              </div>
            </div>

            <div class="widget text-3 widget_text pull-left">
              <div class="widget-inner">
                <div class="textwidget">
                  <div id="lang_sel">
                    <ul class="nav">
                      <li>
                        @if (!session()->has('userinfo'))
                        <a href="{{url('/login')}}" class="lang_sel_sel icl-en">会员登录</a>
                        @endif
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
                      @if (!session()->has('userinfo'))
                      <a href="{{url('/login')}}" class="">会员注册</a>
                      @endif
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
                        <a class="item-link" href="{{url('/cart')}}">
                          <span class="menu-title">购物车</span>
                        </a>
                      </li>

                      <li class="menu-checkout">
                        <a class="item-link" href="{{url('order/show')}}">
                          <span class="menu-title">我的订单</span>
                        </a>
                      </li>
                      <li class="menu-checkout">
                        <a class="item-link" href="{{url('order/showComment')}}">
                          <span class="menu-title">我的评论</span>
                        </a>
                      </li>
                      <li class="menu-checkout">
                        <a class="item-link" href="{{url('order/showBack')}}">
                          <span class="menu-title">我的退款</span>
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
                      <a class="item-link" href="{{url('/collection')}}">
                        <span class="menu-title">收藏夹</span>
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
          <div class="etrostore-logo pull-left" >

            <a href="#" >
            @if($logo)
              <img src="{{asset($logo->logo)}}">
            @endif
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
                         <input type="text" value="" name="key" placeholder="搜索">

                        <button type="submit" title="Search" class="fa fa-search button-search-pro form-button"></button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <a title="我的购物车" href="{{url('/cart')}}">
              <div class="widget sw_top-3 sw_top pull-left">
              <div class="widget-inner">
                <div class="top-form top-form-minicart etrostore-minicart pull-right">
                  <div class="top-minicart-icon pull-right">
                    <i class="fa fa-shopping-cart"></i>

                  </div>


                </div>
              </div>
            </div>
            </a>
            <div class="widget nav_menu-3 widget_nav_menu pull-left">
              <div class="widget-inner">
                <ul id="menu-wishlist" class="menu">
                  <li class="menu-wishlist">
                    <a class="item-link" title="我的收藏" href="{{url('/collection')}}">
                      <span class="menu-title"></span>
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
                      <li><a href="{{url('/')}}">商城</a></li>
                      <li><a href="{{url('/user/myaccount')}}">个人中心</a></li>
                      <li><a href="{{url('/order/show')}}">我的订单</a></li>
                      <li><a href="{{url('/cart')}}">我的购物车</a></li>
                      <li><a href="{{url('/collection')}}">我的收藏</a></li>

                      <li><a href="{{url('/feedback')}}">意见反馈</a></li>

                      <!-- <li><a href="simple_product.html">Simple Product</a></li>
                      <li><a href="about_us.html">About Us</a></li>
                      <li><a href="contact_us.html">Contact Us</a></li> -->
                    </ul>
                  </div>
                </div>

                <ul id="menu-primary-menu-1" class="nav nav-pills nav-mega etrostore-mega etrostore-menures">
                  <li><a href="{{url('/')}}">商城</a></li>
                  <li><a href="{{url('/user/myaccount')}}">个人中心</a></li>
                  <li><a href="{{url('/order/show')}}">我的订单</a></li>
                  <li><a href="{{url('/cart')}}">我的购物车</a></li>
                  <li><a href="{{url('/collection')}}">我的收藏</a></li>

                  <li><a href="{{url('/feedback')}}">意见反馈</a></li>


                  <!-- <li><a href="about_us.html">About Us</a></li>
                  <li><a href="contact_us.html">Contact Us</a></li> -->
                </ul>
              </div>
            </nav>
          </div>
          <!-- /Primary navbar -->
          <a href="{{url('/cart')}}">
            <div class="top-form top-form-minicart etrostore-minicart pull-right">
              <div class="top-minicart-icon pull-right">
                <i class="fa fa-shopping-cart"></i>
              </div>
            </div>
          </a>
          <div class="mid-header pull-right">
            <div class="widget sw_top">
              <span class="stick-sr">
                <i class="fa fa-search" aria-hidden="true"></i>
              </span>

              <div class="top-form top-search">
                <div class="topsearch-entry">
                  <form role="search" method="get" class="form-search searchform" action="{{url('/search')}}">
                    {{ csrf_field() }}
                    <label class="hide"></label>
                    <input type="text" value="" name="key" class="search-query" placeholder="搜索商品" />
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
