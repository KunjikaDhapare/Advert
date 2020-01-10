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
	<!-- SUMMERNOTE -->
    <script src="<?php echo  base_url();?>assets/js/plugins/summernote/summernote.min.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");
            $(".mail").hide();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
           	<?php if($page == 'notice'){ ?>
                $('#notice').addClass('active');
                $('#notice_mgnt').addClass('active');
                document.title = "Colonia | Notice";
           	<?php } ?>

           	<?php if(isset($flash['active']) && $flash['active'] == 1){ ?>
	            swal({
	                title: "<?=$flash['title']?>",
	                text: "<?=$flash['text']?>",
	                type: "<?=$flash['type']?>",
	            });
	        <?php } ?>

	        $(document).on('change','select[name="notice_scope"]',function(){
	        	var scope = $(this).val();
	        	if(scope == 2){
	        		$('#wing_flat_member').removeClass();
	        		$('#wing_flat_member').addClass('form-group');
	        	}else{
	        		$('#wing_flat_member').removeClass();
	        		$('#wing_flat_member').addClass('form-group hidden');
	        	}
	        });

	        $(document).on('change','select[name="notice_wing_id"]',function(){
	        	var wing_id = $(this).val();
	        	$('select[name="notice_flat_id').empty();
	        	$.post('<?php echo site_url('Complaint/wing_flat_details') ?>',{wing_id:wing_id},function(data){
	        		$('select[name="notice_flat_id').append("<option value='0'>All</option>");
           			$.each(data,function(k,v){
           				$('select[name="notice_flat_id').append('<option value="'+v.flat_id+'">'+v.flat_number+'</option>');
           			});
	        	},'json');
	        });

	        $(document).on('change','select[name="notice_flat_id"]',function(){
	        	var flat_data = $(this).val();
	        	$.post('<?php echo site_url('Notice/fetch_member_flat') ?>',{flat_data:flat_data},function(data){
	        		console.log(data);
	        	},'json');
	        });

            $('.summernote').summernote({
                lang: 'en-EN',
                dialogsInBody: true,
                height: 120,
                minHeight: null, 
                maxHeight: null, 
                shortCuts: false,
                fontSize: 14,
                disableDragAndDrop: false,
                toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                // ['Insert', ['picture']],
                ['Other', ['fullscreen', 'codeview']]
                ],
                callbacks: {
                    onImageUpload: function(image) {
                    editor = $(this);
                    uploadImageContent(image[0], editor);
                    }
                }            
            });

            function uploadImageContent(image, editor) {
                var data = new FormData();
                data.append("image", image);
                // $.post('<?php echo site_url('Home/upload_summ_image') ?>',{data:data},function(data){
                //     console.log(data);
                //     // var image = $('<img>').attr('src', url);
                //     // $(editor).summernote('insertNode', image[0]);
                // });
                $.ajax({
                    url: "<?php echo site_url('Home/upload_summ_image') ?>",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: 'post',
                    success: function(url) {
                        console.log(url);
                        // var image = $('<img>').attr('src', url);
                        // $(editor).summernote('insertNode', image[0]);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }

            $('#registerComplaint').validate({
                rules:{
                    notice_subject:{
                        required:true
                    },
                    notice_scope:{
                        required:true
                    },
                    notice_description:{
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
