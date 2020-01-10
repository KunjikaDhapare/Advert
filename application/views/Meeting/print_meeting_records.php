<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Invoice Print</title>

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
    <style type="text/css">
    	.wrapper-content{
			padding: 5%;
			border: 2px solid;
		}
		.ibox-content{
			padding: 0px 10%;
			border: none;
		}
    </style>

</head>
<?php $ci = &get_instance(); ?>
<body class="white-bg">
    <div class="wrapper wrapper-content p-xl">
        <div class="ibox-content p-xl">
            <div class="row">
                <div class="col-sm-12">
                    <center><h2><b><?php echo $society[0]['soc_name']; ?></b></h2></center>
                </div> 
                <div class="col-sm-12">
                    <center><h4>Reg No . <?php echo $society[0]['soc_SRN']; ?></h4></center>
                </div>
                <div class="col-sm-12">
                    <center><h5><?php echo $society[0]['soc_address']; ?><br>
                    	 <?php $area = $ci->Home_model->fetch_details(array('id',$society[0]['soc_area']),'rs_ward'); echo $area[0]['name']; $city = $ci->Home_model->fetch_details('ct_id = '.$society[0]['soc_city'].'','rs_cities'); echo ' ,'.$city[0]['ct_name']; echo '-'.$society[0]['soc_pincode']?>
                    </h5></center>
                </div>
                <div class="col-sm-12">
                    <center><h4><span style="color: blueviolet;text-decoration: underline;font-size: medium;"><?php echo $society[0]['soc_email']; ?></span></h4></center>
                </div>
                <div class="table-responsive m-t">
	                <table class="table invoice-table">
	                    <thead>
	                    	<tr>
	                    		<th colspan="3">MANAGING COMMITTEE (<?php echo ' '.date('Y').' : '; echo (date('Y')+1).' ';  ?>) </th>
	                    	</tr>
		                    <tr>
		                        <th>Member Name</th>
		                        <th>Flat Number</th>
		                        <th>Member Position</th>
		                    </tr>
	                    </thead>
	                    <tbody>
		                    <tr>
		                        <td>1</td>
		                        <td>$26.00</td>
		                        <td>$5.98</td>
		                    </tr>
	                    </tbody>
	                </table>
	            </div>

                <div class="col-sm-6 text-right">
                    <h4>Invoice No.</h4>
                    <h4 class="text-navy">INV-000567F7-00</h4>
                    <span>To:</span>
                    <address>
                        <strong>Corporate, Inc.</strong><br>
                        112 Street Avenu, 1080<br>
                        Miami, CT 445611<br>
                        <abbr title="Phone">P:</abbr> (120) 9000-4321
                    </address>
                    <p>
                        <span><strong>Invoice Date:</strong> Marh 18, 2014</span><br/>
                        <span><strong>Due Date:</strong> March 24, 2014</span>
                    </p>
                </div>
            </div>
            <div class="table-responsive m-t">
                <table class="table invoice-table">
                    <thead>
                    <tr>
                        <th>Item List</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Tax</th>
                        <th>Total Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><div><strong>Admin Theme with psd project layouts</strong></div>
                            <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small></td>
                        <td>1</td>
                        <td>$26.00</td>
                        <td>$5.98</td>
                        <td>$31,98</td>
                    </tr>
                    <tr>
                        <td><div><strong>Wodpress Them customization</strong></div>
                            <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </small></td>
                        <td>2</td>
                        <td>$80.00</td>
                        <td>$36.80</td>
                        <td>$196.80</td>
                    </tr>
                    <tr>
                        <td><div><strong>Angular JS & Node JS Application</strong></div>
                            <small>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small></td>
                        <td>3</td>
                        <td>$420.00</td>
                        <td>$193.20</td>
                        <td>$1033.20</td>
                    </tr>

                    </tbody>
                </table>
            </div><!-- /table-responsive -->
            <table class="table invoice-total">
                <tbody>
                <tr>
                    <td><strong>Sub Total :</strong></td>
                    <td>$1026.00</td>
                </tr>
                <tr>
                    <td><strong>TAX :</strong></td>
                    <td>$235.98</td>
                </tr>
                <tr>
                    <td><strong>TOTAL :</strong></td>
                    <td>$1261.98</td>
                </tr>
                </tbody>
            </table>
            <div class="well m-t"><strong>Comments</strong>
                It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url();?>assets/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    <!-- <script src="<?php echo base_url();?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script> -->

    <!-- Custom and plugin javascript -->
    <!-- <script src="<?php echo base_url();?>assets/js/inspinia.js"></script> -->

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>
