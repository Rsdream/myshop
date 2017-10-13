<!--_meta 作为公共模版分离出去-->
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
<link rel="stylesheet" type="text/css" href="{{asset('Admin/static/h-ui/css/H-ui.min.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('Admin/static/h-ui.admin/css/H-ui.admin.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('Admin/lib/Hui-iconfont/1.0.8/iconfont.css')}}" />

<link rel="stylesheet" type="text/css" href="{{asset('Admin/static/h-ui.admin/skin/default/skin.css')}}" id="skin" />
<link rel="stylesheet" type="text/css" href="{{asset('Admin/static/h-ui.admin/css/style.css')}}" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<link href="{{asset('Admin/lib/webuploader/0.1.5/webuploader.css')}}" rel="stylesheet" type="text/css" />
<style media="screen">
	#pic{
		width:100px;
		height:100px;
		margin:20px auto;
		cursor: pointer;
	}
</style>
</head>
<body>
<div class="page-container">
	<form onsubmit="return check()" action="{{url('/admin/product/goods')}}" method="post" enctype="multipart/form-data" class="form form-horizontal" id="form-article-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商品名：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input title="商品名" type="text" class="input-text" value="" placeholder="" id="" name="gname">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>选择分类：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="category" class="select">
					@foreach($categoryList as $k=>$v)
						<option value="{{$v->id}}">{{$v->name}}</option>
					@endforeach
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>选择品牌：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="brand" class="select">
					@foreach($brandList as $k=>$v)
						<option value="{{$k}}">{{$v}}</option>
					@endforeach
				</select>
				</span> </div>
		</div>
		<div id='box' class="row cl">
			<label class="form-label col-xs-4 col-sm-2">填写配置1：</label>
			<div class="formControls col-xs-2 col-sm-9">
				<label class="form-label col-xs-1 col-sm-1">运行内存</label>
				<div class="formControls col-xs-1 col-sm-1">
					<input title="运行内存" type="text" name="ram1" id="" placeholder="" value="" class="input-text" style="width:90%">
				</div>
				<label class="form-label col-xs-1 col-sm-1">存储容量</label>
				<div class="formControls col-xs-1 col-sm-1">
					<input title="存储容量" type="text" name="rom1" id="" placeholder="" value="" class="input-text" style="width:90%">
				</div>
				<label class="form-label col-xs-1 col-sm-1">颜色</label>
				<div class="formControls col-xs-1 col-sm-1">
					<input title="颜色" type="text" name="color1" id="" placeholder="" value="" class="input-text" style="width:90%">
				</div>
				<label class="form-label col-xs-1 col-sm-1">价格</label>
				<div class="formControls col-xs-1 col-sm-1">
					<input title="价格" type="text" name="price1" id="" placeholder="" value="" class="input-text" style="width:90%">
				</div>
				<label class="form-label col-xs-1 col-sm-1">库存</label>
				<div class="formControls col-xs-1 col-sm-1">
					<input title="库存" type="text" name="stock1" id="" placeholder="" value="" class="input-text" style="width:90%">
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><button id='add' type="button" name="button">追加配置</button>　</label>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">商品详细描述：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<textarea name="detail" cols="" rows="" class="textarea"  placeholder="说点什么...最少输入10个字符" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！" ></textarea>
				<p class="textarea-numberbar"><em class="textarea-length">0</em>/200</p>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">商品主图：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-thum-container">
					<div id="fileList" class="uploader-list"></div>
					<img style='border:1px solid ;' alt="点击选择图片" id="pic" src="" >
					<input id="upload" name="img" accept="image/gif,image/jpeg,image/jpg,image/png" accept="image/*" type="file" style="display:none;" />
				</div>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 添加</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
		<input type="hidden" name="sum" value="1">
	</form>
