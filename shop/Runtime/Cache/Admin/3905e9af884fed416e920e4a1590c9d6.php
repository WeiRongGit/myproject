<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv=content-type content="text/html; charset=utf-8" />
<link href="/730/shop/Public/Admin/CSS/admin.css" type="text/css" rel="stylesheet" />
<script language=javascript>
	function expand(el) {
		childobj = document.getElementById("child" + el);

		if (childobj.style.display == 'none') {
			childobj.style.display = 'block';
		} else {
			childobj.style.display = 'none';
		}
		return;
	}
</script>
</head>
<body>
	<table height="100%" cellspacing=0 cellpadding=0 width=170
		background=/730/shop/Public/Admin/Images/menu_bg.jpg border=0>
		<tr>
			<td valign=top align=middle>


	 		<table cellspacing=0 cellpadding=0 width="100%" border=0>
	 

					<tr>
						<td height=10></td>
					</tr>
				</table>
	
				 <?php if(is_array($pauth_info)): foreach($pauth_info as $key=>$auth): ?><table cellspacing=0 cellpadding=0 width=150 border=0>

					<tr height=22>
						<td style="padding-left: 30px"
							background=/730/shop/Public/Admin/Images/menu_bt.jpg><a
							class=menuparent onclick=expand(<?php echo ($auth["auth_id"]); ?>) href="javascript:void(0);"><?php echo ($auth["auth_name"]); ?></a></td>
					</tr>
					<tr height=4>
						<td></td>
					</tr>
				</table>
				<table id=child<?php echo ($auth["auth_id"]); ?> style="display: none" cellspacing=0 cellpadding=0
					width=150 border=0>
					<?php if(is_array($sauto_info)): foreach($sauto_info as $key=>$sauth): if($sauth['auth_pid'] == $auth['auth_id']): ?><tr height=20>
						<td align=middle width=30><img height=9
							src="/730/shop/Public/Admin/Images/menu_icon.gif" width=9></td>
						<td><a class=menuchild href="/730/shop/index.php/Admin/<?php echo ($sauth["auth_c"]); ?>/<?php echo ($sauth["auth_a"]); ?>" target=right><?php echo ($sauth["auth_name"]); ?></a></td>
					</tr><?php endif; endforeach; endif; ?>
				</table><?php endforeach; endif; ?>
				
					<table cellspacing=0 cellpadding=0 width=150 border=0>

					<tr height=22>
						<td style="padding-left: 30px"
							background=/730/shop/Public/Admin/Images/menu_bt.jpg><a
							class=menuparent onclick=expand("p") href="javascript:void(0);">个人管理</a></td>
					</tr>
					<tr height=4>
						<td></td>
					</tr>
				</table>
				<table id="childp" style="display: none" cellspacing=0 cellpadding=0
					width=150 border=0>

					<tr height=20>
						<td align=middle width=30><img height=9
							src="/730/shop/Public/Admin/Images/menu_icon.gif" width=9></td>
						<td><a class=menuchild href="#" target=main>修改口令</a></td>
					</tr>
					<tr height=20>
						<td align=middle width=30><img height=9
							src="/730/shop/Public/Admin/Images/menu_icon.gif" width=9></td>
						<td><a class=menuchild
							onclick="if (confirm('确定要退出吗？')) return true; else return false;"
							href="/730/shop/index.php/Admin/Manager/login_out" target=_top>退出系统</a></td>
					</tr>
				</table>
			</td>
			<td width=1 bgcolor=#d1e6f7></td>
		</tr>
	</table>
</body>
</html>