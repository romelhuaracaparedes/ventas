<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

require_once 'Base_model.php';

class Categoria_model extends Base_model {
	
	function __construct() {
        parent::__construct('categorias','id_categoria'); 

	}

	public function _get_categoria(){
        $this->db->select('id_categoria, nombre_categoria,flg_estado');
        $this->db->from($this->model_name); 
        $this->db->where('flg_situacion = 1');
        // $this->db->where('"idubigeo" like \''.substr($ubigeo,0,4).'%\'');
        $this->db->order_by('nombre_categoria', 'asc');
        $query = $this->db->get();
        if($query){
            return $query->result_array();
        }else{
            return array();
        }
	}

    public function _get_categoria_by_id($id_categoria){
        $this->db->select('id_categoria, nombre_categoria,flg_estado');
        $this->db->from($this->model_name); 
        $this->db->where('id_categoria= '.$id_categoria.' ');
        $this->db->where('flg_situacion = 1');
        $this->db->order_by('nombre_categoria', 'asc');
        $query = $this->db->get();
        if($query){
            return $query->result_array();
        }else{
            return array();
        }
	}
    
    public function _insert_categoria($nombre_categoria=null,$flg_estado=null){
        $data = array(
            'nombre_categoria' => $nombre_categoria,
            'flg_estado' => $flg_estado
        );
        
        $query = $this->db->insert($this->model_name, $data);

        return $query;


    }

    public function _update_categoria($id_categoria=0,$nombre_categoria=null,$flg_estado=null){
        $data = array(
            'nombre_categoria' => $nombre_categoria,
            'flg_estado' => $flg_estado
        );
        
        $this->db->where('id_categoria', $id_categoria);
        $query =  $this->db->update($this->model_name, $data);

        return $query;
    }
    
    public function _delete_categoria($id_categoria=0){
        $data = array(
            'flg_situacion' => 0
        );
        
        $this->db->where('id_categoria', $id_categoria);
        $query =  $this->db->update($this->model_name, $data);

        return $query;
    }



  
}