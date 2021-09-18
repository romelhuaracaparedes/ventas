<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('display_errors', 1);
ini_set('memory_limit', '-1');
set_time_limit(0);

class Deuda extends Sys_Controller {
    
    function __construct()
    {
    	parent::__construct();
        $this->load->model('cliente_model', 't_cliente');
        $this->load->model('producto_model', 't_producto');
        $this->load->model('precio_model', 't_precio');
        $this->load->model('deuda_model', 't_deuda');
        $this->load->model('venta_model', 't_venta');
        $this->load->model('Pago_model', 't_pago');
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

                'assets/js/VentasJS/venta/venta.js'
            ),
        );
        $data_header = array();
        $this->sys_render('venta/venta', $data, $data_header, $parametroFooter);
    }

    public function listar(){

        $parametroFooter = array(
            'jslib' => array(
                'assets/js/VentasJS/deuda/deudaListar.js',
            ),
        );
        $data_header = array();
        $data = array();
        $this->sys_render('deuda/listar', $data, $data_header, $parametroFooter);
    }

    public function listarpedido(){
        $result['status'] = 'success';
        $result['msg'] = 'Se listó correctamente...';   

        $data= $this->t_deuda->_get_pedido();


        foreach ($data as $key =>  $val) {
             $data[$key]['fecha_entrega'] =  date("d/m/Y", strtotime($val['fecha_entrega'])) ;
             $data[$key]['fecha_pedido'] =  date("d/m/Y", strtotime($val['fecha_pedido'])) ;
        }       

        $result['data'] =$data;

        $this->json_output($data);
    }

    public function pago(){

        $data = array();

        $id_venta =  @$_GET['venta'];
        $id_cliente =  @$_GET['cliente'];
        $data["pagos"]=$this->t_pago->filterPagos($id_venta);

        // print_r($data);
        // exit();


        $data["keys"]=@$_GET;
        $parametroFooter = array(
            'jslib' => array(
                'assets/plugins/jquery-ui/ui/widgets/jquery-ui.js',
                'assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js',  
                'assets/js/VentasJS/deuda/pago.js'
            ),
        );

        $data_header = array();

        $this->sys_render('deuda/pago', $data, $data_header, $parametroFooter);
    }

    public function agregarCouta()
    {
        $id_vendedor = 1;   
        $id_venta = @$_POST['venta'];    
        $id_cliente = @$_POST['cliente'];   
        $monto = @$_POST['monto'];   
        $total = @$_POST['total']; 

        $data = $this->t_pago->_insert_pago($id_vendedor,$id_cliente,$id_venta,$monto);

        $total_cuotas = $this->t_pago->get_total_cuota($id_cliente,$id_venta);


        if($data){
            if ($total <= $total_cuotas[0]['monto']) {
                $this->t_venta->actualizar_pago($id_venta, 1);
            }else{
                $this->t_venta->actualizar_pago($id_venta, 0);
            }
            $result['status'] = 'success';
            $result['msg'] = 'Se registró correctamente';   
        }else{
            $result['status'] = 'error';
            $result['msg'] = 'Ocurrio un error al registrar';   
        }

        $this->json_output($result);
    }

    public function editarCouta()
    {
        $id_vendedor = 1;   
        $id_venta = @$_POST['venta'];   
        
        $id_pago = @$_POST['id_pago'];   
        $id_cliente = @$_POST['cliente'];   
        $monto = @$_POST['monto'];  
        $total = @$_POST['total']; 
        $data = $this->t_pago->_editar_pago($id_pago,$monto);

        $total_cuotas = $this->t_pago->get_total_cuota($id_cliente,$id_venta);


        if($data){
            if ($total <= $total_cuotas[0]['monto']) {
                $this->t_venta->actualizar_pago($id_venta, 1);
            }else{
                $this->t_venta->actualizar_pago($id_venta, 0);
            }
            $result['status'] = 'success';
            $result['msg'] = 'Se registró correctamente';   
        }else{
            $result['status'] = 'error';
            $result['msg'] = 'Ocurrio un error al registrar';   
        }

        $this->json_output($result);
    }


    public function obtenerDeuda(){
        $result['status'] = 'success';
        $result['msg'] = 'Se listó correctamente...';
        
        $id_pago = @$_POST['id_pago'];       

        $data= $this->t_pago->obtenerDeuda($id_pago);
        $result['data'] =$data;

        $this->json_output($data);
    }
}