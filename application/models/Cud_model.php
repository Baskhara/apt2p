<?php
	class Cud_model extends CI_Model {
		public function __construct() {
			parent::__construct();

		}

		// ** C.U.D TO DATABASE ** //
		//
		// Dynamic Insert Query
		public function insert_query($table, $data) {
			$data = $this->db->insert($table, $data);

			if ($data) {
				return true;
			} else {
				return false;
			}
		}

		// Dynamic Update Query
		public function update_query($attrs, $idval, $table, $data) {
			$this->db->where($attrs, $idval);
			$data = $this->db->update($table, $data);

			if ($data) {
				return true;
			} else {
				return false;
			}
		}

		// Dynamic Delete Query
		public function delete_query($attrs, $idval, $table) {
			if ($attrs != '') {
				$this->db->where($attrs, $idval);
				$data = $this->db->delete($table);
			} else {
				$data = $this->db->truncate($table);
			}

			if ($data) {
				return true;
			} else {
				return false;
			}
		}

		// Input Excel Import - Tunggakan //
		public function ImportExcelDB($data_tgk) {
			$this->db->insert_batch('TB_TUNGGAKAN', $data_tgk);
		}

		// Import Excel Import - Pelanggan //
		public function ImportExcelDBPLG($data_pel) {
			$this->db->insert_batch('TB_PELANGGAN', $data_pel);
		}

		// ** #END OF# C.U.D TO DATABASE ** //

	}
?>