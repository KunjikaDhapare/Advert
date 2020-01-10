<?php $CI = &get_instance(); ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>User's Records</h3>
                    </div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('newUser')?>"><span class="btn btn-success"><i class="fa fa-plus"></i> Add</span></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-5 m-b-xs"></div>
                        <div class="col-sm-4 m-b-xs"></div>
                        <div class="col-sm-3">
                            <div class="input-group"><input type="text" name="search_records"  placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                <button type="button" class="btn btn-sm btn-primary"> Go!</button> </span></div>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
	                            <tr>
	                                <th>#</th>
                                    <?php if($user['role_id'] != 5){ ?>
                                    <th>Company</th>
                                    <?php } ?>
	                                <th>User Name </th>
                                    <th>Designation</th>
	                                <th>Contact </th>
	                                <th>Email ID</th>
	                                <!-- <th>Username</th> -->
	                                <th>Action</th>
	                            </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php if(empty($user_deatils)){ ?>
                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
                            	<?php }else{ $i = 1; foreach ($user_deatils as $key) {?>
                                    <tr>
                                        <?php $role = $CI->Home_model->fetch_details('id = '.$key['member_role_id'].'','ad_user_role');
                                        $company = $CI->Home_model->fetch_details('com_id = '.$key['member_com_id'].'','ad_company');
                                        ?>
		                                <td><?php echo $i++; ?></td>
                                        <?php if($user['role_id'] != 5){ ?>
                                            <td><?php if(!empty($company)){ echo $company[0]['com_name'];}else{ echo 'NA';} ?></td>
                                        <?php } ?>
		                                <td><?php echo $key['member_name']?></td>
		                                <td><?php echo $role[0]['role']?></td>
		                                <td><?php echo $key['member_mobile']?></td>
		                                <td><?php echo $key['member_email']?></td>
                                        <!-- <td><?php echo $key['member_email']?></td> -->
		                                <td>
		                                	<a href="<?php echo site_url('updateUser/'.$key["member_id"].'') ?>"><span class="btn btn-success btn-sm"><i class="fa fa-pencil fa-lg text-navy" title="Edit User" style="color: white;"></i></span></a>
                                            <span  class="btn btn-success btn-sm" data-toggle="modal" data-id="<?php echo $key['member_id'] ?>" data-target="#deleteMem"><i class="fa fa-trash  fa-lg text-navy" title="Delete User" style="color: white;"></i></span>&nbsp
		                                </td>
		                            </tr>
		                        <?php } }?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="editMem" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('editUser') ?>">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <p>Are you sure you want to edit this?</p>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="user_id" value="">
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Name <span class="mandaory">*</span></label>
                                            <input type="text" placeholder="Enter User Name" name='member_name' class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label">Email</label>
                                            <input type="email" placeholder="Enter User Email ID" name="member_email" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label">Contact</label>
                                            <input type="text" placeholder="Enter User Contact No." name="member_mobile" class="form-control">
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">User Role <span class="mandaory">*</span></label>
                                            <select class="form-control" name="member_role_id">
                                                <option value="">Please Select User role</option>
                                                <?php foreach ($user_role as $key) {
                                                    if($key['id'] == 1 || $key['id']==5){}else{
                                                    ?>
                                                    <option value="<?php echo $key['id'] ?>"><?php echo $key['role'] ?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 
                <div id="deleteMem" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('disableUser') ?>">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h4 class="modal-title">Are you sure you want to delete this User?</h4>
                                <div class="form-group hidden">
                                    <input type="text" class="form-control" name="member_id">
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