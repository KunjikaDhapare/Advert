    
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
       <?php if($page == 'Adverties'){ ?>
            $('#advert').addClass('active');
            document.title = "Advert | Adverties Scheduling Details";
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

        $( ".datepickerSchedule" ).datepicker({
            minDate : '1d',
            dateFormat : 'yy-m-d'
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

        $("input[name='search_records']").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        $(document).on('change','select[name="sch_type"]',function(){
        	var sch_type = $(this).val();
        	$('#pac_details').removeClass();
        	if(sch_type == 1){
        		$('#sch_records_thead,#sch_records_tbody').empty();
        		var per = $('select[name="adv_periodicity"]').val();
        		if(per == 2){
	        		$('#sch_records_thead').append('<tr><th>#</th><th>Month</th><th class="center">1st Week</th><th class="center">2nd Week</th><th class="center">3rd Week</th><th class="center">4th Week</th></tr>');
	        		$('#sch_records_tbody').append('<tr><td style="width:10%;"><input type="checkbox" class="fortnight_month" checked name="sch_date"></td><td><?php echo date('M Y'); ?></td><td class="center"><input type="checkbox" class="fortnight_event" name="st_week[]"></td><td class="center"><input type="checkbox" class="fortnight_event" name="nd_week[]"></td><td class="center"><input type="checkbox" class="fortnight_event" name="rd_week[]"></td><td class="center"><input type="checkbox" class="fortnight_event" name="th_week[]"></td></tr>');
	        	}else if(per == 3){
	        		$('#sch_records_thead').append('<tr><th>#</th><th>Month</th><th class="center">1st Fortnight</th><th class="center">2nd Fortnight</th></tr>');
	        		$('#sch_records_tbody').append('<tr><td style="width:10%;"><input type="checkbox" class="fortnight_month" checked name="sch_date" value="<?php echo date('M Y'); ?>"></td><td><?php echo date('M Y'); ?></td><td class="center"><input type="checkbox" class="fortnight_event" name="st_week[]"></td><td class="center"><input type="checkbox" class="fortnight_event" name="nd_week[]"></td><td class="center"></tr>');
	        	}else if(per == 4){
        			$('#sch_records_thead').append('<tr><th>#</th><th>Month</th></tr>');
	        		$('#sch_records_tbody').append('<tr><td style="width:10%;"><input type="checkbox" class="fortnight_month" checked name="sch_date"></td><td><?php echo date('M Y'); ?></td></tr>');
	        	}else if(per == 5){
        			
	        	}
	        	$('#pac_details').addClass('col-sm-4 hidden');
        	}else if(sch_type == 2){
        		$('#sch_records_thead,#sch_records_tbody').empty();
        		$('#pac_details').addClass('col-sm-4');
        	}else{
        		$('#sch_records_thead,#sch_records_tbody').empty();
        		$('#pac_details').addClass('col-sm-4 hidden');
        	}
        });

        $(document).on('click','.fortnight_event',function(event){
        	var check = $('#sch_records_tbody').find('.fortnight_event:checked').length;
        	var check1 = $('#sch_records_tbody').find('input[name="sch_date"]:checked').length;
        	if(check > 1){
        		alert('Only Single adverties should allowed.');
        		event.preventDefault();
        	}
        	if(check1 < 1){
        		alert('Please check the schedule month.');
        		event.preventDefault();
        	}
        });

        $(document).on('click','.fortnight_month',function(event){
        	var per = $('select[name="adv_periodicity"]').val();
        	var month = $(this).val();
        	var length = $('#sch_records_tbody').find('input[name="sch_date"]').length;
        	var check = $('#sch_records_tbody').find('input[name="sch_date"]:checked').length;
        	var check1 = $('#sch_records_tbody').find('.fortnight_event:checked').length;
        	if(check > 1){
        		alert('Only Single adverties should allowed.');
        		event.preventDefault();
        	}else if (check1 > 0 ){
        		alert('Please uncheck schedule.');
        		event.preventDefault();
        	}else if ($(this).prop('checked') == false && length < 2) {
        		if(per == 2){
        			$('#sch_records_tbody').append('<tr><td style="width:10%;"><input type="checkbox" class="fortnight_month" checked name="sch_date"></td><td><?php echo date('M Y',  strtotime('1 month')); ?></td><td class="center"><input type="checkbox" class="fortnight_event" name="st_week[]"></td><td class="center"><input type="checkbox" class="fortnight_event" name="nd_week[]"></td><td class="center"><input type="checkbox" class="fortnight_event" name="rd_week[]"></td><td class="center"><input type="checkbox" class="fortnight_event" name="th_week[]"></td></tr>');
        		}else if(per == 3){
        			$('#sch_records_tbody').append('<tr><td style="width:10%;"><input type="checkbox" class="fortnight_month" checked name="sch_date" value=""></td><td><?php echo date('M Y',  strtotime('1 month')); ?></td><td class="center"><input type="checkbox" class="fortnight_event" name="st_week[]"></td><td class="center"><input type="checkbox" class="fortnight_event" name="nd_week[]"></td><td class="center"></tr>');
        		}else if(per == 4){
        			$('#sch_records_tbody').append('<tr><td style="width:10%;"><input type="checkbox" class="fortnight_month" checked name="sch_date"></td><td><?php echo date('M Y',  strtotime('1 month')); ?></td></tr>');
        		}
        	}else{

        	}
        });

        $('#approveAdverties').on('show.bs.modal', function(e) {
            var advert_id = $(e.relatedTarget).data('id');
            // alert(advert_id);
            $(e.currentTarget).find('input[name="approve_advert_id"]').val(advert_id);
        });

        $('#rescheduleAdvertise').on('show.bs.modal', function(e) {
            var sch_id = $(e.relatedTarget).data('id');
            $(e.currentTarget).find('input[name="reSch_id"]').val(sch_id);
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
                reSch_date:{
                    required:true
                },
                adv_periodicity:{
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
