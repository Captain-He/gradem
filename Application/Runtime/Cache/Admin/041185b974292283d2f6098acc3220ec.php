<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo C('site.name');?></title>
	<link href="__VENDOR__/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="__CSS__/login.css">
	<!--[if lt IE 9]>
	<script src="__VENDOR__/compatible/html5shiv.min.js"></script>
	<script src="__VENDOR__/compatible/respond.js"></script>
	<![endif]-->
	<script src="__VENDOR__/jquery.min.js"></script>
</head>
<body>
<div class="jumbotron">
	<h1 class="text-center"><?php echo C('site.name');?> 管理系统</h1>
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
<script src="__VENDOR__/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>