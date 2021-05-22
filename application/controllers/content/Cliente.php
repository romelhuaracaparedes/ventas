<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('display_errors', 1);
ini_set('memory_limit', '-1');
set_time_limit(0);

class Cliente extends Sys_Controller {
    
    function __construct()
    {
    	parent::__construct();
        $this->load->model('cliente_model', 't_cliente');

        session_write_close();
    }

    public function index(){
        $data = array();
        $parametroFooter = array(
            'jslib' => array(
                'assets/js/VentasJS/cliente.js'
            ),
        );
        $data_header = array();
        $this->sys_render('cliente', $data, $data_header, $parametroFooter);
    }

    public function listarClientes(){
        $result['status'] = 'success';
        $result['msg'] = 'Se listó correctamente...';	

        $data= $this->t_cliente->_get_clientes();
        $result['data'] =$data;

        $this->json_output($data);
    }

    // public function registrarCategoria(){

    //     $nombre_caterogia = @$_POST['nombre_caterogia'];       
	// 	$flg_estado = @$_POST['flg_estado'];    
    //     $data = $this->t_categoria->_insert_categoria($nombre_caterogia,$flg_estado);

    //     if($data){
    //         $result['status'] = 'success';
    //         $result['msg'] = 'Se registró correctamente';	
    //     }else{
    //         $result['status'] = 'error';
    //         $result['msg'] = 'Ocurrio un error al registrar';	
    //     }

    //     $this->json_output($result);
    // }

    
}