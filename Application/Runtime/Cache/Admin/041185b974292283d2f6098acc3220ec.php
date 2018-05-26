<?php if (!defined('THINK_PATH')) exit();?><html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo C('site.name');?></title>
</head>
<body>
<div class="jumbotron">
	<h1 class="text-center"><?php echo C('site.name');?>系统 管理员登陆</h1>
</div>
<div class="content">

	<form action="/gradem/admin/index/login" class="form-inline text-center" method="post">
		<label for="username">账号</label>
		<input type="text" name="username" class="form-control" id="username" required>
		<label for="password">密码</label>
		<input type="password" name="password" class="form-control" id="password" required>
		<button class="btn btn-primary">登录</button>
		<button class="btn btn-default" type="reset">重置</button>
	</form>
</div>
</body>
</html>