<?php $CI = &get_instance(); 
//print_r($details);
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Verification of Printed Adverties</h3>
                    </div>
                </div>
                <div class="ibox-content">
                <form class="form-horizontal" role="form" id="printAdv" method="POST" action="<?php echo site_url('Adverties/finalprintAdvt') ?>" style="padding-left: 6%;">
                    <div class="row">
                        <!-- <div class="col-sm-1"></div> -->
                        <div class="col-sm-3 m-b-xs">
                            <div class="input-group">
                                <label class="control-label">Publication<span class="mandaory">*</span></label>
                                <select class="form-control" name="adv_pub_id" required="">
                                    <option value="">Please Select Publication</option>
                                    <?php foreach ($all_pub as $key) {
                                        if($details['adv_pub_id']== $key['pub_id'])
                                        {
                                            ?>
                                            <option selected value="<?php echo $key['pub_id'] ?>"><?php echo $key['pub_name'] ?> </option>
                                            <?php
                                        }
                                        else{
                                        ?>
                                            <option value="<?php echo $key['pub_id'] ?>"><?php echo $key['pub_name'] ?> </option>
                                        <?php }
                                    }  ?>   
                                </select>      
                            </div>                            
                        </div>
                        <div class="col-sm-2 m-b-xs">
                            <label class="control-label">Periodicity <span class="mandaory">*</span></label>
                                <select name='adv_periodicity' class="form-control" readonly>
                                    <!-- <option value="">Please select ..</option> -->
                                     <?php foreach ($periodicity as $key) {
                                        if($key['per_id']== $details['periodicity'])
                                        {
                                        ?>
                                        <option selected value="<?php echo $key['per_id'] ?>"><?php echo $key['per_name'] ?></option>
                                    <?php }
                                        else{?>
                                        <option value="<?php echo $key['per_id'] ?>"><?php echo $key['per_name'] ?></option>
                                    <?php
                                     } }?>                           
                                </select>
                        </div>
                        <div class="col-sm-2 m-b-xs">
                            <label class="control-label">Start Date <span class="mandaory">*</span></label>
                               <div class="input-group date">
                                    <input type="text" name="date_from" class="form-control" placeholder="End date"  value="<?php if(!empty($details))
                                    { echo $details['date_from'];} ?>" readonly required>
                                    <!-- <span class="input-group-addon"><i class="fa fa-calendar"></i></span> -->
                                </div>
                        </div>
                        <div class="col-sm-2 m-b-xs">
                            <label class="control-label">End Date <span class="mandaory">*</span></label>
                                <div class="input-group date">
                                    <input type="text" name="date_to" class="form-control" placeholder="End date" value="<?php if(!empty($details)){ 
                                        echo $details['date_to']; } ?>" readonly required="">
                                    <!-- <span class="input-group-addon"><i class="fa fa-calendar"></i></span> -->
                                </div>
                        </div>
                        <div class="col-sm-3 m-b-xs">
                            <div class="ibox-tools" style="text-align: left;padding-top: 10.5%;">
                                <button name="search" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
                                <?php if(!empty($all_schedule)){ ?>
                                <span name="search" class="btn btn-success" id="exportExcel"><i class="fa fa-file-excel-o"></i> Export</span>
                            	<?php } ?>
                            </div>
                        </div>                        
                    </div> 
                    </form>                  
                    <div class="hr-line-dashed"></div>
                    <div class="table-responsive">
                        <table class="table table-striped" id="myTable">
                            <thead>
	                            <tr>
	                                <th>#</th>
                                    <th>Date</th>
                                    <th>Advt. Caption</th>
	                                <th>Publication</th>
                                    <th>Size</th>
                                    <th>In-charge</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php if(empty($all_schedule)){ ?>
                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
                            	<?php }else{ $i = 1; foreach (array_reverse($all_schedule) as $key) {
                                    $adv=$CI->Home_model->fetch_details('adv_id='.$key['sch_adv_id'].' and adv_approved_status = 1','ad_adverties');
                                    // print_r($adv);
                                    if(!empty($adv)){
                                        $pub = $CI->Home_model->fetch_details('pub_id = '. $adv[0]['adv_pub_id'].'','ad_publication');
                                        $size = $CI->Home_model->fetch_details('size_id = '.$adv[0]['adv_size_id'].'','ad_size');
                                        $incharge = $CI->Home_model->fetch_details(' cont_id = '.$adv[0]['adv_incharge_con_id'].'','ad_contact');
                                        if(!empty($details)){
                                        if($pub[0]['pub_id']== $details['adv_pub_id']){
                                    ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo date('d M Y',strtotime($key['sch_date']));?> </td>
                                        <td><?php echo $adv[0]['adv_for']; ?></td>
		                                <td><?php echo $pub[0]['pub_name']?></td>
		                                <td><?php echo $size[0]['size_name']?></td>
                                        <td><?php echo $incharge[0]['cont_name']?></td>
                                        <?php  ?>
                                        <td>
                                            <span class="btn btn-success btn-sm" data-toggle="modal" data-target="#isPrintAdvertise" data-id="<?php echo $key['sch_id'] ?>">Is Printed <i class="fa fa-check"></i></span>
                                        </td>
		                            </tr>
		                        <?php } } } } }?>
                            </tbody>
                        </table>
                    </div>
                    <div id="isPrintAdvertise" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('Adverties/isAdvertisePrinted') ?>" style="position: relative;z-index: 10000;">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4 class="modal-title">Are you sure this Advertise printed ?</h4>
                                    <div class="form-group hidden">
                                        <input type="text" class="form-control" name="sch_id">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Yes Printed</button>
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