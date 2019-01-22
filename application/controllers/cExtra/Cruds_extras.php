<?php
	class Cruds_extras extends CI_Controller {
		public function __construct() {
			parent::__construct();

			// Load library
			$this->load->database();
			$this->load->helper('file');
			$this->load->helper('form');
			$this->load->library('form_validation');

			// Load model
			$this->load->model('extras_model');
			$this->load->model('cud_model');
		}

		// PROCESS FOR AKUN //
		// Insert Data Akun
		public function insAkun() {
			$table = 'TB_AKUN';
			$hashpass = password_hash($this->input->post('new-password'), PASSWORD_DEFAULT);

			$data = array(
				'NIP' 			=> $this->input->post('fm_nip_in'),
				'USERNAME' 		=> $this->input->post('new-username'),
				'PASSWORD' 		=> $hashpass,
				'LVL' 			=> $this->input->post('new-level'),
				'CREATED_BY'	=> $this->session->userdata['logged_in']['username'],
				'DATE_CREATED'	=> date('d/m/Y H:i:s')
			);

			$queries = $this->cud_model->insert_query($table, $data);

			if ($queries == true) {
				$response['status'] = 'success';
			} else {
				$response['status'] = 'failed';
			}

			header('Content-type: application/json');
			echo json_encode($response);
		}

		// Update Data Akun
		public function upAkun() {
			$table = 'TB_AKUN';
			$attrs = 'NIP';
			$idval = $this->input->post('new-nip-e');
			$hashpass = password_hash($this->input->post('new-password'), PASSWORD_DEFAULT);
			
			$data = array(
				'USERNAME' 		=> $this->input->post('new-username'),
				'LVL' 			=> $this->input->post('new-level'),
				'MODIFIED_BY'	=> $this->session->userdata['logged_in']['username'],
				'DATE_MODIFIED'	=> date('d/m/Y H:i:s')
			);
			
			if ($this->input->post('new-password')) {
				$data['PASSWORD'] = $hashpass;
			}

			$queries = $this->cud_model->update_query($attrs, $idval, $table, $data);

			if ($queries == true) {
				$response['status'] = 'success';
			} else {
				$response['status'] = 'failed';
			}

			header('Content-type: application/json');
			echo json_encode($response);
		}

		// Delete Data Akun
		public function delAkun() {
			$table = 'TB_AKUN';
			$attrs = 'NIP';
			$idval = $this->input->get('p');

			$queries = $this->cud_model->delete_query($attrs, $idval, $table);
			if ($queries == true) {
				$response['status'] = 'success';
			} else {
				$response['status'] = 'failed';
			}

			header('Content-type: application/json');
			echo json_encode($response);
		}

		// Get Data for Edit
		public function get_EditAkun() {
			$table = 'TB_AKUN';
			$attrs = 'NIP';
			$desc = 'USERNAME,PASSWORD,LVL,NIP';
			$idval = $this->input->get('p');

			$out = array();
			$data = $this->extras_model->getRowDataByID($table, $attrs, $desc, $idval);
			$out = $data;

			echo json_encode($out);
		}
		// #END# PROCESS FOR AKUN //

		// PROCESS FOR PEGAWAI //
		// Insert Data Pegawai
		public function insPegawai() {
			$table = 'TB_PEGAWAI';

			$data = array(
				'NIP' 			=> $this->input->post('fm_nip_in'),
				'NAMA'			=> $this->input->post('new-nama'),
				'ALAMAT'		=> $this->input->post('new-alamat'),
				'JK'			=> $this->input->post('new-jk'),
				'JABATAN'		=> $this->input->post('new-jabatan'),
				'EMAIL'			=> $this->input->post('new-mail'),
				'TELP'			=> $this->input->post('new-telp'),
				'UNITAP'		=> $this->input->post('new-area'),
				'UNITUP'		=> $this->input->post('new-rayon'),
				'CREATED_BY'	=> $this->session->userdata['logged_in']['username'],
				'DATE_CREATED'	=> date('d/m/Y H:i:s')
			);

			$queries = $this->cud_model->insert_query($table, $data);

			if ($queries == true) {
				$response['status'] = 'success';
			} else {
				$response['status'] = 'failed';
			}

			header('Content-type: application/json');
			echo json_encode($response);
		}

		// Update Data Pegawai
		public function upPegawai() {
			$table = 'TB_PEGAWAI';
			$attrs = 'NIP';
			$idval = $this->input->post('fm_nip_e');
			
			$data = array(
				'NAMA'			=> $this->input->post('edit-nama'),
				'ALAMAT'		=> $this->input->post('edit-alamat'),
				'JK'			=> $this->input->post('edit-jk'),
				'JABATAN'		=> $this->input->post('edit-jabatan'),
				'EMAIL'			=> $this->input->post('edit-mail'),
				'TELP'			=> $this->input->post('edit-telp'),
				'UNITAP'		=> $this->input->post('edit-area'),
				'UNITUP'		=> $this->input->post('edit-rayon'),
				'MODIFIED_BY'	=> $this->session->userdata['logged_in']['username'],
				'DATE_MODIFIED'	=> date('d/m/Y H:i:s')
			);

			$queries = $this->cud_model->update_query($attrs, $idval, $table, $data);

			if ($queries == true) {
				$response['status'] = 'success';
			} else {
				$response['status'] = 'failed';
			}

			header('Content-type: application/json');
			echo json_encode($response);
		}

		// Delete Data Pegawai
		public function delPegawai() {
			$table = 'TB_PEGAWAI';
			$attrs = 'NIP';
			$idval = $this->input->get('p');

			$queries = $this->cud_model->delete_query($attrs, $idval, $table);
			if ($queries == true) {
				$response['status'] = 'success';
			} else {
				$response['status'] = 'failed';
			}

			header('Content-type: application/json');
			echo json_encode($response);
		}

		// Get Data for Edit
		public function get_EditPegawai() {
			$table = 'TB_PEGAWAI';
			$attrs = 'NIP';
			$desc = 'NIP,NAMA,ALAMAT,JK,JABATAN,EMAIL,TELP,UNITAP,UNITUP';
			$idval = $this->input->get('p');

			$out = array();
			$data = $this->extras_model->getRowDataByID($table, $attrs, $desc, $idval);
			$out = $data;

			echo json_encode($out);
		}
		// #END# PROCESS FOR AKUN //

		// PROCESS FOR AREA //
		// Insert Data Area
		public function insArea() {
			$table = 'TB_UNITAP';

			$data = array(
				'UNITAP' 		=> $this->input->post('new-unitap'),
				'WIL'			=> $this->input->post('new-wil'),
				'NAMA'			=> $this->input->post('new-nama')
			);

			$queries = $this->cud_model->insert_query($table, $data);

			if ($queries == true) {
				$response['status'] = 'success';
			} else {
				$response['status'] = 'failed';
			}

			header('Content-type: application/json');
			echo json_encode($response);
		}

		// Update Data Area
		public function upArea() {
			$table = 'TB_UNITAP';
			$attrs = 'UNITAP';
			$idval = $this->input->post('edit-unitap');
			
			$data = array(
				'WIL'			=> $this->input->post('edit-wil'),
				'NAMA'			=> $this->input->post('edit-nama')
			);

			$queries = $this->cud_model->update_query($attrs, $idval, $table, $data);

			if ($queries == true) {
				$response['status'] = 'success';
			} else {
				$response['status'] = 'failed';
			}

			header('Content-type: application/json');
			echo json_encode($response);
		}

		// Delete Data Area
		public function delArea() {
			$table = 'TB_UNITAP';
			$attrs = 'UNITAP';
			$idval = $this->input->get('p');

			$queries = $this->cud_model->delete_query($attrs, $idval, $table);
			if ($queries == true) {
				$response['status'] = 'success';
			} else {
				$response['status'] = 'failed';
			}

			header('Content-type: application/json');
			echo json_encode($response);
		}

		// Get Data for Edit
		public function get_EditArea() {
			$table = 'TB_UNITAP';
			$attrs = 'UNITAP';
			$desc = 'UNITAP,WIL,NAMA';
			$idval = $this->input->get('p');

			$out = array();
			$data = $this->extras_model->getRowDataByID($table, $attrs, $desc, $idval);
			$out = $data;

			echo json_encode($out);
		}
		// #END# PROCESS FOR AREA //

		// PROCESS FOR RAYON //
		// Insert Data Rayon
		public function insRayon() {
			$table = 'TB_UNITUP';

			$data = array(
				'UNITAP' 		=> $this->input->post('new-area'),
				'UNITUP'		=> $this->input->post('new-unitup'),
				'RAYON'			=> $this->input->post('new-rayon')
			);

			$queries = $this->cud_model->insert_query($table, $data);

			if ($queries == true) {
				$response['status'] = 'success';
			} else {
				$response['status'] = 'failed';
			}

			header('Content-type: application/json');
			echo json_encode($response);
		}

		// Update Data Rayon
		public function upRayon() {
			$table = 'TB_UNITUP';
			$attrs = 'UNITUP';
			$idval = $this->input->post('edit-unitup');
			
			$data = array(
				'RAYON'			=> $this->input->post('edit-rayon'),
				'UNITAP'		=> $this->input->post('edit-area')
			);

			$queries = $this->cud_model->update_query($attrs, $idval, $table, $data);

			if ($queries == true) {
				$response['status'] = 'success';
			} else {
				$response['status'] = 'failed';
			}

			header('Content-type: application/json');
			echo json_encode($response);
		}

		// Delete Data Rayon
		public function delRayon() {
			$table = 'TB_UNITUP';
			$attrs = 'UNITUP';
			$idval = $this->input->get('p');

			$queries = $this->cud_model->delete_query($attrs, $idval, $table);
			if ($queries == true) {
				$response['status'] = 'success';
			} else {
				$response['status'] = 'failed';
			}

			header('Content-type: application/json');
			echo json_encode($response);
		}

		// Get Data for Edit
		public function get_EditRayon() {
			$table = 'TB_UNITUP';
			$attrs = 'UNITUP';
			$desc = 'UNITUP,RAYON,UNITAP';
			$idval = $this->input->get('p');

			$out = array();
			$data = $this->extras_model->getRowDataByID($table, $attrs, $desc, $idval);
			$out = $data;

			echo json_encode($out);
		}

		// Get Data for Edit
		public function get_TableRayon() {
			$table = 'TB_UNITUP';
			$attrs = 'UNITAP';
			$desc = 'UNITUP,RAYON,UNITAP';
			$idval = $this->input->get('p');

			$out = array();
			$data = $this->extras_model->getArrayDataByID($table, $attrs, $desc, $idval);
			$out = $data;

			echo json_encode($out);
		}
		// #END# PROCESS FOR RAYON //

		// Update Maps
		public function upMaps() {
			$table = 'TB_GMAPS';
			$attrs = 'ID';
			$idval = '1';
			
			$data = array(
				'NAMA'	=> $this->input->post('new-nama'),
				'EMAIL'	=> $this->input->post('new-email'),
				'AU_KEYS'	=> $this->input->post('new-keys')
			);

			$queries = $this->cud_model->update_query($attrs, $idval, $table, $data);

			if ($queries == true) {
				$response['status'] = 'success';
			} else {
				$response['status'] = 'failed';
			}

			header('Content-type: application/json');
			echo json_encode($response);
		}

	
	// End of Lines
	}
?>