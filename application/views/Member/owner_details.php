<style type="text/css">
	.tab-content>.active{
		border-bottom:1px solid #ddd;
		border-right:1px solid #ddd;
		border-left:1px solid #ddd;
		padding:2%;
	}
	.panel-body{
		padding: 0px 15px 15px 15px;
	}
	.tab-pane>.active{

	}
	.col-sm-12{
	    border: 1px solid;
	    padding-left: 0px;
	    padding-right: 0px;
	}
	.table-responsive{
		padding-left: 3%;
		padding-right: 3%;
	}
	.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus{
        color: #ffffff;
        font-weight: bold;
    }
</style>
<?php $CI = &get_instance();?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
    	<form class="form-horizontal" role="form" id="ownerRecords" method="POST" action="<?php echo site_url('ownerFlatDetails') ?>">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Owner Details</h3>
                    </div>
                    <?php if(!empty($wing_details)){ ?>
	                    <div class="ibox-tools">
	                        <button class="btn btn-sm btn-primary" type="submit"><strong>Update</strong></button>
					        <button class="btn btn-sm btn-warning" type="reset"><strong>Reset</strong></button>
	                        <a href="<?php echo site_url('ownerDetails')?>"><span class="btn btn-success"><i class="fa fa-hand-o-left "></i> Send Mail</span></a>
	                        <a href="<?php echo site_url('shopOwner')?>"><span class="btn btn-primary"><i class="fa fa-ship "></i> Shop Owner</span></a>
	                    </div>
                	<?php } ?>
                </div>
                <div class="ibox-content">
                    <div class="row">
                       	<div class="panel blank-panel">
	                        <div class="panel-heading">
	                            <div class="panel-options">
	                                <ul class="nav nav-tabs">
	                                    <li class="active"><a data-toggle="tab" href="#tab-1">Flat Owner Details</a></li>
	                                    <!-- <li class=""><a data-toggle="tab" href="#tab-2">Shop Owner Details</a></li> -->
	                                </ul>
	                            </div>
	                        </div>
	                        <div class="panel-body">
	                            <div class="tab-content">
		                            <div id="tab-1" class="tab-pane active">	                            		
		                                	<?php if(empty($wing_details)){ ?>
			                                    <td colspan=""><h3 class="no-records">No Records Found.</h3></td>
			                            	<?php }else{$j=0; $i = 1; foreach ($wing_details as $key) {?>
			                            		<fieldset>
					                        		<div class="col-sm-12">
					                        			<legend><?php echo "Building Name: ".$key['wing_name']."" ?></legend>
					                        			<div class="table-responsive">
									                        <table class="table table-striped">
									                            <thead>
										                            <tr>
										                                <th><center>#</center></th>
										                                <th class="hidden"><center>Member ID</center></th>
										                                <th class="hidden"><center>Society ID</center></th>
										                                <th class="hidden"><center>Wing ID</center></th>
										                                <th class="hidden"><center>Flat ID</center></th>
										                                <th><center>Floor Number</center></th>
										                                <th><center>Flat Number</center></th>
										                                <th><center>Owner Name</center></th>
										                                <th><center>Owner Email</center></th>
										                                <th><center>Owner Mobile</center></th>
										                            </tr>
									                            </thead>
									                            <tbody>
								                        			<?php $flat_details = $CI->Home_model->fetch_details(array('flat_wing_id' => $key['wing_id'],'flat_soc_id'=>$key['wing_soc_id'] ),'rs_flat');

								                        			if(empty($flat_details)){ ?>
									                                    <td colspan="9"><h3 class="no-records">No Records Found.</h3></td>
									                            	<?php }else{ $i = 1;foreach ($flat_details as $key) {?>
									                            		<?php $member_details = $CI->Home_model->fetch_details(array('member_flat_id' => $key['flat_id'],'member_soc_id'=>$key['flat_soc_id'],'	member_is_deactive'=>0),'rs_member'); ?>
								                        					<tr>
								                        						<td><center><?php echo $i++; ?></center></td>
								                        						<td class="hidden"><center>
								                        							<input type="text" class="form-control" name="member_id[<?php echo $j ?>]" placeholder="Enter Member ID" value="<?php if(!empty($member_details)){ foreach($member_details as $key1){ echo $key1['member_id'];} }else{echo '0';} ?>">
								                        						</center></td>
								                        						<td class="hidden"><center>
								                        							<input type="text" class="form-control" name="member_soc_id[<?php echo $j ?>]" placeholder="Enter Owner Name" value="<?php echo $key['flat_soc_id'] ?>">
								                        						</center></td>
								                        						<td class="hidden"><center>
								                        							<input type="text" class="form-control" name="member_wing_id[<?php echo $j ?>]" placeholder="Enter Owner Name" value="<?php echo $key['flat_wing_id'] ?>">
								                        						</center></td>
								                        						<td class="hidden"><center>
								                        							<input type="text" class="form-control" name="member_flat_id[<?php echo $j ?>]" placeholder="Enter Owner Name" value="<?php echo $key['flat_id'] ?>">
								                        						</center></td>
								                        						<td><center><?php echo $key['flat_floor'] ?></center></td>
								                        						<td><center>
								                        							<input type="text" class="form-control" name="flat_number[<?php echo $j ?>]" placeholder="Enter Owner Name" value="<?php echo $key['flat_number']; ?>"></center>
								                        						</td>
								                        						<td>
								                        							<input type="text" class="form-control" name="member_name[<?php echo $j ?>]" placeholder="Enter Owner Name" value="<?php if(empty($member_details)){ echo ''; }else{ foreach($member_details as $key){ echo $key['member_name'];} }?>">
								                        						</td>
								                        						<td>
								                        							<input type="text" class="form-control" name="member_email[<?php echo $j ?>]" placeholder="Enter Owner Email" value="<?php if(empty($member_details)){ echo ''; }else{ foreach($member_details as $key){ echo $key['member_email'];} }?>">
								                        						</td>
								                        						<td>
								                        							<input type="text" class="form-control" name="member_mobile[<?php echo $j ?>]" placeholder="Enter Owner Contact" value="<?php if(empty($member_details)){ echo ''; }else{ foreach($member_details as $key){ echo $key['member_mobile'];} }?>">
								                        						</td>
								                        						<?php $j++; ?>
								                        					</tr>
								                        			<?php } } ?>
								                        		</tbody>
								                        	</table>
								                        </div>
					                        		</div>
					                        	</fieldset>
			                            	<?php } }?>
			                            	<div class="form-group">
			                            		<?php if(!empty($wing_details)){ ?>
					                            	<div class="col-sm-10"><br>
					                                	<button class="btn btn-md btn-primary" type="submit"><strong>Update</strong></button>
					                                	<button class="btn btn-md btn-warning" type="reset"><strong>Reset</strong></button>
					                                	<a href="<?php echo site_url('') ?>"><span class="btn btn-md btn-success" type="reset"><strong>Cancel</strong></span></a>
					                                </div>
					                            <?php } ?>
				                            </div>
			                            </form>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>