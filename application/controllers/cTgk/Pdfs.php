<?php
	class Pdfs extends CI_Controller {
	    public function __construct() {
	    	parent::__construct();
	    	require APPPATH.'vendor/autoload.php';

	    	// Load model
	    	$this->load->model('data_model');
	    	$this->load->model('extras_model');
	    }

	    // Generate PDF
		public function save_pdf() {
			$in = json_decode($this->input->post('dataArray'));
			$manAwBln = $this->input->get('aw');
			$manAkBln = $this->input->get('ak');
			$manLembar = $this->input->get('lm');

			$pdfFilePath = 'files/temps/tgk-custs-'.time().'.pdf';
			$pdf = new \Mpdf\Mpdf();
				
			$itemNum = count($in); $i = 0;
			foreach ($in as $key => $val) {
				$data['out'] = $this->data_model->getPrintID($val);

				if ($manAwBln) {
					$data['awalbln'] = $manAwBln;
				} else if ($data['out']['TANGGAL_TGK'] == true) {
					$arrTgl = array(
						'01'	=> 'Januari',
						'02'	=> 'Februari',
						'03'	=> 'Maret',
						'04'	=> 'April',
						'05'	=> 'Mei',
						'06'	=> 'Juni',
						'07'	=> 'Juli',
						'08'	=> 'Agustus',
						'09'	=> 'September',
						'10'	=> 'Oktober',
						'11'	=> 'November',
						'12'	=> 'Desember'
					);
					
					$thisMonth	= substr(date('Ym'), 4);
					$repMonth	= substr($data['out']['TANGGAL_TGK'], 4);
					$repYear 	= substr($data['out']['TANGGAL_TGK'], 0, 4);
					$toLembar 	= $data['out']['LEMBAR'];
					$minMont	= (int) $thisMonth - $toLembar;

					if ($minMont == 00) {
						$minMont = 12;
					} else if ($minMont <= -0) {
						$numLenght = strlen($minMont)-1;
						$unMin = substr($minMont, $numLenght);
						$minMont = 12 - $unMin;
					}

					if ($minMont < 10) {
						$data['firstMont'] = $arrTgl['0'.$minMont];
					} else {
						$data['firstMont'] = $arrTgl[$minMont];
					}
						
					if ($minMont <= 12 && $repMonth <= 01) {
						$data['firstYear'] = $repYear-1;
					} else {
						$data['firstYear'] = $repYear;
					}
					
					$data['awalbln'] = $data['firstMont'].' '.$data['firstYear'];
					$data['lastMont'] = $arrTgl[trim($repMonth)];
					$data['lastYear'] = $repYear;	
				} else {
					$data['firstMont']	= '';
					$data['firstYear']	= '';
					$data['lastMont']	= '';
					$data['lastYear']	= '';
					$data['awalbln']	= $data['firstMont'].' '.$data['firstYear'];
				}

				if ($manAkBln) {
					$data['akhirbln'] = $manAkBln;
				} else {
					setlocale(LC_ALL, 'IND');
					$data['akhirbln'] = strftime("%B %Y", strtotime(date('F Y')));
				}

				// Get Data Pegawai/Pejabat
				$data['namapg'] = $this->input->get('n');
				$data['jabatanpg'] = $this->input->get('j');
				$data['nosurat'] = $this->input->get('nosur');
				$data['kedudukan'] = $this->input->get('kdk');

				if ($manLembar) {
					$data['totalLembar'] = $manLembar;
				} else {
					$data['totalLembar'] = $data['out']['LEMBAR'];
				}

				$html = $this->load->view('vdashboard/vmonitoring/vcetak', $data, true);
					
				$pdf->WriteHTML($html);
				if (++$i != $itemNum) {
					$pdf->AddPage();
				}
			}

			$pdf->Output($pdfFilePath, "F");
			echo json_encode(base_url().$pdfFilePath);
		}

	}
?>