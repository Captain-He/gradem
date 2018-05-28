<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class StudentController extends Controller {

	
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
}