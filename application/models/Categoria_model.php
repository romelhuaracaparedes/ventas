<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

require_once 'Base_model.php';

class Categoria_model extends Base_model {
	
	function __construct() {
        parent::__construct('categoria','id_categoria'); 

	}

	public function _get_categoria(){
        $this->db->select('nombre, descripcion');
        $this->db->from($this->model_name); 
        // $this->db->where('iddependencia=3 and flgactivo = \'1\'');
        // $this->db->where('"idubigeo" like \''.substr($ubigeo,0,4).'%\'');
        $this->db->order_by('nombre', 'asc');


        $query = $this->db->get();
        if($query){
            return $query->result_array();
        }else{
            return array();
        }
	}

    
    public function _insert_categoria($id=null,$nombre=null,$descripcion=null){
        $data = array(
                'id_categoria' => $id,
                'nombre' => $nombre,
                'descripcion' => $descripcion
        );
        
        $this->db->insert($this->model_name, $data);
    }



  
}