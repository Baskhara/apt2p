<?php
    $base_url = load_class('Config')->config['base_url'];
?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Error 404 - Not Found">
    <meta name="keywords" content="error, 404, not found">
    <meta name="author" content="PT. PLN (Persero)">
    <title>Error 404 - Page Not Found</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $base_url;?>components/app-assets/images/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="<?php echo $base_url;?>components/app-assets/images/ico/favicon-32.png">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>components/app-assets/css/bootstrap.css">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>components/app-assets/fonts/icomoon.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>components/app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>components/app-assets/vendors/css/extensions/pace.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>components/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>components/app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>components/app-assets/css/colors.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>components/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>components/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>components/app-assets/css/pages/error.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $base_url;?>components/assets/css/style.css">
    <!-- END Custom CSS-->
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column  blank-page blank-page">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1">
    <div class="card-header bg-transparent no-border pb-0">
        <h2 class="error-code text-xs-center mb-2"><?php echo substr($heading, 0, 3); ?></h2>
        <h3 class="text-uppercase text-xs-center"><?php echo $message; ?></h3>
    </div>
    <div class="card-body collapse in">
        <div class="row py-2">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <a href="<?php echo $base_url; ?>" class="btn btn-primary btn-block font-small-3"><i class="icon-home4"></i> Back to Home</a>
            </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="<?php echo $base_url;?>components/app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo $base_url;?>components/app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
    <script src="<?php echo $base_url;?>components/app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo $base_url;?>components/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo $base_url;?>components/app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
    <script src="<?php echo $base_url;?>components/app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
    <script src="<?php echo $base_url;?>components/app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="<?php echo $base_url;?>components/app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
    <script src="<?php echo $base_url;?>components/app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="<?php echo $base_url;?>components/app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="<?php echo $base_url;?>components/app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
  </body>
</html>
