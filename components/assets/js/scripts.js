// Set DataTables Data TGK/PLG
var table = $('#tablesdata').DataTable({
  scrollX    : true,
  stateSave  : true,
  searching  : true,
  ordering   : true
});
// #END# Set DataTables Data TGK/PLG

// Set DataTables Data TGK
var table_tgk = $('#tabletgk').DataTable({
  scrollX   : true,
});
// #END# Set DataTables Data TGK

// Set DataTables Data PLG
var table_plg = $('#tableplg').DataTable({
  scrollX   : true
});
// #END# Set DataTables Data PLG

// Set DataTables Akun
var table_akun = $('#tablesakun').DataTable({
  scrollX    : true,
  stateSave  : true,
  searching  : true,
  ordering   : true,
  ajax       : {
    url : base_url+'/cextra/cextras/get_Akun',
    method : 'GET'
  }
});
// #END# Set DataTables Akun

// Set DataTables Pegawai
var table_pegawai = $('#tablespegawai').DataTable({
  scrollX    : true,
  stateSave  : true,
  searching  : true,
  ordering   : true,
  ajax       : {
    url : base_url+'/cextra/cextras/get_Pegawai',
    method : 'GET'
  }
});
// #END# Set DataTables Pegawai

// Set DataTables Area
var table_area = $('#tablesarea').DataTable({
  scrollX    : true,
  stateSave  : true,
  searching  : true,
  ordering   : true,
  ajax       : {
    url : base_url+'/cextra/cextras/get_Area',
    method : 'GET'
  }
});
// #END# Set DataTables Area

// Set DataTables Area
var table_rayon = $('#tablesrayon').DataTable({
  scrollX    : true,
  stateSave  : true,
  searching  : true,
  ordering   : true,
});
// #END# Set DataTables Area

// Toastr options
  toastr.options = {
    closeButton        : false,
    debug              : false,
    newestOnTop        : false,
    progressBar        : true,
    positionClass      : "toast-top-right",
    preventDuplicates  : true,
    showDuration       : "300",
    hideDuration       : "1000",
    timeOut            : "2500",
    extendedTimeOut    : "1000",
    showEasing         : "swing",
    hideEasing         : "linear",
    showMethod         : "slideDown",
    hideMethod         : "slideUp"
  };
  
  // #END# Toastr options

  // SELECT2
  $('#idnama-pegawai').select2({
    dropdownParent: $('#modalmcetak')
  });

  $('#fm_idpel_mod').select2({
    dropdownParent: $('#insTgk'),
    ajax: {
      url: base_url+'ctgk/dashs/getPlgByID',
      dataType: 'JSON',
      delay: 250,
      data: function(params) {
        return {
          idpel: params.term || ''
        };
      },
      processResults: function(data) {
        return {
          results: $.map(data, function(obj) {
            return {id: obj.IDPEL, text: obj.IDPEL+' - '+obj.NAMA};
          })
        };
      },
      cache: true
    },
    placeholder: 'Cari ID Pelanggan',
  });
  // #END# SELECT2

