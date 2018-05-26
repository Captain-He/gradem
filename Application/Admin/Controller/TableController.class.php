<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
/**
* 
*/
class TableController extends BaseController
{
	
	public function index()
	{   
	  if(isset($_POST['nianji']))
	 {     
		$nianji = $_POST['nianji'];
		$xueqi = $_POST['xueqi'];
		$zhuanye = $_POST['r'];
		$kecheng = "";
		foreach ($_POST['kecheng'] as $i) {
			$kecheng .= $i.' VARCHAR(30) NOT NULL, ';
		}
		$table = "GRADE".$nianji.$xueqi.$zhuanye;
		$sql = "CREATE TABLE ".$table." (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			".$kecheng." sid INT(10) NOT NULL
		)";
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "student";

		// 创建连接
		 $conn = mysqli_connect($servername, $username, $password, $dbname);
		 // 检测连接
		 if (!$conn) {
		     die("连接失败: " . mysqli_connect_error());
		}

		// 使用 sql 创建数据表
		$sqln = "SELECT COUNT(*) FROM information_schema.TABLES WHERE TABLE_NAME ='$table'";
		$result = mysqli_query($conn, $sqln);
		$row = mysqli_fetch_assoc($result);
		if ($row['COUNT(*)'] !='0') {
	    // 表已经存在 是否删除重新见表
			echo "表已经存在 是否删除重新见表";
	    
		} else {//表不存在 见表
			    if (mysqli_query($conn, $sql)) {
			    echo "数据表 MyGuests 创建成功";
			} else {
			    echo "创建数据表错误: " . mysqli_error($conn);
			}
		}
		mysqli_close($conn);
		}
		else
			$this->display();
	}

}
?>