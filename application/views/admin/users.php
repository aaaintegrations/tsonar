<div class="login_bg">Users Listing</div>    
<div class="login_area">
	<div class="container">
		<center><h1>Welcome to TSONAR</h1></center>
	</div>
</div>
<div class="container">
  <h2>All Users</h2>            
  <table class="table table-hover">
    <thead>
		<tr>
			<th>Name</th>
			<th>Country</th>
			<th>Email</th>
		</tr>
    </thead>
    <tbody>
	<?php foreach($users as $user){?>
		<tr>
			<td><?php echo $user->firstname.' '.$user->lastname;?></td>
			<td><?php echo $user->country;?></td>
			<td><?php echo $user->email;?></td>
		</tr>
	<?php }?>
    </tbody>
  </table>
</div>