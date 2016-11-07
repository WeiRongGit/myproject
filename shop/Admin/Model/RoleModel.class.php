<?php

namespace Admin\Model;

use Think\Model;

class RoleModel extends Model {
	function saveAuth($data, $roleId) {
		$auth_ids = implode ( ',', $data ); // 封装数组成为字符串，
		
		$info = D ( 'Auth' )->select ( $auth_ids ); // 得到权限信息
		//拼接控制器方法
		$auth_ac = '';
		foreach ( $info as $k => $v ) {
			if (! empty ( $v ['auth_c'] ) && ! empty ( $v ['auth_a'] )) {
				$auth_ac .= $v ['auth_c'] . '-' . $v ['auth_a'] . ',';
			}
		}
		
		$where = array (
				'role_id' => $roleId,
				'role_auth_ids' => $auth_ids,
				'role_auth_ac' => $auth_ac 
		);
		$saveSuccess = $this->save ( $where );
		return $saveSuccess;
	}
}