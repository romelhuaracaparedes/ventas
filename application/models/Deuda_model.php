<?php if (!defined('BASEPATH'))
	exit('No direct script access allowed');

require_once 'Base_model.php';

class Deuda_model extends Base_model {
	
	function __construct() {
        parent::__construct('ventas','id_venta'); 

	}

    public function _get_pedido(){
        $this->db->select(' v.id_venta,v.id_vendedor,v.id_cliente,v.fecha_entrega,v.fecha_pedido,v.tipo_estado,v.flg_pago,v.total,c.numero_documento,c.celular');
        $this->db->from('ventas v'); 
        $this->db->join('clientes c', 'v.id_cliente = c.id_cliente');
        $this->db->where('v.flg_pago = 0');
        $this->db->order_by('v.fecha_pedido', 'asc');

      
        $query = $this->db->get();

        if($query){
            return $query->result_array();
        }else{
            return array();
        }
    }
        
  

  
}