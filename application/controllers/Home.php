<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	protected array $data = [];
	private $user;
	private $guest;


	public function index()
	{
		// load views as content in template
		$contents = '';
		$contents .= $this->load->view('front/partials/navigation', $this->get_data(), TRUE);
		$contents .= $this->load->view('front/intro', $this->get_data(), TRUE);
		$contents .= $this->load->view('front/partials/footer', $this->get_data(), TRUE);
		$this->template->load('layout/home', $contents, $this->get_data());
	}



	private function get_data()
	{
		// set datas to load in views
		$this->data['title'] = "LinkedMenu CMS | Gestion d'établissement de menu et carte pour professionnels de la restauration";
		$this->data['nav_items'] = array(
			'Trouver un établissment' 	=> '/home/search',
			'Présentation' 				=> '/home/intro',
			'Démonstration' 			=> '/home/demo',
			'Essayez le CMS' 			=> '/home/registration', 
			'Connexion' 				=> '/home/login'
		);

		return $this->data;
	}



	public function search()
	{
		// load views as content in template
		$contents = '';
		$contents .= $this->load->view('front/partials/navigation', $this->get_data(), TRUE);
		$contents .= $this->load->view('front/search', $this->get_data(), TRUE);
		$contents .= $this->load->view('front/partials/footer', $this->get_data(), TRUE);
		$this->template->load('layout/home', $contents, $this->get_data());
	}



	public function intro()
	{
		// load views as content in template
		$contents = '';
		$contents .= $this->load->view('front/partials/navigation', $this->get_data(), TRUE);
		$contents .= $this->load->view('front/specs', $this->get_data(), TRUE);
		$contents .= $this->load->view('front/partials/footer', $this->get_data(), TRUE);
		$this->template->load('layout/home', $contents, $this->get_data());
	}



	public function demo()
	{
		// load views as content in template
		$contents = '';
		$contents .= $this->load->view('front/partials/navigation', $this->get_data(), TRUE);
		$contents .= $this->load->view('front/demo', $this->get_data(), TRUE);
		$contents .= $this->load->view('front/partials/footer', $this->get_data(), TRUE);
		$this->template->load('layout/home', $contents, $this->get_data());
	}



	public function registration(string $error = NULL)
	{
		// form validation while false display form until inputs are filled and rules true
		// TODO : Add in form_validation registration a callback for blacklisted email Ex : yopmail.com
		if ($this->form_validation->run('registration') === FALSE) {

			// load views as content in template
			$contents = '';
			$contents .= $this->load->view('front/partials/navigation', $this->get_data(), TRUE);
			$contents .= $this->load->view('front/registration', $this->get_data(), TRUE);
			$contents .= $this->load->view('front/partials/footer', $this->get_data(), TRUE);
			$this->template->load('layout/home', $contents, $this->get_data());

		} elseif ($this->form_validation->run() === TRUE) { // form inputs are valid, lets register user

			if ($this->guest_registration() !== FALSE) { // user creation succeeded

				// prepare datas for account email validation
				$body['activation_link'] = base_url("/home/email_validation/{$this->guest->id}?token={$this->guest->activation_hash}");
				
				// prepare body email message
				$message = $this->load->view('layout/email', $body, TRUE);
				$mail_datas = array(
					'from' => array('address' => 'activation@linkedmenu.local', 'DN' => 'LinkedMenu CMS'),
					'to' => $this->guest->email,
					'subject' => 'Finalisez votre inscription',
					'message' => $message,
				);

				// send validation email and redirect
				$this->send_email($mail_datas);
				redirect(base_url('/home/registration/success?user=' . $this->guest->email));


			} else { // else failed warn user

				redirect(base_url('/home/registration/failed'));
			}

		} else { // else something goes wrong in registration process

			redirect(base_url('/home/registration/failed'));

		}
	
	}



	public function email_validation(string $id = NULL)
	{
		// load prerequisite model
		$this->load->model('Users_model', 'users');


		// var set from param & GET sent to method
		$result = '';
		$token = $this->input->get('token', TRUE);
		$this->user = isset($id) ? $this->users->get_by_id($id, 'id,email,activation_hash') : NULL;

		// check param & GET
		if (!isset($id, $token) || !is_object($this->user)) {

			$result = 'failed';

		} else {

			$activation = ($this->user->activation_hash === $token) ? $this->users->activate($this->user->id) : FALSE;

			if ($activation === TRUE) {
				$result = 'succeeded';
			} else {
				echo '<pre>';
				print_r($activation);
				echo '</pre>';
				$result = 'failed';
			}

		}

		redirect(base_url("/home/login/activation{$result}"));

	}



	public function login(string $error = NULL)
	{
		// settings of form_validation 
		$this->form_validation->set_rules('userName', 'Username', 'required');
		$this->form_validation->set_rules('inputPassword', 'Password', 'required');
		$this->form_validation->set_error_delimiters('<p class="text-danger font-weight-normal">', '</p>');


		// form validation while false display form until inputs are filled
		if ($this->form_validation->run() === FALSE) {

			// load views as content in template
			$contents = '';
			$contents .= $this->load->view('front/partials/navigation', $this->get_data(), TRUE);
			$contents .= $this->load->view('front/login', $this->get_data(), TRUE);
			$contents .= $this->load->view('front/partials/footer', $this->get_data(), TRUE);
			$this->template->load('layout/home', $contents, $this->get_data());

		} elseif ($this->guest_authentication()) { // guest user authentication

				if ($this->user->active) { // user account is valid AND active

					// set user values in codeigniter $_SESSION var
					$this->session->set_userdata('user_authenticated', TRUE);
					$this->session->set_userdata('user_id', $this->user->id);
					$this->session->set_userdata('email', $this->user->email);
					$this->session->set_userdata('session_start', date('Y-m-d H:i:s'));
					redirect(base_url('/backoffice'));
	
				} else { // else user account is valid BUT inactive
	
					$this->session->sess_destroy();
					redirect(base_url('/home/login/inactive'));
				}

		} else { // guest authentication failed

			redirect(base_url('/home/login/authfailed'));

		}	

	}



	private function guest_authentication()
	{
		// load prerequisite model
		$this->load->model('Users_model', 'users');


		// set form POSTs values in var
		$username =  $this->input->post('userName');
		$password =  $this->input->post('inputPassword');


		// search user in DB
		$this->user = $this->users->get_by_username($username);


		// verify user password
		if (is_object($this->user) && password_verify($password, $this->user->password)) {
			return TRUE;
		} else { // else if login or password failed
			return FALSE;
		}

	}



	private function guest_registration() 
	{
		// load prerequisite model
		$this->load->model('Users_model', 'users');


		// set form POSTs values in var
		$username =  $this->input->post('userName'); // in our case username = user email
		$password =  $this->input->post('inputPassword');


		// compute hash activation and password and put all of this in array
		$data = array(
			'email' => $username,
			'password' => password_hash($password, PASSWORD_DEFAULT),
			'activation_hash' => password_hash($username . $password, PASSWORD_DEFAULT)
		);
		

		// create guest user in DB
		$this->guest = $this->users->register($data);


		// verify user creation and return it
		if (is_object($this->guest)) {
			return $this->guest;
		} else { // else return false
			echo '<pre>';
			print_r($this->guest);
			echo '</pre>';
			return FALSE;
		}

	}



	private function send_email(array $mail_datas)
	{
		// load prerequisite libraries
		$this->load->library('email');


		// email construction
		$this->email->from($mail_datas['from']['address'], $mail_datas['from']['DN']);
		$this->email->reply_to($mail_datas['from']['address']);
		$this->email->to($mail_datas['to']);
		$this->email->subject($mail_datas['subject']);
		$this->email->message($mail_datas['message']);


		// send the mail
		if (!$this->email->send(FALSE)) {
			echo ($this->email->print_debugger());
		} else {
			return TRUE;
		}

	}

}
