<?php

namespace Home\Controller;

use Think\Controller;

class UserController extends Controller {
	public function index() {
		$this->display ();
	}
	public function login() {
		
		
		$this->display ();
	}
	public function register() {
		//
		$this->display ();
	}
	public function register_check() {
		// username password" password2 user_email user_qq user_tel user_sex
		if (! empty ( I ( 'post.' ) )) {
			header ( "Content-type: text/html; charset=utf-8" );
			// $model = new \Home\Model\UserModel ();
			// $model = new UserModel ();
			$model = D ( 'User' );
			var_dump ( $model );
			$re = $model->create ();
			if (! $re) {
				$info = $model->getError ();
				// var_dump ( $info );
				$this->info = $info;
				$this->display ( 'register' );
			} else {
				$re = $model->add ();
			}
		}
	}
}