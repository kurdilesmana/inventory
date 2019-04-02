<?php 
defined('BASEPATH') OR exit('No direct script allowed');

class Dashboard extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('login/login_m');
    if(!$this->login_m->logged_id())
    {
      redirect(base_url().'login');
    }   
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['content_view'] = 'Dashboard/dashboard';
		$this->template->index($data);
	}

	public function logout()
  {
    $this->session->sess_destroy();
    redirect('login');
  }
}

?>