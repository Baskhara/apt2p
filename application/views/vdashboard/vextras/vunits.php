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
            <h2 class="content-header-title">Data Units</h2>
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
            <div class="row match-height">
              <div class="col-xs-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title">Data Tables</h4>
                  </div>
                  <div class="card-body">
                    <div class="card-block">
                      <ul class="nav nav-tabs nav-justified">
                        <li class="nav-item">
                          <a class="nav-link active" id="active-tab" data-toggle="tab" href="#area-tabs" aria-controls="active" aria-expanded="true">AREA</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="link-tab" data-toggle="tab" href="#rayon-tabs" aria-controls="link" aria-expanded="false">RAYON</a>
                        </li>
                      </ul>
                      <div class="tab-content px-1 pt-1">
                        <div role="tabpanel" class="tab-pane fade active in" id="area-tabs" aria-labelledby="active-tab" aria-expanded="true">
                          <?php if($this->session->userdata['logged_in']['level'] == 'ADMIN') { ?>
                            <button class="btn btn-primary mt-1" data-target="#insArea" data-toggle="modal" onClick="$('#fm_inputarea')[0].reset();$('#fm_updatearea')[0].reset();" style="margin-left: 2%;"><i class="icon-plus"></i> Tambah</button>
                          <?php } ?>
                          <div class="card-body collapse in">
                            <div class="card-block">
                              <table id="tablesarea" class="table table-bordered" style="width: 100%">
                                <thead>
                                  <tr>
                                    <th class="vert-mid">UNITAP</th>
                                    <th class="vert-mid">WILAYAH</th>
                                    <th class="vert-mid">NAMA</th>
                                    <th class="vert-mid" width="150" class="text-xs-center">OPSI</th>
                                  </tr>
                                </thead>
                                <tbody id="body1"></tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane fade" id="rayon-tabs" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
                          <?php if($this->session->userdata['logged_in']['level'] == 'ADMIN') { ?>
                            <div class="col-xs-3 mt-1 pr-0">
                              <select id="choose_area" name="new-area" class="form-control">
                                <option value="NULL" selected disabled>-- Pilih Area --</option>
                                <?php foreach($dt_area->result() as $key => $ar) : ?>
                                  <option value="<?php echo $ar->UNITAP; ?>"><?php echo $ar->UNITAP; ?> - <?php echo $ar->NAMA; ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>

                            <button class="btn btn-primary mt-1" data-target="#insRayon" data-toggle="modal" onClick="$('#fm_inputrayon')[0].reset();$('#fm_updaterayon')[0].reset();" style="margin-left: 2%;"><i class="icon-plus"></i> Tambah</button>
                          <?php } ?>
                          <div class="card-body collapse in">
                            <div class="card-block">
                              <table id="tablesrayon" class="table table-bordered" style="width: 100%">
                                <thead>
                                  <tr>
                                    <th class="vert-mid">UNITUP</th>
                                    <th class="vert-mid">RAYON</th>
                                    <th class="vert-mid">UNITAP</th>
                                    <th width="150" class="text-xs-center">OPSI</th>
                                  </tr>
                                </thead>
                                <tbody id="body1"></tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
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

  <?php if($this->session->userdata['logged_in']['level'] == 'ADMIN') { ?>
  <!-- Modal Hapus DataTables -->
  <div class="modal fade text-xs-left col-lg-2 offset-lg-5 col-md-3 offset-md-5 col-xs-3 offset-xs-5" id="deleteunit" tabindex="-1" role="dialog" aria-labelledby="modaldeleteunit" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <label class="modal-title text-text-bold-600" id="modaldeleteunit">Konfirmasi Hapus</label>
              </div>
              <form class="form-horizontal" id="fm_delunit">
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

  <!-- Modal -->
    <div class="modal fade text-xs-left" id="insArea" tabindex="-1" role="dialog" aria-labelledby="modalInsArea" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <label class="modal-title text-text-bold-600" id="modalInsArea">Tambah Data</label>
          </div>
          <form class="form" action="" id="fm_inputarea">
            <div class="modal-body">

              <!-- Start Form -->
              <div class="form-body">
                <section class="col-xs-12">
                  <div class="form-group">
                    <label>UNITAP</label>
                    <input type="text" class="form-control" placeholder="UNITAP" name="new-unitap" autofocus required>
                  </div>

                  <label>WILAYAH: </label>
                  <div class="form-group">
                    <select id="fm_wil_in" name="new-wil" class="form-control">
                      <option value="NULL" selected disabled>-- Pilih --</option>
                      <option value="KSKT">KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</option>
                    </select>
                  </div>

                  <label>NAMA AREA: </label>
                  <div class="form-group">
                    <input type="text" name="new-nama" placeholder="NAMA AREA" class="form-control" required>
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
    <div class="modal fade text-xs-left" id="modal_editarea" tabindex="-1" role="dialog" aria-labelledby="modaleditarea" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title text-text-bold-600" id="modaleditarea">Edit Data</label>
                </div>
                <form class="form-horizontal" action="" id="fm_updatearea">
                    <div class="modal-body">
                      <!-- Start Form -->
                      <div class="form-body">
                        <section class="col-xs-12">
                          <div class="form-group">
                            <label>UNITAP</label>
                            <input type="text" class="form-control" placeholder="UNITAP" name="edit-unitap" readonly>
                          </div>

                          <label>WILAYAH: </label>
                          <div class="form-group">
                            <select id="fm_wil_e" name="edit-wil" class="form-control">
                              <option value="NULL" selected disabled>-- Pilih --</option>
                              <option value="KSKT">KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</option>
                            </select>
                          </div>

                          <label>NAMA AREA: </label>
                          <div class="form-group">
                            <input type="text" name="edit-nama" placeholder="NAMA AREA" class="form-control" required>
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

    <!-- RAYON -->
    <!-- Modal -->
    <div class="modal fade text-xs-left " id="insRayon" tabindex="-1" role="dialog" aria-labelledby="modalInsRayon" aria-hidden="true">
      <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <label class="modal-title text-text-bold-600" id="modalInsRayon">Tambah Data</label>
          </div>
          <form class="form" action="" id="fm_inputrayon">
            <div class="modal-body">

              <!-- Start Form -->
              <div class="form-body">
                <section class="col-xs-12">
                  <label>UNITAP: </label>
                  <div class="form-group">
                    <select id="fm_area_ray" name="new-area" class="form-control" required>
                      <option value="1" selected disabled>-- Pilih --</option>
                      <?php foreach($dt_area->result() as $key => $ar) : ?>
                        <option value="<?php echo $ar->UNITAP; ?>"><?php echo $ar->UNITAP; ?> - <?php echo $ar->NAMA; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>UNITUP: </label>
                    <input type="text" class="form-control" placeholder="UNITAP" name="new-unitup" required>
                  </div>

                  <label>NAMA RAYON: </label>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="UNITAP" name="new-rayon" required>
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
    <div class="modal fade text-xs-left" id="modal_editrayon" tabindex="-1" role="dialog" aria-labelledby="modaleditrayon" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title text-text-bold-600" id="modaleditrayon">Edit Data</label>
                </div>
                <form class="form-horizontal" action="" id="fm_updaterayon">
                    <div class="modal-body">
                      <!-- Start Form -->
                      <div class="form-body">
                        <section class="col-xs-12">
                          <label>UNITAP: </label>
                          <div class="form-group">
                            <select id="fm_area_raye" name="edit-area" class="form-control">
                              <option value="1" selected disabled>-- Pilih --</option>
                              <?php foreach($dt_area->result() as $key => $ar) : ?>
                                <option value="<?php echo $ar->UNITAP; ?>"><?php echo $ar->UNITAP; ?> - <?php echo $ar->NAMA; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          
                          <div class="form-group">
                            <label>UNITUP: </label>
                            <input type="text" class="form-control" placeholder="UNITUP" name="edit-unitup" required>
                          </div>

                          <label>NAMA RAYON: </label>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="NAMA RAYON" name="edit-rayon" required>
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
