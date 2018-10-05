<div class="login_bg">Roles Permissions</div>    
<div class="login_area">
	<div class="container">
		<center><h1>Welcome to TSONAR</h1></center>
	</div>
</div>
<div class="container">
  <h2>Role Permissions </h2>
	<?php if($this->session->flashdata('success')){ ?>
		<div class="clear30"></div>
		<div class="alert alert-success">
		  <strong>Success!</strong><?php echo $this->session->flashdata('success'); ?>
		</div>
	<?php } ?>

	<?php if($this->session->flashdata('errors')){ ?>
		<div class="clear30"></div>
		<div class="alert alert-danger">
		  <strong>Alert!</strong><?php echo $this->session->flashdata('errors'); ?>
		</div>
	<?php } ?>
	<form  method="post" id="formpost"> 
		<input type="hidden" name="role_id" id="role_id" value="<?php echo $role_id;?>" />
		<input type="hidden" name="pName" id="pName" value="permissions" />
		<input type="hidden" name="action" id="action" value="admin/permissions">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Permission</th>
					<th>View</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				foreach($menus as $menu){ ?>
				<tr>
					<td><?php echo $menu->menu_name;?></td>
					<td><input type="checkbox" class="chk" name="per[<?php echo $menu->menu_slug;?>][view]" id="views" <?php if($permissions[$menu->menu_slug]['view'] == 1 && $menu->menu_slug == $menu->menu_slug){echo "checked='checked'";}?> value="<?php if($permissions[$menu->menu_slug]['view'] == 1){echo 1;}else{echo 0;}?>"></td>
					<td><input type="checkbox" class="chk" name="per[<?php echo $menu->menu_slug;?>][edit]" id="edit" <?php if($permissions[$menu->menu_slug]['edit'] == 1 && $menu->menu_slug == $menu->menu_slug){echo "checked='checked'";}?> value="<?php if($permissions[$menu->menu_slug]['edit'] == 1){echo 1;}else{echo 0;}?>"></td>
					<td><input type="checkbox" class="chk" name="per[<?php echo $menu->menu_slug;?>][delete]" id="delete" <?php if($permissions[$menu->menu_slug]['delete'] == 1 && $menu->menu_slug == $menu->menu_slug){echo "checked='checked'";}?> value="<?php if($permissions[$menu->menu_slug]['delete'] == 1){echo 1;}else{echo 0;}?>"></td>
				</tr>
				<?php }?>
			</tbody>
		</table>
		<div class="clear20"></div>
		<a href="javascript:void(0);" class="btn_login_login2" id="btn_action">Save Permissions</a>
	</form>
</div>