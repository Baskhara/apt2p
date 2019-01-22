<?php
	class Login_model extends CI_Model {
		public function __construct() {
			$this->load->database();
		}

		// Check for login details
		public function login($data) {
			$condition = "USERNAME = " . "" . $this->db->escape($data['username']) . "";
			$this->db->select('USERNAME,PASSWORD,LVL,NIP');
			$this->db->from('TB_AKUN');
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return $query->result();
			} else {
				return false;
			}
		}

		public function register_user($data) {
			$this->db->insert('TB_AKUN', $data);
		}

		public function changePassM($pw) {
			$username = $this->input->post('username');

			$this->db->where('USERNAME', $username);
			$data = $this->db->update('TB_AKUN', $pw);

			if ($data) {
				return true;
			} else {
				return false;
			}
		}

	}
?>