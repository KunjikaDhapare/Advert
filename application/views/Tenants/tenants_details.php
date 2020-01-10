<?php $CI = &get_instance(); ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Tenant Approval Status</h3>
                    </div>
                    <?php if($user['role_id'] == '11' || $user['sub_role'] == 3){ ?>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('newTenants') ?>"><span  class="btn btn-success"><i class="fa fa-plus " title="New Complaint"></i> Add New</span></a>
                    </div>
                    <?php } ?>
                </div>
                <div class="ibox-content">
                	<div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Wing</th>
                                    <th>Flat Number</th>
                                    <th>Owner Records</th>
                                    <th>Tenant Records</th>
                                    <th>Tenant Type</th>
                                    <th>Status</th>
                                    <?php if ($user['sub_role'] == 3 || $user['sub_role'] == 4) {?>
                                    <th><center>Action</center></th>
                                	<?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($tenant_details)){ ?>
                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
                                <?php }else{ $i = 1; foreach (array_reverse($tenant_details) as $key) {?>
                                	<?php 
                                		$flat = $CI->Home_model->fetch_details('flat_id='.$key['flat_id'].'','rs_flat');
                                		$wing = $CI->Home_model->fetch_details('wing_id='.$flat[0]['flat_wing_id'].'','rs_wing');
                                		$owner = $CI->Home_model->fetch_details('member_id='.$key['createdby'].'','rs_member');
                                	?>
                                    <tr>
                                    	<th><?php echo $i++; ?></th>
                                    	<td><?php echo $wing[0]['wing_name']; ?></td>
                                    	<td><?php echo $flat[0]['flat_number']; ?></td>
                                    	<td><?php echo ''.$owner[0]['member_name'].'<br> '.$owner[0]['member_email'].'<br> '.$owner[0]['member_mobile'].'' ; ?></td>
                                    	<td>
                                    		<?php echo ''.$key['name'].'<br> '.$key['email'].'<br> '.$key['phone'].'' ; ?>
                                    	</td>
                                    	<td>
                                    		<?php if($key['type'] == 1){ echo 'Family';}elseif($key['type'] == 2){ echo 'Commercial';}elseif ($key['type'] == 3){ echo 'Company Guest House';}else{ echo 'PG for student';} ?>
                                    	</td>
                                    	<td>
                                    		<?php if($key['status'] == 1){ echo 'Pending';}else{ echo 'Approved';} ?>
                                    	</td>
                                    	<?php if ($user['sub_role'] == 3 || $user['sub_role'] == 4) {?>
	                                    	<td>
	                                    		<?php if($key['status'] == 1){?>
			                                		<center><span class="btn btn-success btn-xs" data-toggle="modal" data-id="<?php echo $key['id'] ?>" data-target="#approveTenant"><i class="fa fa-check  fa-lg text-navy" title="Activate" style="color:white;"></i></span></center>
			                                	<?php } ?>
	                                    	</td>
		                                <?php } ?>

                                    </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                    <div id="approveTenant" class="modal fade" role="dialog">
				        <div class="modal-dialog">
				            <!-- Modal content-->
				            <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('approveTenant') ?>">
				            <div class="modal-content">
				                <div class="modal-body">
				                    <h4 class="modal-title">Do you really what to approve ?</h4>
				                    <div class="form-group hidden">
				                        <input type="text" class="form-control" name="tenant_id">
				                    </div>
				                </div>
				                <div class="modal-footer">
				                    <button type="submit" class="btn btn-success">Approve </button>
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
