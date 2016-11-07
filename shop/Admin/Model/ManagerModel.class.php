<?php

namespace Admin\Model;

use Think\Model;

class ManagerModel extends Model {
	

	protected $_auto            =   array(
			array('goods_create_time','time',1,'function'),
			array('goods_last_time','time',2,'function'),
				
	);
	
	
	
	
	function check($name, $pwd) {
		$info = $this->getByMg_name ( $name );
		
		if (! empty ( $info )) {
			if ($info ['mg_pwd'] == $pwd) {
				return $info;
			} else {
				return false;
			}
		} else {
			// 没有这个账户，所以返回false;
			return false;
		}
	}
}