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

    <title>Advert Management </title>

    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">

    <!-- Morris -->
    <!-- <link href="<?php echo base_url()?>assets/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet"> -->
    <link href="<?php echo base_url()?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/plugins/chosen/chosen.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="<?php echo base_url()?>assets/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <link href="<?=base_url()?>assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <link href="<?php echo base_url()?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/roboto-font.css"> -->
    <link href="<?php echo base_url()?>assets/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
    <style type="text/css">
        body{
            background-color: #676565;
        }
        .nav > li > a {
            color: #ffffff;
        }
        .navbar-top-links{
            margin: 0px;
        }
        .navbar-top-links li a {
            padding: 7px 10px;
        }
        .canvasjs-chart-credit{
            display:none;
        }
        .footer{
            background: none repeat scroll 0 0 #000000;
            color: #ffffff;     
            z-index: 23000;   
        }
        .footer .pull-right > h3, .footer div > h3{
            font-width :100 !important;
            font-size: 13px !important;
        }
        .navbar-default .nav > li > a:hover, .navbar-default .nav > li > a:focus{
            background-color: #dc882d !important;
        }
        .nav > li.active{
            border-left: 4px solid #ffffff;
            background: #dc882d;
        }
        .nav-tabs > li > a {
            color: #A7B1C2;
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
            color:#ffffff;
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
    .mail {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('<?=base_url()?>assets/images/mail_send.gif') 50% 50% no-repeat rgb(249,249,249);
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
    .btn-success,.btn-primary,.btn-primary:hover, .btn-primary:focus,.btn-success:hover, .btn-success:focus {
        background-color: #dc882d;
        border-color: #dc882d;
    }
    .btn-primary:hover, .btn-primary:focus{
        background-color: #dc882d;
        border-color: #dc882d;
    }
    .ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active {
        border: 1px solid #dddddd;
        background: #dc882d !important;
        font-weight: normal;
        color: #f7f5f5;
    }
    .text-navy {
        color: #dc882d;
    }
</style>
</head>
<body class="mini-navbar">
    <div class="loader"></div>
    <!-- <div class="mail"></div> -->
    <div id="wrapper">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0;background-color: #c2c2c2;">
            <div class="navbar-header" style="">
                <img src="<?php echo $logo;?>" style="width:27%;padding-left: 2%;">
            </div>
            <ul class="nav navbar-top-links navbar-right">                      
                <li class="dropdown">
                    <?php 
                    $member = $this->Home_model->fetch_details(array('member_id'=>$user['id']),'ad_member');
                    // print_r($this->db->last_query());
                    $position = $this->Home_model->fetch_details(array('id'=>$user['role_id']),'ad_user_role');                   
                    ?>
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" style="background-color: #c2c2c2;">
                        <?php if(!empty($member[0]['member_photo_link'])){?>
                            <span><img alt="image" class="img-circle" src="<?php echo $member[0]['member_photo_link'] ?>" style="float: right;width: 28%;"></span>
                        <?php }else{ ?>
                            <span><img alt="image" class="img-circle" src="<?php echo base_url().'assets/images/default_user.png' ?>" style="float: right;"></span>
                        <?php } ?>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs" style="width: max-content;">
                        <li style="">
                            <a href="#" style="background-color: unset;color:#dc882d;font-size: medium;font-weight: bolder;">
                                <div>
                                    <center><i class="fa fa-book fa-fw"></i> <?php if(!empty($company_details)){ echo $company_details[0]['com_name'];}else{ echo "";}  ?></center>
                                </div>
                            </a>
                        </li>
                        <li style="background-color: #dc882d;color: white;">
                            <a href="#" style="background-color: #dc882d;color:white;">
                                <div>
                                    <i class="fa fa-user fa-fw"></i> <?php echo $member[0]['member_email']; ?>
                                </div>
                            </a>
                        </li>
                        <li class="divider" style="margin-top: 0px;"></li>
                        <li>
                            <a href="<?php echo site_url('change') ?>">
                                <div>
                                    <i class="fa fa-unlock-alt fa-fw"></i>Change Password
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo site_url('logout') ?>">
                                <div>
                                    <i class="fa fa-sign-out fa-fw"></i> Log Out
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <h4 style="float: left;line-height: 1.4;"> <center><?php echo $member[0]['member_name']; ?> <br> <center><span style="font-size: smaller;font-style: italic;color: #dc882d;"><?php echo '( '.$position[0]['role'].' )';?></span></center></h4>
                </li>
            </ul>
        </nav>
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li id="dashboard">
                        <a href="<?php echo site_url('Dashboard') ?>"><i class="fa fa-th-large fa-lg"></i> <span class="nav-label">Dashboard</span></a>
                    </li>
                    <li id="master">
                        <a href="#"><i class="fa fa-database fa-lg"></i> <span class="nav-label">Master Data</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <?php if($user['role_id'] == 1){ ?>
                                <li><a href="<?php echo site_url('company') ?>">Company Details</a></li>
                            <?php } ?>
                            <?php if($user['role_id'] == 5 || $user['role_id'] == 1){ ?>
                                <li><a href="<?php echo site_url('user') ?>">User Details</a></li>
                            <?php } ?>
                            <li><a href="<?php echo site_url('publication') ?>">Publications Details</a></li>
                            <li><a href="<?php echo site_url('agent') ?>">Agent/Agency/Marketin ex. Details</a></li>
                           <!--  <li><a href="<?php echo site_url('agent') ?>">Support Details</a></li> -->
                            <li><a href="<?php echo site_url('rateDetails') ?>">Rate</a></li>
                            <li><a href="<?php echo site_url('sizeDetails') ?>">Create Size </a></li>
                            <li><a href="<?php echo site_url('periodicityDetails') ?>">Periodicity</a></li>
                              <!--   <li><a href="<?php// echo site_url('package') ?>">Package Details</a></li> -->
                        </ul>
                    </li>
                    <li id="advert">
                        <!-- <a href="<?php //echo site_url('adverties') ?>"><i class="fa fa-film fa-lg"></i> <span class="nav-label">Adverties Details</span></a> -->

                        <a href="#"><i class="fa fa-film fa-lg"></i> <span class="nav-label">Adverties</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo site_url('adverties') ?>">Adverties Details</a></li>
                            <?php if($user['role_id'] == 5 || $user['role_id'] == 1){ ?>
                            <li><a href="<?php echo site_url('advPrint') ?>">Advt. Print</a></li> <?php } ?>
                            <li><a href="<?php echo site_url('finalPrint') ?>">Final Advt. Print</a></li> 
                        </ul>

                    </li>
                  <!--   <li id="account">
                        <a href="#"><i class="fa fa-cc fa-lg"></i> <span class="nav-label">Accounts</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="<?php echo site_url('#') ?>">Bill Details</a></li>
                            <li><a href="<?php echo site_url('#') ?>">Generete Receipt</a></li>
                        </ul>
                    </li>
                    <li id="report">
                        <a href="<?php echo site_url('#') ?>"><i class="fa fa-bar-chart fa-lg"></i> <span class="nav-label">Reports</span></a>
                    </li>
                    <li id="advertise_mgnt">
                        <a href="#"><i class="fa fa-flag-o fa-lg"></i> <span class="nav-label">Advertise</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="#">Add Flat Ads.</a></li>
                            <li><a href="#">Add Commercial Ads.</a></li>
                            <li><a href="#">Approve Ads.</a></li>
                            <li><a href="#">My Advertise.</a></li>
                        </ul>
                    </li> -->
                    <!-- <li id="document">
                        <a href="#"><i class="fa fa-file-text-o fa-lg"></i> <span class="nav-label">Documents</span></a>
                    </li> -->
                    <li>
                        <a href="<?php echo site_url('logout')?>"><i class="fa fa-sign-out fa-lg" title="Logout"></i> <span class="nav-label">Logout</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg">
            <a class="navbar-minimalize minimalize-styl-2" href="#">
                <div class="spin-icon" style="border-radius: 0px 20px 20px 0px;background: #dc882d;">
                    <i class="fa fa-cogs fa-spin" style="color: #c2c2c2;"></i>
                </div>
            </a>
            <div class="row border-bottom">
            </div>