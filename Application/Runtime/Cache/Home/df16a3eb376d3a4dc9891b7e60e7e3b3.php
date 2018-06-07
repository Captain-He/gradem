<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>修改学生信息</title>
</head>
<body>
学号：<?php echo ($sid); ?><br />
姓名：<?php echo ($sname); ?><br />
学期：<?php echo ($gid); ?><br />
<form action="xiu?gid=<?php echo ($gid); ?>&sid=<?php echo ($sid); ?>" method="post">
<?php
foreach ($xueke as $key => $value) { if (strpos($value['field'], '__') !== false) { $a = $value['field']; echo $value['field'].' :'.'<input type="input" name="fen[]" required>'.'<br />'.'<br />'; } } ?>
	<input type="submit" value =" 确定">
</form>
</volist>
</body>
</html>