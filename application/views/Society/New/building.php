<style type="text/css">
	.form-group{
		padding-left: 3%;
		padding-right: 3%;		
	}
	.form-group > label{
		color: #ffffff;
	}
	#form{
		padding: 0 15% 0 10%;
	}
	.col-sm-12{
	    border: 1px solid;
	    padding-left: 0px;
	    padding-right: 0px;
	}
	.wizard > .content{
		background: #c1bbbd;
	}
	#form-p-1{
		display: contents;
	}
	.form-control{
		background-color: #fbfafa;
	}
</style>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                	<div class="col-sm-6" style="padding-left: 0px;">
                    	<h3>Add Building</h3>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                       	<form method="post" class="form-horizontal wizard-big wizard clearfix" enctype="multipart/form-data" id="form" action="<?php echo site_url('updateBuilding')?>">
                            <h1>Building / Wing</h1>
                            <fieldset>
                                <div class="row" style="padding: 8% 15%;">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="control-label">Please Enter No of Wings / Buildings To Be Added <span class="mandaory">*</span></label>
		                                	<input type="text" placeholder="Please Enter No of Wings / Buildings" name='building_number' class="form-control" required="">
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <h1>Flat Details</h1>
                            <fieldset>
                                <div class="table-responsive" style="padding: 1% 4%;">
			                        <table class="table">
			                            <thead style="color: #ffffff;">
				                            <tr>
				                                <th>#</th>
				                                <th><center>Building / Wing Name</center></th>
				                                <th><center>Number of Floors In Wing </center></th>
				                                <th><center>Number of Flats In Wing</center></th>
				                            </tr>
			                            </thead>
			                            <tbody class="records_details">
			                               
			                            </tbody>
			                        </table>
			                    </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>