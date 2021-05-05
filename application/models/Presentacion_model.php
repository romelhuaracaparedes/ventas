<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

require_once 'Base_model.php';

class Presentacion_model extends Base_model {
	
	function __construct() {
        parent::__construct('presentaciones','id_presentacion'); 

	}

	public function _get_presentacion(){
        $this->db->select('id_presentacion, nombre_presentacion,flg_estado');
        $this->db->from($this->model_name); 
        $this->db->where('flg_situacion = 1');
        $this->db->order_by('nombre_presentacion', 'asc');
        $query = $this->db->get();
        if($query){
            return $query->result_array();
        }else{
            return array();
        }
	}

    public function _get_presentacion_by_id($id_presentacion){
        $this->db->select('id_presentacion, nombre_presentacion,flg_estado');
        $this->db->from($this->model_name); 
        $this->db->where('id_presentacion= '.$id_presentacion.' ');
        $this->db->where('flg_situacion = 1');
        $this->db->order_by('nombre_presentacion', 'asc');
        $query = $this->db->get();
        if($query){
            return $query->result_array();
        }else{
            return array();
        }
	}
    
    public function _insert_presentacion($nombre_presentacion=null,$flg_estado=null){
        $data = array(
            'nombre_presentacion' => $nombre_presentacion,
            'flg_estado' => $flg_estado
        );
        
        $query = $this->db->insert($this->model_name, $data);

        return $query;


    }

    public function _update_presentacion($id_presentacion=0,$nombre_presentacion=null,$flg_estado=null){
        $data = array(
            'nombre_presentacion' => $nombre_presentacion,
            'flg_estado' => $flg_estado
        );
        
        $this->db->where('id_presentacion', $id_presentacion);
        $query =  $this->db->update($this->model_name, $data);

        return $query;
    }
    
    public function _delete_presentacion($id_presentacion=0){
        $data = array(
            'flg_situacion' => 0
        );
        
        $this->db->where('id_presentacion', $id_presentacion);
        $query =  $this->db->update($this->model_name, $data);

        return $query;
    }

  
}