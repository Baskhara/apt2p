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
            <h2 class="content-header-title">Data Pegawai</h2>
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
                    <button class="btn btn-primary mt-1" data-target="#insPegawai" data-toggle="modal" onClick="$('#fm_inputpegawai')[0].reset();$('#fm_updatepegawai')[0].reset();" style="margin-left: 2%;"><i class="icon-plus"></i> Tambah</button>
                  <?php } ?>
                  <div class="card-body collapse in">
                    <div class="card-block">
                      <table id="tablespegawai" class="table table-bordered">
                        <thead>
                          <tr>
                            <th class="vert-mid" width="100">NIP</th>
                            <th class="vert-mid" width="150">NAMA</th>
                            <th class="vert-mid" width="150">ALAMAT</th>
                            <th class="vert-mid">JENIS KELAMIN</th>
                            <th class="vert-mid">JABATAN</th>
                            <th class="vert-mid">EMAIL</th>
                            <th class="vert-mid">TELP</th>
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
<div class="modal fade text-xs-left col-lg-2 offset-lg-5 col-md-3 offset-md-5 col-xs-3 offset-xs-5" id="deletepegawai" tabindex="-1" role="dialog" aria-labelledby="modaldeletepegawai" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title text-text-bold-600" id="modaldeletepegawai">Konfirmasi Hapus</label>
            </div>
            <form class="form-horizontal" id="fm_delpegawai">
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
    <div class="modal fade text-xs-left col-xs-12" id="insPegawai" tabindex="-1" role="dialog" aria-labelledby="modalInsPegawai" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <label class="modal-title text-text-bold-600" id="modalInsPegawai">Tambah Data</label>
          </div>
          <form class="form" action="" id="fm_inputpegawai">
            <div class="modal-body">

              <!-- Start Form -->
              <div class="form-body">
                <section class="col-xs-12">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>NIP</label>
                      <input type="number" id="fm_nip_in" class="form-control" placeholder="NIP" name="fm_nip_in" min="0" autofocus>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <label>NAMA: </label>
                    <div class="form-group">
                      <input type="text" name="new-nama" placeholder="NAMA" class="form-control" required>
                    </div>
                  </div>

                  <div class="col-xs-12">
                    <label>ALAMAT: </label>
                    <div class="form-group">
                      <textarea class="form-control" name="new-alamat" rows="6" placeholder="ALAMAT"></textarea>
                    </div>
                  </div>

                  <div class="col-xs-6">
                    <label>JENIS KELAMIN: </label>
                    <div class="form-group">
                      <select class="form-control" name="new-jk">
                        <option value="0" selected disabled>-- Pilih --</option>
                        <option value="LAKI-LAKI">Laki-Laki</option>
                        <option value="PEREMPUAN">Perempuan</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-xs-6">
                    <label>JABATAN: </label>
                    <div class="form-group">
                      <input type="text" name="new-jabatan" placeholder="JABATAN" class="form-control" required>
                    </div>
                  </div>

                  <div class="col-xs-12">
                    <label>EMAIL: </label>
                    <div class="form-group">
                      <input type="text" name="new-mail" placeholder="EMAIL" class="form-control" required>
                    </div>

                    <label>NO. TELP: </label>
                    <div class="form-group">
                      <input type="number" name="new-telp" placeholder="NOMOR TELEPON" class="form-control" required>
                    </div>

                    <label>WILAYAH: </label>
                    <div class="form-group">
                      <select class="form-control" id="fm_wil" name="new-wil">
                        <option value="0" selected disabled>-- Pilih --</option>
                        <option value="KSKT">KALIMANTAN SELATAN & KALIMANTAN TENGAH</option>
                      </select>
                    </div>
                  </div>

                    <div class="col-xs-6">
                      <label>AREA: </label>
                      <div class="form-group">
                        <select class="form-control" id="fm_area" name="new-area">
                          <option value="0" selected disabled>-- Pilih --</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-xs-6">
                      <label>RAYON: </label>
                      <div class="form-group">
                        <select class="form-control" id="fm_rayon" name="new-rayon">
                          <option value="0" selected disabled>-- Pilih --</option>
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

    <!-- Modal Edit DataTables -->
    <div class="modal fade text-xs-left col-lg-12 col-xs-12" id="modal_editpegawai" tabindex="-1" role="dialog" aria-labelledby="modaleditpegawai" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title text-text-bold-600" id="modaleditpegawai">Edit Data</label>
                </div>
                <form class="form-horizontal" action="" id="fm_updatepegawai">
                    <div class="modal-body">

                      <!-- Start Form -->
              <div class="form-body">
                <section class="col-xs-12">
                  <div class="col-xs-6">
                    <div class="form-group">
                      <label>NIP</label>
                      <input type="number" id="fm_nip_e" class="form-control" placeholder="NIP" name="fm_nip_e" min="0" readonly>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <label>NAMA: </label>
                    <div class="form-group">
                      <input type="text" name="edit-nama" placeholder="NAMA" class="form-control" required autofocus>
                    </div>
                  </div>

                  <div class="col-xs-12">
                    <label>ALAMAT: </label>
                    <div class="form-group">
                      <textarea class="form-control" name="edit-alamat" rows="6" placeholder="ALAMAT"></textarea>
                    </div>
                  </div>

                  <div class="col-xs-6">
                    <label>JENIS KELAMIN: </label>
                    <div class="form-group">
                      <select class="form-control" id="fm_jk" name="edit-jk">
                        <option value="0" selected disabled>-- Pilih --</option>
                        <option value="LAKI-LAKI">Laki-Laki</option>
                        <option value="PEREMPUAN">Perempuan</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-xs-6">
                    <label>JABATAN: </label>
                    <div class="form-group">
                      <input type="text" name="edit-jabatan" placeholder="JABATAN" class="form-control" required>
                    </div>
                  </div>

                  <div class="col-xs-12">
                    <label>EMAIL: </label>
                    <div class="form-group">
                      <input type="text" name="edit-mail" placeholder="EMAIL" class="form-control" required>
                    </div>

                    <label>NO. TELP: </label>
                    <div class="form-group">
                      <input type="number" name="edit-telp" placeholder="NOMOR TELEPON" class="form-control" required>
                    </div>

                    <label>WILAYAH: </label>
                    <div class="form-group">
                      <select class="form-control" id="fm_wil_e" name="edit-wil">
                        <option value="0" selected disabled>-- Pilih --</option>
                        <option value="KSKT">KALIMANTAN SELATAN & KALIMANTAN TENGAH</option>
                      </select>
                    </div>
                  </div>

                    <div class="col-xs-6">
                      <label>AREA: </label>
                      <div class="form-group">
                        <select class="form-control" id="fm_area_e" name="edit-area">
                          <option value="0" selected disabled>-- Pilih --</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-xs-6">
                      <label>RAYON: </label>
                      <div class="form-group">
                        <select class="form-control" id="fm_rayon_e" name="edit-rayon">
                          <option value="0" selected disabled>-- Pilih --</option>
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