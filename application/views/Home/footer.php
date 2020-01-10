		<div class="footer">
            <div class="col-sm-12">
                <div class="col-sm-9">
                    <h3><strong>Developed by</strong> <a href="https://nimble-esolutions.com/" target="_blank">Nimble e-solution</a></h3>
                </div>
                <div class="col-sm-3">
                    <div class="pull-right">
                       <h3> &copy; Advert 2019-20</h3>
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
           <?php if($page == 'dashboard'){ ?>
                $('#dashboard').addClass('active');
                document.title = "Advert | Dashboard";
           <?php } ?>

            $('#approveFlat').on('show.bs.modal', function(e) {
                var flat_id = $(e.relatedTarget).data('id');
                $(e.currentTarget).find('input[name="flat_id"]').val(flat_id);
            });

            $('#updatePwd').validate({
                rules:{
                    member_password:{
                        required:true,
                        minlength:6
                    },
                    pwd_confirm:{
                        required:true,
                        equalTo:'input[name="member_password"]'
                    }
                }
            })           
        });
    </script>
</body>
</html>
