<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

require_once 'Base_model.php';

class Detalleventa_model extends Base_model {
	
	function __construct() {
        parent::__construct('detalle_ventas','id_detalle_venta'); 

	}

	public function _get_detalle_venta($id_venta){
        $this->db->select('dv.id_detalle_venta,dv.id_venta,dv.id_producto,p.nombre_producto,dv.cantidad,dv.precio,dv.sub_total');
        $this->db->from($this->model_name . ' dv' ); 
        $this->db->join('productos p', 'dv.id_producto = p.id_producto');
        $this->db->where('dv.id_venta = '.$id_venta.'');
        $query = $this->db->get();

        // echo $this->db->last_query();
        if($query){
            return $query->result_array();
        }else{
            return array();
        }
	}
        
    public function _insert_detalle_venta($id_venta,$id_producto,$cantidad,$precio,$sub_total){
        $data = array(
            'id_venta' => $id_venta,
            'id_producto' => $id_producto,
            'cantidad' => $cantidad,
            'precio' => $precio,
            'sub_total' => $sub_total
        );
        
        $query = $this->db->insert($this->model_name, $data);

        return $query;
    }

    
    public function _delete_detalle_venta($id_detalle_venta=0){

        $this->db->where('id_detalle_venta', $id_detalle_venta);
        $query = $this->db->delete($this->model_name);
        
        return $query;
    }


  
}