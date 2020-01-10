<style type="text/css">
	.form-group{
		padding-left: 3%;
		padding-right: 3%;		
	}
	.form-group > label{
		color: #ffffff;
	}
	#form{
		padding: 0 15% 0 10%;
	}
	.col-sm-12{
	    border: 1px solid;
	    padding-left: 0px;
	    padding-right: 0px;
	}
	.wizard > .content{
		background: #c1bbbd;
	}
	#form-p-1{
		display: contents;
	}
	.form-control{
		background-color: #fbfafa;
	}
</style>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Add New Shop</h3>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                       	<form method="post" class="form-horizontal wizard-big wizard clearfix" enctype="multipart/form-data" id="form" action="<?php echo site_url('updateShop')?>">
                            <h1>Shop</h1>
                            <fieldset>
                                <div class="row" style="padding: 8% 15%;">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label">Please Enter No of Shop To Be Added <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Please Enter No of shop" name='shop_number' class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <h1>Shop Details</h1>
                            <fieldset>
                                <div class="table-responsive" style="padding: 1% 4%;">
			                        <table class="table">
			                            <thead style="color: #ffffff;">
				                            <tr>
				                                <th>#</th>
				                                <th><center>Building / Wing Name</center></th>
				                                <th><center>Shop Number</center></th>
				                                <th><center>Shop On Floors</center></th>
				                                <th><center>Shop Name</center></th>
				                            </tr>
			                            </thead>
			                            <tbody class="records_details">
			                               
			                            </tbody>
			                        </table>
			                    </div>
                            </fieldset>
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
                <h3><strong>Developed by</strong> <a href="https://nimble-esolutions.com/" target="_blank" style="color: #dd3f6c !important;">Nimble e-solutions</a></h3>
            </div>
        </div>
    </div>
</div>

