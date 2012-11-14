<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function index()
	{
		if ($_POST)
		{
			// Get POST'ed variables
			$user = $this->input->post('user', TRUE);
			$password1 = $this->input->post('password1');
			$password2 = $this->input->post('password2');

			if(read_file('./passwords/'.$user))
				die('Username Already exists'); //TODO make this friendly


			if ($password1 == $password2)
			{
				$password = md5($password1); //TODO NEVER DO THIS IN PRODUCTION
				// All systems go, lets create the user
				if (!write_file('./passwords/'.$user, $password))
					die('Can\'t create file');
				if (!mkdir('./users/'.$user, 0755))
					die('Can\'t create user');
				if (!mkdir('./users/'.$user.'/default', 0755))
					die('Can\'t create default album');
				if(!mkdir('./users/'.$user.'/default/thumbnails', 0755))
					die('Can\'t create default album thumbnails');

				$this->session->set_userdata(array('user' => $user));
				redirect(site_url('/dashboard/album/'));
			}
			die('Passwords don\'t match'); //TODO make this friendly
		}
		// No data has be POST'ed
		$this->load->view('header');
		$this->load->view('sidebar_login');
		$this->load->view('signup_view');
		$this->load->view('footer');
	}
}
/* End of file signup.php */
/* Location: ./application/controllers/signup.php */
