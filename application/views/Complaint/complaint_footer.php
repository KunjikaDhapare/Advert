        <?php 
            $ci = &get_instance();
            $society = $ci->Home_model->fetch_details(array('soc_id'=>$user['soc_id']),'rs_society');
        ?>
        <div class="footer">
            <div class="col-sm-12"  style="border:none;">
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
            $(".mail").hide();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
           	<?php if($page == 'complaint'){ ?>
                $('#grievience').addClass('active');
                $('#complaint_mgnt').addClass('active');
                document.title = "Colonia | Complaint";
           	<?php } ?>

           	<?php if(isset($flash['active']) && $flash['active'] == 1){ ?>
	            swal({
	                title: "<?=$flash['title']?>",
	                text: "<?=$flash['text']?>",
	                type: "<?=$flash['type']?>",
	            });
	        <?php } ?>

           	$(document).on('change','select[name="complaint_for"]',function(){
           		var complaint_for = $(this).val();
           		if(complaint_for == 2){
           			$('#against').removeClass();
           			$('#against').addClass('col-sm-4');
           		}else{
           			$('#against').removeClass();
           			$('#against').addClass('col-sm-4 hidden');
           			$('#role,#wing_flat_member').removeClass();
           			$('#role,#wing_flat_member').addClass('form-group hidden');
           		}
           	});

           	$(document).on('click','input[name="complaint_against"]',function(){
           		var complaint_against = $('input[name="complaint_against"]:checked').val();
           		if (complaint_against == 1) {
           			$('#role').removeClass();
           			$('#role').addClass('form-group');
           			$('#wing_flat_member').removeClass();
           			$('#wing_flat_member').addClass('form-group hidden');
           		}else if(complaint_against == 2){
           			$('#role').removeClass();
           			$('#role').addClass('form-group hidden');
           			$('#wing_flat_member').removeClass();
           			$('#wing_flat_member').addClass('form-group');
           		}
           	});

            $(document).on('change','select[name="complaint_reopen"]',function(){
              var reopen = $(this).val();
              if(reopen == 1){
                $('#reopen_msg').removeClass();
                $('#reopen_msg').addClass('form-group');
              }else{
                $('#reopen_msg').removeClass();
                $('#reopen_msg').addClass('form-group hidden');
              }
            });

           	$(document).on('change','select[name="complaint_wing_id"]',function(){
           		var complaint_wing_id = $(this).val();
           		$('select[name="complaint_flat_id').empty();
           		$.post('<?php echo site_url('Complaint/wing_flat_details')?>',{wing_id:complaint_wing_id},function(data){
           			// console.log(data);
           			$('select[name="complaint_flat_id').append("<option value='0'>All</option>")
           			$.each(data,function(k,v){
           				$('select[name="complaint_flat_id').append('<option value="'+v.flat_id+'">'+v.flat_number+'</option>');
           			});
           		},'JSON');
           	});

           $(document).on('change','select[name="complaint_flat_id"]',function(){
           		var complaint_flat_number = $(this).val();
           		$.post('<?php echo site_url('Complaint/flat_owner_details')?>',{flat_id:complaint_flat_number},function(data){
           			console.log(data);
           		},'JSON');
           });

          $('#acceptComplaint,#deleteComplaint,#reopenComplaint,#deleteComplaintstatus').on('show.bs.modal', function(e) {
              var complaint_id = $(e.relatedTarget).data('id');
              $(e.currentTarget).find('input[name="complaint_id"]').val(complaint_id);
          });
          $('#resolvedComplaint').on('show.bs.modal', function(e) {
              var complaint_id = $(e.relatedTarget).data('id');
              $(e.currentTarget).find('input[name="complaint_id"]').val(complaint_id);
          }); 


           	$('#registerComplaint').validate({
           		rules:{
           			complaint_subject:{
           				required:true
           			},
      					complaint_description:{
      						required:true
      					},
      					complaint_scope:{
      						required:true
      					},
      					complaint_for:{
      						required:true
      					},
      					complaint_against:{
      						required:true
      					},
      					complaint_role:{
      						required:true
      					}
           		},
           		message:{

           		}
           	})

        });
    </script>
</body>
</html>
