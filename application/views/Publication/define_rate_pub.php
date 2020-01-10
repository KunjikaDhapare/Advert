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
                    	<h3>Define Publication Rate</h3>
					</div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('publication')?>"><span class="btn btn-success"><i class="fa fa-list"></i> Records</span></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="societyRecords" method="POST" action="<?php echo site_url('newSocietyRecords') ?>">
                        	<fieldset>
                        		<div class="col-sm-12">
                        			<legend>Publication Information</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Publication Name <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Publication Name" name='pub_name' class="form-control">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Publication Registration No. <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Publication Registration No." name='pub_reg' class="form-control">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Publication Formation Year <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Last Name" name='pub_date' class="form-control datepicker" readonly="">
		                                </div>
	                                </div>
	                                
	                                <div class="form-group">
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Publication Contact</label>
	                                		<input type="text" placeholder="Enter Society Contact No." name="pub_contact" class="form-control">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Publication Email</label>
	                                		<input type="text" placeholder="Enter Society Email ID" name="pub_email" class="form-control">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Publication Website</label>
	                                		<input type="text" placeholder="Enter Society website URL" name="pub_website" class="form-control">
	                                	</div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">State <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="pub_state">
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
		                                	<select class="form-control" name="pub_city">
		                                		<option value="">Please Select City</option>
		                                		<?php foreach ($city_details as $key) {?>
		                                			<option value="<?php echo $key['ct_id'] ?>"><?php echo $key['ct_name'] ?></option>
		                                		<?php } ?>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
	                                		<label class="control-label">Pincode <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter Pincode" name="pub_pincode" class="form-control">
	                                	</div>
		                             <!--    <div class="col-sm-4">
		                                	<label class="control-label">Publication Area <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="pub_area">
		                                		<option value="">Please Select Area</option>
		                                	</select>
		                                </div> -->
	                                </div>
	                                <div class="form-group">
	                                	
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Address <span class="mandaory">*</span></label>
	                                		<textarea rows="3" cols="5" name="pub_address" class="form-control"></textarea>
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Publication Logo</label>
	                                		<input type="file"  name="pub_logo" class="form-control" style="border: none;">
	                                	</div> 
	                                </div>
	                            </div>
                            </fieldset>
                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Publication Contact Details</legend>                            			
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Publisher Name <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter publisher Name" name="member_name" class="form-control">
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

	                                  <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Incharge Name <span class="mandaory">*</span></label>
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
                        			<legend>Publication Details</legend>                        			
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Periodicity<span class="mandaory">*</span></label>
		                                	<select class="form-control" name="soc_sub_period">
		                                		<option value="">Please Select</option>
		                                		<option value="1">Monthly</option>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Size<span class="mandaory">*</span></label>
		                                	<select class="form-control" name="soc_payment_mode">
		                                		<option value="">Please Select</option>
		                                		<option value="1">A3</option>
		                                		<option value="2">A4</option>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Remark<span class="mandaory">*</span></label>
		                                	<textarea rows="3" cols="5" name="remark" class="form-control"></textarea>
		                                	<!-- <select class="form-control" name="beta_payment">
		                                		<option value="">Please Select</option>
		                                		<option value="1">Beta Payment</option>
		                                	</select> -->
		                                </div>
	                                </div>
	                               <!--  <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Amount to be paid  <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Amount to be paid" class="form-control" readonly="" value="0">
		                                </div>
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Amount Paid  <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Amount paid" name="soc_amount_paid" class="form-control" value="0">
		                                </div>
	                                </div> -->
	                            </div>
                            </fieldset>
                            <div class="form-group">
                            	<div class="col-sm-10"><br>
                                	<button class="btn btn-md btn-primary" type="submit"><strong>Submit</strong></button>
                                	<button class="btn btn-md btn-warning" type="reset"><strong>Reset</strong></button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>