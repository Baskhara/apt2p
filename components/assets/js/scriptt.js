(function(window, document) {
  
  /*
  NOTE:
  ------
  */

  // Load DataTables based on selection
  $('#btn_cari').on('click', function(e) {
  	e.preventDefault();
    $('#chkval').remove();
    $('#btn_cari').attr('disabled', true);
    $('#btn_cari').text('');
    $('#btn_cari').append('<img src="'+base_url+'components/app-assets/images/icons/spinner.gif" width="10px" id="login_loading" />');

    var area = $('#fm_area').val();
    var rayon = $('#fm_rayon').val();
    var stats = $('#fm_stats').val();
    var kogols = $('#fm_kogols').val();
    var kalitgk = $('#fm_kalitgk').val();

    $('#tabletgk').DataTable().destroy();
    
    $('#tabletgk').DataTable({
      scrollX   : true,
      processing : true,
      serverSide : true,
      pageLength : 10,
      order : [
          [3, 'asc']
        ],
      ajax      : {
        url : base_url+'/ctgk/dashs/get_Tgk?ap='+area+'&up='+rayon+'&stats='+stats+'&kogols='+kogols+'&kalitgk='+kalitgk,
        method : 'GET'
      }
    })
    
    table_tgk.clear().draw();

    setTimeout(function() {
      $('#login_loading').remove();
      $('#btn_cari').append('<i class="icon-search"></i> Cari');
      $('#btn_cari').removeAttr('disabled');
    }, 500);

  });
  // #END# Load DataTables on selection

	// Load DataTables based on ID
	$('#btn_idcari').on('click', function(e) {
		e.preventDefault();
    $('#chkval').remove();
    $('#btn_idcari').attr('disabled', true);
    $('#btn_idcari').text('');
    $('#btn_idcari').append('<img src="'+base_url+'components/app-assets/images/icons/spinner.gif" width="10px" id="login_loading" />');

    $('#tabletgk').DataTable().destroy();
    
    $('#tabletgk').DataTable({
      scrollX   : true,
      serverSide : true,
      pageLength : 10,
      order : [
          [3, 'desc']
        ],
      ajax      : {
        url : base_url+'/ctgk/dashs/get_Tgk?p='+$('#fm_idpel').val(),
        method : 'GET'
      }
    })
    
    table_tgk.clear().draw();

    setTimeout(function() {
      $('#login_loading').remove();
      $('#btn_idcari').append('<i class="icon-search"></i> Cari');
      $('#btn_idcari').removeAttr('disabled');
    }, 500)

	});
	// #END# Load DataTables on ID

	// Load DataTables PLG based on selection
	$('#btn_plgcari').on('click', function(e) {
		e.preventDefault();
    $('#btn_plgcari').attr('disabled', true);
    $('#btn_plgcari').text('');
    $('#btn_plgcari').append('<img src="'+base_url+'components/app-assets/images/icons/spinner.gif" width="10px" id="login_loading" />');

    $('#tableplg').DataTable().destroy();
    
    $('#tableplg').DataTable({
      scrollX   : true,
      processing : true,
      serverSide : true,
      pageLength : 10,
      order : [
          [3, 'asc']
        ],
      ajax      : {
        url : base_url+'/ctgk/dashs/get_Plg?ap='+$('#fm_area').val()+'&up='+$('#fm_rayon').val()+'&stats='+$('#fm_stats').val(),
        method : 'GET'
      }
    })
    
    table_plg.clear().draw();

    setTimeout(function() {
      $('#login_loading').remove();
      $('#btn_plgcari').append('<i class="icon-search"></i> Cari');
      $('#btn_plgcari').removeAttr('disabled');
    }, 500);

	});
	// #END# Load DataTables on selection

	// Load DataTables based on ID
	$('#btn_idplgcari').on('click', function(e) {
		e.preventDefault();
    $('#btn_idplgcari').attr('disabled', true);
    $('#btn_idplgcari').text('');
    $('#btn_idplgcari').append('<img src="'+base_url+'components/app-assets/images/icons/spinner.gif" width="10px" id="login_loading" />');

    setTimeout(function() {
  		$.post(base_url+'ctgk/dashs/getPlgByID?idpel=' + $('#fm_idpel').val(), function(data) {
  			table.clear();

  			var obj    = JSON.parse(data);

  			obj.forEach(function(item) {
  				table.row.add([
  					item.UNITAP,item.UNITUP,item.IDPEL,item.NAMA,
  					item.TARIF,item.DAYA,item.KOGOL,item.GARDU,item.ALAMAT,
            '<a class="btn btn-outline-warning modalEditPlg" data-id="'+item.IDPEL+'"><i class="icon-edit"></i></a> | '+
            '<a class="btn btn-outline-danger modalDelPlg" data-id="'+item.IDPEL+'"><i class="icon-trash"></i></a>'
  					]);
  			});

  			table.draw();
  		});
      
      $('#login_loading').remove();
      $('#btn_idplgcari').append('<i class="icon-search"></i> Cari');
      $('#btn_idplgcari').removeAttr('disabled');
    }, 500);
	});
	// #END# Load DataTables on ID

  // Load DataTables for Akun
  $('#tableakun').on('load', function(e) {
    e.preventDefault();
    $.post(base_url+'cextra/cextras/getPlgByID?idpel=' + $('#fm_idpel').val(), function(data) {
      table.clear();

      var obj    = JSON.parse(data);

      obj.forEach(function(item) {
        table.row.add([
          item.UNITAP,item.UNITUP,item.IDPEL,item.NAMA,
          item.TARIF,item.DAYA,item.KOGOL,item.GARDU,item.ALAMAT,
          '<a class="btn btn-outline-warning modalEditPlg" data-id="'+item.IDPEL+'"><i class="icon-edit"></i></a> | '+
          '<a class="btn btn-outline-danger modalDelPlg" data-id="'+item.IDPEL+'"><i class="icon-trash"></i></a>'
          ]);
      });

      table.draw();
    });
  });
  // #END# Load DataTables for Akun

  // Reload datatable on change event
  $('#choose_area').on('change', function() {
    $.ajax({
      url : base_url+'cextra/cruds_extras/get_tablerayon?p='+$('#choose_area option:selected').val(),
      method : 'GET',
      dataType : 'JSON',
      success : function(data) {
        table_rayon.clear();
        data.forEach(function(item) {
        table_rayon.row.add([
          item.UNITUP,item.RAYON,item.UNITAP,
          '<a class="btn btn-outline-warning modalEditRayon" data-id="'+item.UNITUP+'"><i class="icon-edit"></i></a> |'+
          ' <a class="btn btn-outline-danger modalDelUnit" data-id="'+item.UNITUP+'"><i class="icon-trash"></i></a>'
          ]);
        });
        table_rayon.draw();
      }
    })
  });
  // #END# Reload datatable on change event

  // Auto-Fill value on Edit PLG
  $('#tableplg').on('click', '.modalEditPlg', function() {
    var idpel = $(this).data('id');
    $.post(base_url+'cplg/cruds_custs/get_editplg?p='+idpel, function(data) {

      var vals = JSON.parse(data);
      $('#fm_inputplg')[0].reset();
      $('#fm_updateplg')[0].reset();
      $('#modal_editplg').modal('show');

      $('input[name=fm_idpel_e]').val(vals.IDPEL);
      $('input[name=fm_namapel]').val(vals.NAMA);
      $('textarea[name=fm_alamat]').val(vals.ALAMAT);
      $('#fm_wil_e option[value=KSKT]').attr('selected', true);

      $('#fm_area_e').load(base_url+'ctgk/dashs/getapfromwill?wil=KSKT', function() {
        $('#fm_area_e option[value=1]').text('-- Pilih --');
        $('#fm_area_e option[value=1]').attr('disabled', true);
        $('#fm_area_e option[value='+vals.UNITAP+']').attr('selected', true);
      });
      $('#fm_rayon_e').load(base_url+'ctgk/dashs/getupfromap?ap='+vals.UNITAP, function() {
        $('#fm_rayon_e option[value=1]').attr('disabled', true);
        $('#fm_rayon_e option[value=1]').attr('disabled', true);
        $('#fm_rayon_e option[value='+vals.UNITUP+']').attr('selected', true);
      });

      $('#fm_tarif_e option[value='+vals.TARIF+']').attr('selected', true);
      $('input[name=fm_daya]').val(vals.DAYA);
      $('#fm_kogols option[value='+vals.KOGOL+']').attr('selected', true);
      $('input[name=fm_gardu]').val(vals.GARDU);
      $('input[name=fm_koordx]').val(vals.KOORDX);
      $('input[name=fm_koordy]').val(vals.KOORDY);
    });
  });
  // #END# Auto-Fill value on Edit PLG

  // Auto-Fill value on Edit TGK
  $('#tabletgk').on('click', '.modalEditTgk', function() {
    var idtgk = $(this).data('id');
    $.post(base_url+'ctgk/cruds/get_edittgk?p='+idtgk, function(data) {

      var vals = JSON.parse(data);
      $('#fm_inputtgk')[0].reset();
      $('#fm_edittgk')[0].reset();
      $('#modal_EditTgk').modal('show');

      $('input[name=fm_idtgk_e]').val(vals.IDTGK);
      $('input[name=fm_idpel_e]').val(vals.IDPEL);
      $('input[name=fm_lembar]').val(vals.LEMBAR);
      $('input[name=fm_rpptl]').val(vals.RPPTL);
      $('input[name=fm_rpbpju]').val(vals.RPBPJU);
      $('input[name=fm_rpppn]').val(vals.RPPPN);
      $('input[name=fm_rpmat]').val(vals.RPMAT);
      $('input[name=fm_tagsus]').val(vals.TAGSUS);
      $('input[name=fm_ujl]').val(vals.UJL);
      $('input[name=fm_bp]').val(vals.BP);
      $('input[name=fm_trafo]').val(vals.TRAFO);
      $('input[name=fm_sewatrafo]').val(vals.SEWATRAFO);
      $('input[name=fm_sewakap]').val(vals.SEWAKAP);
      $('input[name=fm_rptag]').val(vals.RPTAG);
      $('input[name=fm_rpbk]').val(vals.RPBK);
      $('input[name=fm_tanggal]').val(vals.TANGGAL_TGK);
      $('input[name=fm_kalitgk]').val(vals.KALITGK);
    });
  });
  // #END# Auto-Fill value on Edit TGK

  // Auto-Fill value on Edit Akun
  $('#tablesakun').on('click', '.modalEditAkun', function() {
    var nip = $(this).data('id');
    $.post(base_url+'cextra/cruds_extras/get_editakun?p='+nip, function(data) {

      var vals = JSON.parse(data);
      $('#fm_inputakun')[0].reset();
      $('#fm_updateakun')[0].reset();
      $('#modal_editakun').modal('show');

      $('input[name=new-nip-e]').val(vals.NIP);
      $('input[name=new-username]').val(vals.USERNAME);
      $('#fm_wil_e option[value=KSKT]').attr('selected', true);
      $('#fm_lvl_e option[value='+vals.LVL+']').attr('selected', true);
    });
  });
  // #END# Auto-Fill value on Edit Akun

  // Auto-Fill value on Edit Pegawai
  $('#tablespegawai').on('click', '.modalEditPegawai', function() {
    var nip = $(this).data('id');
    $.post(base_url+'cextra/cruds_extras/get_editpegawai?p='+nip, function(data) {

      var vals = JSON.parse(data);
      $('#fm_inputpegawai')[0].reset();
      $('#fm_updatepegawai')[0].reset();
      $('#modal_editpegawai').modal('show');

      $('input[name=fm_nip_e]').val(vals.NIP);
      $('input[name=edit-nama]').val(vals.NAMA);
      $('textarea[name=edit-alamat]').val(vals.ALAMAT);
      $('#fm_jk option[value='+vals.JK+']').attr('selected', true);
      $('input[name=edit-jabatan]').val(vals.JABATAN);
      $('input[name=edit-mail]').val(vals.EMAIL);
      $('input[name=edit-telp]').val(vals.TELP);
      $('#fm_wil_e option[value=KSKT]').attr('selected', true);
      
      $('#fm_area_e').load(base_url+'ctgk/dashs/getapfromwill?wil=KSKT', function() {
        $('#fm_area_e option[value=1]').text('-- Pilih --');
        $('#fm_area_e option[value=1]').attr('disabled', true);
        $('#fm_area_e option[value='+vals.UNITAP+']').attr('selected', true);
      });
      $('#fm_rayon_e').load(base_url+'ctgk/dashs/getupfromap?ap='+vals.UNITAP, function() {
        $('#fm_rayon_e option[value=1]').attr('disabled', true);
        $('#fm_rayon_e option[value=1]').attr('disabled', true);
        $('#fm_rayon_e option[value='+vals.UNITUP+']').attr('selected', true);
      });
    });
  });
  // #END# Auto-Fill value on Edit Pegawai

  // Auto-Fill value on Edit Area
  $('#tablesarea').on('click', '.modalEditArea', function() {
    var uid = $(this).data('id');
    $.post(base_url+'cextra/cruds_extras/get_editarea?p='+uid, function(data) {

      var vals = JSON.parse(data);
      $('#fm_inputarea')[0].reset();
      $('#fm_updatearea')[0].reset();
      $('#fm_inputrayon')[0].reset();
      $('#fm_updaterayon')[0].reset();
      $('#modal_editarea').modal('show');

      $('input[name=edit-unitap]').val(vals.UNITAP);
      $('#fm_wil_e option[value=KSKT]').attr('selected', true);
      $('input[name=edit-nama]').val(vals.NAMA);
    });
  });
  // #END# Auto-Fill value on Edit Area

  // Auto-Fill value on Edit Area
  $('#tablesrayon').on('click', '.modalEditRayon', function() {
    var uid = $(this).data('id');
    $.post(base_url+'cextra/cruds_extras/get_editrayon?p='+uid, function(data) {

      var vals = JSON.parse(data);
      $('#fm_inputarea')[0].reset();
      $('#fm_updatearea')[0].reset();
      $('#fm_inputrayon')[0].reset();
      $('#fm_updaterayon')[0].reset();
      $('#modal_editrayon').modal('show');

      $('#fm_area_raye option[value='+vals.UNITAP+']').attr('selected', true);
      $('input[name=edit-unitup]').val(vals.UNITUP);
      $('input[name=edit-rayon]').val(vals.RAYON);
    });
  });
  // #END# Auto-Fill value on Edit Area

})(window, document);