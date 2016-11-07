<?php

namespace Admin\Controller;

// use Think\Controller;
use Admin\Model\ManagerModel;
use Component\AdminController;

class ManagerController extends AdminController {
	public function login() {
		$this->display ();
	}
	public function login_check() {
		// 先检查验证码是否错误，
		// 如果错误，返回返回登陆页面
		// 如果正确，进行登陆验证
		header ( "Content-type: text/html; charset=utf-8" );
		
		$v = new \Think\Verify ();
		$captcha = I ( 'captcha' );
		$re = $v->check ( $captcha );
		$error_info = array ();
		if (! $re) {
			$error_info ['captcha'] = '验证码错误';
			$this->info = $error_info;
			var_dump ( $error_info );
			$this->display ( 'login' );
		} else {
			// admin_user admin_psd captcha
			$name = I ( 'admin_user' );
			$pad = I ( 'admin_psd' );
			
			$model = new ManagerModel ();
			$flag = $model->check ( $name, $pad );
			if ($flag) {
				session ( 'user', $flag );
			} else {
				$error_info ['past'] = '账号或者密码错误';
			}
			$this->redirect ( 'Index/index' );
		}
	}
	//验证码
	public function yz() {
		$config = array (
				'imageH' => 33, // 验证码图片高度
				'imageW' => 100,
				'fontSize' => 15,
				'fontttf' => '4.ttf', // 验证码字体，不设置随机获取
				'length' => 3,
				'useNoise' => false 
		); // 验证码位数
		$v = new \Think\Verify ( $config );
		$v->entry ();
	}
	public function login_out() {
		session ( null );
		$this->redirect ( 'login' );
	}
	
	public function showlist()
	{
// 		$roleModel  = D('Role');
		$roleData = $this->getRoleInfo();
		
		$this->role = $roleData;
		$managerModel = D('Manager');
		$data = $managerModel->select();
		

		$this->data = $data;
		$this->display();
	}
	function upgrade(){
		//获得被修改管理员的信息
		//查看是否有ID参数传入，如果有就查询manager表，并且展示数据
		if(empty(I('post.'))){
		$info = D('Manager')->find(I('get.id'));
		$this->mgInfo = $info;
		
		$role = $this->getRoleInfo();
		$this->role = $role;
		$this->display();
		}else {
			$mgModel = D('Manager');
			$mgModel->create();
			$re = $mgModel->save();
			
			if($re){
				$this->success('修改成功',U('showlist'));
			}else{
					$this->error('修改失败',U('showlist'));
				}
				
		}
	}
	function getRoleInfo(){
		$roleModel  = D('Role');
		$roleData = $roleModel ->select();
		$roleArray = array();
		$roleArray[0] ="超级管理员";
		
		foreach ($roleData as $k => $v){
			$roleArray[$v['role_id']] = $v['role_name'];
		}
		 return $roleArray;
	}
	
	function add(){
		if (!empty(I('post.'))){
			$mgModel = D('Manager');
			$mgModel->create();
			$re = $mgModel->add();
			if($re){
				$this->success('增加成功','showlist');
			}else{
				$this->error('增加失败','showlist');
			}
		}else {
			$this->role = $this->getRoleInfo();
			$this->display();
		}
	}
	
	function delete(){
		$mgModel = D('Manager');
	$result =	$mgModel->delete(I('get.id'));
	if($result){
		$this->success('删除成功');
	}else {
		$this->error('删除失败');
	}
	}
}