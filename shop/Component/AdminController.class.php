<?php

namespace Component;

use Think\Controller;

class AdminController extends Controller {
	function __construct() {
		parent::__construct ();

		
		// 如果当前用户为空， 而且，进入的不是login 页面，就制定重定向到页面，如果是 则放行
		// 如果当前是login 侧不重定向
		/*
		 * 解释一下为什么删除了session之后 退出不会被死循环
		 * 因为当你session之后， session。user是为空的， 而下面的if的第二个条件也是成立的 所以就直接跳到去了login
		 * 那为什么 明明没有走到 login——out session（null） 没有被执行，但是你都没有能够使用漏洞访问呢？
		 * 因为你都已经把session删除了，所以session读取补了。
		 * 
		 * 解释一下按推出的登陆没有在右下的框架里显示登陆
		 * 因为那一个推出在外层的框架里面，所以要跳的话就整一个都跳了
		 * 
		 * 
		 */
			$role_id = I ( 'session.user' ) ['mg_role_id'];
		$loginac = 'Manager-login,Manager-yz,Manager-login_check';
		$now_ac = CONTROLLER_NAME . '-' . ACTION_NAME;
		if (empty ( I ( 'session.user' ) ) && strpos ( $loginac, $now_ac ) === false) {
			$modelUrl = __MODULE__;
			$js = <<<eof
				<script type="text/javascript" >
					window.top.location.href="{$modelUrl}/Manager/login";
					</script>
			
eof;
			
			echo $js;
// 			$this->redirect ( "Manager/login" );
		 }
		
		if ($role_id != 0) {
			$now_ac = CONTROLLER_NAME . '-' . ACTION_NAME;
			// 公共可以访问的控制器
			$array_ac = array (
					'Manager-login_check',
					'Index-index',
					'Index-left',
					'Index-right',
					'Manager-login_out',
					'Index-head' 
			);
			
 			if(empty(session('role_auth_ids'))){
 				
 				$field = 'role_auth_ids';
 				$model = D ( 'role' );
 				$ids = $model->where ( 'role_id = ' . $role_id )->getField ( $field );
 				session('role_auth_ids',$ids);
 			}
				
			$field = 'role_auth_ac';
			$model = D ( 'role' );
			$result = $model->where ( 'role_id = ' . $role_id )->getField ( $field );
			
			//不是访问公共权限，并且没有在对应的列表里面找对权限
			if (! in_array ( $now_ac, $array_ac ) && strpos ( $result, $now_ac ) === false) {
				var_dump ( $now_ac );
				echo '---------------------';
				var_dump ( $result );
				exit ( '没有访问权限' );
			}
		}
	}
}