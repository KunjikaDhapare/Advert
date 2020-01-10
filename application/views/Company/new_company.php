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
                    	<h3>Register Company</h3>
					</div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('company')?>"><span class="btn btn-success"><i class="fa fa-list"></i> Records</span></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="societyRecords" method="POST" action="<?php echo site_url('newCompanySave') ?>">
                        	<fieldset>
                        		<div class="col-sm-12">
                        			<legend>Company Information</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Company Name <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Company Name" name='company_name' class="form-control">
		                                </div>
		                                <div class="col-sm-4">
	                                		<label class="control-label">Company Contact</label>
	                                		<input type="number" placeholder="Enter Company Contact No." name="company_contact" class="form-control">
	                                	</div>
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Company Email</label>
	                                		<input type="email" placeholder="Enter Company Email ID" name="company_email" class="form-control">
	                                	</div>
	                                </div>
	                        </fieldset>

                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Company Contact Person Details</legend>                            			
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Name <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Name" name="cp_name" class="form-control" >
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Phone No. <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter phone number." name="cp_mobile" class="form-control" >
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Email ID <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter email." name="cp_email" class="form-control" >
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