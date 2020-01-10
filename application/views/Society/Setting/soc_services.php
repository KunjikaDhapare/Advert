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
<?php $CI = &get_instance();?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-11" style="padding-left: 0px;">
                    	<h3>Society Services (AMC) <span style="font-size: 70%;color: red;"> ( We request MC Members to update the following list to serve you better with various useful options.)</span></h3>
					</div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="societyRecords" method="POST" action="<?php echo site_url('updateService') ?>">
                        	<div class="table-responsive" style="padding: 0px 2%;">
                                <table class="table table-striped">
                                    <thead>
        	                            <tr>
        	                                <th colspan="2">#</th>
        	                                <th>Service</th>
        	                                <td class="hidden"></td>
        	                                <th><center>Yes</center></th>
        	                                <th><center>No</center></th>
        	                                <th><center>Interest</center></th>
        	                                <th><center>Review</center></th>
        	                            </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(empty($soc_services)){ ?>
                                            <td colspan="7"><h3 class="no-records">No Records Found.</h3></td>
                                    	<?php }else{ $i = 1; foreach ($soc_services as $key) {?>
                                            <tr>
                                              <td colspan="2"><?php echo $i++; ?></td>
                                              <td><?php echo $key['name'] ?></td>
                                              <td class="hidden"><input type="text" name="service_id[]" value="<?php echo $key['id'] ?>"></td>
                                              <td><center><div class="checkbox-inline i-checks"><label> <input type="radio" value="1" name="radio_<?php echo $key['id'] ?>" <?php if(!empty($soc_services_staus)){ foreach ($soc_services_staus as $key1) {if($key1['ser_st_ser_id'] == $key['id'] && $key1['ser_st_status'] == 1){echo "checked"; } } }?>></label></div></center></td>
                                              <td> <center><div class="checkbox-inline i-checks"><label> <input type="radio" value="2" name="radio_<?php echo $key['id'] ?>" <?php if(!empty($soc_services_staus)){ foreach ($soc_services_staus as $key1) {if($key1['ser_st_ser_id'] == $key['id'] && $key1['ser_st_status'] == 2){echo "checked"; } } }?>></label></div></center></td>
                                              <td> <center><div class="checkbox-inline i-checks"><label> <input type="checkbox" value="1" name="checkbox_<?php echo $key['id'] ?>" <?php if(!empty($soc_services_staus)){ foreach ($soc_services_staus as $key1) {if($key1['ser_st_ser_id'] == $key['id'] && $key1['ser_st_interest_status'] == 1){echo "checked"; } } }?>></label></div></center></td>
                                              <!-- <td></td> -->
                                              <td><textarea rows="1" class="form-control" name="service_review[]"><?php if(!empty($soc_services_staus)){ foreach ($soc_services_staus as $key1) {if($key1['ser_st_ser_id'] == $key['id']){echo $key1['ser_st_remark']; } } }?></textarea></td>
        		                            </tr>
        		                        <?php } }?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                            	<div class="col-sm-10"><br>
                                	<button class="btn btn-md btn-primary" type="submit"><strong>Update</strong></button>
                                	<a href="<?php echo site_url('Dashboard') ?>"><span class="btn btn-md btn-success" type="reset"><strong>Back</strong></span></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>