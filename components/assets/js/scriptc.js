(function(window, document) {
  
  /*
  NOTE:
  ------
  */

  // Login Method
  $('#fm_logins').on('submit', function(e) {
    e.preventDefault();

    var btn = $('#btn_login').text();
    $('#btn_login').attr('disabled', true);
    $('#btn_login').text('');
    $('#btn_login').append(' <img src="'+base_url+'components/app-assets/images/icons/spinner.gif" width="20px" id="login_loading" />');

    setTimeout(function() {
      $.ajax({
        url       : base_url+'logins/user_login_process',
        method    : 'POST',
        dataType  : 'JSON',
        data      : $('#fm_logins').serialize(),
        success   : function(data) {
          if (data.status == 'logged_in') {
            location.href = base_url;
          } else if (data.status == 'error') {
            $('#err_msgs').remove();
            $('#err_msg').append('<div class="alert alert-danger msg" id="err_msgs">Username atau Password salah!</div>');
          }

          $('#login_loading').remove();
          $('#btn_login').append('<i class="icon-unlock2"></i> '+btn);
          $('#btn_login').removeAttr('disabled');
        }
      });
    }, 100);
  });
  // #END# Login Method

  // Change password function
  $('#fm_gantipass').on('submit', function(e) {
    e.preventDefault();
    $.ajax({
      url       : base_url+'logins/changepass',
      method    : 'POST',
      dataType  : 'JSON',
      data      : $('#fm_gantipass').serialize(),
      success   : function(data) {
        if (data.status == 'success') {
          toastr.success('Sukses','Password berhasil diganti!');
          $('#gantiPass').modal('hide');
          $('#fm_gantipass')[0].reset();
        } else if (data.status == 'failed') {
          toastr.error('Gagal','Password gagal diganti!');
        } else if (data.status == 'unmatched') {
          toastr.warning('Cek kembali konfirmasi password!','Konfirmasi password salah!');
          $('input[name=confirm-password]').val('');
        } else if (data.status == 'identical') {
          toastr.warning('Password baru sama dengan Password lama','Password baru tidak boleh sama!');
          $('input[name=new-password]').val('');
          $('input[name=confirm-password]').val('');
        } else if (data.status == 'wrong') {
          toastr.error('Password salah!','Gagal!');
          $('#fm_gantipass')[0].reset();
        }
      }
    });
  });
  // #END# Change password

  // Import Excel function
  $('#ImpExcel').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      url         : base_url+'ctgk/excimports/eximport',
      method      : 'POST',
      data        : new FormData(this),
      contentType : false,
      cache       : false,
      processData : false,
      success     : function(data) {
        $('#importexcel').val('');
        toastr.success('Action Success!');
        setTimeout(function(){
          location.reload();
        }, 300);
      }
    });
  });
  // #END# Import Excel

  // Load Infile CSV/TXT function
  $('#ImpExcelD').on('submit', function(e){
    e.preventDefault();
    $('#imp-msg').append('Jangan ditutup hingga proses selesai!');
    $('button[type=submit]').attr('disabled', true);
    $('button[type=reset]').attr('disabled', true);
    $.ajax({
      url         : base_url+'ctgk/excimports/eximportd',
      method      : 'POST',
      data        : new FormData(this),
      contentType : false,
      cache       : false,
      processData : false,
      success     : function(data) {
        $('#importexceld').val('');
        toastr.success('Action Success!');
        $('#imp-msg').append('');
        $('button[type=submit]').removeAttr('disabled');
        $('button[type=reset]').removeAttr('disabled');
        setTimeout(function(){
          location.reload();
        }, 300);
      }
    });
  });
  // #END# Load Infile CSV/TXT

  // UPDATE MAPS
  $('#fm_updatemaps').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      url     : base_url+'cextra/cruds_extras/upmaps',
      method  : 'POST',
      data    : $('#fm_updatemaps').serialize(),
      success : function(data) {
        if (data.status == 'success') {
          toastr.success('Data berhasil disimpan!');
          location.reload();
        } else if (data.status == 'failed') {
          toastr.error('Data gagal dihapus!');
        }
      }
    });
  });
  // #END# UPDATE MAPS

  // INSERT TGK
  $('#fm_inputtgk').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      url     : base_url+'ctgk/cruds/instgk',
      method  : 'POST',
      data    : $('#fm_inputtgk').serialize(),
      success : function(data) {
        if (data.status == 'success') {
            toastr.success('Data berhasil disimpan!');
            $('#insTgk').modal('hide');
            $('#fm_inputtgk')[0].reset();
            $('#btn_cari').trigger('click');
            $('#fm_wil').trigger('change');
          } else if (data.status == 'failed') {
            toastr.error('Data gagal dihapus!');
          }
      }
    });
  });
  // #END# INSERT TGK

  // UPDATE TGK
  $('#fm_edittgk').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      url     : base_url+'ctgk/cruds/uptgk',
      method  : 'POST',
      data    : $('#fm_edittgk').serialize(),
      success : function(data) {
        if (data.status == 'success') {
            toastr.success('Data berhasil disimpan!');
            $('#modal_EditTgk').modal('hide');
            $('#btn_cari').trigger('click');
          } else if (data.status == 'failed') {
            toastr.error('Data gagal dihapus!');
          }
      }
    });
  });
  // #END# UPDATE TGK

  // DELETE TGK
  $('#tabletgk').on('click', '.modalDelTgk', function() {
    var idtgk = $(this).data('id');
    $('#deletetgk').modal('show');

    $('#fm_deltgk').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        url       : base_url+'ctgk/cruds/deltgk?p='+idtgk,
        method    : 'POST',
        dataType  : 'JSON',
        success   : function(data) {
          if (data.status == 'success') {
            toastr.success('Data berhasil dihapus!');
            $('#tabletgk').DataTable().row( $('td a[data-id='+idtgk+']').parents('tr') ).remove().draw();
            $('#deletetgk').modal('hide');
          } else if (data.status == 'failed') {
            toastr.error('Data gagal dihapus!');
          }
        }
      });
    });

  });
  // #END# DELETE TGK

  // Delete All Data TGK
  $('#fm_deltgkall').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        url       : base_url+'ctgk/cruds/deltgkall',
        method    : 'POST',
        dataType  : 'JSON',
        success   : function(data) {
          if (data.status == 'success') {
            toastr.success('Data berhasil dihapus!');
            $('#DelTgkAll').modal('hide');
            $('#btn_cari').trigger('click');
          } else if (data.status == 'failed') {
            toastr.error('Data gagal dihapus!');
          }
        }
      });
    });
  // #END# Delete All Data TGK

  // INSERT PLG
  $('#fm_inputplg').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      url     : base_url+'cplg/cruds_custs/inscusts',
      method  : 'POST',
      data    : $('#fm_inputplg').serialize(),
      success : function(data) {
        if (data.status == 'success') {
          toastr.success('Data berhasil disimpan!');
          $('#insPlg').modal('hide');
          $('#fm_inputplg')[0].reset();
          //$('#btn_plgcari').trigger('click');
          //$('#fm_wil').trigger('change');
        } else if (data.status == 'failed') {
          toastr.error('Data gagal dihapus!');
        }
      }
    });
  });
  // #END# INSERT PLG

  // UPDATE PLG
  $('#fm_updateplg').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      url     : base_url+'cplg/cruds_custs/upcusts',
      method  : 'POST',
      data    : $('#fm_updateplg').serialize(),
      success : function(data) {
        if (data.status == 'success') {
          toastr.success('Data berhasil disimpan!');
          $('#modal_editplg').modal('hide');
          $('#fm_updateplg')[0].reset();
          $('#btn_plgcari').trigger('click');
        } else if (data.status == 'failed') {
          toastr.error('Data gagal dihapus!');
        }
      }
    });
  });
  // #END# UPDATE PLG

  // DELETE PLG
  $('#tableplg').on('click', '.modalDelPlg', function() {
    var idpel = $(this).data('id');
    $('#deleteplg').modal('show');

    $('#fm_delplg').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        url       : base_url+'cplg/cruds_custs/delcusts?p='+idpel,
        method    : 'POST',
        dataType  : 'JSON',
        success   : function(data) {
          if (data.status == 'success') {
            toastr.success('Data berhasil dihapus!');
            $('#deleteplg').modal('hide');
            table_plg.row( $('td a[data-id='+idpel+']').parents('tr') ).remove().draw();
          } else if (data.status == 'failed') {
            toastr.error('Data gagal dihapus!');
          }
        }
      });
    });

  });
  // #END# DELETE PLG

   // Delete All Data PLG
  $('#fm_delplgall').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        url       : base_url+'cplg/cruds_custs/delcustsall',
        method    : 'POST',
        dataType  : 'JSON',
        success   : function(data) {
          if (data.status == 'success') {
            toastr.success('Data berhasil dihapus!');
            $('#DelPlgAll').modal('hide');
            $('#btn_plgcari').trigger('click');
          } else if (data.status == 'failed') {
            toastr.error('Data gagal dihapus!');
          }
        }
      });
    });
  // #END# Delete All Data PLG

  // INSERT AKUN
  $('#fm_inputakun').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      url       : base_url+'cextra/cruds_extras/insakun',
      method    : 'POST',
      dataType  : 'JSON',
      data      : $('#fm_inputakun').serialize(),
      success : function(data) {
        if (data.status == 'success') {
            toastr.success('Data berhasil disimpan!');
            $('#insAkun').modal('hide');
            table_akun.ajax.reload();
          } else if (data.status == 'failed') {
            toastr.error('Data gagal disimpan!');
          }
      }
    });
  });
  // #END# INSERT AKUN

  // UPDATE AKUN
  $('#fm_updateakun').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      url       : base_url+'cextra/cruds_extras/upakun',
      method    : 'POST',
      dataType  : 'JSON',
      data      : $('#fm_updateakun').serialize(),
      success : function(data) {
        if (data.status == 'success') {
            toastr.success('Data berhasil disimpan!');
            $('#modal_editakun').modal('hide');
            table_akun.ajax.reload();
          } else if (data.status == 'failed') {
            toastr.error('Data gagal dihapus!');
          }
      }
    });
  });
  // #END# UPDATE AKUN

  // DELETE AKUN
  $('#tablesakun').on('click', '.modalDelAkun', function() {
    var uid = $(this).data('id');
    $('#deleteakun').modal('show');

    $('#fm_delakun').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        url       : base_url+'cextra/cruds_extras/delakun?p='+uid,
        method    : 'POST',
        dataType  : 'JSON',
        success   : function(data) {
          if (data.status == 'success') {
            toastr.success('Data berhasil dihapus!');
            $('#deleteakun').modal('hide');
            table_akun.ajax.reload();
          } else if (data.status == 'failed') {
            toastr.error('Data gagal dihapus!');
          }
        }
      });
    });
  });
  // #END# DELETE AKUN

  // INSERT PEGAWAI
  $('#fm_inputpegawai').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      url       : base_url+'cextra/cruds_extras/inspegawai',
      method    : 'POST',
      dataType  : 'JSON',
      data      : $('#fm_inputpegawai').serialize(),
      success : function(data) {
        if (data.status == 'success') {
            toastr.success('Data berhasil disimpan!');
            $('#insPegawai').modal('hide');
            table_pegawai.ajax.reload();
          } else if (data.status == 'failed') {
            toastr.error('Data gagal disimpan!');
          }
      }
    });
  });
  // #END# INSERT PEGAWAI

  // UPDATE PEGAWAI
  $('#fm_updatepegawai').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      url       : base_url+'cextra/cruds_extras/uppegawai',
      method    : 'POST',
      dataType  : 'JSON',
      data      : $('#fm_updatepegawai').serialize(),
      success : function(data) {
        if (data.status == 'success') {
            toastr.success('Data berhasil disimpan!');
            $('#modal_editpegawai').modal('hide');
            table_pegawai.ajax.reload();
          } else if (data.status == 'failed') {
            toastr.error('Data gagal dihapus!');
          }
      }
    });
  });
  // #END# UPDATE PEGAWAI

  // DELETE PEGAWAI
  $('#tablespegawai').on('click', '.modalDelPegawai', function() {
    var uid = $(this).data('id');
    $('#deletepegawai').modal('show');

    $('#fm_delpegawai').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        url       : base_url+'cextra/cruds_extras/delpegawai?p='+uid,
        method    : 'POST',
        dataType  : 'JSON',
        success   : function(data) {
          if (data.status == 'success') {
            toastr.success('Data berhasil dihapus!');
            $('#deletepegawai').modal('hide');
            table_pegawai.ajax.reload();
          } else if (data.status == 'failed') {
            toastr.error('Data gagal dihapus!');
          }
        }
      });
    });

  });
  // #END# DELETE PEGAWAI

  // INSERT AREA
  $('#fm_inputarea').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      url       : base_url+'cextra/cruds_extras/insarea',
      method    : 'POST',
      dataType  : 'JSON',
      data      : $('#fm_inputarea').serialize(),
      success : function(data) {
        if (data.status == 'success') {
            toastr.success('Data berhasil disimpan!');
            $('#insArea').modal('hide');
            table_area.ajax.reload();
          } else if (data.status == 'failed') {
            toastr.error('Data gagal disimpan!');
          }
      }
    });
  });
  // #END# INSERT AREA

  // UPDATE AREA
  $('#fm_updatearea').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      url       : base_url+'cextra/cruds_extras/uparea',
      method    : 'POST',
      dataType  : 'JSON',
      data      : $('#fm_updatearea').serialize(),
      success : function(data) {
        if (data.status == 'success') {
            toastr.success('Data berhasil disimpan!');
            $('#modal_editarea').modal('hide');
            table_area.ajax.reload();
          } else if (data.status == 'failed') {
            toastr.error('Data gagal dihapus!');
          }
      }
    });
  });
  // #END# UPDATE AREA

  // DELETE AREA
  $('#tablesarea').on('click', '.modalDelUnit', function() {
    var uid = $(this).data('id');
    $('#deleteunit').modal('show');

    $('#fm_delunit').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        url       : base_url+'cextra/cruds_extras/delarea?p='+uid,
        method    : 'POST',
        dataType  : 'JSON',
        success   : function(data) {
          if (data.status == 'success') {
            toastr.success('Data berhasil dihapus!');
            $('#deleteunit').modal('hide');
            table_area.ajax.reload();
          } else if (data.status == 'failed') {
            toastr.error('Data gagal dihapus!');
          }
        }
      });
    });
  });
  // #END# DELETE AREA

  // INSERT RAYON
  $('#fm_inputrayon').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      url       : base_url+'cextra/cruds_extras/insrayon',
      method    : 'POST',
      dataType  : 'JSON',
      data      : $('#fm_inputrayon').serialize(),
      success : function(data) {
        if (data.status == 'success') {
            toastr.success('Data berhasil disimpan!');
            $('#insRayon').modal('hide');
            $('#choose_area').trigger('change');
          } else if (data.status == 'failed') {
            toastr.error('Data gagal disimpan!');
          }
      }
    });
  });
  // #END# INSERT RAYON

  // UPDATE RAYON
  $('#fm_updaterayon').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      url       : base_url+'cextra/cruds_extras/uprayon',
      method    : 'POST',
      dataType  : 'JSON',
      data      : $('#fm_updaterayon').serialize(),
      success : function(data) {
        if (data.status == 'success') {
            toastr.success('Data berhasil disimpan!');
            $('#modal_editrayon').modal('hide');
            $('#choose_area').trigger('change');
          } else if (data.status == 'failed') {
            toastr.error('Data gagal dihapus!');
          }
      }
    });
  });
  // #END# UPDATE RAYON

  // DELETE RAYON
  $('#tablesrayon').on('click', '.modalDelUnit', function() {
    var uid = $(this).data('id');
    $('#deleteunit').modal('show');

    $('#fm_delunit').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        url       : base_url+'cextra/cruds_extras/delrayon?p='+uid,
        method    : 'POST',
        dataType  : 'JSON',
        success   : function(data) {
          if (data.status == 'success') {
            toastr.success('Data berhasil dihapus!');
            $('#deleteunit').modal('hide');
            table_rayon.row( $('td a[data-id='+uid+']').parents('tr') ).remove().draw();
          } else if (data.status == 'failed') {
            toastr.error('Data gagal dihapus!');
          }
        }
      });
    });
  });
  // #END# DELETE RAYON
})(window, document);