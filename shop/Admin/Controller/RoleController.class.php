<?php

namespace Admin\Controller;

use Component\AdminController;
use Admin\Model;

class RoleController extends AdminController {
	
	function add(){
		if (!empty(I('post.'))){
			$roleModel = D('Role');
			$roleModel->create();
			$re = $roleModel->add();
			if($re){
				$this->success('成功了','showlst');
			}else{
				$this->error('失败了','showlist');
			}
		}else{
			$this->display();
		}
		
		
	}
	
	
	function showlist() {
		$model = D ( 'Role' );
		$roleInfo = $model->select ();
		$this->info = $roleInfo;
		
		$this->display ();
	}
	function distribute($roleId) {
	//判断是否有数据进入，如果有数据进入则修改数据，没有则不修改
		if (! empty ( I ( 'post.authname' ) )) {
			$roleModel = D ( 'Role' );
			$re = $roleModel->saveAuth ( I ( 'post.authname' ), $roleId );
			if ($re) {
				$this->success ( '成功修改' ,U('showlist') );
			} else {
				$this->error ( '修改失败了' ,U('showlist'));
			}
		} else {
			
			$model = D ( 'Role' );
			$where ['role_id'] = $roleId;
			$roleData = $model->where ( $where )->find ();
			$this->data = $roleData;
			
			$authModel = D ( 'Auth' );
			$map ['auth_level'] = 0;
			$authData0 = $authModel->where ( $map )->select ();
			$this->authData0 = $authData0;
			
			$map ['auth_level'] = 1;
			$authData1 = $authModel->where ( $map )->select ();
			$this->authData1 = $authData1;
			

			$map ['auth_level'] = 2;
			$authData2 = $authModel->where ( $map )->select ();
			$this->authData2 = $authData2;
			
			
			$this->display ();
		}
	}
}