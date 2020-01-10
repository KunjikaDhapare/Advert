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
                    	<h3>Register Adverties</h3>
					</div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('adverties')?>"><span class="btn btn-success"><i class="fa fa-list"></i> Records</span></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="createAdv" method="POST" action="<?php echo site_url('Adverties/edit_Adv') ?>">
                        	<fieldset>
                        		<div class="col-sm-12"><?php //print_r($adv_details);?>
                        			<legend>Adverties Details</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Advt. Caption / Subject</ARTICLE> <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter Adverties For" name="adv_for" class="form-control" required="" value="<?php echo $adv_details[0]['adv_for']?>">
	                                		<input type="hidden" placeholder="Enter Adverties For" name="adv_id" class="form-control" required="" value="<?php echo $adv_details[0]['adv_id']?>">
	                                	</div>
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Publication<span class="mandaory">*</span></label>
		                                    <select class="form-control" name="adv_pub_id" readonly="">
                                            <option value="">Please Select Publication</option>
                                            <?php foreach ($all_pub as $key) { if($key['pub_id']== $adv_details[0]['adv_pub_id']){?>
                                            <option selected="selected" value="<?php echo $key['pub_id'] ?>"> <?php echo $key['pub_name'] ?></option>
                                        <?php } else {?>
                                            <!--option value="<?php echo $key['pub_id'] ?>"><?php echo $key['pub_name'] ?>
                                            </option-->
                                        <?php }} ?>   
                                            </select>                        
		                                </div>
		                                <div class="col-sm-4">
	                                		<label class="control-label">Periodicity <span class="mandaory">*</span></label>
		                                	<select name='adv_periodicity' class="form-control" readonly>
		                                		<option value="">Please select ..</option>
		                                		 <?php foreach ($periodicity as $key) { if($key['per_id']== $adv_details[0]['adv_periodicity']){?>
                                            <option selected="selected" value="<?php echo $key['per_id'] ?>"> <?php echo $key['per_name'] ?></option>
                                        <?php } else {?>
                                            <option value="<?php echo $key['per_id'] ?>"><?php echo $key['per_name'] ?>
                                            </option>
                                        <?php }} ?>   
		                                	</select>
	                                	</div>
	                                </div>

	                                <div class="form-group">
	                                 	<div class="col-sm-4">
	                                		<label class="control-label">Size <span class="mandaory">*</span></label>
	                                		<?php $size= $this->db->from('ad_size')->join('ad_rate','rate_size_id = size_id')->where('rate_pub_id='.$adv_details[0]['adv_pub_id'].' AND rate_isDelete=0')->get()->result_array();
												//print_r($data);	print_r($this->db->last_query()); die();
	                                		?>
		                                	<select name='adv_size_id' class="form-control">
		                                		<option value="">Please select ..</option>
		                                		<?php 
		                                			if($size){ foreach ($size as $key) {
		                                				if($key['size_id'] == $adv_details[0]['adv_size_id'])
		                                					echo "<option selected='selected' value='".$key['size_id']."'>".$key['size_name']."</option>";
		                                				else
		                                					echo "<option value='".$key['size_id']."'>".$key['size_name']."</option>";
		                                				}
		                                			}
		                                		?>
		                                			
		                                	</select>
	                                	</div>

	                                	<div class="col-sm-4">
	                                		<label class="control-label">Height (in cm) <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter Height(in cm)" name="adv_size_height" class="form-control" readonly=""  value="<?php echo $adv_details[0]['adv_size_height']?>">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Width (in cm) <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter Width(in cm)" name="adv_size_width" class="form-control" readonly="" value="<?php echo $adv_details[0]['adv_size_width']?>">
	                                	</div>	                                	 
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Advt. type<span class="mandaory">*</span></label>
		                                	<select name='adv_color' class="form-control">
		                                		<option value="">Please select ..</option>
		                                		<?php if($adv_details[0]['adv_color_black'] == 0) {?>
		                                		<option value="1">Black AND White</option>
		                                		<option selected="selected" value="2">Color</option>
		                                	<?php }else {?>
		                                		<option selected="selected" value="1">Black AND White</option>
		                                		<option value="2">Color</option>
		                                	<?php }?>
		                                	</select>
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Rate as per rate card <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter Rate" name="adv_rate" class="form-control" readonly=""  value="<?php echo $adv_details[0]['adv_rate']?>">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Final Bill Rate <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter Rate" name="adv_final_rate" class="form-control"  value="<?php echo $adv_details[0]['adv_adjust_rate']?>">
	                                	</div>
	                                </div>	
	                            </div>
                            </fieldset>
                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Advertiser / Client Details
                        			<button type="button" class="btn btn-info btn-xs hidden" data-toggle="modal" data-id="2" data-target="#disableNewCl" style="float: right;"><i class="fa fa-plus" title="+"> New Client</i>  </button></legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4"> <?php $cl_contact=""; $cl_email="";?>
		                                	<label class="control-label">Client <span class="mandaory">*</span></label>
		                                	<select name='adv_client_name' class="form-control">
		                                		<option value="">Please select ..</option>
		                                		<?php foreach ($all_client as $key) {
		                                			if($adv_details[0]['adv_client_id']== $key['cl_id']){?>
		                                				<option selected="selected" value="<?php echo $key['cl_id']?>"><?php echo $key['cl_name'] ?></option>
		                                			<?php
		                                				 $cl_contact=$key['cl_contact']; 
		                                				 $cl_email=$key['cl_email'];
		                                			 }else{ ?>
		                                				<option value="<?php echo $key['cl_id']?>"><?php echo $key['cl_name'] ?></option>
		                                			<?php }}?>

		                                	</select>		                                	
		                                </div>
										<div class="col-sm-4" >
	                                		<label class="control-label">Contact</label>
	                                		<input type="text" placeholder="Enter Contact No." name="adv_client_contact" class="form-control" readonly="" value="<?php echo $cl_contact;?>">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Email</label>
	                                		<input type="text" placeholder="Enter Email ID" name="adv_client_email" class="form-control" readonly=""  value="<?php echo $cl_email;?>">
	                                	</div>
	                                </div>
	                            </div>
                            </fieldset>
                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Advt. Agency/ Agent / Pratinidhi Details <button type="button" class="btn btn-info btn-xs hidden" data-toggle="modal" data-id="2" data-target="#disableNewAg" style="float: right;"><i class="fa fa-plus" title="+"> New Agency</i>  </button></legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4"><?php $ag_contact=""; $ag_email="";?>
		                                	<label class="control-label">Agency / Pratinidhi <span class="mandaory"></span></label>
		                                	<select name='adv_agent' class="form-control">
		                                		<option value="">Please select ..</option>
		                                		<?php foreach ($all_agent as $key) {
		                                			if($adv_details[0]['adv_agent_id']== $key['ag_id'])
		                                			{
		                                				$ag_contact=$key['ag_contact'];
		                                				$ag_email=$key['ag_email'];
		                                			?>
		                                				<option selected="selected" value="<?php echo $key['ag_id']?>"><?php echo $key['ag_name'] ?></option>
		                                			<?php }else{ ?>
		                                				<option value="<?php echo $key['ag_id']?>"><?php echo $key['ag_name'] ?></option>
		                                			<?php } }?>

		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
	                                		<label class="control-label">Contact</label>
	                                		<input type="text" placeholder="Enter Contact No." name="adv_agent_contact" class="form-control" readonly="" value="<?php echo $ag_contact;?>">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Email</label>
	                                		<input type="text" placeholder="Enter Email ID" name="adv_agent_email" class="form-control" readonly="" value="<?php echo $ag_email;?>">
	                                	</div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Commission in %</label>
	                                		<input type="text" placeholder="Enter Commission" name="adv_agent_comm" class="form-control" value="<?php echo $adv_details[0]['adv_agent_comm'];?>">
	                                	</div>
	                                </div>
	                            </div>
                            </fieldset>
                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Marketing Excutive Details</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4"><?php $cont_mobile=""; $cont_email="";?>
		                                	<label class="control-label">Marketing Ex. <span class="mandaory">*</span></label>
		                                	<select name='adv_support' class="form-control">
		                                		<option value="">Please select ..</option>
		                                		<?php foreach ($all_MarketEx as $key) { 
		                                			if($adv_details[0]['adv_support_id']== $key['ag_id'])
		                                			{
		                                				$cont_mobile=$key['ag_mobile']; 
		                                				$cont_email=$key['ag_email'];
		                                				?>
		                                				<option selected="selected" value="<?php echo $key['ag_id']?>"><?php echo $key['ag_name'] ?></option>
		                                			<?php }else{ ?>
		                                				<option value="<?php echo $key['ag_id']?>"><?php echo $key['ag_name'] ?></option>
		                                			<?php } }?>

		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
	                                		<label class="control-label">Commission in %</label>
	                                		<input type="text" placeholder="" name="adv_support_comm" class="form-control" value="<?php echo $adv_details[0]['adv_support_comm'];?>" >
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
		                                				if($adv_details[0]['adv_incharge_con_id'] == $key['member_id']){
		                                			?>
		                                			<option selected="selected" value="<?php echo $key['member_id']?>"><?php echo $key['member_name'] ?></option>
		                                			<?php }else{ ?>
		                                				<option value="<?php echo $key['member_id']?>"><?php echo $key['member_name'] ?></option>
		                                			<?php } }?>

		                                	</select>
		                                </div>

		                                <div class="col-sm-4">
		                                	<label class="control-label">Project Head<span class="mandaory">*</span></label>
		                                	<select name='adv_department_head_id' class="form-control">
		                                		<option value="">Please select ..</option>
		                                			<?php foreach ($prjHead as $key) {
		                                				if($adv_details[0]['adv_department_head_id'] == $key['member_id']){?>
		                                			<option selected="selected" value="<?php echo $key['member_id']?>"><?php echo $key['member_name'] ?></option>
		                                			<?php }else{ ?>
		                                				<option value="<?php echo $key['member_id']?>"><?php echo $key['member_name'] ?></option>
		                                			<?php } }?>

		                                	</select>
		                                </div>
	                                </div>
	                            </div>
                            </fieldset>
                             <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Schedule </legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Paid Advt. <span class="mandaory">*</span></label>
		                                	<input name='adv_paid' class="form-control" value="<?php echo $adv_details[0]['adv_paid'];?>" readonly="">
		                                </div>
										<div class="col-sm-4">
	                                		<label class="control-label">Free Advt.</label>
	                                		<input name='adv_free' class="form-control" value="<?php echo $adv_details[0]['adv_free'] ?>" readonly="">	
	                                	</div>
	                                	<div class="col-sm-4" style="padding-top: 3%;">
	                                		<span class="btn btn-primary btn-sm hidden" id="make_schedule"><i class="fa fa-plus"></i> Make Schedule</span>
	                                		<?php
	                                		$sch = $CI->Home_model->fetch_details('sch_adv_id = '.$adv_details[0]['adv_id'].' AND sch_isDelete=0 ','ad_schedule');

	                                		?>
	                                	</div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-10">
		                                	 <div class="table-responsive">
		                                	 	<table class="table">
		                                	 		<thead id="sch_records_thead">
		                                	 			<th>#</th>
		                                	 			<th>Date</th>
		                                	 		</thead>
		                                	 		<tbody id="sch_records_tbody">
		                                	 			<?php 
		                                	 				if($sch){
		                                	 					$i = 1;
		                                	 					foreach ($sch as $key) {
																	?>
																<tr>
																	<td><?php echo $i++; ?></td>
																	<td><input type="hidden" name="sch_id[]" class="form-control" style="width:10%;" value="<?php echo $key['sch_id']; ?>">
																	</td>
																	 <td>
																	 	<input type="date" name="sch_date[<?php echo $i;?>]" class="form-control datepicker1 hasDatepicker" style="width:45%;" id="dp1574760047819" readonly="" aria-required="true" value="<?php echo $key['sch_date']; ?>">
																	 </td>
																</tr>
																	<?php
																}
		                                	 				}
		                                	 			?>
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
                </div>
            </div>
        </div>
    </div>
</div>