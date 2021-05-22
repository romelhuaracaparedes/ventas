<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

require_once 'Base_model.php';

class Usuario_model extends Base_model {
	
	function __construct() {
        parent::__construct('usuarios','id_usuario'); 

    }

    public function _get_usuario($usuario, $clave){
        $this->db->select('u.numero_documento, u.nombres, u.apellido_paterno, u.apellido_materno, t.tipo_usuario, u.flg_estado');
        $this->db->from($this->model_name.' u');
        $this->db->join('tipo_usuario t', 'u.id_tipo_usuario = t.id_tipo_usuario');
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
        $this->db->select('u.nombres, u.apellido_paterno, u.apellido_materno, u.tipo_documento,u.numero_documento,u.correo, u.telefono, t.tipo_usuario');
        $this->db->from($this->model_name.' u');
        $this->db->join('tipo_usuario t', 'u.id_tipo_usuario = t.id_tipo_usuario');
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
    
    public function _delete_tipo_usuario($id_tipo_usuario=0){
        $data = array(
            'flg_situacion' => 0
        );
        
        $this->db->where('id_tipo_usuario', $id_tipo_usuario);
        $query =  $this->db->update('tipo_usuario', $data);

        return $query;
    }





    public function _insert_usuario($obj){
    
        $data = array(
            'id_tipo_usuario' => $obj["tipo_usuario"],
            'nombres' => $obj["nombres"],
            'apellido_paterno' => $obj["apellido_paterno"],
            'apellido_materno' => $obj["apellido_materno"],
            'tipo_documento' => $obj["tipo_documento"],
            'numero_documento' => $obj["num_documento"],
            'correo' => $obj["correo"],
            'telefono' => $obj["celular"],
            'clave' => md5($obj["num_documento"]),
            'flg_estado' => $obj["estado"]
        );


        if(!$obj["id_usuario"]){
            $query = $this->db->insert($this->model_name, $data);

        }
        else{
            $this->db->where('id_usuario', $obj["id_usuario"]);
            $query =  $this->db->update($this->model_name, $data);
        }
        

        return $query;
    }

    public function _get_usuarios(){
        $this->db->select('u.id_usuario, u.numero_documento, CONCAT(u.nombres, u.apellido_paterno, u.apellido_materno) AS usuario, u.telefono, t.tipo_usuario, u.flg_estado');
        $this->db->from($this->model_name.' u');
        $this->db->join('tipo_usuario t', 'u.id_tipo_usuario = t.id_tipo_usuario');
        $this->db->where('u.flg_estado = 1');
        $this->db->order_by('u.nombres', 'asc');
        $query = $this->db->get();
        if($query){
            return $query->result_array();
        }else{
            return array();
        }
    }


  
}