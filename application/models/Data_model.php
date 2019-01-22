<?php
	class Data_model extends CI_Model {
		public function __construct() {
			
		}

		// ** READ DATA FROM DATABASE ** //
		//
		// Get Something //
		public function getData($desc,$attrs,$table,$idval,$data) {
			$this->db->select($desc);
			$this->db->from($table);

			if ($idval != null) {
				$this->db->where($attrs, $idval);
			}

			return $this->db->get();
		}

		// Read UNITAP //
		public function getUnitAP() {
			$this->db->select('UNITAP,WIL,NAMA');
			$this->db->from('TB_UNITAP');
			$query = $this->db->get();
			return $query->result_array();
		}

		// Read UNITUP //
		public function getUnitUP() {
			$this->db->select('TB_UNITUP.UNITUP,RAYON,TB_UNITUP.UNITAP,NAMA');
			$this->db->from('TB_UNITUP');
			$this->db->join('TB_UNITAP', 'TB_UNITUP.UNITAP = TB_UNITAP.UNITAP');
			$this->db->order_by('UNITUP');
			$query = $this->db->get();
			return $query->result_array();
		}

		// Read Customer //
		public function getCusts() {
			$this->db->select('IDPEL,NAMA_PEL AS NAMA,ALAMAT,UNITAP,UNITUP,KOORDX,KOORDY,TARIF,DAYA,KOGOL,GARDU');
			$this->db->from('TB_PELANGGAN');
			$this->db->order_by('IDPEL');
			$query = $this->db->limit(100)->get();
			return $query->result_array();
		}

		// Read View Tunggakan //
		public function getVTGK($start,$length,$data,$order,$dir) {
			$this->db->select('IDTGK,UNITAP,UNITUP,TB_TUNGGAKAN.IDPEL,NAMA_PEL AS NAMA,TARIF,DAYA,KOGOL,GARDU,ALAMAT,KOORDX,KOORDY,LEMBAR,RPPTL,RPBPJU,RPPPN,RPMAT,TAGSUS,UJL,BP,TRAFO,SEWATRAFO,SEWAKAP,RPTAG,RPBK,TGL_AKHIR AS TANGGAL_TGK,KALITGK');
			$this->db->from('TB_TUNGGAKAN');
			$this->db->join('TB_PELANGGAN', 'TB_TUNGGAKAN.IDPEL = TB_PELANGGAN.IDPEL');
			$this->db->where_not_in('TB_TUNGGAKAN.IDPEL', '0');

			if ($data['search']) {
				$this->db->like('NAMA_PEL', $data['search']);
				$this->db->or_like('TB_TUNGGAKAN.IDPEL', $data['search']);
				$this->db->or_like('TB_PELANGGAN.TARIF', $data['search']);
			}

			// Check if UNITAP and/or UNITUP has a value of 1 (All)
			if ($data['idap'] == '1') {
				// Get All UNITAP & UNITUP
			} else {
				$this->db->where('UNITAP', $data['idap']);
				if ($data['idup'] == '1') {
					// Get All UNITUP
				} else {
					$this->db->where('UNITUP', $data['idup']);
				}
			}

			if ($data['stats'] == '3') {
				$this->db->where('LEMBAR >=', $data['stats']);
			} else if ($data['stats'] == '1' || $data['stats'] == '2') {
				$this->db->where('LEMBAR', $data['stats']);
			}

			if ($data['kalitgk'] == '3') {
				$this->db->where('KALITGK >=', $data['kalitgk']);
			} else if ($data['kalitgk'] == '1' || $data['kalitgk'] == '2') {
				$this->db->where('KALITGK', $data['kalitgk']);
			}

			if ($data['kogols']) {
				$this->db->where('KOGOL', $data['kogols']);
			}
			
			if ($order != null) {
				$this->db->order_by($order, $dir);
			}

			return $this->db->limit($length,$start)->get();
		}

		// Read TB_PELANGGAN //
		public function getVPlg($start,$length,$data,$order,$dir) {
			$this->db->select('IDPEL,NAMA_PEL AS NAMA,ALAMAT,UNITAP,UNITUP,KOORDX,KOORDY,TARIF,DAYA,KOGOL,GARDU');
			$this->db->from('TB_PELANGGAN');

			if ($data['search']) {
				$this->db->like('NAMA_PEL', $data['search']);
				$this->db->or_like('IDPEL', $data['search']);
			}

			// Check if UNITAP and/or UNITUP has a value of 1 (All)
			if ($data['idap'] == '1') {
				// Get All UNITAP & UNITUP
			} else {
				$this->db->where('UNITAP', $data['idap']);
				if ($data['idup'] == '1') {
					// Get All UNITUP
				} else {
					$this->db->where('UNITUP', $data['idup']);
				}
			}

			if ($order != null) {
				$this->db->order_by($order, $dir);
			}

			$this->db->limit($length,$start);
			return $this->db->get();
		}

		// Count All Data TGK //
		public function countTgk($data) {
			$this->db->select('COUNT(IDTGK) AS num');
			$this->db->join('TB_PELANGGAN', 'TB_TUNGGAKAN.IDPEL = TB_PELANGGAN.IDPEL');
			$this->db->where_not_in('TB_TUNGGAKAN.IDPEL', '0');
			
			// Check if UNITAP and/or UNITUP has a value of 1 (All)
			if ($data['title'] == 'TGK') {
				if ($data['idap'] == '1') {
					// Get All UNITAP & UNITUP
				} else {
					$this->db->where('UNITAP', $data['idap']);
					if ($data['idup'] == '1') {
						// Get All UNITUP
					} else {
						$this->db->where('UNITUP', $data['idup']);
					}
				}
	
				if ($data['stats'] == '3') {
					$this->db->where('LEMBAR >=', $data['stats']);
				} else if ($data['stats'] == '1' || $data['stats'] == '2') {
					$this->db->where('LEMBAR', $data['stats']);
				}

				if ($data['kalitgk'] == '3') {
					$this->db->where('KALITGK >=', $data['kalitgk']);
				} else if ($data['kalitgk'] == '1' || $data['kalitgk'] == '2') {
					$this->db->where('KALITGK', $data['kalitgk']);
				}
	
				if ($data['kogols']) {
					$this->db->where('KOGOL', $data['kogols']);
				}
			}

			$query = $this->db->get('TB_TUNGGAKAN');
			$result = $query->row();
			if (isset($result)) {
				return $result->num;
			}
			return 0;
		}

		// Count All Data TGK //
		public function countPlg($data) {
			$this->db->select('COUNT(IDPEL) AS num');

			if ($data['title'] == 'PLG') {
				// Check if UNITAP and/or UNITUP has a value of 1 (All)
				if ($data['idap'] == '1') {
					// Get All UNITAP & UNITUP
				} else {
					$this->db->where('UNITAP', $data['idap']);
					if ($data['idup'] == '1') {
						// Get All UNITUP
					} else {
						$this->db->where('UNITUP', $data['idup']);
					}
				}
			}
			$query = $this->db->get('TB_PELANGGAN');
			$result = $query->row();
			if (isset($result)) {
				return $result->num;
			}
			return 0;
		}

		// Read UNITAP from Wil //
		public function getModelAP($idap) {
			$this->db->select('UNITAP,NAMA');
			$this->db->from('TB_UNITAP');
			$this->db->where('WIL', $idap);
			$query = $this->db->get();
			return $query->result_array();
		}

		// Read UNITUP from UNITAP //
		public function getModelUP($idup) {
			$this->db->select('UNITUP,RAYON');
			$this->db->from('TB_UNITUP');
			$this->db->where('UNITAP', $idup);
			$query = $this->db->get();
			return $query->result_array();
		}

		// Read Data TGK Tables based on IDPEL //
		public function getModelID($data) {
			$this->db->select('IDTGK,UNITAP,UNITUP,IDPEL,NAMA,TARIF,DAYA,KOGOL,GARDU,ALAMAT,LEMBAR,RPPTL,RPBPJU,RPPPN,RPMAT,TAGSUS,UJL,BP,TRAFO,SEWATRAFO,SEWAKAP,RPTAG,RPBK,TANGGAL_TGK');
			$this->db->from('VIEW_TUNGGAKAN');
			$this->db->like('IDPEL', $data);
			$query = $this->db->get();
			return $query->result_array();
		}

		// Read Data PLG Tables based on IDPEL //
		public function getCustsByCats($data) {
			$this->db->select('IDPEL,NAMA_PEL AS NAMA,ALAMAT,UNITAP,UNITUP,KOORDX,KOORDY,TARIF,DAYA,KOGOL,GARDU');
			$this->db->from('TB_PELANGGAN');
			$this->db->order_by('IDPEL');
			
			// Check if UNITAP and/or UNITUP has a value of 1 (All)
			if ($data['idap'] == '1') {
				// Get All UNITAP & UNITUP
			} else {
				$this->db->where('UNITAP', $data['idap']);
				if ($data['idup'] == '1') {
					// Get All UNITUP
				} else {
					$this->db->where('UNITUP', $data['idup']);
				}
			}

			$query = $this->db->get();
			return $query->result_array();
		}

		// Read Data PLG Tables based on IDPEL //
		public function getCustsByID($data) {
			$this->db->select('IDPEL,NAMA_PEL AS NAMA,ALAMAT,UNITAP,UNITUP,KOORDX,KOORDY,TARIF,DAYA,KOGOL,GARDU');
			$this->db->from('TB_PELANGGAN');
			$this->db->order_by('IDPEL');
			$this->db->like('IDPEL', $data);
			$this->db->or_like('NAMA_PEL', $data);
			$this->db->limit(25);
			$query = $this->db->get();
			return $query->result();
		}

		// Read Data PLG Tables based on IDPEL (as ROW) //
		public function getRowCustsByID($data) {
			$this->db->select('IDPEL,NAMA_PEL AS NAMA,ALAMAT,UNITAP,UNITUP,KOORDX,KOORDY,TARIF,DAYA,KOGOL,GARDU');
			$this->db->from('TB_PELANGGAN');
			$this->db->where('IDPEL', $data);
			$query = $this->db->get();
			return $query->row_array();
		}

		// Read Data PLG Tables based on IDPEL (as ROW) //
		public function getRowTgkByID($data) {
			$this->db->select('IDTGK,UNITAP,UNITUP,TB_TUNGGAKAN.IDPEL,NAMA_PEL AS NAMA,TARIF,DAYA,KOGOL,GARDU,ALAMAT,LEMBAR,RPPTL,RPBPJU,RPPPN,RPMAT,TAGSUS,UJL,BP,TRAFO,SEWATRAFO,SEWAKAP,RPTAG,RPBK,TGL_AKHIR AS TANGGAL_TGK,KALITGK,KOORDX,KOORDY');
			$this->db->from('TB_TUNGGAKAN');
			$this->db->join('TB_PELANGGAN', 'TB_TUNGGAKAN.IDPEL = TB_PELANGGAN.IDPEL');
			$this->db->where_not_in('TB_TUNGGAKAN.IDPEL', '0');
			$this->db->like('TB_TUNGGAKAN.IDTGK', $data);
			$query = $this->db->get();
			return $query->row_array();
		}

		// Read data based on IDPEL for Print //
		public function getPrintID($val) {
			$this->db->select('IDTGK,TB_PELANGGAN.UNITAP,TB_UNITAP.NAMA AS AP,TB_PELANGGAN.UNITUP,TB_TUNGGAKAN.IDPEL,NAMA_PEL AS NAMA,TARIF,DAYA,KOGOL,GARDU,RAYON,LEMBAR,RPPTL,RPBPJU,RPPPN,RPMAT,TAGSUS,UJL,BP,TRAFO,SEWATRAFO,SEWAKAP,RPTAG,RPBK,TGL_AKHIR AS TANGGAL_TGK,KALITGK');
			$this->db->from('TB_TUNGGAKAN');
			$this->db->join('TB_PELANGGAN', 'TB_TUNGGAKAN.IDPEL = TB_PELANGGAN.IDPEL');
			$this->db->join('TB_UNITAP', 'TB_PELANGGAN.UNITAP = TB_UNITAP.UNITAP');
			$this->db->join('TB_UNITUP', 'TB_PELANGGAN.UNITUP = TB_UNITUP.UNITUP');
			$this->db->where_not_in('TB_TUNGGAKAN.IDPEL', '0');
			$this->db->where('TB_TUNGGAKAN.IDPEL', $val);
			$query = $this->db->get();
			return $query->row_array();
		}

		// ## UNUSED ## //

		/*/ Read Data Tunggakan from View //
		public function getViewTGK() {
			$this->db->select('UNITAP,UNITUP,IDPEL,NAMA,TARIF,DAYA,KOGOL,GARDU,ALAMAT,LEMBAR,RPPTL,RPBPJU,RPPPN,RPMAT,TAGSUS,UJL,BP,TRAFO,SEWATRAFO,SEWAKAP,RPTAG,RPBK,TANGGAL_TGK');
			$this->db->from('VIEW_TUNGGAKAN');
			$query = $this->db->get();
			return $query->result_array();
		}*/

		/*/ Count All Data TGK //
		public function countMTgk() {
			$this->db->select('MAX(IDTGK) AS num');
			$query = $this->db->get('TB_TUNGGAKAN');
			$this->db->where_not_in('IDPEL', '0');
			$result = $query->row();
			if (isset($result)) {
				return $result->num;
			}
			return 0;
		}*/

		/*/ Read Data TGK Tables based on Category //
		public function getModelDT($data) {
			$this->db->select('IDTGK,UNITAP,UNITUP,IDPEL,NAMA,TARIF,DAYA,KOGOL,GARDU,ALAMAT,LEMBAR,RPPTL,RPBPJU,RPPPN,RPMAT,TAGSUS,UJL,BP,TRAFO,SEWATRAFO,SEWAKAP,RPTAG,RPBK,TANGGAL_TGK');
			$this->db->from('VIEW_TUNGGAKAN');

			// Check if UNITAP and/or UNITUP has a value of 1 (All)
			if ($data['idap'] == '1') {
				// Get All UNITAP & UNITUP
			} else {
				$this->db->where('UNITAP', $data['idap']);
				if ($data['idup'] == '1') {
					// Get All UNITUP
				} else {
					$this->db->where('UNITUP', $data['idup']);
				}
			}

			if ($data['stats'] != 'null') {
				if ($data['stats'] == '0') {
					$this->db->where('LEMBAR < 1');
				} else if ($data['stats'] == '1') {
					$this->db->where('LEMBAR >= 1');
				}
			}

			$query = $this->db->get();
			return $query->result_array();
		}*/

		// ## END OF UNUSED ## //


		// ** #END OF# READ DATA FROM DATABASE ** //
	}
?>