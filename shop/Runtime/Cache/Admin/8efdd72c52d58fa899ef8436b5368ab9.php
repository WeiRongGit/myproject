<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <title>管理员列表</title>

        <link href="/730/shop/Public/Admin/CSS/mine.css" type="text/css" rel="stylesheet" />
    </head>
    <body>
        <style>
            .tr_color{background-color: #9F88FF}
        </style>
        <div class="div_head">
            <span>
                <span style="float: left;">当前位置是：权限管理-》管理员列表</span>
                <span style="float: right; margin-right: 8px; font-weight: bold;">
                    <a style="text-decoration: none;" href="/730/shop/index.php/Admin/Manager/add">【添加管理员】</a>
                </span>
            </span>
        </div>
        <div></div>
        <div class="div_search">
            <span>
                <form action="#" method="get">
                    品牌<select name="s_product_mark" style="width: 100px;">
                        <option selected="selected" value="0">请选择</option>
                        <option value="1">苹果apple</option>
                    </select>
                    <input value="查询" type="submit" />
                </form>
            </span>
        </div>
        <div style="font-size: 13px; margin: 10px 5px;">
            <table class="table_a" border="1" width="100%">
                <tbody><tr style="font-weight: bold;">
                        <td>序号</td>
                        <td>管理员名称</td>
                        <td>角色</td>
                        <td align="center">操作</td>
                    </tr>
                    <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mg): $mod = ($i % 2 );++$i;?><tr>
                       <td><?php echo ($i); ?></td>
                     <!--  <td><?php echo ($mg["mg_id"]); ?></td>      -->
                        <td><a href="#"><?php echo ($mg["mg_name"]); ?></a></td>
                        <td> <?php echo ($role[$mg['mg_role_id']]); ?></td>
           				<!--  取得当前用户的权限列表ac，查看这个权限有没有在用户的权限列表 -->
           				 <td><a href="/730/shop/index.php/Admin/Manager/upgrade/id/<?php echo ($mg["mg_id"]); ?>">修改</a>&nbsp;<a href="/730/shop/index.php/Admin/Manager/delete/id/<?php echo ($mg["mg_id"]); ?>">删除</a></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    <!-- 
                     <tr id="product1">
                        <td>2012-10-18 17:40:34</td>
                        <td><a href="/730/shop/index.php/Admin/Manager/upGrade">修改</a></td>
                        <td><a href="javascript:;" onclick="delete_product(1)">删除</a></td>
                    </tr>
                    <tr id="product2">
                        <td>2</td>
                        <td><a href="#">苹果（APPLE）iPhone 4</a></td>
                        <td>100</td>
                        <td>3100</td>
                        <td><img src="/730/shop/Public/Admin/Images/20121018-174248-28718.jpg" height="60" width="60"></td>
                        <td><img src="/730/shop/Public/Admin/Images/20121018-174248-87501.jpg" height="40" width="40"></td>
                        <td>苹果apple</td>
                        <td>2012-10-18 17:42:48</td>
                    </tr>
                    <tr id="product3">
                        <td>3</td>
                        <td><a href="#">苹果（APPLE）iPhone 4 8G版</a></td>
                        <td>100</td>
                        <td>1290</td>
                        <td><img src="/730/shop/Public/Admin/Images/20121018-174346-31424.jpg" height="60" width="60"></td>
                        <td><img src="/730/shop/Public/Admin/Images/20121018-174346-54660.jpg" height="40" width="40"></td>
                        <td>苹果apple</td>
                        <td>2012-10-18 17:43:46</td>
                        <td><a href="#">修改</a></td>
                        <td><a href="javascript:;" onclick="delete_product(3)">删除</a></td>
                    </tr>
                    <tr id="product4">
                        <td>4</td>
                        <td><a href="#">苹果（APPLE）iPhone 4S 16G版</a></td>
                        <td>100</td>
                        <td>987</td>
                        <td><img src="/730/shop/Public/Admin/Images/20121018-174455-91962.jpg" height="60" width="60"></td>
                        <td><img src="/730/shop/Public/Admin/Images/20121018-174455-10118.jpg" height="40" width="40"></td>
                        <td>苹果apple</td>
                        <td>2012-10-18 17:44:30</td>
                        <td><a href="#" >修改</a></td>
                        <td><a href="#" >删除</a></td>
                    </tr>
                    <tr>
                        <td colspan="20" style="text-align: center;">
                            [1]
                        </td>
                    </tr>
                     -->
                </tbody>
                <tfoot>
                	<tr style="height: 100px;text-align: center">
                		<td colspan="10"><?php echo ($pshow); ?></td>
                	</tr>
                </tfoot>
            </table>
        </div>
    </body>
</html>