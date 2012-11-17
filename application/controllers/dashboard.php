<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		if ($_POST)
		{
			// Get POST'ed variables
			$user = $this->input->post('user', TRUE);
			$userpass = md5($this->input->post('password')); //TODO md5 is not good for passwords

			$password = trim(read_file('./passwords/'.$user));

			if ($password == $userpass)
			{
				$this->session->set_userdata(array('user' => $user));
				redirect(site_url('/dashboard/album/'));
			} else {
				$this->session->set_flashdata('error', 'Username or Password Incorrect');
				redirect(site_url('/dashboard/'));
			}
		}
		$this->load->view('header');
		$this->load->view('sidebar_login');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function album($name='default')
	{
		// Load Username from cookie
		$user =  $this->session->userdata('user');

		if(!$user)
		{
			// Unknown user trying to get in
			$this->session->set_flashdata('error', 'Username or Password Incorrect');
			redirect(site_url('/dashboard/'));
		}
		//Load Model(s)
		$this->load->model('album');



		// Build Listings of Albums
		$albums = directory_map('./users/'.$user, 1);
		$menu['items']=$this->album->build_listing($user, $albums, $name);

		$images = directory_map('./users/'.$user.'/'.$name, 1);
		$data['images'] = array();
		foreach ($images as $image)
		{
			$type = get_mime_by_extension($image);

			switch ($type)
			{
			case "image/jpeg":
			case "image/gif":
			case "image/png":
				array_push($data['images'], $this->album->build_entry($user, $image, $name));
				break;
			}
		}
		//print_r($menu); //DEBUG

		// Load Views
		$this->load->view('header');
		$this->load->view('sidebar_album', $menu);
		$this->load->view('dashboard_view', $data);
		$this->load->view('footer');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('/dashboard'));
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
