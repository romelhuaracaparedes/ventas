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


        $this->actualizatotales($id_venta);


        return $query;

    }

    
    public function _delete_detalle_venta($id_detalle_venta=0, $id_venta=null){

        $this->db->where('id_detalle_venta', $id_detalle_venta);
        $query = $this->db->delete($this->model_name);
        $this->actualizatotales($id_venta);
        return $query;
    }



    public function _get_detalle_gen_venta($id_venta=null){

        $this->db->select(' v.id_venta,v.id_vendedor,v.id_cliente,v.fecha_entrega,v.fecha_pedido,v.tipo_estado,c.apellido_paterno,c.apellido_materno,c.nombres,c.numero_documento,c.direccion,c.celular');
        $this->db->from('ventas v'); 
        $this->db->join('clientes c', 'v.id_cliente = c.id_cliente');
        $this->db->where('v.id_venta = '.$id_venta.'');
        $query = $this->db->get();

        if($query){
            return $query->result_array();
        }else{
            return array();
        }
    }

    public function sum_precios($id_venta){
        $this->db->select('dv.id_venta, SUM(dv.precio) precio_total');
        $this->db->from($this->model_name . ' dv'  ); 
        $this->db->where('dv.id_venta = '.$id_venta.'');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function actualizatotales($id_venta){
        $gen = $this->sum_precios($id_venta);
        $dataupdate = array('total' => $gen[0]['precio_total']);
        $this->db->where('id_venta', $gen[0]['id_venta']);
        $this->db->update('ventas', $dataupdate);
    }



  
}