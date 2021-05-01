<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('display_errors', 1);
ini_set('memory_limit', '-1');
set_time_limit(0);

class Categoria extends Sys_Controller {
    
    function __construct()
    {
    	parent::__construct();
        $this->load->model('categoria_model', 't_categoria');

        session_write_close();
    }

    public function index(){
        $data = array();
        $parametroFooter = array(
            'jslib' => array(
                'assets/js/VentasJS/categoria.js'
            ),
        );
        $data_header = array();
        $this->sys_render('categoria', $data, $data_header, $parametroFooter);
    }

    public function listarCategorias(){
        $result['status'] = 'success';
        $result['msg'] = 'Se listó correctamente...';	

        $data= $this->t_categoria->_get_categoria();


        $this->json_output($data);
    }

    public function registrarCategoria(){

        $data = $this->t_categoria->_insert_categoria(1,'Desinfectantes','Productos de limpieza ...');


        $this->json_output($data);
    }
}