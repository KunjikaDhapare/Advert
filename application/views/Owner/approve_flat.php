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
                        <h3>Please Approve Flat First</h3>
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
                                    <th><center>Approve</center></th>
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
                                        <td><center><?php echo $key['flat_area']; ?></center></td>
                                        <td><center><?php echo $key['flat_type']; ?></center></td>
                                        <td><center><?php echo $key['flat_status']; ?></center></td>
                                        <td>
                                        	<?php if ($key['flat_owner_mem_id'] == 0) { ?>
                                            	<center><span data-toggle="modal" data-id="<?php echo $key['flat_id'] ?>" data-target="#approveFlatow"><i class="fa fa-check  fa-lg text-navy" title="Send Resignation"></i></span></center>
                                            <?php }else{ ?>
                                            	<center><h4>Approved</h4></center>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } }?>
                            </tbody>
                        </table>
                    </div>                    
                </div>
                <div id="approveFlatow" class="modal fade" role="dialog">
			        <div class="modal-dialog">
			            <!-- Modal content-->
			            <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('approveFlat') ?>">
			            <div class="modal-content">
			                <div class="modal-body">
			                    <h4 class="modal-title">Do you really what to approve ?</h4>
			                    <div class="form-group hidden">
			                        <input type="text" class="form-control" name="flat_id">
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