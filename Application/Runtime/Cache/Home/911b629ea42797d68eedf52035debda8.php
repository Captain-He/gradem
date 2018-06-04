<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>详细信息</title>
</head>
<body>
<p><?php echo ($name); ?>   同学在   <?php echo ($xueqi); ?>学期的成绩单：</p>
<?php  foreach ($value as $key => $value) { if (!isset($value)) { $value = 'null'; } echo "<br />".$key."  科目的成绩为  ".$value."<br />"; } ?>
</body>
</html>