<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--Public-->
<link rel="stylesheet" href="{{asset('/Home/login/Public/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/Home/login/Public/js/bootstrap.min.js')}}">
<link rel="stylesheet" href="{{asset('/Home/login/Public/js/jq.js')}}">
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="{{asset('/Admin/static/h-ui/css/H-ui.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('/Admin/static/h-ui.admin/css/H-ui.admin.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('/Admin/lib/Hui-iconfont/1.0.8/iconfont.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('/Admin/static/h-ui.admin/skin/default/skin.css')}}" id="skin" />
<link rel="stylesheet" type="text/css" href="{{asset('/Admin/static/h-ui.admin/css/style.css')}}" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>品牌管理</title>
<style media="screen">
	.alert{
		position:relative;
	}
</style>
<style type="text/css">
	.loading{
	    width:160px;
	    height:56px;
	    position: absolute;
	    top:30%;
	    left:50%;
	    line-height:56px;
	    color:#fff;
	    padding-left:60px;
	    font-size:15px;
	    background: #000 url('{{asset("images/1352886927_7549.gif")}}') no-repeat 10px 50%;
	    opacity: 0.7;
	    z-index:9999;
	    -moz-border-radius:20px;
	    -webkit-border-radius:20px;
	    border-radius:20px;
	    filter:progid:DXImageTransform.Microsoft.Alpha(opacity=70);
			display: none;
	}
</style>
</head>
<body>
	<div id="loading" class="loading">上传图片中...</div>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 订单管理 <span class="c-gray en">&gt;</span> 订单详情 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

		<table class="table table-border table-bordered table-bg table-sort">
			<thead>
				<tr class="text-c">

					<th width="170">订单编号</th>
					<th width="270">商品名</th>
					<th >商品数量</th>
					<th >商品价格</th>
					<th width="100">商品总价</th>
					<th>套餐</th>
				</tr>
			</thead>
			<tbody>
			    @if (isset($goods))
				@foreach($goods as $v)
					<tr class="text-c">

						<td>{{$v->oid}}</td>
						<td>{{$v->gname}}</td>
						<td>{{$v->gnum}}</td>
						<td >{{$v->gprice}}</td>
						<td >{{$v->gprice*$v->gnum}}</td>
						<td >{{$v->setmeal}}</td>
					</tr>
				@endforeach
				@endif
			</tbody>
		</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('/Admin/lib/jquery/1.9.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/Admin/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('/Admin/static/h-ui/js/H-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/Admin/static/h-ui.admin/js/H-ui.admin.js')}}"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('/Admin/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
<script type="text/javascript" src="{{asset('/Admin/lib/datatables/1.10.0/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/Admin/lib/laypage/1.2/laypage.js')}}"></script>
@include('Admin/Common/tip')
<script type="text/javascript">


    //订单状态修改
    function change(id, obj) {
    	var status = $(obj).parent().parent().children('th').html();
    	if (status == '订单完成') {
    		return $(obj).parent().parent().children('th').html('订单完成');
    	}
    	$.ajax({
    		type : 'post',
    		url  : '{{url("admin/order/change")}}',
    		data : 'id='+id+'&status='+status+'&_token={{csrf_token()}}',
    		success:function(data) {
    			if (data == '修改失败') {
    				alert(data);
    				return;
    			}
    			$(obj).parent().parent().children('th').html(data); //信息提示
    		},
    		dataType : 'json',
    	})
    }
</script>
</body>
</html>
