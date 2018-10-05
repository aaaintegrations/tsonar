<div class="login_bg">Roles Permissions</div>    
<div class="login_area">
	<div class="container">
		<center><h1>Welcome to TSONAR</h1></center>
	</div>
</div>
<div class="container">
  <h2>Role Permissions </h2>
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
	<form  method="post" id="formpost"> 
		<input type="hidden" name="pName" id="pName" value="permissions" />
		<input type="hidden" name="action" id="action" value="admin/permissions">
		<div id="sortable-div" class="col-sm-12 col-xs-12 col-md-9 addSub">        
        <div class="padLR10"> </div>
			<div id="dragdrop" class="col-sm-4 col-xs-4 col-md-4">    
				<div class="well clearfix">
				<div class="header">Container 1</div>
					<div class="dragbleList">
						<ul class="sortable-list">
							<?php 
							foreach($menus as $menu){ ?>
								 <li class="sortable-item" id="<?php echo $menu->id;?>"><?php echo $menu->menu_name;?></li>
							<?php }?>
						</ul>               
					</div>
				</div>    
			</div>
		</div>
		<div class="clear20"></div>
		<a href="javascript:void(0);" class="btn_login_login2" id="btn_action">Save Permissions</a>
	</form>
</div>