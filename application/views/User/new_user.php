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
                    	<h3>Register New User</h3>
					</div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('user')?>"><span class="btn btn-success"><i class="fa fa-list"></i> Records</span></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="societyRecords" method="POST" action="<?php echo site_url('newUserSave') ?>">
                        	<fieldset>
                        		<div class="col-sm-12">
                        			<legend>User Information</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Name <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter User Name" name='member_name' class="form-control">
		                                </div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Email <span class="mandaory">*</span></label>
	                                		<input type="email" placeholder="Enter User Email ID" name="member_email" class="form-control">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Contact <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter User Contact No." name="member_mobile" class="form-control">
	                                	</div>
	                                </div>
	                                <div class="form-group">
	                                	<!-- <div class="col-sm-4">
	                                		<label class="control-label">User name</label>
	                                		<input type="text" placeholder="Enter User name." name="member_username" class="form-control">
	                                	</div> -->
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Password <span class="mandaory">*</span></label>
	                                		<input type="password" placeholder="Enter Password." name="member_password" class="form-control" required="">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Re-enter Password <span class="mandaory">*</span></label>
	                                		<input type="password" placeholder="Re Enter Password" name="member_re_password" class="form-control" required="">
	                                	</div>
	                                	<div class="col-sm-4">
		                                	<label class="control-label">User Role <span class="mandaory">*</span></label>
		                                	<select class="form-control" name="member_role_id">
		                                		<option value="">Please Select User role</option>
		                                		<?php foreach ($user_role as $key) { ?>
		                                			<option value="<?php echo $key['id'] ?>"><?php echo $key['role'] ?></option>
		                                		<?php } ?>
		                                	</select>
		                                </div>
	                                </div>
	                                <div class="form-group">
	                                 	<div class="col-sm-4">
		                                	<label class="control-label">Publication Company<span class="mandaory">*</span></label><?php //print_r($all_com);?>
		                                	<select class="form-control" name="member_com_id">
		                                	<option value="">Please Select Company</option>
		                                	<?php foreach ($all_com as $key) {?>
		                                	<option value="<?php echo $key['com_id'] ?>">
		                                		<?php echo $key['com_name'] ?>
		                              		</option>
		                                			<?php } ?>   
		                                	</select>                           
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