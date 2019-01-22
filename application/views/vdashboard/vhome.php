<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            
        </div>
        <div class="content-body"><!-- stats -->
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-xs-12">
                    <a href="<?=base_url('v/data/vpelanggan')?>">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="media">
                                        <div class="media-body text-xs-left">
                                            <h3 class="grey darken-3">Data Pelanggan</h3>
                                            <span class="text-muted"> Data</span>
                                        </div>
                                        <div class="media-right media-middle">
                                            <i class="icon-diagram deep-blue font-large-2 float-xs-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-6 col-lg-6 col-xs-12">
                    <a href="<?=base_url('v/data/vtunggakan')?>">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="media">
                                        <div class="media-body text-xs-left">
                                            <h3 class="grey darken-3">Data Tunggakan</h3>
                                            <span class="text-muted"> Data</span>
                                        </div>
                                        <div class="media-right media-middle">
                                            <i class="icon-bag2 deeep-blue font-large-2 float-xs-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <?php if ($this->session->userdata['logged_in']['level'] == 'ADMIN') { ?>
                <div class="col-xl-6 col-lg-6 col-xs-12">
                    <a href="<?=base_url('v/priv/vpetugas')?>">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="media">
                                        <div class="media-body text-xs-left">
                                            <h3 class="grey darken-3">Data Petugas / Akun</h3>
                                            <span class="text-muted"> Pengguna</span>
                                        </div>
                                        <div class="media-right media-middle">
                                            <i class="icon-registration deep-blue font-large-2 float-xs-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-6 col-lg-6 col-xs-12">
                    <a href="<?=base_url('v/priv/vpegawai')?>">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="media">
                                        <div class="media-body text-xs-left">
                                            <h3 class="grey darken-3">Data Pegawai</h3>
                                            <span class="text-muted"> Pengguna</span>
                                        </div>
                                        <div class="media-right media-middle">
                                            <i class="icon-users deep-blue font-large-2 float-xs-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-6 col-lg-6 col-xs-12">
                    <a href="<?=base_url('v/addons/vunits')?>">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="media">
                                        <div class="media-body text-xs-left">
                                            <h3 class="grey darken-3">Data Units</h3>
                                            <span class="text-muted"> Units</span>
                                        </div>
                                        <div class="media-right media-middle">
                                            <i class="icon-house deep-blue font-large-2 float-xs-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-6 col-lg-6 col-xs-12">
                    <a href="<?=base_url('v/addons/vmaps')?>">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-block">
                                    <div class="media">
                                        <div class="media-body text-xs-left">
                                            <h3 class="grey darken-3">Maps API</h3>
                                            <span class="text-muted"> API</span>
                                        </div>
                                        <div class="media-right media-middle">
                                            <i class="icon-map6 deep-blue font-large-2 float-xs-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>

                <!-- /. Row -->
            </div>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->