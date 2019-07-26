<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Gastos_model extends CI_Model {

    public function __construct() {
        parent::__construct();    
        $this->load->helper('security');
        $this->load->library('session');

    }

    public function getCategoriaEgreso() {
    	$this->db->select("*");
        $this->db->from("categoria");
        $this->db->where("TipoCategoria","1");
        $query = $this->db->get();
        $categoria = $query->result_array();  
        return $categoria;
    }
    
    public function saveExpense($nameExpense, $TypeExpense, $MountExpense,$DateExpense,$priorityExpense) {


        $data_insert = array(
            'nombreGasto' => $nameExpense,
            'categoria_IdCategoria' => $TypeExpense,
            'Cantidad' => $MountExpense,
            'mes_idmes'=> '1',
            'user_iduser'=>'1'
        );

        $this->db->set($data_insert);
        $this->db->insert('gasto');
        $id = $this->db->insert_id();
        $result = ($id>0) ?  1 : 0 ;
        return $result;  
    }

}
