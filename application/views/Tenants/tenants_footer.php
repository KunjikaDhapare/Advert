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
    <script src="<?php echo base_url()?>assets/js/jquery-2.1.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-2.2.4.js"></script> -->
    <!-- <script src="<?php echo  base_url();?>assets/js/plugins/dataTables/datatables.min.js"></script> -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <!-- <script src="<?php echo base_url();?>assets/js/jquery-ui.min.js"></script> -->
    <!-- <script src="<?php echo base_url();?>assets/js/bootstrap-datepicker.js"></script> -->
    <script src="<?php echo base_url()?>assets/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url()?>assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.38/pdfmake.min.js"></script> -->

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url()?>assets/js/inspinia.js"></script>
    <script src="<?php echo base_url()?>assets/js/plugins/pace/pace.min.js"></script>

    <!-- Date range use moment.js same as full calendar plugin -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script> -->

    <!-- Chosen -->
    <script src="<?php echo base_url()?>assets/js/plugins/chosen/chosen.jquery.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="<?php echo base_url();?>assets/js/plugins/select2/select2.full.min.js"></script>
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
       <?php if($page == 'tenants'){ ?>
            $('#member_mgnt').addClass('active');
            $('#tenant').addClass('active');
            document.title = "Colonia | Tenant Details";
       <?php } ?>

       <?php if(isset($flash['active']) && $flash['active'] == 1){ ?>
            swal({
                title: "<?=$flash['title']?>",
                text: "<?=$flash['text']?>",
                type: "<?=$flash['type']?>",
            });
        <?php } ?>

        $( ".datepicker" ).datepicker({
            maxDate : '1d',
            dateFormat : 'yy-m-d'
        });   

        $('#approveTenant').on('show.bs.modal', function(e) {
            var tenant_id = $(e.relatedTarget).data('id');
            $(e.currentTarget).find('input[name="tenant_id"]').val(tenant_id);
        });

        $('#registerNewTenant').validate({
            rules:{                
                tenats_type:{
                    required:true
                },
                tenants_name:{
                    required:true
                },
                tenants_mobile:{
                    required:true,
                    digits:true,
                    minlength:10,
                    maxlength:12
                },
                tenants_email:{
                    required:true
                }
            },
        })

    });
</script>
</body>
</html>
