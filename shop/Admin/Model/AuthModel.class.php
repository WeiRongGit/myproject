<?php

namespace Admin\Model;

use Think\Model;

/**
 * 
 * @author ｗｉｎｇ
 *个人总结。
 *修改的是没有带上ID 。头脑不清醒，是ID就拿过来用拿过来用，真是无语。
 */


class AuthModel extends Model {
	function addAuth($data) {
		
		$re  = $this->add( $data );
		if ($data['auth_pid'] == 0) {
			
			$where['auth_id'] = $re;
			$where['auth_path'] = $re;
			$where['auth_level'] = 0;
			return  $this->save($where);
		} else {
			
// 			$map['auth_id'] = $data['auth_pid'];
			$parent = $this->find($data['auth_pid']);
			$parent_auth_path = $parent['auth_path'];
			
			$new_path = $parent_auth_path.'-'.$re;
			$new_level = $parent['auth_level']+1;
			$where['auth_id'] = $re;
			$where['auth_level'] = $new_level;
			$where['auth_path'] = $new_path;
			
			
		return 	$this->save($where);
// 			var_dump($parent);
// 			var_dump($new_path);
// 			var_dump($new_level);
		}
	}
}
