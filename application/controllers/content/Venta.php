<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('display_errors', 1);
ini_set('memory_limit', '-1');
set_time_limit(0);

class Venta extends Sys_Controller {
    
    function __construct()
    {
    	parent::__construct();
        // $this->load->model('marca_model', 't_marca');

        session_write_close();
    }

    public function index(){
        $data = array();
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