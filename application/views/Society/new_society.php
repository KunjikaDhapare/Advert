<!-- 
    User Details
    Page Name : header.php
    Date : 21 oct 2018
    User : Sandip Daphal 
    Last updated Date :
-->
<!DOCTYPE html>
<html>

<head>
    <?php     
    $logo = base_url('assets')."/images/colonia_logo.png";
    $logo_name = base_url('assets')."/images/logo_name.png";
    ?>
    <link rel="shortcut icon" type="image/jpeg" href="<?php echo $logo ?>"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Colonia </title>

    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

    <!-- Morris -->
    <!-- <link href="<?php echo base_url()?>assets/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet"> -->
    <link href="<?php echo base_url()?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/plugins/chosen/chosen.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo base_url()?>assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <link href="<?php echo base_url()?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/wizards/css/roboto-font.css"> -->
     <link href="<?php echo base_url()?>assets/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
    <style type="text/css">
    body{
        background-color: #676565;
    }
    .nav > li > a{
        /*color: #ffffff;*/
    }
    .navbar-top-links{
        margin: 0px;
    }
    .canvasjs-chart-credit{
        display:none;
    }
    .footer{
        background: none repeat scroll 0 0 #000000;
        color: #ffffff;        
    }
    .footer .pull-right > h3, .footer div > h3{
        font-width :100 !important;
        font-size: 13px !important;
    }
    .navbar-default .nav > li > a:hover, .navbar-default .nav > li > a:focus{
        background-color: #dd3f6c !important;
    }
    .nav > li.active{
        border-left: 4px solid #ffffff;
        background: #dd3f6c;
    }
    .mini-navbar .nav .nav-second-level{
        background-color: #676565;
    }
    .mini-navbar .nav .nav-third-level{
        background-color: #676565;
    }
    .nav.nav-second-level.collapse[style]{
        background: rgb(47, 64, 80) !important;
    }
    .nav.nav-third-level{
        background: #676565 !important;
        margin-left: 50px;
        /*display: block;*/
    }
    .nav.nav-third-level li{
        background: 676565 !important;
        /*display: block !important;*/
    }
    .nav-second-level{
        width: max-content !important;
    }
    .mini-navbar .nav .nav-third-level{
            width: max-content;
        position: absolute;
        left: 72px;
        top: 0;
        background-color: #2f4050;
        padding: 10px 10px 10px 10px;
        font-size: 12px;
    }
    fieldset{
        padding: 1%;
        border:0px solid;
        font-weight: bold;
    }
    legend{
        background: #f3f3f4;
        font-size: 15px !important;
        padding: 1%;
    }
    .form-group .col-sm-4 > label{
        padding-left: 2% !important;
    }  
    .form-group .col-sm-12 > label{
        padding-left: 1% !important;
    } 
    .form-group .col-sm-6 >label{
        padding-left: 2% !important;
    }
    .form-control{
        border-radius: 8px !important;
        font-weight: 600 !important;
    }
    .input-group-btn:last-child>.btn, .input-group-btn:last-child>.btn-group{
        margin-left: -6px;
    }
    .control-label{
        font-style: italic;
        font-weight: 600;
        margin-bottom: 2% !important;
    }
    @media only screen and (max-width: 600px) {
      .navbar-header img {
        width: 39% !important;
      }
    }
    .loader {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('<?=base_url()?>assets/images/loader.gif') 50% 50% no-repeat rgb(249,249,249);
        opacity: .8;
    } 
    .no-records{
        color: red;
        text-align: center;
    }
    .mandaory{
        color:red;
    } 
    label.error{
        font-size:12px;
    } 
    .btn-success{
        background-color: #dd3f6c;
        border-color: #dd3f6c;
    }
</style>
</head>
<?php $ci = &get_instance(); ?>
<body class="mini-navbar">
    <div class="loader"></div>
    <div id="wrapper">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0;background-color: #c2c2c2;">
            <div class="navbar-header" style="">
                <img src="<?php echo $logo;?>" style="width:20%;padding-left: 2%;">
                <img src="<?php echo $logo_name;?>" style="width:25%;">
            </div>
            <ul class="nav navbar-top-links navbar-right"> 
            </ul>
        </nav>
       <!--  <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
            </div>
        </nav> -->
        <div id="page-wrapper" class="gray-bg">
           <!--  <a class="navbar-minimalize minimalize-styl-2" href="#">
                <div class="spin-icon" style="border-radius: 0px 20px 20px 0px;background: #dd3f6c;">
                    <i class="fa fa-cogs fa-spin" style="color: #c2c2c2;"></i>
                </div>
            </a>
            <div class="row border-bottom">
            </div> -->
