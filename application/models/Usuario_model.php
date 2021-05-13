<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

require_once 'Base_model.php';

class Usuario_model extends Base_model {
	
	function __construct() {
        parent::__construct('usuarios','id_usuario'); 

    }

    public function _get_usuario($usuario, $clave){
        $this->db->select('u.numero_documento, u.nombres, u.apellido_paterno, u.apellido_materno, p.nombre as perfil, u.flg_estado');
        $this->db->from($this->model_name.' u');
        $this->db->join('perfiles p', 'u.id_perfil = p.id_perfil');
        $this->db->where('numero_documento =\''.$usuario.'\' and clave=\''.$clave.'\'');
        // $this->db->where('"idubigeo" like \''.substr($ubigeo,0,4).'%\'');
        
        $query = $this->db->get();
        
        if($query){
            return $query->result_array();
        }else{
            return array();
        }
    }
    

    public function _get_perfil($usuario){
        $this->db->select('u.nombres, u.apellido_paterno, u.apellido_materno, u.tipo_documento,u.numero_documento,u.correo, u.telefono, p.nombre as perfil');
        $this->db->from($this->model_name.' u');
        $this->db->join('perfiles p', 'u.id_perfil = p.id_perfil');
        $this->db->where('numero_documento =\''.$usuario.'\'');
        
        $query = $this->db->get();
        
        if($query){
            return $query->result_array();
        }else{
            return array();
        }
	}

	public function _get_tipos_usuario(){
        $this->db->select('id_tipo_usuario, tipo_usuario,flg_estado');
        $this->db->from('tipo_usuario'); 
        $this->db->where('flg_situacion = 1');
        $this->db->order_by('tipo_usuario', 'asc');
        $query = $this->db->get();
        if($query){
            return $query->result_array();
        }else{
            return array();
        }
    }
    
    public function _get_tipo_usuario_by_id($id_tipo_usuario){
        $this->db->select('id_tipo_usuario, tipo_usuario,flg_estado');
        $this->db->from('tipo_usuario'); 
        $this->db->where('id_tipo_usuario= '.$id_tipo_usuario.' ');
        $this->db->where('flg_situacion = 1');
        $this->db->order_by('tipo_usuario', 'asc');
        $query = $this->db->get();
        if($query){
            return $query->result_array();
        }else{
            return array();
        }
	}
    

    public function _insert_tipo_usuario($id_tipo_usuario=0,$nombre_tipo_usuario=null,$flg_estado=null){


        $data = array(
            'tipo_usuario' => $nombre_tipo_usuario,
            'flg_estado' => $flg_estado
        );
        if($id_tipo_usuario==0){
            $query = $this->db->insert('tipo_usuario', $data);

        }
        else{
            $this->db->where('id_tipo_usuario', $id_tipo_usuario);
            $query =  $this->db->update('tipo_usuario', $data);
        }
        

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