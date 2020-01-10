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
           <?php if($page == 'approveFlat'){ ?>
                $('#approveFlat').addClass('active');
                document.title = "Colonia | Flat Details";
           <?php }elseif($page == 'FlatCoWner'){ ?>
                $('#flat_profile').addClass('active');
                document.title = "Colonia | Flat Details"; 
            <?php } ?>

            <?php if(isset($flash['active']) && $flash['active'] == 1){ ?>
                swal({
                    title: "<?=$flash['title']?>",
                    text: "<?=$flash['text']?>",
                    type: "<?=$flash['type']?>",
                });
            <?php } ?>

            $( ".datepicker" ).datepicker({
	            maxDate : '-1d',
	            dateFormat : 'yy-m-d'
	        });

            $('#approveFlatow').on('show.bs.modal', function(e) {
                var flat_id = $(e.relatedTarget).data('id');
                $(e.currentTarget).find('input[name="flat_id"]').val(flat_id);
            }); 
            $('#co_owner_update').on('show.bs.modal', function(e) {
                var flat_id = $(e.relatedTarget).data('id');
                $(e.currentTarget).find('input[name="flat_id"]').val(flat_id);
            });
            $('#co_owner_view').on('show.bs.modal', function(e) {
                var flat_id = $(e.relatedTarget).data('id');
                $.post('<?php echo site_url('FlatOwner/flat_co_owner_records') ?>',{flat_id:flat_id},function(data){
                    // console.log(data);
                    $('.owner_details').empty();
                    $.each(data,function(k,v){
                        $('.owner_details').append('<tr><td>1</td><td>'+v.owner_name+'</td><td>'+v.owner_phone+'</td><td>'+v.owner_email+'</td><td></td></tr>');
                    })
                },'JSON');
                // $(e.currentTarget).find('input[name="flat_id"]').val(flat_id);
            });

             $('#addParking').on('show.bs.modal', function(e) {
                $('select[name="vehicle_id"]').val("");
                $('input[name="vehicle_type"]').val("");
                $('input[name="vehicle_model"]').val("");
                $('input[name="vehicle_no"]').val("");
                $('select[name="vehicle_sticker"]').val("");
                var vehicle_id = $(e.relatedTarget).data('id');
                $('#addParkingDetails,#updateParkingDetails,#addParkingDetails1,#updateParkingDetails1').removeClass();
                if(vehicle_id != ''){
                    $(e.currentTarget).find('input[name="vehicle_id"]').val(vehicle_id);
                    $.post('<?php echo site_url('Home/fetch_vehicle_records')?>',{id:vehicle_id},function(data){
                        console.log(data);
                        $('select[name="vehicle_type"]').val(''+data[0].vehicle_type+'');
                        $('input[name="vehicle_model"]').val(''+data[0].vehicle_model+'');
                        $('input[name="vehicle_no"]').val(''+data[0].vehicle_no+'');
                        $('select[name="vehicle_sticker"]').val(''+data[0].vehicle_sticker+'');
                    },'JSON');
                    $('#addParkingDetails').addClass('modal-title hidden');
                    $('#updateParkingDetails').addClass('modal-title');
                    $('#addParkingDetails1').addClass('btn btn-success hidden');
                    $('#updateParkingDetails1').addClass('btn btn-success');
                }else{
                    $('#addParkingDetails').addClass('modal-title');
                    $('#updateParkingDetails').addClass('modal-title hidden');
                    $('#addParkingDetails1').addClass('btn btn-success');
                    $('#updateParkingDetails1').addClass('btn btn-success hidden');
                }
            });

            $('#deleteParkingRe').on('show.bs.modal', function(e) {
                var vehicle_id = $(e.relatedTarget).data('id');
                $(e.currentTarget).find('input[name="vehicle_id"]').val(vehicle_id);
            });

            $('#coOwner').validate({
            	rules:{
            		owner_name:{
            			required:true
            		},
            		owner_phone:{
            			required:true,
            			digits:true,
            			minlength:10,
            			maxlength:12
            		},
            		owner_email:{
            			required:true
            		},
            		owner_DOB:{
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
