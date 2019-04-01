<?php 
defined('BASEPATH') OR exit('No direct script allowed');
/**
 * Control User
 */
class Dashboard extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['content_view'] = 'Dashboard/dashboard';
		$this->template->index($data);
	}
}

?>