<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

require_once 'Base_model.php';

class Venta_model extends Base_model {
	
	function __construct() {
        parent::__construct('ventas','id_venta'); 

	}

	public function _get_venta(){
        $this->db->select('v.id_venta,v.id_vendedor,c.id_cliente,v.fecha_pedido,v.fecha_entrega,v.fecha_pedido');
        $this->db->from($this->model_name . ' v' ); 
        $this->db->join('clientes c', 'v.id_cliente = c.id_cliente');
        $this->db->where('p.flg_estado = 1');
        $query = $this->db->get();
        if($query){
            return $query->result_array();
        }else{
            return array();
        }
	}

    public function _get_pedido($id_usuario){
        $this->db->select(' v.id_venta,v.id_vendedor,v.id_cliente,v.fecha_entrega,v.fecha_pedido,v.tipo_estado,v.flg_pago,v.total,c.numero_documento,c.celular,v.flg_entrega');
        $this->db->from('ventas v'); 
        $this->db->join('clientes c', 'v.id_cliente = c.id_cliente');

        $this->db->where("v.id_vendedor ='".$id_usuario."'");
        // $this->db->order_by('v.fecha_pedido', 'asc');
        $this->db->order_by('v.id_venta', 'desc');
        $query = $this->db->get();
        
        if($query){
            return $query->result_array();
        }else{
            return array();
        }
    }
        
    public function _insert_venta($id_vendedor,$id_cliente,$total,$tipo_estado,$fecha_pedido,$fecha_entrega,$id_usuario_reg,$tipo_comprobante){

        $pa = explode("/", $fecha_pedido);
        $pe = explode("/", $fecha_entrega);
        $data = array(
            'id_vendedor' => $id_vendedor,
            'id_cliente' => $id_cliente,
            'total' => $total,
            'tipo_estado' => $tipo_estado,
            'fecha_pedido' => $pa[2]."-".$pa[1]."-".$pa[0],
            'fecha_entrega' => $pe[2]."-".$pe[1]."-".$pe[0],
            'id_usuario_registro' => $id_usuario_reg,
            'tipo_comprobante' => $tipo_comprobante
        );
        $query = $this->db->insert($this->model_name, $data);
        return $this->db->insert_id();
    }

    public function actualizar_pago($id_venta,$opt){

        $data = array(
            'flg_pago' => $opt
        );

        $this->db->where('id_venta', $id_venta);
        $query =  $this->db->update($this->model_name, $data);
    }

    public function actualizar_pedido($id_venta){

        $data = array(
            'tipo_estado' => 2
        );

        $this->db->where('id_venta', $id_venta);
        $query =  $this->db->update($this->model_name, $data);
    }

    
    public function _delete_venta($id_venta=0){
        $data = array(
            'flg_estado' => 0
        );
        
        $this->db->where('id_venta', $id_venta);
        $query =  $this->db->update($this->model_name, $data);

        return $query;
    }



    public function _filtrarventa($f_i , $f_e, $id_vendedor){

        $this->db->select('v.id_venta,v.total, v.fecha_pedido, v.flg_pago, v.id_vendedor ');
        $this->db->from($this->model_name . ' v' );         
        $this->db->where("v.tipo_estado=2 ");
        $this->db->where("v.id_vendedor ='".$id_vendedor."'");
        $this->db->where("v.fecha_pedido BETWEEN '".$f_i."' AND '".$f_e."'");
        $query = $this->db->get();
        if($query){
            return $query->result_array();
        }else{
            return array();
        }

    }

    public function _reporte_pedido($f_i , $f_e){

        $this->db->select('v.id_venta, 
        v.id_vendedor,
        CONCAT(u.apellido_paterno, \' \', u.apellido_materno, \' ,\', u.nombres)  as "nombre_vendedor",
        v.id_cliente,
        CONCAT(c.apellido_paterno, \' \', c.apellido_materno, \' ,\', c.nombres)  as "nombre_cliente",
        v.total,
        v.tipo_estado,
        v.fecha_registro,
        v.fecha_pedido,
        v.fecha_entrega,
        v.tipo_comprobante,
        v.flg_estado,
        v.flg_pago,
        v.flg_entrega');
        $this->db->from($this->model_name . ' v' ); 
        $this->db->join('usuarios u', 'u.id_usuario = v.id_vendedor');
        $this->db->join('clientes c', 'c.id_cliente = v.id_cliente');
        // $this->db->where("v.tipo_estado=2 ");;
        $this->db->where("v.fecha_pedido BETWEEN '".$f_i."' AND '".$f_e."'");
        $query = $this->db->get();

        // echo $this->db->last_query();
        if($query){
            return $query->result_array();
        }else{
            return array();
        }
    }


    public function _entregar_pedido($id_venta){

        $data = array(
            'flg_entrega' => 1
        );

        $this->db->where('id_venta', $id_venta);
        $query =  $this->db->update($this->model_name, $data);
        return $query;
    }
  
}