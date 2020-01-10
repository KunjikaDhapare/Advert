<style type="text/css">
    .no-margins{
        padding-top: 0px !important;
    }
</style>
<?php $ci = &get_instance(); ?>
<div class="wrapper wrapper-content animated fadeInRight">
	<div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <div class="col-sm-6" style="padding-left: 0px;">
                        <h3>Co-owner Details</h3>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Wing</th>
                                    <th><center>Floor</center></th>
                                    <th><center>Flat Number</center></th>
                                    <th><center>Area</center></th>
                                    <th><center>Type</center></th>
                                    <th><center>Status</center></th>
                                    <th><center>Add Co-Owner</center></th>
                                    <th><center>View Co-Owner</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($total_owner_flat)){ ?>
                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
                                <?php }else{ $i = 1; foreach($total_owner_flat as $key) {?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php $mem = $ci->Home_model->fetch_details(array('wing_id'=>$key['flat_wing_id']),'rs_wing'); echo $mem[0]['wing_name']; ?></td>
                                        <td><center><?php echo $key['flat_floor']; ?></center></td>
                                        <td><center><?php echo $key['flat_number']; ?></center></td>
                                        <td><center><?php echo $key['flat_area'] .' sqft'; ?></center></td>
                                        <td><center><?php echo $key['flat_type']; ?></center></td>
                                        <td><center><?php echo $key['flat_status']; ?></center></td>
                                        <td>
                                            <center><span data-toggle="modal" data-id="<?php echo $key['flat_id'] ?>" data-target="#co_owner_update"><i class="fa fa-users  fa-lg text-navy" title="Add Co-owner Details"></i></span></center>
                                        </td>
                                        <td>
                                            <center><span data-toggle="modal" data-id="<?php echo $key['flat_id'] ?>" data-target="#co_owner_view"><i class="fa fa-eye  fa-lg text-navy" title="View Co-owner Details"></i></span></center>
                                        </td>
                                    </tr>
                                <?php } }?>
                            </tbody>
                        </table>
                    </div>                    
                </div>
                <div id="co_owner_update" class="modal fade" role="dialog">
			        <div class="modal-dialog">
			            <!-- Modal content-->
			            <form class="form-horizontal" id="coOwner" role="form" method="POST" action="<?php echo site_url('coOwnerUpdate') ?>" style="position: relative;z-index: 10000;">
			            <div class="modal-content">
			                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Flat Co-owner Details</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group hidden">
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="flat_id">
                                        </div>
                                    </div>
                                    <div class="form-group">                                            
                                        <div class="col-sm-6">
                                            <label class="control-label">Name  <span class="mandaory">*</span></label>
                                            <input type="text" placeholder="Enter co-owner name" name="owner_name" class="form-control">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="control-label">Contact  <span class="mandaory">*</span></label>
                                            <input type="text" placeholder="Enter contact number" name="owner_phone" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    	<div class="col-sm-6">
                                            <label class="control-label">Email  <span class="mandaory">*</span></label>
                                            <input type="email" placeholder="Enter email" name="owner_email" class="form-control">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="control-label">Date of Birth<span class="mandaory">*</span></label>
                                            <input type="text" placeholder="Enter Date" name="owner_DOB" class="form-control datepicker" readonly="">
                                        </div>                                        
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Add</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
			            </div>
			        </div>
			    </div>
			    <div id="co_owner_view" class="modal fade" role="dialog">
			        <div class="modal-dialog">
			             <!-- Modal content -->
			            <form class="form-horizontal" id="coOwner" role="form" method="POST" action="<?php echo site_url('') ?>">
			            <div class="modal-content">
			                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Flat Co-owner Details</h4>
                                </div>
                                <div class="modal-body">
                                	<div class="table-responsive">
				                        <table class="table table-striped">
				                            <thead>
				                                <tr>
				                                    <th>#</th>
				                                    <th>Name</th>
				                                    <th><center>Contact</center></th>
				                                    <th><center>Email</center></th>
				                                    <th><center>Action</center></th>
				                                </tr>
				                            </thead>
				                            <tbody class="owner_details">
				                                <?php if(empty($total_owner_flat)){ ?>
				                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
				                                <?php }else{ $i = 1; foreach($total_owner_flat as $key) {?>
				                                    <tr>
				                                        <td><?php echo $i++; ?></td>
				                                        <td><?php $mem = $ci->Home_model->fetch_details(array('wing_id'=>$key['flat_wing_id']),'rs_wing'); echo $mem[0]['wing_name']; ?></td>
				                                        <td><center><?php echo $key['flat_floor']; ?></center></td>
				                                        <td><center><?php echo $key['flat_number']; ?></center></td>
				                                        <td><center><?php echo $key['flat_area']; ?></center></td>
				                                        <td><center><?php echo $key['flat_type']; ?></center></td>
				                                        <td><center><?php echo $key['flat_status']; ?></center></td>
				                                        <td>
				                                            <center><span data-toggle="modal" data-id="<?php echo $key['flat_id'] ?>" data-target="#co_owner_update"><i class="fa fa-users  fa-lg text-navy" title="Add Co-owner Details"></i></span></center>
				                                        </td>
				                                        <td>
				                                            <center><span data-toggle="modal" data-id="<?php echo $key['flat_id'] ?>" data-target="#co_owner_view"><i class="fa fa-eye  fa-lg text-navy" title="View Co-owner Details"></i></span></center>
				                                        </td>
				                                    </tr>
				                                <?php } }?>
				                            </tbody>
				                        </table>
				                    </div>
                                </div>
                                <div class="modal-footer">
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