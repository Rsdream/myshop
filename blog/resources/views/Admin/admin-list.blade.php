<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
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
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>管理员列表</title>
</head>
<body>


<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 </nav>

<div class="page-container">

    @if (session('msg'))
        <div id="time" class="alert alert-success">
            {{ session('msg') }}
        </div>
    @endif





    <div class="cl pd-5 bg-1 bk-gray mt-20">
    @permission ('user-create')
    <span class="l"> <a href="{{url('admin/rbac/user/create')}}"  class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加用户</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
    @endpermission

    @permission ('user-stop')
    <span class="l"> <a href="{{url('admin/rbac/user/desc/stop')}}"  class="btn btn-primary radius"><i class="Hui-iconfont"></i> 禁用的用户</a></span>
    @endpermission

    </div>


    <table class="table table-border table-bordered table-bg">
        <thead>
            <tr>
                <th scope="col" colspan="9">管理员列表</th>
            </tr>
            <tr class="text-c">
                <!-- <th width="25"><input type="checkbox" name="" value=""></th> -->
                <th width="60">序号</th>
                <th width="150">账号</th>
                <th width="50">性别</th>
                <th width="130">电话</th>
                <th width="150">角色</th>
                <th width="100">操作</th>
            </tr>
        </thead>
        <tbody>

            @foreach($users as $v)

            <tr class="text-c">
                <!-- <td><input type="checkbox" value="1" name=""></td> -->
                <td>{{$v->id}}</td>
                <td>{{$v->uid}}</td>
                <td>
                    @if ($v->sex == '0')

                        女
                    @else
                        男
                    @endif
                </td>
                <td>{{$v->phone}}</td>
                <td>
                @foreach($v->roles as $role)
                {{$role->name}}
                @endforeach
                </td>
                <td class="td-manage">

                    @permission ('user-show')
                    <a title="编辑" href="{{url('admin/rbac/user', ['id' => $v->id])}}"  class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
                    @endpermission

                    @permission ('user-disable')
                    @if($v->id !== $session->id)
                    <a title="禁用" id="stop" href="javascript:;"  class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>
                    @endif
                    @endpermission

                    @permission ('user-details')
                    <a title="详情" href="{{url('admin/rbac/user/details', ['id' => $v->id])}}"  class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">详情</i></a>
                    @endpermission

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

{{$users->links()}}
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

//停用
$('td.td-manage').on('click', '#stop', function () {

    var that = $(this);

    var title = $(this).attr('title');

    var id = $(this).parent().parent().children().eq(0).html();
    // alert(id);

    var url = '{{url("/admin/rbac/user/")}}';

    console.log(that, title, id, url);

    $.get(

        url+'/disable/'+id,
        {status:1},
        function (data) {
            // console.log(data);

            if (data == 1) {

                that.parent().parent().remove();

            }
        },
        'json'
    );
});

//启用

$('td.td-manage').on('click', '#start', function () {

    var that = $(this);
    var title = $(this).attr('title');

    var id = $(this).parent().parent().children().eq(0).html();
    var url = '{{url("admin/adminlist/")}}';

    $.get(

        url+'/'+id+'/edit/',
        {status:0},
        function (data) {
            console.log(data);

            if (data == 1) {


                that.parent().prev().children().html('启用').css('color','white');

            }

            if (data == '4') {

                $('#die').css('display','block');

                setTimeout(function () {

                    $('#die').css('display','none');
                },2000);
            }
        },
        'json'
    );

});


setTimeout(function () {

    $('#time').removeClass().html('');
},2000);




/*
    参数解释：
    title   标题
    url     请求的url
    id      需要操作的数据id
    w       弹出层宽度（缺省调默认值）
    h       弹出层高度（缺省调默认值）
*/
/*管理员-增加*/
// function admin_add(title,url,w,h){
//  layer_show(title,url,w,h);
// }
// // /*管理员-删除*/
// function admin_del(obj,id){
//  layer.confirm('确认要删除吗？',function(index){
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

// // /*管理员-编辑*/
// function admin_edit(title,url,id,w,h){
//  layer_show(title,url,w,h);
// }
// /*管理员-停用*/
// function admin_stop(obj,id){

//  layer.confirm('确认要停用吗？',function(index){
// //       //此处请求后台程序，下方是成功后的前台处理……

//      $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
//      $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
//      $(obj).remove();
//      layer.msg('已停用!',{icon: 5,time:1000});
//  });
// }

// // /*管理员-启用*/
// function admin_start(obj,id){

//  layer.confirm('确认要启用吗？',function(index){
//      //此处请求后台程序，下方是成功后的前台处理……


//      $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
//      $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
//      $(obj).remove();
//      layer.msg('已启用!', {icon: 6,time:1000});
//  });
// }
</script>
</body>
</html>
