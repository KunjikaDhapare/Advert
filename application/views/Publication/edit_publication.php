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
                    	<h3>Register New Publication</h3>
					</div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('publication')?>"><span class="btn btn-success"><i class="fa fa-list"></i> Records</span></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="societyRecords" method="POST" action="<?php echo site_url('updatePublicationRecords') ?>">
                        	<fieldset>
                        		<div class="col-sm-12">
                        			<legend>Publication Information</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Publication Company<span class="mandaory">*</span></label><?php //print_r($all_com);?>
		                                	<select class="form-control" name="pub_company">
		                                	<option value="">Please Select Company</option>
		                                	<?php foreach ($all_com as $key) {
		                                			if($key['com_com_id'] == $publication[0]['pub_com_id']) {?>
		                                				<option selected="selected" value="<?php echo $key['com_id'] ?>"><?php echo $key['com_name'] ?></option>
		                                			<?php }else{?>
		                                				<option value="<?php echo $key['com_id'] ?>"><?php echo $key['com_name'] ?></option>
		                                			<?php } }?>   
		                                	</select>                           
		                                </div>

	                                	<div class="col-sm-4">
		                                	<label class="control-label">Publication Name <span class="mandaory">*</span></label>
		                                	<input type="text" readonly="readonly" placeholder="Enter Publication Name" name='pub_name' class="form-control" value="<?php echo $publication[0]['pub_name']?>" >
		                                	<input type="hidden" name='pub_id' class="form-control" value="<?php echo $publication[0]['pub_id']?>">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Publication Registration No. <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Publication Registration No." name='pub_reg' class="form-control" value="<?php echo $publication[0]['pub_reg_no']?>">
		                                </div>
		                            </div>
	                               
	                                
	                                <div class="form-group">
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Publication Contact</label>
	                                		<input type="text" placeholder="Enter Publication Contact No." name="pub_contact" class="form-control" value="<?php echo $publication[0]['pub_contact']?>">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Publication Email</label>
	                                		<input type="text" placeholder="Enter Publication Email ID" name="pub_email" class="form-control" value="<?php echo $publication[0]['pub_email']?>">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Publication Website</label>
	                                		<input type="text" placeholder="Enter Publication website URL" name="pub_website" class="form-control" value="<?php echo $publication[0]['pub_website']?>">
	                                	</div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">State <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="pub_state">
		                                		<option value="">Please Select State</option>
		                                		<?php foreach ($state_details as $key) {
		                                			if($publication[0]['pub_state'] == $key['st_id']){?>
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
		                                		<?php foreach ($city_details as $key) {
		                                			if($publication[0]['pub_city'] == $key['ct_id']){?>
		                                				<option value="<?php echo $key['ct_id'] ?>" selected><?php echo $key['ct_name'] ?></option>
		                                			<?php }else{ ?>
		                                				<option value="<?php echo $key['ct_id'] ?>"><?php echo $key['ct_name'] ?></option>
		                                		<?php } }?>

		                                		
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
	                                		<label class="control-label">Pincode <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter Pincode" name="pub_pincode" class="form-control" value="<?php echo $publication[0]['pub_pincode']?>">
	                                	</div>
		                             
	                                </div>
	                                <div class="form-group">
	                                	   <div class="col-sm-4">
		                                	<label class="control-label">Publication Code<span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter publication code" name="pub_code" class="form-control" value="<?php echo $publication[0]['pub_code']?>">
		                                </div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Address <span class="mandaory">*</span></label>
	                                		<textarea rows="3" cols="5" name="pub_address" class="form-control"><?php echo $publication[0]['pub_address']?></textarea>
	                                	</div>
	                                	<!-- <div class="col-sm-4">
	                                		<label class="control-label">Publication Logo</label>
	                                		<input type="file"  name="pub_logo" class="form-control" style="border: none;">
	                                	</div>  -->
	                                </div>
	                            </div>
                            </fieldset>
                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Publication Contact Details</legend>                            			
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Publisher Name <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter publisher Name" name="member_name1" class="form-control" value="<?php if($publisher){ echo $publisher[0]['cont_name'];
		                                	} ?>">
		                                	<input type="hidden" name="member_id1" class="form-control" value="<?php if($publisher){ echo $publisher[0]['cont_id'];
		                                	} ?>">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Phone No. <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Society Admin phone number." name="member_mobile1" class="form-control" value="<?php if($publisher){ echo $publisher[0]['cont_mobile'];
		                                	} ?>">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Email ID <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Society Admin email." name="member_email1" class="form-control" value="<?php if($publisher){ echo $publisher[0]['cont_email'];
		                                	} ?>" >
		                                </div>
	                                </div>

	                                  <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Incharge Name <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Society Admin Name" name="member_name2" class="form-control" required="" value="<?php if($incharge){ echo $incharge[0]['cont_name']; } ?>">
		                                	<input type="hidden" name="member_id2" class="form-control" value="<?php if($publisher){ echo $incharge[0]['cont_id'];
		                                	} ?>">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Phone No. <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Society Admin phone number." name="member_mobile2" class="form-control" required="" value="<?php if($incharge){ echo $incharge[0]['cont_mobile'];
		                                	} ?>">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Email ID <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Society Admin email." name="member_email2" class="form-control" value="<?php if($incharge){ echo $incharge[0]['cont_email'];
		                                	} ?>">

		                                </div>
	                                </div>
	                            </div>
                            </fieldset>
                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Publication Details</legend>                        			
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Publication Size Type<span class="mandaory">*</span></label>
		                                	<select class="form-control" name="pub_size_type">
		                                		<option value="">Please Select</option>
		                                		 <?php foreach ($size_type as $key) { 
		                                		 		if($key['size_type_id'] == $publication[0]['pub_size_type']){
		                                		 	?>
                                                        <option selected="selected" value="<?php echo $key['size_type_id'] ?>"><?php echo $key['size_type_name'] ?></option>
                                                    <?php }else {?>
                                                    	 <option value="<?php echo $key['size_type_id'] ?>"><?php echo $key['size_type_name'] ?></option>
                                                    <?php }} ?>
		                                	</select>
		                                </div>
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Height<span class="mandaory">*</span></label>
		                                	<input type="text" name="pub_actual_height" placeholder="Actual height in cm" class="form-control" value="<?php echo $publication[0]['pub_actual_height']?>">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Width<span class="mandaory">*</span></label>
		                                	<input type="text" name="pub_actual_width" placeholder="Actual width in cm" class="form-control" value="<?php echo $publication[0]['pub_actual_width']?>">
		                                </div>
		                               
		                                
	                                </div>

	                                <div class="form-group">
	                                	 <div class="col-sm-4">
		                                	<label class="control-label">Print Size Height<span class="mandaory">*</span></label>
		                                	<input type="text" name="pub_print_height" placeholder="Print Size height in cm" class="form-control" value="<?php echo $publication[0]['pub_print_height']?>">
		                                </div>
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Print Size Width<span class="mandaory">*</span></label>
		                                	<input type="text" name="pub_print_width" placeholder="Print Size width in cm" class="form-control" value="<?php echo $publication[0]['pub_print_width']?>">
		                                </div>
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Periodicity<span class="mandaory">*</span></label>
		                                	<select class="form-control" name="pub_periodicity_id">
		                                		<option value="">Please Select</option>
		                                		  <?php foreach ($periodicity as $key) {
		                                		  		if($key['per_id'] == $publication[0]['pub_periodicity_id']) {?>
                                                        <option selected="selected" value="<?php echo $key['per_id'] ?>"><?php echo $key['per_name'] ?></option>
                                                    <?php } else {?>
                                                    	<option value="<?php echo $key['per_id'] ?>"><?php echo $key['per_name'] ?></option>
                                                    <?php } }?>
		                                		
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Publish Date <span class="mandaory"></span></label>
		                                	<input type="text" name="pub_publish_date" placeholder="Publish Date" class="form-control datepicker" readonly="">
		                                </div>
		                                  <div class="col-sm-4">
		                                	<label class="control-label">Publish Date 1 <span class="mandaory"></span></label>
		                                	<input type="text" name="pub_publish_date_1" placeholder="Publish Date" class="form-control datepicker" readonly="">
		                                </div>
		                                  <div class="col-sm-4">
		                                	<label class="control-label">Publish Date 2 <span class="mandaory"></span></label>
		                                	<input type="text" name="pub_publish_date_2" placeholder="Publish Date" class="form-control datepicker" readonly="">
		                                </div>
		                                  <div class="col-sm-4">
		                                	<label class="control-label">Publish Date 3 <span class="mandaory"></span></label>
		                                	<input type="text" name="pub_publish_date_3" placeholder="Publish Date" class="form-control datepicker" readonly="">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Publish Date 4 <span class="mandaory"></span></label>
		                                	<input type="text" name="pub_publish_date_4" placeholder="Publish Date" class="form-control datepicker" readonly="">
		                                </div>
		                               
		                                <div class="col-sm-4">
		                                	<label class="control-label">Remark<span class="mandaory"></span></label>
		                                	<textarea rows="3" cols="5" name="remark" class="form-control "></textarea>
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
                                	<button class="btn btn-md btn-primary" type="submit"><strong>Update</strong></button>
                                	<button class="btn btn-md btn-warning" type="reset"><strong>Cancel</strong></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>