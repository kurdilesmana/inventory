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
		$this->load->sharedModel('LoginModel');
		$this->load->sharedModel('UserModel');

    if(!$this->LoginModel->logged_id())
    {
      redirect(base_url().'login');
    }
	}

	function index()
	{
		$tdata['title'] = 'Users';
		$tdata['caption'] = 'Pengelolaan Data User';

		## LOAD LAYOUT ##	
		$ldata['content'] = $this->load->view($this->router->class.'/index',$tdata, true);
		$ldata['script'] = $this->load->view($this->router->class.'/index_js',$tdata, true);
		$this->load->sharedView('base', $ldata);
	}

	function add()
	{
		$tdata['title'] = 'Users';
		$tdata['caption'] = 'Tambah Data User';
		
		if ($_POST) {
			//set form validation
	    $this->form_validation->set_rules('name', 'Nama', 'required');
	    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]');
	    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
	    $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'trim|required|matches[password]');

	    //set message form validation
	    $this->form_validation->set_message('required', '{field} harus diisi.');
	    $this->form_validation->set_message('min_length', '{field} minimal harus {param} karakter.');
	    $this->form_validation->set_message('matches', '{field} harus sama dengan password.');

	    //cek validasi
      if ($this->form_validation->run() == TRUE) {
        //get data dari FORM
        $name = $this->input->post("name", TRUE);
        $username = $this->input->post("username", TRUE);
        $password = MD5($this->input->post('password', TRUE));
        $role = $this->input->post('role', TRUE);

	      //insert data via model
	      $doInsert = $this->UserModel->entriData(array(
	      	'name' => $name,
	      	'username' => $username,
	      	'password' => $password,
	      	'role' => $role,
	      ));

	      //Pengecekan input data user
	      if ($doInsert == 'exist') {
	      	$tdata['error'] = 'Username sudah terdaftar!';
	      } elseif ($doInsert == 'failed') {
	      	$tdata['error'] = 'Data tidak bisa ditambahkan!';
	      } else {
	      	$this->session->set_flashdata('success', 'Berhasil disimpan');
      		redirect(base_url().'users');
	      }
	    }
	  }

		## LOAD LAYOUT ##	
		$ldata['content'] = $this->load->view($this->router->class.'/form',$tdata, true);
		$ldata['script'] = $this->load->view($this->router->class.'/form_js',$tdata, true);
		$this->load->sharedView('base', $ldata);
	}

	function update()
	{
		$tdata['title'] = 'Users';
		$tdata['caption'] = 'Ubah Data User';

		$id = intval($_GET['id']);
		if (!isset($id)) redirect(base_url().'users');

		if ($_POST) {
			//set form validation
	    $this->form_validation->set_rules('name', 'Nama', 'required');
	    $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]');
	    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
	    $this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'trim|required|matches[password]');

	    //set message form validation
	    $this->form_validation->set_message('required', '{field} harus diisi.');
	    $this->form_validation->set_message('min_length', '{field} minimal harus {param} karakter.');
	    $this->form_validation->set_message('matches', '{field} harus sama dengan password.');

	    //cek validasi
      if ($this->form_validation->run() == TRUE) {
        //get data dari FORM
        $name = $this->input->post("name", TRUE);
        $username = $this->input->post("username", TRUE);
        $password = MD5($this->input->post('password', TRUE));
        $role = $this->input->post('role', TRUE);

	      //insert data via model
	      $doInsert = $this->UserModel->entriData(array(
	      	'name' => $name,
	      	'username' => $username,
	      	'password' => $password,
	      	'role' => $role,
	      ));

	      //Pengecekan input data user
	      if ($doInsert == 'exist') {
	      	$tdata['error'] = 'Username sudah terdaftar!';
	      } elseif ($doInsert == 'failed') {
	      	$tdata['error'] = 'Data tidak bisa ditambahkan!';
	      } else {
	      	$this->session->set_flashdata('success', 'Berhasil disimpan');
      		redirect(base_url().'users');
	      }
	    }
	  }

	  ## GET USER ##
		$tdata['lists'] = $this->UserModel->getById($id);

		## LOAD LAYOUT ##	
		$ldata['content'] = $this->load->view($this->router->class.'/form',$tdata, true);
		$ldata['script'] = $this->load->view($this->router->class.'/form_js',$tdata, true);
		$this->load->sharedView('base', $ldata);
	}

  function view()
  {
    $search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
    $limit = $_POST['length']; // Ambil data limit per page
    $start = $_POST['start']; // Ambil data start
    $order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
    $order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
    $order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
    $sql_total = $this->UserModel->count_all(); // Panggil fungsi count_all pada UserModel
    $sql_data = $this->UserModel->filter($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter pada UserModel
    $sql_filter = $this->UserModel->count_filter($search); // Panggil fungsi count_filter pada UserModel
    $callback = array(
        'draw'=>$_POST['draw'], // Ini dari datatablenya
        'recordsTotal'=>$sql_total,
        'recordsFiltered'=>$sql_filter,
        'data'=>$sql_data
    );
    header('Content-Type: application/json');
    echo json_encode($callback); // Convert array $callback ke json
  }
}
?>