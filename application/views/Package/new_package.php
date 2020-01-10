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
                    	<h3>Create Package</h3>
					</div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('package')?>"><span class="btn btn-success"><i class="fa fa-list"></i> Records</span></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="societyRecords" method="POST" action="<?php echo site_url('newPackageSave') ?>">
                        	<fieldset>
                        		<div class="col-sm-12">
                        			<legend>Publication Information</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
	                                		<label class="control-label">Package Name</ARTICLE> <span class="mandaory">*</span></label>
	                                		<input type="text" placeholder="Enter package name" name="pk_name" class="form-control" required="">
	                                	</div>
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Publication<span class="mandaory">*</span></label>
		                                    <select class="form-control" name="pk_pub_id" required="">
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
	                                		<input type="text" placeholder="" name="pk_periodicity" class="form-control" readonly="">	
	                                	</div>
	                                </div>
	                            </div>
	                        </fieldset>

                            <fieldset>
                        		<div class="col-sm-12">
                        			<legend>Package Details</legend>                            			
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Paid Adverties<span class="mandaory">*</span></label>
		                                	<input type="number" placeholder="Enter Paid Adverties" name="pk_paid_adv" class="form-control" required="required">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Free Adverties<span class="mandaory">*</span></label>
		                                	<input type="number" placeholder="Enter Free Adverties." name="pk_free_adv" class="form-control" required="required">
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