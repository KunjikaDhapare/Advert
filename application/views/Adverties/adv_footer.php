
    
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
    <script src="https://cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $(".loader").fadeOut("slow");
        $(".mail").hide();
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
       <?php if($page == 'Adverties'){ ?>
            $('#advert').addClass('active');
            document.title = "Advert | Adverties Details";
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

        $('#isPrintAdvertise').on('show.bs.modal', function(e) {
            var sch_id = $(e.relatedTarget).data('id');
            $(e.currentTarget).find('input[name="sch_id"]').val(sch_id);
        });
        // $("input[type='checkbox']").change(function() {
        //     var sch_id=$(this).attr('id');
        //    // alert(sch_id);
        //     if(confirm('Are you sure to print this adverties ?'))
        //     {
        //         $.post('<?php echo site_url('Adverties/printAdv')?>',{sch_id:sch_id},function(data){
        //              console.log(data);
        //              location.reload();
        //         });
        //     }        
        // });
        $("select[name='adv_pub_id']").on("change", function() {
            $('select[name="adv_periodicity').empty();
            $('select[name="adv_size_id').empty();
           // $('select[name="adv_incharge').empty();
            var pub = $(this).val();
            $.post('<?php echo site_url('getAdvDetails')?>',{pub:pub},function(data){
                // $('select[name="adv_periodicity').append("<option value='0'>All</option>")
                $.each(data,function(k,v){
                    $('select[name="adv_periodicity').append('<option value="'+v.per_id+'" selected>'+v.per_name+'</option>');
                    });
            },'JSON');
            $.post('<?php echo site_url('Adverties/getRateSizeDetails')?>',{pub:pub},function(data){
                $('select[name="adv_size_id').append("<option value=''>Please select</option>")
                $.each(data,function(k,v){
                    $('select[name="adv_size_id').append('<option value="'+v.size_id+'">'+v.size_name+'</option>');
                    });
            },'JSON');
          /*  $.post('<?php echo site_url('Adverties/getInchargeDetails')?>',{pub:pub},function(data){
                console.log(data);
                $('select[name="adv_incharge').append("<option value=''>Please select</option>")
                $.each(data,function(k,v){
                    $('select[name="adv_incharge').append('<option value="'+v.cont_id+'">'+v.cont_name+'</option>');
                    });
            },'JSON');*/
        });

        $("select[name='adv_size_id']").on("change", function() {
            $('input[name="adv_size_height').empty();
            $('input[name="adv_size_width').empty();
            var size = $(this).val();
            //alert(size);
            var pub = $("select[name='adv_pub_id']").val();
           // alert(pub);
            $.post('<?php echo site_url('Adverties/getSizeDetailsAdv')?>',{size:size,pub:pub},function(data){
                console.log(data);
                // $('select[name="adv_periodicity').append("<option value='0'>All</option>")
                $.each(data,function(k,v){
                    $('input[name="adv_size_height').val(v.rate_size_height);
                    $('input[name="adv_size_width').val(v.rate_size_width);
                    });
            },'JSON');

        });

         $("select[name='adv_color']").on("change", function() {
            $('input[name="adv_rate').empty();
            var color = $(this).val();
            var pub = $("select[name='adv_pub_id']").val();
            var size = $("select[name='adv_size_id']").val();
            $.post('<?php echo site_url('Adverties/getSizeDetailsAdv')?>',{pub:pub,size:size},function(data){
                 console.log(data);
                // $('select[name="adv_periodicity').append("<option value='0'>All</option>")
                $.each(data,function(k,v){
                    if( color == 1){
                        $('input[name="adv_rate"]').val(v.rate_blank_white);
                        $('input[name="adv_final_rate"]').val(v.rate_blank_white);
                    }else{
                        $('input[name="adv_rate"]').val(v.rate_colour);
                        $('input[name="adv_final_rate"]').val(v.rate_colour);
                    }
                    });
            },'JSON');
        });

        $("select[name='adv_client_name']").on("change", function() {
            //$('input[name="adv_rate').empty();
            var client = $(this).val();
            $.post('<?php echo site_url('Adverties/getClientDetails')?>',{client:client},function(data){
                console.log(data);
                $('input[name="adv_client_contact').val(data[0].cl_contact);
                $('input[name="adv_client_email').val(data[0].cl_email);
            },'JSON');
        });

        $("#clientRecords").on("click", function(){            
            var cl_name = $("input[name='cl_name']").val();
            var cl_contact = $("input[name='cl_contact']").val();
            var cl_email = $("input[name='cl_email']").val();
            var cl_state = $("select[name='cl_state']").val();
            var cl_city = $("select[name='cl_city']").val();
            var cl_pincode = $("input[name='cl_pincode']").val();
            var cl_address = $("textarea[name='cl_address']").val();
             // alert("Submitted"); alert(cl_address);
            $('select[name="adv_client_name').empty();
            $.post('<?php echo site_url('Adverties/putClient')?>',{cl_name:cl_name,cl_contact:cl_contact,cl_email:cl_email,cl_state:cl_state,cl_city:cl_city,cl_pincode:cl_pincode,cl_address:cl_address,cl_address:cl_address},function(data){
                console.log(data);
            },'JSON');
            $('#disableNewCl').modal('hide');
            alert('Client has been registered.');
            $.post('<?php echo site_url('Adverties/getClient')?>',{},function(data){
                console.log(data);
                $('select[name="adv_client_name').append("<option value='0'>Please select</option>");
                    $.each(data,function(k,v){
                       $('select[name="adv_client_name').append("<option value='"+v.cl_id+"'>"+v.cl_name+"</option>");  
                    });
            },'JSON');
        });

        $("select[name='adv_agent']").on("change", function() {
            var agent = $(this).val();
            $.post('<?php echo site_url('Adverties/getAgentDetails')?>',{agent:agent},function(data){
                console.log(data);
                $('input[name="adv_agent_contact').val(data[0].ag_contact);
                $('input[name="adv_agent_email').val(data[0].ag_email);
            },'JSON');
        });

        $("#agentRecords").on("click", function(){            
            var ag_type = $("select[name='ag_type']").val();
            var ag_name = $("input[name='ag_name']").val();
            var ag_contact = $("input[name='ag_contact']").val();
            var ag_email = $("input[name='ag_email']").val();
            var ag_state = $("select[name='ag_state']").val();
            var ag_city = $("select[name='ag_city']").val();
            var ag_pincode = $("input[name='ag_pincode']").val();
            var ag_address = $("textarea[name='ag_address']").val();
             // alert("Submitted"); alert(cl_address);
            $('select[name="adv_agent').empty();
            $.post('<?php echo site_url('Adverties/putAgent')?>',{ag_type:ag_type,ag_name:ag_name,ag_contact:ag_contact,ag_email:ag_email,ag_state:ag_state,ag_city:ag_city,ag_pincode:ag_pincode,ag_address:ag_address,ag_address:ag_address},function(data){
                console.log(data);
            },'JSON');
            $('#disableNewAg').modal('hide');
            if(ag_type == 1)
                alert('Agency has been registered.');
            else
                 alert('Agent has been registered.');
            $.post('<?php echo site_url('Adverties/getAgent')?>',{},function(data){
                console.log(data);

                $('select[name="adv_agent').append("<option value='0'>Please select</option>");
                    $.each(data,function(k,v){
                       $('select[name="adv_agent').append("<option value='"+v.ag_id+"'>"+v.ag_name+"</option>");  
                    });
            },'JSON');
        });

        $(function () {
                $('input[name="date_from"]').datepicker({
                    numberOfMonths: 2,
                    minDate:"0",
                    dateFormat:'d M yy',
                    onSelect: function (selected) {
                        var dt = new Date(selected);
                        dt.setDate(dt.getDate() + 1);
                        $('input[name="date_to"]').datepicker("option", "minDate", dt);
                    }
                });
                $('input[name="date_to"]').datepicker({
                    numberOfMonths: 2,
                    minDate:"0",
                   dateFormat:'d M yy',
                    onSelect: function (selected) {
                        var dt = new Date(selected);
                        dt.setDate(dt.getDate() - 1);
                        $('input[name="date_form"]').datepicker("option", "maxDate", dt);
                    }
                });
            });

        $("input[name='search_records']").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        $(document).on('click','.fortnight_month',function(){
            if($(this).prop('checked') == false){
                alert('Should not allowed to unchecked.');
                event.preventDefault();
            }
        });

        $(document).on('click','#make_schedule',function(){
            var paid = $('input[name="adv_paid"]').val();
            var free = $('input[name="adv_free"]').val();
            var per = $('select[name="adv_periodicity"]').val();
            if(paid == 0){
                alert("Please enter paid adverties, then make a schedule.");
            }else if(per == ''){
                alert("Please select publication.");
            }else{
                $('#sch_records_thead').empty();
                $('#sch_records_tbody').empty();
                var total = parseInt(paid) + parseInt(free);
               
                $('#sch_records_thead').append('<tr><th>#</th><th>Sr. No</th><th>Publish Month</th></tr>');
                    for (var i = 1; i <= total; i++) {
                        var j = i-1;
                    $('#sch_records_tbody').append('<tr><td style="width:10%;"><input type="checkbox" class="fortnight_month" readonly checked name="sch_decide['+i+']"></td><td>'+i+' Advt.</td><td><input type="text" name="sch_date['+j+']" class="form-control datepicker1" readonly style="width:25%;"></td></tr>');
                }                
            }
            $( ".datepicker1" ).datepicker({
                minDate : '1d',
                dateFormat : 'yy-m-d',
                changeMonth: true,
                changeYear: true
            });

            $('input[name^="sch_date"]').each(function(e) {
                $(this).rules('add', {
                    required: true
                });
            });

        });

        $('#exportExcel').on('click',function(){
            $("#myTable").table2excel({
                filename: "<?php if(!empty($pub_details)){ echo "".str_replace(' ', '_', $pub_details[0]['pub_name'])."_".str_replace(' ', '_', $details['date_from'])."_to_".str_replace(' ', '_', $details['date_to']).""; }?>.xls"
            });
        });  

        $('#createAdv').validate({
            rules:{
                adv_for:{
                    required:true
                },
                adv_color:{
                    required:true
                },
                adv_pub_id:{
                    required:true
                },
                adv_periodicity:{
                    required:true
                },
                reSch_date:{
                    required:true
                },
                adv_size_id:{
                    required:true
                },
                 adv_rate:{
                    required:true
                },
                adv_client_name:{
                    required:true
                },
                adv_incharge:{
                    required:true
                },
                adv_paid:{
                    required:true,
                    number:true,
                    digits:true
                },
                adv_free:{
                    required:true,
                    number:true,
                    digits:true
                },
                adv_support_comm:{
                    required:true,
                    number:true,
                    digits:true
                }
            }
        })
    });
</script>
</body>
</html>
