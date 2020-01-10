<?php $CI = &get_instance(); ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Company Records</h3>
                    </div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('newCompany')?>"><span class="btn btn-success"><i class="fa fa-plus"></i> Add</span></a>
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
	                                <th>Company Name</th>
	                                <th>Contact</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th></th>
	                            </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php if(empty($company_rec)){ ?>
                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
                            	<?php }else{ $i = 1; foreach ($company_rec as $key) {?>
                                    <tr>
		                                <td><?php echo $i++; ?></td>
		                                <td><?php echo $key['com_name']?></td>
		                                <td><?php echo $key['com_contact']?></td>
                                        <td><?php echo $key['com_email']?></td>
                                        <td><?php echo $key['com_email']?></td>
                                        <td>  <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-id="<?php echo $key['com_id'] ?>" data-target="#disableComp"><i class="fa fa-trash" title="Disable rate"></i>  </button></td>
		                            </tr>
		                        <?php } }?>
                            </tbody>
                        </table>
                    </div>
                    <div id="disableComp" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('disableCompany') ?>" style="position: relative;z-index: 10000;">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4 class="modal-title">Are you sure you want to delete this company?</h4>
                                    <div class="form-group hidden">
                                        <input type="text" class="form-control" name="com_id">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Yes</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>