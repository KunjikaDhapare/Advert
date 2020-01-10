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
<?php 
	$ci = &get_instance();
	$wing = $ci->Home_model->fetch_details(array('wing_id'=>$flat_details[0]['flat_wing_id']),'rs_wing'); 
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>New tenants</h3>
					</div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="registerNewTenant" method="POST" action="<?php echo site_url('registerNewTenant') ?>">
                        	<fieldset>
                        		<div class="col-sm-12">
                        			<legend>Flat Details</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-3">
		                                	<label class="control-label">Flat Number <span class="mandaory">*</span></label>
		                                	<input type="text" class="form-control" readonly="" value="<?php echo $flat_details[0]['flat_number'] ?>">
		                                </div>
		                                <div class="col-sm-3">
		                                	<label class="control-label">Wing <span class="mandaory">*</span></label>
		                                	<input type="text" class="form-control" readonly="" value="<?php echo $wing[0]['wing_name'] ?>">
		                                </div>
		                                <div class="col-sm-3">
		                                	<label class="control-label">Area <span class="mandaory">*</span></label>
		                                	<input type="text" class="form-control" readonly="" value="<?php echo $flat_details[0]['flat_area'] ?>">
		                                </div>
		                                <div class="col-sm-3">
		                                	<label class="control-label">Type <span class="mandaory">*</span></label>
		                                	<input type="text" class="form-control" readonly="" value="<?php echo $flat_details[0]['flat_type'] ?>">
		                                </div>
	                                </div>
	                            </div>
                            </fieldset>
                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Flat Owner Details</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Name <span class="mandaory">*</span></label>
		                                	<input type="text" class="form-control" readonly="" value="<?php echo $owner_details[0]['member_name'] ?>">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Email <span class="mandaory">*</span></label>
		                                	<input type="text" class="form-control" readonly="" value="<?php echo $owner_details[0]['member_email'] ?>">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Contact Number <span class="mandaory">*</span></label>
		                                	<input type="text" class="form-control" readonly="" value="<?php echo $owner_details[0]['member_mobile'] ?>">
		                                </div>
	                                </div>
	                            </div>
                            </fieldset>
                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Flat Tenant Details</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-6">
		                                	<label class="control-label">Type<span class="mandaory">*</span></label>
		                                	<select name='tenats_type' class="form-control">
		                                		<option value="">Select</option>
		                                		<option value="1">Family</option>
		                                		<option value="2">Commercial</option>
		                                		<option value="3">Company Guest House</option>
		                                		<option value="3">PG for Students</option>
		                                	</select>
		                                </div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Name <span class="mandaory">*</span></label>
		                                	<input type="text" class="form-control" placeholder="Enter the tenant name" name="tenants_name">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Email <span class="mandaory">*</span></label>
		                                	<input type="text" class="form-control" placeholder="Enter the tenant email" name="tenants_email">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Contact Number <span class="mandaory">*</span></label>
		                                	<input type="text" class="form-control" placeholder="Enter the tenant Contact" name="tenants_mobile">
		                                </div>
	                                </div>
	                            </div>
                            </fieldset>
                            <div class="form-group">
                            	<div class="col-sm-10"><br>
                                	<button class="btn btn-md btn-primary" type="submit"><strong>Apply</strong></button>
                                	<button class="btn btn-md btn-warning" type="reset"><strong>Reset</strong></button>
                                	<a href="<?php echo site_url('tenants') ?>"><span class="btn btn-md btn-success"><strong>Cancel</strong></span></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>