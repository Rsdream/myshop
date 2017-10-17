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
<script type="text/javascript" src="{{asset('bootstrap-3.3.7/js/bootstrap.min.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{asset('/bootstrap-3.3.7/css/bootstrap.min.css')}}" />
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
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 订单管理 <span class="c-gray en">&gt;</span> 退款详情 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

		<table class="table table-border table-bordered table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="70">ID</th>
					<th width="70">退款编号</th>
					<th width="100">退款人</th>
					<th >商品详情</th>
					<th width="110">联系电话</th>
					<th>退款原因</th>
					<th>退款金额</th>
					<th width="80">交易状态</th>
					<th width="80">操作</th>
				</tr>
			</thead>
			<tbody>
			    @if (isset($data))
				@foreach($data as $v)
					<tr class="text-c">

						<td>{{$v->id}}</td>
						<td>{{$v->number}}</td>
						<td>{{$v->name}}</td>
						<td class="text-l">
						    商品名：<span>{{$v->gname}}</span><br>
						    商品数量：<span>{{$v->gnum}}</span><br>
						    套餐：<span>{{$v->setmeal}}</span><br>
						</td>
						<td class="text-l">{{$v->phone}}1</td>
						<td class="text-l">{{$v->comment}}</td>
						<td class="text-l">{{$v->gprice*$v->gnum}}</td>
						<?php $data = [0=>'申请退款', 1=>'同意退款', 2=>'退款驳回', 3=>'退款关闭'] ?>
						<th class="status">{{$data[$v->status]}}</th>
						@if ($v->status == 3 || $v->status == 2 || $v->status == 1)
						<td>退款完成</td>
						@else
						<td class="f-14 product-brand-manage"><a style="text-decoration:none" onClick="change(id={{$v->id}}, status='1', this)" href="javascript:;" title="同意退款"><span class="glyphicon glyphicon-ok"></span></a> <a style="text-decoration:none" onClick="change(id={{$v->id}}, status='2', this)" href="javascript:;" title="退款驳回"><span class="glyphicon glyphicon-remove"></span></a></td>
						@endif
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
    function change(id, status, obj) {
    	$.ajax({
    		type : 'post',
    		url  : '{{url("admin/order/drawBack")}}',
    		data : 'id='+id+'&status='+status+'&_token={{csrf_token()}}',
    		beforeSend:function(){
                index = layer.load(3);
            },
    		success:function(data) {
    			if (data == '同意退款') {
    				layer.close(index);
    				layer.alert('同意退款', {icon: 1});
    				$(obj).parent().prev().html(data);
    				$(obj).parent().html('<span>退款完成</span>');
    			} else if(data == '退款驳回'){
    				layer.close(index);
    				layer.alert('退款驳回', {icon: 2});
    				$(obj).parent().prev().html(data);
    				$(obj).parent().html('<span>退款完成</span>');
    			} else if (data == '退款关闭'){
	    			layer.close(index);
	    			layer.alert('用户已取消退款', {icon: 6});
	    			$(obj).parent().prev().html(data);
	    			$(obj).parent().html('<span>退款完成</span>');
    			}
    		},
    		dataType : 'json',
    	})
    }
</script>
</body>
</html>
