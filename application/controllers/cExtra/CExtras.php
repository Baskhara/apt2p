<?php
	class CExtras extends CI_Controller {
		function __construct() {
			parent::__construct();

			// Load library
			$this->load->database();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('user_agent');

			// Load model
			$this->load->model('extras_model');
			$this->load->model('cud_model');

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

		// Load default views
		public function index($page = 'vpegawai') {
			if (!file_exists(APPPATH.'views/vdashboard/vuser/'.$page.'.php')) {
				show_404();
			}

			$data['dt_akun'] = $this->extras_model->getAkun();
			$data['dt_pegawai'] = $this->extras_model->getPegawai();

			$this->load->view('vtemplates/vheader');
			$this->load->view('vtemplates/vsidebar');
			$this->load->view('vdashboard/vuser/'.$page, $data);
			$this->load->view('vtemplates/vfooter');
		}

		// Load addons views
		public function addons($page = 'vunits') {
			if (!file_exists(APPPATH.'views/vdashboard/vextras/'.$page.'.php')) {
				show_404();
			}
			
			$data['dt_maps']	= $this->extras_model->getMaps();
			foreach ($data['dt_maps']->result() as $key => $val) {
				$data = array('NAMA'=>$val->NAMA,'EMAIL'=>$val->EMAIL,'KEYS'=>$val->KEYS);
			}
			
			$data['dt_area']	= $this->extras_model->getArea();

			$this->load->view('vtemplates/vheader');
			$this->load->view('vtemplates/vsidebar');
			$this->load->view('vdashboard/vextras/'.$page, $data);
			$this->load->view('vtemplates/vfooter');
		}

		// LOAD DATA FOR DATATABLES //
		// Load DataTables for Akun
		public function get_Akun() {
			$draw = intval($this->input->get('draw'));
			$start = intval($this->input->get('start'));
			$length = intval($this->input->get('length'));

			$db = $this->extras_model->getAkun();

			$data = array();

			foreach ($db->result() as $key => $val) {
				$uid = $this->session->userdata['logged_in']['username'];
				$lvl = $this->session->userdata['logged_in']['level'];
				
				if ($val->LVL == $lvl) {
					if ($val->USERNAME != $uid) {
						$dis = 'hidden';
					} else if ($val->USERNAME == $uid) {
						$dis = '';
					} else {
						$dis = '';
					}
				} else {
					$dis = '';
				}

				$data[] = array(
					$val->USERNAME,
					$val->LVL,
					$val->NIP,
					$val->UNITAP,
					$val->UNITUP,
					'<a '.$dis.' class="btn btn-outline-warning modalEditAkun" data-id="'.$val->NIP.'"><i class="icon-edit"></i></a> | <a '.$dis.' class="btn btn-outline-danger modalDelAkun" data-id="'.$val->NIP.'"><i class="icon-trash"></i></a>',
				);
			}

			$out = array(
				'draw' => $draw,
				'recordsTotal' => $db->num_rows(),
				'recordsFiltered' => $db->num_rows(),
				'data' => $data
			);

			echo json_encode($out);
			exit;
		}

		// Load DataTables for Pegawai
		public function get_Pegawai() {
			$draw = intval($this->input->get('draw'));
			$start = intval($this->input->get('start'));
			$length = intval($this->input->get('length'));

			$db = $this->extras_model->getPegawai();

			$data = array();

			foreach ($db->result() as $key => $val) {
				$data[] = array(
					$val->NIP,
					$val->NAMA,
					$val->ALAMAT,
					ucwords(strtolower($val->JK)),
					$val->JABATAN,
					$val->EMAIL,
					$val->TELP,
					$val->UNITAP,
					$val->UNITUP,
					'<a class="btn btn-outline-warning modalEditPegawai" data-id="'.$val->NIP.'"><i class="icon-edit"></i></a> | <a class="btn btn-outline-danger modalDelPegawai" data-id="'.$val->NIP.'"><i class="icon-trash"></i></a>'
				);
			}

			$out = array(
				'draw' => $draw,
				'recordsTotal' => $db->num_rows(),
				'recordsFiltered' => $db->num_rows(),
				'data' => $data
			);

			echo json_encode($out);
			exit;
		}

		// Load DataTables for Area
		public function get_Area() {
			$draw = intval($this->input->get('draw'));
			$start = intval($this->input->get('start'));
			$length = intval($this->input->get('length'));

			$db = $this->extras_model->getArea();

			$data = array();

			foreach ($db->result() as $key => $val) {
				$data[] = array(
					$val->UNITAP,
					$val->WIL,
					$val->NAMA,
					'<a class="btn btn-outline-warning modalEditArea" data-id="'.$val->UNITAP.'"><i class="icon-edit"></i></a> | <a class="btn btn-outline-danger modalDelUnit" data-id="'.$val->UNITAP.'"><i class="icon-trash"></i></a>'
				);
			}

			$out = array(
				'draw' => $draw,
				'recordsTotal' => $db->num_rows(),
				'recordsFiltered' => $db->num_rows(),
				'data' => $data
			);

			echo json_encode($out);
			exit;
		}

		// Load DataTables for Rayon
		public function get_Rayon() {
			$draw = intval($this->input->get('draw'));
			$start = intval($this->input->get('start'));
			$length = intval($this->input->get('length'));

			$db = $this->extras_model->getRayon();

			$data = array();

			foreach ($db->result() as $key => $val) {
				$data[] = array(
					$val->UNITUP,
					$val->RAYON,
					$val->UNITAP,
					$val->NAMA,
					'<a class="btn btn-outline-warning modalEditRayon" data-id="'.$val->UNITUP.'"><i class="icon-edit"></i></a> | <a class="btn btn-outline-danger modalDelUnit" data-id="'.$val->UNITUP.'"><i class="icon-trash"></i></a>'
				);
			}

			$out = array(
				'draw' => $draw,
				'recordsTotal' => $db->num_rows(),
				'recordsFiltered' => $db->num_rows(),
				'data' => $data
			);

			echo json_encode($out);
			exit;
		}
		// #END# LOAD DATA FOR DATATABLES //

	// End of Lines
	}
?>