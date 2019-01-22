<?php
	class Dashs extends CI_Controller {
		public function __construct() {
			parent::__construct();

			// Load library
			$this->load->database();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('user_agent');

			// Load model
			$this->load->model('data_model');
			$this->load->model('cud_model');
			$this->load->model('extras_model');

			// Enable profiler
			//$this->output->enable_profiler(true);

			// Check URi and Browser
			$this->uriCheck();

		}

		// Check URi and Browser
		public function uriCheck() {
			// Check URi
			/*
			$url = $_SERVER['HTTP_HOST'].''.str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

			if ($url == 'mylocal/cirob/' || $url == 'localhost/cirob/' || $url == '127.0.0.1/cirob/') {
				//redirect('http://pln.cal');
			}
			*/
			// #END# Check URi

			// Check Browser
			$data['browser'] = $this->agent->browser();

			if ($data['browser'] == 'Chrome' || $data['browser'] == 'Firefox') {
				// Stays
			} else {
				die($this->load->view('errors/html/error_browser', $data, true));
			}
			// #END# Check Browser
		}

		// Admins view
		public function view($page = 'vhome'){
			if(!file_exists(APPPATH.'views/vdashboard/'.$page.'.php')){
				show_404();
			}

			$ver['prVer'] 		= 'PrLN-0.0.1';
			$data['title']		= 'DASHBOARD';
			$data['dt_unitap']	= $this->data_model->getUnitAP();
			$data['dt_unitup']	= $this->data_model->getUnitUP();
			$data['cTgk']		= $this->data_model->countTgk($data);
			$data['cPlg']		= $this->data_model->countPlg($data);
			$keys['dt_keys']	= $this->extras_model->getApiKeys();

			$this->load->view('vtemplates/vheader');
			$this->load->view('vtemplates/vsidebar', $ver);
			$this->load->view('vdashboard/'.$page, $data);
			$this->load->view('vtemplates/vfooter', $keys);
		}

		public function monet($page = 'vtunggakan'){
			if (!file_exists(APPPATH.'views/vdashboard/vmonitoring/'.$page.'.php')) {
				show_404();
			}

			// Check and remove files in /files/temps directory for files older than 1 hour
			$path = FCPATH.'/files/temps';
			if ($handle = opendir($path)) {
			    while (false !== ($file = readdir($handle))) {
			        if ((time()-filemtime($path.'/'.$file)) > 3600) {
			          if (strripos($file, '.pdf') !== false) {
			            unlink($path.'/'.$file);
			          }
			        }
			    }
			}
			// #END# Check and remove files

			$data['dt_unitap']		= $this->data_model->getUnitAP();
			$data['dt_unitup']		= $this->data_model->getUnitUP();
			$data['dt_pegawai']		= $this->extras_model->getPegawai();
			$keys['dt_keys']	= $this->extras_model->getApiKeys();

			if ($this->uri->segment(3)=="vtunggakan") {
				$data['dt_customer']	= $this->data_model->getCusts();
			}

			if ($idpel = $this->input->get('p')) {
				$data['dt_sCusts'] = $this->data_model->getRowCustsByID($idpel);
			}

			$this->load->view('vtemplates/vheader');
			$this->load->view('vtemplates/vsidebar');
			$this->load->view('vdashboard/vmonitoring/'.$page, $data);
			$this->load->view('vtemplates/vfooter', $keys);
		}

		public function vforms($page = 'vfminput'){
			if (!file_exists(APPPATH.'views/vdashboard/vforms/'.$page.'.php')) {
				show_404();
			}

			$data['dt_unitap']	= $this->data_model->getUnitAP();
			$data['dt_unitup']	= $this->data_model->getUnitUP();

			if ($idpel = $this->input->get('p')) {
				$data['dt_sCusts'] = $this->data_model->getRowCustsByID($idpel);
			}

			$this->load->view('vtemplates/vheader');
			$this->load->view('vtemplates/vsidebar');
			$this->load->view('vdashboard/vforms/'.$page, $data);
			$this->load->view('vtemplates/vfooter');
		}

		// Get Data PLG Tables by ID
		public function getPlgByID() {
			$data = $this->input->get('idpel');

			$out = array();
			$row = $this->data_model->getCustsByID($data);

			$out = $row;
			echo json_encode($out);
		}

		// Getter WIll
		public function getapfromwill() {
			$idap = $this->input->get('wil');
			$row = $this->data_model->getModelAP($idap);

			echo '<option value="1">SEMUA</option>';
			foreach ($row as $key => $q) {
				echo '<option value="'.$q['UNITAP'].'">'.$q['UNITAP'].' - '.$q['NAMA'].'</option>';
			}
		}

		// Getter UP
		public function getupfromap() {
			$idup = $this->input->get('ap');
			$row = $this->data_model->getModelUP($idup);

			echo '<option value="1">SEMUA</option>';
			foreach ($row as $key => $q) {
				echo '<option value="'.$q['UNITUP'].'">'.$q['UNITUP'].' - '.$q['RAYON'].'</option>';
			}
		}

		// Load DataTables for Tgk
		public function get_Tgk() {
			$draw = intval($this->input->get('draw'));
			$start = intval($this->input->get('start'));
			$length = intval($this->input->get('length'));
			$order = $this->input->get('order');

			$col = 0; $dir = '';

			if (!empty($order)) {
				foreach ($order as $key => $od) {
					$col = $od['column'];
					$dir = $od['dir'];
				}
			}

			if ($dir != 'asc' && $dir != 'desc') {
				$dir = 'asc';
			}

			$columns_valid = array(
				'KOORD',
				'TB_PELANGGAN.UNITAP',
				'TB_PELANGGAN.UNITUP',
				'TB_TUNGGAKAN.IDPEL',
				'TB_PELANGGAN.NAMA_PEL',
				'TB_PELANGGAN.TARIF',
				'TB_PELANGGAN.DAYA',
				'TB_PELANGGAN.KOGOL',
				'TB_PELANGGAN.GARDU',
				'TB_PELANGGAN.ALAMAT',
				'TB_TUNGGAKAN.LEMBAR',
				'TB_TUNGGAKAN.RPPTL',
				'TB_TUNGGAKAN.RPBPJU',
				'TB_TUNGGAKAN.RPPPN',
				'TB_TUNGGAKAN.RPMAT',
				'TB_TUNGGAKAN.TAGSUS',
				'TB_TUNGGAKAN.UJL',
				'TB_TUNGGAKAN.BP',
				'TB_TUNGGAKAN.TRAFO',
				'TB_TUNGGAKAN.SEWATRAFO',
				'TB_TUNGGAKAN.SEWAKAP',
				'TB_TUNGGAKAN.RPTAG',
				'TB_TUNGGAKAN.RPBK',
				'TB_TUNGGAKAN.TGL_AKHIR',
				'TB_TUNGGAKAN.KALITGK'
			);

			if (!isset($columns_valid[$col])) {
				$order = null;
			} else {
				$order = $columns_valid[$col];
			}

			$data = array(
				'title' => 'TGK',
				'idap' => $this->input->get('ap'),
				'idup' => $this->input->get('up'),
				'stats' => $this->input->get('stats'),
				'kogols' => $this->input->get('kogols'),
				'kalitgk' => $this->input->get('kalitgk'),
				'search' => $this->input->get('search[value]')
			);
			
			$total_tgk = $this->data_model->countTgk($data);

			$db = $this->data_model->getVTGK($start,$length,$data,$order,$dir);

			$data = array();

			foreach ($db->result() as $key => $val) {
				$data[] = array(
					'<a class="btn btn-outline-success modalNavPLG" id="nav-plg" data-navx="'.$val->KOORDX.'" data-navy="'.$val->KOORDY.'"><i class="icon-ios-location"></i></a>',
					$val->UNITAP,
					$val->UNITUP,
					$val->IDPEL,
					$val->NAMA,
					$val->TARIF,
					$val->DAYA,
					$val->KOGOL,
					$val->GARDU,
					$val->ALAMAT,
					$val->LEMBAR,
					$val->RPPTL,
					$val->RPBPJU,
					$val->RPPPN,
					$val->RPMAT,
					$val->TAGSUS,
					$val->UJL,
					$val->BP,
					$val->TRAFO,
					$val->SEWATRAFO,
					$val->SEWAKAP,
					$val->RPTAG,
					$val->RPBK,
					$val->TANGGAL_TGK,
					$val->KALITGK,
					'<a class="btn btn-outline-warning modalEditTgk" data-id="'.$val->IDTGK.'"><i class="icon-edit"></i></a> | <a class="btn btn-outline-danger modalDelTgk" data-id="'.$val->IDTGK.'"><i class="icon-trash2"></i></a>'
				);
			}

			$countTgk = $db->num_rows();
			$total_flt = "$countTgk";

			$out = array(
				'draw' => $draw,
				'recordsTotal' => $total_tgk,
				'recordsFiltered' => $total_tgk,
				'data' => $data
			);

			echo json_encode($out);
			exit;
		}

		// Load DataTables for PLG
		public function get_Plg() {
			$draw = intval($this->input->get('draw'));
			$start = intval($this->input->get('start'));
			$length = intval($this->input->get('length'));
			$order = $this->input->get('order');

			$col = 0; $dir = '';

			if (!empty($order)) {
				foreach ($order as $key => $od) {
					$col = $od['column'];
					$dir = $od['dir'];
				}
			}

			if ($dir != 'asc' && $dir != 'desc') {
				$dir = 'asc';
			}

			$columns_valid = array(
				'KOORD',
				'TB_PELANGGAN.UNITAP',
				'TB_PELANGGAN.UNITUP',
				'TB_PELANGGAN.IDPEL',
				'TB_PELANGGAN.NAMA_PEL',
				'TB_PELANGGAN.TARIF',
				'TB_PELANGGAN.DAYA',
				'TB_PELANGGAN.KOGOL',
				'TB_PELANGGAN.GARDU',
				'TB_PELANGGAN.ALAMAT'
			);

			if (!isset($columns_valid[$col])) {
				$order = null;
			} else {
				$order = $columns_valid[$col];
			}

			$data = array(
				'title' => 'PLG',
				'idap' => $this->input->get('ap'),
				'idup' => $this->input->get('up'),
				'stats' => $this->input->get('stats'),
				'search' => $this->input->get('search[value]')
			);

			$total_plg = $this->data_model->countPlg($data);

			$db = $this->data_model->getVPlg($start,$length,$data,$order,$dir);

			$data = array();

			foreach ($db->result() as $key => $val) {
				$data[] = array(
					'<a class="btn btn-outline-success modalNavPLG" id="nav-plg" data-navx="'.$val->KOORDX.'" data-navy="'.$val->KOORDY.'"><i class="icon-ios-location"></i></a>',
					$val->UNITAP,
					$val->UNITUP,
					$val->IDPEL,
					$val->NAMA,
					$val->TARIF,
					$val->DAYA,
					$val->KOGOL,
					$val->GARDU,
					$val->ALAMAT,
					'<a class="btn btn-outline-warning modalEditPlg" data-id="'.$val->IDPEL.'"><i class="icon-edit"></i></a> | <a class="btn btn-outline-danger modalDelPlg" data-id="'.$val->IDPEL.'"><i class="icon-trash"></i></a>'
				);
			}

			$out = array(
				'draw' => $draw,
				'recordsTotal' => $total_plg,
				'recordsFiltered' => $total_plg,
				'data' => $data
			);

			echo json_encode($out);
			exit;
		}

		// ## UNUSED ## //

		/*/ Get Data TGK Tables by Category
		public function getdatatgk() {
			$data = array(
				'idap' => $this->input->get('ap'),
				'idup' => $this->input->get('up'),
				'stats' => $this->input->get('stats')
			);

			$out = array();
			$row = $this->data_model->getModelDT($data);
			
			$out = $row;
			echo json_encode($out);
		}*/

		/*/ Get Data TGK Tables by ID
		public function getdataid() {
			$data = $this->input->get('idpel');

			$outs = array();
			$row = $this->data_model->getModelID($data);
			
			$outs = $row;
			echo json_encode($outs);
		}*/

		/*/ Get Data PLG Tables by Category
		public function getPlgByCats() {
			$data = array(
				'idap' => $this->input->get('ap'),
				'idup' => $this->input->get('up')
			);

			$out = array();
			$row = $this->data_model->getCustsByCats($data);
			
			$out = $row;
			echo json_encode($out);
		}*/

		// ## END OF UNUSED ## //


	// End of Lines
	}
?>