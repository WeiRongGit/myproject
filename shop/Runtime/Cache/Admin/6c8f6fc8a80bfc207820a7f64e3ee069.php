<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>权限列表</title>

        <link href="/730/shop/Public/Admin/CSS/mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：权限管理-》权限列表列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="/730/shop/index.php/Admin/Auth/add">【添加权限】</a>
                </span>
            </span>
        </div>
        
      
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>权限名称</td>
                        <td>操作器</td>
                        <td>操作方法</td>
                        <td >全路径</td>
                    </tr>
                    <?php if(is_array($auth)): $i = 0; $__LIST__ = $auth;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$auth): $mod = ($i % 2 );++$i;?><tr>
                        <td><?php echo ($auth["auth_id"]); ?></td>
                        <td><?php echo ($auth["auth_name"]); ?></a></td>
                        <td><?php echo ($auth["auth_c"]); ?></td>
                        <td><?php echo ($auth["auth_a"]); ?></td>
                        <td><?php echo ($auth["auth_path"]); ?></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                   
                </tbody>
               
                </tfoot>
            </table>
        </div>
    </body>
</html>