<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo C('site.name');?></title>
</head>
<body>
<html>
	<head>
		<meta charset="utf-8">
		<title>建表</title>
		<script> 
	   window.onload = function() { 
	       var rs = document.getElementsByName('r'); 
	       var divs = document.getElementsByTagName('div'); 
	       var index = 0; 
	       for (var i = 0; i < rs.length; i++) { 
	           rs[i]._index = i; 
	           rs[i].onclick = function() { 
	                divs[index].style.display = "none"; 
	                divs[this._index].style.display = "block"; 
	                index = this._index; 
	           }; 
	       } 
	       rs[index].checked = true; 
	       divs[index].style.display = "block"; 
	   }; 
	</script>
	<head/>
	<body>
		<form action="/gradem/admin/table/index"  method="post">	
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
					<td><p>学期选择：</p></td>
					<td>
						<select name="xueqi">
							<option value="1">第一学期</option>
							<option value="2">第二学期</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><p>专业选择：</p></td>
					<td>
						<input type="radio" name="r"  value="1"/> 软件工程
					    <input type="radio" name="r"  value="2"/> 计算机科学与技术
					    <input type="radio" name="r"  value="3"/> 金融工程
					    <input type="radio" name="r"  value="4"/> 传媒设计与制作
					    <input type="radio" name="r"  value="5"/> 数理统计
					</td>
			    </tr>
			    <tr>
			    	<td><p>课程选择：</p></td>
			    	<td>
				    	<div style="display:none;">
				    		<input type="checkbox" value="shu" name="kecheng[]">数学
				    		<input type="checkbox" value="ying" name="kecheng[]">英语
				    		<input type="checkbox" value="hua" name="kecheng[]">化学
				    		<input type="checkbox" value="ti" name="kecheng[]">体育
				    		<input type="checkbox" value="yin" name="kecheng[]">音乐
				    		<input type="checkbox" value="mei" name="kecheng[]">美术
				    		<input type="checkbox" value="zheng" name="kecheng[]">政治
				    		<input type="checkbox" value="ji" name="kecheng[]">计算机
				    	</div> 
						<div style="display:none;">
							<input type="checkbox" value="shu" name="kecheng[]">数学
				    		<input type="checkbox" value="ying" name="kecheng[]">英语
				    		<input type="checkbox" value="hua" name="kecheng[]">化学
				    		<input type="checkbox" value="ti" name="kecheng[]">体育
				    		<input type="checkbox" value="yin" name="kecheng[]">音乐
				    		<input type="checkbox" value="mei" name="kecheng[]">美术
				    		<input type="checkbox" value="zheng" name="kecheng[]">政治
				    		<input type="checkbox" value="ji" name="kecheng[]">计算机
						</div> 
						<div style="display:none;">
							<input type="checkbox" value="shu" name="kecheng[]">数学
				    		<input type="checkbox" value="ying" name="kecheng[]">英语
				    		<input type="checkbox" value="hua" name="kecheng[]">化学
				    		<input type="checkbox" value="ti" name="kecheng[]">体育
				    		<input type="checkbox" value="yin" name="kecheng[]">音乐
				    		<input type="checkbox" value="mei" name="kecheng[]">美术
				    		<input type="checkbox" value="zheng" name="kecheng[]">政治
				    		<input type="checkbox" value="ji" name="kecheng[]">计算机
						</div>
						<div style="display:none;">
							<input type="checkbox" value="shu" name="kecheng[]">数学
				    		<input type="checkbox" value="ying" name="kecheng[]">英语
				    		<input type="checkbox" value="hua" name="kecheng[]">化学
				    		<input type="checkbox" value="ti" name="kecheng[]">体育
				    		<input type="checkbox" value="yin" name="kecheng[]">音乐
				    		<input type="checkbox" value="mei" name="kecheng[]">美术
				    		<input type="checkbox" value="zheng" name="kecheng[]">政治
				    		<input type="checkbox" value="ji" name="kecheng[]">计算机
						</div> 
						<div style="display:none;">
							<input type="checkbox" value="shu" name="kecheng[]">数学
				    		<input type="checkbox" value="ying" name="kecheng[]">英语
				    		<input type="checkbox" value="hua" name="kecheng[]">化学
				    		<input type="checkbox" value="ti" name="kecheng[]">体育
				    		<input type="checkbox" value="yin" name="kecheng[]">音乐
				    		<input type="checkbox" value="mei" name="kecheng[]">美术
				    		<input type="checkbox" value="zheng" name="kecheng[]">政治
				    		<input type="checkbox" value="ji" name="kecheng[]">计算机
						</div>
					</td>
			    </tr>
			</table>
			<input type="submit" value="确定创建">
		</form>
	</body>
</html>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-collapse collapse" role="navigation">
			<ul>
				<li><a class="navbar-brand hidden-sm" href="<?php echo U('admin/index/index');?>">后台首页</a></li>
			</ul>
			<ul class="nav navbar-nav">
				<li><a href="<?php echo U('admin/article/index');?>">学生管理</a></li>
				<li><a href="<?php echo U('admin/category/index');?>">教师管理</a></li>
				<li><a href="<?php echo U('admin/table/index');?>">成绩表管理</a></li>
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