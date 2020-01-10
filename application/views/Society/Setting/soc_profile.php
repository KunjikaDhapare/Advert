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
<?php $CI = &get_instance();?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Society Profile</h3>
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
		                                	<input type="text" placeholder="Enter Society Name" name='soc_name' class="form-control" value="<?php echo $key['soc_name'] ?>" readonly>
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
	                                		<input type="text" placeholder="Enter No of Flats" name="soc_no_of_flat" class="form-control" value="<?php echo $key['soc_no_of_flat'] ?>" readonly>
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">No. of shops <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter No of Shops" name="soc_no_shop" class="form-control" value="<?php echo $key['soc_no_shop'] ?>" readonly>
	                                	</div>
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Society Type <span class="mandaory">*</span></label>
		                                	<input type="text" class="form-control" name="soc_category" value="<?php $CI = &get_instance();$category =  $CI->Home_model->fetch_details(array('cat_id'=>$key['soc_category']),'rs_society_categories_types'); echo $category[0]['cat_name'] ?>" readonly>
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
	                                		<label class="control-label">Subsucripation Priod</label>
	                                		<input type="text" placeholder="Enter Society Contact No." name="" class="form-control" value="<?php echo $key['soc_sub_period'].' Months' ?>" readonly>
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Subsucripation State Date</label>
	                                		<input type="text" placeholder="Enter Society Email ID" name="" class="form-control" value="<?php echo $key['soc_sub_start'] ?>" readonly>
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Subsucripation End Date</label>
	                                		<input type="text" placeholder="Enter Society website URL" name="" class="form-control" value="<?php echo $key['soc_sub_end'] ?>" readonly>
	                                	</div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">State <span class="mandaory">*</span></label>
		                                	<input type="text" name="" class="form-control" value="<?php $state =  $CI->Home_model->fetch_details(array('st_id'=>$key['soc_state']),'rs_state'); echo $state[0]['st_name'] ?>" readonly>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">City <span class="mandaory">*</span></label>
		                                	<input type="text" name="" class="form-control" value="<?php $city =  $CI->Home_model->fetch_details(array('ct_id'=>$key['soc_city']),'rs_cities'); echo $city[0]['ct_name'] ?>" readonly>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Society Area <span class="mandaory">*</span></label>
		                                	<input type="text" name="" class="form-control" value="<?php $area =  $CI->Home_model->fetch_details(array('id'=>$key['soc_area']),'rs_ward'); echo $area[0]['name'] ?>" readonly>
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
                            <div class="form-group">
                            	<div class="col-sm-10"><br>
                                	<button class="btn btn-md btn-primary" type="submit"><strong>Update</strong></button>
                                	<a href="<?php echo site_url('Dashboard') ?>"><span class="btn btn-md btn-success" type="reset"><strong>Back</strong></span></a>
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