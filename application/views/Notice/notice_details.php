<?php $CI = &get_instance(); ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Notice's Records</h3>
                    </div>
                    <?php if($user['role_id'] != 11){ ?>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('newNotice') ?>"><span  class="btn btn-success"><i class="fa fa-plus " title="New Complaint"></i> Add New</span></a>
                    </div>
                    <?php } ?>
                </div>
                <div class="ibox-content">
                	<div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Subject</th>
                                    <th>Description</th>
                                    <th><center>Notice Whom</center></th>
                                    <th><center>pdf</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($notice_records)){ ?>
                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
                                <?php }else{ $i = 1; foreach (array_reverse($notice_records) as $key) {?>
                                    <tr>
                                    	<th><?php echo $i++; ?></th>
                                    	<td><?php echo  date('d M Y h:i A',strtotime($key['notice_createdon'])); ?></td>
                                    	<td><?php echo $key['notice_subject']; ?></td>
                                    	<td><?php echo $key['notice_description']; ?></td>
                                    	<td><center><?php if($key['notice_scope']==1){ echo "All";}elseif ($key['notice_scope']==2) {
                                            if($key['notice_wing_id'] != ''){ $wing = $CI->Home_model->fetch_details(array('wing_id'=>$key['notice_wing_id']),'rs_wing');echo $wing[0]['wing_name'];if($key['notice_flat_id']!=0){$flat = $CI->Home_model->fetch_details(array('flat_id'=>$key['notice_flat_id']),'rs_flat'); echo ' ( '.$flat[0]['flat_number'].' )';}}else{ echo 'All';}
                                        }else{echo "Corporate";} ?></center></td>
                                    	<td>
                                            <?php if ($key['notice_file'] != '') {?>
                                                <center><a href="<?php echo $key['notice_file']; ?>" target="_blank"><i class="fa fa-file-pdf-o fa-lg text-navy" title="view pdf"></i></a></center>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
