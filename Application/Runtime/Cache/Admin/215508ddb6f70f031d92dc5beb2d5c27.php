<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo C('site.name');?></title>
</head>
<body>

<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-collapse collapse" role="navigation">
			<ul>
				<li><a class="navbar-brand hidden-sm" href="<?php echo U('admin/index/index');?>">后台首页</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li><a href="<?php echo U('admin/student/index');?>">学生管理</a></li>
				<li><a href="<?php echo U('admin/teacher/index');?>">教师管理</a></li>
				<li><a href="<?php echo U('admin/table/index');?>">学期课程表管理</a></li>
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