(function(window, document) {
  
  /*
  NOTE:
  ------
  */

  // Start Pace on Ajax Request
  $(document).ajaxStart(function() {
    Pace.restart();
  });
  // #END# Pace on Ajax Request

  // Password Modal
  $('#mod_pass').on('click', function() {
  	$('#gantiPass').modal({
      show:true
    });
  });
  // #END# Password Modal

  // Register Modal
  $('#mod_register').on('click', function() {
    $('#regis_akun').modal({
      show:true
    });
  });
  // #END# Register Modal

  // Reset Override Form
  $('#override_def').on('click', function() {
    setTimeout(function() {
      $('#bln-awal').val('');
      $('#bln-akhir').val('');
      $('#new-lembar').val('');
    }, 240);
  })
  // #END# Reset Override Form

  // Download format uploads
  $('#exc-format').on('click', function(e) {
    location.href = base_url+'files/archived/format_uploads.xls';
  })
  // #END# Download format uploads

    // Download format uploads
    $('#csv-format').on('click', function(e) {
      location.href = base_url+'files/archived/format_uploads.csv';
    })
    // #END# Download format uploads

  // Toggle selection on DataTables
  $('#tabletgk tbody').on('click', 'tr', function() {
  	$(this).toggleClass('selected');
    $('#chkval').remove();
    $('#btn_mcetak').append('<span id="chkval">('+$('#tabletgk').DataTable().rows('.selected').data().length+')</span>');
  });
  // #END# Toggle selection

  // Pass selected rows & Print
  $('#btn_cetaklembar').on('click', function() {
    var ids = $.map($('#tabletgk').DataTable().rows('.selected').data(), function(item) {
      return item[3];
    });

    var namapg = $('#idnama-pegawai').val();
    var jabatanpg = $('#jabatan-pegawai').val();
    var nosurat = $('#nomor-surat').val();
    var kedudukan = $('#kd-kedudukan').val();
    var awalbln = $('#bln-awal').val();
    var akhirbln = $('#bln-akhir').val();
    var lembar = $('#new-lembar').val();
    var dataJson = JSON.stringify(ids);

    if ($('#tabletgk').DataTable().rows('.selected').data().length >= 1) {
      if (namapg != null && jabatanpg != null) {
        $.ajax({
          url       : base_url+'ctgk/pdfs/save_pdf?n='+namapg+'&j='+jabatanpg+'&nosur='+nosurat+'&kdk='+kedudukan+'&aw='+awalbln+'&ak='+akhirbln+'&lm='+lembar,
          type      : 'POST',
          data      : { dataArray: dataJson },
          dataType  : 'JSON',
          success   : function(data) {
            Pace.start();
            printJS({printable: data, type: 'pdf', showModal: true});
            Pace.stop();
          }
        });
      } else {
        toastr.warning('Detail pegawai tidak boleh kosong.');
      }
    } else {
      toastr.warning('Data pelanggan tidak boleh kosong.');
    }
  });
  // #END# Pass selection

  // Delete selected rows
  $('#btn_mhapus').on('click', function() {
    var ids = $.map($('#tabletgk').DataTable().rows('.selected').data(), function(item) {
      return item[2];
    });

    var dataJson = JSON.stringify(ids);

    if ($('#tabletgk').DataTable().rows('.selected').data().length >= 1) {
      $.ajax({
        url       : base_url+'ctgk/cruds/deltgk',
        type      : 'POST',
        data      : { dataArray: dataJson },
        dataType  : 'JSON',
        success   : function(data) {
          if (data.status == 'success') {
            toastr.success('Data berhasil dihapus!');
            $('#deletetgk').modal('hide');
            $('#btn_cari').trigger('click');
          } else if (data.status == 'failed') {
            toastr.error('Data gagal dihapus!');
          }
        }
      });
    } else {
      toastr.warning('Data pelanggan tidak boleh kosong.');
    }
  });
  // #END# Delete selection

  // Add/Remove disabled attribute on textfield data PLG/TGK
  $('#fm_idpel').on('keyup', function() {
  	if (document.getElementById('btn_idplgcari')) {
  		var idbtn = $('#btn_idplgcari');
  	} else {
  		var idbtn = $('#btn_idcari');
  	}

  	var empty = false;
  	$('#fm_idpel').each(function() {
  		if ($(this).val().length == 0) {
  			empty = true;
  		}
  	});

  	if (empty) {
  		idbtn.attr('disabled', 'disabled');
  	} else {
  		idbtn.removeAttr('disabled');
  	}
  });
  // #END# Add/Remove attribute

  // Load fm_area based on fm_wil
  $('#fm_wil').on('change', function() {
  	$('#fm_area').load(base_url+'ctgk/dashs/getapfromwill?wil=' + $('#fm_wil').val());
  	$('#fm_rayon').load(base_url+'ctgk/dashs/getupfromap?ap=' + $('#fm_area').val());
    
    $('#fm_area').removeAttr('disabled');
    $('#fm_rayon').removeAttr('disabled');
    $('#fm_stats').removeAttr('disabled');

  	if (document.getElementById('btn_plgcari')) {
  		$('#btn_plgcari').removeAttr('disabled');
  	} else {
  		$('#btn_cari').removeAttr('disabled');
    }
    
    if (document.getElementById('fm_stats')) {
  		$('#fm_kogols').removeAttr('disabled');
  		$('#fm_kalitgk').removeAttr('disabled');
    }
  });
  // #END# Load fm_area

  // Load fm_rayon based on fm_area
  $('#fm_area').on('change', function() {
  	$('#fm_rayon').load(base_url+'ctgk/dashs/getupfromap?ap=' + $('#fm_area').val());
  });
  // #END# Load fm_rayon

  // Modal Form
  // Load fm_area based on fm_wil_mod
  $('#fm_wil_mod').on('change', function() {
    $('#fm_area_mod').load(base_url+'ctgk/dashs/getapfromwill?wil=' + $('#fm_wil_mod').val());
    $('#fm_rayon_mod').load(base_url+'ctgk/dashs/getupfromap?ap=' + $('#fm_area_mod').val());
  });
  // #END# Load fm_area

  // Load fm_rayon based on fm_area_mod
  $('#fm_area_mod').on('change', function() {
    $('#fm_rayon_mod').load(base_url+'ctgk/dashs/getupfromap?ap=' + $('#fm_area_mod').val());
  });
  // #END# Load fm_rayon
  // #END# Modal Form

  // Re-adjust Data Tables column width
  $('a[data-toggle=tab]').on('shown.bs.tab', function() {
    table_rayon.columns.adjust().draw();
    $('#choose_area').trigger('change');
  })
  // #END# Re-adjust Data Tables column width

  // Auto-fill Jabatan on Print Paper
  $('#idnama-pegawai').on('change', function() {
    var jbt = $(this).find(':selected').data('id');
    $('input[name=new-jabatan]').val(jbt);
  })
  // #END# Auto-fill Jabatan on Print Paper

  $('#tabletgk').on('click', '.modalNavPLG', function() {
    var koordx = $(this).data('navx');
    var koordy = $(this).data('navy');

    $('#modalNavPLG').modal('show');
    
    initialize();
  });

  $('#tableplg').on('click', '.modalNavPLG', function() {
    var koordx = $(this).data('navx');
    var koordy = $(this).data('navy');

    $('#modalNavPLG').modal('show');
    
    initialize();
  });


})(window, document);