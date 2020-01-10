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
                        <h3>Flat Details</h3>
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
                                    <th><center>Add Parking</center></th>
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
                                        <td>
                                            <center><span data-toggle="modal" data-id="" data-target="#addParking"><i class="fa fa-car  fa-lg text-navy" title="Add parking Details"></i></span></center>
                                        </td>
                                    </tr>
                                <?php } }?>
                            </tbody>
                        </table>
                    </div>                    
                </div>                
            </div>                       
        </div>
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <div class="col-sm-6" style="padding-left: 0px;">
                        <h3>Flat Parking Details</h3>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                           <thead>
                                <tr>
                                    <th>#</th>
                                    <th><center>Vehicle Type</center></th>
                                    <th><center>Vehicle Model</center></th>
                                    <th><center>Vehicle Number</center></th>
                                    <th><center>Action</center></th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php if(empty($vehicleDetails)){ ?>
                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
                                <?php }else{ $i = 1; foreach($vehicleDetails as $key) {?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><center><?php echo $key['vehicle_type']. ' Wheeler' ?></center></td>
                                    <td><center><?php echo $key['vehicle_model'] ?></center></td>
                                    <td><center><?php echo $key['vehicle_no'] ?></center></td>
                                    <td>
                                        <center>
                                            <span data-toggle="modal" data-id="<?php echo $key['vehicle_id'] ?>" data-target="#addParking"><i class="fa fa-edit  fa-lg fa-lg text-navy" title="Edit Details"></i></span>&nbsp &nbsp
                                            <span data-toggle="modal" data-id="<?php echo $key['vehicle_id'] ?>" data-target="#deleteParkingRe"><i class="fa fa-trash fa-lg fa-lg text-navy" title="Delete Details"></i></span>
                                        </center>
                                    </td>
                                </tr>
                            <?php } }?>
                            </tbody>
                        </table>
                    </div>                    
                </div>
                <div id="addParking" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <form class="form-horizontal" role="form" id="" method="POST" action="<?php echo site_url('updateOwnerParking') ?>">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="addParkingDetails">Add Flat Parking</h4>
                                    <h4 class="modal-title hidden" id="updateParkingDetails">Update Flat Parking</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <div class="col-lg-6 hidden">
                                            <label class="control-label">Vehicle ID<span class="mandaory"> *</span></label>
                                            <input type="text" placeholder="Please Enter Model" name='vehicle_id' class="form-control">
                                        </div> 
                                        <div class="col-lg-6">
                                            <label class="control-label">Vehicle Type<span class="mandaory"> *</span></label>
                                            <select name='vehicle_type' class="form-control" required="">
                                                <option value="">Please Select</option>
                                                <option value="2">2 Wheeler</option>
                                                <option value="3">3 Wheeler</option>
                                                <option value="4">4 Wheeler</option>
                                            </select>
                                        </div> 
                                       <div class="col-lg-6">
                                            <label class="control-label">Vehicle model<span class="mandaory"> *</span></label>
                                            <input type="text" placeholder="Please Enter Model" name='vehicle_model' class="form-control" required="">
                                        </div>
                                    </div>  
                                    <div class="form-group">                               
                                        <div class="col-sm-6">
                                            <label class="control-label">Vehicle Number<span class="mandaory">*</span></label>
                                            <input type="text" name="vehicle_no" placeholder="Please Enter Number" class="form-control" required="">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="control-label">Vehicle Sticker<span class="mandaory"> *</span></label>
                                            <select name='vehicle_sticker' class="form-control sticker" required="">
                                                <option value="">Please Select</option>
                                                <option value="1">Yes</option>
                                                <option value="2">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" id="addParkingDetails1">Add Vehicle Parking</button>
                                    <button type="submit" class="btn btn-success hidden" id="updateParkingDetails1">Update Vehicle Parking</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="deleteParkingRe" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('deleteParking') ?>">
                        <div class="modal-content">
                            <div class="modal-body">
                                <h4 class="modal-title">Are you sure you want to delete this ? </h4>
                                <div class="form-group hidden">
                                    <input type="text" class="form-control" name="vehicle_id">
                                    <input type="text" class="form-control" name="where" value="0">
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