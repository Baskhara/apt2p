<?php
  if (isset($this->session->userdata['logged_in'])) {
    // Do nothing
  } else {
    redirect(base_url());
  }
  
  // Check site's category
  if ($this->uri->segment(1) == 'homes') {
    $cats = 'Homes';
  } else if ($this->uri->segment(2) == 'data' || $this->uri->segment(2) == 'priv') {
    $cats = 'Data';
  } else if ($this->uri->segment(2) == 'addons') {
    $cats = 'Extra';
  } else if ($this->uri->segment(2) == 'forms') {
    $cats = 'Forms';
  }

  // Give a title for each sites
  if ($this->uri->segment(2) == 'dashboard') {
    $pgtitle = 'Dashboard';
  } else if ($this->uri->segment(3) == 'vtunggakan') {
    $pgtitle = 'Data Tunggakan';
  } else if ($this->uri->segment(3) == 'vpelanggan') {
    $pgtitle = 'Data Pelanggan';
  } else if ($this->uri->segment(3) == 'vpegawai') {
    $pgtitle = 'Data Pegawai';
  } else if ($this->uri->segment(3) == 'vpetugas') {
    $pgtitle = 'Data Petugas';
  } else if ($this->uri->segment(3) == 'vunits') {
    $pgtitle = 'Data Units';
  } else if ($this->uri->segment(3) == 'vmaps') {
    $pgtitle = 'Google Maps API';
  } else {
    $pgtitle = 'APT2T';
  }
?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="A web application for local use.">
    <meta name="keywords" content="pln, persero, kskt, kalselteng">
    <meta name="author" content="PT. PLN (Persero)">
    <meta name="templates" content="Robust by PIXINVENT">
    <title><?php echo $pgtitle;?></title>
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
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('components/app-assets/css/core/colors/palette-gradient.css');?>">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="<?php //echo base_url('components/app-assets/vendors/js/datatables.net/css/jquery.dataTables.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('components/app-assets/vendors/js/datatables.net-bs/css/dataTables.bootstrap.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('components/app-assets/vendors/js/datatables.net/css/select.dataTables.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('components/app-assets/vendors/js/datatables.net/css/buttons.dataTables.min.css');?>">
    <!-- PrintJS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('components/app-assets/vendors/js/printjs/print.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('components/assets/css/select2/select2.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('components/assets/css/toastr/toastr.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('components/assets/css/style.css');?>">
    <!-- END Custom CSS-->
    <style type="text/css">
      body, html {
        background: #E1E2E1 !important;
      }
    </style>
  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns fixed-navbar">

    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
            <li class="nav-item"><a href="<?php echo base_url();?>" class="navbar-brand nav-link" style="color: #fff;"><img alt="logo-pln" src="<?php echo base_url('components/app-assets/images/ico/favicon.ico');?>" data-expand="<?php echo base_url('components/app-assets/images/ico/logo.png');?>" data-collapse="<?php echo base_url('components/app-assets/images/ico/favicon.ico');?>" class="brand-logo">&nbsp;</a></li>
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5"></i></a></li>
            </ul>
            <ul class="nav navbar-nav float-xs-right">
              
              <li class="dropdown dropdown-user nav-item">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
                  <!--span class="avatar avatar-online">
                    <img src="</?php echo base_url('components/app-assets/images/portrait/small/avatar-s-1.png');?>" alt="avatar"><i></i>
                  </span-->
                  <span class="user-name"><?php echo strtoupper($this->session->userdata['logged_in']['username']);?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                  <a href="javascript:void(0)" class="dropdown-item" id="mod_pass"><i class="icon-head"></i> Ganti Password</a>
                  <div class="dropdown-divider"></div>
                  <a href="<?php echo base_url('v/logout'); ?>" class="dropdown-item"><i class="icon-power3"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- Modal GP -->
    <div class="modal fade text-xs-left col-xs-12 offset-xs-0" id="gantiPass" tabindex="-1" role="dialog" aria-labelledby="modalGantiPass" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <label class="modal-title text-text-bold-600" id="modalGantiPass">Ganti Password</label>
          </div>
          <form action="<?php //echo base_url('logins/changepass');?>" id="fm_gantipass">
            <div class="modal-body">
              <input type="text" name="username" value="<?php echo $this->session->userdata['logged_in']['username'];?>" hidden>
              <label>Password Lama: </label>
              <div class="form-group">
                <input type="password" name="current-password" placeholder="Password Lama" class="form-control" required autofocus autocomplete>
              </div>

              <label>Password Baru: </label>
              <div class="form-group">
                <input type="password" name="new-password" placeholder="Password Baru" class="form-control" required autocomplete>
              </div>

              <label>Konfirmasi Password: </label>
              <div class="form-group">
                <input type="password" name="confirm-password" placeholder="Konfirmasi Password" class="form-control" required autocomplete>
              </div>
            </div>

            <div class="modal-footer">
              <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-outline-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.Modal GP -->

    <!-- Modal Regis -->
    <div class="modal fade text-xs-left col-xs-12 offset-xs-0" id="regis_akun" tabindex="-1" role="dialog" aria-labelledby="modalRegis_Akun" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <label class="modal-title text-text-bold-600" id="modalRegis_Akun">Register Akun</label>
          </div>
          <form action="<?php //echo base_url('logins/changepass');?>" id="fm_register">
            <div class="modal-body">
              <label>Nama: </label>
              <div class="form-group">
                <input type="text" name="" placeholder="Nama" class="form-control" required autofocus autocomplete>
              </div>

              <label>Username: </label>
              <div class="form-group">
                <input type="text" name="" placeholder="Username" class="form-control" required autocomplete>
              </div>

              <label>Password: </label>
              <div class="form-group">
                <input type="password" name="" placeholder="Password" class="form-control" required autocomplete>
              </div>

              <label>Level: </label>
              <div class="form-group">
                <select class="form-control" name="">
                  <option value="0" selected disabled>-- Pilih --</option>
                  <option value="ADMIN">Admin</option>
                  <option value="PETUGAS">Petugas</option>
                </select>
              </div>
            </div>

            <div class="modal-footer">
              <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-outline-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.Modal Regis -->