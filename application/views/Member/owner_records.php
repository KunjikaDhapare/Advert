<?php $ci = &get_instance(); ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Flat/ Shop/ Row House Owner Records</h3>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                    <form class="form-horizontal" role="form" id="sendMail" method="POST" action="<?php echo site_url('resend') ?>">
                        <?php if(!empty($ownerDetails)){ ?>
                            <div class="col-sm-5 m-b-xs">
                                <button class="btn btn-md btn-primary" type="submit"><strong>Resend Mail</strong></button>
                            </div>
                        <?php } ?>
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
		                                <th><center>Resend</center></th>
		                                <th>Wing</th>
		                                <th>Flat Number</th>
                                        <th>Shop Name</th>
		                                <th>Name</th>
		                                <th>Email </th>
		                                <th>Contact</th>
		                                <th><center>Action</center></th>
		                                <th><center>Commitee</center></th>
		                            </tr>
	                            </thead>
	                            <tbody  id="myTable">
	                                <?php if(empty($ownerDetails)){ ?>
	                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
	                            	<?php }else{ $i = 1;$j=0; foreach ($ownerDetails as $key) {?>
	                                    <tr>
	                                        <?php 
                                            if ($key['member_owner_type'] == 4) {
                                                $shop_wing = $ci->Home_model->fetch_details(array('wing_id'=>$key['member_shop_wing_id']),'rs_wing');
                                                $wing = $ci->Home_model->fetch_details(array('wing_id'=>$key['member_wing_id']),'rs_wing');
                                                $flat = $ci->Home_model->fetch_details(array('flat_id'=>$key['member_flat_id']),'rs_flat');
                                            }else if($key['member_owner_type'] == 2){
                                                $shop_wing = $ci->Home_model->fetch_details(array('wing_id'=>$key['member_shop_wing_id']),'rs_wing');
                                                $wing = $ci->Home_model->fetch_details(array('wing_id'=>$key['member_wing_id']),'rs_wing');
                                                $flat = $ci->Home_model->fetch_details(array('flat_id'=>$key['member_flat_id']),'rs_flat');
                                            }else{
	                                            $wing = $ci->Home_model->fetch_details(array('wing_id'=>$key['member_wing_id']),'rs_wing');
	                                            $flat = $ci->Home_model->fetch_details(array('flat_id'=>$key['member_flat_id']),'rs_flat');
                                            }
                                        //     if($key['member_email'] == 'applicationdevelopment@nimble-esolutions.com'){
                                        //         echo "<pre>";
                                        //         print_r($key);
                                        //     print_r($shop_wing);
                                        //     print_r($wing);
                                        //     print_r($flat);die();
                                        // }
	                                        ?>
			                                <td><?php echo $i++; ?></td>
			                                <td><center><?php if($key['member_email'] != ''){?><label class="checkbox-inline" style="margin-bottom: 11%;"><input type="checkbox" value="<?php echo $key['member_id'] ?>" name="member_id[]" style="margin-top: 0px;"></label><?php }else{} ?></center></td>
			                                <td><?php if($key['member_owner_type'] != 2){echo $wing[0]['wing_name'];}else{echo $shop_wing[0]['wing_name'];} ?></td>
			                                <td><?php if(!empty($flat)){ echo $flat[0]['flat_number'];}else{ echo 'NA';} ?></td>
                                            <td>
                                                <?php if($key['member_owner_type'] == 4){ echo $shop_wing[0]['wing_shop_name'].' ('.$shop_wing[0]['wing_name'].')';}elseif($key['member_owner_type'] == 2){ echo $shop_wing[0]['wing_shop_name'];}else{ echo 'NA';} ?>
                                                    
                                            </td>
			                                <td><?php echo $key['member_name']?></td>
			                                <td><?php echo $key['member_email']?></td>
			                                <td><?php echo $key['member_mobile']?></td>
			                                <td><center>
                                                <?php if($key['member_owner_type'] == 2){ ?>                                	
				                                    <a class="btn btn-success btn-sm" href="<?php echo site_url('shopOwner') ?>"><i class="fa fa-pencil  fa-lg text-navy" title="Edit Member Details"  style="color:white;"></i></a>&nbsp &nbsp 
                                                <?php }else{ ?>
                                                    <a class="btn btn-success btn-sm" href="<?php echo site_url('owner') ?>"><i class="fa fa-pencil  fa-lg text-navy" title="Edit Member Details"  style="color:white;"></i></a>&nbsp &nbsp
                                                <?php } ?>
				                                <?php if($key['member_email'] != ''){?>
		                                           <span class="btn btn-success btn-sm" data-toggle="modal" data-id="<?php echo $key['member_id'] ?>" data-target="#deleteMember"><i class="fa fa-trash  fa-lg text-navy" title="Delete Member" style="color:white;"></i></span>&nbsp
		                                        <?php } ?>
			                                </center></td>
			                                <td><center>
			                                	<?php if($key['member_email'] != ''){?>
			                                		<span class="btn btn-success btn-sm" data-toggle="modal" data-id="<?php echo $key['member_id'] ?>" data-target="#CommiteeMember"><i class="fa fa-plus  fa-lg text-navy" title="Add member in committee" style="color:white;"></i></span>
			                                	<?php } ?>
			                                </center></td>
			                            </tr>
			                        <?php $j++;} }?>
	                            </tbody>
	                        </table>
	                    </div>
		                <div class="form-group">
	                    	<div class="col-sm-10">
                                <?php if(!empty($ownerDetails)){ ?>
	                        	  <button class="btn btn-md btn-primary" type="submit"><strong>Resend Mail</strong></button><br>
                                <?php } ?>
	                        </div>
	                    </div>
	                </form><br>
                </div>
                <div id="CommiteeMember" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <form class="form-horizontal" role="form" id="societyRecords" method="POST" action="<?php echo site_url('memberCommittee') ?>" style="position: relative;z-index: 10000;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Committee Member</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group hidden">
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="comm_mem_id" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <label class="control-label">Committee Name <span class="mandaory">*</span></label>
                                            <select class="form-control" name="committee_id">
                                                <option value="">Please Select</option>
                                                <?php foreach ($comitteDetails as $key) {?>
                                                    <option value="<?php echo $key['comm_id'] ?>"><?php echo $key['comm_name'] ?></option>
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
                 <div id="deleteMember" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('deleteMember') ?>">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h4 class="modal-title">Are you sure you want to delete this?</h4>
                                <div class="form-group hidden">
                                    <input type="text" class="form-control" name="delete_member_id">
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