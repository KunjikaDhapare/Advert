		<?php 
            $ci = &get_instance();
            $society = $ci->Home_model->fetch_details(array('soc_id'=>$user['soc_id']),'rs_society');
        ?>
        <div class="footer">
            <div class="col-sm-12" style="border:none;">
                <div class="col-sm-3">
                    <h3><strong>Developed by</strong> <a href="https://nimble-esolutions.com/" target="_blank">Nimble e-solution</a></h3>
                </div>
                <div class="col-sm-6">
                     <center><h3 style="font-weight: 700;color: #ffffff;margin: 1%;"><i class="fa fa-building fa-fw"></i> <?php if(!empty($society)){echo $society[0]['soc_name'];} ?></h3></center>
                </div>
                <div class="col-sm-3">
                    <div class="pull-right">
                       <h3> &copy; Colonia 2019-20</h3>
                    </div>
                </div>
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
	        $(".mail").hide();
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
                    	var no = $('input[name="building_number"]').val();
                    	switch(currentIndex) {
						    case 0:
						    // $(this.buttons.finish).addClass("buttonDisabled");
						       	$('.records_details').empty();
						       	var j = 0;
					        	for (var i = 1; i <= no; i++) {
					        		$('.records_details').append('<tr><td>'+i+'</td><td><input type="text" class="form-control" name="building_name['+j+']" placeholder="eg A"></td><td><input type="text" name="floor_number['+j+']" class="form-control" placeholder="eg 1"></td><td><input type="text" class="form-control" name="flat_number['+j+']" placeholder="eg 4"></td>');
					        		j++;
					        	}

					        	$("[name^=building_name]").each(function () {
							        $(this).rules("add", {
							            required: true,
							        });
							    });	  
							    $("[name^=floor_number],[name^=flat_number]").each(function () {
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
	            	var total_flats = 0;
	            	var i;
	            	var building_no = $('input[name="building_number"]').val();
	            	for (var i = 0; i < building_no; i++) {
	            		total_flats = parseInt(total_flats) + parseInt($('input[name="flat_number['+i+']"]').val());
	            	}
	            	// alert(total_flats);
            		$.post('<?php echo site_url('NewSociety/flat_verification')?>',{total_flats:total_flats},function(data){
            			console.log(data);
            			if (data == 'true') {
                			form.submit();
            			} else {
            				alert('Total number of flat are grater than number of flat enter at time of subscription.');
            			}
            		},'json');
	            }
	        }).validate({
	            errorPlacement: function (error, element)
	            {
	                element.after(error);
	            },
	            rules: {
	                'building_number': {
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

	        $('#wingFlatRecords').validate()
        	$("[name^=flat_number],[name^=flat_status],[name^=flat_floor]").each(function () {
		        $(this).rules("add", {
		            required: true,
		        });
		    });	  
		    $("[name^=flat_area]").each(function () {
		        $(this).rules("add", {
		            required: true,
		            number:true
		        });
		    });	             
	    });
	</script>
</body>
</html>
