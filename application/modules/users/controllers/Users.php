<?php 
defined('BASEPATH') OR exit('No direct script allowed');
/**
 * Control User
 */
class Users extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = 'Users';
		$data['content_view'] = 'Users/users';
		$this->template->index($data);
	}
}

?>