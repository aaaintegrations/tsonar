<div class="login_bg">Login</div>    
<div class="login_area user_type_hd_">
	<div class="container">
		<div class="login_box">
		
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
			<div class="login_cricle"><img src="<?php echo base_url();?>public/images/login_icon2.png" width="68" height="80" alt=""></div>	
			<div class="clearfix"></div>		
			<h2>Select recruiter account</h2>	
			<a href="javascript:void(0);" class="btn_login_agency sign-sh_" attr-id="1">Agency</a>
			<a href="javascript:void(0);" class="btn_login_agency sign-sh_" attr-id="2">RPO</a>
			<a href="javascript:void(0);" class="btn_login_agency sign-sh_" attr-id="3">In-house</a>	
			<div class="clear30"></div>
			<!--<a href="#" class="btn_linkedin"><img src="<?php echo base_url();?>public/images/lin-kinkedin.png" width="30" height="29" alt=""> Login  with  LinkedIn</a>-->
			<div class="clear40"></div>
			<!--<a href="#" class="btn_signup">Create account</a>-->
		</div>		
	</div>
</div>
<div class="login_area sign-hd_">
	<div class="container">
		<div class="login_box">
			<div class="login_cricle"><img src="<?php echo base_url();?>public/images/login_icon2.png" width="68" height="80" alt=""></div>
			<div class="clearfix"></div>
			<h2>Agency Recruiter</h2>
			<div class="clearfix"></div>
			<div class="col-sm-12"> 
				<form method="post" id="formpost">		 
					<input type="hidden" name="role_id_reg" id="role_id_reg" value="" />
					<input type="hidden" name="action" id="action" value="login">
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
				 
					<div class="col-sm-12 input_login">
						<input type="text" id="input-email" name="email" value="<?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];}?>" placeholder="Your Email" />
						<img src="<?php echo base_url();?>public/images/user_login_icon.png" width="16" height="16" alt="">
						<div class="error"></div>
					</div>
					 <div class="clear30"></div>
					<div class="col-sm-12 input_login">
						<input type="password" id="input-password" name="password" value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>" placeholder="*****.." />
						<img src="<?php echo base_url();?>public/images/lock_login.png" width="12" height="15" alt="">
						<div class="error"></div>
					</div>
					<div class="clear10"></div>			 
					<div class="col-sm-6">   
						<div class="checkbox">
							<input name='remember_me' id="checkbox1" <?php if(isset($_COOKIE['email'])){echo "checked='checked'";}?> value='1' type="checkbox">
							<label for="checkbox1">Remember Me</label>
						</div>
					</div>					   
					<div class="col-sm-6 text-right">
					   <div class="clear10"></div>
					   <a href="<?php echo base_url('resetpassword');?>" class="forgot_label">Forgot Password?</a>
					</div>        
					<div class="clear20"></div>
					<a href="javascript:void(0);" class="btn_login_login2" id="btn_action">Login</a>
					<div class="clear10"></div>
					<a href="<?php echo base_url();?>linkedin" class="btn_linkedin_login2"><img src="<?php echo base_url();?>public/images/lin-kinkedin.png" width="30" height="29" alt=""> Login  with  LinkedIn</a>         
					<div class="clear40"></div>			
				</form>
			</div>
			<div class="clearfix"></div>
			<a href="<?php echo base_url('signup');?>" class="btn_signup">Create account</a>
		</div>		
	</div>
</div>