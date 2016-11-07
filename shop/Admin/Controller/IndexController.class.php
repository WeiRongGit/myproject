<?php

namespace Admin\Controller;

// use Think\Controller;
use Component\AdminController;

class IndexController extends AdminController {
// 	public function _before_index() {
// 		if (empty ( I ( 'session.user' ) )) {
// 			$this->redirect ( 'Manager/login' );
// 		}
// 	}
	public function index() {
		$this->display ();
	}
	public function left() {
		$role_id = I ( 'session.user' ) ['mg_role_id'];
		if ($role_id == 0) {
			$auth_model = D ( 'Auth' );
			
			$map ['auth_level'] = 0;
			$pre_auth = $auth_model->where ( $map )->select ();
			// level 为0的
			$map ['auth_level'] = 1;
			$sre_auth = $auth_model->where ( $map )->select ();
			
			$this->pauth_info = $pre_auth;
			$this->sauto_info = $sre_auth;
		} else {
			$role_model = D ( 'role' );
			$re = $role_model->find ( $role_id );
			$role_auth_ids = $re ['role_auth_ids'];
			
			$auth_model = D ( 'Auth' );
			// level 为0的
			$map ['auth_id'] = array (
					'in',
					$role_auth_ids 
			);
			$map ['auth_level'] = 0;
			$pre_auth = $auth_model->where ( $map )->select ();
			// level 为0的
			$map ['auth_level'] = 1;
			$sre_auth = $auth_model->where ( $map )->select ();
			
			$this->pauth_info = $pre_auth;
			$this->sauto_info = $sre_auth;
			// $auth_model = D ( 'Auth' );
			
			// $map ['auth_level'] = 0;
			// $pre_auth = $auth_model->where ( $map )->select ();
			// // level 为0的
			// $map ['auth_level'] = 1;
			// $sre_auth = $auth_model->where ( $map )->select ();
			
			// $this->pauth_info = $pre_auth;
			// $this->sauto_info = $sre_auth;
		}
		$this->display ();
	}
	public function right() {
		// var_dump(I('session.user'));
		$this->display ();
	}
	public function head() {
		$this->display ();
	}
// public function login_out() {
// 		session ( null );
// 		$this->redirect ( 'Manager/login' );
// 	}
}