<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class sessions_model extends CI_Model {

    public function __construct() {
        parent::__construct();    
        $this->load->helper('security');
    }

    public function saveRegister($name,$email,$password) {
        $password = do_hash($password, 'md5'); // MD5

        $data_insert = array(
            'Username' => $name,
            'email' => $email,
            'password' => $password,
        );

        $this->db->set($data_insert);
        $this->db->insert('user');
        $id = $this->db->insert_id();
        $result = ($id>0) ?  1 : 0 ;
        return $result;  
    }

}
