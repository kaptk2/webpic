<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		// Load Helpers
		$this->load->helper('file');

		if ($_POST)
		{
			// Get POST'ed variables
			$user = $this->input->post('user', TRUE);
			$userpass = $this->input->post('password');

			$password = read_file('./password/'.$user)
			if ($password) // Make sure password exists
			{
				// Check the password
				if ($password === $userpass)
				{
					$this->session->set_userdata(array('user' => $user));
					redirect(site_url('/dashboard/album/'));
				}
			} else {
				die('I should redirect you to the signup page');
			}
		}
		$this->load->view('header');
		$this->load->view('sidebar_login');
		$this->load->view('login');
		$this->load->view('footer');
	}

	public function album($name='default')
	{
		//Load Model(s)
		$this->load->model('album');

		// Load Username from cookie
		$user =  $this->session->userdata('user');

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
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */
