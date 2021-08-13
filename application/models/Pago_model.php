<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

require_once 'Base_model.php';

class Pago_model extends Base_model {
    
    function __construct() {
        parent::__construct('pago','id_pago'); 

    }

    public function _insert_pago($id_vendedor,$id_cliente,$id_venta, $monto){

        $data = array(
            'id_vendedor' => $id_vendedor,
            'id_cliente' => $id_cliente,
            'id_venta' => $id_venta,
            'monto' => $monto,
        );
        $query = $this->db->insert($this->model_name, $data);

        return $this->db->insert_id();
    }


    public function filterPagos($id_venta){

        $this->db->select('p.id_cliente, p.id_venta, p.id_pago, p.monto, p.fecha_pago, p.concepto, v.total');
        $this->db->from($this->model_name. ' p' ); 
        $this->db->join('ventas v', 'v.id_venta = p.id_venta');
        $this->db->where('p.id_venta = '.$id_venta.' ');

        $query = $this->db->get();
        if($query){
            return $query->result_array();
        }else{
            return array();
        }


    }

    
    public function get_total_cuota($id_cliente,$id_venta){

        $this->db->select('SUM(p.monto) monto, id_venta');
        $this->db->from($this->model_name. ' p' ); 
        $this->db->where('p.id_venta = '.$id_venta.' and p.id_cliente = '.$id_cliente.'');


        $query = $this->db->get();
        if($query){
            return $query->result_array();
        }else{
            return array();
        }
    }

    public function obtenerDeuda($id_pago){
        $this->db->select('p.id_cliente, p.id_venta, p.id_pago, p.monto, p.fecha_pago, p.concepto');
        $this->db->from($this->model_name. ' p' ); 
        $this->db->where('p.id_pago = '.$id_pago.' ');

        $query = $this->db->get();

        // echo $this->db->last_query();
        if($query){
            return $query->result_array();
        }else{
            return array();
        }
    }

    public function _editar_pago($id_pago, $monto){

        $data = array(
            'monto' => $monto,
            'fecha_pago' => date('Y-m-d'),
        );
        $this->db->where('id_pago', $id_pago);
        $this->db->update($this->model_name, $data);
        return $id_pago;
    }


}