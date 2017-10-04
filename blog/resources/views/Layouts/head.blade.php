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
          <!-- SIDEBAR TOP MENU -->
          <div class="pull-left top1">
            <div class="widget text-2 widget_text pull-left">
              <div class="widget-inner">
                <div class="textwidget">

                  <div class="call-us">
                    <span>欢迎</span><span>来到ETRO商城</span>
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
          <div class="etrostore-logo pull-left" >

            <a href="#" >
              <img src="{{asset($logo)}}" alt="Shoopy" >

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
