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
    <title>分页</title>
    <script> 
	   window.onload = function() { 
	       var rs = document.getElementsByName('r'); 
	       var divs = document.getElementsByTagName('span'); 
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
</head>
<body>
<table style="border:1px solid #0094ff;" >
	<tr>
		<td>专业学期选择：</td>
	    <?php if(is_array($sign1)): $i = 0; $__LIST__ = $sign1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><td>
		    	<input type="radio" name="r" value="1"/><?php echo ($vo1); ?>
		    </td><?php endforeach; endif; else: echo "" ;endif; ?>
	</tr>
</table>
<?php  foreach ($sign2 as $key => $value) { echo '<span style="display:none;">'; echo '管理员老师申请审核的同学信息'; echo '<br />'; echo '<table>';echo '<th>学生ID</th>';echo '<th>操作</th>'; foreach ($value['y'] as $key1 => $value1) { echo '<tr>'; echo '<th>'; echo "$value1"; echo '</th>'; echo "<th>"; echo "<a href=\"yes?sid=$value1&gid=$key\" onclick=\"if(confirm('确认同意修改？')==false)return false;\">同意修改</a>".'|'."<a href=\"no?sid=$value1&gid=$key\" >拒绝修改</a>"; echo "</th>"; echo '</tr>'; } echo '</table>'; echo '<br />'; echo '</span>'; } ?>
<!--<?php if(is_array($sign3)): $i = 0; $__LIST__ = $sign3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><span style="display:none;">
		<?php if(is_array($li)): $i = 0; $__LIST__ = $li;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
	</span><?php endforeach; endif; else: echo "" ;endif; ?>
-->

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
				<li><a href="<?php echo U('admin/list/index');?>">修改申请管理</a></li>
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