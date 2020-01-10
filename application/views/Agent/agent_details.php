<?php $CI = &get_instance(); ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Agent/ Agency /Marketing Exe. Records</h3>
                    </div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('newAgent')?>"><span class="btn btn-success"><i class="fa fa-plus"></i> Add</span></a>
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
                                    <th>Type</th>
	                                <th>Name</th>
	                                <th>Status</th>
                                    <th>Email</th>
                                    <th>Mobile No</th>
                                    <th>Action</th>
	                            </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php if(empty($agents_details)){ ?>
                                    <td colspan="5"><h3 class="no-records">No Records Found.</h3></td>
                            	<?php }else{ $i = 1; foreach ($agents_details as $key) {?>
                                    <tr>
		                                <td><?php echo $i++; ?></td>
                                        <td><?php if($key['ag_type'] == 1) echo "Agency";
                                                   else if($key['ag_type'] == 2) echo "Agent";
                                                   else if($key['ag_type'] == 3) echo "Marketing Executive";
                                         ?></td>
		                                <td><?php echo $key['ag_name']?></td>
		                                <td><?php if($key['ag_isDelete'] == 0){ echo "Activated";}else{ echo "Not Activated";}?></td>
                                        <td><?php echo $key['ag_email']?></td>
                                        <td><?php echo $key['ag_contact']?></td>
                                         <td>
                                            <a href="<?php echo site_url('updateAgent/'.$key["ag_id"].'') ?>"><span class="btn btn-success btn-sm"><i class="fa fa-pencil fa-lg text-navy" title="Edit Agent" style="color: white;"></i></span></a>
                                            <span  class="btn btn-success btn-sm" data-toggle="modal" data-id="<?php echo $key['ag_id'] ?>" data-target="#deleteAgent"><i class="fa fa-trash  fa-lg text-navy" title="Delete Agent" style="color: white;"></i></span>&nbsp
                                        </td>

		                            </tr>
		                        <?php } }?>
                            </tbody>
                        </table>
                    </div>
                  
                    <div id="deleteAgent" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('disableAgent') ?>" style="position: relative;z-index: 10000;">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4 class="modal-title">Are you sure you want to delete this ?</h4>
                                    <div class="form-group hidden">
                                        <input type="text" class="form-control" name="ag_id">
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