<?php $CI = &get_instance(); ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Adverties Records</h3>
                    </div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('newAdverties')?>"><span class="btn btn-success"><i class="fa fa-plus"></i> Add</span></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                            <table class="table" style="margin-bottom: 0px !important;">
                                <tbody>
                                    <tr>
                                        <td style="border-top: none;">
                                            <button type="button" class="btn btn-danger m-r-sm" style="width: 1%;height: 3px;background-color: #54d25470;border-color: #54d25470;"></button>
                                            Adverties Printed.
                                        </td>
                                        <td style="border-top: none;">
                                            <button type="button" class="btn btn-danger m-r-sm" style="width: 1%;height: 3px;background-color: #b70000ba;border-color: #b70000ba;"></button>
                                            Adverties Scheduled but not printed.
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 m-b-xs"></div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                            <div class="input-group"><input type="text" placeholder="Search" name="search_records"class="input-sm form-control"> <span class="input-group-btn">
                                <button type="button" class="btn btn-sm btn-primary serach_record"> <i class="fa fa-search"></i></button> </span>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="table-responsive">
                        <table class="table table-striped" style="border: 2px solid #000000;">
                            <thead style="border-bottom: 2px solid #000000;">
	                            <tr style="color: #000000;font-size: 1.1em;font-weight: bold;">
	                                <th>#</th>
                                    <th>Advt. Caption</th>
	                                <th>Publication</th>
                                    <th>Size</th>
                                    <!-- <th>Incharge</th> -->
                                    <th>Total Advt.</th>
                                    <th><center>Rate/Advt.</center></th>
                                    <th>Approved By</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php if(empty($adv_details)){ ?>
                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
                            	<?php }else{ $i = 1; foreach (array_reverse($adv_details) as $key) {
                                    $pub = $CI->Home_model->fetch_details('pub_id = '.$key['adv_pub_id'].'','ad_publication');
                                    $size = $CI->Home_model->fetch_details('size_id = '.$key['adv_size_id'].'','ad_size');
                                    $incharge = $CI->Home_model->fetch_details(' cont_id = '.$key['adv_incharge_con_id'].'','ad_contact');
                                    $mem = $CI->Home_model->fetch_details('member_id = '.$key['adv_approved_by_id'].'','ad_member');
                                    $role = $CI->Home_model->fetch_details('id = '.$key['adv_approved_role_id'].'','ad_user_role');
                                    $notPrinted = $CI->Home_model->total_records_count('sch_date < "'.date('Y-m-d').'" and sch_isDelete = 0 and sch_approved_status = 1 and sch_ready_print = 0 and sch_print_done = 0 and sch_adv_id = '.$key['adv_id'].'','ad_schedule');
                                    if ($notPrinted != 0) { ?>
                                        <tr style="background-color: #b70000ba;color: #ffffff;font-size: 1.1em;font-weight: bold;">
                                    <?php }else{ ?>
                                        <tr style="background-color: #54d25470;color: #000000;font-size: 1.1em;font-weight: bold;">
                                    <?php } ?>
		                                <td><?php echo $i++; ?></td>
                                        <td><?php echo $key['adv_for']; ?></td>
		                                <td><?php echo $pub[0]['pub_name']?></td>
		                                <!-- <td><?php if($key['adv_isDelete'] == 0){ echo "Activated";}else{ echo "Not Activated";}?></td> -->
                                        <td><?php echo $size[0]['size_name'].' ('.$key['adv_size_height'].'*'.$key['adv_size_width'].')'?></td>
                                        <!-- <td><?php echo $incharge[0]['cont_name']?></td> -->
                                        <td><?php echo $key['adv_paid'].' Paid + '.$key['adv_free'].' Free'?></td>
                                        <th><center><?php echo number_format($key['adv_adjust_rate']).' /-'; ?></center></th>
                                        <td><?php if(!empty($mem)){ if($user['role_id'] == 5) { echo $mem[0]['member_name'].' ('.$role[0]['role'].')';}else{ echo $role[0]['role']; } }else{ echo "Not Approve";} ?></td>
                                        <td><center>
                                            <a href="<?php echo site_url('advView/'.$key['adv_id']) ?>"><span class="btn btn-primary btn-sm"><i class="fa fa-eye" title="View adverties"></i></span></a>
                                            <?php if($key['adv_createby'] == $user['id'] && $key['adv_approved_status'] == 2){ ?>
                                            <a href="<?php echo site_url('editAdv/'.$key['adv_id']) ?>"><span class="btn btn-primary btn-sm"><i class="fa fa-pencil" title="Edit adverties"></i></span></a>  
                                            <?php } ?>   
                                        </center></td>
		                            </tr>
		                        <?php } }?>
                            </tbody>
                        </table>
                    </div>
                    <div id="newCommittee" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form class="form-horizontal" role="form" id="societyRecords" method="POST" action="<?php echo site_url('newCommittee') ?>">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add New Committee</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label class="control-label">Committee Name <span class="mandaory">*</span></label>
                                                <input type="text" name="comm_name" class="form-control" required placeholder="Please enter the committee Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Add Committee</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="CommiteeMember" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form class="form-horizontal" role="form" id="commRecords" method="POST" action="<?php echo site_url('commMember') ?>" style="position: relative;z-index: 10000;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Commitee Member</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group hidden">
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="comm_id" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label class="control-label">Member Name <span class="mandaory">*</span></label>
                                                <select class="form-control" name="comm_member_id">
                                                    <option value="">Please Select</option>
                                                    <?php foreach ($member_details as $key) {?>
                                                        <option value="<?php echo $key['member_id'] ?>"><?php echo $key['member_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">                                          
                                            <div class="col-sm-6">
                                                <label class="control-label">Nomination / Elected Date<span class="mandaory">*</span></label>
                                                <input type="text" name="form_dates" class="form-control" value="" readonly>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="control-label">Resignation / Handover Date<span class="mandaory">*</span></label>
                                                <input type="text" name="till_dates" class="form-control" value="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Add Member</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="delteCommittee" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('deleteCommittee') ?>" style="position: relative;z-index: 10000;">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4 class="modal-title">Are you sure you want to delete this ? After delete all member which assign to this committee Member also resigned.</h4>
                                    <div class="form-group hidden">
                                        <input type="text" class="form-control" name="comm_id">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Ok</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>