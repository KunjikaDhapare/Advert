<?php $CI = &get_instance(); ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Publication Records</h3>
                    </div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('newPublication')?>"><span class="btn btn-success"><i class="fa fa-plus"></i> Add</span></a>
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
	                                <th>Registration No.</th>
	                                <th>Name</th>
                                    <th>Contact</th>
                                    <th>Email</th>
                                    <th>Incharge Name</th>
                                    <th>Periodicity</th>
                                    <th>Size</th>
                                    <th></th>
	                            </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php 
                               // print_r($publication_details);
                                if(empty($publication_details)){ ?>
                                    <td colspan="9"><h3 class="no-records">No Records Found.</h3></td>
                            	<?php }else{ $i = 1; foreach ($publication_details as $key) {?>
                                    <tr>
		                                <td><?php echo $i++; ?></td>
		                                <td><?php echo $key['pub_name']?></td>
		                                <td><?php if($key['pub_isDelete'] == 0){ echo "Activated";}else{ echo "Not Activated";}?></td>
                                        <td><?php echo $key['pub_contact']?></td>
                                        <td><?php echo $key['pub_email']?></td>
                                        <td><?php 
                                            foreach ($contact as $k)
                                            {
                                                if($k['cont_for_id'] == $key['pub_id'])
                                                echo $k['cont_name'];
                                            }
                                            ?>
                                        </td>
                                        <td><?php
                                         // print_r($contact);
                                            foreach ($periodicity as $k)
                                            {
                                                if($k['per_id'] == $key['pub_periodicity_id'])
                                                    echo $k['per_name'];
                                            }
                                          
                                           ?></td>
                                            
                                        <td><?php 
                                          //  print_r($pub_size_type);
                                            foreach ($pub_size_type as $k)
                                            {
                                                if($key['pub_size_type']== $k['size_type_id'])
                                                    echo $k['size_type_name'];
                                            }
                                        ?></td>
                                        <td>
                                            <a href="<?php echo site_url('editPub/'.$key['pub_id']) ?>"><span class="btn btn-primary btn-sm"><i class="fa fa-pencil" title="Edit Publication"></i></span></a>
                                        </td>  
                                       <td>
                                             <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-id="<?php echo $key['pub_id'] ?>" data-target="#disablePub"><i class="fa fa-trash" title="Disable Publication"></i>  </button>
                                        </td>  
                                      
		                            </tr>
		                        <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                                        
                    <div id="disablePub" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('Publication/disable_pub') ?>" style="position: relative;z-index: 10000;">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4 class="modal-title">Are you sure you want to delete this publication?</h4>
                                    <div class="form-group hidden">
                                        <input type="text" class="form-control" name="pub_id">
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