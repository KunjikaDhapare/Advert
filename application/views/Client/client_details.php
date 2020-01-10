<?php $CI = &get_instance(); ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Client Records</h3>
                    </div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('newClient')?>"><span class="btn btn-success"><i class="fa fa-plus"></i> Add</span></a>
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
	                                <th>Client Name</th>
	                                <th>Contact</th>
                                    <th>Email</th>
                                    <th>Address</th>
	                            </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php if(empty($committee_details)){ ?>
                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
                            	<?php }else{ $i = 1; foreach ($committee_details as $key) {?>
                                    <tr>
		                                <td><?php echo $i++; ?></td>
		                                <td><?php echo $key['comm_name']?></td>
		                                <td><?php if($key['comm_status'] == 1){ echo "Activated";}else{ echo "Not Activated";}?></td>
                                        <td><center><?php echo $CI->Home_model->total_records_count('comm_mem_soc_id='.$user['soc_id'].' and comm_mem_comm_id='.$key['comm_id'].' and comm_mem_res_status NOT IN(1)','rs_committee_member') ?></center></td>
                                        <td>
                                            <?php if($key['comm_soc_id'] !=0){ ?>
                                            <center><span  data-toggle="modal" data-id="<?php echo $key['comm_id'] ?>" data-target="#delteCommittee"><i class="fa fa-trash  fa-lg text-navy" title="Delete Committee"></i></span>&nbsp</center>
                                        <?php } ?>
                                        </td>
		                                <td>
                                            <center><span  data-toggle="modal" data-id="<?php echo $key['comm_id'] ?>" data-target="#CommiteeMember"><i class="fa fa-user-plus  fa-lg text-navy" title="Add member in committee"></i></span></center>
                                        </td>
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