<style type="text/css">
    .form-group{
        padding-left: 3%;
        padding-right: 3%;
    }
    .col-sm-12{
        border: 1px solid;
        padding-left: 0px;
        padding-right: 0px;
    }
</style>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <div class="col-sm-6" style="padding-left: 0px;">
                        <h3>Register New Society</h3>
                    </div>
                     <div class="ibox-tools">
                        <a href="https://colonia.in"><span class="btn btn-success"><i class="fa fa-hand-o-left"></i> Back</span></a>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <form class="form-horizontal" role="form" id="societyRecords" method="POST" action="<?php echo site_url('newSocietyData') ?>">
                            <fieldset>
                                <div class="col-sm-12">
                                    <legend>Society Information</legend>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Society Name <span class="mandaory">*</span></label>
                                            <input type="text" placeholder="Enter Society Name" name='soc_name' class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label">Society Registration No. <span class="mandaory">*</span></label>
                                            <input type="text" placeholder="Enter Society Registration No." name='soc_SRN' class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label">Society Formation Year <span class="mandaory">*</span></label>
                                            <input type="text" placeholder="Enter Last Name" name='soc_SFY' class="form-control datepicker" readonly="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">No. of flats <span class="mandaory">*</span></label>
                                            <input type="text" placeholder="Enter No of Flats" name="soc_no_of_flat" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label">No. of shops <span class="mandaory">*</span></label>
                                            <input type="text" placeholder="Enter No of Shops" name="soc_no_shop" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label">Society Type <span class="mandaory">*</span></label>
                                            <select class="form-control" name="soc_category">
                                                <option value="">Please Select Type</option>
                                                <?php foreach ($society_type_details as $key) { ?>
                                                    <option value="<?php echo $key['cat_id'] ?>"><?php echo $key['cat_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Society Contact</label>
                                            <input type="text" placeholder="Enter Society Contact No." name="soc_Phone" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label">Society Email</label>
                                            <input type="text" placeholder="Enter Society Email ID" name="soc_email" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label">Society Website</label>
                                            <input type="text" placeholder="Enter Society website URL" name="soc_website" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">State <span class="mandaory">*</span></label>
                                            <select class="form-control" name="soc_state">
                                                <option value="">Please Select State</option>
                                                <?php foreach ($state_details as $key) {
                                                    if($state == $key['st_id']){?>
                                                        <option value="<?php echo $key['st_id'] ?>" selected><?php echo $key['st_name'] ?></option>
                                                    <?php }else{ ?>
                                                        <option value="<?php echo $key['st_id'] ?>"><?php echo $key['st_name'] ?></option>
                                                <?php } }?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label">City <span class="mandaory">*</span></label>
                                            <select class="form-control" name="soc_city">
                                                <option value="">Please Select City</option>
                                                <?php foreach ($city_details as $key) {?>
                                                    <option value="<?php echo $key['ct_id'] ?>"><?php echo $key['ct_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label">Society Area <span class="mandaory">*</span></label>
                                            <select class="form-control" name="soc_area">
                                                <option value="">Please Select Area</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Pincode <span class="mandaory">*</span></label>
                                            <input type="text" placeholder="Enter Contact Number" name="soc_pincode" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label">Address <span class="mandaory">*</span></label>
                                            <textarea rows="3" cols="5" name="soc_address" class="form-control"></textarea>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label">Society Logo</label>
                                            <input type="file"  name="soc_logo" class="form-control" style="border: none;">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="col-sm-12">
                                    <legend>Society Admin Details</legend>                                      
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Admin Name <span class="mandaory">*</span></label>
                                            <input type="text" placeholder="Enter Society Admin Name" name="member_name" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label">Phone No. <span class="mandaory">*</span></label>
                                            <input type="text" placeholder="Enter Society Admin phone number." name="member_mobile" class="form-control">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label">Email ID <span class="mandaory">*</span></label>
                                            <input type="text" placeholder="Enter Society Admin email." name="member_email" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="col-sm-12">
                                    <legend>Payment Details</legend>
                                    <div class="form-group">
                                        <span>Special offer for beta release <span style="color: red;">Free Subscription</span> for 3 Month.</span>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Subscription Period  <span class="mandaory">*</span></label>
                                            <select class="form-control" name="soc_sub_period">
                                                <option value="">Please Select</option>
                                                <option value="3">3 Month</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label">Payment Mode  <span class="mandaory">*</span></label>
                                            <select class="form-control" name="soc_payment_mode">
                                                <option value="">Please Select</option>
                                                <option value="2">Offline</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label">Offline Payment Mode <span class="mandaory">*</span></label>
                                            <select class="form-control" name="beta_payment">
                                                <option value="">Please Select</option>
                                                <option value="1">Beta Payment</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-4">
                                            <label class="control-label">Amount to be paid  <span class="mandaory">*</span></label>
                                            <input type="text" placeholder="Enter Amount to be paid" class="form-control" readonly="" value="0">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="control-label">Amount Paid  <span class="mandaory">*</span></label>
                                            <input type="text" placeholder="Enter Amount paid" name="soc_amount_paid" class="form-control" value="0">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group">
                                <div class="col-sm-10"><br>
                                    <button class="btn btn-md btn-primary" type="submit"><strong>Submit</strong></button>
                                    <button class="btn btn-md btn-warning" type="reset"><strong>Reset</strong></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        <div class="footer">
            <div class="pull-right">
               <h3> &copy; Colonia 2019-20</h3>
            </div>
            <div>
                <h3><strong>Developed by</strong> <a href="https://nimble-esolutions.com/" target="_blank">Nimble e-solution</a></h3>
            </div>
        </div>
    </div>
</div>

<!-- Mainly scripts -->

    <!-- Mainly scripts -->
    <!--<script src="<?php echo base_url()?>assets/js/jquery-2.1.1.js"></script>-->
    <script src="https://code.jquery.com/jquery-2.2.4.js"></script>
    <script src="<?php echo  base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script>
    <!-- <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script> -->
    <script src="<?php echo base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/select2/select2.full.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.38/pdfmake.min.js"></script> -->

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url()?>assets/js/inspinia.js"></script>
    <script src="<?php echo base_url()?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

     <!-- Date range picker -->
    <!-- <script src="<?php echo base_url();?>assets/js/plugins/daterangepicker/daterangepicker.js"></script> -->

    <script src="<?php echo base_url()?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- clockpicker -->
     <script src="<?php echo base_url()?>assets/js/plugins/clockpicker/clockpicker.js"></script>
    
    <script src="<?php echo  base_url();?>assets/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="<?php echo  base_url();?>assets/js/plugins/validate/additional-methods.min.js"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
    <!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
<script type="text/javascript">
    $(window).load(function() {
        $(".loader").fadeOut("slow");
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
       <?php if($page == 'society'){ ?>
            $('#society_manage').addClass('active');
            document.title = "Colonia | Society";
       <?php }else if($page == 'society_approve'){ ?>
            $('#society_approve').addClass('active');
            document.title = "Colonia | Approve Society";
       <?php } ?>

       <?php if(isset($flash['active']) && $flash['active'] == 1){ ?>
            swal({
                title: "<?=$flash['title']?>",
                text: "<?=$flash['text']?>",
                type: "<?=$flash['type']?>",
            });
        <?php }elseif(isset($flash['active']) && $flash['active'] == 12) {?>
            swal({
                title: "<?=$flash['title']?>",
                text: "<?=$flash['text']?>",
                type: "<?=$flash['type']?>",
                confirmButtonColor: '#81ccee',
                confirmButtonText: 'Ok',
                closeOnConfirm: false
            },
            function(isConfirm){
                if (isConfirm){
                    window.location.href = 'http://colonia.in/';
                }             
            }); 
        <?php } ?>

        $( ".datepicker" ).datepicker({
            maxDate : '1d',
            dateFormat : 'yy-m-d',
            changeYear:true,
            changeMonth:true,
            yearRange: "1940:+0"
        });

        $(document).on('change','select[name="soc_city"]',function(){
             $('select[name="soc_area"]').empty();
            var city = $(this).val();
            $.post('<?php echo site_url('Home/area_details')?>',{city:city},function(data){
                // console.log(data);
                $('select[name="soc_area"]').append('<option value="">Please select area</option>');
                 $.each(data,function(k,v){
                    $('select[name="soc_area"]').append('<option value="'+v.id+'">'+v.name+'</option>');
                });
            },'JSON');
        });

        $('#activateModal').on('show.bs.modal', function(e) {
            var soc_id = $(e.relatedTarget).data('id');
            $(e.currentTarget).find('input[name="soc_id"]').val(soc_id);
        });
        $('#deactivateModal').on('show.bs.modal', function(e) {
            var soc_id = $(e.relatedTarget).data('id');
            $(e.currentTarget).find('input[name="soc_id"]').val(soc_id);
        });
        $('#delteSociety').on('show.bs.modal', function(e) {
            var soc_id = $(e.relatedTarget).data('id');
            $(e.currentTarget).find('input[name="soc_id"]').val(soc_id);
        });
        $('#renewModal').on('show.bs.modal', function(e) {
            var soc_id = $(e.relatedTarget).data('id');
            $(e.currentTarget).find('input[name="soc_id"]').val(soc_id);
        });

        $(document).on('change','select[name="soc_payment_mode"]',function(){
            var payment = $(this).val();
            if(payment == 2){
                $('#payment_type,#amount_details,#cheque_details,#cheque_cls_details,#cheque_no_details').removeClass();
                $('#payment_type').addClass('col-sm-6');
                $('#amount_details,#cheque_details,#cheque_cls_details,#cheque_no_details').addClass('col-sm-6 hidden');
            }else{
                $('#payment_type,#amount_details,#cheque_details,#cheque_cls_details,#cheque_no_details').removeClass();
                $('#payment_type').addClass('col-sm-6 hidden');
                $('#amount_details,#cheque_details,#cheque_cls_details,#cheque_no_details').addClass('col-sm-6 hidden');
            }
        });
        $(document).on('change','select[name="payment_mode"]',function(){
            var payment = $(this).val();
            if(payment == 2){
                $('#amount_details,#cheque_details,#cheque_cls_details,#cheque_no_details').removeClass();
                $('#amount_details').addClass('col-sm-6');
                $('#cheque_details,#cheque_cls_details,#cheque_no_details').addClass('col-sm-6 hidden');
            }else if(payment == 3){
                $('#amount_details,#cheque_details,#cheque_cls_details,#cheque_no_details').removeClass();
                $('#amount_details,#cheque_details,#cheque_cls_details,#cheque_no_details').addClass('col-sm-6');
            }else{
                $('#amount_details,#cheque_details,#cheque_cls_details,#cheque_no_details').removeClass();
                $('#amount_details,#cheque_details,#cheque_cls_details,#cheque_no_details').addClass('col-sm-6 hidden');
            }
        });

        $.validator.addMethod("valueNotEquals", 
            function(value, element, arg){
                return arg !== value;
            }, "Please select.");
        $('#societyRecords').validate({
            rules:{
                soc_name:{
                    required:true
                },
                soc_SRN:{
                    required:true
                },
                soc_SFY:{
                    required:true
                },
                soc_no_of_flat:{
                    required:true,
                    digits:true,
                    minlength:1
                },
                soc_no_shop:{
                    required:true,
                    digits:true,
                    minlength:1
                },
                soc_category:{
                    required:true,
                    valueNotEquals :""
                },
                soc_Phone:{
                    // required:true,
                    digits:true,
                    minlength:10,
                    maxlength:12
                },
                soc_state:{
                    required:true,
                    valueNotEquals :""
                },
                soc_city:{
                    required:true,
                    valueNotEquals :""
                },
                soc_area:{
                    required:true,
                    valueNotEquals :""
                },
                soc_pincode:{
                    required:true,
                    digits:true,
                    minlength:6,
                    maxlength:6
                },
                soc_address:{
                    required:true
                },
                member_name:{
                    required:true
                },
                member_mobile:{
                    required:true,
                    digits:true,
                    minlength:10,
                    maxlength:12
                },
                member_email:{
                    required:true
                },
                soc_sub_period:{
                    required:true
                },
                soc_payment_mode:{
                    required:true
                },
                soc_payment_type:{
                    required:true
                },
                soc_amount_paid:{
                    required:true
                },
                bank_name:{
                    required:true
                },
                chk_celarnce_date:{
                    required:true
                },
                chk_no:{
                    required:true,
                    digits:true
                },
                beta_payment:{
                    required:true,
                    valueNotEquals :""
                },
                payment_amount:{
                    required:true,
                    digits:true,
                    valueNotEquals:'0'
                }
            },
            message:{

            }
        });
    });
</script>
</body>
</html>


