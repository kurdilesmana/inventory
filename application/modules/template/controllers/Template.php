<?php 
defined('BASEPATH') OR exit('No direct script allowed');
/**
 * Control User
 */
class Template extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}

	public function index($data = Null)
	{
		$this->load->view('base', $data);	
	}
}

?>