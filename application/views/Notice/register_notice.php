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
                    	<h3>New Notice</h3>
					</div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="registerComplaint" method="POST" enctype='multipart/form-data' action="<?php echo site_url('registerNewNotice') ?>">
                        	<fieldset>
                        		<div class="col-sm-12">
                        			<legend>Notice Details</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-8">
		                                	<label class="control-label">Title <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Enter Notice title" name='notice_subject' class="form-control">
		                                </div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Notice Scope<span class="mandaory">*</span></label>
		                                	<select name='notice_scope' class="form-control">
		                                		<option value="">Notice Scope</option>
		                                		<option value="1">Public</option>
		                                		<option value="2">Private</option>
		                                		<!-- <option value="3">Corporate</option> -->
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Notice pdf</label>
		                                	<input type="file" name="notice_file" class="form-control" accept="application/pdf" style="border:none;">
		                                </div>
	                                </div>
	                                <div class="form-group hidden" id="wing_flat_member">
		                                <div class="col-sm-4">
		                                	<label class="control-label">Notice Wing<span class="mandaory">*</span></label>
		                                	<select name='notice_wing_id' class="form-control">
		                                		<option value="0">All</option>
		                                		<?php foreach ($wing_records as $key) {?>
		                                			<option value="<?php echo $key['wing_id']; ?>"><?php echo $key['wing_name']; ?></option>
		                                		<?php } ?>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Notice Flat<span class="mandaory">*</span></label>
		                                	<select name='notice_flat_id' class="form-control">
		                                		<option value="">Select flat</option>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4 hidden">
		                                	<label class="control-label">Notice Owner<span class="mandaory">*</span></label>
		                                	<select name='notice_flat_user' class="form-control">
		                                		<option value="">Select Owner</option>
		                                	</select>
		                                </div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-11">
		                                	<label class="control-label">Notice Description<span class="mandaory">*</span></label>
		                                	<textarea class="form-control summernote" name="notice_description"></textarea>
		                                </div>
	                                </div>
                            </fieldset>
                            <div class="form-group">
                            	<div class="col-sm-10"><br>
                                	<button class="btn btn-md btn-primary" type="submit"><strong>Send Notice</strong></button>
                                	<button class="btn btn-md btn-warning" type="reset"><strong>Reset</strong></button>
                                	<a href="<?php echo site_url('notice') ?>"><span class="btn btn-md btn-success"><strong>Cancel</strong></span></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>