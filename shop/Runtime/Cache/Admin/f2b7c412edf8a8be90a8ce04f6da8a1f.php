<?php if (!defined('THINK_PATH')) exit();?>













<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<style type="text/css">
 
 ul,li{
 	list-style: none;
 }

</style>
</head>
<script type="text/javascript">

	function check(ids){
		//var id =  parseInt(ids);
		var id = ids;
		document.getElementById(id).checked= true;
	}

</script>

<body>
	<?php echo ($data["role_name"]); ?>
	<form action="" method="post">
		<ul>
			<?php if(is_array($authData0)): foreach($authData0 as $key=>$parent): ?><li>
			 <input name="authname[]" value="<?php echo ($parent["auth_id"]); ?>" type="checkbox" id=<?php echo ($parent["auth_id"]); ?>><?php echo ($parent["auth_name"]); ?>
			  <?php if(in_array(($parent['auth_id']), is_array($data['role_auth_ids'])?$data['role_auth_ids']:explode(',',$data['role_auth_ids']))): ?><script type="text/javascript">
				   check(<?php echo ($parent["auth_id"]); ?>)
			 	  </script><?php endif; ?> 
			 	
			 	<ul>
			 	 <?php if(is_array($authData1)): foreach($authData1 as $key=>$child): if($parent['auth_id'] == $child['auth_pid']): ?><li>
			 	 		 <ul>
			 	 		 <li>
			    			<input	name="authname[]" value="<?php echo ($child["auth_id"]); ?>" type="checkbox"	id="<?php echo ($child["auth_id"]); ?>"> <?php echo ($child["auth_name"]); ?>
			 	 		 </li>
			 	 		  <ul>
			 	 		  	   <?php if(is_array($authData2)): foreach($authData2 as $key=>$child2): if($child2['auth_pid'] == $child['auth_id']): ?><li>
								 	    <input name="authname[]" value="<?php echo ($child2["auth_id"]); ?>" type="checkbox"	id="<?php echo ($child2["auth_id"]); ?>"> <?php echo ($child2["auth_name"]); ?>
			 	 		  	</li>
			 	 		  			 <?php if(in_array(($child2['auth_id']), is_array($data['role_auth_ids'])?$data['role_auth_ids']:explode(',',$data['role_auth_ids']))): ?><script type="text/javascript">
										check(<?php echo ($child2["auth_id"]); ?>)
			 	 						</script><?php endif; endif; endforeach; endif; ?>
			 	 		  	
			 	 		  </ul>
			 	 		 </ul>
			 	 	</li>
									    		
			    		
			    		
			   
			 	 <?php if(in_array(($child['auth_id']), is_array($data['role_auth_ids'])?$data['role_auth_ids']:explode(',',$data['role_auth_ids']))): ?><script type="text/javascript">
						check(<?php echo ($child["auth_id"]); ?>)
			 	 	</script><?php endif; endif; endforeach; endif; ?> 
			 	</ul>
			 	</li><?php endforeach; endif; ?>
			 
		</ul>
		<input type="submit" value="提交">
	</form>

</body>
</html>