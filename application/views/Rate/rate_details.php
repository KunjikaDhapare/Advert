<?php $CI = &get_instance(); ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Rate</h3>
                    </div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('newRate')?>"><span class="btn btn-success"><i class="fa fa-plus"></i> Add</span></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-5 m-b-xs"></div>
                        <div class="col-sm-4 m-b-xs"></div>
                        <div class="col-sm-3">
                            <div class="input-group"><input type="text" placeholder="Search" name="search_records"class="input-sm form-control"> <span class="input-group-btn">
                                <button type="button" class="btn btn-sm btn-primary serach_record"> <i class="fa fa-search"></i></button> </span>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
	                            <tr>
	                                <th>#</th>
                                    <?php if($user['role_id'] == 1){ ?>
	                                   <th>Company Name</th>
                                    <?php } ?>
                                    <th>Publication Name</th>
                                    <th>Size</th>
                                    <th>Rate Color</th>
                                    <th>Rate B & W</th>
                                    <th>Approved By</th>
                                    <?php if($user['role_id'] == 5){ ?>
                                        <th><center>Action</center></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php if(empty($all_rate)){ ?>
                                    <td colspan="9"><h3 class="no-records">No Records Found.</h3></td>
                            	<?php }else{ $i = 1; foreach ($all_rate as $key) {
                                    $com = $CI->Home_model->fetch_details('com_id = '.$key['rate_com_id'].'','ad_company');
                                    $pub = $CI->Home_model->fetch_details('pub_id = '.$key['rate_pub_id'].'','ad_publication');
                                    $size = $CI->Home_model->fetch_details('size_id = '.$key['rate_size_id'].'','ad_size');
                                    $mem = $CI->Home_model->fetch_details('member_id = '.$key['rate_approved_by_id'].'','ad_member');
                                    $role = $CI->Home_model->fetch_details('id = '.$key['rate_approved_role_id'].'','ad_user_role');
                                     $size_type = $CI->Home_model->fetch_details('size_type_id = '.$pub[0]['pub_size_type'].'','ad_size_type');
                                ?>
                                    <tr>
		                                <td><?php echo $i++; ?></td>
                                        <?php if($user['role_id'] == 1){ ?>
		                                  <td><?php echo $com[0]['com_name']?></td>
                                        <?php } ?>
                                        <td><?php echo $pub[0]['pub_name']?></td>
                                        <td><?php echo $size_type[0]['size_type_name'];
                                        echo ' ('.$size[0]['size_name'].')'?></td>
                                        <td><?php echo $key['rate_colour']?></td>
                                        <td><?php echo $key['rate_blank_white']?></td>
                                        <td><?php if(!empty($mem)){ if($user['role_id'] == 5) { echo $mem[0]['member_name'].' ('.$role[0]['role'].')';}else{ echo $role[0]['role']; } }else{ echo "Not Approve";} ?></td>
                                        <td><center>
                                            <?php if(($user['role_id'] == 5 && $key['rate_approved_status'] == 2) || ($user['role_id'] == 3 && $key['rate_created_role_id'] == 4 && $key['rate_approved_status'] == 2) ||  ($user['role_id'] == 2 && ($key['rate_created_role_id'] == 3 || $key['rate_created_role_id'] == 4) && $key['rate_approved_status'] == 2)){ ?>
                                                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-id="<?php echo $key['rate_id'] ?>" data-target="#approveRate"><i class="fa fa-check" title="Approve rate"></i>  </button>
                                            <?php }if($user['role_id'] == 5){ ?>
                                                <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-id="<?php echo $key['rate_id'] ?>" data-target="#disableRate"><i class="fa fa-trash" title="Disable rate"></i>  </button>
                                            <?php } ?>                      
                                        </center></td>
		                            </tr>
		                        <?php } }?>
                            </tbody>
                        </table>
                    </div>
                    <div id="disableRate" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('disableRate') ?>" style="position: relative;z-index: 10000;">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4 class="modal-title">Are you sure you want to delete this rate?</h4>
                                    <div class="form-group hidden">
                                        <input type="text" class="form-control" name="rate_id">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Yes</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                    <div id="approveRate" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('approveRate') ?>" style="position: relative;z-index: 10000;">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4 class="modal-title">Are you sure you want to approve this rate?</h4>
                                    <div class="form-group hidden">
                                        <input type="text" class="form-control" name="approve_rate_id">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Approve</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>