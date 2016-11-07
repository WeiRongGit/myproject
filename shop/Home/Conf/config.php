<?php
return array (
		// '配置项'=>'配置值'
		'TMPL_PARSE_STRING' => array (
				// '__PUBLIC__' => '/Common', // 更改默认的/Public 替换规则
				'__CSS__' => '/Home/CSS/', // 增加新的JS类库路径替换规则
				                           // '__UPLOAD__' => '/Uploads', // 增加新的上传路径替换规则
				'__IMAGES__' => '/Home/Images/' 
		),
		'DB_TYPE' => 'mysql', // 数据库类型
		'DB_HOST' => 'localhost', // 服务器地址
		'DB_NAME' => 'shop', // 数据库名
		'DB_USER' => 'root', // 用户名
		'DB_PWD' => '394053371', // 密码
		'DB_PORT' => 3306, // 端口
		'DB_PREFIX' => 'sw_',
		'SHOW_PAGE_TRACE' => true,
		'LANG_SWITCH_ON' => true, // 开启语言包功能
		'LANG_AUTO_DETECT' => true, // 自动侦测语言 开启多语言功能后有效
		'LANG_LIST' => 'zh-cn,ri', // 允许切换的语言列表 用逗号分隔
		'VAR_LANGUAGE' => 'lang' 
) // 默认语言切换变量
; 

