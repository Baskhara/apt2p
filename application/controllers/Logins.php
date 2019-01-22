<?php
	class Logins extends CI_Controller {
		public function __construct() {
			parent::__construct();

			// Load Library
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->library('user_agent');

			// Load Model
			$this->load->model('login_model');

			// Enable profiler
			//$this->output->enable_profiler(true);
			
			// Check URi and Browser
			$this->uriCheck();
		}

		public function uriCheck() {
			// Check URi
			/*
			$url = $_SERVER['HTTP_HOST'].''.str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

			if ($url == 'mylocal/cirob/' || $url == 'localhost/cirob/' || $url == '127.0.0.1/cirob/') {
				redirect('http://pln.cal');
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

		public function index() {
			$url = $_SERVER['HTTP_HOST'].''.str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);

			redirect('http://'.$url.'login');
		}

		public function default_routes($page = 'vlogin') {
			if(!file_exists(APPPATH.'views/'.$page.'.php')) {
				show_404();
			}

			$data['error_message']	= '';
			$data['something']		= '';

			$this->load->view($page, $data);
		}

		public function user_login_process() {
			$this->form_validation->set_rules('username', 'username', 'trim|required');
			$this->form_validation->set_rules('password', 'password', 'trim|required');

			if ($this->form_validation->run() == false) {
				if(isset($this->session->userdata['logged_in'])){
					$response['status'] = 'logged_in';
				} else {
					$response['status'] = 'error';
				}
			} else {
				$data['username'] = $this->input->post('username');
				$password = $this->input->post('password');
				$result = $this->login_model->login($data);

				if ($result == true) {
					foreach ($result as $key => $rs) {
						if ($rs->USERNAME == $data['username']) {
							if (password_verify($password, $rs->PASSWORD)) {
								$session_data = array(
									'username' => $rs->USERNAME,
									'level' => $rs->LVL,
									'nip' => $rs->NIP
								);

								$this->session->set_userdata('logged_in', $session_data);
								$response['status'] = 'logged_in';
							} else {
								$response['status'] = 'error';
							}
						}
					}
				} else {
					$response['status'] = 'error';
				}
			}

			header('Content-type: application/json');
			echo json_encode($response);
		}

		public function registers() {
			$hashpass = password_hash($this->input->post('new-password'), PASSWORD_DEFAULT);

			$data = array(
				'USERNAME' => $this->input->post('new-username'),
				'PASSWORD' => $hashpass,
				'LVL' => $this->input->post('new-level'),
				'NAMA' => $this->input->post('nama-user')
			);

			$this->login_model->register_user($data);
			redirect(base_url());
		}

		public function changePass() {
			$data['username'] = $this->session->userdata['logged_in']['username'];
			$curr_password = $this->input->post('current-password');
			$new_password = $this->input->post('new-password');
			$conf_password = $this->input->post('confirm-password');

			$result = $this->login_model->login($data);
			$pw['PASSWORD'] = password_hash($conf_password, PASSWORD_DEFAULT);

			foreach ($result as $key => $rs) {
				if ($result == true) {
					if (password_verify($curr_password, $rs->PASSWORD)) {
						if ($curr_password != $new_password) {
							if ($new_password == $conf_password) {
								if ($this->login_model->changePassM($pw) == true) {
									$response['status'] = 'success';
								} else {
									$response['status'] = 'failed';
								}
							} else {
								$response['status'] = 'unmatched';
							}
						} else {
							$response['status'] = 'identical';
						}
					} else {
						$response['status'] = 'wrong';
					}
				}
			}

			header('Content-type: application/json');
			echo json_encode($response);
		}

		public function logout() {
			$sess_array = array(
				'username' => '',
				'level' => '',
				'nama' => ''
			);
			$this->session->unset_userdata('logged_in', $sess_array);
			//$data['message_display'] = 'Successfully Logout';
			redirect(base_url());
		}

	// Constructor End of Line
	}
?>