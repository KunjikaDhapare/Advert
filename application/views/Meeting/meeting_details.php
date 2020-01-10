<?php $CI = &get_instance(); ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Meeting's Records</h3>
                    </div>
                    <?php if($user['role_id'] != 11){ ?>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('newMeeting') ?>"><span  class="btn btn-success"><i class="fa fa-plus " title="New Meeting"></i> Add New</span></a>
                    </div>
                    <?php } ?>
                </div>
                <div class="ibox-content">
                	<div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><center>Scope</center></th>
                                    <th>Date</th>
                                    <th>Venue</th>
                                    <th>Agenda</th>
                                    <th><center>Action</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($meeting_records)){ ?>
                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
                                <?php }else{ $i = 1; foreach (array_reverse($meeting_records) as $key) {?> 
                                    <tr>
                                    	<th><?php echo $i++; ?></th>
                                    	<td><center><?php if($key['meeting_scope']==1){ echo "Annual General Body Meeting";}elseif ($key['meeting_scope']==2) {echo "Special General Body Meeting";}elseif($key['meeting_scope']==3){echo "Emergency General Body Meeting";}elseif($key['meeting_scope']==4) { echo 'Requisition General Body Meeting';}elseif($key['meeting_scope']==5) { echo 'Managing Committee Meeting';}else{ echo 'Minutes of Meeting <br>';if($key['meeting_MOM']==1){echo " ( GBM )";}else{ echo " ( MC )";}}?></center></td>
                                    	<td><?php echo date('d M Y',strtotime($key['meeting_date'])).' @ '.date('h:i a',strtotime($key['meeting_agm_time'])); ?></td>
                                    	<td><?php echo $key['meeting_agm_venue']; ?></td>
                                    	<td><?php echo $key['meeting_agenda']; ?></td>
                                    	<td>
                                            <?php if($user['role_id']== 2 || $user['sub_role'] == 3 || $user['sub_role'] == 4){ ?>
                                                <center><span data-toggle="modal" data-id="<?php echo $key['meeting_id'] ?>" data-target="#deleteMeetingRe"><i class="fa fa-trash fa-lg fa-lg text-navy" title="Delete Meeting Details"></i></span></center>
                                                <!-- <a href="<?php echo site_url('editMeeting/').$key['meeting_id']; ?>"><span class="btn btn-success btn-sm"><i class="fa fa-pencil fa-lg"></i></span></a> -->
                                            <?php } ?>
                                        </td>
                                            <!-- <a href="<?php echo site_url('print/').$key['meeting_id']; ?>" target="_blank"><span class="btn btn-success btn-sm"><i class="fa fa-print fa-lg"></i></span></a></td> -->
                                    </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="deleteMeetingRe" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('deleteMeeting') ?>">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h4 class="modal-title">Are you sure you want to delete this ? </h4>
                                <div class="form-group hidden">
                                    <input type="text" class="form-control" name="meeting_id">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Delete</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
