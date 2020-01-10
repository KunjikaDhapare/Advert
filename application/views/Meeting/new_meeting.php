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
                    	<h3>New Meeting</h3>
					</div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="registerMeeting" method="POST" action="<?php echo site_url('registerNewMeeting') ?>">
                        	<fieldset>
                        		<div class="col-sm-12">
                        			<legend>Meeting Agenda</legend>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">Meeting type <span class="mandaory">*</span></label>
		                                	<select name='meeting_scope' class="form-control">
		                                		<option value="">Select</option>
		                                		<option value="1">Annual General Body Meeting</option>
		                                		<option value="2">Special General Body Meeting</option>
		                                		<option value="3">Emergency General Body Meeting</option>
		                                		<option value="4">Requisition General Body Meeting</option>
		                                		<option value="5">Managing Committee Meeting</option>
		                                		<option value="6">Minutes of Meetings</option>
		                                	</select>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">Date <span class="mandaory">*</span></label>
		                                	<input type="text" name="meeting_date" placeholder="meeting date" class="form-control" readonly="">
		                                </div>
		                                <div class="col-sm-4 hidden" id="meeting_MOM">
		                                	<label class="control-label">Meeting type <span class="mandaory">*</span></label>
		                                	<select name='meeting_MOM' class="form-control">
		                                		<option value="">Select</option>
		                                		<option value="1">General Body Meeting</option>
		                                		<option value="2">Managing Committee Meeting</option>
		                                	</select>
		                                </div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-4">
		                                	<label class="control-label">AGM Subject <span class="mandaory">*</span></label>
		                                	<input type="text" name="meeting_agm_notice" placeholder="AGM Notice" class="form-control">
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">AGM Venue <span class="mandaory">*</span></label>
		                                	<textarea name="meeting_agm_venue" placeholder="AGM Venue" class="form-control"></textarea>
		                                </div>
		                                <div class="col-sm-4">
		                                	<label class="control-label">AGM Time <span class="mandaory">*</span></label><br>
		                                	<div class="col-sm-4" style="padding-right: 1%;">
				                                <select name="meeting_agm_hour" class="form-control" readonly="">
				                                	<option value="">Hours</option>
				                                	<option value="1">1</option>
				                                	<option value="2">2</option>
				                                	<option value="3">3</option>
				                                	<option value="4">4</option>
				                                	<option value="5">5</option>
				                                	<option value="6">6</option>
				                                	<option value="7">7</option>
				                                	<option value="8">8</option>
				                                	<option value="9">9</option>
				                                	<option value="10">10</option>
				                                	<option value="11">11</option>
				                                	<option value="12">12</option>
				                                </select>
				                            </div>
				                            <div class="col-sm-4" style="padding: 0px 1%;">
				                                <select name="meeting_agm_minute" class="form-control" readonly="">
				                                	<option value="">Minute</option>
				                                	<option value="05">05</option>
				                                	<option value="10">10</option>
				                                	<option value="15">15</option>
				                                	<option value="20">20</option>
				                                	<option value="25">25</option>
				                                	<option value="30">30</option>
				                                	<option value="35">35</option>
				                                	<option value="40">40</option>
				                                	<option value="45">45</option>
				                                	<option value="50">50</option>
				                                	<option value="55">55</option>
				                                	<option value="60">60</option>
				                                </select>
				                            </div>
				                            <div class="col-sm-4" style="padding-left: 1%;">
				                                <select name="meeting_agm_time" class="form-control" readonly="">
				                                	<option value="">AM / PM</option>
				                                	<option value="AM">AM</option>
				                                	<option value="PM">PM</option>
				                                </select>
				                            </div>
		                                </div>
	                                </div>
	                                <div class="form-group">
	                                	<div class="col-sm-11">
		                                	<label class="control-label">Subject Body <span class="mandaory">*</span></label>
		                                	<textarea class="form-control summernote" name="meeting_agenda"></textarea>
		                                </div>
	                                </div>
                            </fieldset>
                            <div class="form-group">
                            	<div class="col-sm-10"><br>
                                	<button class="btn btn-md btn-primary" type="submit"><strong>Generate Meeting</strong></button>
                                	<button class="btn btn-md btn-warning" type="reset"><strong>Reset</strong></button>
                                	<a href="<?php echo site_url('meeting') ?>"><span class="btn btn-md btn-success"><strong>Cancel</strong></span></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>