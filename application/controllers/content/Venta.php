<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('display_errors', 1);
ini_set('memory_limit', '-1');
set_time_limit(0);

class Venta extends Sys_Controller {
    
    function __construct()
    {
    	parent::__construct();
        $this->load->model('cliente_model', 't_cliente');
        $this->load->model('producto_model', 't_producto');
        $this->load->model('precio_model', 't_precio');
        $this->load->model('venta_model', 't_venta');
        $this->load->model('detalleventa_model', 't_detalle_venta');
        session_write_close();
    }

    public function index(){
        $data= array();
        $data["clientes"]=$this->t_cliente->_get_clientes();
        $data["productos"]=$this->t_precio->_get_producto();
        $parametroFooter = array(
            'jslib' => array(
                
                'assets/plugins/jquery-ui/ui/widgets/jquery-ui.js',

                'assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js',                

                'assets/js/VentasJS/venta.js'
            ),
        );
        $data_header = array();
        $this->sys_render('venta', $data, $data_header, $parametroFooter);
    }

    public function obtenerVenta(){
        $result['status'] = 'success';
        $result['msg'] = 'Se listó correctamente...';
        
        $id_venta = @$_POST['id'];       

        $data= $this->t_venta->_get_venta($id_venta);
        $result['data'] =$data[0];

        $this->json_output($data);
    }
    public function registrarVenta(){

        $id_vendedor = @$_POST['id_vendedor'];       
		$id_cliente = @$_POST['id_cliente'];    
        $total = @$_POST['total'];    
        $tipo_estado = @$_POST['tipo_estado'];    
        $fecha_registro = @$_POST['fecha_registro'];    
        $fecha_pedido = @$_POST['fecha_pedido'];    
        $fecha_entrega = @$_POST['fecha_entrega'];    
        $id_usuario_reg = @$_POST['id_usuario_reg'];    
        $tipo_comprobante = @$_POST['tipo_comprobante'];    

        $data = $this->t_venta->_insert_venta($id_vendedor,$id_cliente,$total,$tipo_estado,$fecha_registro,$fecha_pedido,$fecha_entrega,$id_usuario_reg,$tipo_comprobante);

        if($data){
            $result['status'] = 'success';
            $result['msg'] = 'Se registró correctamente';	
        }else{
            $result['status'] = 'error';
            $result['msg'] = 'Ocurrio un error al registrar';	
        }

        $this->json_output($result);
    }

    // DETALLE DE VENTA 
    public function registrarDetalleVenta(){

        // $id_detalle_venta = @$_POST['id_detalle_venta'];       
		$id_venta = @$_POST['id_venta'];    
        $id_producto = @$_POST['id_producto'];    
        $cantidad = @$_POST['cantidad'];    
        $precio = @$_POST['precio'];    
        $sub_total = @$_POST['cantidad'] * @$_POST['precio'];

        $data = $this->t_detalle_venta->_insert_detalle_venta($id_venta,$id_producto,$cantidad,$precio,$sub_total);

        if($data){
            $result['status'] = 'success';
            $result['msg'] = 'Se registró correctamente';	
        }else{
            $result['status'] = 'error';
            $result['msg'] = 'Ocurrio un error al registrar';	
        }

        $this->json_output($result);
    }

    public function obtenerDetalleVenta(){
        $result['status'] = 'success';
        $result['msg'] = 'Se listó correctamente...';
        
        $id_venta = @$_POST['id'];       

        $data= $this->t_detalle_venta->_get_detalle_venta($id_venta);
        $result['data'] =$data;

        $this->json_output($data);
    }

    public function eliminarDetalleVenta(){

        $id_detalle_venta = @$_POST['id'];
        

        $data = $this->t_detalle_venta->_delete_detalle_venta($id_detalle_venta);

        if($data){
            $result['status'] = 'success';
            $result['msg'] = 'Se eliminó correctamente';	
        }else{
            $result['status'] = 'error';
            $result['msg'] = 'Ocurrio un error al eliminar';	
        }

        $this->json_output($result);
    }
}