</div>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{asset('Admin/lib/jquery/1.9.1/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/lib/layer/2.4/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/static/h-ui/js/H-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/static/h-ui.admin/js/H-ui.admin.js')}}"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="{{asset('Admin/lib/My97DatePicker/4.8/WdatePicker.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/lib/jquery.validation/1.14.0/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/lib/jquery.validation/1.14.0/validate-methods.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/lib/jquery.validation/1.14.0/messages_zh.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/lib/webuploader/0.1.5/webuploader.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/lib/ueditor/1.4.3/ueditor.config.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/lib/ueditor/1.4.3/ueditor.all.min.js')}}"> </script>
<script type="text/javascript" src="{{asset('Admin/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js')}}"></script>
@include('Admin/Common/tip')
<script type="text/javascript">
	$('select[name="category"]').on('change', function () {
		var categoryId = $(this).val();
		$.ajax({
			type: 'post',
			datetype: 'json',
			url: '{{url("/admin/product/goodsbrand")}}',
			data: 'categoryid='+categoryId,
			success: function (data) {
				var str = '';
				$('select[name="brand"]').html('');
				for(var i = 0; i < data.length; i++){
					str += '<option value="'+data[i].id+'">'+data[i].bname+'</option>';
				}
				$('select[name="brand"]').append(str);
			}
		})
	})
	var sum = 1;
	$('#add').on('click', function () {
		sum++;
		var str = `
			<label class="form-label col-xs-4 col-sm-2">填写配置`+sum+`：</label>
			<div class="formControls col-xs-2 col-sm-9">
				<label class="form-label col-xs-1 col-sm-1">运行内存</label>
				<div class="formControls col-xs-1 col-sm-1">
					<input title="运行内存" type="text" name="ram`+sum+`" id="" placeholder="" value="" class="input-text" style="width:90%">
				</div>
				<label class="form-label col-xs-1 col-sm-1">存储容量</label>
				<div class="formControls col-xs-1 col-sm-1">
					<input title="存储容量" type="text" name="rom`+sum+`" id="" placeholder="" value="" class="input-text" style="width:90%">
				</div>
				<label class="form-label col-xs-1 col-sm-1">颜色</label>
				<div class="formControls col-xs-1 col-sm-1">
					<input title="颜色" type="text" name="color`+sum+`" id="" placeholder="" value="" class="input-text" style="width:90%">
				</div>
				<label class="form-label col-xs-1 col-sm-1">价格</label>
				<div class="formControls col-xs-1 col-sm-1">
					<input title="价格" type="text" name="price`+sum+`" id="" placeholder="" value="" class="input-text" style="width:90%">
				</div>
				<label class="form-label col-xs-1 col-sm-1">库存</label>
				<div class="formControls col-xs-1 col-sm-1">
					<input title="库存" type="text" name="stock`+sum+`" id="" placeholder="" value="" class="input-text" style="width:90%">
				</div>
			</div>`;
		$('#box').append(str);
		$('input[name="sum"]').val(sum);
	})


	function check() {
		var gname = $('input[name="gname"]').val();
		var brand = $('select[name="brand"]').val();
		var bool;
		$("input[type='text']").each(function(){
        if ($(this).val() == '') {
        	var title = $(this).attr('title')
        			if (title == undefined) {
        				return;
        			}
					layer.msg($(this).attr('title')+'没有填写',{icon:0,time:1500});
					return bool = false;
				}
    })
		if (bool == false) {
			return false;
		}
		var detail = $('textarea[name="detail"]').val();
		if (detail == '') {
			layer.msg('商品详情没有填写',{icon:0,time:1500});
			return false;
		}
		var img = $('img[id="pic"]').attr('src');
		if (img == '') {
			layer.msg('没有选择商品主图',{icon:0,time:1500});
			return false;
		}
		return bool;
	}
</script>
<script type="text/javascript">
	$(function() {
		$("#pic").click(function () {
			$("#upload").click(); //隐藏了input:file样式后，点击头像就可以本地上传
			$("#upload").on("change",function(){
				var objUrl = getObjectURL(this.files[0]) ; //获取图片的路径，该路径不是图片在本地的路径
				if (objUrl) {
					$("#pic").attr("src", objUrl) ; //将图片路径存入src中，显示出图片
				}
			});
		});
	});

	//建立一個可存取到該file的url
	function getObjectURL(file) {
	var url = null ;
	if (window.createObjectURL!=undefined) { // basic
		url = window.createObjectURL(file) ;
	} else if (window.URL!=undefined) { // mozilla(firefox)
		url = window.URL.createObjectURL(file) ;
	} else if (window.webkitURL!=undefined) { // webkit or chrome
		url = window.webkitURL.createObjectURL(file) ;
	}
		return url ;
	}
</script>
</body>
</html>
