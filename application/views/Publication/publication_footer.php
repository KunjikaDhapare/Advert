        <div class="footer">
            <div class="col-sm-12"  style="border:none;">
                <div class="col-sm-9">
                    <h3><strong>Developed by</strong> <a href="https://nimble-esolutions.com/" target="_blank">Nimble e-solution</a></h3>
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
       <?php if($page == 'publication'){ ?>
            $('#master').addClass('active');
            document.title = "Advert | Publication Details";
       <?php } ?>

       <?php if(isset($flash['active']) && $flash['active'] == 1){ ?>
            swal({
                title: "<?=$flash['title']?>",
                text: "<?=$flash['text']?>",
                type: "<?=$flash['type']?>",
            });
        <?php } ?>

        $( ".datepicker" ).datepicker({
            minDate : '0',
            dateFormat : 'yy-m-d',
            changeMonth: true,
            changeYear: true
        });

        $("select[name='pub_state']").on("change", function() {
            $('select[name="pub_city"]').empty();

            var state = $(this).val();
            $.post('<?php echo site_url('Publication/getCity')?>',{state:state},function(data){
                // console.log(data);
                $('select[name="pub_city"]').append('<option value="">Please select area</option>');
                $.each(data,function(k,v){
                    $('select[name="pub_city"]').append('<option value="'+v.ct_id+'">'+v.ct_name+'</option>');
                });
            },'JSON');
        });

        $('#CommiteeMember').on('show.bs.modal', function(e) {
            var comm_id = $(e.relatedTarget).data('id');
            $(e.currentTarget).find('input[name="comm_id"]').val(comm_id);
        }); 

        $('#delteCommittee').on('show.bs.modal', function(e) {
            var comm_id = $(e.relatedTarget).data('id');
            $(e.currentTarget).find('input[name="comm_id"]').val(comm_id);
        }); 

        $('#assignRole').on('show.bs.modal', function(e) {
            var comm_mem_id = $(e.relatedTarget).data('id');
            $(e.currentTarget).find('input[name="comm_mem_id"]').val(comm_mem_id);

            $('.role_select').select2({
               placeholder:"Please Select"
            }); 
        });     

        $('#approveResignation').on('show.bs.modal', function(e) {
            var comm_mem_id = $(e.relatedTarget).data('id');
            $(e.currentTarget).find('input[name="comm_mem_id"]').val(comm_mem_id);
        });
        $('#sendResignation').on('show.bs.modal', function(e) {
            var comm_mem_id = $(e.relatedTarget).data('id');
            $(e.currentTarget).find('input[name="comm_mem_id"]').val(comm_mem_id);
        });

        $(function () {
            $('input[name="form_dates"]').datepicker({
                numberOfMonths: 2,
                // minDate:"0",
                dateFormat:'d M yy',
                changeMonth: true,
                changeYear: true,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() + 1);
                    $('input[name="till_dates"]').datepicker("option", "minDate", dt);
                }
            });
            $('input[name="till_dates"]').datepicker({
                numberOfMonths: 2,
                // minDate:"0",
                dateFormat:'d M yy',
                changeMonth: true,
                changeYear: true,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() - 1);
                    $('input[name="form_dates"]').datepicker("option", "maxDate", dt);
                }
            });
        }); 
      	
      	$("select[name='pub_periodicity_id']").on("change", function() {
            var periodicity = $(this).val();//alert(periodicity);
            if(periodicity==1){
                $("#pb1").addClass("hidden");
                $("#pb2").addClass("hidden");
                $("#pb3").addClass("hidden");
                $("#pb4").addClass("hidden");
                $("#pb5").addClass("hidden");
            }else if(periodicity == 2){
                $("#pb1").removeClass("hidden");
                $("#pb2").addClass("hidden");
                $("#pb3").addClass("hidden");
                $("#pb4").addClass("hidden");
                $("#pb5").addClass("hidden");
            }else if(periodicity == 3){
                $("#pb1").removeClass("hidden");
                $("#pb2").addClass("hidden");
                $("#pb3").addClass("hidden");
                $("#pb4").addClass("hidden");
                $("#pb5").addClass("hidden");
            }else if(periodicity == 4){
                $("#pb1").removeClass("hidden");
                $("#pb2").removeClass("hidden");
                $("#pb3").addClass("hidden");
                $("#pb4").addClass("hidden");
                $("#pb5").addClass("hidden");
            }else if(periodicity == 4){
                $("#pb1").removeClass("hidden");
                $("#pb2").removeClass("hidden");
                $("#pb3").addClass("hidden");
                $("#pb4").addClass("hidden");
                $("#pb5").addClass("hidden");
            }else if(periodicity == 5){
                $("#pb1").removeClass("hidden");
                $("#pb2").removeClass("hidden");
                $("#pb3").removeClass("hidden");
                $("#pb4").removeClass("hidden");
                $("#pb5").addClass("hidden");
            }else if(periodicity == 6){
                $("#pb1").removeClass("hidden");
                $("#pb2").removeClass("hidden");
                $("#pb3").addClass("hidden");
                $("#pb4").addClass("hidden");
                $("#pb5").addClass("hidden");
            }else{
                $("#pb1").addClass("hidden");
                $("#pb2").addClass("hidden");
                $("#pb3").addClass("hidden");
                $("#pb4").addClass("hidden");
                $("#pb5").addClass("hidden");
            }
        });

        $("input[name='search_records']").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
		 $('#disablePub').on('show.bs.modal', function(e) {
            var pub_id = $(e.relatedTarget).data('id');
            $(e.currentTarget).find('input[name="pub_id"]').val(pub_id);
        });
        $('#societyRecords').validate({
            rules:{
                pub_company:{
                    required:true
                },
                pub_name:{
                    required:true
                },
                pub_reg:{
                    required:true
                },
                pub_contact:{
                    required:true,
                    digits:true,
                    minlength:10,
                    maxlength:12
                },
                pub_state:{
                    required:true
                },
                pub_city:{
                    required:true
                },
                pub_pincode:{
                    required:true
                },
                pub_address:{
                    required:true
                },
                member_name1:{
                    required:true
                },
                member_mobile1:{
                    required:true,
                    digits:true,
                    minlength:10,
                    maxlength:12
                },
                member_email1:{
                    required:true
                },
                member_name2:{
                    required:true
                },
                member_mobile2:{
                    required:true,
                    digits:true,
                    minlength:10,
                    maxlength:12
                },
                member_email2:{
                    required:true
                },
                pub_size_type:{
                    required:true
                },
                pub_actual_height:{
                    required:true
                },
                pub_actual_width:{
                    required:true
                },
                pub_actual_height:{
                    required:true
                },
                pub_actual_width:{
                    required:true
                }, 
                pub_print_height:{
                    required:true
                },
                pub_print_width:{
                    required:true
                },
                pub_periodicity_id:{
                    required:true
                },                
                pub_publish_date:{
                    required:true
                }, 
                pub_publish_date_1:{
                    required:true
                }, 
                pub_publish_date_2:{
                    required:true
                }, 
                pub_publish_date_3:{
                    required:true
                }, 
                pub_publish_date_4:{
                    required:true
                },
                pub_code:{
                    required:true
                },
            }
        })
    });
</script>
</body>
</html>
