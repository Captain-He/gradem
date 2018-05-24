<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo C('site.name');?></title>
</head>
<body>
<div class="container">
	<p>欢迎管理员<?php echo ($_SESSION['admin']['username']); ?>登录</p>
</div>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-collapse collapse" role="navigation">
			<ul>
				<li><a class="navbar-brand hidden-sm" href="<?php echo U('admin/index/index');?>">后台首页</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li><a href="<?php echo U('admin/article/index');?>">学生管理</a></li>
				<li><a href="<?php echo U('admin/category/index');?>">教师管理</a></li>
				<li><a href="<?php echo U('admin/comment/index');?>">成绩表管理</a></li>
				<li><a href="<?php echo U('admin/link/index');?>">友情链接</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right hidden-sm">
				<li><a href="<?php echo U('admin/index/profile');?>">个人中心</a></li>
				<li><a href="<?php echo U('admin/index/logout');?>">退出登录</a></li>
			</ul>
		</div>
	</div>
</div>
</body>
</html>