<!-- Mainly scripts -->

    <!-- Mainly scripts -->
     <script src="<?=base_url()?>assets/js/jquery-2.1.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?=base_url()?>assets/js/inspinia.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- Chosen -->
    <script src="<?=base_url()?>assets/js/plugins/chosen/chosen.jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

	<!-- Country JS -->
    <script type= "text/javascript" src ="<?=base_url()?>assets/js/countries.js"></script>
    <script src="<?php echo base_url()?>assets/js/plugins/sweetalert/sweetalert.min.js"></script>

    <!-- Steps -->
    <script src="<?=base_url()?>assets/js/plugins/staps/jquery.steps.js"></script>
    <script src="<?=base_url()?>assets/js/plugins/iCheck/icheck.min.js"></script>

    <!-- Jquery Validate -->
    <script src="<?=base_url()?>assets/js/plugins/validate/jquery.validate.min.js"></script>
    
	<script type="text/javascript">
	    $(window).load(function() {
	        $(".loader").fadeOut("slow");
	    });
	</script>
	<script type="text/javascript">
	    $(document).ready(function() {
	    	<?php if($page == 'soc_setting'){ ?>
	            $('#soc_setting').addClass('active');
	            document.title = "Colonia | Society Settings";
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
	        <?php } ?> 
	       
	    	var settings = {
			    labels: {
			        finish: "Submit"
			    }
			};
	        $("#wizard").steps(settings);
	        $("#form").steps({
	            bodyTag: "fieldset",
	            onStepChanging: function (event, currentIndex, newIndex)
	            {
	                // Always allow going backward even if the current step contains invalid fields!
	                if (currentIndex > newIndex)
	                {
	                    return true;
	                }

	                // Forbid suppressing "Warning" step if the user is to young
	                if (newIndex === 3 && Number($("#age").val()) < 18)
	                {
	                    return false;
	                }

	                var form = $(this);

	                // Clean up if user went backward before
	                if (currentIndex < newIndex)
	                {
	                    // To remove error styles
	                    $(".body:eq(" + newIndex + ") label.error", form).remove();
	                    $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
	                }

	                // Disable validation on fields that are disabled or hidden.
	                form.validate().settings.ignore = ":disabled,:hidden";

	                // Start validation; Prevent going forward if false
	                // return form.valid();
	                if(form.valid()){
                    	var shop = $('input[name="shop_number"]').val();
                    	switch(currentIndex) {
						    case 0:
						    // $(this.buttons.finish).addClass("buttonDisabled");
						       	$('.records_details').empty();
						       	var j = 0;
					        	for (var i = 1; i <= shop; i++) {
					        		$('.records_details').append('<tr><td>'+i+'</td>'+
					        			'<td><select class="form-control wing_name" name="wing_name['+j+']"><option value="">Please Select Wing </option>'+
					        			'<?php foreach($wing_details as $key){ echo '<option value="'.$key["wing_name"].'">'.$key['wing_name'].'</option>';}?></select></td>'+
					        			'<td><input type="text" class="form-control" name="wing_shop_number['+j+']" placeholder="eg 1"></td><td id="total_floor"><select name="floor_number['+j+']" class="form-control floor_number"><option value="">Please Select ..</option></td><td><input type="text" class="form-control" name="shop_name['+j+']" placeholder="eg ABC"></td>');
					        		j++;
					        	}
					        	$.validator.addMethod("valueNotEquals", 
						            function(value, element, arg){
						                return arg !== value;
						            }, "Please select.");
					        	$("[name^=wing_name]").each(function () {
							        $(this).rules("add", {
							            required: true,
							            valueNotEquals :""
							        });
							    });	 
							    $("[name^=shop_name],[name^=wing_shop_number]").each(function () {
							        $(this).rules("add", {
							            required: true,
							        });
							    });	  
							    $("[name^=floor_number]").each(function () {
							        $(this).rules("add", {
							            required: true,
							            digits:true
							        });
							    });  
						        break;
						    case 1:
						    	
						        break;

						    default:
						}
                    	return form.valid();
                    };
	            },
	            onStepChanged: function (event, currentIndex, priorIndex)
	            {
	                // Suppress (skip) "Warning" step if the user is old enough.
	                if (currentIndex === 2 && Number($("#age").val()) >= 18)
	                {
	                    $(this).steps("next");
	                }

	                // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
	                if (currentIndex === 2 && priorIndex === 3)
	                {
	                    $(this).steps("previous");
	                }
	                return form.valid();
	            },
	            onFinishing: function (event, currentIndex)
	            {
	                var form = $(this);

	                // Disable validation on fields that are disabled.
	                // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
	                // form.validate().settings.ignore = ":disabled";

	                // Start validation; Prevent form submission if false
	                return form.valid();
	            },
	            onFinished: function (event, currentIndex)
	            {
	            	var form = $(this);
	            	var i;
	            	var shop_no = $('input[name="shop_number"]').val();
            		$.post('<?php echo site_url('NewSociety/shop_verification')?>',{total_shop:shop_no},function(data){
            			if (data == 'true') {
                			form.submit();
            			} else {
            				alert('Total number of Shop are grater than number of Shop enter at time of subscription.');
            			}
            		},'json');
	            }
	        }).validate({
	            errorPlacement: function (error, element)
	            {
	                element.after(error);
	            },
	            rules: {
	                'shop_number': {
	                    required: true,
	                    digits:true
	                }
	            }
	        });	       
	        // });

	        $.validator.setDefaults({
	            submitHandler: function (form) {
	                form.submit();
	            }
	        });

	        $(document).on('change','.wing_name',function(){
	        	var wing_name = $(this).val();
	        	var floor_list = $(this).parent().siblings('#total_floor').find('.floor_number');
	        	floor_list.empty();
	        	$.post('<?php echo site_url('NewSociety/wing_floor_number')?>',{wing_name:wing_name},function(data){
	        		var floor_number = data[0]['wing_floors'];
	        		floor_list.append('<option value="">Please Select ..</option>');
	        		for(var i=1;i<=floor_number;i++){
	        			floor_list.append('<option value="'+i+'">'+i+' Floor</option>');
	        		}
	        	},'JSON');
	        });
	             
	    });
	</script>
</body>
</html>
