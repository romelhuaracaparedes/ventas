<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

require_once 'Base_model.php';

class Cliente_model extends Base_model {
	
	function __construct() {
        parent::__construct('clientes','id_cliente'); 

	}

	public function _get_clientes(){
        $this->db->select('nombres');
        $this->db->from($this->model_name); 
        $this->db->where('flg_estado = 1');
        $this->db->order_by('nombres', 'asc');
        $query = $this->db->get();
        if($query){
            return $query->result_array();
        }else{
            return array();
        }
	}



  
}