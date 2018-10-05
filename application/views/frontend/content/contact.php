<div class="login_bg">Contact Us</div>
    <div class="login_area">
		<div class="container">
        <div class="container animated fadeIn">
<div class="clear40"></div>
  <div class="row">    
    <div class="col-sm-12" id="parent">
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
    	<div class="col-sm-6">
    	<iframe width="100%" height="320px;" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJaY32Qm3KWTkRuOnKfoIVZws&key=AIzaSyAf64FepFyUGZd3WFWhZzisswVx2K37RFY" allowfullscreen></iframe>
    	</div>

    	<div class="col-sm-6">
    		<form id="formpost" method="post" class="contact-form">
                <input type="hidden" name="action" id="action" value="contact">
		        <div class="form-group con_input_login">
					<input type="text" class="form-control" id="input-nm" name="nm" placeholder="Name" required="" autofocus="">
					<div class="error"></div>
                </div>		    
		        <div class="form-group form_left con_input_login">
					<input type="email" class="form-control" id="input-em" name="em" placeholder="Email" required="">
					<div class="error"></div>
                </div>
		    
				<div class="form-group con_input_login">
					<input type="text" class="form-control" id="input-phone" name="phone" onkeypress="return event.charCode >= 48 && event.charCode <= 57" maxlength="10" placeholder="Mobile No." required="">
					<div class="error"></div>
                </div>
				<div class="form-group con_input_login">
					<textarea class="form-control textarea-contact" rows="5" id="input-FB" name="FB" placeholder="Type Your Message/Feedback here..." required=""></textarea>
					<div class="error"></div>
                    <br>
                <a href="#" class="" id="btn_action"> <button type="button" class="btn btn-default btn-send"> <span class="glyphicon glyphicon-send"></span> Send </button></a>
		      </div>
     		</form>
    	</div>
    </div>
  </div>

  <div class="container second-portion">
	<div class="row">
        <!-- Boxes de Acoes -->
    	<div class="col-xs-12 col-sm-4 col-lg-4">
			<div class="box">							
				<div class="icon">
					<div class="image"><i class="fa fa-envelope" aria-hidden="true"></i></div>
					<div class="info">
						<h3 class="title">MAIL & WEBSITE</h3>
						<p>
							<i class="fa fa-envelope" aria-hidden="true"></i> &nbsp info@tsonar.com
							<br>
							<br>
							<i class="fa fa-globe" aria-hidden="true"></i> &nbsp www.tsonar.com
						</p>
					
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>
			
        <div class="col-xs-12 col-sm-4 col-lg-4">
			<div class="box">							
				<div class="icon">
					<div class="image"><i class="fa fa-mobile" aria-hidden="true"></i></div>
					<div class="info">
						<h3 class="title">CONTACT</h3>
    					<p>
							<i class="fa fa-mobile" aria-hidden="true"></i> &nbsp (+1)-9624XXXXX
							<br>
							<br>
							<i class="fa fa-mobile" aria-hidden="true"></i> &nbsp  (+1)-75670-65254 
						</p>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>
			
        <div class="col-xs-12 col-sm-4 col-lg-4">
			<div class="box">							
				<div class="icon">
					<div class="image"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
					<div class="info">
						<h3 class="title">ADDRESS</h3>
    					<p>
							 <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp 15/3 Junction Plot 
							 "Lorem Ipsum Dolor", Rajkot - 360001.
						</p>
					</div>
				</div>
				<div class="space"></div>
			</div> 
		</div>		    
		<!-- /Boxes de Acoes -->
		
		<!--My Portfolio  dont Copy this -->
	    
	</div>
</div>

</div>
			
			
			
		</div>
	</div>