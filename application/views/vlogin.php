<?php
    if (isset($this->session->userdata['logged_in'])) {
        redirect(base_url('homes/dashboard'));
    }
?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="A web application for local use.">
    <meta name="keywords" content="pln, persero, kskt, kalselteng">
    <meta name="author" content="PT. PLN (Persero)">
    <title>Login</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('components/app-assets/images/ico/favicon.ico');?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url('components/app-assets/images/ico/favicon-32.png');?>">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('components/app-assets/css/bootstrap.css');?>">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('components/app-assets/fonts/icomoon.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('components/app-assets/fonts/flag-icon-css/css/flag-icon.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('components/app-assets/vendors/css/extensions/pace.css');?>">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('components/app-assets/css/bootstrap-extended.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('components/app-assets/css/app.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('components/app-assets/css/colors.css');?>">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('components/app-assets/css/core/menu/menu-types/vertical-menu.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('components/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('components/app-assets/css/pages/login-register.css');?>">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('components/assets/css/style.css');?>">
    <!-- END Custom CSS-->
    <style type="text/css">
        body, html {
            font-size: 0.8rem;
            background: #15677b !important;
        }
        .msg {
            font-size: 11px;
            font-weight: bold;
            text-align: center;
        }
    </style>
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
                
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-lg-2 offset-lg-5 col-md-5 offset-md-4 col-xs-10 offset-xs-1 col-sm-12 offset-sm-0 box-shadow-0 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header no-border" style="padding-bottom: 0;">
                                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-5 pt-0 mb-0">
                                    <span>LOGIN</span>
                                </h6>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block">
                                    <form class="form-horizontal form-simple" id="fm_logins">
                                        <div id="err_msg"></div>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="text" class="form-control" id="user-name" name="username" placeholder="Username" required autofocus>
                                            <div class="form-control-position">
                                                <i class="icon-head"></i>
                                            </div>
                                        </fieldset>
                                        <fieldset class="form-group position-relative has-icon-left">
                                            <input type="password" class="form-control" id="user-password" name="password" placeholder="Password" required>
                                            <div class="form-control-position">
                                                <i class="icon-key3"></i>
                                            </div>
                                        </fieldset>
                                        <button type="submit" class="btn btn-primary btn-block" id="btn_login"><i class="icon-unlock2"></i> Login</button>
                                    </form>
                                </div>
                                <!-- /.Card Body -->
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.Content Body -->
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo base_url('components/app-assets/js/core/libraries/jquery.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('components/app-assets/vendors/js/ui/tether.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('components/app-assets/js/core/libraries/bootstrap.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('components/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('components/app-assets/vendors/js/ui/unison.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('components/app-assets/vendors/js/ui/blockUI.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('components/app-assets/vendors/js/ui/jquery.matchHeight-min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('components/app-assets/vendors/js/ui/screenfull.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('components/app-assets/vendors/js/extensions/pace.min.js');?>" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script type="text/javascript">var base_url = '<?php echo base_url(); ?>';</script>
    <script src="<?php echo base_url('components/app-assets/js/core/app-menu.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('components/app-assets/js/core/app.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('components/assets/js/scriptc.js');?>" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>
</html>
