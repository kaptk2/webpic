<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
	}

	public function index()
	{
		//Load Model(s)
		$this->load->model('album');
		
		// Load Username from cookie TODO
		$user =  'user1';
		
		// Build Listings of Albums
		$albums = directory_map('./users/'.$user, 1);
		$menu['items']=$this->album->build_listing($user, $albums);

		// Load Views
		$this->load->view('header');
		$this->load->view('sidebar_album', $menu);
		$this->load->view('photo_upload_view', array('error' => ' ' ));
		$this->load->view('footer');
	}
	
	public function new_directory()
	{
		// Load Username from cookie TODO
		$user =  'user1';

		if ($_POST)
		{
			// POST'ed data found
			$albumName = $this->input->post('albumName', TRUE);
			// Sanatize the $albumName
			$albumName = preg_replace("/[^A-Za-z0-9]/",'',$albumName);

			mkdir('./users/'.$user.'/'.$albumName, 0755);
			mkdir('./users/'.$user.'/'.$albumName.'/thumbnails', 0755);
			redirect(site_url('/dashboard/album/'.$albumName));
		}

		//Load Model(s)
		$this->load->model('album');

		// Build Listings of Albums
		$albums = directory_map('./users/'.$user, 1);
		$menu['items']=$this->album->build_listing($user, $albums);

		// Load Views
		$this->load->view('header');
		$this->load->view('sidebar_album', $menu);
		$this->load->view('directory_view');
		$this->load->view('footer');
	}
	
	

	public function do_upload()
	{
		// Load Username from cookie TODO
		$user =  'user1';
		
		// Build path to save image
		$album = $this->input->post('album', TRUE);
		$path = './users/'.$user.'/'.$album.'/';

		// Set image upload path
		$config['upload_path'] = $path;
		
		// Set image upload rules
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2000';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('photo_upload_view', $error);
		}
		else
		{
			// Addtional POST variable(s)
			$image = $this->upload->data();

			// Thumbnail creation configuration
			$config['image_library'] = 'gd2';
			$config['source_image'] = $path.$image['file_name'];
			$config['new_image'] = $path.'thumbnails/';
			$config['maintain_ratio'] = TRUE;
			$config['height'] = 200;
			$config['width'] = 200;

			// Load Library
			$this->load->library('image_lib', $config);
			
			// Create thumbnail
			if(!$this->image_lib->resize())
				die($this->image_lib->display_errors());
			
			redirect(site_url('/dashboard/album/'.$album));
		}
	}
}
/* End of file upload.php */
/* Location: ./application/controllers/upload.php */
