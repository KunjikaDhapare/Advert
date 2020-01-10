        <style type="text/css">
            .no-margins{
                padding-top: 0px !important;
            }
            .page-wrapper{
                min-height: 1200px;
            }
        </style>
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <a href="<?php echo site_url('publication') ?>"><span class="label label-success pull-right"><i class="fa fa-plus fa-2x" style="color: red;"></i></span></a>
                            <h5>Publication</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins"><b><?php echo $publication_details; ?></b></h1>
                            <!-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> -->
                            <small>Total Publication</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <a href="<?php echo site_url('client') ?>"><span class="label label-info pull-right"><i class="fa fa-users fa-2x"></i></span></a>
                            <h5>Client / Advertiser</h5>
                        </div>
                        <div class="ibox-content">
                           <h1 class="no-margins"><b><?php echo $client_details; ?></b></h1>
                            <small>Total Client/Advertiser</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <a href="<?php echo site_url('agent') ?>"><span class="label label-danger pull-right"><i class="fa fa-users fa-2x"></i></span></a>
                            <h5>Agent / Pratinidhi</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins"><b><?php echo $agent_details; ?></b></h1>
                            <small>Total Agent / Pratinidhi</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-1"></div>
              
                <div class="col-lg-3">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <a href="#"><span class="label label-success pull-right" style="background-color: yellow;"><i class="fa fa-flag fa-2x" style="color: red;"></i></span></a>
                            <h5>Manage Advertisement's</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins"><b><?php echo $adverties_details; ?></b></h1>
                            <!-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> -->
                            <small>Total Advertise</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>