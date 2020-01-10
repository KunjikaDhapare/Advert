    
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
    <!-- <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script> -->
    <!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
<script type="text/javascript">
    $(window).load(function() {
        $(".loader").fadeOut("slow");
        $(".mail").hide();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
       <?php if($page == 'User'){ ?>
            $('#master').addClass('active');
            document.title = "Advert | User Details";
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

        $( ".datepicker1" ).datepicker({
            maxDate : '1d',
            dateFormat : 'yy-m-d',
            updateViewDate: false
        }).on('changeMonth', function(e){
            var month = e.date.getMonth();
            var disabled = getDisabledDates(month);
            $('.datepicker').datepicker('setDatesDisabled', disabled);
        });

        $("input[name='search_records']").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $('#editMem').on('show.bs.modal', function(e) {
            var user_id= $(e.relatedTarget).data('id'); alert(user_id);
            $(e.currentTarget).find('input[name="user_id"]').val(user_id);
            $.post('<?php echo site_url('User/getUserDetails'); ?>',{user_id},function(data){
                console.log(data);
              /*  $('input[name="cnt_contact1').val(data[0].cont_mobile);
                $('input[name="cnt_email1').val(data[0].cont_email);*/
            },'JSON');
        }); 

        $('#deleteMem').on('show.bs.modal', function(e) {
            var member_id= $(e.relatedTarget).data('id');
            $(e.currentTarget).find('input[name="member_id"]').val(member_id);
        }); 
        
        $(function () {
            $('input[name="adv_from_date"]').datepicker({
                numberOfMonths: 2,
                // minDate:"0",
                dateFormat:'d M yy',
                changeMonth: true,
                changeYear: true,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() + 1);
                    $('input[name="adv_to_date"]').datepicker("option", "minDate", dt);
                }
            });
            $('input[name="adv_to_date"]').datepicker({
                numberOfMonths: 2,
                // minDate:"0",
                dateFormat:'d M yy',
                changeMonth: true,
                changeYear: true,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() - 1);
                    $('input[name="adv_from_date"]').datepicker("option", "maxDate", dt);
                }
            });
        }); 

        $(document).on('click','#make_schedule',function(){
            var paid = $('input[name="adv_paid"]').val();
            var free = $('input[name="adv_free"]').val();
            var per = $('select[name="adv_periodicity"]').val();
            if(paid == 0){
                alert("Please enter paid adverties, then make a schedule.");
            }else{
                var total = parseInt(paid) + parseInt(free);
                // <?php $total = '<script>total</script>'; ?>
                var now = new Date();
                if(per == 2){
                    $('#sch_records_thead').append('<tr><th>#</th><th>Month</th><th class="center">1st Week</th><th class="center">2nd Week</th><th class="center">3rd Week</th><th class="center">4th Week</th></tr>');
                    for (var i = 0; i < total; i++) {
                        $('#sch_records_tbody').append('<tr><td style="width:10%;"><input type="checkbox" class="fortnight_month" checked name="sch_date"></td><td><?php echo date('M Y'); ?></td><td class="center"><input type="checkbox" class="fortnight_event" name="st_week[]"></td><td class="center"><input type="checkbox" class="fortnight_event" name="nd_week[]"></td><td class="center"><input type="checkbox" class="fortnight_event" name="rd_week[]"></td><td class="center"><input type="checkbox" class="fortnight_event" name="th_week[]"></td></tr>');
                    }
                }else if(per == 3){
                    $('#sch_records_thead').append('<tr><th>#</th><th>Month</th><th class="center">1st Fortnight</th><th class="center">2nd Fortnight</th></tr>');
                    for (var i = 0; i < total; i++) {
                        $('#sch_records_tbody').append('<tr><td style="width:10%;"><input type="checkbox" class="fortnight_month" checked name="sch_date" value="<?php echo date('M Y'); ?>"></td><td><?php echo date('M Y'); ?></td><td class="center"><input type="checkbox" class="fortnight_event" name="st_week[]"></td><td class="center"><input type="checkbox" class="fortnight_event" name="nd_week[]"></td><td class="center"></tr>');
                    }
                }else if(per == 4){
                    $('#sch_records_thead').append('<tr><th>#</th><th>Sr. No</th><th>Month</th></tr>');
                    for (var i = 1; i <= total; i++) {
                        // var month = now.getDate()+' '+(now.getMonth()+1)+' '+now.getFullYear();
                        $('#sch_records_tbody').append('<tr><td style="width:10%;"><input type="checkbox" class="fortnight_month" checked name="sch_date"></td><td>'+i+'</td><td><input type="text" name="sch_date" class="form-control datepicker1" readonly style="width:25%;"></td></tr>');
                    }
                }else if(per == 5){
                    
                }
            }
            $( ".datepicker1" ).datepicker({
                minDate : '1d',
                dateFormat : 'yy-m-d'
            });

        });

        $('#societyRecords').validate({
            rules:{
                member_name:{
                    required:true
                },
                member_email:{
                    required:true
                },
                member_mobile:{
                    required:true,
                    digits:true,
                    minlength:10,
                    maxlength:12
                },              
                member_password:{
                    // required:true,
                    minlength:6
                },
                member_re_password:{
                    // required:true,
                    equalTo:'input[name="member_password"]'
                },
                member_role_id:{
                    required:true
                },
                

            }
        })
    });
</script>
</body>
</html>
