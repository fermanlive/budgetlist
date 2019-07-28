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
   	if(empty($this->userdata['session_userdata'])){
   		redirect(login);
   	}

    }


	public function index(){
	    $data['session'] = $this->userdata['session_userdata'];
		$data['categorias'] = $this->gastos_model->getCategoriaEgreso();
		$data['months'] = $this->gastos_model->getAllMonths($this->userdata['session_userdata']['iduser']);
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
	public function saveMonth(){
		$data = $this->input->post('data'); # add this
		$data = json_decode($data);
		$DateInitMonth = $data->DateInitMonth;
		$DateEndMonth = $data->DateEndMonth;
		$nameMonth = $data->nameMonth;
		$iduser = $this->userdata['session_userdata']['iduser'];
		$result = $this->gastos_model->saveMonth($DateInitMonth,$DateEndMonth,$nameMonth,$iduser);   
		echo 1 ;
	}

	public function reloadMonth(){
		$iduser = $this->userdata['session_userdata']['iduser'];
		$result = $this->gastos_model->getAllMonths($iduser);   
		echo json_encode($result);
	}

	public function deleteMonth($idmonth){
		$iduser = $this->userdata['session_userdata']['iduser'];
		$result = $this->gastos_model->deleteMonth($idmonth,$iduser);  
		exit;
	}
}