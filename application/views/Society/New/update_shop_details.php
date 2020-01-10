<?php $ci = &get_instance();  ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Update Shop Records</h3>
                    </div>
                </div>
                <div class="ibox-content">
                    <!-- <div class="row"> -->
                    	<form class="form-horizontal" role="form" id="wingFlatRecords" method="POST" action="<?php echo site_url('updateFlatsRecords') ?>">
		                    <div class="table-responsive">
		                        <table class="table table-striped">
		                            <thead>
			                            <tr>
			                                <th>#</th>
			                                <th class="hidden">Flat ID</th>
			                                <th class="hidden">Wing ID</th>
			                                <th class="hidden">Society ID</th>
			                                <th class="hidden">Floor</th>
			                                <th class="hidden">Category</th>
			                                <th>Shop Number</th>
			                                <th>Shop Area</th>
			                                <th>Shop Type</th>
			                                <th>Shop Status</th>
			                            </tr>
		                            </thead>
		                            <tbody>
		                            	<?php if (!empty($flat_details)) {?>
		                            		<?php $i = 0;$j = 1; foreach ($flat_details as $key) { ?>
		                                    <tr>
				                                <td><?php echo $j++; ?></td>
				                                <td class="hidden"><input type="text" class="form-control" name="flat_id[<?php echo $i ?>]" placeholder="" value="<?php echo $key['flat_id'] ?>"></td>
				                                <td class="hidden"><input type="text" class="form-control" name="flat_wing_id[<?php echo $i ?>]" placeholder="" value="<?php echo $key['flat_wing_id'] ?>"></td>
				                                <td class="hidden"><input type="text" class="form-control" name="flat_soc_id[<?php echo $i ?>]" placeholder="" value="<?php echo $key['flat_soc_id'] ?>"></td>
				                                <td class="hidden"><input type="text" class="form-control" name="flat_floor[<?php echo $i ?>]" placeholder="" value="<?php echo $key['flat_floor'] ?>"></td>
				                                <td class="hidden"><input type="text" class="form-control" name="flat_category[<?php echo $i ?>]" placeholder="" value="2"></td>
				                                <td>
				                                	<input type="text" class="form-control" name="flat_number[<?php echo $i ?>]" 		placeholder="Enter Flat Number" value="<?php echo $key['flat_number'] ?>">
				                                </td>
				                                <td>
				                                	<input type="text" class="form-control" name="flat_area[<?php echo $i ?>]" placeholder="Enter Flat Area In Sq.ft" value="<?php echo $key['flat_area'] ?>">
				                                </td>
				                                <td>
				                                	<input type="text" class="form-control" name="flat_type[<?php echo $i ?>]" placeholder="Enter Flat Area In Sq.ft" value="<?php echo $key['flat_type'] ?>">
				                                </td>
				                                <td>
				                                	<select class="form-control" name="flat_status[<?php echo $i ?>]">
				                                		<option value="">Please Select Status</option>
				                                		<?php if ($key['flat_status'] == 'Owned') {?>
				                                			<option value="Owned" selected="">Owned</option>
				                                		<?php } else { ?>
				                                			<option value="Owned">Owned</option>
				                                		<?php }if ($key['flat_status'] == 'Rent') { ?>
				                                			<option value="Rent" selected="">Rent</option>
				                                		<?php } else { ?>
				                                			<option value="Rent">Rent</option>
				                                		<?php }if ($key['flat_status'] == 'Sell') { ?>
				                                			<option value="Sell" selected="">For Sell</option>
				                                		<?php } else { ?>
				                                			<option value="Sell">For Sell</option>
				                                		<?php }if ($key['flat_status'] == 'Builder') { ?>
				                                			<option value="Builder" selected="">Builder Owned</option>
				                                		<?php } else { ?>
				                                			<option value="Builder">Builder Owned</option>
				                                		<?php } ?>
				                                	</select>
				                                </td>
				                            </tr>
		                            	<?php $i++;} }else{  for($i=0; $i < 1; $i++) { ?>
		                                    <tr>
				                                <td><?php echo $i+1; ?></td>
				                                <td class="hidden"><input type="text" class="form-control" name="flat_id[<?php echo $i ?>]" placeholder="" value="0"></td>
				                                <td class="hidden"><input type="text" class="form-control" name="flat_wing_id[<?php echo $i ?>]" placeholder="" value="<?php echo $wing_details[0]['wing_id'] ?>"></td>
				                                <td class="hidden"><input type="text" class="form-control" name="flat_soc_id[<?php echo $i ?>]" placeholder="" value="<?php echo $wing_details[0]['wing_soc_id'] ?>"></td>
				                                <td class="hidden"><input type="text" class="form-control" name="flat_floor[<?php echo $i ?>]" placeholder="" value="<?php echo $wing_details[0]['wing_floors'] ?>"></td>
				                                 <td class="hidden"><input type="text" class="form-control" name="flat_category[<?php echo $i ?>]" placeholder="" value="2"></td>
				                                <td><input type="text" class="form-control" name="flat_number[<?php echo $i ?>]" placeholder="Enter Flat Number" value="<?php echo $wing_details[0]['wing_shop_no'] ?>"></td>
				                                <td>
				                                	<input type="text" class="form-control" name="flat_area[<?php echo $i ?>]" placeholder="Enter Flat Area In Sq.ft" ></td>
				                                <td>
				                                	<input type="text" class="form-control" name="flat_type[<?php echo $i ?>]" placeholder="Enter Flat Type" value="Commercial">
				                                </td>
				                                <td>
				                                	<select class="form-control" name="flat_status[<?php echo $i ?>]">
				                                		<option value="">Please Select Status</option>
				                                		<option value="Owned">Owned</option>
						                                <option value="Rent">Rent</option>
						                                <option value="Sell">For Sell</option>
						                                <option value="Builder">Builder Owned</option>
						                            </select>
				                            	</td>
				                            </tr>
				                        <?php } }?>
		                            </tbody>
		                        </table>
		                    </div>
		                    <div class="form-group">
                            	<div class="col-sm-10"><br>
                                	<button class="btn btn-md btn-primary" type="submit"><strong>Update</strong></button>
                                	<button class="btn btn-md btn-warning" type="reset"><strong>Reset</strong></button>
                                	<a href="<?php echo site_url('update') ?>"><span class="btn btn-md btn-success" type="reset"><strong>Back</strong></span></a>
                                </div>
                            </div>
		                </form>
	                </div>
                </div>
            </div>
        </div>
    </div>
</div>