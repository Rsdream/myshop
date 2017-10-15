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
<link rel="stylesheet" type="text/css" href="{{asset('/Admin/static/h-ui/css/H-ui.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('/Admin/static/h-ui.admin/css/H-ui.admin.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('/Admin/lib/Hui-iconfont/1.0.8/iconfont.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('/Admin/static/h-ui.admin/skin/default/skin.css')}}" id="skin" />
<link rel="stylesheet" type="text/css" href="{{asset('/Admin/static/h-ui.admin/css/style.css')}}" />
<link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>角色管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 角色管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
@if (session('msg'))
    <div id="time" class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif


@if (session('msgg'))
    <div id="tme" class="alert alert-success">
        {{ session('msgg') }}
    </div>
@endif

<div class="page-container">
	@permission ('role-create')
	<div class="cl pd-5 bg-1 bk-gray"> <span class="l">  <a class="btn btn-primary radius" href="{{url('/admin/rbac/role/create')}}" <i class="Hui-iconfont">&#xe600;</i> 添加角色</a> </span> </div>
	@endpermission
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="6">角色管理</th>
			</tr>
			<tr class="text-c">

				<th width="60">序号</th>
				<th width="200">角色名</th>
				<th>列表</th>
				<th width="300">描述</th>
				<th width="170">操作</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($roles as $role)
				<tr class="text-c">

					<td>{{$role->id}}</td>
					<td>{{$role->name}}</td>
					<td>{{$role->display_name}}</td>
					<td>{{$role->description}}</td>
					<td class="f-14" >
					@permission ('role-show')
					@if ($role->name !== 'superadmin')
					<a title="编辑" href="{{url('/admin/rbac/role', ['id' => $role->id])}}" ><i class="Hui-iconfont">&#xe6df;</i></a>
					@endif
					@endpermission

					@permission ('role-details')
					<a title="详情" href="{{url('/admin/rbac/role/details', ['id' => $role->id])}}" ><i class="Hui-iconfont">详情</i></a>
					@endpermission

					@permission ('role-delete')
					@if ($role->name !== 'superadmin')
					<a title="删除" id="delete" href="javascript:;" ><i class="Hui-iconfont">删除</i></a>
					@endif
					</td>
					@endpermission
				</tr>
			@endforeach
		</tbody>
	</table>


	{{ $roles->links() }}
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('/Admin/lib/jquery/1.9.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/Admin/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('/Admin/static/h-ui/js/H-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/Admin/static/h-ui.admin/js/H-ui.admin.js')}}"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('/Admin/lib/datatables/1.10.0/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript">

//删除角色
$('td.f-14').on('click', '#delete', function () {

    var that = $(this);

    var title = $(this).attr('title');

    var id = $(this).parent().parent().children().eq(0).html();
    // alert(id);

    var url = '{{url("/admin/rbac/role/")}}';

    console.log(that, title, id, url);

    $.get(

        url+'/delete/'+id,
        function (data) {
            // console.log(data);

            if (data == 1) {

                that.parent().parent().remove();

            }
        },
        'json'
    );
});

setTimeout(function () {

	    $('#time').removeClass().html('');
	},2000);

setTimeout(function () {

	    $('#tme').removeClass().html('');
	},2000);
</script>
</body>
</html>
