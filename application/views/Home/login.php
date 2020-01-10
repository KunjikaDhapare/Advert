<!DOCTYPE html>
<html>

<head>
    <?php 
        $bck = base_url('assets')."/images/login_bckgrnd.jpg";
        $logo = base_url('assets')."/images/colonia_logo.png";
    ?>
    <link rel="shortcut icon" type="image/png" href="<?php echo $logo ?>"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Welcome | Advert</title>

    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link href="<?php echo base_url()?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <style type="text/css">
        .form-control{
            background-color: #ffffff;
            border: none;
            color:#dd3f6c !important;
            border-bottom: 2px solid #dd3f6c;
        }
        input:focus { 
            border-bottom: : 2px solid #dd3f6c !important;
            border-color: ##dd3f6c ;
            transition: 0.10s ease-out;
        }
        .m-t{
            padding-left: 5%;
            padding-right: 5%;
        }
        .input-group{
            display: flex;           
        }
        .input-group-prepend{
             border-bottom: 2px solid #dd3f6c;
        }
        .control-label{
            text-align: left;
            color: #dd3f6c;
            font-size:small;
            padding-left: 6%;
        }
        body{
            background-image: url('<?php echo $bck?>');
            background-repeat: no-repeat;
            background-size: cover;
        }
        .btn-primary{
            width:50%;
            background: #dd3f6c;
            border-color: #dd3f6c;
        }
        .btn-success{
            background: #dd3f6c;
            border-color: #dd3f6c;
        }
        img{
            padding-bottom: 20px;
            width:70%;
        }
        a{
           color: #dd3f6c;
           font-size: 16px;
        }
        a:hover{
           color: #dd3f6c;
        }
        u{
            float: right;
        }
        .bg1 {
            background-color: #3b5998;
        }
        .bg2 {
            background-color: #1da1f2;
        }
        .bg3 {
            background-color: #ea4335;
        }
        .login100-social-item {
            font-size: 25px;
            color: #fff;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin: 5px;
        }
        .col--12{
            float: left;
        }
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('<?=base_url()?>assets/images/loader.gif') 50% 50% no-repeat rgb(249,249,249);
            background-size: cover;
            opacity: .8;
        }
        .alert-link{
            color:red !important;
            font-size: 12px !important;
        }
    </style>
</head>

<body class="" style="overflow-y: hidden;padding-right: 10%;">
    <div class="loader"></div>
    <div class="middle-box text-center loginscreen  animated fadeInDown" style=" background: #ffffff !important;padding: 1%;border-radius: 20px;border: 1px solid #000;box-shadow: 3px 2px #dd3f6c;margin-top: 6% !important;height: auto;float: right;">
    <center><a href="<?php echo site_url('/') ?>"><img src="<?php echo $logo ?>" width="50%"></a></center>
        <div>
            <form method="post" class="m-t" role="form" action="<?php echo site_url('login')?>">
                <label class="control-label col-sm-12"><b>Username</b></label><br>
                <div class="form-group col-sm-12">
                    <div class="input-group m-b">
                        <span class="input-group-prepend"><i class="fa fa-user fa-2x" style=" padding-top: 22%;color: #dd3f6c"></i></span> 
                        <input type="text" class="form-control" name="user_email" placeholder="Enter Username">
                    </div>                    
                </div><br>
                <label class="control-label col-sm-12"><b>Password</b></label>
                <div class="form-group col-sm-12">
                    <div class="input-group m-b">
                        <span class="input-group-prepend"><i class="fa fa-lock fa-2x" style=" padding-top: 22%;color: #dd3f6c"></i></span> 
                         <input type="password" class="form-control col-sm-12" name="user_password" placeholder="Enter Password">
                    </div>                   
                </div>
                <div class="form-group col-sm-12">                
                    <?php if (isset($success)) { ?>
                        <div class="alert alert-success alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <a class="alert-link" href="#"><?php echo $success; ?> </a>.
                        </div>
                     <?php } ?>   

                    <?php if (isset($error)) { ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <a class="alert-link" href="#"><?php echo $error; ?></a>.
                        </div>
                    <?php } ?>

                    <?php if (isset($Disabled)) { ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <a class="alert-link" href="#"><?php echo $Disabled; ?></a>.
                        </div>
                    <?php } ?>  

                    <?php if (isset($alert)) { ?>
                        <div class="alert alert-warning alert-dismissable">
                             <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <a class="alert-link" href="#"><?php echo $alert;  ?></a>.
                        </div>
                    <?php }  ?>  
                </div>
                <div class="form-group col-sm-12" style="float:right;">
                    <u><a href="<?php echo site_url('forgotPasaword')?>"><small>Forgot password ?</small></a></u>
                </div>
                <div class="form-group col-sm-12">
                    <center><button type="submit" class="btn btn-primary block m-b"><i class="fa fa-user fa-lg"> Login</i></button></center>
                </div>
            </form><br>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url()?>assets/js/jquery-2.1.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
     <!-- Jquery Validate -->
    <script src="<?php echo base_url()?>assets/js/plugins/validate/jquery.validate.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
            $(".mail").hide();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
        });
    </script>

</body>

</html>
