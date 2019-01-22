<?php
    if (isset($this->session->userdata['logged_in'])) {
        $username = ($this->session->userdata['logged_in']['username']);
        $level = $this->session->userdata['logged_in']['level'];
    } else {
        redirect(base_url());
    }
?>

<!-- main menu-->
<div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
  <!-- main menu content-->
  <div class="main-menu-content">
    <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
      <li class=" navigation-header"><span data-i18n="nav.category.support">Main Menu</span><i data-toggle="tooltip" data-placement="right" data-original-title="Main Menu" class="icon-ellipsis icon-ellipsis"></i>

      <li class="<?php if($this->uri->segment(1)=="homes"){echo "active";} ?> nav-item"><a href="<?php echo base_url('homes/dashboard');?>"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Dashboard</span></a>
      </li>

      <li class=" navigation-header"><span data-i18n="nav.category.support">Data</span><i data-toggle="tooltip" data-placement="right" data-original-title="Data" class="icon-ellipsis icon-ellipsis"></i>

      <li class="<?php if($this->uri->segment(3)=="vpelanggan"){echo "active";} ?> nav-item"><a href="<?php echo base_url('v/data/vpelanggan');?>"><i class="icon-paper-stack"></i><span data-i18n="nav.dash.main" class="menu-title">Data Pelanggan</span></a>
      </li>

      <li class="<?php if($this->uri->segment(3)=="vtunggakan"){echo "active";} ?> nav-item"><a href="<?php echo base_url('v/data/vtunggakan');?>"><i class="icon-data"></i><span data-i18n="nav.dash.main" class="menu-title">Data Tunggakan</span></a>
      </li>
      
      <?php if($level == 'ADMIN' || $level == 'ROOT') { ?>      
      <li class="<?php if($this->uri->segment(3)=="vunits"){echo "active";} ?> nav-item"><a href="<?php echo base_url('v/addons/vunits');?>"><i class="icon-paper"></i><span data-i18n="nav.icons.main" class="menu-title">Data Units</span></a>
      </li>

      <li class=" navigation-header"><span data-i18n="nav.category.support">Users</span><i data-toggle="tooltip" data-placement="right" data-original-title="Users" class="icon-ellipsis icon-ellipsis"></i>

      <li class="<?php if($this->uri->segment(3)=="vpetugas"){echo "active";} ?> nav-item"><a href="<?php echo base_url('v/priv/vpetugas');?>"><i class="icon-user1"></i><span data-i18n="nav.dash.main" class="menu-title">Data Petugas/Akun</span></a>
      </li>

      <li class="<?php if($this->uri->segment(3)=="vpegawai"){echo "active";} ?> nav-item"><a href="<?php echo base_url('v/priv/vpegawai');?>"><i class="icon-users"></i><span data-i18n="nav.dash.main" class="menu-title">Data Pegawai</span></a>
      </li>

      <li class=" navigation-header"><span data-i18n="nav.category.support">Additional</span><i data-toggle="tooltip" data-placement="right" data-original-title="Additional" class="icon-ellipsis icon-ellipsis"></i>

      <li class="<?php if($this->uri->segment(3)=="vmaps"){echo "active";} ?> nav-item"><a href="<?php echo base_url('v/addons/vmaps');?>"><i class="icon-map6"></i><span data-i18n="nav.dash.main" class="menu-title">Google Maps API</span></a>
      </li>
      <?php } ?>

      <!--li class="<?php if($this->uri->segment(2)=="data"){echo "active";} ?> nav-item"><a href="#"><i class="icon-data"></i><span data-i18n="nav.icons.main" class="menu-title">Data</span></a>
        <ul class="menu-content">
          <li class="<?php if($this->uri->segment(3)=="vtunggakan"){echo "active";} ?>"><a href="<?php echo base_url('v/data/vtunggakan');?>" data-i18n="nav.icons.icons_feather" class="menu-item">Data Tunggakan</a>
          </li>
          <li class="<?php if($this->uri->segment(3)=="vpelanggan"){echo "active";} ?>"><a href="<?php echo base_url('v/data/vpelanggan');?>" data-i18n="nav.icons.icons_ionicons" class="menu-item">Data Pelanggan</a>
          </li>
        </ul>
      </li-->

      <?php if($level == 'ADMIN' || $level == 'ROOT') { ?>
        <!--li class="<?php if($this->uri->segment(2)=="forms"){echo "active";} ?> nav-item"><a href="#"><i class="icon-user1"></i><span data-i18n="nav.icons.main" class="menu-title">Pengguna</span></a>
          <ul class="menu-content">
            <li class="<?php if($this->uri->segment(3)=="vpetugas"){echo "active";} ?>"><a href="<?php echo base_url('v/priv/vpetugas');?>" data-i18n="nav.icons.icons_feather" class="menu-item">Data Petugas/Akun</a>
            </li>
            <li class="<?php if($this->uri->segment(3)=="vpegawai"){echo "active";}?>"><a href="<?php echo base_url('v/priv/vpegawai');?>" data-i18n="nav.icons.icons_ionicons" class="menu-item">Data Pegawai</a>
            </li>
          </ul>
        </li-->
      <?php } ?>

    <!-- /.Main Menu Navigation -->
    </ul>
  <!-- /.Main Menu Content -->
  </div>
<!-- /.Main Menu -->
</div>
