<div class="login_bg">Signup</div>    
<div class="login_area user_type_hd_">
	<div class="container">
		<div class="login_box">

			<?php if($this->session->flashdata('success')){ ?>
				<div class="clear30"></div>					<div class="alert alert-success">
					  <strong>Account created!</strong><?php echo $this->session->flashdata('success'); ?>
					</div>
			<?php } ?>

			<?php if($this->session->flashdata('errors')){ ?>
				<div class="clear30"></div>
				<div class="alert alert-danger">
				  <strong>Alert!</strong><?php echo $this->session->flashdata('errors'); ?>
				</div>
			<?php } ?>
			
			<div class="login_cricle"><img src="<?php echo base_url();?>public/images/login_icon2.png" width="68" height="80" alt=""></div>	
			<div class="clearfix"></div>		
			<h2>Select recruiter account</h2>	
			<a href="javascript:void(0);" class="btn_login_agency sign-sh_" attr-id="1">Agency</a>
			<a href="javascript:void(0);" class="btn_login_agency sign-sh_" attr-id="2">RPO</a>
			<a href="javascript:void(0);" class="btn_login_agency sign-sh_" attr-id="3">In-house</a>	
			<div class="clear30"></div>
			<!--<a href="#" class="btn_linkedin"><img src="<?php echo base_url();?>public/images/lin-kinkedin.png" width="30" height="29" alt=""> Login  with  LinkedIn</a>-->
			<div class="clear40"></div>
			<a href="#" class="btn_signup">Create account</a>	
		</div>		
	</div>
</div>
<div class="login_area sign-hd_">
	<div class="container">
		<div class="login_box">
			<form method="post" id="formpost">
				<input type="hidden" name="action" id="action" value="signup">
				<div class="login_cricle"><img src="<?php echo base_url();?>public/images/login_icon2.png" width="68" height="80" alt=""></div>	
				<div class="clearfix"></div>
				<h2>Signup</h2>	
				<div class="clearfix"></div>
				<div class="col-sm-12">
								
					<input type="hidden" name="role_id_reg" id="role_id_reg" value="" />
					<div class="col-sm-12 input_login">
						<input type="text" id="input-first_name" name="first_name" value="<?php echo set_value('first_name'); ?>" placeholder="First Name" />
						<div class="error"></div>
					</div>
					<div class="clear30"></div>
					<div class="col-sm-12 input_login">
						<input type="text" id="input-last_name" name="last_name" value="" placeholder="Last Name" />
						<div class="error"></div>
					</div>
					<div class="clear30"></div>
					<div class="col-sm-12 input_login">
						<input type="text" id="input-email" name="email" value="" placeholder="Your Email" />
						<img src="<?php echo base_url();?>public/images/email.png" width="16" height="16" alt="">
						<div class="error"></div>
					</div>
					<div class="clear30"></div>
					<div class="col-sm-12 input_login">
						<!--<input type="text" id="input-country" name="country" value="" placeholder="Country" />-->
						<select id="input-country" name="country">
							<option value='none'>Select your Country</option>
							<?php foreach($countries as $country){?>
								<option value="<?php echo $country->country_code;?>"><?php echo $country->country_name;?></option>
							<?php }?>
						</select>
						<div class="error"></div>
					</div>
					<div class="clear30"></div>
					<div class="col-sm-12 input_login">
						<input type="password" id="input-password" name="password" value="" placeholder="*****.." />
						<div class="error"></div>
					</div>
					<div class="clear30"></div>
					<div class="col-sm-12 input_login">
						<input type="password" id="input-cpassword" name="cpassword" value="" placeholder="*****.." />
						<div class="error"></div>
					</div>
					<div class="clear30"></div>
					<a href="<?php echo base_url();?>linkedin" class="btn_linkedin_login2"><img src="<?php echo base_url();?>public/images/lin-kinkedin.png" width="30" height="29" alt=""> Login with LinkedIn</a>
					<div class="clear40"></div>
				</div>
				<div class="clearfix"></div>
				<button type="submit" class="btn_signup" id="btn_action">Create account</button>
			</form>
		</div>
	</div>
</div>