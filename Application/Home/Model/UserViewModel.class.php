<?php
namespace Home\Model;

use Think\Model\ViewModel;
class UserViewModel extends ViewModel
{
	public $viewFields = array(
		'use'  => array('stunum' , 'name' ,'pwd','remarks')
		);
}