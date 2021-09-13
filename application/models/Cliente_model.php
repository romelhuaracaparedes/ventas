<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

require_once 'Base_model.php';

class Cliente_model extends Base_model {
	
	function __construct() {
        parent::__construct('clientes','id_cliente'); 

	}

	public function _get_clientes(){
        $this->db->select('*');
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

    public function _registrar_cliente($nombre,$apellido_paterno,$apellido_materno,$direccion,$celular,$tipo_documento,$num_documento){

        
        $data = array(
            'nombres' => $nombre,
            'apellido_paterno' => $apellido_paterno,
            'apellido_materno' => $apellido_materno,
            'tipo_documento' => $tipo_documento,
            'numero_documento' => $num_documento,
            'direccion' => $direccion,
            'celular' => $celular,
            'flg_estado' => 1
        );
      
        $query = $this->db->insert('clientes', $data);
 
        return $query;

    }



  
}