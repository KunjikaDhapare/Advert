<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Approve Societies Records</h3>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-5 m-b-xs"></div>
                        <div class="col-sm-4 m-b-xs"></div>
                        <div class="col-sm-3">
                            <div class="input-group"><input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
	                            <tr>
	                                <th>#</th>
	                                <th>Registration No.</th>
	                                <th>Society Name </th>
	                                <th>Payment Status</th>
	                                <th>Sub. Period </th>
	                                <th>Admin</th>
	                                <th>Email ID</th>
	                                <th>Contact</th>
	                                <th>Action</th>
	                            </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($society_details)){ ?>
                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
                            	<?php }else{ $i = 1; foreach ($society_details as $key) {?>
                                    <tr>
                                        <?php $where = array('member_role_id'=>2 ,'member_soc_id'=>$key['soc_id']);
                                            $ci = &get_instance(); $member = $ci->Home_model->fetch_details($where,'rs_member');
                                        ?>
		                                <td><?php echo $i++; ?></td>
		                                <td><?php echo $key['soc_SRN']?></td>
		                                <td><?php echo $key['soc_name']?></td>
		                                <td><?php if($key['soc_payment_status'] == 1){echo 'Suceess';} else{ echo 'Pending';}?></td>
		                                <td><?php echo $key['soc_sub_period'] .' Months'?></td>
		                                <td><?php if(!empty($member)){ echo $member[0]['member_name'];}?></td>
		                                <td><?php if(!empty($member)){ echo $member[0]['member_email'];}?></td>
		                                <td><?php if(!empty($member)){ echo $member[0]['member_mobile'];}?></td>
		                                <td>
                                            <span  data-toggle="modal" data-id="<?php echo $key['soc_id'] ?>" data-target="#activateModal"><i class="fa fa-check  fa-lg text-navy" title="Activate"></i></span>&nbsp
                                            <a href="<?php echo site_url('socPayment/'.$key['soc_id'].'') ?>"><i class="fa fa-money  fa-lg text-navy" title="Payment Details"></i></a>&nbsp

		                                </td>
		                            </tr>
		                        <?php } }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="activateModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('updateSocietyStatus') ?>">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4 class="modal-title">Are you sure to approve this?</h4>
                                    <div class="form-group hidden">
                                        <input type="text" class="form-control" name="soc_id" value="">
                                        <input type="text" class="form-control" name="soc_status" id="activateSoc" value="1">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Approve</button>
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