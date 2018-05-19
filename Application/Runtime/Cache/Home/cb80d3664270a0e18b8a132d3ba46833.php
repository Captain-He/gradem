<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style type="text/css">
#biaoti {
	color: #00F;
}
#tishi {
	color: #F00;
}
</style>
</head>

<body>
<form method="POST" action="../../home/index/land">
<div align="center">
  <table width="600" border="0">
    <tr>
      <td><h1  align="center">&nbsp;</h1>
      <h1 align="center">&nbsp;</h1>
      <h1 align="center" id="biaoti">欢迎访问学生成绩管理系统</h1>
      <p align="center">&nbsp;</p></td>
    </tr>
    <tr>
      <td>
      	<div>
      		<table width="311" align="center">
            	<tr>
               	  <td width="234" align="center">
                		用户名：<input type="text" id="username" value=""><br/><br/>
                        密&nbsp;&nbsp;码：<input type="password" id="password" value=""><br/><br/>
                    <p>
                          <label>
                            <input type="radio" name="usertypeG" value="单选" id="student"  onclick="script:setStudent()"/>
                            学生</label>
                          <label>
                            <input type="radio" name="usertypeG" value="单选" id="teacher" onclick="script:setTeacher()"/>
                            教师</label>
                          <label>
                            <input type="radio" name="usertypeG" value="单选" id="admin" onclick="script:setAdmin()"/>
                            管理员</label>
                          <br />
                    </p></td>
                    <td width="65">
                    	<input type="submit" value="提交" />
                	</td>
                </tr>
            </table>
      	</div>
      </td>
    </tr>
  </table>
</div>
</form>
</body>
</html>