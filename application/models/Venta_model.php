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

    
    public function _delete_venta($id_venta=0){
        $data = array(
            'flg_estado' => 0
        );
        
        $this->db->where('id_venta', $id_venta);
        $query =  $this->db->update($this->model_name, $data);

        return $query;
    }


  
}