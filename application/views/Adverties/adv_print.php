<?php $CI = &get_instance(); 
//print_r($details);
?>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Adverties for Print</h3>
                    </div>
                </div>
                <div class="ibox-content">
                <form class="form-horizontal" role="form" id="printAdv" method="POST" action="<?php echo site_url('Adverties/printAdvt') ?>">
                    <div class="row">
                        <div class="col-sm-1"></div>
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
                        <div class="col-sm-1 m-b-xs">
                            <label class="control-label"><span class="mandaory"> </span></label>
                            <div class="ibox-tools" style="padding-top: 14%;">
                                <button name="search" class="btn btn-success"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </div>
                        <div class="col-sm-1 m-b-xs">
                        </div>                        
                    </div>                    
                    <div class="hr-line-dashed"></div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
	                            <tr>
                                    <th></th>
	                                <th>#</th>
                                    <th>Date</th>
                                    <th>Advt. Caption</th>
	                                <th>Publication</th>
                                    <th>Size</th>
                                    <th>Incharge</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php if(empty($all_schedule)){ ?>
                                    <td colspan="8"><h3 class="no-records">No Records Found.</h3></td>
                            	<?php }else{ $i = 1; foreach (array_reverse($all_schedule) as $key) {
                                    $adv=$CI->Home_model->fetch_details('adv_id='.$key['sch_adv_id'].' and adv_approved_status = 1','ad_adverties');
                                    if(!empty($adv)){
                                        $pub = $CI->Home_model->fetch_details('pub_id = '. $adv[0]['adv_pub_id'].'','ad_publication');
                                        $size = $CI->Home_model->fetch_details('size_id = '.$adv[0]['adv_size_id'].'','ad_size');
                                        $incharge = $CI->Home_model->fetch_details(' cont_id = '.$adv[0]['adv_incharge_con_id'].'','ad_contact');
                                        if(!empty($details)){
                                        if($pub[0]['pub_id']== $details['adv_pub_id']){
                                    ?>
                                    <tr>
		                                <td><input type="checkbox" name="pub_sch_id[]" value="<?php echo $key['sch_id']; ?>"></td>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo date('d M Y',strtotime($key['sch_date']));?> </td>
                                        <td><?php echo $adv[0]['adv_for']; ?></td>
		                                <td><?php echo $pub[0]['pub_name']?></td>
		                                <td><?php echo $size[0]['size_name']?></td>
                                        <td><?php echo $incharge[0]['cont_name']?></td>
                                        <?php  ?>
                                        <!-- <td>
                                            <label for="warning" class="btn btn-warning">Print <input type="checkbox" name="isPrint" id="<?php echo $key['sch_id'] ?>" class="badgebox"><span class="badge">&check;</span>
                                        </td> -->
		                            </tr>
		                        <?php } } } } }?>
                            </tbody>
                        </table>
                    </div>
                    <?php if(!empty($all_schedule)){ ?>
                    <div class="hr-line-dashed"></div>
                     <div class="form-group">
                        <div class="col-sm-12">
                            <button name="search" class="btn btn-success"><i class="fa fa-lock"></i> Lock For Print</button>
                        </div>
                    </div>
                    <?php } ?>
                    </form>
                    <div id="newCommittee" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form class="form-horizontal" role="form" id="societyRecords" method="POST" action="<?php echo site_url('newCommittee') ?>">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add New Committee</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label class="control-label">Committee Name <span class="mandaory">*</span></label>
                                                <input type="text" name="comm_name" class="form-control" required placeholder="Please enter the committee Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Add Committee</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="CommiteeMember" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form class="form-horizontal" role="form" id="commRecords" method="POST" action="<?php echo site_url('commMember') ?>" style="position: relative;z-index: 10000;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Add Commitee Member</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group hidden">
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="comm_id" value="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <label class="control-label">Member Name <span class="mandaory">*</span></label>
                                                <select class="form-control" name="comm_member_id">
                                                    <option value="">Please Select</option>
                                                    <?php foreach ($member_details as $key) {?>
                                                        <option value="<?php echo $key['member_id'] ?>"><?php echo $key['member_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">                                          
                                            <div class="col-sm-6">
                                                <label class="control-label">Nomination / Elected Date<span class="mandaory">*</span></label>
                                                <input type="text" name="form_dates" class="form-control" value="" readonly>
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="control-label">Resignation / Handover Date<span class="mandaory">*</span></label>
                                                <input type="text" name="till_dates" class="form-control" value="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success">Add Member</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div id="delteCommittee" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <form class="form-horizontal" role="form" method="POST" action="<?php echo site_url('deleteCommittee') ?>" style="position: relative;z-index: 10000;">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4 class="modal-title">Are you sure you want to delete this ? After delete all member which assign to this committee Member also resigned.</h4>
                                    <div class="form-group hidden">
                                        <input type="text" class="form-control" name="comm_id">
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