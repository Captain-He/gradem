<?php if (!defined('THINK_PATH')) exit();?><html lang="en">
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
<?php  foreach ($sign2 as $key => $value) { echo '<span style="display:none;">'; echo '<form action="../teacher/delete?biao='.$key.'"'.'method="post">'; echo '已经添加的同学'; echo '<br />'; foreach ($value['y'] as $key1 => $value1) { echo "<input type='checkbox' name='y[]' value='$value1' />$value1"; echo '<br />'; } echo '<input type="submit" value="选中删除">'; echo '<br />'; echo '</form>'; echo '<form action="../teacher/add?biao='.$key.'"'.'method="post">'; echo '未添加的同学'; echo '<br />'; foreach ($value['n'] as $key2 => $value2) { echo "<input type='checkbox' name='n[]' value='$value2' />$value2"; echo '<br />'; } echo '<input type="submit" value="选中添加">'; echo '<br />'; echo '</form>'; echo '</span>'; } ?>
<!--<?php if(is_array($sign3)): $i = 0; $__LIST__ = $sign3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$li): $mod = ($i % 2 );++$i;?><span style="display:none;">
		<?php if(is_array($li)): $i = 0; $__LIST__ = $li;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); endforeach; endif; else: echo "" ;endif; ?>
	</span><?php endforeach; endif; else: echo "" ;endif; ?>
-->

</body>
</html>