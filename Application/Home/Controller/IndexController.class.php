<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\UserViewModel;
use Think\Model;
class IndexController extends Controller {

    public function alert($mes, $url = null)
    {
       echo "<script>alert('{$mes}')</script>";
       if($url != null){
           echo "<script>window.location='{$url}'</script>";
      }
    }

    public function index()
    {
        try {
            if (IS_POST) {
              $id = I('userid');
              $password = I('password');
              $usertype = I('usertype');
              if($usertype==null)
                $this->error("请选择登陆类型");
              switch ($usertype) {
                      case 'student':
                      $model = new Model('stu');
                      $result = $model -> where("sid = '$id'") -> getField('spass');
                      if($password == $result)
                        {
                             $this->success('学生登陆','../student/index');
                        }
                      else
                        $this->error('密码或账号错误');
                        break;
                      case 'teacher':
                         $model = new Model('tea');
                         $result = $model -> where("tid = '$id'") -> getField('tpass');
                      if($password == $result)
                        {
                             $this->success('教师登陆','../teacher/index');
                        }
                      else
                        $this->error('密码或账号错误');
                        break;
                      case 'admin':
                        $this->error('请管理员从管理界面登陆',U('admin/index/index'));
                        break;
                    }
              
            } else {
                $this->display();
            }
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }


}