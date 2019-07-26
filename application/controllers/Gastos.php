<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gastos extends CI_Controller {


	public function __construct() {
        
      parent::__construct();
        
    $this->load->model('sessions_model');
    $this->load->model('gastos_model');
    $this->load->helper('url');
    $this->load->library('session');

    $this->userdata = $this->session->userdata();
    var_dump($this->userdata['session_userdata']);
   	if(empty($this->userdata['session_userdata'])){
   		redirect(login);
   	}

    }


	public function index(){
	    $data['session'] = $this->userdata;
		$data['categorias'] = $this->gastos_model->getCategoriaEgreso();
		$this->load->view('dashboard/header', $data);
		$this->load->view('dashboard/gastos');
		$this->load->view('dashboard/footer');
	}

	public function Graficas(){
	    $data['session'] = $this->userdata;
	    
		$this->load->view('dashboard/header', $data);
		$this->load->view('dashboard/footer');
	}
	
	public function saveExpense(){
		$data = $this->input->post('data'); # add this
		$data = json_decode($data);
		$nameExpense = $data->nameExpense;
		$TypeExpense = $data->TypeExpense;
		$MountExpense = $data->MountExpense;
		$DateExpense = $data->DateExpense;
		$priorityExpense = $data->priorityExpense;
		$result = $this->gastos_model->saveExpense($nameExpense, $TypeExpense, $MountExpense,$DateExpense,$priorityExpense);   
	}

}