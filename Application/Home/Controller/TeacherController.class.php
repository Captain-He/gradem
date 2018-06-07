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

    public function cha()
    {
      $sid = I('sid');
      $gid = I('gid');
      $m = M();
      $array = array();//列名称
      $array1 = array();//分数值
      $i=0;
      $a = $m->query("SHOW COLUMNS FROM $gid");
      foreach ($a as $key => $value) {
        $array[$i++] = $value['field'];
      }
      $result = $m->query("select *from $gid where sid = $sid");
      foreach ($array as $key => $value) {
        if (strpos($value, '__') !== false)
        {
           if(isset($result[0][$value]) == null)
          {
           $this->error('此学生未加入课程~');
          }
          else
          {
            $array1[$value] = $result[0][$value];
          }
        }
          
      }
     $result2 = $m->query("select *from stu where sid=$sid");
     $name = $result2['0']['sname'];
     $this->assign('name',$name);
     $this->assign('xueqi',$gid);
     $this->assign('colums',$array);
     $this->assign('value',$array1);
     $this->display();
    }
    public function shen()
    {
      $xueqi = I('gid');
      $sid = I('sid');
      $m = M();
       $result1 = $m->query("select  isxiu from  $xueqi where sid =".$sid);
      if($result1[0]['isxiu'] == '0')
      {
        $result = $m->execute("update $xueqi set isxiu = 1 where sid =".$sid);
        if ($result) {
          $this ->success('申请成功，请等待管理员审核！');return;
        }else{
          $this->error('申请失败~');
        }
      }
      if($result1[0]['isxiu'] == '1')
      {
        $this->error('正在审核中，请耐心等待~');
      }
      else{
        $this->error('申请失败~此学生未加入课程');
      }
    }
    public function xiu()
    {
      if(IS_POST)
      {
        $fen = I('fen');
        $m = M();
        $gid = $_GET['gid'];
        $sid = $_GET['sid'];
        $result = $m->query("show columns from $gid");
        $array = array();
        foreach ($result as $key => $value) {
          if (strpos($value['field'], '__') !== false)
          {

            array_push($array,$value['field']);
          // $result = $m->query("update $gid set $value['field']=I($value['field']) where sid=$sid");
          }
        }
       foreach ($array as $key => $value) {
        $c = $fen[$key];
         $result = $m->execute("update $gid set $value = '$c' where sid='$sid'");
       }
       if($result)
          $this->success("修改成功！");
        else
          $this->error("修改失败~");

      }else{
          $sid = I('sid');
          $gid = I('gid');
          $array1 = array();
          $m = M();
          $name = $m->query("select sname from stu where sid = $sid");
          $name =$name[0]['sname'];
          $result = $m->query("show columns from $gid");
          foreach ($result as $key => $value) {
           $array1[$key] = $value;
          }
          $this->assign('xueke',$array1);
          $this->assign('sid',$sid);
          $this->assign('sname',$name);
          $this->assign('gid',$gid);
          $this->display();
      }
     
    }
}