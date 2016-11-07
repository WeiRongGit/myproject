<?php

namespace Admin\Controller;

use \Component\AdminController;
use Admin\Model;

class AuthController extends \Component\AdminController {
	function showlist() {
		$authData = $this->getAuthData ();
		$this->auth = $authData;
		$this->display ();
	}
	function add() {
		$info = $this->getAuthData ();
		$autoInfo = array ();
		$autoInfo [0] = '顶级权限';
		foreach ( $info as $v ) {
			if($v['auth_level']<2){
			$autoInfo [$v ['auth_id']] = $v ['auth_name'];				
			}
		}
		$this->auth = $autoInfo;
		$this->display ();
	}
	function addAuth() {
		// 定义一个model 把所有的数据库操作都放到model 里面。 先添加权限的名字 权限的c 和a 全路径还有级别要用更新，因为不知道自己的id
		$authModel = D ( 'Auth' );
		$resule = $authModel->addAuth ( I ( 'post.' ) );
		if($resule){
			$this->success('成功了',U('showlist'));
		}else{
			$this->error('失败了',U('showlist'));			
		}
	}
	function getAuthData() {
		$authModel = D ( 'Auth' );
		$authData = $authModel->order ( 'auth_path asc' )->select ();
		foreach ( $authData as $k => $v ) {
			$authData [$k] ['auth_name'] = str_repeat ( "->", $v ['auth_level'] ) . $v ['auth_name'];
		}
		return $authData;
	}
}