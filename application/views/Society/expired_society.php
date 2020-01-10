<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Expired Societies Records</h3>
                    </div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('newSociety')?>"><span class="btn btn-success"><i class="fa fa-plus"></i> Add</span></a>
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
	                                <th>Sub. Period </th>
	                                <th>Status</th>
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
		                                <td><?php echo $key['soc_sub_period'] .' Months'?></td>
		                                <td><?php if($key['soc_payment_status'] == 1){echo 'Suceess';} else{ echo 'Pending';}?></td>
		                                <td><?php if(!empty($member)){ echo $member[0]['member_name'];}?></td>
		                                <td><?php if(!empty($member)){ echo $member[0]['member_email'];}?></td>
		                                <td><?php if(!empty($member)){ echo $member[0]['member_mobile'];}?></td>
		                                <td>
		                                	<span  data-toggle="modal" data-id="<?php echo $key['soc_id'] ?>" data-target="#renewModal"><i class="fa fa-refresh  fa-lg text-navy" title="Renew Society"></i></span>&nbsp &nbsp
		                                </td>
		                            </tr>
		                        <?php } }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="renewModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <form class="form-horizontal" role="form" id="societyRecords" method="POST" action="<?php echo site_url('renewSocietyDetails') ?>">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Renew Society</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group hidden">
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="soc_id" value="">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="soc_expired" value="0">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6">
                                            <label class="control-label">Payment Mode  <span class="mandaory">*</span></label>
                                            <select class="form-control" name="soc_payment_mode">
                                                <option value="">Please Select</option>
                                                <option value="2">Offline</option>
                                            </select>
                                        </div>                                            
                                        <div class="col-sm-6">
                                            <label class="control-label">Subscription Period  <span class="mandaory">*</span></label>
                                            <select class="form-control" name="soc_sub_period">
                                                <option value="">Please Select</option>
                                                <!-- <option value="1">1 Month</option> -->
                                                <option value="3">3 Month</option>
                                                <option value="6">6 Month</option>
                                                <option value="12">12 Month</option>
                                                <option value="24">24 Month</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6 hidden" id="payment_type">
                                            <label class="control-label">Offline Payment Mode <span class="mandaory">*</span></label>
                                            <select class="form-control" name="payment_mode">
                                                <option value="">Please Select</option>
                                                <option value="2">Cash Payment</option>
                                                <option value="3">Cheque Payment</option>
                                            </select>
                                        </div>                                            
                                        <div class="col-sm-6 hidden" id="cheque_details">
                                            <label class="control-label">Bank Name  <span class="mandaory">*</span></label>
                                            <input type="text" placeholder="Enter Bank Name" name="bank_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-6 hidden" id="cheque_cls_details">
                                            <label class="control-label">Cheque Clearance Date <span class="mandaory">*</span></label>
                                            <input type="text" placeholder="Enter Date" name="chk_celarnce_date" class="form-control datepicker" readonly="">
                                        </div>
                                        <div class="col-sm-6 hidden" id="cheque_no_details">
                                            <label class="control-label">Cheque Number  <span class="mandaory">*</span></label>
                                            <input type="text" placeholder="Enter Cheque Number" name="chk_no" class="form-control">
                                        </div>
                                    </div> 
                                    <div class="form-group" >
                                        <div class="col-sm-6 hidden" id="amount_details">
                                            <label class="control-label">Amount Paid  <span class="mandaory">*</span></label>
                                            <input type="text" placeholder="Enter Amount paid" name="payment_amount" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Renew</button>
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