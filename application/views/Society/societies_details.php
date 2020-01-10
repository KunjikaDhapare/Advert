<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Societies Records</h3>
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
		                                <td><?php if(!empty($member)){ echo $member[0]['member_name'];}?></td>
		                                <td><?php if(!empty($member)){ echo $member[0]['member_email'];}?></td>
		                                <td><?php if(!empty($member)){ echo $member[0]['member_mobile'];}?></td>
		                                <td>
		                                	<a href="<?php echo site_url('editSociety/'.$key['soc_id'].'') ?>"><i class="fa fa-pencil fa-lg  text-navy" title="Edit"></i></a>&nbsp &nbsp
                                            <span  data-toggle="modal" data-id="<?php echo $key['soc_id'] ?>" data-target="#delteSociety"><i class="fa fa-trash  fa-lg text-navy" title="Delete Society"></i></span>&nbsp
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
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="soc_id" value="">
                                        <input type="text" class="form-control" name="soc_status" id="activateSoc" value="1">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Ok</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="deactivateModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body">
                                <p>Are you sure you want to delete this?</p>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="soc_id" value="">
                                    <input type="text" class="form-control" name="soc_status" value="0">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Delete</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div> 
                <div id="delteSociety" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('deleteSociety') ?>">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h4 class="modal-title">Are you sure you want to delete this?</h4>
                                <div class="form-group hidden">
                                    <input type="text" class="form-control" name="soc_id">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Delete</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>