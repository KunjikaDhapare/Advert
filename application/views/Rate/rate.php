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
                    	<h3>Create Rate</h3>
					</div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('rateDetails')?>"><span class="btn btn-success"><i class="fa fa-list"></i> Records</span></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="societyRecords" method="POST" action="<?php echo site_url('newRateRecord') ?>">
                        	<fieldset>
                        		<div class="col-sm-12">
                        			<legend>Rate</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Publication<span class="mandaory">*</span></label>
		                                    <select class="form-control" name="rate_pub_id">
                                            <option value="">Please Select Publication</option>
                                            <?php foreach ($all_pub as $key) {?>
                                            <option value="<?php echo $key['pub_id'] ?>">
                                                <?php echo $key['pub_name'] ?>
                                            </option>
                                                    <?php } ?>   
                                            </select>                        
		                                </div>

                                        <div class="col-sm-4">
                                            <label class="control-label">Size<span class="mandaory">*</span></label>
                                            <select class="form-control" name="rate_size_id">
                                            <option value="">Please Select Size</option>
                                            <?php foreach ($all_size as $key) {?>
                                            <option value="<?php echo $key['size_id'] ?>">
                                                <?php echo $key['size_name'] ?>
                                            </option>
                                                    <?php } ?>   
                                            </select>                        
                                        </div>

                                         <div class="col-sm-4">
                                            <label class="control-label">Height<span class="mandaory">*</span></label>
                                            <input type="text" name="rate_size_height" class="form-control" required placeholder="height in cm">
                                        </div>  
	                                </div> 
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Width<span class="mandaory">*</span></label>
                                            <input type="text" name="rate_size_width" class="form-control" required placeholder="width in cm">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label">Color Rate<span class="mandaory">*</span></label>
                                            <input type="text" name="rate_colour" class="form-control" required placeholder="color rate">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label">Black and White Rate<span class="mandaory">*</span></label>
                                            <input type="text" name="rate_blank_white" class="form-control" required placeholder="black and white rate">
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