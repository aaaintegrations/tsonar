<div class="login_bg">Set New Password</div>    
<div class="login_area">
	<div class="container">
		<div class="login_box">
			<form method="post" id="formpost">
				<input type="hidden" name="email" id="email" value="<?php if($this->session->userdata('email')){echo $this->session->userdata('email');}?>">
				<input type="hidden" name="action" id="action" value="resetp">
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
				<div class="alert alert-danger invalid-data">
			  <strong>Alert!</strong>
			</div>
			<div class="alert alert-success response-data">
				<strong>Account created!</strong>
			</div>
				<div class="login_cricle"><img src="<?php echo base_url();?>public/images/login_icon2.png" width="68" height="80" alt=""></div>	
				<div class="clearfix"></div>
				<div class="col-sm-12">
					<h2>Set New Password</h2>	
					<div class="col-sm-12 input_login">
						<input type="password" id="input-password" name="password" value="" placeholder="*****.." />
						<div class="error"></div>
					</div>
					<div class="clear30"></div>
					<div class="col-sm-12 input_login">
						<input type="password" id="input-cpassword" name="cpassword" value="" placeholder="*****.." />
						<div class="error"></div>
					</div>
				</div>
				<div class="clear40"></div>
				<div class="clear40"></div>
				<div class="clear40"></div>
				<a href="#" class="btn_signup" id="btn_action">Set Password</a>
			</form>
		</div>		
	</div>
</div>