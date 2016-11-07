<?php
return array (
		// '配置项'=>'配置值'
		'TMPL_PARSE_STRING' => array (
				// '__PUBLIC__' => '/Common', // 更改默认的/Public 替换规则
				'__CSS__' => '/Admin/CSS/', // 增加新的JS类库路径替换规则
				                            // '__UPLOAD__' => '/Uploads', // 增加新的上传路径替换规则
				'__IMAGES__' => '/Admin/Images/' ,
				'__HIMAGES__' => '/Home/img/'
		),
		'DB_TYPE' => 'mysql', // 数据库类型
		'DB_HOST' => 'localhost', // 服务器地址
		'DB_NAME' => 'shop', // 数据库名
		'DB_USER' => 'root', // 用户名
		'DB_PWD' => '394053371', // 密码
		'DB_PORT' => 3306, // 端口
		'DB_PREFIX' => 'sw_',
		'SHOW_PAGE_TRACE' => true 
);

