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
                    	<h3>Register New Society</h3>
					</div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('societyRecords')?>"><span class="btn btn-success"><i class="fa fa-list"></i> Records</span></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="societyRecords" method="POST" action="<?php echo site_url('newSocietyRecords') ?>">
                        	<fieldset>
                        		<div class="col-sm-12">
                        			<legend>Society Information</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Society Name <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Society Name" name='soc_name' class="form-control">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Society Registration No. <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Society Registration No." name='soc_SRN' class="form-control">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Society Formation Year <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Last Name" name='soc_SFY' class="form-control datepicker" readonly="">
		                                </div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
	                                		<label class="control-label">No. of flats <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter No of Flats" name="soc_no_of_flat" class="form-control">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">No. of shops <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter No of Shops" name="soc_no_shop" class="form-control">
	                                	</div>
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Society Type <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="soc_category">
		                                		<option value="">Please Select Type</option>
		                                		<?php foreach ($society_type_details as $key) { ?>
		                                			<option value="<?php echo $key['cat_id'] ?>"><?php echo $key['cat_name'] ?></option>
		                                		<?php } ?>
		                                	</select>
		                                </div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Society Contact</label>
	                                		<input type="text" placeholder="Enter Society Contact No." name="soc_Phone" class="form-control">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Society Email</label>
	                                		<input type="text" placeholder="Enter Society Email ID" name="soc_email" class="form-control">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Society Website</label>
	                                		<input type="text" placeholder="Enter Society website URL" name="soc_website" class="form-control">
	                                	</div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">State <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="soc_state">
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
		                                	<select class="form-control" name="soc_city">
		                                		<option value="">Please Select City</option>
		                                		<?php foreach ($city_details as $key) {?>
		                                			<option value="<?php echo $key['ct_id'] ?>"><?php echo $key['ct_name'] ?></option>
		                                		<?php } ?>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Society Area <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="soc_area">
		                                		<option value="">Please Select Area</option>
		                                	</select>
		                                </div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Pincode <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter Contact Number" name="soc_pincode" class="form-control">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Address <span class="mandaory">*</span></label>
	                                		<textarea rows="3" cols="5" name="soc_address" class="form-control"></textarea>
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Society Logo</label>
	                                		<input type="file"  name="soc_logo" class="form-control" style="border: none;">
	                                	</div>
	                                </div>
	                            </div>
                            </fieldset>
                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Society Admin Details</legend>                            			
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Admin Name <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Society Admin Name" name="member_name" class="form-control">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Phone No. <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Society Admin phone number." name="member_mobile" class="form-control">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Email ID <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Society Admin email." name="member_email" class="form-control">
		                                </div>
	                                </div>
	                            </div>
                            </fieldset>
                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Payment Details</legend>
                        			<div class="form-group">
                        				<span>Special offer for beta release <span style="color: red;">Free Subscription</span> for 3 Month.</span>
                        			</div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Subscription Period  <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="soc_sub_period">
		                                		<option value="">Please Select</option>
		                                		<option value="3">3 Month</option>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Payment Mode  <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="soc_payment_mode">
		                                		<option value="">Please Select</option>
		                                		<option value="2">Offline</option>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Offline Payment Mode <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="beta_payment">
		                                		<option value="">Please Select</option>
		                                		<option value="1">Beta Payment</option>
		                                	</select>
		                                </div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Amount to be paid  <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Amount to be paid" class="form-control" readonly="" value="0">
		                                </div>
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Amount Paid  <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Amount paid" name="soc_amount_paid" class="form-control" value="0">
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