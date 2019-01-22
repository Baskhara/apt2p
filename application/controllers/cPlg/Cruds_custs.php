<?php
	class Cruds_custs extends CI_Controller {
		public function __construct() {
			parent::__construct();

			// Load library
			$this->load->database();
			$this->load->helper('file');
			$this->load->helper('form');
			$this->load->library('form_validation');

			// Load model
			$this->load->model('data_model');
			$this->load->model('cud_model');
		}

		// Insert Data Pelanggan
		public function insCusts() {
			$table = 'TB_PELANGGAN';
			$data = array(
				'IDPEL'			=> $this->input->post('fm_idpel_in'),
				'NAMA_PEL'		=> strtoupper($this->input->post('fm_namapel')),
				'ALAMAT'		=> strtoupper($this->input->post('fm_alamat')),
				'UNITAP'		=> $this->input->post('fm_unitap'),
				'UNITUP'		=> $this->input->post('fm_unitup'),
				'TARIF'			=> $this->input->post('fm_tarif'),
				'DAYA'			=> $this->input->post('fm_daya'),
				'KOGOL'			=> $this->input->post('fm_kogol'),
				'GARDU'			=> $this->input->post('fm_gardu'),
				'KOORDX'		=> $this->input->post('fm_koordx'),
				'KOORDY'		=> $this->input->post('fm_koordy'),
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

		// Update Data Pelanggan
		public function upCusts() {
			$table = 'TB_PELANGGAN';
			$attrs = 'IDPEL';
			$idval = $this->input->post('fm_idpel_e');
			
			$data = array(
				'NAMA_PEL'		=> strtoupper($this->input->post('fm_namapel')),
				'ALAMAT'		=> strtoupper($this->input->post('fm_alamat')),
				'UNITAP'		=> $this->input->post('fm_unitap'),
				'UNITUP'		=> $this->input->post('fm_unitup'),
				'TARIF'			=> $this->input->post('fm_tarif'),
				'DAYA'			=> $this->input->post('fm_daya'),
				'KOGOL'			=> $this->input->post('fm_kogol'),
				'GARDU'			=> $this->input->post('fm_gardu'),
				'KOORDX'		=> $this->input->post('fm_koordx'),
				'KOORDY'		=> $this->input->post('fm_koordy'),
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

		// Delete Data Pelanggan
		public function delCusts() {
			$table = 'TB_PELANGGAN';
			$attrs = 'IDPEL';
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

		// Delete Data Tunggakan
		public function delCustsAll() {
			$table = 'TB_PELANGGAN';
			$attrs = '';
			$idval = '';

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
		public function get_EditPlg() {
			$table = 'TB_PELANGGAN';
			$attrs = 'IDPEL';
			$idval = $this->input->get('p');

			$out = array();
			$data = $this->data_model->getRowCustsByID($idval);
			$out = $data;

			echo json_encode($out);
		}

	
	// End of Lines
	}
?>