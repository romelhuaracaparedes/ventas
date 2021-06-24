<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('display_errors', 1);
ini_set('memory_limit', '-1');
set_time_limit(0);

class Reporte extends Sys_Controller {
    
    function __construct()
    {
    	parent::__construct();
        $this->load->model('cliente_model', 't_cliente');
        $this->load->model('venta_model', 't_venta');
        session_write_close();
    }

    public function index(){

    }

    public function producto(){
        $data["productos"]=$this->t_precio->_get_producto();
        $parametroFooter = array(
            'jslib' => array(
                'assets/js/daterangepicker.min.js',
                'assets/js/VentasJS/venta/ventaListar.js',
            ),
        );
        $data_header = array();
         $this->sys_render('reporte/producto', $data, $data_header, $parametroFooter);
    }
    public function venta(){
        $data["clientes"]=$this->t_cliente->_get_clientes();
        $parametroFooter = array(
            'jslib' => array(
                'assets/plugins/bootstrap-daterangepicker/daterangepicker.js',
                'assets/js/VentasJS/reporte/venta.js',
            ),
        );
        $data_header = array();
         $this->sys_render('reporte/venta', $data, $data_header, $parametroFooter);
    }

    public function filtrarventa(){
        $fechaStart = @$_POST['fechaStart'];   
        $fechaEnd = @$_POST['fechaEnd'];   
        $vendedor = @$_POST['vendedor'];   
        $data = $this->t_venta->_filtrarventa($fechaStart , $fechaEnd , $vendedor);
        foreach ($data as $key =>  $val) {
             $data[$key]['fecha_pedido'] =  date("d/m/Y", strtotime($val['fecha_pedido'])) ;

         }
        $this->json_output($data);
    }
}