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
        <?php } ?>

        $( ".datepicker" ).datepicker({
            maxDate : '1d',
            dateFormat : 'yy-m-d',
            changeYear:true,
            changeMonth:true,
            yearRange: "1940:+0",
        });

        $(document).on('change','select[name="soc_city"]',function(){
             $('select[name="soc_area"]').empty();
            var city = $(this).val();
            $.post('<?php echo site_url('Society/area_details')?>',{city:city},function(data){
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
