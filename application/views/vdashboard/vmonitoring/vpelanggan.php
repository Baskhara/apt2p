<div class="app-content content container-fluid">
    <div class="content-wrapper">

        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Data Pelanggan</h2>
          </div>
        </div>
        <!-- Basic form layout section start -->
        <div class="content-body">
          <section id="basic-form-layouts">
            <div class="row">
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">Kategori</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                      <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body collapse in">
                    <div class="card-block">
                      <form class="form" action="" id="searchForm">
                        <div class="form-body">
                          <div class="form-group">
                            <label for="fm_wil">WILAYAH</label>
                            <select id="fm_wil" name="fm_wil" class="form-control">
                              <option value="1" selected disabled>-- Pilih --</option>
                              <option value="KSKT">KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</option>
                            </select>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="fm_area">AREA</label>
                                <select id="fm_area" name="fm_unitap" class="form-control" disabled>
                                  <option value="1" selected disabled>-- Pilih --</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="fm_rayon">RAYON</label>
                                <select id="fm_rayon" name="fm_unitup" class="form-control" disabled>
                                  <option value="1" selected disabled>-- Pilih --</option>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="form-actions" style="padding-bottom: 0; margin-top: 0;">
                          <button type="submit" class="btn btn-primary" id="btn_plgcari" disabled>
                            <i class="icon-search"></i> Cari
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">Opsi</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                      <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-body collapse in">
                    <div class="card-block" style="padding-bottom: 15px;">
                        <div class="form-body">
                          <div class="form-group">
                            <button class="btn btn-primary" data-target="#insPlg" data-toggle="modal" onClick="$('#fm_inputplg')[0].reset();$('#fm_updateplg')[0].reset();"><i class="icon-plus"></i> Tambah</button>
                            <?php if($this->session->userdata['logged_in']['level'] == 'ADMIN') { ?>
                            <button class="btn btn-primary" data-target="#DelPlgAll" data-toggle="modal"><i class="icon-plus"></i> Hapus Data</button>
                            <?php } ?>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              
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
                  <div class="card-body collapse in">
                    <div class="card-block">
                      <table id="tableplg" class="table table-bordered">
                        <thead>
                          <tr>
                            <th class="vert-mid">KOORD</th>
                            <th class="vert-mid">UNITAP</th>
                            <th class="vert-mid">UNITUP</th>
                            <th class="vert-mid" width="80">IDPEL</th>
                            <th class="vert-mid" width="200">NAMA</th>
                            <th class="vert-mid">TARIF</th>
                            <th class="vert-mid">DAYA</th>
                            <th class="vert-mid">KOGOL</th>
                            <th class="vert-mid">GARDU</th>
                            <th class="vert-mid" width="240">ALAMAT</th>
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
<div class="modal fade text-xs-left col-lg-2 offset-lg-5 col-md-3 offset-md-5 col-xs-8 offset-xs-2" id="deleteplg" tabindex="-1" role="dialog" aria-labelledby="modaldeleteplg" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title text-text-bold-600" id="modaldeleteplg">Konfirmasi Hapus</label>
            </div>
            <form class="form-horizontal" id="fm_delplg">
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
    <div class="modal fade text-xs-left col-xs-12" id="insPlg" tabindex="-1" role="dialog" aria-labelledby="modalInsPlg" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <label class="modal-title text-text-bold-600" id="modalInsPlg">Tambah Data</label>
          </div>
          <form class="form" action="" id="fm_inputplg">
            <div class="modal-body">

              <!-- Start Form -->
                <div class="form-body">
                <section class="col-md-6">
                  <div class="form-group">
                    <label for="fm_idpel_in">IDPEL</label>
                    <input type="number" id="fm_idpel_in" class="form-control" placeholder="ID PELANGGAN" name="fm_idpel_in" min="0" list="list_idpel">
                    <datalist id="list_idpel">
                      <?php foreach ($dt_customer as $key => $custs) : ?>
                        <option value="<?php echo $custs['IDPEL'] ?>"><?php echo $custs['NAMA']; ?></option>
                      <?php endforeach; ?>
                    </datalist>
                  </div>
                  <div class="form-group">
                    <label>NAMA PELANGGAN</label>
                    <input type="text" class="form-control" placeholder="NAMA PELANGGAN" name="fm_namapel">
                  </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>ALAMAT</label>
                          <textarea class="form-control" name="fm_alamat" rows="6" placeholder="ALAMAT PELANGGAN"></textarea>
                        </div>
                      </div>
                    </div>
                </section>
                <section class="col-md-6">
                  <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                      <label for="fm_wil_mod">WILAYAH</label>
                      <select id="fm_wil_mod" name="fm_wil" class="form-control">
                        <option value="1" selected disabled>-- Pilih --</option>
                        <option value="KSKT">KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</option>
                      </select>
                    </div>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="fm_area_mod">AREA</label>
                          <select id="fm_area_mod" name="fm_unitap" class="form-control">
                            <option value="1" selected disabled>-- Pilih --</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="fm_rayon_mod">RAYON</label>
                          <select id="fm_rayon_mod" name="fm_unitup" class="form-control">
                            <option value="1" selected disabled>-- Pilih --</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>TARIF</label>
                          <select class="form-control" name="fm_tarif">
                            <option value="1" selected disabled>-- Pilih --</option>
                            <option value="B1">B1</option>
                            <option value="B2">B2</option>
                            <option value="B3">B3</option>
                            <option value="I1">I1</option>
                            <option value="I2">I2</option>
                            <option value="P1">P1</option>
                            <option value="P2">P2</option>
                            <option value="P3">P3</option>
                            <option value="R1">R1</option>
                            <option value="R1M">R1M</option>
                            <option value="R1MT">R1MT</option>
                            <option value="R1T">R1T</option>
                            <option value="R2">R2</option>
                            <option value="R3">R3</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>DAYA</label>
                          <input type="number" class="form-control" placeholder="DAYA" name="fm_daya" min="0">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label >KOGOL</label>
                          <select name="fm_kogol" id="fm_kogol" class="form-control">
                            <option value="" selected disabled>-- Pilih --</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>GARDU</label>
                          <input type="number" class="form-control" placeholder="GARDU" name="fm_gardu" min="0">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label >KOORDX</label>
                          <input type="text" class="form-control" placeholder="X Koordinat" name="fm_koordx">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>KOORDY</label>
                          <input type="text" class="form-control" placeholder="Y Koordinat" name="fm_koordy">
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

    <?php if($this->session->userdata['logged_in']['level'] == 'ADMIN') { ?>
    <!-- Modal Hapus DataTables -->
    <div class="modal fade text-xs-left col-lg-2 offset-lg-5 col-md-3 offset-md-5 col-xs-8 offset-xs-2" id="DelPlgAll" tabindex="-1" role="dialog" aria-labelledby="modaldelplgall" aria-hidden="true">
        <div class="modal-dialog alert-danger white" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title text-text-bold-600" id="modaldelplgall">Konfirmasi Hapus</label>
                </div>
                <form class="form-horizontal" id="fm_delplgall">
                    <div class="modal-body">
                        <h6>Hapus semua data?</h6>
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
    <?php } ?>

    <!-- Modal Edit DataTables -->
    <div class="modal fade text-xs-left col-lg-12 col-xs-12" id="modal_editplg" tabindex="-1" role="dialog" aria-labelledby="modaleditplg" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title text-text-bold-600" id="modaleditplg">Edit Data</label>
                </div>
                <form class="form-horizontal" action="" id="fm_updateplg">
                    <div class="modal-body">

                      <div class="form-body">
                        <section class="col-md-6">
                          <div class="form-group">
                            <label for="fm_idpel">IDPEL</label>
                            <input type="number" id="fm_idpel_e" class="form-control" placeholder="ID PELANGGAN" name="fm_idpel_e" value="" list="list_idpel" readonly>
                            <datalist id="list_idpel">
                              <?php foreach ($dt_customer as $key => $custs) : ?>
                                <option value="<?php echo $custs['IDPEL'] ?>"><?php echo $custs['NAMA']; ?></option>
                              <?php endforeach; ?>
                            </datalist>
                          </div>
                          <div class="form-group">
                            <label>NAMA PELANGGAN</label>
                            <input type="text" class="form-control" placeholder="NAMA PELANGGAN" name="fm_namapel" value="">
                          </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>ALAMAT</label>
                                  <textarea class="form-control" name="fm_alamat" rows="6" placeholder="ALAMAT PELANGGAN"></textarea>
                                </div>
                              </div>
                            </div>
                        </section>
                        <section class="col-md-6">
                          <div class="row">
                            <div class="col-md-12">
                            <div class="form-group">
                              <label>WILAYAH</label>
                              <select id="fm_wil_e" name="fm_wil" class="form-control">
                                <option value="1" selected disabled>-- Pilih --</option>
                                <option value="KSKT">KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</option>
                              </select>
                            </div>
                            </div>
                          </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>AREA</label>
                                  <select id="fm_area_e" name="fm_unitap" class="form-control">
                                    <option value="1" selected disabled>-- Pilih --</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>RAYON</label>
                                  <select id="fm_rayon_e" name="fm_unitup" class="form-control">
                                    <option value="1" selected disabled>-- Pilih --</option>
                                  </select>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>TARIF</label>
                                  <select class="form-control" id="fm_tarif_e" name="fm_tarif">
                                    <option value="1">-- TARIF --</option>
                                    <option value="B1">B1</option>
                                    <option value="B2">B2</option>
                                    <option value="B3">B3</option>
                                    <option value="I1">I1</option>
                                    <option value="I2">I2</option>
                                    <option value="P1">P1</option>
                                    <option value="P2">P2</option>
                                    <option value="P3">P3</option>
                                    <option value="R1">R1</option>
                                    <option value="R1M">R1M</option>
                                    <option value="R1MT">R1MT</option>
                                    <option value="R1T">R1T</option>
                                    <option value="R2">R2</option>
                                    <option value="R3">R3</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>DAYA</label>
                                  <input type="number" class="form-control" placeholder="DAYA" name="fm_daya" value="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label >KOGOL</label>
                                  <select name="fm_kogol" id="fm_kogols" class="form-control">
                                    <option value="" selected disabled>-- Pilih --</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>GARDU</label>
                                  <input type="number" class="form-control" placeholder="GARDU" name="fm_gardu" value="">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label >KOORDX</label>
                                  <input type="text" class="form-control" placeholder="X Koordinat" name="fm_koordx">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>KOORDY</label>
                                  <input type="text" class="form-control" placeholder="Y Koordinat" name="fm_koordy">
                                </div>
                              </div>
                            </div>
                        </section>

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
    <!-- /.Modal -->

    <!-- Modal Koordinat (GMaps API) -->
    <div class="modal fade text-xs-left" id="modalNavPLG" tabindex="-1" role="dialog" aria-labelledby="modalKoord" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title text-text-bold-600" id="modalKoord">KOORDINAT PELANGGAN</label>
                </div>
                  <div class="modal-body">
                      <div id="map" style="height:400px;"></div>
                  </div>

                  <div class="modal-footer">
                      <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                  </div>
            </div>
        </div>
    </div>
    <!-- /.Modal -->
