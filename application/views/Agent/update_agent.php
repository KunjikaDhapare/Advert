<style type="text/css">
	.form-group{
		padding-left: 3%;
		padding-right: 3%;
	}
	.col-sm-12{
	    border: 1px solid;
	    padding-left: 0px;
	    padding-right: 0px;
	}
</style>
<?php $CI = &get_instance(); ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Update Details</h3>
					</div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('agent')?>"><span class="btn btn-success"><i class="fa fa-list"></i> Records</span></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="societyRecords" method="POST" action="<?php echo site_url('updateAgentSave') ?>">
                        	<fieldset>
                        		<div class="col-sm-12">
                        			<legend>Agency / Agent / Marketing Executive Information</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4 hidden">
		                                	<label class="control-label">Name <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter User Name" name='ag_id' class="form-control" value="<?php echo $agent_details[0]['ag_id'] ?>">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Type <span class="mandaory">*</span></label>
		                                	<select name='ag_type' class="form-control">
		                                		<option value="">Please select ..</option>
		                                		<?php if($agent_details[0]['ag_type']== 1) {?>
		                                		<option selected="selected" value="1">Agency</option>
		                                		<option value="2">Agent</option>
		                                		<option value="3">Marketing Exe.</option>
		                                	<?php }else if($agent_details[0]['ag_type']== 2){?>
		                                		<option value="1">Agency</option>
		                                		<option selected="selected" value="2">Agent</option>
		                                		<option value="3">Marketing Exe.</option>
		                                	<?php }else if($agent_details[0]['ag_type']== 3){?>
		                                		<option value="1">Agency</option>
		                                		<option value="2">Agent</option>
		                                		<option selected="selected" value="3">Marketing Exe.</option>
		                                	<?php } ?>
		                                	</select>
		                                </div>
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Name <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Name" name='ag_name' class="form-control" value="<?php echo $agent_details[0]['ag_name'] ?>">
		                                </div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Email <span class="mandaory">*</span></label>
	                                		<input type="email" placeholder="Enter Email ID" name="ag_email" class="form-control" value="<?php echo $agent_details[0]['ag_email'] ?>">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Contact <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter Contact No." name="ag_contact" class="form-control" value="<?php echo $agent_details[0]['ag_contact'] ?>">
	                                	</div>	                               
	                               		<div class="col-sm-4">
		                                	<label class="control-label">State <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="ag_state">
		                                		<option value="">Please Select State</option>
		                                		<?php foreach ($state_details as $key) {
		                                			if($agent_details[0]['ag_state'] == $key['st_id']){?>
		                                				<option value="<?php echo $key['st_id'] ?>" selected><?php echo $key['st_name'] ?></option>
		                                			<?php }else{ ?>
		                                				<option value="<?php echo $key['st_id'] ?>"><?php echo $key['st_name'] ?></option>
		                                		<?php } }?>
		                                	</select>
			                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">City <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="ag_city">
		                                		<option value="">Please Select City</option>
		                                		<?php foreach ($city_details as $key) {
		                                			if($agent_details[0]['ag_city'] == $key['ct_id']){?>
		                                				<option value="<?php echo $key['ct_id'] ?>" selected><?php echo $key['ct_name'] ?></option>
		                                			<?php }else{ ?>
		                                				<option value="<?php echo $key['ct_id'] ?>"><?php echo $key['ct_name'] ?></option>
		                                		<?php } }?>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
	                                		<label class="control-label">Pincode <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter Pincode" name="ag_pincode" class="form-control" value="<?php echo $agent_details[0]['ag_pincode'] ?>">
	                                	</div>
                                                            	
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Address <span class="mandaory">*</span></label>
	                                		<textarea rows="3" cols="5" name="ag_address" class="form-control"><?php echo $agent_details[0]['ag_address'] ?></textarea>
	                                	</div>
	                                </div>
	                            </div>
                            </fieldset>
                            <div class="form-group">
                            	<div class="col-sm-10"><br>
                                	<button class="btn btn-md btn-primary" type="submit"><strong>Update</strong></button>
                                	<button class="btn btn-md btn-warning" type="reset"><strong>Reset</strong></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>