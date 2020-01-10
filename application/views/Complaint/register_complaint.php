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
                    	<h3>New Grievance</h3>
					</div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="registerComplaint" method="POST" action="<?php echo site_url('registerComplaint') ?>">
                        	<fieldset>
                        		<div class="col-sm-12">
                        			<legend>Grievance Details</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Subject <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Complaint Subject" name='complaint_subject' class="form-control">
		                                </div>
	                                	<div class="col-sm-6">
		                                	<label class="control-label">Description <span class="mandaory">*</span></label>
		                                	<textarea name='complaint_description' class="form-control"></textarea>
		                                </div>
	                                </div>
                            </fieldset>
                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Against Whom</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Grievance Scope<span class="mandaory">*</span></label>
		                                	<select name='complaint_scope' class="form-control">
		                                		<option value="">Complaint Scope</option>
		                                		<option value="1">Public</option>
		                                		<option value="2">Private</option>
		                                	</select>
		                                </div>
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Grievance For<span class="mandaory">*</span></label>
		                                	<select name='complaint_for' class="form-control">
		                                		<option value="">Complaint For</option>
		                                		<option value="1">All</option>
		                                		<option value="2">Only For Selected</option>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4 hidden" id="against">
		                                	<label class="control-label">Against<span class="mandaory">*</span></label>
		                                	<div class="radio">
                                                <label> <input type="radio" value="1" name="complaint_against"> Select Role </label>&nbsp &nbsp
                                                <label> <input type="radio" value="2" name="complaint_against"> Select Flat/Wing/Members </label>
                                        	</div>
		                                </div>
	                                </div>
	                                <div class="form-group hidden" id="role">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Against Role<span class="mandaory">*</span></label>
		                                	<select name='complaint_role' class="form-control">
		                                		<option value="">Select Role</option>
		                                		<?php foreach ($role_records as $key) {?>
		                                			<option value="<?php echo $key['id']?>"><?php echo $key['role']?></option>
		                                		<?php } ?>
		                                	</select>
		                                </div>
		                            </div>
		                            <div class="form-group hidden" id="wing_flat_member">
		                                <div class="col-sm-4">
		                                	<label class="control-label">Against Wing<span class="mandaory">*</span></label>
		                                	<select name='complaint_wing_id' class="form-control">
		                                		<option value="0">All</option>
		                                		<?php foreach ($wing_records as $key) {?>
		                                			<option value="<?php echo $key['wing_id']; ?>"><?php echo $key['wing_name']; ?></option>
		                                		<?php } ?>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Against Flat<span class="mandaory">*</span></label>
		                                	<select name='complaint_flat_id' class="form-control">
		                                		<option value="">Select flat</option>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4 hidden">
		                                	<label class="control-label">Against Owner<span class="mandaory">*</span></label>
		                                	<select name='complaint_flat_user' class="form-control">
		                                		<option value="">Select Owner</option>
		                                	</select>
		                                </div>
	                                </div>
                            </fieldset>
                            <div class="form-group">
                            	<div class="col-sm-10"><br>
                                	<button class="btn btn-md btn-primary" type="submit"><strong>Submit Grievance</strong></button>
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