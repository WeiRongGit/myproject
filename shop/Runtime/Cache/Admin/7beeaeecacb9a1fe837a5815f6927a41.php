<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>修改管理员</title>
        <meta http-equiv="content-type" content="text/html;charset=utf-8">
        <link href="/730/shop/Public/Admin/CSS//mine.css" type="text/css" rel="stylesheet">
    </head>

    <body>

        <div class="div_head">
            <span>
                <span style="float:left">当前位置是：管理员管理-》修改管理员信息</span>
                <span style="float:right;margin-right: 8px;font-weight: bold">
                    <a style="text-decoration: none" href="/730/shop/index.php/Admin/Manager/showlist">【返回】</a>
                </span>
            </span>
        </div>
        <div></div>

        <div style="font-size: 13px;margin: 10px 5px">
            <form action="/730/shop/index.php/Admin/Manager/upgrade" method="post" enctype="multipart/form-mgInfo">
            <table border="1" width="100%" class="table_a">
                <tr>
                    <td>管理员名称</td>
                    <td><input type="text" name="" value="<?php echo ($mgInfo["mg_name"]); ?>" /></td>
                </tr>
                <tr>
                    <td>角色</td>
                    <td>
                         <select id="" name="mg_role_id" onchange="" ondblclick="" class="" ><?php  foreach($role as $key=>$val) { if(!empty($mgInfo['mg_role_id']) && ($mgInfo['mg_role_id'] == $key || in_array($key,$mgInfo['mg_role_id']))) { ?><option selected="selected" value="<?php echo $key ?>"><?php echo $val ?></option><?php }else { ?><option value="<?php echo $key ?>"><?php echo $val ?></option><?php } } ?></select>
                    </td>
                </tr>
              
                
                <tr>
                    <td colspan="2" align="center">
                     	<input type="hidden" name="mg_id" value="<?php echo ($mgInfo["mg_id"]); ?>" />
                        <input type="submit" value="修改">
                    </td>
                </tr>  
                
            </table>
            </form>
        </div>
    </body>
</html>