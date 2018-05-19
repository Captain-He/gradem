<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model\UserViewModel;
use Think\Model;
class IndexController extends Controller {

	
    public function index()
    {
       
    }

    public function alert($mes, $url = null)
    {
       echo "<script>alert('{$mes}')</script>";
       if($url != null){
           echo "<script>window.location='{$url}'</script>";
      }
    }

    public function land()
    {
        try {
            if (IS_POST) {
              $name = I('username');
              $password = I('password');
              $usertype = I('usertype');
              $model = new Model('stu');
              $result = $model -> where("name = '$name'") -> getField('pwd');
              if($password == $result)
                {
                    switch ($usertype) {
                      case 'student':
                        $this->alert('student');
                        break;
                      case 'teacher':
                        $this->alert('teacher');
                        break;
                      case 'admin':
                        $this->alert('admin');
                        break;
                    }
                }
              else
                echo 'n';

            } else {
                $this->display();
            }
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }


}