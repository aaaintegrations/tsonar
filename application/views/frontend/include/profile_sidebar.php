<?php 
	$data = $this->comman_model->get('user',array('user_id'=>$this->session->userdata('user_id')));
	$data = $data[0];
?>		

<div class="profile-sidebar">
	<!-- SIDEBAR USERPIC -->
	<div class="profile-userpic center-block">
		<img src="<?php 
			if($data['avatar'] == "")
			echo base_url('assets/img').'/avatar_2x.png';
			else 
			echo base_url().'/'.$data['avatar'];	
		?>" class="img-responsive" alt="">
	</div>
	<div >
		<form action="" method="POST" enctype="multipart/form-data">
			
		</form>
	</div>
	<!-- END SIDEBAR USERPIC -->
	<!-- SIDEBAR USER TITLE -->
	
	<div class="profile-usertitle">
		<div class="profile-usertitle-name">
			<?php echo $data['first_name']." ".$data['last_name']; ?>
		</div>
		<div class="profile-usertitle-job">
			<?php echo $data['businessname']; ?>
		</div>
	</div>
	<!-- END SIDEBAR USER TITLE -->
	
	<!-- SIDEBAR MENU -->
	<div class="profile-usermenu">
		<ul class="nav">
			<li class="active">
				<a href="<?php echo base_url('home/profile'); ?>">
				<i class="fa fa-home" aria-hidden="true"></i>
				Profile Overview </a>
			</li>
			<li>
				<a href="<?php echo base_url('home/my_booking'); ?>">
				<i class="fa fa-flag" aria-hidden="true"></i>
				My Booking </a>
			</li>
		</ul>
	</div>
	<!-- END MENU -->
</div>