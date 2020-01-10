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
	.center{
		text-align: center;
	}
</style>
<?php $CI = &get_instance();?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    	<h3>Adverties Scheduling</h3>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="createAdv" method="POST" action="<?php echo site_url('Adverties/insert_Adv') ?>">
                        	<fieldset>
                        		<div class="col-sm-12">
                        			<legend>Adverties Details</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Adverties For</ARTICLE> <span class="mandaory">*</span></label>
	                                		<textarea  name="" class="form-control" required="" readonly><?php echo $adv_details[0]['adv_for'] ?></textarea>
	                                	</div>
	                                	<?php 
	                                		$pub = $CI->Home_model->fetch_details('pub_id = '.$adv_details[0]['adv_pub_id'].'','ad_publication');
	                                	?>
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Publication<span class="mandaory">*</span></label>
		                                    <select class="form-control" name="" disabled="">
                                            <option value="<?php echo $pub[0]['pub_id'] ?>">
                                                <?php echo $pub[0]['pub_name'] ?> 
                                            </select>                        
		                                </div>
		                                <?php 
		                                	$per = $CI->Home_model->fetch_details('per_id = '.$adv_details[0]['adv_periodicity'].'','ad_periodicity');
		                                ?>
		                                <div class="col-sm-4">
	                                		<label class="control-label">Periodicity <span class="mandaory">*</span></label>
		                                	<select name='adv_periodicity' class="form-control" disabled="">
		                                		<option value="<?php echo $per[0]['per_id'] ?>"><?php echo $per[0]['per_name'] ?></option>
		                                	</select>
	                                	</div>
	                                </div>	
	                            </div>
                            </fieldset>
                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Schedule Advert</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Schedule type <span class="mandaory">*</span></label>
		                                	<select name='sch_type' class="form-control">
		                                		<option value="">Please select ..</option>
		                                		<option value="1">Single Adverties</option>
		                                		<option value="2">Package</option>
		                                	</select>		                                	
		                                </div>
		                                <?php 
	                                		$package = $CI->Home_model->fetch_details('pk_pub_id = '.$adv_details[0]['adv_pub_id'].'','ad_package');
	                                	?>
										<div class="col-sm-4 hidden" id="pac_details">
	                                		<label class="control-label">Schedule Package</label>
	                                		<select class="form-control" name="sch_package">
	                                			<option value="">Please select..</option>
	                                			<?php foreach ($package as $key) { ?>
	                                				<option value="<?php echo $key['pk_id']; ?>"><?php echo $key['pk_name']; ?></option>
	                                			<?php } ?>
	                                		</select>
	                                	</div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-10">
		                                	 <div class="table-responsive">
		                                	 	<table class="table">
		                                	 		<thead id="sch_records_thead">
		                                	 			
		                                	 		</thead>
		                                	 		<tbody id="sch_records_tbody">
		                                	 			
		                                	 		</tbody>
		                                	 	</table>
		                                	 </div>        	             	
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
                    <!-- Add Client Modal -->
                    <div id="disableNewCl" class="modal fade" role="dialog">
                        <div class="modal-dialog" style="width: 75%">
                            <!-- Modal content-->
                            <form class="form-horizontal" id="" role="form" method="POST" style="position: relative;z-index: 10000;">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <fieldset>
		                        		<div class="col-sm-12">
		                        			<legend>Client Information</legend>
			                                <div class="form-group">
			                                	<div class="col-sm-4">
				                                	<label class="control-label">Name <span class="mandaory">*</span></label>
				                                	<input type="text" placeholder="Enter Name" name='cl_name' class="form-control">
				                                </div>
				                                <div class="col-sm-4">
			                                		<label class="control-label">Contact</label>
			                                		<input type="text" placeholder="Enter Contact No." name="cl_contact" class="form-control">
			                                	</div>
			                                		<div class="col-sm-4">
			                                		<label class="control-label">Email</label>
			                                		<input type="text" placeholder="Enter Agent/Agency Email ID" name="cl_email" class="form-control">
			                                	</div>
			                                </div>
			                                <div class="form-group">
			                                
			                                	<div class="col-sm-4">
				                                	<label class="control-label">State <span class="mandaory">*</span></label>
				                                	<select class="form-control" name="cl_state">
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
				                                	<select class="form-control" name="cl_city">
				                                		<option value="">Please Select City</option>
				                                		<?php foreach ($city_details as $key) {?>
				                                			<option value="<?php echo $key['ct_id'] ?>"><?php echo $key['ct_name'] ?></option>
				                                		<?php } ?>
				                                	</select>
				                                </div>
				                                <div class="col-sm-4">
			                                		<label class="control-label">Pincode <span class="mandaory">*</span></label>
			                                		<input type="text" placeholder="Enter Pincode" name="cl_pincode" class="form-control">
			                                	</div>
			                                </div>
			                                <div class="form-group">
			                                	<div class="col-sm-4">
			                                		<label class="control-label">Address <span class="mandaory">*</span></label>
			                                		<textarea rows="3" cols="5" name="cl_address" class="form-control"></textarea>
			                                	</div>
			                                
			                                </div>
			                            </div>
		                            </fieldset>
                                </div>
                                <div class="modal-footer">
                                    <span type="" id="clientRecords" class="btn btn-success">Save</span>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>

                     <!-- Add Agency Modal -->
                    <div id="disableNewAg" class="modal fade" role="dialog">
                        <div class="modal-dialog" style="width: 75%">
                            <!-- Modal content-->
                            <form class="form-horizontal" id="" role="form" method="POST" style="position: relative;z-index: 10000;">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <fieldset>
		                        		<div class="col-sm-12">
		                        			<legend>Agency/Agent Information</legend>
			                                <div class="form-group">
			                                	<div class="col-sm-4">
				                                	<label class="control-label">Type <span class="mandaory">*</span></label>
				                                	<select name='ag_type' class="form-control">
				                                		<option value="">Please select ..</option>
				                                		<option value="1">Agency</option>
				                                		<option value="2">Agent</option>
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
                                </div>
                                <div class="modal-footer">
                                    <span type="" id="agentRecords" class="btn btn-success">Save</span>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>