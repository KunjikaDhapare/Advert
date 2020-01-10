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
       <?php if($page == 'member'){ ?>
            $('#member_mgnt').addClass('active');
            document.title = "Colonia | Member Details";
       <?php } ?>

       <?php if(isset($flash['active']) && $flash['active'] == 1){ ?>
            swal({
                title: "<?=$flash['title']?>",
                text: "<?=$flash['text']?>",
                type: "<?=$flash['type']?>",
            });
        <?php } ?>

        $( ".datepicker" ).datepicker({
            // maxDate : '1d',
            dateFormat : 'yy-m-d'
        });

        $('#deleteMember').on('show.bs.modal', function(e) {
            var member_id = $(e.relatedTarget).data('id');
            $(e.currentTarget).find('input[name="delete_member_id"]').val(member_id);
        });

        $('#CommiteeMember').on('show.bs.modal', function(e) {
            var member_id = $(e.relatedTarget).data('id');
            $(e.currentTarget).find('input[name="comm_mem_id"]').val(member_id); 
             // $('.hasDatepicker').css('z-index', 2050);

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
        }); 

        $.validator.addMethod("valueNotEquals", 
            function(value, element, arg){
                return arg !== value;
            }, "Please select.");
        $('#ownerRecords').validate(); 
        $('#').validate({
            rules:{
                member_id:{
                    required:true
                }
            }
        });

        $("#sendMail"). submit(function(){
            if ($('input:checkbox'). filter(':checked'). length < 1){
                alert("Check at least one Owner!");
                return false;
            }else{
                $('.mail').show(); // show animation
                return true; // allow regular form submission
            }
        });
                   
        $("[name^=flat_number]").each(function () {
            $(this).rules("add", {
                required: true,
            });
        }); 

        $("input[name='search_records']").on("keyup", function() {
            // alert();
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
</body>
</html>
