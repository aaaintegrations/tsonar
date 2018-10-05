<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php $this->load->view('frontend/include/head');?>
<body>
<header role="banner" id="tsonar-header">
	<div class="container">
		<!-- <div class="row"> -->
		<nav class="navbar navbar-default">
		<div class="navbar-header">
			<!-- Mobile Toggle Menu Button -->
			<a href="#" class="js-tsonar-nav-toggle tsonar-nav-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
			<a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>public/images/logo.png" alt=""></a> 
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">                                           
				<li class="<?php if(isset($page) && (trim($page) == 'home')){ echo 'active'; } ?>"><a href="<?php echo base_url();?>"><span>Home</span></a></li>
				<li><a href="#" ><span>Tsonar Services</span></a></li>
				<li><a href="#"><span>Hire Now</span></a></li>
				<li><a href="#"><span>Services</span></a></li>
				<li><a href="<?php echo base_url('contact');?>"><span>Contact us</span></a></li> 
				
				<?php if(isset($this->session->userdata['id'])){ ?>
					<li class="<?php if(isset($page) && $page == 'dashboard'){ echo 'active'; } ?>"><a href="<?php echo base_url('logout');?>" ><span><img src="<?php echo base_url();?>public/images/login_icon.png" width="16" height="16" alt=""> Logout</span></a></li>
				<?php } else{?>
					<li class="<?php if(isset($page) && $page == 'login'){ echo 'active'; } ?>"><a href="<?php echo base_url('login');?>" ><span><img src="<?php echo base_url();?>public/images/login_icon.png" width="16" height="16" alt=""> Login</span></a></li>
					<li class="<?php if(isset($page) && $page == 'signup'){ echo 'active'; } ?>"><a href="<?php echo base_url('signup');?>"><span><img src="<?php echo base_url();?>public/images/lock_icon.png" width="12" height="15" alt=""> Signup</span></a></li>
				<?php } ?>
			</ul>
		</div>
		</nav>
		<!-- </div> -->
	</div>
</header>