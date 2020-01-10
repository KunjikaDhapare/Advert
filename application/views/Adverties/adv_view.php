<?php $CI = &get_instance(); ?>
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
                    	<h3>View Adverties</h3>
					</div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('adverties')?>"><span class="btn btn-success"><i class="fa fa-list"></i> Back</span></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="createAdv" method="POST" action="<?php //echo site_url('Adverties/insert_Adv') ?>">
                        	<fieldset>
                        		<div class="col-sm-12">
                        			<legend>Adverties Details</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Advt. Caption / Subject</ARTICLE> <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter Adverties For" name="adv_for" class="form-control" required="" disabled="" value="<?php echo $adv_details[0]['adv_for']?>" >
	                                	</div>
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Publication<span class="mandaory">*</span></label>
		                                    <select class="form-control" name="adv_pub_id" disabled="">
                                            <option value="">Please Select Publication</option>
                                            <?php foreach ($all_pub as $key) 
                                            {
                                            	if($adv_details[0]['adv_pub_id'] == $key['pub_id'])
                                            	{?>
                                            	<option  selected value="<?php echo $key['pub_id'] ?>"><?php echo $key['pub_name'] ?>
                                            	</option>
                                                    <?php 
                                                }
                                                else
                                                {
                                                	?>
                                                	<option value="<?php echo $key['pub_id'] ?>"><?php echo $key['pub_name'] ?>
                                            		</option>
                                                	<?php
                                                }
                                            } ?>   
                                            </select>                        
		                                </div>
		                                <div class="col-sm-4">
	                                		<label class="control-label">Periodicity <span class="mandaory">*</span></label>
	                                		<?php
	                                		$per = $CI->Home_model->fetch_details('per_id = '.$adv_details[0]['adv_periodicity'].'','ad_periodicity');
	                                		?>
		                                	<select name='adv_periodicity' class="form-control" disabled="">
		                                		<?php foreach ($per as $key) { ?>
		                                		<option value="<?php echo $key['per_id'];?> "><?php echo $key['per_name'];?></option>
		                                		<?php } ?>
											</select>
	                                	</div>
	                                </div>

	                                <div class="form-group">
	                                 	<div class="col-sm-4">
	                                		<label class="control-label">Size <span class="mandaory">*</span></label>
											<?php
	                                		 $size = $CI->Home_model->fetch_details('size_id = '.$adv_details[0]['adv_size_id'].'','ad_size');
	                                		 // print_r($size);
	                                		?>

		                                	<select name='adv_size_id' class="form-control" disabled="">
		                                		<?php foreach ($size as $key) { ?>
		                                		<option value="<?php echo $key['size_id'];?> "><?php echo $key['size_name'];?></option>
		                                	<?php } ?>
		                                	</select>
	                                	</div>

	                                	<div class="col-sm-4">
	                                		<label class="control-label">Height (in cm) <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter Height(in cm)" name="adv_size_height" class="form-control" value="<?php echo $adv_details[0]['adv_size_height']?>" disabled="" >
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Width (in cm) <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter Width(in cm)" name="adv_size_width" class="form-control" value="<?php echo $adv_details[0]['adv_size_width']?>" disabled="">
	                                	</div>	                                	 
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Advt. type<span class="mandaory">*</span></label>
		                                	<select name='adv_color' class="form-control" disabled="">
		                                		<?php 
		                                		$rate=0;
		                                			if($adv_details[0]['rate_blank_white'] == 0)
		                                			{	echo "<option value='1' selected>Color</option>";
		                                				$rate=$adv_details[0]['adv_rate'];
		                                			}
		                                			else
		                                			{
		                                				echo "<option value='1' selected>Black AND White</option>";
		                                				$rate=$adv_details[0]['adv_color_black'];
		                                			}
		                                		?>
		                                	</select>
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Rate as per rate card <span class="mandaory">*</span></label>
	                                		
	                                		<input type="text" disabled="" placeholder="Enter Rate" name="adv_rate" class="form-control" value="<?php echo $rate; ?>"
	                                		>
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Final Bill Rate <span class="mandaory">*</span></label>
	                                		<input disabled="" type="text" placeholder="Enter Rate" name="adv_final_rate" class="form-control" value="<?php echo $adv_details[0]['adv_adjust_rate'];?>">
	                                	</div>
	                                </div>

	                            <!--     <legend>Advertiser / Client Details</legend> -->
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Client <span class="mandaory">*</span></label>
		                                	<?php
		                                	$client = $CI->Home_model->fetch_details('cl_id = '.$adv_details[0]['adv_client_id'].'','ad_client');
		                                	//print_r($client);
		                                	?>
		                                	<select disabled="" name='adv_client_name' class="form-control">
			                                	<?php
			                                	$adv_client_contact="";
			                                	$adv_client_email="";
			                                	if($client)
			                                	{
			                                		foreach ($client as $key) {
			                                			$adv_client_contact=$key['cl_contact'];
			                                			$adv_client_email=$key['cl_email'];
			                                			?>
			                                		<option selected="" value="<?php echo $key['cl_id']?>"> <?php echo $key['cl_name'] ?></option>
			                                	<?php }	
			                                	} ?>
		                                	</select>		                                	
		                                </div>
										<div class="col-sm-4" >
	                                		<label class="control-label">Contact</label>
	                                		<input disabled=""  type="text" placeholder="Enter Contact No." name="adv_client_contact" class="form-control" readonly="" value="<?php echo $adv_client_contact;?>">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Email</label>
	                                		<input disabled="" type="text" placeholder="Enter Email ID" name="adv_client_email" class="form-control" readonly="" value="<?php echo $adv_client_email;?>">
	                                	</div>
	                                </div>

	                              <!--  	<legend>Advt. Agency/ Agent / Pratinidhi Details</legend> -->
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Agency / Pratinidhi <span class="mandaory"></span></label>
		                                	<?php
											$agent = $CI->Home_model->fetch_details('ag_id = '.$adv_details[0]['adv_agent_id'].'','ad_agent');
		                                	?>
		                                	<select disabled="" name='adv_agent' class="form-control">
		                                		<?php 
		                                		$adv_agent_contact="";
		                                		$adv_agent_email="";
		                                		if($agent){foreach ($agent as $key) {
		                                			$adv_agent_contact=$key['ag_contact'];
		                                			$adv_agent_email=$key['ag_email'];
		                                		?>
		                                			<option selected value="<?php echo $key['ag_id']?>"><?php echo $key['ag_name'] ?></option>
		                                			<?php }}?>
		                                		</select>
		                                </div>
		                                <div class="col-sm-4">
	                                		<label class="control-label">Contact</label>
	                                		<input disabled="" type="text" placeholder="Enter Contact No." name="adv_agent_contact" class="form-control" readonly="" value="<?php echo $adv_agent_contact;?>">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Email</label>
	                                		<input disabled="" type="text" placeholder="Enter Email ID" name="adv_agent_email" class="form-control" readonly="" value="<?php echo $adv_agent_email;?>">
	                                	</div>
	                                </div>

	                                  <div class="form-group">
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Commission in %</label>
	                                		<input disabled="" type="text" placeholder="Enter Commission" name="adv_agent_comm" value="<?php echo $adv_details[0]['adv_agent_comm'];?>" class="form-control" >
	                                	</div>
	                                

	                               <!--  <legend>Marketing Excutive Details</legend> -->
	                              
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Marketing Ex. <span class="mandaory">*</span></label>
		                                	<select disabled="" name='adv_support' class="form-control">
		                                		<option value="">Please select ..</option>
		                                			<?php 

		                                			$support = $CI->Home_model->fetch_details('cont_id = '.$adv_details[0]['adv_support_id'].'','ad_contact');
		                                			if($support){ foreach ($support as $key) {
		                                			?>
													<option selected value="<?php echo $key['cont_id']?>"><?php echo $key['cont_name'] ?></option>
		                                			<?php }} ?>

		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
	                                		<label class="control-label">Commission in %</label>
	                                		<input disabled="" type="text" placeholder="" name="adv_support_comm" class="form-control" value="<?php echo $adv_details[0]['adv_support_comm'];?>">
	                                	</div>
	                                </div>

	                              <!--   	<legend>Incharge Details</legend> -->
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Incharge <span class="mandaory">*</span></label>
		                                	<select disabled="" name='adv_incharge' class="form-control">
		                                	<option value="">Please select ..</option>
	                                		<?php 
		                                	$incharge = $CI->Home_model->fetch_details('cont_id = '.$adv_details[0]['adv_incharge_con_id'].'','ad_contact');
		                                		if($incharge){ foreach ($incharge as $key) {
		                                		?>
		                                		<option selected value="<?php echo $key['cont_id']?>"><?php echo $key['cont_name'] ?></option>
			                                	<?php } }?>
			                                </select>
		                                </div>

		                                <div class="col-sm-4">
		                                	<label class="control-label">Project Head<span class="mandaory">*</span></label>
		                                	<select disabled="" name='adv_department_head_id' class="form-control">
		                                		<option value="">Please select ..</option>
		                                		<?php
		                                		$incharge = $CI->Home_model->fetch_details('cont_id = '.$adv_details[0]['adv_department_head_id'].'','ad_contact');
		                                		if($incharge){ foreach ($incharge as $key) {
		                                		?>
		                                		<option selected value="<?php echo $key['cont_id']?>"><?php echo $key['cont_name'] ?></option>
		                                			<?php } }?>

		                                	</select>
		                                </div>
	                                </div>
                                 	
	                            </div>
                            </fieldset>                     
                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Schedule Advert</legend>
                        				<?php
		                               	$sch = $CI->Home_model->fetch_details('sch_adv_id = '.$adv_details[0]['adv_id'].' AND sch_isDelete=0 ','ad_schedule');

		                               //	print_r($sch)
		                                ?>
	                             <!--    <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Paid Advt. <span class="mandaory">*</span></label>
		                                	<input name='adv_paid' class="form-control" value="<?php echo $adv_details[0]['adv_paid'];?>">
		                                </div>
										<div class="col-sm-4">
	                                		<label class="control-label">Free Advt.</label>
	                                		<input name='adv_free' class="form-control" value="0" value="<?php echo $adv_details[0]['adv_free'];?>">	
	                                	</div>
	                                	<div class="col-sm-4" style="padding-top: 3%;">
	                                		<span class="btn btn-primary btn-sm" id="make_schedule"><i class="fa fa-plus"></i> Make Schedule</span>
	                                	</div>
	                                </div> -->
	                                <div class="form-group">
	                                	<div class="col-sm-10">
		                                	 <div class="table-responsive">
		                                	 	<table class="table" style="border: 2px solid #000000;">
		                                	 		<thead id="sch_records_thead" style="border-bottom: 2px solid #000000;">
		                                	 			<tr style="color: #000000;font-size: 1.1em;font-weight: bold;">
		                                	 				<th></th>
			                                	 			<th>#</th>
			                                	 			<th>Date</th>
			                                	 			<th>Status</th>
			                                	 			<th></th>
			                                	 		</tr>
		                                	 		</thead>
		                                	 		<tbody id="sch_records_tbody">
	                                	 			<?php if($sch){
	                                	 				$i = 1;foreach ($sch as $key) {
	                                	 			?>
	                                	 				<?php if($key['sch_date'] < "".date('Y-m-d')."" && $key['sch_ready_print'] == 0){ ?>
														<tr style="background-color: #b70000ba;color: #ffffff;font-size: 1.1em;font-weight: bold;">
														<?php }else{ ?>
														<tr style="background-color: #54d25470;color: #000000;font-size: 1.1em;font-weight: bold;">
														<?php } ?>
															<td></td>
															<td><?php echo $i++; ?></td>
															<td><?php echo date('d M Y',strtotime($key['sch_date'])); ?></td>
															<td>
																<?php if($key['sch_date'] < "".date('Y-m-d')."" && $key['sch_ready_print'] == 0){ echo "Adverties Scheduled but not printed.";}else if($key['sch_approved_status'] == 2 && $key['sch_ready_print'] == 0 && $key['sch_print_done'] == 0){ echo "Adverties Scheduled but not Approved.";}else if($key['sch_ready_print'] == 0 && $key['sch_print_done'] == 0){ echo "Adverties Scheduled.";}else if($key['sch_ready_print'] == 1 && $key['sch_print_done'] == 0){ echo "Adverties set for printing.";}else if($key['sch_print_done'] == 1){ echo "Adverties Printed.";}else{ echo "";}?>
															</td>
															<td>
																<?php if($key['sch_date'] < "".date('Y-m-d')."" && $key['sch_ready_print'] == 0){?>
																	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-id="<?php echo $key['sch_id'] ?>"data-target="#rescheduleAdvertise" style="font-weight: bold;font-size: 13px;"><i class="fa fa-refresh fa-lg"> </i> Re-Scheduled</button>
																<?php } ?>
															</td>
														</tr>
													<?php } } ?>
		                                	 		</tbody>
		                                	 	</table>
		                                	 </div>        	             	
		                                </div>		                               
	                                </div>
	                            </div>
                            </fieldset>                            
                            <div class="form-group">
                            	<div class="col-sm-10"><br>
                            		<?php if(($user['role_id'] == 5 && $adv_details[0]['adv_approved_status'] == 2) || ($user['role_id'] == 3 && $adv_details[0]['adv_created_role_id'] == 4 && $adv_details[0]['adv_approved_status'] == 2) ||  ($user['role_id'] == 2 && ($adv_details[0]['adv_created_role_id'] == 3 || $adv_details[0]['adv_created_role_id'] == 4) && $adv_details[0]['adv_approved_status'] == 2)){ ?>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-id="<?php echo $adv_details[0]['adv_id'] ?>" data-target="#approveAdverties"><i class="fa fa-check" title="Approve Adverties"></i> Approve Adverties </button>
                                    <?php } ?>
                                	<!-- <button class="btn btn-md btn-primary" type="submit"><strong>Submit</strong></button> -->
                                	<!-- <button class="btn btn-md btn-warning" type="reset"><strong>Close</strong></button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                    <div id="approveAdverties" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('approveAdverties') ?>" style="position: relative;z-index: 10000;">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4 class="modal-title">Are you sure you want to approve this Adverties?</h4>
                                    <div class="form-group hidden">
                                        <input type="text" class="form-control" name="approve_advert_id">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Approve</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div id="rescheduleAdvertise" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form class="form-horizontal" role="form" id="createAdv" method="POST" action="<?php echo site_url('rescheduledAdvertise') ?>" style="position: relative;z-index: 10000;">
                            <div class="modal-content">
                            	<div class="modal-header">
							        <h3 class="modal-title">Re-Scheduled Adverties</h3>
							    </div>
                                <div class="modal-body">
                                    <div class="form-group hidden">
                                        <input type="text" class="form-control" name="reSch_id">
                                    </div>
                                    <div class="form-group">
                                    	<div class="col-sm-6">
                                    		<label class="control-label">New Scheduled Date <span class="mandaory">*</span></label>
                                    		<input type="text" name="reSch_date" class="form-control datepickerSchedule" readonly="">
                                    	</div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Scheduled</button>
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