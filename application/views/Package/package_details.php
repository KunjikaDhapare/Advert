<?php $CI = &get_instance(); ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Package Records</h3>
                    </div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('newPackage')?>"><span class="btn btn-success"><i class="fa fa-plus"></i> Add</span></a>
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
	                                <th>Package Name</th>
	                                <th>Publication</th>
                                    <th>Paid Adverties</th>
                                    <th>Free Adverties</th>
                                    <th>Delete</th>
                                    
	                            </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php if(empty($package_details)){ ?>
                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
                            	<?php }else{ $i = 1; foreach ($package_details as $key) {
$pub = $CI->Home_model->fetch_details('pub_id = '.$key['pk_pub_id'].'','ad_publication');
                                    ?>
                                    <tr>
		                                <td><?php echo $i++; ?></td>
		                                <td><?php echo $key['pk_name']?></td>
		                              <!--   <td><?php //if($key['com_isDelete'] == 0){ echo "Activated";}else{ echo "Not Activated";}?></td> -->
                                      <td><?php echo $pub[0]['pub_name']?></td>
                                        <td><?php echo $key['pk_paid_adv']?></td>
                                        <td><?php echo $key['pk_free_adv']?></td>
                                         <td>
                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-id="<?php echo $key['pk_id'] ?>" data-target="#disablePackage"><i class="fa fa-trash" title="Disable package"></i>  </button>
                                        </td>  
		                            </tr>
		                        <?php } }?>
                            </tbody>
                        </table>
                    </div>
                    <div id="disablePackage" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('disablePackage') ?>" style="position: relative;z-index: 10000;">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4 class="modal-title">Are you sure you want to delete this package?</h4>
                                    <div class="form-group hidden">
                                        <input type="text" class="form-control" name="pk_id" >
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