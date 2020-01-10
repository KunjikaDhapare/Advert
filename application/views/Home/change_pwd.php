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
                    	<h3>Update Password</h3>
					</div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="updatePwd" method="POST" action="<?php echo site_url('updatePWD') ?>">
                        	<fieldset>
                        		<div class="col-sm-12">
                        			<legend>Member Information</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Email ID <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Email ID" name='member_email' class="form-control" readonly value="<?php echo $member[0]['member_email'] ?>">
		                                </div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Password <span class="mandaory">*</span></label>
		                                	<input type="password" placeholder="Enter password" name='member_password' class="form-control">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Confirm Password<span class="mandaory">*</span></label>
		                                	<input type="password" placeholder="Enter password again" name='pwd_confirm' class="form-control">
		                                </div>
	                                </div>
                            </fieldset>
                            <div class="form-group">
                            	<div class="col-sm-10"><br>
                                	<button class="btn btn-md btn-primary" type="submit"><strong>Update</strong></button>
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