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
            <h2 class="content-header-title">Data Maps</h2>
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
                    <h4 class="card-title">Form Data <button class="btn btn-primary" data-target="#modMaps" data-toggle="modal" onClick="$('#fm_edittgk')[0].reset();" style="float: right;"><i class="icon-pencil"></i> Ubah</button></h4>
                  </div>
                  <div class="card-body">
                    <div class="card-block">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label><b>NAMA AKUN</b></label><br>
                            <p class="form-control"><?php echo $NAMA; ?></p>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label><b>EMAIL</b></label><br>
                            <p class="form-control"><?php echo $EMAIL; ?></p>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label><b>AUTHENTICATION KEYS</b></label><br>
                            <p class="form-control"><?php echo $KEYS; ?></p>
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
    <!-- Modal Edit DataTables -->
    <div class="modal fade text-xs-left" id="modMaps" tabindex="-1" role="dialog" aria-labelledby="modEditMaps" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title text-text-bold-600" id="modEditMaps">Edit Data</label>
                </div>
                <form class="form-horizontal" action="" id="fm_updatemaps">
                    <div class="modal-body">
                      <!-- Start Form -->
                      <div class="form-body">
                        <section class="col-xs-12">
                          <div class="form-group">
                            <label>NAMA AKUN</label>
                            <input type="text" class="form-control" placeholder="NAMA" name="new-nama" value="<?php echo $NAMA; ?>" required>
                          </div>

                          <label>EMAIL</label>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="EMAIL" name="new-email" value="<?php echo $EMAIL; ?>" required>
                          </div>

                          <label>AUTHENTICATION KEYS</label>
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="API KEYS" name="new-keys" value="<?php echo $KEYS; ?>" required>
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
