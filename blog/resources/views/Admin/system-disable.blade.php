<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('/Admin/static/h-ui/css/H-ui.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('/Admin/static/h-ui.admin/css/H-ui.admin.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('/Admin/lib/Hui-iconfont/1.0.8/iconfont.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('/Admin/static/h-ui.admin/skin/default/skin.css')}}" id="skin" />
<link rel="stylesheet" type="text/css" href="{{asset('/Admin/static/h-ui.admin/css/style.css')}}" />

<style>
	/*#id{
		display:block;
	}*/
</style>
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>数据字典</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
	<span class="c-gray en">&gt;</span>
	系统管理
	<span class="c-gray en">&gt;</span>
	数据字典
	<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<div class="page-container">

	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="l">
			<a href="{{url('admin/url/create')}}"  class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加</a>
		</span>

		<span class="l" style="margin-left:10px">
			<a href="{{url('admin/url/create')}}"  class="btn btn-primary radius">禁用的链接</a>
		</span>
	</div>

	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="80">序号</th>
					<th>网站名</th>
					<th width="305">链接</th>
					<th width="305">Logo</th>
					<th width="100">操作</th>
				</tr>
			</thead>
			<tbody>

			@foreach($data as $v)
				@if ($v->status == 1)
					<tr class="text-c">
						<td><input type="checkbox" value="" name=""></td>
						<td>{{$v->id}}</td>
						<td>{{$v->name}}</td>
						<td>{{$v->url}}</td>
						<td><img src="{{asset($v->logo)}}" alt=""></td>
						<td class="f-14" id="disp">

						<a  href="javascript:;"  data-id="{{$v->id}}" id="id" style="text-decoration:none">启用</a>
						
						</td>
					</tr>
				@endif
			@endforeach
			</tbody>
		</table>
		{{$data->links()}}
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
<script type="text/javascript">

/*数据字典-编辑*/
// function system_data_edit(title,url,id,w,h){
//   layer_show(title,url,w,h);
// }
/*数据字典-删除*/




var url = "{{url('/admin/url/')}}";


$('td#disp').on('click', '#id', function () {


	var id = $(this).attr('data-id');

	var that = $(this);
	$.get(

		url+'/'+id,
		{err:'0'},
		function (data) {
			console.log(data);
			if (data == 1) {
				that.parent().parent().remove();
			}
		},
		'json'
	);



});

</script>
</body>
</html>