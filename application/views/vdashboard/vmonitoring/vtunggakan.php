<div class="app-content content container-fluid">
    <div class="content-wrapper">

        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title">Data Tunggakan</h2>
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
                            <label>WILAYAH</label>
                            <select id="fm_wil" name="fm_wil" class="form-control">
                              <option value="1" selected disabled>-- Pilih --</option>
                              <option value="KSKT">KALIMANTAN SELATAN DAN KALIMANTAN TENGAH</option>
                            </select>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>AREA</label>
                                <select id="fm_area" name="fm_unitap" class="form-control" disabled>
                                  <option value="1" selected disabled>-- Pilih --</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>RAYON</label>
                                <select id="fm_rayon" name="fm_unitup" class="form-control" disabled>
                                  <option value="1" selected disabled>-- Pilih --</option>
                                </select>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label>LEMBAR</label>
                                <select name="fm_stats" id="fm_stats" class="form-control" disabled>
                                  <option value="" selected>SEMUA</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">>3</option>
                                </select>
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                              <label>KOGOL</label>
                                <select name="fm_kogols" id="fm_kogols" class="form-control" disabled>
                                  <option value="" selected>SEMUA</option>
                                  <option value="0">0</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">3</option>
                                  <option value="4">4</option>
                                </select>
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                <label>KALI TGK</label>
                                <select name="fm_kalitgk" id="fm_kalitgk" class="form-control" disabled>
                                  <option value="" selected>SEMUA</option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                  <option value="3">>3</option>
                                </select>
                              </div>
                            </div>

                          </div>
                        </div>

                        <div class="form-actions" style="padding-bottom: 0; margin-top: 0;">
                          <button type="submit" class="btn btn-primary" id="btn_cari" disabled>
                            <i class="icon-search"></i> Cari
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6" >
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
                    <div class="card-block">
                        <div class="form-body">
                          <div class="form-group">
                            <button class="btn btn-primary" data-target="#insTgk" data-toggle="modal" onClick="$('#fm_inputtgk')[0].reset();$('#fm_edittgk')[0].reset();"><i class="icon-plus"></i> Tambah</button>
                            <!--button class="btn btn-primary" data-target="#impTgk" data-toggle="modal"><i class="icon-plus"></i> Import XLS</button-->
                            <button class="btn btn-primary" data-target="#impTgkD" data-toggle="modal"><i class="icon-plus"></i> Import CSV/TXT</button>
                            <?php if($this->session->userdata['logged_in']['level'] == 'ADMIN') { ?>
                            <button class="btn btn-primary" data-target="#DelTgkAll" data-toggle="modal"><i class="icon-trash2"></i> Hapus Data</button>
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
                      <div class="row">
                        <button id="btn_mcetak" class="btn btn-success form-group" data-target="#fm_mcetak" data-toggle="modal" style="margin-left: 15px;">Cetak </button>
                        <!--button id="btn_mhapus" class="btn btn-success form-group" data-target="#fm_mhapus" data-toggle="modal" style="margin-left: 15px;">Hapus </button-->
                      </div>
                      <table id="tabletgk" class="table table-bordered">
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
                            <th class="vert-mid" width="220">ALAMAT</th>
                            <th class="vert-mid">LEMBAR</th>
                            <th class="vert-mid">RPPTL</th>
                            <th class="vert-mid">RPBPJU</th>
                            <th class="vert-mid">RPPPN</th>
                            <th class="vert-mid">RPMAT</th>
                            <th class="vert-mid">TAGSUS</th>
                            <th class="vert-mid">UJL</th>
                            <th class="vert-mid">BP</th>
                            <th class="vert-mid">TRAFO</th>
                            <th class="vert-mid">SEWATRAFO</th>
                            <th class="vert-mid">SEWAKAP</th>
                            <th class="vert-mid">RPTAG</th>
                            <th class="vert-mid">RPBK</th>
                            <th class="vert-mid" width="80">BULAN</th>
                            <th class="vert-mid">KALI TGK</th>
                            <th class="vert-mid" width="150">OPSI</th>
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
<div class="modal fade text-xs-left col-lg-2 offset-lg-5 col-md-3 offset-md-5 col-xs-8 offset-xs-2" id="deletetgk" tabindex="-1" role="dialog" aria-labelledby="modaldeletetgk" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title text-text-bold-600" id="modaldeletetgk">Konfirmasi Hapus</label>
            </div>
            <form class="form-horizontal" id="fm_deltgk">
                <div class="modal-body">
                    <h6>Yakin Menghapus?</h6>
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
<!-- Modal Hapus DataTables -->
<div class="modal fade text-xs-left col-lg-2 offset-lg-5 col-md-3 offset-md-5 col-xs-8 offset-xs-2" id="DelTgkAll" tabindex="-1" role="dialog" aria-labelledby="modaldeltgkall" aria-hidden="true">
    <div class="modal-dialog alert-danger white" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <label class="modal-title text-text-bold-600" id="modaldeltgkall">Konfirmasi Hapus</label>
            </div>
            <form class="form-horizontal" id="fm_deltgkall">
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

  <!-- Modal -->
    <div class="modal fade text-xs-left col-lg-12 col-xs-12" id="insTgk" tabindex="-1" role="dialog" aria-labelledby="modalInsTgk" aria-hidden="true">
      <div class="modal-lg modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <label class="modal-title text-text-bold-600" id="modalInsTgk">Tambah Data</label>
          </div>
          <form class="form" action="" id="fm_inputtgk">
            <div class="modal-body">

              <!-- Start Form -->
                <div class="form-body">
              <section class="col-md-6">
                <div class="form-group">
                  <label for="fm_idpel">IDPEL</label>
                  <select class="form-control" id="fm_idpel_mod" name="fm_idpel_tgk" style="width: 100% !important;">
                  </select>
                </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>LEMBAR</label>
                        <input type="number" class="form-control" placeholder="LEMBAR" min="0" name="fm_lembar">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>RPPTL</label>
                        <input type="number" class="form-control" placeholder="RPPTL" min="0" name="fm_rpptl">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>RPBPJU</label>
                        <input type="number" class="form-control" placeholder="RPBPJU" min="0" name="fm_rpbpju">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>RPPPN</label>
                        <input type="number" class="form-control" placeholder="RPPPN" min="0" name="fm_rpppn">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>RPMAT</label>
                        <input type="number" id="" class="form-control" placeholder="RPMAT" min="0" name="fm_rpmat">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>TAGSUS</label>
                        <input type="number" class="form-control" placeholder="TAGSUS" min="0" name="fm_tagsus">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>UJL</label>
                        <input type="number" class="form-control" placeholder="UJL" min="0" name="fm_ujl">
                      </div>
                    </div>
                  </div>
              </section>

              <section class="col-md-6">
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>BP</label>
                        <input type="number" class="form-control" placeholder="BP" min="0" name="fm_bp">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>TRAFO</label>
                        <input type="number" class="form-control" placeholder="TRAFO" min="0" name="fm_trafo">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>SEWATRAFO</label>
                        <input type="number" class="form-control" placeholder="SEWATRAFO" min="0" name="fm_sewatrafo">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>SEWAKAP</label>
                        <input type="number" class="form-control" placeholder="SEWAKAP" min="0" name="fm_sewakap">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>RPTAG</label>
                        <input type="number" class="form-control" placeholder="RPTAG" min="0" name="fm_rptag">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>RPBK</label>
                        <input type="number" class="form-control" placeholder="RPBK" min="0" name="fm_rpbk">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>TANGGAL</label>
                        <input type="text" class="form-control" placeholder="TANGGAL (e.g. 201901)" name="fm_tanggal" name="fm_tanggal" value="<?php echo date('Ym')?>">
                      </div>
                    </div>
                    <!--div class="col-md-12">
                      <div class="form-group">
                        <label>KALI TUNGGAKAN</label>
                        <input type="number" class="form-control" placeholder="KALI TUNGGAKAN" name="fm_kalitgk" name="fm_kalitgk">
                      </div>
                    </div-->
                  </div>
                </div>
              </section>
              </div>
              <!-- End Form -->

            </div>
            <div class="modal-footer">
              <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal" onclick="$('#fm_inputtgk')[0].reset();">Tutup</button>
              <button type="submit" class="btn btn-outline-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- /.Modal -->

    <!-- Modal Edit -->
    <div class="modal fade text-xs-left col-lg-12 col-xs-12" id="modal_EditTgk" tabindex="-1" role="dialog" aria-labelledby="modalEditTgk" aria-hidden="true">
      <div class="modal-lg modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <label class="modal-title text-text-bold-600" id="modalEditTgk">Edit Data</label>
          </div>
          <form class="form" action="" id="fm_edittgk">
            <div class="modal-body">

              <!-- Start Form -->
                <div class="form-body">
              <section class="col-md-6">
                <input type="number" name="fm_idtgk_e" readonly hidden>
                <div class="form-group">
                  <label for="fm_idpel">IDPEL</label>
                  <input type="number" id="fm_idpel_e" class="form-control" placeholder="ID PELANGGAN" name="fm_idpel_e" min="0" disabled>
                </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>LEMBAR</label>
                        <input type="number" class="form-control" placeholder="LEMBAR" min="0" name="fm_lembar">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>RPPTL</label>
                        <input type="number" class="form-control" placeholder="RPPTL" min="0" name="fm_rpptl">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>RPBPJU</label>
                        <input type="number" class="form-control" placeholder="RPBPJU" min="0" name="fm_rpbpju">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>RPPPN</label>
                        <input type="number" class="form-control" placeholder="RPPPN" min="0" name="fm_rpppn">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>RPMAT</label>
                        <input type="number" class="form-control" placeholder="RPMAT" min="0" name="fm_rpmat">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>TAGSUS</label>
                        <input type="number" class="form-control" placeholder="TAGSUS" min="0" name="fm_tagsus">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>UJL</label>
                        <input type="number" class="form-control" placeholder="UJL" min="0" name="fm_ujl">
                      </div>
                    </div>
                  </div>
              </section>

              <section class="col-md-6">
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>BP</label>
                        <input type="number" class="form-control" placeholder="BP" min="0" name="fm_bp">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>TRAFO</label>
                        <input type="number" class="form-control" placeholder="TRAFO" min="0" name="fm_trafo">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>SEWATRAFO</label>
                        <input type="number" class="form-control" placeholder="SEWATRAFO" min="0" name="fm_sewatrafo">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>SEWAKAP</label>
                        <input type="number" class="form-control" placeholder="SEWAKAP" min="0" name="fm_sewakap">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>RPTAG</label>
                        <input type="number" class="form-control" placeholder="RPTAG" min="0" name="fm_rptag">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>RPBK</label>
                        <input type="number" class="form-control" placeholder="RPBK" min="0" name="fm_rpbk">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>TANGGAL</label>
                        <input type="text" class="form-control" placeholder="TANGGAL (e.g. 201901)" name="fm_tanggal" name="fm_tanggal">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>KALI TUNGGAKAN</label>
                        <input type="text" class="form-control" placeholder="KALI TUNGGAKAN" name="fm_kalitgk" name="fm_kalitgk">
                      </div>
                    </div>
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

    <!-- Modal -->
    <div class="modal fade text-xs-left col-lg-4 offset-lg-4 col-md-5 offset-md-4 col-xs-12 offset-xs-0" id="impTgk" tabindex="-1" role="dialog" aria-labelledby="modalImpTgk" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title text-text-bold-600" id="modalImpTgk">Import Excel XLS <i>(Slow)</i></label>
                </div>
                <form class="form-horizontal" id="ImpExcel" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="file" class="form-control" id="importexcel" name="importexc" accept="application/vnd.ms-excel" required>
                        <div class="form-group"><span style="font-size: 10px;">Supported format: <b>.xls</b></span></div>
                        <div class="form-group mb-0">
                          <span class="form-control">Format Upload:
                            <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary" id="exc-format">Download</a>
                          </span>
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

    <!-- Modal -->
    <div class="modal fade text-xs-left col-lg-4 offset-lg-4 col-md-5 offset-md-4 col-xs-12 offset-xs-0" id="fm_mcetak" tabindex="-1" role="dialog" aria-labelledby="modalmcetak" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title text-text-bold-600" id="modalmcetak">Cetak Data</label>
                </div>
                <!--form class="form-horizontal" id="fm_cetaklembar"-->
                    <div class="modal-body">
                      <div class="form-group">
                        <label>PEGAWAI / PEJABAT</label>
                        <select class="form-control" id="idnama-pegawai" name="nama-pegawai" style="width: 100% !important;">
                          <option value="" data-id="" selected disabled>-- Pilih --</option>
                          <?php foreach ($dt_pegawai->result_array() as $key => $pg) : ?>
                            <option value="<?php echo $pg['NAMA']; ?>" data-id="<?php echo $pg['JABATAN']; ?>"><?php echo $pg['NAMA']; echo '&nbsp;-&nbsp; '; echo '['.$pg['JABATAN'].']'; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>JABATAN</label>
                        <input type="text" class="form-control" id="jabatan-pegawai" placeholder="JABATAN" name="new-jabatan" readonly>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>NOMOR</label>
                            <input type="text" class="form-control" id="nomor-surat" placeholder="NOMOR" name="new-nomorsrt">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>KD. KEDUDUKAN</label>
                            <input type="text" class="form-control" id="kd-kedudukan" placeholder="KD KEDUDUKAN" name="new-kedudukan">
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div id="accorMan" role="tablist" aria-multiselectable="true">
                          <div class="card" style="margin-bottom: 0;">
                            <div id="heading1"  class="card-header">
                              <a data-toggle="collapse" id="override_def" data-parent="#accorMan" href="#accorMn" aria-expanded="true" aria-controls="accorMn" class="card-title lead">Isi Data Manual</a>
                            </div>
                            <div id="accorMn" role="tabpanel" aria-labelledby="heading1" class="card-collapse collapse" aria-expanded="false">
                              <div class="card-body">
                                <div class="card-block">
                                
                                <div class="row">
                                  <div class="col-md-7">
                                    <div class="form-group">
                                      <label>BULAN AWAL</label>
                                      <input type="text" name="new-bulan" id="bln-awal" class="form-control" placeholder="BULAN AWAL (e.g. Januari 2019)">
                                    </div>
                                  </div>

                                  <div class="col-md-5">
                                    <div class="form-group">
                                      <label>LEMBAR</label>
                                      <input type="number" name="new-lembar" id="new-lembar" class="form-control" placeholder="LEMBAR" min="1">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-7">
                                    <label>BULAN AKHIR</label>
                                    <input type="text" name="new-bulanakhir" id="bln-akhir" class="form-control" placeholder="BULAN AKHIR (e.g. <?php setlocale(LC_ALL, 'IND'); echo strftime("%B %Y", strtotime(date('F Y'))); ?>)">
                                  </div>
                                </div>

                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                      </div>

                      <?php if ($this->agent->browser() == 'Firefox') { ?>
                      <div class="form-group">
                        <p class="red" style="font-size: 10px; text-align: center;">Anda menggunakan <b><?=$this->agent->browser();?></b> <br>Tekan tombol/logo print ketika halaman baru terbuka!</p>
                      </div>
                      <?php } ?>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                        <button id="btn_cetaklembar" class="btn btn-outline-primary">Cetak</button>
                    </div>
                <!--/form-->
            </div>
        </div>
    </div>
    <!-- /.Modal -->

    <!-- Modal -->
    <div class="modal fade text-xs-left col-lg-4 offset-lg-4 col-md-5 offset-md-4 col-xs-12 offset-xs-0" id="impTgkD" tabindex="-1" role="dialog" aria-labelledby="modalImpTgkD" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="modal-title text-text-bold-600" id="modalImpTgkD">Import CSV / TXT</label>
                </div>
                <form class="form-horizontal" id="ImpExcelD" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="file" class="form-control" id="importexceld" name="importexcd" accept=".csv,.txt" required>
                        <div class="form-group"><span style="font-size: 10px;"></span></div>
                        <div class="form-group mb-0">
                          <span class="form-control">Format Upload (Save As .CSV/.TXT): 
                            <a href="javascript:void(0)" class="btn btn-sm btn-outline-primary" id="csv-format">Download</a><br>
                            <span><i>.CSV = Comma Delimited </i></span><br>
                            <span><i>.TXT = Tab Delimited </i></span><br>
                          </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <span class="text-xs-center red" id="imp-msg" style="float: left;"></span>
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
