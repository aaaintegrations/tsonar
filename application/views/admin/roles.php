<div class="login_bg">Roles Listing</div>    
<div class="login_area">
	<div class="container">
		<center><h1>Welcome to TSONAR</h1></center>
	</div>
</div>
<div class="container">
  <h2>All Roles</h2>            
  <table class="table table-hover">
    <thead>
		<tr>
			<th>Name</th>
			<th>Date Created</th>
			<th>Role Permissions</th>
		</tr>
    </thead>
    <tbody>
	<?php foreach($roles as $role){?>
		<tr>
			<td><?php echo $role->role_name;?></td>
			<td><?php echo date('M-d-Y', strtotime($role->created_at));?></td>
			<td><a href="<?php echo base_url('admin/permissions/').$role->id;?>"> <span class="success">Permissions</span></a></td>
		</tr>
	<?php }?>
    </tbody>
  </table>
</div>