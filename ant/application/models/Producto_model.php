<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

require_once 'Base_model.php';

class Producto_model extends Base_model {
	
	function __construct() {
        parent::__construct('productos','id_producto'); 

	}

	public function _get_producto(){
        $this->db->select('p.id_producto, c.nombre_categoria, p.id_categoria, m.nombre_marca ,p.id_marca, pre.nombre_presentacion ,p.id_presentacion,p.nombre_producto,p.stock,p.stock_minimo');
        $this->db->from($this->model_name . ' p' ); 
        $this->db->join('categorias c', 'p.id_categoria = c.id_categoria');
        $this->db->join('marcas m', 'p.id_marca = m.id_marca');
        $this->db->join('presentaciones pre', 'p.id_presentacion = pre.id_presentacion');
        $this->db->where('p.flg_situacion = 1');
        $this->db->order_by('p.nombre_producto', 'asc');
        $query = $this->db->get();
        if($query){
            return $query->result_array();
        }else{
            return array();
        }
	}

    public function _get_producto_by_id($id_producto){
        $this->db->select('id_producto, id_categoria,id_marca,id_presentacion,nombre_producto,stock,stock_minimo');
        $this->db->from($this->model_name); 
        $this->db->where('id_producto= '.$id_producto.' ');
        $this->db->where('flg_situacion = 1');
        $this->db->order_by('nombre_producto', 'asc');
        $query = $this->db->get();
        if($query){
            return $query->result_array();
        }else{
            return array();
        }
	}
    
    
    public function _insert_producto($nombre,$stock,$stockmin,$categoria,$presentacion,$marca){
        $data = array(
            'nombre_producto' => $nombre,
            'stock' => $stock,
            'stock_minimo' => $stockmin,
            'id_categoria' => $categoria,
            'id_marca' => $marca,
            'id_presentacion' => $presentacion
        );
        
        $query = $this->db->insert($this->model_name, $data);

        return $query;
    }

    public function _update_producto($id_producto=0,$nombre,$stock,$stockmin,$categoria,$presentacion,$marca){
        $data = array(
            'nombre_producto' => $nombre,
            'stock' => $stock,
            'stock_minimo' => $stockmin,
            'id_categoria' => $categoria,
            'id_marca' => $marca,
            'id_presentacion' => $presentacion
        );
        
        $this->db->where('id_producto', $id_producto);
        $query =  $this->db->update($this->model_name, $data);

        return $query;
    }

    public function _update_stock($id_producto=0,$stock){
        $data = array(
            'stock' => $stock,
        );        
        $this->db->where('id_producto', $id_producto);
        $query =  $this->db->update($this->model_name, $data);

        return $query;
    }
    
    public function _delete_producto($id_producto=0){
        $data = array(
            'flg_situacion' => 0
        );
        
        $this->db->where('id_producto', $id_producto);
        $query =  $this->db->update($this->model_name, $data);

        return $query;
    }

  
}