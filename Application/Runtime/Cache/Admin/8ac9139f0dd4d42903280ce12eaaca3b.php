<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo C('site.name');?></title>
</head>
<body>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加学生</title>
</head>
<body>
<form action="/gradem/admin/Student/index"  method="post">
<table style="border:1px solid #0094ff;">
	<tr>
		<th></th>
		<th></th>
		<th></th>
	</tr>
	<tr>
		<td><p>年级选择：</p></td>
		<td>
			<select name="nianji">
				<option value="2015">2015级</option>
				<option value="2016">2016级</option>
				<option value="2017" selected>2017级</option>
				<option value="2018">2018级</option>
				<option value="2019">2019级</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><p>专业选择：</p></td>
		<td>
			<select name="zhuanye">
				<option value="1">软件工程</option>
				<option value="2">计算机科学与技术</option>
				<option value="3" selected>金融工程</option>
				<option value="4">传媒设计与制作</option>
				<option value="5">数理统计</option>
			</select>
		</td>
	</tr>
		<tr>
		<td><p>班级选择：</p></td>
		<td>
			<select name="banji">
				<option value="1">1班</option>
				<option value="2">2班</option>
				<option value="3" selected>3班</option>
				<option value="4">4班</option>
				<option value="5">5班</option>
			</select>
		</td>
	</tr>
	<tr>
		<td><p>输入名字：</p></td>
		<td><input type="text" name="name"></td>
		<td><input type="submit" value="确定"></td>
	</tr>
</table>
</form>
<table border="1">
	<tr>
		<th>学号</th>
		<th>名字</th>
		<th>密码</th>
		<th>操作</th>
	</tr>
	<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($vo["sid"]); ?></td>
			<td><?php echo ($vo["sname"]); ?></td>
			<td><?php echo ($vo["spass"]); ?></td><?php $sid =$vo['sid']; $sname=$vo['sname'];?>
			<td><a href="<?php echo U('student/delete?sid='.$sid);?>" onclick="if(confirm('确认删除此学生吗？')==false)return false;">删除</a>|<a href="<?php echo U('student/alert?sid='.$sid.'&sname='.$sname);?>">修改</a></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	<tr><td colspan="4" style="list-style: none;"><?php echo ($page); ?></td></tr>
</table>
</body>
</html>
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