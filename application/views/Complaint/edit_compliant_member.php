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
<?php $ci = &get_instance();?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Update Grievience Details</h3>
					</div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="registerComplaint" method="POST" action="<?php echo site_url('updateRegisterComplaint') ?>">
                        	<fieldset>
                        		<div class="col-sm-12">
                        			<legend>Grievience Details</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4 hidden">
		                                	<label class="control-label">Compliant ID <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Complaint Subject" name='complaint_id' class="form-control" value="<?php echo $complaint_details[0]['complaint_id'] ?>">
		                                </div>
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Subject <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Complaint Subject" name='complaint_subject' class="form-control" value="<?php echo $complaint_details[0]['complaint_subject'] ?>">
		                                </div>
	                                	<div class="col-sm-6">
		                                	<label class="control-label">Descripation <span class="mandaory">*</span></label>
		                                	<textarea name='complaint_description' class="form-control"><?php echo $complaint_details[0]['complaint_description'] ?></textarea>
		                                </div>
	                                </div>
                            </fieldset>
                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Against Whom</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Complaint Scope<span class="mandaory">*</span></label>
		                                	<select name='complaint_scope' class="form-control">
		                                		<option value="">Complaint Scope</option>
		                                		<?php if($complaint_details[0]['complaint_scope']==1){ ?>
		                                			<option value="1" selected="">Public</option>
		                                		<?php }else{ ?>
		                                			<option value="1">Public</option>
		                                		<?php }if($complaint_details[0]['complaint_scope']==2){ ?>
		                                			<option value="2" selected="">Private</option>
		                                		<?php }else{ ?>
		                                			<option value="2">Private</option>
		                                		<?php } ?>
		                                	</select>
		                                </div>
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Complaint For<span class="mandaory">*</span></label>
		                                	<select name='complaint_for' class="form-control">
		                                		<option value="">Complaint For</option>
		                                		<?php if($complaint_details[0]['complaint_for']==1){ ?>
		                                			<option value="1" selected="">All</option>
		                                		<?php }else{ ?>
		                                			<option value="1">All</option>
		                                		<?php }if($complaint_details[0]['complaint_for']==2){ ?>
		                                			<option value="2" selected="">Only For Selected</option>
		                                		<?php }else{ ?>
		                                			<option value="2">Only For Selected</option>
		                                		<?php } ?>
		                                	</select>
		                                </div>		                                
		                                <div class="col-sm-4 hidden" id="against">
		                                	<label class="control-label">Against<span class="mandaory">*</span></label>
		                                	<div class="radio">
		                                		<?php if($complaint_details[0]['complaint_against']==1){ ?>
                                                	<label> <input type="radio" value="1" name="complaint_against" checked=""> Select Role </label>&nbsp &nbsp
                                                <?php }else{ ?>
                                                	<label> <input type="radio" value="1" name="complaint_against"> Select Role </label>&nbsp &nbsp
                                                <?php } ?>
                                                <?php if($complaint_details[0]['complaint_against']==2){ ?>
                                                	<label> <input type="radio" value="2" name="complaint_against"> Select Flat/Wing/Members </label>
                                                <?php }else{ ?>
                                                	<label> <input type="radio" value="2" name="complaint_against"> Select Flat/Wing/Members </label>
                                                <?php } ?>
                                        	</div>
		                                </div>
	                                </div>
	                                <div class="form-group hidden" id="role">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Against Role<span class="mandaory">*</span></label>
		                                	<select name='complaint_role' class="form-control">
		                                		<option value="">Select Role</option>
		                                		<?php foreach ($role_records as $key) {?>
		                                			<option value="<?php echo $key['id']?>"><?php echo $key['role']?></option>
		                                		<?php } ?>
		                                	</select>
		                                </div>
		                            </div>
		                            <div class="form-group hidden" id="wing_flat_member">
		                                <div class="col-sm-4">
		                                	<label class="control-label">Against Wing<span class="mandaory">*</span></label>
		                                	<select name='complaint_wing_id' class="form-control">
		                                		<option value="0">All</option>
		                                		<?php foreach ($wing_records as $key) {?>
		                                			<?php if ($key['wing_id'] == $complaint_details[0]['complaint_wing_id']) { ?>
		                                				<option value="<?php echo $key['wing_id']; ?>" selected=""><?php echo $key['wing_name']; ?></option>
		                                			<?php }else{ ?>
		                                				<option value="<?php echo $key['wing_id']; ?>" ><?php echo $key['wing_name']; ?></option>
		                                		<?php } }?>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Against Flat<span class="mandaory">*</span></label>
		                                	<select name='complaint_flat_id' class="form-control">
		                                		<option value="">Select flat</option>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4 hidden">
		                                	<label class="control-label">Against Owner<span class="mandaory">*</span></label>
		                                	<select name='complaint_flat_user' class="form-control">
		                                		<option value="">Select Owner</option>
		                                	</select>
		                                </div>
	                                </div>
	                                <?php if($complaint_details[0]['complaint_for']==2){ 
	                                	if($complaint_details[0]['complaint_against']==1){
	                                		$role = $ci->Home_model->fetch_details(array('id'=>$complaint_details[0]['complaint_role']),'rs_user_role');?>
		                                	<div class="form-group">
		                                		<div class="col-sm-4">
				                                	<label class="control-label">Against Role<span class="mandaory">*</span></label>
				                                	<input type="text" name="" class="form-control" value="<?php echo $role[0]['role'] ?>" readonly>
				                                </div>
		                                	</div>
	                                <?php }else{ 
	                                	$wing = $ci->Home_model->fetch_details(array('wing_id'=>$complaint_details[0]['complaint_wing_id']),'rs_wing');
	                                	$flat = $ci->Home_model->fetch_details(array('flat_id'=>$complaint_details[0]['complaint_flat_id']),'rs_flat');?>
		                                	<div class="form-group">
		                                		<div class="col-sm-4">
				                                	<label class="control-label">Against Wing<span class="mandaory">*</span></label>
				                                	<input type="text" name="" class="form-control" value="<?php echo $wing[0]['wing_name'] ?>" readonly>
				                                </div>
		                                		<div class="col-sm-4">
				                                	<label class="control-label">Against Flat<span class="mandaory">*</span></label>
				                                	<input type="text" name="" class="form-control" value="<?php echo $flat[0]['flat_number'] ?>" readonly>
				                                </div>
		                                	</div>
	                                <?php } }?>
                            </fieldset>
                            <?php if($user['role_id'] != '11' && $complaint_details[0]['complaint_status'] == 2) {?>
                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Action Against Complaint</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-6">
		                                	<label class="control-label">Action Message For Member <span class="mandaory">*</span></label>
		                                	<textarea placeholder="Enter Complaint Message" name='complaint_action_msg' class="form-control" ><?php echo $complaint_details[0]['complaint_action_msg'] ?></textarea> 
		                                </div>
		                                <?php if($complaint_details[0]['complaint_reopen'] == 1){ ?>
		                                <div class="form-group">
		                                	<div class="col-sm-6">
			                                	<label class="control-label">Reoprn Message Form Memeber </label>
			                                	<textarea placeholder="Enter Complaint Message" name='complaint_reopen_msg' class="form-control" readonly=""><?php echo $complaint_details[0]['complaint_reopen_msg'] ?></textarea> 
			                                </div>
	                                	</div>
	                                <?php } ?>
	                                </div>
                            </fieldset>
                        <?php } ?>
                        <?php if($user['role_id'] == '11' && $complaint_details[0]['complaint_status'] == 3) {?>
                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Action Against Grievience</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-6">
		                                	<label class="control-label">Action Message Form Member </label>
		                                	<textarea placeholder="Enter Complaint Message" name='' class="form-control" readonly><?php echo $complaint_details[0]['complaint_action_msg'] ?></textarea> 
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Compliant Reopen/Closed <span class="mandaory">*</span></label>
		                                	<select name='complaint_reopen' class="form-control">
		                                		<option value="">Complaint For</option>
		                                			<option value="4">Closed</option>
		                                			<option value="1">Reopen</option>
		                                	</select>
		                                </div>
	                                </div>
	                                <div class="form-group hidden" id="reopen_msg">
	                                	<div class="col-sm-6">
		                                	<label class="control-label">Reoprn Message For Admin </label>
		                                	<textarea placeholder="Enter Complaint Message" name='complaint_reopen_msg' class="form-control" ><?php echo $complaint_details[0]['complaint_reopen_msg'] ?></textarea>
		                                </div>
	                                </div>
                            </fieldset>
                        <?php } ?>
                            <div class="form-group">
                            	<div class="col-sm-10"><br>
                                	<button class="btn btn-md btn-primary" type="submit"><strong>Update Complaint</strong></button>
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