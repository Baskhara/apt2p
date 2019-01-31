<?php
  if (isset($this->session->userdata['logged_in'])) {
    if ($this->session->userdata['logged_in']['level'] != 'ADMIN') {
      show_404();
    }
  } else {
    redirect(base_url());
  }
?>
<div class="app-content content container-fluid">
    <div class="content-wrapper">

        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Data Petugas / Akun</h2>
          </div>
        </div>
        <!-- Basic form layout section start -->
        <div class="content-body">
          <section id="basic-form-layouts">
            <div class="row">
            <!-- Something Here -->
              
            </div>
          </section>

          <!-- DataTable -->
          <section>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">Data Tables</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                      <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <?php if($this->session->userdata['logged_in']['level'] == 'ADMIN') { ?>
                    <button class="btn btn-primary mt-1" data-target="#insAkun" data-toggle="modal" onClick="$('#fm_inputakun')[0].reset();$('#fm_updateakun')[0].reset();" style="margin-left: 2%;"><i class="icon-plus"></i> Tambah</button>
                  <?php } ?>
                  <div class="card-body collapse in">
                    <div class="card-block">
                      <table id="tablesakun" class="table table-bordered" style="width: 100%;">
                        <thead>
                          <tr>
                            <th class="vert-mid">USERNAME</th>
                            <th class="vert-mid">LEVEL</th>
                            <th class="vert-mid" width="100">NIP</th>
                            <th class="vert-mid">UNITAP</th>
                            <th class="vert-mid">UNITUP</th>
                            <th class="vert-mid" width="150" class="text-xs-center">OPSI</th>
                          </tr>
                        </thead>
                        <tbody id="body1"></tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- /.DataTable -->

        </div>

  </div>
</div>

<!-- Modal Hapus DataTables -->
<div class="modal fade text-xs-left col-lg-2 offset-lg-5 col-md-3 offset-md-5 col-xs-3 offset-xs-5" id="deleteakun" tabindex="-1" role="dialog" aria-labelledby="modaldeleteakun" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title text-text-bold-600" id="modaldeleteakun">Konfirmasi Hapus</label>
            </div>
            <form class="form-horizontal" id="fm_delakun">
                <div class="modal-body">
                    <h6 class="">Yakin Menghapus?</h6>
                </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-outline-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.Modal -->

  <?php if($this->session->userdata['logged_in']['level'] == 'ADMIN') { ?>
  <!-- Modal -->
    <div class="modal fade text-xs-left col-xs-12" id="insAkun" tabindex="-1" role="dialog" aria-labelledby="modalInsAkun" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <label class="modal-title text-text-bold-600" id="modalInsAkun">Tambah Data</label>
          </div>
          <form class="form" action="" id="fm_inputakun">
            <div class="modal-body">

              <!-- Start Form -->
              <div class="form-body">
                <section class="col-xs-12">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>NIP</label>
                      <select class="form-control" id="fm_nip_in" name="fm_nip_in" style="width: 100% !important;">
                        <option value="" data-id="" selected disabled>-- Pilih --</option>
                        <?php foreach ($dt_pegawai->result() as $key => $pg) : ?>
                          <option value="<?php echo $pg->NIP ?>"><?php echo $pg->NIP; echo ' - '; echo $pg->NAMA; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <label>Username: </label>
                    <div class="form-group">
                      <input type="text" name="new-username" placeholder="Username" class="form-control" required autofocus>
                    </div>
                  </div>

                  <div class="col-xs-12">
                    <label>Password: </label>
                    <div class="form-group">
                      <input type="password" name="new-password" placeholder="Password" class="form-control" required autocomplete>
                    </div>

                    <label>Level: </label>
                    <div class="form-group">
                      <select class="form-control" name="new-level">
                        <option value="0" selected disabled>-- Pilih --</option>
                        <option value="ADMIN">Admin</option>
                        <option value="PETUGAS">Petugas</option>
                      </select>
                    </div>
                  </div>
                  
                </section>

                </div>
              <!-- End Form -->

            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-outline-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.Modal -->

    <!-- Modal Edit DataTables -->
    <div class="modal fade text-xs-left col-lg-12 col-xs-12" id="modal_editakun" tabindex="-1" role="dialog" aria-labelledby="modaleditakun" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title text-text-bold-600" id="modaleditakun">Edit Data</label>
                </div>
                <form class="form-horizontal" action="" id="fm_updateakun">
                    <div class="modal-body">

                      <!-- Start Form -->
                      <div class="form-body">
                        <section class="col-xs-12">
                          <div class="col-xs-6">
                            <div class="form-group">
                              <label>NIP</label>
                              <input type="number" id="fm_nip_e" class="form-control" placeholder="NIP" name="new-nip-e" min="0" readonly>
                            </div>
                          </div>
                          <div class="col-xs-6">
                            <label>Username: </label>
                            <div class="form-group">
                              <input type="text" name="new-username" placeholder="Username" class="form-control" required autofocus>
                            </div>
                          </div>

                          <div class="col-xs-12">
                            <label>Password: </label>
                            <div class="form-group">
                              <input type="password" name="new-password" placeholder="Password" class="form-control" autocomplete>
                            </div>

                            <label>Level: </label>
                            <div class="form-group">
                              <select class="form-control" id="fm_lvl_e" name="new-level">
                                <option value="0" selected disabled>-- Pilih --</option>
                                <option value="ADMIN">Admin</option>
                                <option value="PETUGAS">Petugas</option>
                              </select>
                            </div>
                          </div>
                          
                        </section>

                        </div>
                      <!-- End Form -->

                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-outline-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.Modal -->
    <?php } ?>