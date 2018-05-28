<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class TeacherController extends Controller {

	
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
                            //$array3[$value2][$i++] = $value3['sid'];
                            if($value4['sid']==$value3['sid'])
                            {
                              $array5[$value2]['y'][$i++] = $value3['sid'];
                              $j--;
                            }
                          }
                          if($j==1)
                          {
                            //$array4[$value2][$value4['sid']] = $value4['sid'];
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
    }

    public function alert($mes, $url = null)
    {
       echo "<script>alert('{$mes}')</script>";
       if($url != null){
           echo "<script>window.location='{$url}'</script>";
      }
    }
    public function delete()
    {
      
      if(I('y')==null)
        $this->error('请选择要删除的学生！');
      else
      {
        $table = $_GET['biao'];
         $sid = I('y');
         $m = M();
         foreach ($sid as $key => $value) {
            $result = $m->execute('delete from '.$table.' where sid='.$value);
         }
         if ($result) {
           $this->success('删除成功');
         }
         else
          $this->error('删除失败');
      }
    }
    public function add()
    {

      if(I('n')==null)
        $this->error('请选择要添加的学生！');
      else
      {
         $table = $_GET['biao'];
         $sid = I('n');
         $m = M();
         foreach ($sid as $key => $value) {
            $result = $m->execute('insert into '. $table.' (sid) values('.$value.')');
         }
         if ($result) {
           $this->success('添加成功');
         }
         else
          $this->error('添加失败');
         
      }
    }
}