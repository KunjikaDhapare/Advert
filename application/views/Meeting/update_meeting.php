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
                    	<h3>Update Meeting Details</h3>
					</div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="registerMeeting" method="POST" action="<?php echo site_url('updateMeetingDetails') ?>">
                        	<fieldset>
                        		<div class="col-sm-12">
                        			<legend>Meeting Agenda</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4 hidden">
		                                	<label class="control-label">ID <span class="mandaory">*</span></label>
		                                	<input type="text" name="meeting_id" placeholder="meeting ID" class="form-control" value="<?php echo $meeting[0]['meeting_id'] ?>">
		                                </div>
	                                	<div class="col-sm-4">
		                                	<label class="control-label">type <span class="mandaory">*</span></label>
		                                	<select name='meeting_scope' class="form-control">
		                                		<option value="">Meeting Scope</option>
		                                		<?php if($meeting[0]['meeting_scope'] == '1'){ ?>
		                                			<option value="1" selected="">General Body Meeting</option>
		                                		<?php }else{ ?>
		                                			<option value="1">General Body Meeting</option>
		                                		<?php } ?>
		                                		<?php if($meeting[0]['meeting_scope'] == '2'){ ?>
		                                			<option value="2" selected="">Annual General Meeting</option>
		                                		<?php }else{ ?>
		                                			<option value="2">Annual General Meeting</option>
		                                		<?php } ?>
		                                		<?php if($meeting[0]['meeting_scope'] == '3'){ ?>
		                                			<option value="3" selected="">Other Commitee Meeting</option>
		                                		<?php }else{ ?>
		                                			<option value="3">Other Commitee Meeting</option>
		                                		<?php } ?>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Date <span class="mandaory">*</span></label>
		                                	<input type="text" name="meeting_date" placeholder="meeting date" class="form-control" disabled="" value="<?php echo date('d M Y',strtotime($meeting[0]['meeting_date'])) ?>">
		                                </div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">AGM Notice <span class="mandaory">*</span></label>
		                                	<input type="text" name="meeting_agm_notice" placeholder="AGM Notice" class="form-control" value="<?php echo $meeting[0]['meeting_agm_notice'] ?>" disabled="">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">AGM Venue <span class="mandaory">*</span></label>
		                                	<textarea name="meeting_agm_venue" placeholder="AGM Venue" class="form-control" disabled=""><?php echo $meeting[0]['meeting_agm_venue']; ?></textarea>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">AGM Time <span class="mandaory">*</span></label>
		                                	<div class="input-group clockpicker" data-autoclose="true">
				                                <input type="text" name="meeting_agm_time" class="form-control" value="<?php echo date('h:i a',strtotime($meeting[0]['meeting_agm_time'])) ?>" disabled="">
				                            </div>
		                                </div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-11">
		                                	<label class="control-label">Notice Body <span class="mandaory">*</span></label>
		                                	<textarea class="form-control summernote" name="meeting_agenda"> <?php echo $meeting[0]['meeting_agenda'] ?></textarea>
		                                </div>
	                                </div>
                            </fieldset>
                            <div class="form-group">
                            	<div class="col-sm-10"><br>
                                	<button class="btn btn-md btn-primary" type="submit"><strong>Update Meeting</strong></button>
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