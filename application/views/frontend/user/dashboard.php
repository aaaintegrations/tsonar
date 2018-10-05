<div class="login_bg">Dashboard</div>    
<div class="login_area">
	<div class="container">
		<center><h1>Welcome to TSONAR</h1></center>
	</div>
</div>
<html>
<title></title>
<head>

<!------ Include the above in your HEAD tag ---------->
<style>
.user-row {
    margin-bottom: 14px;
}

.user-row:last-child {
    margin-bottom: 0;
}

.dropdown-user {
    margin: 13px 0;
    padding: 5px;
    height: 100%;
}

.dropdown-user:hover {
    cursor: pointer;
}

.table-user-information > tbody > tr {
    border-top: 1px solid rgb(221, 221, 221);
}

.table-user-information > tbody > tr:first-child {
    border-top: 0;
}


.table-user-information > tbody > tr > td {
    border-top: 0;
}
.toppad
{margin-top:20px;
}
</style>
</head>
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
			<div class="alert alert-success alert-dismissible">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Info!</strong> This data is for demo purpose!.
			</div>
			<div class="panel panel-info">
				<div class="panel-heading">
				  <h3 class="panel-title"><?php echo $this->session->userdata['firstname'].' '.$this->session->userdata['lastname']; ?></h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-3 col-lg-3 " align="center">
							<?php if($this->session->userdata('avatar')){?>
								<img alt="User Pic" src=<?php echo $this->session->userdata('avatar'); ?>" class="img-circle img-responsive"> 
							<?php }else{?>
								<img alt="User Pic" src="<?php echo base_url("public/images/login_icon2.png");?>" class="img-circle img-responsive"> 
							<?php }?>
						</div>
						<div class=" col-md-9 col-lg-9 "> 
							<table class="table table-user-information">
								<tbody>
									<tr>
										<td>Country:</td>
										<td><?php echo $this->session->userdata('country');?></td>
									</tr>
									<tr>
										<td>Date Created:</td>
										<td><?php echo date('M-d-Y', strtotime($this->session->userdata('country'))); ?></td>
									</tr>
									<tr>
										<td>Created From</td>
										<td><?php if($this->session->userdata('user_type') == 'tsonar'){echo 'TSONAR';}else{echo 'LINKEDIN';}?></td>
									</tr>
									<tr>
										<td>User Role</td>
										<td><?php if($this->session->userdata('role_id') == '1'){echo 'Agency';}else if($this->session->userdata('role_id') == '2'){echo 'RPO';}else{echo 'In House';}?></td>
									</tr>
									<tr>
										<td>Email</td>
										<td><a href="mailto:<?php echo $this->session->userdata('email');?>"><?php echo $this->session->userdata('email');?></a></td>
									</tr>                     
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					   
				</div>
			</div>
		</div>
	</div>
</div>