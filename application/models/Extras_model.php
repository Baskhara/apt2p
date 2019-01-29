<?php
	class Extras_model extends CI_Model {
		public function __construct() {
			
		}

		// ** READ DATA FROM DATABASE ** //
		// 
		// Read Maps //
		public function getMaps() {
			$this->db->select('NAMA,EMAIL,AU_KEYS AS KEYS');
			$this->db->from('TB_GMAPS');
			return $this->db->get();
		}

		public function getApiKeys() {
			$this->db->select('AU_KEYS AS KEYS');
			$this->db->from('TB_GMAPS');
			$query = $this->db->get();
			return $query->row()->KEYS;
		}

		// Read Akun //
		public function getAkun() {
			$this->db->select('USERNAME,PASSWORD,LVL,TB_AKUN.NIP,NAMA,UNITAP,UNITUP');
			$this->db->from('TB_AKUN');
			$this->db->join('TB_PEGAWAI', 'TB_AKUN.NIP = TB_PEGAWAI.NIP');
			return $this->db->get();
		}

		// Read Pegawai //
		public function getPegawai() {
			if ($this->uri->segment(3) == 'vpetugas') {
				$query = $this->db->query('SELECT NIP,NAMA,ALAMAT,JK,JABATAN,EMAIL,TELP,UNITAP,UNITUP FROM TB_PEGAWAI WHERE NIP NOT IN (SELECT NIP FROM TB_AKUN)');
			} else {
				$this->db->select('NIP,NAMA,ALAMAT,JK,JABATAN,EMAIL,TELP,UNITAP,UNITUP');
				$this->db->from('TB_PEGAWAI');
				$query = $this->db->get();
			}

			return $query;
		}

		// Read Area //
		public function getArea() {
			$this->db->select('UNITAP,WIL,NAMA');
			$this->db->from('TB_UNITAP');
			return $this->db->get();
		}

		// Read Area //
		public function getRayon() {
			$this->db->select('UNITUP,RAYON,UNITAP');
			$this->db->from('TB_UNITUP');
			return $this->db->get();
		}

		// Get Data by UID
		// Read Data Tables based on UID (as ROW) //
		public function getRowDataByID($table, $attrs, $desc, $idval) {
			$this->db->select($desc);
			$this->db->from($table);
			$this->db->where($attrs, $idval);
			$query = $this->db->get();
			return $query->row_array();
		}

		// Get Data by UID
		// Read Data Tables based on UID (as ROW) //
		public function getArrayDataByID($table, $attrs, $desc, $idval) {
			$this->db->select($desc);
			$this->db->from($table);
			$this->db->where($attrs, $idval);
			$query = $this->db->get();
			return $query->result_array();
		}
		
		// ** #END OF# READ DATA FROM DATABASE ** //
	}
?>