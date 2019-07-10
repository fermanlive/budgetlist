<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {


	public function __construct() {
        
      parent::__construct();
        
    $this->load->model('sessions_model');
    $this->load->helper('url');
    $this->load->library('session');
    }


	public function index(){
		$this->load->view('index');
	}
	
	public function registro() {
		$this->load->view('register');
	}

	 public function save_register()
	{
		$name = $this->input->post('name');           
        $email = $this->input->post('email');           
        $password = $this->input->post('password');  
        $result = $this->sessions_model->saveRegister($name, $email, $password);   
		echo $result;
	}	
	
	public function login()
	{
		$this->load->view('login');
	}	

	public function loginvalidate()
	{        
        $email = $this->input->post('email'); 
        $password = $this->input->post('password');
        $result = $this->sessions_model->Dologin($email,$password);
       	$result > 0 ? redirect('register/index') :  redirect('login');
	}	
}
