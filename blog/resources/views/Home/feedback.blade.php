<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>意见反馈</title>
</head>
<body>
	
	<center>
		<h2>请提出您的反馈信息或对本站的宝贵意见</h2>

		<form action="{{url('in-feedback')}}" method="post">
			{{csrf_field()}}
			
			<input type="hidden" name="uid" value="1">
			姓名：<input type="text" name="name"><br>
			联系方式：<input type="text" name="contact"><br><br><br>
			反馈内容：<textarea name="content" id="" cols="30" rows="10"></textarea>

			<input type="submit" value="提交">
		</form>
	</center>
</body>
</html>