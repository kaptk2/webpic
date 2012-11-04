<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		if ($_POST)
		{
			// Get POST'ed variables
			$user = $this->input->post('user', TRUE);
			$userpass = $this->input->post('password');

			// FIXME TEMP PASSWORD
			switch ($user)
			{
				case 'andrew@rocky.edu':
					$user = 'user1';
					$pass = 'secret';
					break;
				case 'jacob.carter@rocky.edu':
					$user = 'user2';
					$pass = 'supersecret';
					break;
				default:
					//No user found redirect to signup
					die('I should redirect you to the signup page');
			}

			if ($pass === $userpass)
			{
				$data = array('user' => $user);
				$this->session->set_userdata($data);
				redirect(site_url('/dashboard/album/'));
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
