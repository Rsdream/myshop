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
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>角色管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 角色管理 <span class="c-gray en">&gt;</span> 角色管理 </nav>
<div class="page-container">
    
    <table class="table table-border table-bordered table-hover table-bg">
        <thead>
            <tr>
                <th scope="col" colspan="6">角色管理</th>
            </tr>
            <tr class="text-c">
                <!-- <th width="25"><input type="checkbox" value="" name=""></th> -->
                <th width="40">序号</th>
                <th width="200">角色</th>
                <th>姓名</th>
                <th width="500">描述</th>
                <!-- <th width="70">操作</th> -->
            </tr>
        </thead>
        <tbody>

            @foreach($res as $v)
                <tr class="text-c">
                    <!-- <td><input type="checkbox" value="" name=""></td> -->
                    <td>{{$v->id}}</td>
                    <td>
                        @if($v->power == 2)
                            老大
                        @elseif($v->power ==1)
                            超级管理员
                        @elseif($v->power ==0)
                            普通管理员
                        @endif
                    </td>
                    <td><a href="#">{{$v->name}}</a></td>
                    <td>
                        
                        @if($v->power == 2)
                            有权,任性，想干嘛就干嘛
                        @elseif($v->power == 1)
                            可以查看用户订单、下单、查询商品、用户、积分管理、系统管理等操作
                        @elseif($v->power == 0)
                            部分权限
                        @endif
                    </td>
                    <td class="f-14"><a title="编辑" href="javascript:;" onclick="admin_role_edit('角色编辑','admin-role-add.html','1')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="admin_role_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
                </tr>

            @endforeach
    
        </tbody>
    </table>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('/Admin/lib/jquery/1.9.1/jquery.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('/Admin/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('/Admin/static/h-ui/js/H-ui.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('/Admin/static/h-ui.admin/js/H-ui.admin.js')}}"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('/Admin/lib/datatables/1.10.0/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript">
/*管理员-角色-添加*/
// function admin_role_add(title,url,w,h){
//  layer_show(title,url,w,h);
// }
// /*管理员-角色-编辑*/
// function admin_role_edit(title,url,id,w,h){
//  layer_show(title,url,w,h);
// }
// /*管理员-角色-删除*/
// function admin_role_del(obj,id){
//  layer.confirm('角色删除须谨慎，确认要删除吗？',function(index){
//      $.ajax({
//          type: 'POST',
//          url: '',
//          dataType: 'json',
//          success: function(data){
//              $(obj).parents("tr").remove();
//              layer.msg('已删除!',{icon:1,time:1000});
//          },
//          error:function(data) {
//              console.log(data.msg);
//          },
//      });     
//  });
// }
</script>
</body>
</html>