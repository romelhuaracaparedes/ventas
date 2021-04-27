<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

require_once 'Base_model.php';

class Marca_model extends Base_model {
	
	function __construct() {
        parent::__construct('marcas','id'); 

	}

	public function _get_marcas(){
        $this->db->select('nombre, estado');
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

    public function _get_marcas_segundaopcion(){
        
        $sql = "select nombre,estado from marcas";

        $query = $this->db->query($sql);
        return $query->result_array();
	}

    public function _insert_marca($id=null,$nombre=null,$estado=null){
        $data = array(
                'id' => $id,
                'nombre' => $nombre,
                'estado' => $estado
        );
        
        $this->db->insert($this->model_name, $data);
    }



  
}