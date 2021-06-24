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
                'assets/js/daterangepicker.min.js',
                'assets/js/VentasJS/venta/ventaListar.js',
            ),
        );
        $data_header = array();
        $data = array();
        $this->sys_render('venta/listar', $data, $data_header, $parametroFooter);
    }

    public function pago(){

        $data = array();

        $id_venta =  @$_GET['venta'];
        $id_cliente =  @$_GET['cliente'];
        $data["pagos"]=$this->t_pago->filterPagos($id_venta);
        $data["keys"]=@$_GET;
        $parametroFooter = array(
            'jslib' => array(
                
                'assets/plugins/jquery-ui/ui/widgets/jquery-ui.js',

                'assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js',                

                'assets/js/VentasJS/venta/pago.js'
            ),
        );

        $data_header = array();

        $this->sys_render('venta/pago', $data, $data_header, $parametroFooter);
    }

    public function listarpedido(){
        $result['status'] = 'success';
        $result['msg'] = 'Se listó correctamente...';   

        $data= $this->t_venta->_get_pedido();


        foreach ($data as $key =>  $val) {
             $data[$key]['fecha_entrega'] =  date("d/m/Y", strtotime($val['fecha_entrega'])) ;
             $data[$key]['fecha_pedido'] =  date("d/m/Y", strtotime($val['fecha_pedido'])) ;

         }
       

        $result['data'] =$data;

        $this->json_output($data);
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
        //print_r($this->session->userdata());exit();
        // print_r(@$_POST['header']['fecha_pedido']);exit();

        // $id_vendedor = @$_POST['id_vendedor'];       
        $id_vendedor = 1;       
		$id_cliente = @$_POST['header']['id_cliente'];    
        $total = 0;    
        $tipo_estado = 1;    
        // $fecha_registro = @$_POST['fecha_registro'];    
        $fecha_pedido = @$_POST['header']['fecha_pedido'];    
        $fecha_entrega = @$_POST['header']['fecha_entrega'];    
        $id_usuario_reg = 1;    
        $tipo_comprobante = 1;    
        // $tipo_comprobante = @$_POST['tipo_comprobante'];    

        $data = $this->t_venta->_insert_venta($id_vendedor,$id_cliente,$total,$tipo_estado,$fecha_pedido,$fecha_entrega,$id_usuario_reg,$tipo_comprobante);

        if($data){
            $result['status'] = 'success';
            $result['msg'] = 'Se registró correctamente';	
            $result['reg_id'] = $data;

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
        $id_venta = @$_POST['id_venta'];
        

        $data = $this->t_detalle_venta->_delete_detalle_venta($id_detalle_venta, $id_venta);

        if($data){
            $result['status'] = 'success';
            $result['msg'] = 'Se eliminó correctamente';	
        }else{
            $result['status'] = 'error';
            $result['msg'] = 'Ocurrio un error al eliminar';	
        }

        $this->json_output($result);
    }
    public function agregarPago()
    {
        $id_vendedor = 1;   
        $id_venta = @$_POST['venta'];    
        $id_cliente = @$_POST['cliente'];   
        $monto = @$_POST['monto'];   
        $tipo = @$_POST['tipo']; 

        $data = $this->t_pago->_insert_pago($id_vendedor,$id_cliente,$id_venta,$monto);
        if($data){
            $this->t_venta->actualizar_pedido($id_venta);
            if ($tipo == 1) {
                $this->t_venta->actualizar_pago($id_venta,1);
            }
            $result['status'] = 'success';
            $result['msg'] = 'Se registró correctamente';   
        }else{
            $result['status'] = 'error';
            $result['msg'] = 'Ocurrio un error al registrar';   
        }

        $this->json_output($result);
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

    public function pdfventa(){

        $clientes = @$_GET['cli'];

        $data = $this->t_detalle_venta->_get_detalle_gen_venta($clientes);

        $dataDell =  $this->t_detalle_venta->_get_detalle_venta($clientes);



        //print_r($dataDell);exit();

        $viewdata['header'] = $data;
        $viewdata['detail'] = $dataDell;
        //$this->load->view('pdf_exports/genera_pdf_muestra', $viewdata);
       
        $html = $this->load->view('pdf_exports/genera_pdf_muestra', $viewdata, TRUE);
        // Cargamos la librería
        $this->load->library('pdfgenerator');
        // definamos un nombre para el archivo. No es necesario agregar la extension .pdf
        $filename = 'Pedido';

        // generamos el PDF. Pasemos por encima de la configuración general y definamos otro tipo de papel
        $this->pdfgenerator->generate($html, $filename, true, 'Letter', 'portrait');

    }
}