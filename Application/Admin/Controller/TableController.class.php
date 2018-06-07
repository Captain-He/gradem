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
			$kecheng .= $i.' VARCHAR(30) DEFAULT "--", ';
		}
		$table = "GRADE".$nianji.$xueqi.$zhuanye;
		$sql = "CREATE TABLE ".$table." (
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			isxiu INT(2) UNSIGNED DEFAULT 0,
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
			$this->error($table."表已经存在 请删除重新见表");
	    
		} else {//表不存在 见表
			    if (mysqli_query($conn, $sql)) {
			    $this->success("表".$table."创建成功");
			} else {
			   $this->error("创建数据表错误: " . mysqli_error($conn));
			}
		}
		mysqli_close($conn);
		}
		else{
			$array1 = array();
			$db = M();
			$db =$db ->query('show tables');
	        foreach ($db  as $key => $value) {
	          foreach ($value as $key2 => $value2) {
	            if (strpos($value2, 'grade') !== false) {
	                 array_push($array1, $value2);
		             }
		         }
		     }
		     $this->assign('name',$array1);
			$this->display();
		}
	}

	public function delete()
	{
		$xueqi = array();
		$xueqi = I('xueqi');
		$db = M();
		foreach ($xueqi as $key => $value) {
			$result = $db->execute('drop table '.$value);
		}
		if (!$result) {
				$this->success("删除成功！");
			}
			else
			$this->error($value."表删除失败！");
	}
}
?>