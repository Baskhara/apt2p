<?php
	class Excimports extends CI_Controller {
		public function __construct() {
			parent::__construct();

			// Load Library
			$this->load->library('excel');

			// Load Model
			$this->load->model('data_model');
			$this->load->model('cud_model');
		}

		public function EXImport() {
			if(isset($_FILES['importexc']['name'])) {
				$path = $_FILES['importexc']['tmp_name'];
				
				$object = PHPExcel_IOFactory::load($path);

				foreach($object->getWorksheetIterator() as $worksheet) {
					$highRow 		= $worksheet->getHighestRow();
					$highColumn 	= $worksheet->getHighestColumn();

					for($row=2; $row<=$highRow; $row++) {
						$unitap		= $worksheet->getCellByColumnAndRow(0, $row)->getValue();
						$unitup		= $worksheet->getCellByColumnAndRow(1, $row)->getValue();
						$idpel		= $worksheet->getCellByColumnAndRow(2, $row)->getValue();
						$nama_pel	= $worksheet->getCellByColumnAndRow(3, $row)->getValue();
						$tarif		= $worksheet->getCellByColumnAndRow(4, $row)->getValue();
						$daya		= $worksheet->getCellByColumnAndRow(5, $row)->getValue();
						$kogol		= $worksheet->getCellByColumnAndRow(6, $row)->getValue();
						$gardu		= $worksheet->getCellByColumnAndRow(7, $row)->getValue();
						$alamat		= $worksheet->getCellByColumnAndRow(8, $row)->getValue();
						$lembar		= $worksheet->getCellByColumnAndRow(9, $row)->getValue();
						$rpptl		= $worksheet->getCellByColumnAndRow(10, $row)->getValue();
						$rpbpju		= $worksheet->getCellByColumnAndRow(11, $row)->getValue();
						$rpppn		= $worksheet->getCellByColumnAndRow(12, $row)->getValue();
						$rpmat		= $worksheet->getCellByColumnAndRow(13, $row)->getValue();
						$tagsus		= $worksheet->getCellByColumnAndRow(14, $row)->getValue();
						$ujl		= $worksheet->getCellByColumnAndRow(15, $row)->getValue();
						$bp			= $worksheet->getCellByColumnAndRow(16, $row)->getValue();
						$trafo		= $worksheet->getCellByColumnAndRow(17, $row)->getValue();
						$sewatrafo	= $worksheet->getCellByColumnAndRow(18, $row)->getValue();
						$sewakap	= $worksheet->getCellByColumnAndRow(19, $row)->getValue();
						$rptag		= $worksheet->getCellByColumnAndRow(20, $row)->getValue();
						$rpbk		= $worksheet->getCellByColumnAndRow(21, $row)->getValue();
						$bulan		= $worksheet->getCellByColumnAndRow(22, $row)->getValue();
						$koordx		= $worksheet->getCellByColumnAndRow(23, $row)->getValue();
						$koordy		= $worksheet->getCellByColumnAndRow(24, $row)->getValue();


						$data_tgk[] = array(
							'IDPEL'			=> $idpel,
							'LEMBAR'		=> $lembar,
							'RPPTL'			=> $rpptl,
							'RPBPJU'		=> $rpbpju,
							'RPPPN'			=> $rpppn,
							'RPMAT'			=> $rpmat,
							'TAGSUS'		=> $ujl,
							'BP'			=> $bp,
							'TRAFO'			=> $trafo,
							'SEWATRAFO'		=> $sewatrafo,
							'SEWAKAP'		=> $sewakap,
							'RPTAG'			=> $rptag,
							'RPBK'			=> $rpbk,
							'TGL_AKHIR'		=> $bulan,
							'CREATED_BY'	=> $this->session->userdata['logged_in']['username'],
							'DATE_CREATED'	=> date('d/m/Y H:i:s')
						);

						$data_pel[] = array(
							'UNITAP'		=> $unitap,
							'UNITUP'		=> $unitup,
							'IDPEL'			=> $idpel,
							'NAMA_PEL'		=> $nama_pel,
							'ALAMAT'		=> $alamat,
							'TARIF'			=> $tarif,
							'DAYA'			=> $daya,
							'KOGOL'			=> $kogol,
							'GARDU'			=> $gardu,
							'KOORDX'		=> $koordx,
							'KOORDY'		=> $koordy,
							'CREATED_BY'	=> $this->session->userdata['logged_in']['username'],
							'DATE_CREATED'	=> date('d/m/Y H:i:s')
						);
					}
				}

				$this->cud_model->ImportExcelDB($data_tgk);
				$this->cud_model->ImportExcelDBPLG($data_pel);
			}
		}

		public function EXImportD() {
			if (isset($_FILES['importexcd']['name'])) {
				$filename	= $_FILES['importexcd']['name'];
				$fnlength	= strlen($filename) - 4;
				$ext		= substr($filename, $fnlength, 4);
				$path		= str_replace('\\', '/', $_FILES['importexcd']['tmp_name']);
				$user		= $this->session->userdata['logged_in']['username'];
				$date		= date('d/m/Y H:i:s');

				// Truncate external table in case if its not empty
				$this->db->truncate('TB_EXT_TGK');
				
				if ($ext == '.csv') {
					// If file format is .CSV use comma delimited
					$tr = ',';
				} else if ($ext == '.txt') {
					// If file format is .TXT use tab delimited
					$tr = '\\t';
				}

				$plg = "LOAD DATA LOCAL INFILE '$path'
					INTO TABLE TB_PELANGGAN
					FIELDS TERMINATED BY '$tr'
					OPTIONALLY ENCLOSED BY '\"'
					LINES TERMINATED BY '\\n'
					IGNORE 1 LINES
					(@UNITAP,@UNITUP,@IDPEL,@NAMA,@TARIF,@DAYA,@KOGOL,@GARDU,@ALAMAT,@LEMBAR,@RPPTL,@RPBPJU,@RPPPN,@RPMAT,@TAGSUS,@UJL,@BP,@TRAFO,@SEWATRAFO,@SEWAKAP,@RPTAG,@RPBK,@BULAN,@KOORDX,@KOORDY)
					SET IDPEL=@IDPEL,NAMA_PEL=@NAMA,ALAMAT=@ALAMAT,UNITAP=@UNITAP,UNITUP=@UNITUP,TARIF=@TARIF,DAYA=@DAYA,KOGOL=@KOGOL,GARDU=@GARDU,KOORDX=@KOORDX,KOORDY=@KOORDY,CREATED_BY='$user',DATE_CREATED='$date'";

				$tgk = "LOAD DATA LOCAL INFILE '$path'
					INTO TABLE TB_EXT_TGK
					FIELDS TERMINATED BY '$tr'
					OPTIONALLY ENCLOSED BY '\"'
					LINES TERMINATED BY '\\n'
					IGNORE 1 LINES
					(@UNITAP,@UNITUP,@IDPEL,@NAMA,@TARIF,@DAYA,@KOGOL,@GARDU,@ALAMAT,@LEMBAR,@RPPTL,@RPBPJU,@RPPPN,@RPMAT,@TAGSUS,@UJL,@BP,@TRAFO,@SEWATRAFO,@SEWAKAP,@RPTAG,@RPBK,@BULAN)
					SET IDPEL=@IDPEL,LEMBAR=@LEMBAR,RPPTL=@RPPTL,RPBPJU=@RPBPJU,RPPPN=@RPPPN,RPMAT=@RPMAT,TAGSUS=@TAGSUS,UJL=@UJL,BP=@BP,TRAFO=@TRAFO,SEWATRAFO=@SEWATRAFO,SEWAKAP=@SEWAKAP,RPTAG=@RPTAG,RPBK=@RPBK,TGL_AKHIR=@BULAN,KALITGK=1,CREATED_BY='$user',DATE_CREATED='$date'";

				$this->db->query($plg);
				$this->db->query($tgk);
				
				// Get data from external table
				$ext_tb = $this->db->select('IDPEL,LEMBAR,RPPTL,RPBPJU,RPPPN,RPMAT,TAGSUS,UJL,BP,TRAFO,SEWATRAFO,SEWAKAP,RPTAG,RPBK,TGL_AKHIR,KALITGK')->where_not_in('IDPEL', '0')->get('TB_EXT_TGK');
				
				// Get data from main table
				$tb_tgk = $this->db->select('IDPEL,LEMBAR,KALITGK')->get('TB_TUNGGAKAN');

				// Insert data that is not exists on main table
				$newData = $this->db->query('SELECT IDPEL,LEMBAR,RPPTL,RPBPJU,RPPPN,RPMAT,TAGSUS,UJL,BP,TRAFO,SEWATRAFO,SEWAKAP,RPTAG,RPBK,TGL_AKHIR,KALITGK,CREATED_BY,DATE_CREATED FROM TB_EXT_TGK WHERE IDPEL NOT IN (SELECT IDPEL FROM TB_TUNGGAKAN WHERE IDPEL != "0")');
				$ins_newData = $this->db->insert_batch('TB_TUNGGAKAN', $newData->result_array());

				// Check if external table is not empty
				if ($ext_tb->num_rows() > 0) {
					// Fetch data from main table
					foreach ($tb_tgk->result_array() as $key => $tgk) {
						// Fetch data from external table
						foreach ($ext_tb->result_array() as $key => $ext) {
							// Compare if IDPEL exist on both table
							// Get value of LEMBAR in main table and increment by value from external table
							if ($ext['IDPEL'] == $tgk['IDPEL']) {
								// Get value of LEMBAR for the corresponding IDPEL
								$tgkLembar = $tgk['LEMBAR'];
								//+'$tgkLembar'
								$getLembar = "LEMBAR AS NEWLEMBAR";

								// Set new select with totalLembar added
								$select = $this->db->select('IDPEL,'.$getLembar.',TGL_AKHIR')->where('IDPEL', $tgk['IDPEL'])->get('TB_EXT_TGK');

								foreach ($select->result_array() as $key => $newVal) {
									$data = array(
										'LEMBAR' => $newVal['NEWLEMBAR'],
										'TGL_AKHIR' => $newVal['TGL_AKHIR'],
										'KALITGK' => $tgk['KALITGK']+$ext['KALITGK']
									);

									// Insert data from select result
									$ins = $this->db->where('IDPEL', $tgk['IDPEL'])->update('TB_TUNGGAKAN', $data);
								}
							}
						}
					}
				}

				// Truncate external table
				$this->db->where('IDPEL', '0')->delete('TB_TUNGGAKAN');
				$this->db->where('IDPEL', '0')->delete('TB_PELANGGAN');
				$this->db->truncate('TB_EXT_TGK');
			}
		}

	// End Of Line Constructor
	}
?>