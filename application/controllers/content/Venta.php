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

        session_write_close();
    }

    public function index(){
        $data= array();
        $data["clientes"]=$this->t_cliente->_get_clientes();
        $data["productos"]=$this->t_producto->_get_producto();
        $parametroFooter = array(
            'jslib' => array(
                'assets/plugins/jquery-ui/ui/widgets/jquery-ui.js',
                'assets/js/VentasJS/venta.js'
            ),
        );
        $data_header = array();
        $this->sys_render('venta', $data, $data_header, $parametroFooter);
    }

    
}