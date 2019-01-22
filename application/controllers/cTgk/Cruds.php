<?php
	class Cruds extends CI_Controller {
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

		// Insert Data Tunggakan
		public function insTgk() {
			$table = 'TB_TUNGGAKAN';

			$data = array(
				'IDPEL'			=> $this->input->post('fm_idpel_tgk'),
				'LEMBAR'		=> $this->input->post('fm_lembar'),
				'RPPTL'			=> $this->input->post('fm_rpptl'),
				'RPBPJU'		=> $this->input->post('fm_rpbpju'),
				'RPPPN'			=> $this->input->post('fm_rpppn'),
				'RPMAT'			=> $this->input->post('fm_rpmat'),
				'TAGSUS'		=> $this->input->post('fm_tagsus'),
				'UJL'			=> $this->input->post('fm_ujl'),
				'BP'			=> $this->input->post('fm_bp'),
				'TRAFO'			=> $this->input->post('fm_trafo'),
				'SEWATRAFO'		=> $this->input->post('fm_sewatrafo'),
				'SEWAKAP'		=> $this->input->post('fm_sewakap'),
				'RPTAG'			=> $this->input->post('fm_rptag'),
				'RPBK'			=> $this->input->post('fm_rpbk'),
				'TGL_AKHIR'		=> $this->input->post('fm_tanggal'),
				'KALITGK'		=> '1',
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

		// Update Data Tunggakan
		public function upTgk() {
			$table	= 'TB_TUNGGAKAN';
			$attrs	= 'IDTGK';
			$idval	= $this->input->post('fm_idtgk_e');
			$lembar	= $this->input->post('fm_lembar');
			//$tglakhir = substr(str_replace('-', '', $this->input->post('fm_tanggal')), 0, 6);

			$data = array(
				'LEMBAR'		=> $this->input->post('fm_lembar'),
				'RPPTL'			=> $this->input->post('fm_rpptl'),
				'RPBPJU'		=> $this->input->post('fm_rpbpju'),
				'RPPPN'			=> $this->input->post('fm_rpppn'),
				'RPMAT'			=> $this->input->post('fm_rpmat'),
				'TAGSUS'		=> $this->input->post('fm_tagsus'),
				'UJL'			=> $this->input->post('fm_ujl'),
				'BP'			=> $this->input->post('fm_bp'),
				'TRAFO'			=> $this->input->post('fm_trafo'),
				'SEWATRAFO'		=> $this->input->post('fm_sewatrafo'),
				'SEWAKAP'		=> $this->input->post('fm_sewakap'),
				'RPTAG'			=> $this->input->post('fm_rptag'),
				'RPBK'			=> $this->input->post('fm_rpbk'),
				'TGL_AKHIR'		=> $this->input->post('fm_tanggal'),
				'KALITGK'		=> $this->input->post('fm_kalitgk'),
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

		// Delete Data Tunggakan
		public function delTgk() {
			$table = 'TB_TUNGGAKAN';
			$attrs = 'IDTGK';

			if ($this->input->get('p') != null) {
				$idval = $this->input->get('p');
				$queries = $this->cud_model->delete_query($attrs, $idval, $table);
			} else if ($this->input->post('dataArray') != null) {
				$idval = json_decode($this->input->post('dataArray'));

				foreach ($idval as $key => $val) {
					$queries = $this->cud_model->delete_query($attrs, $idval, $table);
				}
			}

			if ($queries == true) {
				$response['status'] = 'success';
			} else {
				$response['status'] = 'failed';
			}

			header('Content-type: application/json');
			echo json_encode($response);
		}

		// Delete Data Tunggakan
		public function delTgkAll() {
			$table = 'TB_TUNGGAKAN';
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
		public function get_EditTgk() {
			$table = 'TB_TUNGGAKAN';
			$attrs = 'IDTGK';
			$idval = $this->input->get('p');

			$out = array();
			$data = $this->data_model->getRowTgkByID($idval);
			$out = $data;

			echo json_encode($out);
		}

	// End of Lines
	}
?>