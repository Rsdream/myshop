<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <!--[if lt IE 9]>
        <script type="text/javascript" src="{{asset('/Admin/lib/html5shiv.js')}}"></script>
        <script type="text/javascript" src="{{asset('/Admin/lib/respond.min.js')}}"></script>
        <![endif]-->
        <link href="{{asset('Admin/static/h-ui/css/H-ui.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('Admin/static/h-ui.admin/css/H-ui.login.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('Admin/static/h-ui.admin/css/style.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('/Admin/lib/Hui-iconfont/1.0.8/iconfont.css')}}" rel="stylesheet" type="text/css" />
        <!--[if IE 6]>
        <script type="text/javascript" src="{{asset('/Admin/lib/DD_belatedPNG_0.0.8a-min.js')}}" ></script>
        <script>DD_belatedPNG.fix('*');</script>
        <![endif]-->
    <title>后台登录</title>
        <meta name="keywords" content="H-ui.admin 3.0,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
        <meta name="description" content="H-ui.admin 3.0，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
    </head>
    <body>
        <input type="hidden" id="TenantId" name="TenantId" value="" />
        <div class="header"></div>
        <div class="loginWraper">
            <div id="loginform" class="loginBox">
                <form class="form form-horizontal" action="javascript:;" method="post">
                    {{ csrf_field() }}
                    <div class="row cl">
                        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
                        <div class="formControls col-xs-8">
                        <div id="123"></div>
                            <input id="nameid" name="name" type="text" placeholder="账户" class="input-text size-L">
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
                        <div class="formControls col-xs-8">
                            <input id="passid" name="pass" type="password" placeholder="密码" class="input-text size-L">
                        </div>
                    </div>
                    <div class="row cl">
                        <div class="formControls col-xs-8 col-xs-offset-3">
                            <input class="input-text size-L" type="text" name="code" id="codeid" idplaceholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" value="验证码:" style="width:150px;">
                            <img src="{{url('admin/makecode')}}" alt="" onclick="this.src='{{url('admin/makecode')}}?'+Math.random()">
                        </div>
                    </div>
                    <div class="row cl">
                        <div class="formControls col-xs-8 col-xs-offset-3">
                            <input id="loginid" name="login" type="submit" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
                            <input name="" type="reset" class="btn btn-default radius size-L" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="footer">DKTZ</div>
        <script type="text/javascript" src="{{asset('/Admin/lib/jquery/1.9.1/jquery.min.js')}}"></script> 
        <script type="text/javascript" src="{{asset('Admin/static/h-ui/js/H-ui.min.js')}}"></script>
        <script>
            var name;
            var pass;
            //验证用户名是否存在
            $('#loginid').on('click', function () {
                name = $('#nameid').val();
                pass = $('#passid').val();
                code = $('#codeid').val();
                $.ajax({
                    type:"post",
                    url:'{{url("/admin/dologin")}}',
                    data:'name='+name+'&pass='+pass+'&code='+code+'&_token={{csrf_token()}}',
                    success:function (data) {
                        if (data.status == 1200) {
                            var tip = '<div class="alert alert-danger alter-register-tip">'+data.msg+'正在跳转,请稍后</div>';
                            location.href = '{{url("/admin")}}';
                            $('#123').prepend(tip);
                        }
                        if (data.status == 1400) {
                            var tip = '<div class="alert alert-danger alter-register-tip">'+data.msg+'</div>';    
                            setTimeout(function () {
                                $('.alter-register-tip').remove();
                            }, 5000);
                            $('#123').prepend(tip);
                        }
                        if (data.status == 1401) {
                            var tip = '<div class="alert alert-danger alter-register-tip">'+data.msg+'</div>';    
                            setTimeout(function () {
                                $('.alter-register-tip').remove();
                            }, 5000);
                            $('#123').prepend(tip);
                        }
                        if (data.status == 1404) {
                            var tip = '<div class="alert alert-danger alter-register-tip">'+data.msg+'</div>';    
                            setTimeout(function () {
                                $('.alter-register-tip').remove();
                            }, 5000);
                            $('#123').prepend(tip);
                        }
                    }, 
                    error : function (msg) {                 
                        var error_message = JSON.parse(msg.responseText).errors;
                        for (var key in error_message) { 
                            var tip = '<div class="alert alert-danger alter-register-tip">'+error_message[key][0]+'</div>';    
                            setTimeout(function () {
                                $('.alter-register-tip').remove();
                            }, 5000);
                            $('#123').prepend(tip);
                        }
                    },
                    dataType:'json'
                });
            });
        </script>
    </body>
</html>
