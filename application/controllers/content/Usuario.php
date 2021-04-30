<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('display_errors', 1);
ini_set('memory_limit', '-1');
set_time_limit(0);

class Usuario extends Sys_Controller {
    
    function __construct()
    {
    	parent::__construct();
        // $this->load->model('usuario_model', 't_usuario');

        session_write_close();
    }

    public function index(){
        $data = array();
        $parametroFooter = array(
            // 'jslib' => array(

            //     'assets/plugins/datatable/jquery.dataTables.min.js',
            //     'assets/plugins/datatable/dataTables.bootstrap4.min.js',
            //     'assets/plugins/datatable/dataTables.responsive.min.js',
            //     'assets/plugins/datatable/fileexport/dataTables.buttons.min.js',
            //     'assets/js/table-data.js'
            // ),
        );
        $data_header = array();
        $this->sys_render('usuarios', $data, $data_header, $parametroFooter);
    }

    public function perfil(){
        $data = array();
        $parametroFooter = array();
        $data_header = array();
        $this->sys_render('perfil', $data, $data_header, $parametroFooter);
    }

    public function parametros(){
        $data = array();
        $parametroFooter = array();
        $data_header = array();
        $this->sys_render('parametros', $data, $data_header, $parametroFooter);
    }

    public function tipousuario(){
        $data = array();
        $parametroFooter = array();
        $data_header = array();
        $this->sys_render('tipousuario', $data, $data_header, $parametroFooter);
    }

    public function listarUsuario(){
        $result['status'] = 'success';
        $result['msg'] = 'Se listó correctamente...';	

        $data= $this->t_usuario->_get_usuario();


        $this->json_output($data);
    }

}