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
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Register Agent/Agency</h3>
					</div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('agent')?>"><span class="btn btn-success"><i class="fa fa-list"></i> Records</span></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="societyRecords" method="POST" action="<?php echo site_url('Agent/new_agent') ?>">
                        	<fieldset>
                        		<div class="col-sm-12">
                        			<legend>Agent/Agency Information</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Type <span class="mandaory">*</span></label>
		                                	<select name='ag_type' class="form-control">
		                                		<option value="">Please select ..</option>
		                                		<option value="1">Agency</option>
		                                		<option value="2">Agent</option>
		                                		<option value="3">Marketing Exe.</option>
		                                	</select>
		                                </div>
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Name <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Name" name='ag_name' class="form-control">
		                                </div>
		                                <div class="col-sm-4">
	                                		<label class="control-label">Contact</label>
	                                		<input type="text" placeholder="Enter Contact No." name="ag_contact" class="form-control">
	                                	</div>
	                                	
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Email</label>
	                                		<input type="text" placeholder="Enter Agent/Agency Email ID" name="ag_email" class="form-control">
	                                	</div>
	                                	<div class="col-sm-4">
		                                	<label class="control-label">State <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="ag_state">
		                                		<option value="">Please Select State</option>
		                                		<?php foreach ($state_details as $key) {
		                                			?>
		                                				<option value="<?php echo $key['st_id']?>"><?php echo $key['st_name'] ?></option>
		                                			<?php

		                                			/*if($state == $key['st_id']){?>
		                                				<option value="<?php echo $key['st_id'] ?>" selected><?php echo $key['st_name'] ?></option>
		                                			<?php }else{ ?>
		                                				<option value="<?php echo $key['st_id'] ?>"><?php echo $key['st_name'] ?></option>
		                                		<?php }*/ }?>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">City <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="ag_city">
		                                		<option value="">Please Select City</option>
		                                		<?php foreach ($city_details as $key) {?>
		                                			<option value="<?php echo $key['ct_id'] ?>"><?php echo $key['ct_name'] ?></option>
		                                		<?php } ?>
		                                	</select>
		                                </div>
		                                
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Pincode <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter Pincode" name="ag_pincode" class="form-control">
	                                	</div>
	                                                            	
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Address <span class="mandaory">*</span></label>
	                                		<textarea rows="3" cols="5" name="ag_address" class="form-control"></textarea>
	                                	</div>
	                                
	                                </div>
	                            </div>
                            </fieldset>
                            <div class="form-group">
                            	<div class="col-sm-10"><br>
                                	<button class="btn btn-md btn-primary" type="submit"><strong>Submit</strong></button>
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