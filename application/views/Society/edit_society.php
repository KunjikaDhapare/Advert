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
                    	<h3>Edit Society</h3>
					</div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('societyRecords')?>"><span class="btn btn-success"><i class="fa fa-list"></i> Records</span></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="societyRecords" method="POST" action="<?php echo site_url('updateSocietyRecords') ?>">
                        	<?php foreach ($society_details as $key) { ?>
                        	<fieldset>
                        		<div class="col-sm-12">
                        			<legend>Society Information</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4 hidden">
		                                	<label class="control-label">Society id <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Society Name" name='soc_id' class="form-control" value="<?php echo $key['soc_id'] ?>">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Society Name <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Society Name" name='soc_name' class="form-control" value="<?php echo $key['soc_name'] ?>">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Society Registration No. <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Society Registration No." name='soc_SRN' class="form-control" value="<?php echo $key['soc_SRN'] ?>">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Society Formation Year <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Last Name" name='soc_SFY' class="form-control datepicker" readonly="" value="<?php echo $key['soc_SFY'] ?>">
		                                </div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
	                                		<label class="control-label">No. of flats <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter No of Flats" name="soc_no_of_flat" class="form-control" value="<?php echo $key['soc_no_of_flat'] ?>">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">No. of shops <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter No of Shops" name="soc_no_shop" class="form-control" value="<?php echo $key['soc_no_shop'] ?>">
	                                	</div>
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Society Type <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="soc_category">
		                                		<option value="">Please Select Type</option>
		                                		<?php foreach ($society_type_details as $key1) { ?>
		                                			<?php if($key['soc_category'] == $key1['cat_id'] ){ ?>
		                                				<option value="<?php echo $key1['cat_id'] ?>" selected><?php echo $key1['cat_name'] ?></option>
		                                			<?php }else{ ?>
		                                				<option value="<?php echo $key1['cat_id'] ?>"><?php echo $key1['cat_name'] ?></option>
		                                		<?php } }?>
		                                	</select>
		                                </div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Society Contact</label>
	                                		<input type="text" placeholder="Enter Society Contact No." name="soc_Phone" class="form-control" value="<?php echo $key['soc_Phone'] ?>">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Society Email</label>
	                                		<input type="text" placeholder="Enter Society Email ID" name="soc_email" class="form-control" value="<?php echo $key['soc_email'] ?>">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Society Website</label>
	                                		<input type="text" placeholder="Enter Society website URL" name="soc_website" class="form-control" value="<?php echo $key['soc_website'] ?>">
	                                	</div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">State <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="soc_state">
		                                		<option value="">Please Select State</option>
		                                		<?php foreach ($state_details as $key1) {
		                                			if($key['soc_state'] == $key1['st_id']){?>
		                                				<option value="<?php echo $key1['st_id'] ?>" selected><?php echo $key1['st_name'] ?></option>
		                                			<?php }else{ ?>
		                                				<option value="<?php echo $key1['st_id'] ?>"><?php echo $key1['st_name'] ?></option>
		                                		<?php } }?>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">City <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="soc_city">
		                                		<option value="">Please Select City</option>
		                                		<?php foreach ($city_details as $key1) {?>
		                                			<?php if($key['soc_city'] == $key1['ct_id']){?>
		                                				<option value="<?php echo $key1['ct_id'] ?>" selected><?php echo $key1['ct_name'] ?></option>
		                                			<?php }else{ ?>
		                                				<option value="<?php echo $key1['ct_id'] ?>"><?php echo $key1['ct_name'] ?></option>
		                                			<?php } ?>
		                                		<?php } ?>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Society Area <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="soc_area">
		                                		<?php $ci=&get_instance();$area_details = $ci->Home_model->fetch_details(array('id'=> $key['soc_area']),'rs_ward') ?>
		                                		<option value="">Please Select Area</option>
		                                		<?php foreach ($area_details as $key1) {?>
		                                			<option value="<?php echo $key1['id'] ?>" selected><?php echo $key1['name'] ?></option>
		                                		<?php } ?>
		                                	</select>
		                                </div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Pincode <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter Contact Number" name="soc_pincode" class="form-control" value="<?php echo $key['soc_pincode'] ?>">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Address <span class="mandaory">*</span></label>
	                                		<textarea rows="3" cols="5" name="soc_address" class="form-control"><?php echo $key['soc_address'] ?></textarea>
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Society Logo</label>
	                                		<input type="file"  name="soc_logo" class="form-control" style="border: none;">
	                                	</div>
	                                </div>
	                            </div>
                            </fieldset>
                           	<!-- <fieldset>
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
                            </fieldset> -->
                            <!-- <fieldset>
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
		                                		<option value="3" selected>3 Month</option>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Payment Mode  <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="soc_payment_mode">
		                                		<option value="">Please Select</option>
		                                		<option value="2" selected>Offline</option>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Offline Payment Mode <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="beta_payment">
		                                		<option value="">Please Select</option>
		                                		<option value="1" selected>Beta Payment</option>
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
		                                	<input type="text" placeholder="Enter Amount paid" name="soc_amount_paid" class="form-control" value="<?php echo $key['soc_amount_paid'] ?>">
		                                </div>
	                                </div>
	                            </div>
                            </fieldset> -->

                            <div class="form-group">
                            	<div class="col-sm-10"><br>
                                	<button class="btn btn-md btn-primary" type="submit"><strong>Update</strong></button>
                                	<button class="btn btn-md btn-warning" type="reset"><strong>Reset</strong></button>
                                	<a href="<?php echo site_url('societyRecords') ?>"><span class="btn btn-md btn-success" type="reset"><strong>Back</strong></span></a>
                                </div>
                            </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>