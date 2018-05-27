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
	<div class="panel panel-default">
		<div class="panel-heading">最近登录</div>
		<div class="panel-body">
			<ul>
				<li>上次登录时间：<?php echo (date('Y-m-d H:i:s',$_SESSION['admin']['loginAt'])); ?></li>
				<li>上次登录地址：<?php echo ($_SESSION['admin']['loginIp']); ?></li>
			</ul>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">修改密码</div>
		<div class="panel-body">
			<form action="/gradem/admin/index/profile" method="post" class="form-horizontal">
				<div class="form-group">
					<label for="password" class="col-md-1">新密码</label>
					<div class="col-md-4">
						<input type="password" id="password" class="form-control" name="password" required>
					</div>
				</div>
				<div class="form-group">
					<label for="repassword" class="col-md-1">密码确认</label>
					<div class="col-md-4">
						<input type="password" id="repassword" class="form-control" name="repassword" required>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 col-md-offset-1">
						<button class="btn btn-primary btn-block">修改</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
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
				<li><a href="<?php echo U('admin/link/index');?>">课程成绩管理</a></li>
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