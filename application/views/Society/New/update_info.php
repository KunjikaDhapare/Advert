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
	.nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus{
        color: #ffffff;
        font-weight: bold;
    }
</style>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Update Building / Shop Details</h3>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                       	<div class="panel blank-panel">
	                        <div class="panel-heading">
	                            <div class="panel-options">
	                                <ul class="nav nav-tabs">
	                                    <li class="active"><a data-toggle="tab" href="#tab-1">Building / Wing Details</a></li>
	                                    <li class=""><a data-toggle="tab" href="#tab-2">Shop Details</a></li>
	                                </ul>
	                            </div>
	                        </div>
	                        <div class="panel-body">
	                            <div class="tab-content">
	                                <div id="tab-1" class="tab-pane active">
	                                    <div class="table-responsive">
					                        <table class="table table-striped">
					                            <thead>
						                            <tr>
						                                <th><center>#</center></th>
						                                <th><center>Building / Wing Name</center></th>
						                                <th><center>Total  Floors Wing </center></th>
						                                <th><center>Total Flats In Wing</center></th>
						                                <th><center>Action</center></th>
						                            </tr>
					                            </thead>
					                            <tbody>
					                                <?php if(empty($wing_details)){ ?>
					                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
					                            	<?php }else{ $i = 1; foreach ($wing_details as $key) {?>
					                                    <tr>
					                                        <td><center><?php echo $i++; ?></center></td>
					                                        <td><center><?php echo $key['wing_name'] ?></center></td>
					                                        <td><center><?php echo $key['wing_floors'].' Floors' ?></center></td>
					                                        <td><center><?php echo $key['wing_total_flat'] ?></center></td>
					                                        <td>
					                                        	<center><a href="<?php echo site_url('updateFlat/').$key['wing_id'] ?>"><span><i class="fa fa-pencil" title="Update Flat Details"></i></span></a></center>
					                                        </td>
							                            </tr>
							                        <?php } }?>
					                            </tbody>
					                        </table>
					                    </div>
	                                </div>
	                                <div id="tab-2" class="tab-pane">
	                                   	<div class="table-responsive">
					                        <table class="table table-striped">
					                            <thead>
						                            <tr>
						                                <th>#</th>
						                                <th><center>Wing / Building Name</center></th>
						                                <th>Shop Name</th>
						                                <th style="text-align: right;">Shop Number </th>
						                                <th style="text-align: right;">Shop on Floor Number</th>
						                                <th><center>Action</center></th>
						                            </tr>
					                            </thead>
					                            <tbody>
					                                <?php if(empty($shop_details)){ ?>
					                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
					                            	<?php }else{ $i = 1; foreach ($shop_details as $key) {?>
					                                    <tr>
					                                        <td> <?php echo $i++ ?></td>
					                                        <td><center><?php echo $key['wing_name'] ?></center></td>
					                                        <td><?php echo $key['wing_shop_name'] ?></td>
					                                        <td style="text-align: right;"><?php echo $key['wing_shop_no'] ?></td>
					                                        <td style="text-align: right;"><?php echo $key['wing_floors'].' Floors' ?></td>
					                                        <td>
					                                        	<center><a href="<?php echo site_url('updateShop/').$key['wing_id'] ?>"><span><i class="fa fa-pencil" title="Update Shop Details"></i></span></a></center>
					                                        </td>
							                            </tr>
							                        <?php } }?>
					                            </tbody>
					                        </table>
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
</div>