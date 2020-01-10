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
                    	<h3>Register Adverties</h3>
					</div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('adverties')?>"><span class="btn btn-success"><i class="fa fa-list"></i> Records</span></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="createAdv" method="POST" action="<?php echo site_url('Adverties/insert_Adv') ?>">
                        	<fieldset>
                        		<div class="col-sm-12">
                        			<legend>Adverties Details</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Advt. Caption / Subject</ARTICLE> <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter Adverties For" name="adv_for" class="form-control" required="">
	                                	</div>
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Publication<span class="mandaory">*</span></label>
		                                    <select class="form-control" name="adv_pub_id">
                                            <option value="">Please Select Publication</option>
                                            <?php foreach ($all_pub as $key) {?>
                                            <option value="<?php echo $key['pub_id'] ?>">
                                                <?php echo $key['pub_name'] ?>
                                            </option>
                                                    <?php } ?>   
                                            </select>                        
		                                </div>
		                                <div class="col-sm-4">
	                                		<label class="control-label">Periodicity <span class="mandaory">*</span></label>
		                                	<select name='adv_periodicity' class="form-control" readonly>
		                                		<option value="">Please select ..</option>
		                                	</select>
	                                	</div>
	                                </div>

	                                <div class="form-group">
	                                 	<div class="col-sm-4">
	                                		<label class="control-label">Size <span class="mandaory">*</span></label>
		                                	<select name='adv_size_id' class="form-control">
		                                		<option value="">Please select ..</option>
		                                	</select>
	                                	</div>

	                                	<div class="col-sm-4">
	                                		<label class="control-label">Height (in cm) <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter Height(in cm)" name="adv_size_height" class="form-control" readonly="">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Width (in cm) <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter Width(in cm)" name="adv_size_width" class="form-control" readonly="">
	                                	</div>	                                	 
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Advt. type<span class="mandaory">*</span></label>
		                                	<select name='adv_color' class="form-control">
		                                		<option value="">Please select ..</option>
		                                		<option value="1">Black AND White</option>
		                                		<option value="2">Color</option>
		                                	</select>
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Rate as per rate card <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter Rate" name="adv_rate" class="form-control" readonly="">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Final Bill Rate <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter Rate" name="adv_final_rate" class="form-control">
	                                	</div>
	                                </div>	
	                            </div>
                            </fieldset>
                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Advertiser / Client Details
                        			<button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-id="2" data-target="#disableNewCl" style="float: right;"><i class="fa fa-plus" title="+"> New Client</i>  </button></legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Client <span class="mandaory">*</span></label>
		                                	<select name='adv_client_name' class="form-control">
		                                		<option value="">Please select ..</option>
		                                		<?php foreach ($all_client as $key) {
		                                			?>
		                                				<option value="<?php echo $key['cl_id']?>"><?php echo $key['cl_name'] ?></option>
		                                			<?php }?>

		                                	</select>		                                	
		                                </div>
										<div class="col-sm-4" >
	                                		<label class="control-label">Contact</label>
	                                		<input type="text" placeholder="Enter Contact No." name="adv_client_contact" class="form-control" readonly="">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Email</label>
	                                		<input type="text" placeholder="Enter Email ID" name="adv_client_email" class="form-control" readonly="">
	                                	</div>
	                                </div>
	                            </div>
                            </fieldset>
                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Advt. Agency/ Agent / Pratinidhi Details <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-id="2" data-target="#disableNewAg" style="float: right;"><i class="fa fa-plus" title="+"> New Agency</i>  </button></legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Agency / Pratinidhi <span class="mandaory"></span></label>
		                                	<select name='adv_agent' class="form-control">
		                                		<option value="">Please select ..</option>
		                                		<?php foreach ($all_agent as $key) {
		                                			?>
		                                				<option value="<?php echo $key['ag_id']?>"><?php echo $key['ag_name'] ?></option>
		                                			<?php }?>

		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
	                                		<label class="control-label">Contact</label>
	                                		<input type="text" placeholder="Enter Contact No." name="adv_agent_contact" class="form-control" readonly="">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Email</label>
	                                		<input type="text" placeholder="Enter Email ID" name="adv_agent_email" class="form-control" readonly="">
	                                	</div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Commission in %</label>
	                                		<input type="text" placeholder="Enter Commission" name="adv_agent_comm" class="form-control" >
	                                	</div>
	                                </div>
	                            </div>
                            </fieldset>
                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Marketing Excutive Details</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Marketing Ex. <span class="mandaory">*</span></label>
		                                	<select name='adv_support' class="form-control">
		                                		<option value="">Please select ..</option>
		                                		<?php foreach ($all_MarketEx as $key) {
		                                			?>
		                                				<option value="<?php echo $key['ag_id']?>"><?php echo $key['ag_name'] ?></option>
		                                			<?php }?>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
	                                		<label class="control-label">Commission in %</label>
	                                		<input type="text" placeholder="" name="adv_support_comm" class="form-control">
	                                	</div>
	                                </div>
	                            </div>
                            </fieldset>
                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Incharge Details</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Incharge <span class="mandaory">*</span></label>
		                                	<select name='adv_incharge' class="form-control">
		                                		<option value="">Please select ..</option>
		                                			<?php foreach ($incharge as $key) {
		                                			?>
		                                				<option value="<?php echo $key['member_id']?>"><?php echo $key['member_name'] ?></option>
		                                			<?php }?>

		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Project Head<span class="mandaory">*</span></label>
		                                	<select name='adv_department_head_id' class="form-control">
		                                		<option value="">Please select ..</option>
		                                			<?php foreach ($prjHead as $key) {
		                                			?>
		                                				<option value="<?php echo $key['member_id']?>"><?php echo $key['member_name'] ?></option>
		                                			<?php }?>

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
		                                	<label class="control-label">Paid Advt. <span class="mandaory">*</span></label>
		                                	<input name='adv_paid' class="form-control">
		                                </div>
										<div class="col-sm-4">
	                                		<label class="control-label">Free Advt.</label>
	                                		<input name='adv_free' class="form-control" value="0">	
	                                	</div>
	                                	<div class="col-sm-4" style="padding-top: 3%;">
	                                		<span class="btn btn-primary btn-sm" id="make_schedule"><i class="fa fa-plus"></i> Make Schedule</span>
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