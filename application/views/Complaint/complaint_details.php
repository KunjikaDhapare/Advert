<style type="text/css">
    .tab-content>.active {
        border-bottom: 1px solid #ddd;
        border-right: 1px solid #ddd;
        border-left: 1px solid #ddd;
        padding: 2%;
    }
    .panel-body{
        padding: 1px 15px 15px 15px;
    }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus{
        color: #ffffff;
        font-weight: bold;
    }
</style>
<?php 
    $CI = &get_instance(); 
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Grievance Records</h3>
                    </div>
                    <?php if($user['role_id'] == 11){ ?>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('newComplaint') ?>"><span  class="btn btn-success"><i class="fa fa-plus " title="New Complaint"></i> Add New</span></a>
                    </div>
                    <?php } ?>
                </div>
                <div class="ibox-content">                    
                    <div class="panel blank-panel">
                        <div class="panel-heading">
                            <div class="panel-options">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-4">Open</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-5">Accepted</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-6">Resolved</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-7">Closed</a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-8">Reopen</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="tab-4" class="tab-pane active">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Subject</th>
                                                    <th>Description</th>
                                                    <th>Against Whom</th>
                                                    <th><center>Action</center></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(empty($complaint_records)){ ?>
                                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
                                                <?php }else{ $i = 1; foreach (array_reverse($complaint_records) as $key) { if($key['complaint_status'] == '1'){?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $key['complaint_subject']?></td>
                                                        <td><?php echo $key['complaint_description']?></td>
                                                        <td><?php if($key['complaint_for']==1){echo 'All';}else{if($key['complaint_against']==1){
                                                            $user_role = $CI->Home_model->fetch_details(array('id'=>$key['complaint_role']),'rs_user_role'); echo $user_role[0]['role'];}else{ if($key['complaint_wing_id']==0){echo 'All Wings';}else{$wing = $CI->Home_model->fetch_details(array('wing_id'=>$key['complaint_wing_id']),'rs_wing');echo $wing[0]['wing_name'];}if($key['complaint_flat_id']==0){echo 'All Flats';}else{$flat = $CI->Home_model->fetch_details(array('flat_id'=>$key['complaint_flat_id']),'rs_flat'); echo ' ('.$flat[0]['flat_number'].')';}}}?>
                                                        </td>
                                                        <td>
                                                            <center>
                                                                   <!--  <a href="<?php echo site_url('editComplaint/'.$key['complaint_id']) ?>"><span class=""><i class="fa fa-edit fa-lg"></i></span></a>&nbsp &nbsp -->
                                                                <?php if($user['role_id'] =='11' && $key['complaint_flat_id'] != $user['flat_id']){ ?>
                                                                     <span data-toggle="modal" data-id="<?php echo $key['complaint_id'] ?>" data-target="#deleteComplaint"><i class="fa fa-times-circle  fa-lg text-navy" title="Close Grievance"></i></span>&nbsp &nbsp
                                                                <?php } ?>
                                                                <?php if($user['role_id'] !='11' || $key['complaint_flat_id'] == $user['flat_id']){ ?>
                                                                    <span data-toggle="modal" data-id="<?php echo $key['complaint_id'] ?>" data-target="#acceptComplaint"><i class="fa fa-check-square  fa-lg text-navy" title="Accept Grievance"></i></span>
                                                                <?php } ?>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                <?php } } }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="tab-5" class="tab-pane">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Subject</th>
                                                    <th>Description</th>
                                                    <th>Against Whom</th>
                                                    <th><center>Action</center></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(empty($complaint_records)){ ?>
                                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
                                                <?php }else{ $j = 1; foreach (array_reverse($complaint_records) as $key) { if($key['complaint_status'] == '2'){?>
                                                    <tr>
                                                        <td><?php echo $j++; ?></td>
                                                        <td><?php echo $key['complaint_subject']?></td>
                                                        <td><?php echo $key['complaint_description']?></td>
                                                        <td><?php if($key['complaint_for']==1){echo 'All';}else{if($key['complaint_against']==1){
                                                            $user_role = $CI->Home_model->fetch_details(array('id'=>$key['complaint_role']),'rs_user_role'); echo $user_role[0]['role'];}else{ if($key['complaint_wing_id']==0){echo 'All Wings';}else{$wing = $CI->Home_model->fetch_details(array('wing_id'=>$key['complaint_wing_id']),'rs_wing');echo $wing[0]['wing_name'];}if($key['complaint_flat_id']==0){echo 'All Flats';}else{$flat = $CI->Home_model->fetch_details(array('flat_id'=>$key['complaint_flat_id']),'rs_flat'); echo ' ('.$flat[0]['flat_number'].')';}}}?>
                                                        </td>
                                                        <td>
                                                            <center>
                                                                <?php if($user['role_id'] == '11' && $key['complaint_flat_id'] != $user['flat_id']){ ?>
                                                                    <!-- <a href="<?php echo site_url('editComplaint/'.$key['complaint_id']) ?>"><span class=""><i class="fa fa-edit fa-lg"></i></span></a>&nbsp &nbsp -->
                                                                    <span data-toggle="modal" data-id="<?php echo $key['complaint_id'] ?>" data-target="#deleteComplaint"><i class="fa fa-times-circle  fa-lg text-navy" title="Close Grievance"></i></span>&nbsp &nbsp
                                                                <?php } ?>
                                                                <?php if($user['role_id'] !='11' || $key['complaint_flat_id'] == $user['flat_id']){ ?>
                                                                    <span data-toggle="modal" data-id="<?php echo $key['complaint_id'] ?>" data-target="#resolvedComplaint"><i class="fa fa-thumbs-up fa-lg text-navy" title="Resolved Grievance"></i></span>
                                                                <?php } ?>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                <?php } } }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="tab-6" class="tab-pane">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Subject</th>
                                                    <th>Description</th>
                                                    <th>Against Whom</th>
                                                    <th>Message</th>
                                                    <?php if($user['role_id'] =='11'){ ?>
                                                    <th><center>Action</center></th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(empty($complaint_records)){ ?>
                                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
                                                <?php }else{ $i = 1; foreach (array_reverse($complaint_records) as $key) { if($key['complaint_status'] == '3'){?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $key['complaint_subject']?></td>
                                                        <td><?php echo $key['complaint_description']?></td>
                                                        <td><?php if($key['complaint_for']==1){echo 'All';}else{if($key['complaint_against']==1){
                                                            $user_role = $CI->Home_model->fetch_details(array('id'=>$key['complaint_role']),'rs_user_role'); echo $user_role[0]['role'];}else{ if($key['complaint_wing_id']==0){echo 'All Wings';}else{$wing = $CI->Home_model->fetch_details(array('wing_id'=>$key['complaint_wing_id']),'rs_wing');echo $wing[0]['wing_name'];}if($key['complaint_flat_id']==0){echo 'All Flats';}else{$flat = $CI->Home_model->fetch_details(array('flat_id'=>$key['complaint_flat_id']),'rs_flat'); echo ' ('.$flat[0]['flat_number'].')';}}}?>
                                                        </td>
                                                        <td><?php echo $key['complaint_action_msg']?></td>
                                                        <?php if($user['role_id'] =='11' && $key['complaint_flat_id'] != $user['flat_id']){ ?>
                                                        <td>
                                                            <center>
                                                                   <span data-toggle="modal" data-id="<?php echo $key['complaint_id'] ?>" data-target="#deleteComplaint"><i class="fa fa-times-circle  fa-lg text-navy" title="Close Grievance"></i></span>&nbsp &nbsp
                                                                    <span data-toggle="modal" data-id="<?php echo $key['complaint_id'] ?>" data-target="#reopenComplaint"><i class="fa fa-refresh  fa-lg text-navy" title="Reopen Grievance"></i></span>
                                                            </center>
                                                        </td>
                                                        <?php } ?>
                                                        <td>
                                                            
                                                        </td>
                                                    </tr>
                                                <?php } } }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="tab-7" class="tab-pane">
                                   <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Subject</th>
                                                    <th>Description</th>
                                                    <th>Against Whom</th>
                                                    <th>Message</th>
                                                    <?php if($user['role_id'] !='11'){ ?>
                                                        <th><center>Action</center></th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(empty($complaint_records)){ ?>
                                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
                                                <?php }else{ $i = 1; foreach (array_reverse($complaint_records) as $key) { if($key['complaint_status'] == '4'){?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $key['complaint_subject']?></td>
                                                        <td><?php echo $key['complaint_description']?></td>
                                                        <td><?php if($key['complaint_for']==1){echo 'All';}else{if($key['complaint_against']==1){
                                                            $user_role = $CI->Home_model->fetch_details(array('id'=>$key['complaint_role']),'rs_user_role'); echo $user_role[0]['role'];}else{ if($key['complaint_wing_id']==0){echo 'All Wings';}else{$wing = $CI->Home_model->fetch_details(array('wing_id'=>$key['complaint_wing_id']),'rs_wing');echo $wing[0]['wing_name'];}if($key['complaint_flat_id']==0){echo 'All Flats';}else{$flat = $CI->Home_model->fetch_details(array('flat_id'=>$key['complaint_flat_id']),'rs_flat'); echo ' ('.$flat[0]['flat_number'].')';}}}?>
                                                        </td>
                                                        <td><?php echo $key['complaint_action_msg']?></td>
                                                        <?php if($user['role_id'] !='11' || $key['complaint_flat_id'] == $user['flat_id']){ ?>
                                                        <td>
                                                            <center>                                                                
                                                                    <span data-toggle="modal" data-id="<?php echo $key['complaint_id'] ?>" data-target="#deleteComplaintstatus"><i class="fa fa-trash  fa-lg text-navy" title="Delete Complaint"></i></span>
                                                            </center>
                                                        </td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php } } }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="tab-8" class="tab-pane">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Subject</th>
                                                    <th>Description</th>
                                                    <th>Against Whom</th>
                                                    <th>Message</th>
                                                    <?php if($user['role_id'] !='11'){ ?>
                                                    <th><center>Action</center></th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(empty($complaint_records)){ ?>
                                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
                                                <?php }else{ $i = 1; foreach (array_reverse($complaint_records) as $key) { if($key['complaint_reopen'] == '1'){?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $key['complaint_subject']?></td>
                                                        <td><?php echo $key['complaint_description']?></td>
                                                        <td><?php if($key['complaint_for']==1){echo 'All';}else{if($key['complaint_against']==1){
                                                            $user_role = $CI->Home_model->fetch_details(array('id'=>$key['complaint_role']),'rs_user_role'); echo $user_role[0]['role'];}else{ if($key['complaint_wing_id']==0){echo 'All Wings';}else{$wing = $CI->Home_model->fetch_details(array('wing_id'=>$key['complaint_wing_id']),'rs_wing');echo $wing[0]['wing_name'];}if($key['complaint_flat_id']==0){echo 'All Flats';}else{$flat = $CI->Home_model->fetch_details(array('flat_id'=>$key['complaint_flat_id']),'rs_flat'); echo ' ('.$flat[0]['flat_number'].')';}}}?>
                                                        </td>
                                                        <td><?php echo $key['complaint_reopen_msg']?></td>                                                            
                                                        <?php if($user['role_id'] !='11' || $key['complaint_flat_id'] == $user['flat_id']){ ?>
                                                        <td>
                                                           <center>
                                                                <span data-toggle="modal" data-id="<?php echo $key['complaint_id'] ?>" data-target="#acceptComplaint"><i class="fa fa-check-square  fa-lg text-navy" title="Accept Grivience"></i></span>
                                                            </center>
                                                        </td>
                                                        <?php } ?>
                                                    </tr>
                                                <?php } } }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="resolvedComplaint" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form class="form-horizontal" role="form" id="societyRecords" method="POST" action="<?php echo site_url('updateComplaintStatus') ?>">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Resolved Complaint</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group hidden">
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="complaint_id" value="">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="complaint_status" value="3">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label class="control-label">Action Message for Member <span class="mandaory">*</span></label>
                                                <textarea name="complaint_action_msg" class="form-control" required=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Add Comment</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="acceptComplaint" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form class="form-horizontal" role="form" id="commRecords" method="POST" action="<?php echo site_url('updateComplaintStatus') ?>">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Complaint Status</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group hidden">
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="complaint_id" value="">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="complaint_status" value="2">
                                            </div>
                                        </div>
                                        <h4 class="modal-title">Accept the Complaint.</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Accept</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> 
                    <div id="deleteComplaint" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form class="form-horizontal" role="form" id="commRecords" method="POST" action="<?php echo site_url('updateComplaintStatus') ?>">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Complaint Status</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group hidden">
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="complaint_id" value="">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="complaint_status" value="4">
                                            </div>
                                        </div>
                                        <h4 class="modal-title">Close the Complaint.</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="reopenComplaint" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form class="form-horizontal" role="form" id="societyRecords" method="POST" action="<?php echo site_url('updateComplaintStatus') ?>">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Resolved Complaint</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group hidden">
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="complaint_id" value="">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="complaint_status" value="1">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="complaint_reopen" value="1">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label class="control-label">Reopen Message for Admin <span class="mandaory">*</span></label>
                                                <textarea name="complaint_reopen_msg" class="form-control" required=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Reopen</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="deleteComplaintstatus" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('updateComplaintStatus') ?>">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h4 class="modal-title">Are you sure to delete this ?</h4>
                                        <div class="form-group hidden">
                                            <input type="text" class="form-control" name="complaint_id">
                                            <input type="text" class="form-control" name="complaint_status" value="4">
                                            <input type="text" class="form-control" name="complaint_delete" value="1">
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
</div>
