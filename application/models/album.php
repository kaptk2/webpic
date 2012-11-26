<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Album extends CI_Model
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}

	function build_listing($user, $albums, $currentAlbum='')
	{
		// This function builds a album directory listing
		$menu = array();

		foreach ($albums as $albumItem)
		{
			$link = site_url("/dashboard/album/$albumItem");

			if ($albumItem == $currentAlbum)
				$item = "<li class='active'><a href='$link'>$albumItem</a></li>";
			else
				$item = "<li><a href='$link'>$albumItem</a></li>";

			array_push($menu, $item);
		}
		return $menu;
	}

    function build_entry($user, $fileName, $albumName)
    {
	$thumbnail = base_url("/users/$user/$albumName/thumbnails/$fileName");
	$link = base_url("/users/$user/$albumName/$fileName");
	$url = "<a href='$link' class='draggable' rel='lightbox[$albumName]'><img src='$thumbnail'/></a>";
       return $url;
    }

    function delete_pic($image_url)
    {
	unlink($image_url); //change image url to build off of user and base_url
    }   
}

/* End of file album.php */
/* Location: ./application/models/album.php */
