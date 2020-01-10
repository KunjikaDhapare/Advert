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
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Society Amenities</h3>
					</div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="societyRecords" method="POST" action="<?php echo site_url('updateFacility') ?>">
                            <fieldset>
                                <div class="col-sm-12">
                                    <legend>General Amenities</legend>
                                    <div class="table-responsive" style="padding: 0px 2%;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">#</th>
                                                    <th colspan="8">Amenities</th>
                                                    <td class="hidden"></td>
                                                    <th><center>Available</center></th>
                                                    <th><center>Not Available</center></th>
                                                    <th><center>Remarks</center></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(empty($soc_facility)){ ?>
                                                    <td colspan="6"><h3 class="no-records">No Records Found.</h3></td>
                                                <?php }else{ $i = 1; foreach ($soc_facility as $key) {if($key['type'] == 1){?>
                                                    <tr>
                                                      <td colspan="2"><?php echo $i++; ?></td>
                                                      <td colspan="8"><?php echo $key['name'] ?></td>
                                                      <td class="hidden"><input type="text" name="facility_id[]" value="<?php echo $key['id'] ?>"></td>
                                                      <td><center><div class="checkbox-inline i-checks"><label> <input type="radio" value="1" name="radio_<?php echo $key['id'] ?>" <?php if(!empty($soc_facility_staus)){ foreach ($soc_facility_staus as $key1) {if($key1['fac_st_fet_id'] == $key['id'] && $key1['fac_st_status'] == 1){echo "checked"; } } }?>></label></div></center></td>
                                                      <td> <center><div class="checkbox-inline i-checks"><label> <input type="radio" value="0" name="radio_<?php echo $key['id'] ?>" <?php if(!empty($soc_facility_staus)){ foreach ($soc_facility_staus as $key1) {if($key1['fac_st_fet_id'] == $key['id'] && $key1['fac_st_status'] == 0){echo "checked"; } } }?>></label></div></center></td>
                                                      <td><textarea rows="1" class="form-control" name="facility_review[]"><?php if(!empty($soc_facility_staus)){ foreach ($soc_facility_staus as $key1) {if($key1['fac_st_fet_id'] == $key['id']){echo $key1['fac_st_remark']; } } }?></textarea></td>
                                                    </tr>
                                                <?php } } }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="col-sm-12">
                                    <legend>Advance Amenities</legend>
                                    <div class="table-responsive" style="padding: 0px 2%;">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">#</th>
                                                    <th colspan="8">Amenities</th>
                                                    <td class="hidden"></td>
                                                    <th><center>Available</center></th>
                                                    <th><center>Not Available</center></th>
                                                    <th><center>Remarks</center></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(empty($soc_facility)){ ?>
                                                    <td colspan="6"><h3 class="no-records">No Records Found.</h3></td>
                                                <?php }else{ $i = 1; foreach ($soc_facility as $key) {if($key['type'] == 2){?>
                                                    <tr>
                                                      <td colspan="2"><?php echo $i++; ?></td>
                                                      <td colspan="8"><?php echo $key['name'] ?></td>
                                                      <td class="hidden"><input type="text" name="facility_id[]" value="<?php echo $key['id'] ?>"></td>
                                                      <td><center><div class="checkbox-inline i-checks"><label> <input type="radio" value="1" name="radio_<?php echo $key['id'] ?>" <?php if(!empty($soc_facility_staus)){ foreach ($soc_facility_staus as $key1) {if($key1['fac_st_fet_id'] == $key['id'] && $key1['fac_st_status'] == 1){echo "checked"; } } }?>></label></div></center></td>
                                                      <td> <center><div class="checkbox-inline i-checks"><label> <input type="radio" value="0" name="radio_<?php echo $key['id'] ?>" <?php if(!empty($soc_facility_staus)){ foreach ($soc_facility_staus as $key1) {if($key1['fac_st_fet_id'] == $key['id'] && $key1['fac_st_status'] == 0){echo "checked"; } } }?>></label></div></center></td>
                                                      <td><textarea rows="1" class="form-control" name="facility_review[]"><?php if(!empty($soc_facility_staus)){ foreach ($soc_facility_staus as $key1) {if($key1['fac_st_fet_id'] == $key['id']){echo $key1['fac_st_remark']; } } }?></textarea></td>
                                                    </tr>
                                                <?php } } }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </fieldset>
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