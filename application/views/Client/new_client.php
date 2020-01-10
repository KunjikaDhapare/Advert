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
                    	<h3>Register Client</h3>
					</div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('client')?>"><span class="btn btn-success"><i class="fa fa-list"></i> Records</span></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="societyRecords" method="POST" action="<?php echo site_url('#') ?>">
                        	<fieldset>
                        		<div class="col-sm-12">
                        			<legend>Client Information</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Client Name <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Client Name" name='client_name' class="form-control">
		                                </div>
		                                <div class="col-sm-4">
	                                		<label class="control-label">Client Contact</label>
	                                		<input type="text" placeholder="Enter Society Contact No." name="client_contact" class="form-control">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Client Email</label>
	                                		<input type="text" placeholder="Enter Society Email ID" name="client_email" class="form-control">
	                                	</div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">State <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="client_state">
		                                		<option value="">Please Select State</option>
		                                		<?php foreach ($state_details as $key) {
		                                			if($state == $key['st_id']){?>
		                                				<option value="<?php echo $key['st_id'] ?>" selected><?php echo $key['st_name'] ?></option>
		                                			<?php }else{ ?>
		                                				<option value="<?php echo $key['st_id'] ?>"><?php echo $key['st_name'] ?></option>
		                                		<?php } }?>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">City <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="client_city">
		                                		<option value="">Please Select City</option>
		                                		<?php foreach ($city_details as $key) {?>
		                                			<option value="<?php echo $key['ct_id'] ?>"><?php echo $key['ct_name'] ?></option>
		                                		<?php } ?>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
	                                		<label class="control-label">Pincode <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter Pincode" name="client_pincode" class="form-control">
	                                	</div>
	                                </div>
	                                <div class="form-group">	                                	
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Address <span class="mandaory">*</span></label>
	                                		<textarea rows="3" cols="5" name="client_address" class="form-control"></textarea>
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Client Logo</label>
	                                		<input type="file"  name="client_logo" class="form-control" style="border: none;">
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