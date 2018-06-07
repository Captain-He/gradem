<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Model;
class ListController extends BaseController {
 public function index()
    {
        $db = M();
        $array1 = array();//表名一维数组
        $array2 = array();//表名+字段名二位数组
        $array3 = array();//成绩表中已经有的学生学号
        $array4 = array();//成绩表中没的学生学号
        $array5 = array();//成绩表中没的学生学号
        $db =$db ->query('show tables');
        foreach ($db  as $key => $value) {
          foreach ($value as $key2 => $value2) {
            if (strpos($value2, 'grade') !== false) {
                 array_push($array1, $value2);
                 $d = M();
                       $d =$d ->query("SHOW COLUMNS FROM $value2");
                       foreach ($d as $key3 => $value3) {
                        foreach ($value3 as $key4 => $value4) {
                          if (strpos($value4, '__') !== false)
                          {
                            $array2[$value2][$value4] = $value4;
                          }
                        }
                      }
                       $dd = M();
                       $dd =$dd ->query("SELECT *FROM $value2");
                       $j = 1;$i= 0;$k = 0;
                       $ddd = M();
                       $ddd =$ddd ->query("SELECT *FROM stu");
                       $dddd = M();
                       $count = $dddd->query("SELECT count(*) FROM stu");
                       foreach ($ddd as $key => $value4) {                        
                          foreach ($dd as $key3 => $value3) {
                            if($value4['sid']==$value3['sid'])
                            {
                            	$ddddd = M();
                            	$s = $ddddd->query("select isxiu from $value2 where sid=$value4[sid]");
                            	if($s[0]['isxiu']=='1')
                            	{
                            		 $array5[$value2]['y'][$i++] = $value3['sid'];
                             		 $j--;
                            	}
                             
                            }
                          }
                          if($j==1)
                          {
                            $array5[$value2]['n'][$k++] = $value4['sid'];
                          }
                          $j=1;
                       }
                      
            }

          }
        }
        $this->assign('sign1',$array1);
        $this->assign('sign2',$array5);
       $this->display();
        //var_dump($array5);
    }

    public function yes()
    {
    	$sid = I('sid');
    	$gid = I('gid');
    	$m = M();
    	$result = $m->execute("update $gid set isxiu = 2 where sid = $sid");
    	if($result)
    		$this->success("审核成功！");
    	else
    		$this->error("审核失败~");

    }
    public function no()
    {
    	$sid = I('sid');
    	$gid = I('gid');
    	$m = M();
    	$result = $m->execute("update $gid set isxiu = 0 where sid = $sid");
    	if($result)
    		$this->success("拒绝审核成功！");
    	else
    		$this->error("拒绝审核失败~");
    }
}
?>