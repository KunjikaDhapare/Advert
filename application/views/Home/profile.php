<style type="text/css">
    .form-group{
        padding-left: 3%;
        padding-right: 3%;      
    }
    .form-group > label{
        color: #ffffff;
    }
    #form,#image_circle{
        padding: 0 15% 2% 10%;
    }
    /*.col-sm-12{
        border: 1px solid;
        padding-left: 0px;
        padding-right: 0px;
    }*/
    .wizard > .content{
        background: #c1bbbd;
    }
    #form-p-1{
        display: contents;
    }
    .form-control{
        background-color: #fbfafa;
    }
</style>
<?php $ci = &get_instance();
    $mem = $ci->Home_model->fetch_details(array('wing_id'=>$flatDetails[0]['flat_wing_id']),'rs_wing');
?>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <div class="row" id="image_circle">
                                <center><span id="member_photo"><img src="<?php if(!empty($memberDetails[0]['member_photo_link'])){ echo $memberDetails[0]['member_photo_link'];}else{echo base_url().'assets/images/default_user.png';} ?>" class="image-responsive" style="width: 12%;border-radius: 63%;border: 1px solid black;"><figcaption style="color:red;">&nbsp Image selected upto 600kb.</figcaption></span>
                                <h2><b><?php echo $memberDetails[0]['member_name'] ?></b></h2>
                                <h3 style="color:#dd3f6c;">Owner Of - <?php echo $mem[0]['wing_name'].' (Flat No. '.$flatDetails[0]['flat_number'].' )'; ?></h3>
                                </center>
                            </div>
                            <div class="row">
                                <form method="post" class="form-horizontal wizard-big wizard clearfix" enctype="multipart/form-data" id="form" action="#">
                                    <h1>PERSONAL DETAILS</h1>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group hidden">
                                                    <label class="control-label">Name<span class="mandaory"> *</span></label>
                                                    <input type="text" placeholder="Please Enter Name" name='member_id' class="form-control" value="<?php echo $memberDetails[0]['member_id'] ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Name<span class="mandaory"> *</span></label>
                                                    <input type="text" placeholder="Please Enter Name" name='member_name' class="form-control" value="<?php echo $memberDetails[0]['member_name'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="control-label">Email<span class="mandaory"> *</span></label>
                                                    <input type="text" placeholder="Please Enter email" name='member_email' class="form-control" value="<?php echo $memberDetails[0]['member_email'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="control-label">Contact<span class="mandaory"> *</span></label>
                                                    <input type="text" placeholder="Please Enter contact" name='member_mobile' class="form-control" value="<?php echo $memberDetails[0]['member_mobile'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="control-label">profile Photo</label>
                                                    <input type="file" placeholder="Please Enter Name" name='member_profile' class="form-control"id="member_profile" style="background-color: #c1bbbd;border-color: #c1bbbd;">
                                                    <div id="uploaded_image"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="control-label">Area of Profession</label>
                                                    <input type="text" placeholder="Please Enter area" name='member_domain' class="form-control" value="<?php echo $memberDetails[0]['member_domain'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="control-label">Occupation</label>
                                                    <input type="text" placeholder="Please Enter Occupation" name='member_occupation' class="form-control" value="<?php echo $memberDetails[0]['member_occupation'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="control-label">Gender<span class="mandaory"> *</span></label>
                                                    <div class="radio">
                                                        <?php if($memberDetails[0]['member_gender']== 'male'){ ?>
                                                            <label> <input type="radio" checked="" value="male" name="member_gender"> Male </label>&nbsp &nbsp
                                                        <?php }else{ ?>
                                                            <label> <input type="radio" value="male" name="member_gender"> Male </label>&nbsp &nbsp
                                                        <?php  }if($memberDetails[0]['member_gender']== 'female'){ ?>
                                                            <label> <input type="radio" value="female" checked="" name="member_gender"> Female </label>
                                                        <?php }else{ ?>
                                                            <label> <input type="radio" value="female" name="member_gender"> Female </label>
                                                        <?php } ?>
                                                    </div>
                                                    <div id="checkboxGroup"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="control-label">Date of Birth<span class="mandaory"> *</span></label>
                                                    <input type="text" placeholder="Please Enter DOB" name='member_dob' class="form-control datepicker" value="<?php echo $memberDetails[0]['member_dob'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="control-label">Address<span class="mandaory"> *</span></label>
                                                    <textarea name='member_address' class="form-control"><?php echo $memberDetails[0]['member_address'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <h1>SPOUSE DETAILS</h1>
                                    <fieldset>
                                        <div class="row" style="padding: 2% 7% 0px 3%;">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="control-label">Name</label>
                                                    <input type="text" placeholder="Please Enter Spouse Name" name='family_mem_name' class="form-control" value="<?php if(!empty($spouseDetails)){foreach($spouseDetails as $key){ echo $key['family_mem_name'];}}else{ echo '';} ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="control-label">Email</label>
                                                    <input type="text" placeholder="Please Enter Spouse email" name='family_mem_email' class="form-control" value="<?php if(!empty($spouseDetails)){foreach($spouseDetails as $key){ echo $key['family_mem_email'];}}else{ echo '';} ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="control-label">Contact</label>
                                                    <input type="text" placeholder="Please Enter Spouse contact" name='family_mem_phone' class="form-control" value="<?php if(!empty($spouseDetails)){foreach($spouseDetails as $key){ echo $key['family_mem_phone'];}}else{ echo '';} ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="padding: 0px 7% 0px 3%;">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="control-label">Gender</label>
                                                    <div class="radio">
                                                        <?php if(!empty($spouseDetails)){foreach($spouseDetails as $key){ if($key['family_mem_gender'] == 'male'){ ?>
                                                            <label> <input type="radio" checked="" value="male" name="family_mem_gender"> Male </label>&nbsp &nbsp
                                                        <?php }else{?>
                                                            <label> <input type="radio" value="male" name="family_mem_gender"> Male </label>
                                                        <?php } } }else{ ?>
                                                            <label> <input type="radio" value="male" name="family_mem_gender"> Male </label>&nbsp &nbsp
                                                        <?php } ?>
                                                       <?php if(!empty($spouseDetails)){foreach($spouseDetails as $key){ if($key['family_mem_gender'] == 'female'){ ?>
                                                            <label> <input type="radio" value="female" checked="" name="family_mem_gender"> Female </label>
                                                        <?php }else{?>
                                                            <label> <input type="radio" value="female" name="family_mem_gender"> Female </label>
                                                        <?php } } }else{ ?>
                                                            <label> <input type="radio" value="female" name="family_mem_gender"> Female </label>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="control-label">Date of Birth</label>
                                                    <input type="text" placeholder="Please Enter Spouse DOB" name='family_mem_dob' class="form-control datepicker" value="<?php if(!empty($spouseDetails)){foreach($spouseDetails as $key){ echo $key['family_mem_dob'];}}else{ echo '';} ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="control-label">Address</label>
                                                    <textarea name='family_mem_address' class="form-control"><?php if(!empty($spouseDetails)){foreach($spouseDetails as $key){ echo $key['family_mem_address'];}}else{ echo '';} ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <h1>JOINT OWNER DETAILS</h1>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3>Co Owner Details</h3>
                                            </div>
                                        </div>
                                        <?php if(!empty($spouseDetails)){foreach($spouseDetails as $key){ if($key['family_mem_co_owner'] == 0){ ?>
                                        <div class="row">
                                            <div class="col-lg-12" style="padding: 2% 0px 0px 7%;">
                                                <div class="form-group">
                                                    <label class="control-label">If Co-owner is Spouse? Yes <input type="checkbox" name="spouse_cowner" style="margin-left: 12px;"> <i></i></label>
                                                </div>
                                            </div>
                                        </div>
                                        <?php }} }?>
                                        <div class="hr-line-dashed"></div>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Contact</th>
                                                        <th>Date of Birth</th>
                                                        <th>Address</th>
                                                        <th><center>Action</center></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i= 1;foreach($ownerDetails as $key){?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $key['owner_name'] ?></td>
                                                        <td><?php echo $key['owner_email'] ?></td>
                                                        <td><?php echo $key['owner_phone'] ?></td>
                                                        <td><?php echo $key['owner_DOB'] ?></td>
                                                        <td><?php echo $key['owner_address'] ?></td>
                                                        <td>
                                                            <center>
                                                                <span data-toggle="modal" data-id="<?php echo $key['id'] ?>" data-target="#ownerMember"><i class="fa fa-edit  fa-lg" title="Edit Details"></i></span>&nbsp 
                                                                <span data-toggle="modal" data-id="<?php echo $key['id'] ?>" data-target="#deleteOwner"><i class="fa fa-trash  fa-lg" title="Delete Details"></i></span>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <?php }?>
                                                </tbody>
                                            </table>
                                        </div>                                        
                                    </fieldset>                                    
                                    <h1>FAMILY MEMBER DETAILS</h1>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3>Family Member Details</h3>
                                            </div>
                                            <div class="col-sm-6">
                                                <span class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-id="" data-target="#familyMember" style="background-color: #dd3f6c;border-color: #dd3f6c;"><i class="fa fa-plus  fa-lg" title="Activate"></i> Add New</span><br>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Relation</th>
                                                        <th>Occupation</th>
                                                        <th>Date of Birth</th>
                                                        <th><center>Action</center></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i= 1;foreach($familyMember as $key){?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $key['family_mem_name'] ?></td>
                                                        <td><?php echo $key['family_mem_relative'] ?></td>
                                                        <td><?php echo $key['family_mem_occupation'] ?></td>
                                                        <td><?php echo $key['family_mem_dob'] ?></td>
                                                        <td>
                                                            <center>
                                                                <span data-toggle="modal" data-id="<?php echo $key['family_id'] ?>" data-target="#familyMember"><i class="fa fa-edit  fa-lg" title="Edit Details"></i></span>&nbsp 
                                                                <span data-toggle="modal" data-id="<?php echo $key['family_id'] ?>" data-target="#deleteFamilyMember"><i class="fa fa-trash  fa-lg" title="Delete Details"></i></span>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                    <?php }?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </fieldset>
                                    <h1>VEHICLE DETAILS</h1>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3>Vehicle Parking Details</h3>
                                            </div>
                                            <div class="col-sm-6">
                                                <span class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-id="" data-target="#addParking" style="background-color: #dd3f6c;border-color: #dd3f6c;"><i class="fa fa-plus  fa-lg" title="Add Parking"></i> Add New</span><br>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
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
                                                    <?php $i=1;foreach ($vehicleDetails as $key) {?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><center><?php echo $key['vehicle_type']. ' Wheeler' ?></center></td>
                                                        <td><center><?php echo $key['vehicle_model'] ?></center></td>
                                                        <td><center><?php echo $key['vehicle_no'] ?></center></td>
                                                        <td>
                                                            <center>
                                                                <span data-toggle="modal" data-id="<?php echo $key['vehicle_id'] ?>" data-target="#addParking"><i class="fa fa-edit  fa-lg" title="Edit Details"></i></span>&nbsp &nbsp
                                                                <span data-toggle="modal" data-id="<?php echo $key['vehicle_id'] ?>" data-target="#deleteParkingRe"><i class="fa fa-trash fa-lg" title="Delete Details"></i></span>
                                                            </center>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </fieldset>
                                    <h1>FLAT DETAILS</h1>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3>Member Flat Details</h3>
                                            </div>
                                        </div>
                                        <div class="hr-line-dashed"></div>
                                         <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Flat Number</th>
                                                        <th>Flat Wing</th>
                                                        <th>Flat Type</th>
                                                        <th>Flat Area</th>
                                                        <th><center>Action</center></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=1;foreach ($flatDetails as $key) {?>
                                                    <tr>
                                                        <td><?php echo $i++; ?></td>
                                                        <td><?php echo $key['flat_number'] ?></td>
                                                        <td><?php echo $mem[0]['wing_name']; ?></td>
                                                        <td><?php echo $key['flat_type'] ?></td>
                                                        <td><?php echo $key['flat_area'].' Sqft' ?></td>
                                                        <td>
                                                            <center>
                                                                <span data-toggle="modal" data-id="<?php echo $key['flat_id'] ?>" data-target="#updateFlatDetails"><i class="fa fa-edit  fa-lg" title="Edit Details"></i></span>&nbsp 
                                                            </center>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="ownerMember" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form class="form-horizontal" role="form" id="ownerDetails" method="POST" action="<?php echo site_url('updateOwnerMember') ?>">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Owner Member</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                               <div class="col-lg-6 hidden">
                                    <div class="form-group">
                                        <label class="control-label">ID<span class="mandaory"> *</span></label>
                                        <input type="text" placeholder="Please Enter Co-owner Name" name='owner_id' class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="control-label">Name<span class="mandaory"> *</span></label>
                                    <input type="text" placeholder="Please Enter Co-owner Name" name='owner_name' class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <label class="control-label">Email<span class="mandaory"> *</span></label>
                                    <input type="text" placeholder="Please Enter Co-owner email" name='owner_email' class="form-control">
                                </div>                                
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label class="control-label">Contact<span class="mandaory"> *</span></label>
                                    <input type="text" placeholder="Please Enter Co-owner contact" name='owner_phone' class="form-control">
                                </div>
                                <div class="col-lg-6">
                                    <label class="control-label">Gender<span class="mandaory"> *</span></label>
                                    <div class="radio">
                                        <label> <input type="radio" checked="" value="male" name="owner_gender"> Male </label>&nbsp &nbsp
                                        <label> <input type="radio" value="female" name="owner_gender"> Female </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">                                          
                                <div class="col-sm-6">
                                    <label class="control-label">Date of Birth<span class="mandaory"> *</span></label>
                                    <input type="text" placeholder="Please Enter Co-owner DOB" name='owner_DOB' class="form-control" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">Address<span class="mandaory"> *</span></label>
                                    <textarea name='owner_address' class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Update Owner</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="familyMember" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form class="form-horizontal" role="form" id="familyMemberDetails" method="POST" action="<?php echo site_url('updateFamilyMember') ?>" style="position: relative;z-index: 10000;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="addfamilyMemberDetails">Add Family Member</h4>
                            <h4 class="modal-title hidden" id="updatefamilyMemberDetails">Update Family Member</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="col-lg-6 hidden">
                                    <label class="control-label">Name<span class="mandaory"> *</span></label>
                                    <input type="text" placeholder="Please Enter Member Name" name='family_id' class="form-control">
                                </div> 
                                <div class="col-lg-6">
                                    <label class="control-label">Name<span class="mandaory"> *</span></label>
                                    <input type="text" placeholder="Please Enter Member Name" name='family_mem_name' class="form-control" required="">
                                </div> 
                                <div class="col-lg-6">
                                    <label class="control-label">Relation With Owner<span class="mandaory"> *</span></label>
                                    <input type="text" placeholder="Please Enter Member relation" name='family_mem_relative' class="form-control" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label class="control-label">Email <span class="mandaory"> *</span></label>
                                    <input type="email" placeholder="Please Enter Member Email" name='family_mem_email' class="form-control">
                                </div> 
                                <div class="col-lg-6">
                                    <label class="control-label">Contact Number</label>
                                    <input type="text" placeholder="Please Enter Member contact" name='family_mem_phone' class="form-control">
                                </div>
                            </div>
                            <div class="form-group">                                          
                                <div class="col-sm-6">
                                    <label class="control-label">Occupation<span class="mandaory">*</span></label>
                                    <input type="text" name="family_mem_occupation" placeholder="Please Enter Member Occupation" class="form-control" value="" required="">
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">Date of Birth<span class="mandaory">*</span></label>
                                    <input type="text" name="family_mem_dob" class="form-control datepicker" value="" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" id="addfamilyMemberDetails1">Add Member</button>
                            <button type="submit" class="btn btn-success hidden" id="updatefamilyMemberDetails1">Update Member</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>        
        <div id="deleteFamilyMember" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('deleteFamilyMember') ?>">
                <div class="modal-content">
                    <div class="modal-body">
                        <h4 class="modal-title">Are you sure you want to delete this Member? </h4>
                        <div class="form-group hidden">
                            <input type="text" class="form-control" name="family_id">
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
        <div id="deleteOwner" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('deleteOwner') ?>">
                <div class="modal-content">
                    <div class="modal-body">
                        <h4 class="modal-title">Are you sure you want to delete this Owner ? </h4>
                        <div class="form-group hidden">
                            <input type="text" class="form-control" name="owner_id">
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
        <div id="addParking" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <form class="form-horizontal" role="form" id="" method="POST" action="<?php echo site_url('updateFlatParking') ?>">
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
        <div id="updateFlatDetails" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <form class="form-horizontal" role="form" id="flatDetailsRecords" method="POST" action="<?php echo site_url('updateFlatDetails') ?>">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Flat Details</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="col-lg-6 hidden">
                                    <label class="control-label">Flat ID<span class="mandaory"> *</span></label>
                                    <input type="text" placeholder="Please Enter Model" name='flat_id' class="form-control">
                                </div> 
                                <div class="col-lg-6">
                                    <label class="control-label">Flat Number<span class="mandaory"> *</span></label>
                                    <input type="text" placeholder="Please Enter Number" name='flat_number' class="form-control" required="">
                                </div>
                                <div class="col-lg-6">
                                    <label class="control-label">Flat Type<span class="mandaory"> *</span></label>
                                    <select name='flat_type' class="form-control" required="">
                                        <option value="">Please Select</option>
                                        <option value="1 RK">1 RK</option>
                                        <option value="1 BHK">1 BHK</option>
                                        <option value="2 BHK">2 BHK</option>
                                        <option value="3 BHK">3 BHK</option>
                                    </select>
                                </div> 
                            </div>  
                            <div class="form-group">                               
                                <div class="col-sm-6">
                                    <label class="control-label">Flat Area<span class="mandaory">*</span></label>
                                    <input type="text" name="flat_area" placeholder="Please Enter area" class="form-control" required="">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Update Flat</button>
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
                            <input type="text" class="form-control" name="where" value="1">
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
        <?php 
            $ci = &get_instance();
            $society = $ci->Home_model->fetch_details(array('soc_id'=>$user['soc_id']),'rs_society');
        ?>
        <div class="footer">
            <div class="col-sm-12"  style="border:none;">
                <div class="col-sm-3">
                    <h3><strong>Developed by</strong> <a href="https://nimble-esolutions.com/" target="_blank">Nimble e-solution</a></h3>
                </div>
                <div class="col-sm-6">
                     <center><h3 style="font-weight: 700;color: #ffffff;margin: 1%;"><i class="fa fa-building fa-fw"></i> <?php if(!empty($society)){echo $society[0]['soc_name'];} ?></h3></center>
                </div>
                <div class="col-sm-3">
                    <div class="pull-right">
                       <h3> &copy; Advert 2019-20</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mainly scripts -->

    <!-- Mainly scripts -->
     <script src="<?=base_url()?>assets/js/jquery-2.1.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?=base_url()?>assets/js/inspinia.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- Chosen -->
    <script src="<?=base_url()?>assets/js/plugins/chosen/chosen.jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script src="<?php echo base_url()?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Steps -->
    <script src="<?=base_url()?>assets/js/plugins/staps/jquery.steps.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/iCheck/icheck.min.js"></script>

    <!-- Jquery Validate -->
    <script src="<?=base_url()?>assets/js/plugins/validate/jquery.validate.min.js"></script>
    
    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
            $(".mail").hide();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {            
           <?php if(isset($flash['active']) && $flash['active'] == 1){ ?>
                swal({
                    title: "<?=$flash['title']?>",
                    text: "<?=$flash['text']?>",
                    type: "<?=$flash['type']?>",
                });
            <?php } ?> 

            <?php if($page == 'dashboard'){ ?>
                $('#dashboard').addClass('active');
                document.title = "Advert | Dashboard";
            <?php } ?>

            var settings = {
                labels: {
                    finish: "Submit",
                }
            };

            var wizard = $("#wizard").steps(settings);
            // var currentIndex = 2;
            $("#form").steps({
                bodyTag: "fieldset", 
                transitionEffect: "slideLeft",               
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    // return form.valid();
                    if(form.valid()){
                        var form = $(this);
                        switch(currentIndex) {
                            case 0:
                                $.post('<?php echo site_url('Home/update_personal_info')?>',{data:form.serialize()},function(data){
                                    console.log(data);
                                });                                
                                break;
                            case 1:
                                $.post('<?php echo site_url('Home/update_spouse_info')?>',{data:form.serialize()},function(data){
                                    console.log(data);
                                });
                                break;
                            case 2:
                                $.post('<?php echo site_url('Home/update_joint_owner_info')?>',{data:form.serialize()},function(data){
                                    console.log(data);
                                });
                                break;

                            default:
                        }
                        return form.valid();
                    };
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                    return form.valid();
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    // form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                errorPlacement: function (error, element)
                {
                    if (element.attr("name") == "member_gender") {
                       error.insertAfter("#checkboxGroup");
                    } else {
                        element.after(error);
                    }
                },
                rules: {
                    member_dob: {
                        required: true
                    },
                    member_name:{
                        required:true
                    },
                    member_email:{
                        required:true
                    },
                    member_mobile:{
                        required:true,
                        digits:true,
                        minlength:10,
                        maxlength:12
                    },
                    member_address:{
                        required:true
                    },
                    member_gender:{
                        required:true
                    },
                    family_mem_phone:{
                        digits:true,
                        minlength:10,
                        maxlength:12
                    },
                }
            });  
            // });

            $(document).on('change','#member_profile',function(){
                if($(this).val() != ''){
                    var property = document.getElementById('member_profile').files[0];
                    var image_name = property.name;
                    var image_extension = image_name.split('.').pop().toLowerCase();
                    if(jQuery.inArray(image_extension,['jpg','png','jpeg']) == -1){
                        alert('Invalid Image File');
                    }
                    var image_size = Math.round(property.size/1024);
                    if(image_size > 600)
                    {
                        alert("Please selected upto 600KB.");
                    }else{
                        var form_data = new FormData();
                        form_data.append('file',property);
                    $.ajax({
                        url:"<?php echo base_url(); ?>Home/ajax_upload",
                        method:"POST",
                        data:form_data,
                        contentType:false,
                        cache:false,
                        processData:false,
                        // beforeSend:function(){
                        //     $('#uploaded_image').html("<label class='text-success'>Image Uploading..</label>");
                        // },
                        success:function(data){
                            $('#member_photo').html(data);
                        }
                    })
                    }
                }
            });

            $.validator.setDefaults({
                submitHandler: function (form) {
                    form.submit();
                }
            }); 
            $( ".datepicker" ).datepicker({
                maxDate : '-1d',
                dateFormat : 'yy-m-d',
                changeYear:true,
                changeMonth:true,
                yearRange: "1940:+0",
            }); 

            $(document).on('click','input[name="spouse_cowner"]',function(){
                if($(this).prop("checked") == true){
                    $('.join_owner').hide();
                }else{
                    $('.join_owner').show();
                }
            });

            $('#ownerMember').on('show.bs.modal', function(e) {
                $('input[name="owner_id"]').val("");
                $('input[name="owner_name"]').val("");
                $('input[name="owner_email"]').val("");
                $('input[name="owner_phone"]').val("");
                $('input[name="owner_gender"]').val("");
                $('input[name="owner_DOB"]').val("");
                $('input[name="owner_address"]').val("");
                var owner_id = $(e.relatedTarget).data('id');
                if(owner_id != ''){
                    $(e.currentTarget).find('input[name="owner_id"]').val(owner_id);
                    $.post('<?php echo site_url('Home/fetch_owner_records')?>',{id:owner_id},function(data){
                        console.log(data);
                        $('input[name="owner_name"]').val(''+data[0].owner_name+'');
                        $('input[name="owner_email"]').val(''+data[0].owner_email+'');
                        $('input[name="owner_phone"]').val(''+data[0].owner_phone+'');
                        $('input[name="owner_gender"]:checked').val(''+data[0].owner_gender+'');
                        $('input[name="owner_DOB"]').val(''+data[0].owner_DOB+'');
                        $('textarea[name="owner_address"]').text(''+data[0].owner_address+'');
                    },'JSON');
                }
            }); 
            $('#familyMember').on('show.bs.modal', function(e) {
                $('input[name="family_id"]').val("");
                $('input[name="family_mem_name"]').val("");
                $('input[name="family_mem_relative"]').val("");
                $('input[name="family_mem_email"]').val("");
                $('input[name="family_mem_phone"]').val("");
                $('input[name="family_mem_occupation"]').val("");
                $('input[name="family_mem_dob"]').val("");
                var family_id = $(e.relatedTarget).data('id');
                $('#addfamilyMemberDetails,#updatefamilyMemberDetails,#addfamilyMemberDetails1,#updatefamilyMemberDetails1').removeClass();
                if(family_id != ''){
                    $(e.currentTarget).find('input[name="family_id"]').val(family_id);
                    $.post('<?php echo site_url('Home/fetch_member_records')?>',{id:family_id},function(data){
                        console.log(data);
                        $('input[name="family_mem_name"]').val(''+data[0].family_mem_name+'');
                        $('input[name="family_mem_relative"]').val(''+data[0].family_mem_relative+'');
                        $('input[name="family_mem_email"]').val(''+data[0].family_mem_email+'');
                        $('input[name="family_mem_phone"]').val(''+data[0].family_mem_phone+'');
                        $('input[name="family_mem_occupation"]').val(''+data[0].family_mem_occupation+'');
                        $('input[name="family_mem_dob"]').val(''+data[0].family_mem_dob+'');
                    },'JSON');                    
                    $('#addfamilyMemberDetails').addClass('modal-title hidden');
                    $('#updatefamilyMemberDetails').addClass('modal-title');
                    $('#addfamilyMemberDetails1').addClass('btn btn-success hidden');
                    $('#updatefamilyMemberDetails1').addClass('btn btn-success');
                }else{
                    $('#addfamilyMemberDetails').addClass('modal-title');
                    $('#updatefamilyMemberDetails').addClass('modal-title hidden');
                    $('#addfamilyMemberDetails1').addClass('btn btn-success');
                    $('#updatefamilyMemberDetails1').addClass('btn btn-success hidden');
                }
            });  
            $('#updateFlatDetails').on('show.bs.modal', function(e) {
                $('input[name="flat_id"]').val("");
                $('input[name="flat_number"]').val("");
                $('select[name="flat_type"]').val("");
                $('input[name="flat_area"]').val("");
                var flat_id = $(e.relatedTarget).data('id');
                if(flat_id != ''){
                    $(e.currentTarget).find('input[name="flat_id"]').val(flat_id);
                    $.post('<?php echo site_url('Home/fetch_flat_records')?>',{id:flat_id},function(data){
                        console.log(data);
                        $('input[name="flat_number"]').val(''+data[0].flat_number+'');
                        $('select[name="flat_type"]').val(''+data[0].flat_type+'');
                        $('input[name="flat_area"]').val(''+data[0].flat_area+'');
                    },'JSON');
                }
            }); 

            $('#addParking').on('show.bs.modal', function(e) {
                $('select[name="vehicle_id"]').val("");
                $('input[name="vehicle_type"]').val("");
                $('input[name="vehicle_model"]').val("");
                $('input[name="vehicle_no"]').val("");
                $('select[name="vehicle_sticker"]').val("");
                var vehicle_id = $(e.relatedTarget).data('id');
                $('#addParkingDetails,#updateParkingDetails,#addParkingDetails1,#updateParkingDetails1').removeClass();
                if(vehicle_id != ''){
                    $(e.currentTarget).find('input[name="vehicle_id"]').val(vehicle_id);
                    $.post('<?php echo site_url('Home/fetch_vehicle_records')?>',{id:vehicle_id},function(data){
                        console.log(data);
                        $('select[name="vehicle_type"]').val(''+data[0].vehicle_type+'');
                        $('input[name="vehicle_model"]').val(''+data[0].vehicle_model+'');
                        $('input[name="vehicle_no"]').val(''+data[0].vehicle_no+'');
                        $('select[name="vehicle_sticker"]').val(''+data[0].vehicle_sticker+'');
                    },'JSON');
                    $('#addParkingDetails').addClass('modal-title hidden');
                    $('#updateParkingDetails').addClass('modal-title');
                    $('#addParkingDetails1').addClass('btn btn-success hidden');
                    $('#updateParkingDetails1').addClass('btn btn-success');
                }else{
                    $('#addParkingDetails').addClass('modal-title');
                    $('#updateParkingDetails').addClass('modal-title hidden');
                    $('#addParkingDetails1').addClass('btn btn-success');
                    $('#updateParkingDetails1').addClass('btn btn-success hidden');
                }
            });
            $('#deleteFamilyMember').on('show.bs.modal', function(e) {
                var family_id = $(e.relatedTarget).data('id');
                $(e.currentTarget).find('input[name="family_id"]').val(family_id);
            });

            $('#deleteOwner').on('show.bs.modal', function(e) {
                var owner_id = $(e.relatedTarget).data('id');
                $(e.currentTarget).find('input[name="owner_id"]').val(owner_id);
            });            

            $('#deleteParkingRe').on('show.bs.modal', function(e) {
                var vehicle_id = $(e.relatedTarget).data('id');
                $(e.currentTarget).find('input[name="vehicle_id"]').val(vehicle_id);
            });

            $('#ownerDetails').validate({
                rules:{
                    owner_name:{
                        required:true
                    },
                    owner_email:{
                        required:true
                    },
                    owner_phone:{
                        required:true,
                        maxlength:12,
                        minlength:10,
                        digits:true
                    },
                    owner_gender:{
                        required:true
                    },
                    owner_DOB:{
                        required:true
                    },
                    owner_address:{
                        required:true
                    }
                },
                message:{

                }
            }); 

            $('#flatDetailsRecords').validate({
                rules:{
                    flat_number:{
                        required:true
                    },
                    flat_type:{
                        required:true
                    },
                    flat_area:{
                        required:true,
                        number:true
                    }
                },
                message:{

                }
            });

            $('#familyMemberDetails').validate({
                rules:{
                    family_mem_phone:{
                        digits:true,
                        maxlength:12,
                        minlength:10
                    }
                },
                message:{

                }
            });

        });
    </script>
</body>
</html>
