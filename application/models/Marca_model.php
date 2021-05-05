<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

require_once 'Base_model.php';

class Marca_model extends Base_model {
	
	function __construct() {
        parent::__construct('marcas','id_marca'); 

	}

	public function _get_marca(){
        $this->db->select('id_marca, nombre_marca,flg_estado');
        $this->db->from($this->model_name); 
        $this->db->where('flg_situacion = 1');
        $this->db->order_by('nombre_marca', 'asc');
        $query = $this->db->get();
        if($query){
            return $query->result_array();
        }else{
            return array();
        }
	}

    public function _get_marca_by_id($id_marca){
        $this->db->select('id_marca, nombre_marca,flg_estado');
        $this->db->from($this->model_name); 
        $this->db->where('id_marca= '.$id_marca.' ');
        $this->db->where('flg_situacion = 1');
        $this->db->order_by('nombre_marca', 'asc');
        $query = $this->db->get();
        if($query){
            return $query->result_array();
        }else{
            return array();
        }
	}
    
    public function _insert_marca($nombre_marca=null,$flg_estado=null){
        $data = array(
            'nombre_marca' => $nombre_marca,
            'flg_estado' => $flg_estado
        );
        
        $query = $this->db->insert($this->model_name, $data);

        return $query;


    }

    public function _update_marca($id_marca=0,$nombre_marca=null,$flg_estado=null){
        $data = array(
            'nombre_marca' => $nombre_marca,
            'flg_estado' => $flg_estado
        );
        
        $this->db->where('id_marca', $id_marca);
        $query =  $this->db->update($this->model_name, $data);

        return $query;
    }
    
    public function _delete_marca($id_marca=0){
        $data = array(
            'flg_situacion' => 0
        );
        
        $this->db->where('id_marca', $id_marca);
        $query =  $this->db->update($this->model_name, $data);

        return $query;
    }



  
}