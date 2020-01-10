<?php $ci = &get_instance();  ?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Update Flat Records</h3>
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
			                                <th class="">Floor</th>
			                                <th class="hidden">Category</th>
			                                <th>Flat Number</th>
			                                <th>Flat Area</th>
			                                <th>Flat Type</th>
			                                <th>Flat Status</th>
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
				                                <td class="">
				                                	<select class="form-control" name="flat_floor[<?php echo $i ?>]" >
				                                		<option value="">Please Select</option>
				                                		<?php foreach ($floor_details as $key1 => $value) { ?>
				                                			<?php if($value = $key['flat_floor']){ ?>
				                                				<option value="<?php echo $value ?>" selected><?php echo $value.' Floor'; ?></option>
				                                			<?php }else{ ?>
				                                				<option value="<?php echo $value ?>"><?php echo $value.' Floor'; ?></option>
				                                			<?php } ?>
				                                		<?php } ?>
				                                	</select>
				                                </td>
				                                <td class="hidden"><input type="text" class="form-control" name="flat_category[<?php echo $i ?>]" placeholder="" value="1"></td>
				                                <td><input type="text" class="form-control" name="flat_number[<?php echo $i ?>]" placeholder="Enter Flat Number" value="<?php echo $key['flat_number'] ?>"></td>
				                                <td><input type="text" class="form-control" name="flat_area[<?php echo $i ?>]" placeholder="Enter Flat Area In Sq.ft" value="<?php echo $key['flat_area'] ?>"></td>
				                                <td>
				                                	<select class="form-control" name="flat_type[<?php echo $i ?>]">
				                                		<option value="">Please select type</option>
				                                		<?php if ($key['flat_type'] == '1 RK') {?>
					                                		<option value="1 RK" selected>1 RK</option>
				                                		<?php } else { ?>
					                                		<option value="1 RK">1 RK</option>
				                                		<?php }if ($key['flat_type'] == '1 BHK') { ?>
					                                		<option value="1 BHK" selected="">1 BHK</option>
					                                	<?php } else { ?>
					                                		<option value="1 BHK">1 BHK</option>
					                                	<?php }if ($key['flat_type'] == '2 BHK') { ?>
					                                		<option value="2 BHK" selected>2 BHK</option>
					                                	<?php } else { ?>
					                                		<option value="2 BHK">2 BHK</option>
					                                	<?php }if ($key['flat_type'] == '3 BHK') { ?>
					                                		<option value="3 BHK" selected>3 BHK</option>
					                                	<?php } else { ?>
					                                		<option value="3 BHK">3 BHK</option>
					                                	<?php } ?>
				                                	</select>
				                                </td>
				                                <td>
				                                	<select class="form-control" name="flat_status[<?php echo $i ?>]">
				                                		<option value="">Please select status</option>
				                                		<?php if ($key['flat_status'] == 'Self Occupied') {?>
				                                			<option value="Self Occupied" selected="">Self Occupied</option>
				                                		<?php } else { ?>
				                                			<option value="Self Occupied">Self Occupied</option>
				                                		<?php }if ($key['flat_status'] == 'On Rent') { ?>
				                                			<option value="On Rent" selected="">On Rent</option>
				                                		<?php } else { ?>
				                                			<option value="On Rent">On Rent</option>
				                                		<?php }if ($key['flat_status'] == 'Vacant') { ?>
				                                			<option value="Vacant" selected="">Vacant</option>
				                                		<?php } else { ?>
				                                			<option value="Vacant">Vacant</option>
				                                		<?php }if ($key['flat_status'] == 'With Builder') { ?>
				                                			<option value="With Builder" selected="">With Builder</option>
				                                		<?php } else { ?>
				                                			<option value="With Builder">With Builder</option>
				                                		<?php } ?>
				                                	</select>
				                                </td>
				                            </tr>
		                            	<?php $i++;} }else{  for($i=0; $i < $wing_details[0]['wing_total_flat']; $i++) { ?>
		                                    <tr>
				                                <td><?php echo $i+1; ?></td>
				                                <td class="hidden"><input type="text" class="form-control" name="flat_id[<?php echo $i ?>]" placeholder="" value="0"></td>
				                                <td class="hidden"><input type="text" class="form-control" name="flat_wing_id[<?php echo $i ?>]" placeholder="" value="<?php echo $wing_details[0]['wing_id'] ?>"></td>
				                                <td class="hidden"><input type="text" class="form-control" name="flat_soc_id[<?php echo $i ?>]" placeholder="" value="<?php echo $wing_details[0]['wing_soc_id'] ?>"></td>
				                                <td class="">
				                                	<select class="form-control" name="flat_floor[<?php echo $i ?>]" >
				                                		<option value="">Please Select</option>
				                                		<?php foreach ($floor_details as $key => $value) { ?>
				                                			<option value="<?php echo $value ?>"><?php echo $value.' Floor'; ?></option>
				                                		<?php } ?>
				                                	</select> 
				                                </td>
				                                <td class="hidden"><input type="text" class="form-control" name="flat_category[<?php echo $i ?>]" placeholder="" value="1"></td>
				                                <td><input type="text" class="form-control" name="flat_number[<?php echo $i ?>]" placeholder="Enter Flat Number"></td>
				                                <td><input type="text" class="form-control" name="flat_area[<?php echo $i ?>]" placeholder="Enter Flat Area In Sq.ft" value="0"></td>
				                                <td>
				                                	<select class="form-control" name="flat_type[<?php echo $i ?>]">
				                                		<option value="">Please select type</option>
				                                		<option value="1 RK">1 RK</option>
				                                		<option value="1 BHK">1 BHK</option>
				                                		<option value="2 BHK">2 BHK</option>
				                                		<option value="3 BHK">3 BHK</option>
				                                	</select>
				                                </td>
				                                <td>
				                                	<select class="form-control" name="flat_status[<?php echo $i ?>]">
				                                		<option value="">Please select status</option>
				                                		<option value="Self Occupied" selected="">Self Occupied</option>
						                                <option value="On Rent">On Rent</option>
						                                <option value="Vacant">Vacant</option>
						                                <option value="With Builder">With Builder</option>
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