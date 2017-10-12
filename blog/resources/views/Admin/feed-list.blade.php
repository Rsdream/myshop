<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="{{asset('Admin/lib/html5shiv.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/lib/respond.min.js')}}"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="{{asset('Admin/static/h-ui/css/H-ui.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('Admin/static/h-ui.admin/css/H-ui.admin.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('Admin/lib/Hui-iconfont/1.0.8/iconfont.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('Admin/static/h-ui.admin/skin/default/skin.css')}}" id="skin" />
<link rel="stylesheet" type="text/css" href="{{asset('/bootstrap-3.3.7/css/bootstrap.min.css')}}" />
<!--[if IE 6]>
<script type="text/javascript" src="{{asset('Admin/lib/DD_belatedPNG_0.0.8a-min.js')}}" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->

<title>意见反馈</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 评论管理 <span class="c-gray en">&gt;</span> 订单评论 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>

		<table class="table table-border table-bordered table-hover table-bg table-sort">
			<thead>
				<tr class="text-c">
					<th width="60">ID</th>
					<th width="60">用户名</th>
					<th width="160">商品详情</th>
					<th >商品评论</th>
					<th >回复</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>
			    @if (!empty($data))
			    @foreach ($data as $v)
				<tr class="text-c">
					<td>{{$v->id}}</td>
					<td>{{$v->name}}</td>
					<td class="text-l">
					    商品名：{{$v->gname}}<br>
					    配置：{{$v->setmeal}}
					</td>

					<td ><div>{{$v->comment}}</div></td>
					@if ($v->text == null)
					<td ><div>等待回复</div></td>
					@else
					<td ><div>{{$v->text}}</div></td>
					@endif

					<td class="td-manage"><a title="回复" href="javascript:;" onclick="edit({{$v->id}}, this)" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
					</td>
				</tr>
				@endforeach
				@endif
			</tbody>
		</table>
		{{ $data->links() }}
	</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('Admin/lib/jquery/1.9.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bootstrap-3.3.7/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/static/h-ui/js/H-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/static/h-ui.admin/js/H-ui.admin.js')}}"></script> <!--/_footer /作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('Admin/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/lib/datatables/1.10.0/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/lib/laypage/1.2/laypage.js')}}"></script>
<script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
<script type="text/javascript">

/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*用户-查看*/
function member_show(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
		$(obj).remove();
		layer.msg('已停用!',{icon: 5,time:1000});
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		layer.msg('已启用!',{icon: 6,time:1000});
	});
}
/*用户-编辑*/
function edit(id, obj) {
// console.log($(obj).parent().parent().children('td').eq(4).html('1'))
	layer.prompt({
	  formType: 2,
	  title: '请回复',
	  area: ['400px', '150px'] //自定义文本域宽高
	}, function(value, index, elem){
	  $.ajax({
	  	type : 'post',
	  	data : 'id='+id+'&value='+value+'&_token={{csrf_token()}}',
	  	url  : '{{url("admin/order/reply")}}',
        beforeSend:function(){
        	tist = layer.load(3)
        },
	  	success:function(data) {
	  		$(obj).parent().parent().children('td').eq(4).html(value)

	  		layer.alert('回复成功'); //得到value
	  		layer.close(tist);

	  	},
	  	dataType:'json',
	  });
	  layer.close(index);

	});

}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}

</script>
</body>
</html>
