<div class="login_bg">Reset Password</div>    
<div class="login_area">
	<div class="container">
		<div class="login_box login-box-min-height">			
            <div class="clearfix"></div>
			<form method="post" id="formpost">
				<input type="hidden" name="role_id_reg" id="role_id_reg" value="" />
				<input type="hidden" name="action" id="action" value="resetpassword">
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
					<h2>Reset Password</h2>	
					<div class="col-sm-12 input_login">
						<input type="text" id="input-email" name="email" value="" placeholder="Your Email" />
						<img src="<?php echo base_url();?>public/images/email.png" width="16" height="16" alt="">
						<div class="error"></div>
					</div>
				</div>
				<div class="clear40"></div>
				<button type="submit" class="btn_signup" id="btn_action">Reset Password</button>
				<!--<a href="#" class="btn_signup" id="btn_action">Reset Password</a>-->
			</form>
		</div>		
	</div>
</div>