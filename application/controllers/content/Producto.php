<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('display_errors', 1);
ini_set('memory_limit', '-1');
set_time_limit(0);

class Producto extends Sys_Controller {
    
    function __construct()
    {
    	parent::__construct();
        // $this->load->model('almacen_model', 't_almacen');
        session_write_close();
    }

    public function index(){
        $data = array();
        $parametroFooter = array(
            'jslib' => array(
                'assets/js/VentasJS/marca.js'
            ),
        );
        $data_header = array();
        $this->sys_render('producto', $data, $data_header, $parametroFooter);
    }

}