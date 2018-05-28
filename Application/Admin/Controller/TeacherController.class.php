<?php
namespace Admin\Controller;
use Think\Model;
use Think\Controller;
use Think\Page;
/**
* 
*/
class TeacherController extends BaseController
{
	public function index()
	{
		if(IS_POST)
		{
			$nianyue = I('nianyue');
			$zhuanye = I('zhuanye');
			$name = I('name');
			$model = M();
			$i = $model->query('select count(*) from tea');
			$gonghao = $nianyue.$zhuanye.$i[0]["count(*)"];
			$result = $model->execute("INSERT INTO tea (tid, tname,tpass) VALUES ('$gonghao','$name','123456')");
			if($result)
			{
				$this->success('添加成功', '../Teacher/index');
			}
			else
			{
				$this->error('添加失败');
			}

		}
		$model1 = M('tea');
		$count = $model1->count();
		$Page= new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数
		$list = $model1->order('tid desc')->
		limit($Page->firstRow.','.$Page->listRows)->select();
		$Page->setConfig('header', '<li class="rows">共<b>%TOTAL_ROW%</b>条记录 第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');  
		$Page->setConfig('prev', '上一页');  
	    $Page->setConfig('next', '下一页');  
	    $Page->setConfig('last', '末页');  
	    $Page->setConfig('first', '首页');  
	    $Page->setConfig('theme', '%FIRST%%UP_PAGE%%LINK_PAGE%%DOWN_PAGE%%END%%HEADER%');  
	    $Page->lastSuffix = false;//最后一页不显示为总页数 

		$show = $Page->show();// 分页显示输出
		$this->assign('page',$show);// 赋值分页输出

		$this->assign('result',$list);
		$this->display();
	}

	public function alert()
    {
    	$tid = I('tid');
    	$tname = I('tname');
    	$this->assign('tid',$tid);
    	$this->assign('tname',$tname);
    	$this->display();
    }
    public function alert_s()
    {
    	$tid = I('tid');
    	$tname = I('rename');
    	$tpass = I('repass');
    	$model = M();
    	$result = $model ->execute("update tea set tname='$tname' , tpass='$tpass' where tid='$tid'");
    	if($result)
    		$this->success('修改成功！','../../index');
    	else
    		$this->error('修改失败~');
    }

	public function delete()
	{
		$tid = I('tid');
		$model = M();
		$result = $model->execute("delete from tea where tid='$tid'");
		if ($result) {
			$this->success('删除成功');
		}
		else
			$this->error('删除失败');
	}
}
?>