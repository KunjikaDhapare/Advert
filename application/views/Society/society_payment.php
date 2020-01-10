<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Societies Payments Records</h3>
                    </div>
                    <div class="ibox-tools">
                        <a href="<?php echo site_url('approveSocietyDetails')?>"><span class="btn btn-success"><i class="fa fa-hand-o-left "></i> Back</span></a>
                    </div>
                </div>
                <div class="ibox-content">
                	<div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Payment Mode</th>
                                    <th>Payment Amount</th>
                                    <th>Received By</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php $i= 1;foreach ($payment_details as $key) { ?>
                            		<tr>
                            			<td><?php echo $i; ?></td>
                            			<td><?php if($key['payment_mode'] == 1){ echo "Beta Payment";}elseif ($key['payment_mode'] == 2) {echo "Cash Payment";}elseif ($key['payment_mode'] == 2) {echo "Cheque Payment";}elseif ($key['payment_mode'] == 2) {echo "Online Payment";} ?></td>
                            			<td><i class="fa fa-rupee"></i> <?php echo $key['payment_amount'].' /-' ?></td>
                            			<td><?php echo "Admin" ?></td>
                            		</tr>
                            	<?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>