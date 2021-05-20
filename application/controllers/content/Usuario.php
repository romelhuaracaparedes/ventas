<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('display_errors', 1);
ini_set('memory_limit', '-1');
set_time_limit(0);

class Usuario extends Sys_Controller {
    
    function __construct()
    {
    	parent::__construct();
        $this->load->model('usuario_model', 't_usuario');

        session_write_close();
    }

    public function index(){
        $data = array();
        $parametroFooter = array(
            'jslib' => array(
                'assets/js/jquery.validate.js',
                'assets/js/VentasJS/usuario.js',
                'assets/js/messages_es.js'
            ),
        );
        $data_header = array();
        $this->sys_render('usuarios', $data, $data_header, $parametroFooter);
    }

    public function perfil(){
        $data = array();
        $parametroFooter = array();
        $data_header = array();

        
        $data= $this->t_usuario->_get_perfil(87654321); 
        
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
        $parametroFooter = array(
            'jslib' => array(
                'assets/js/VentasJS/usuario.js'
            ),
        );
        $data_header = array();
        $this->sys_render('tipousuario', $data, $data_header, $parametroFooter);
    }

    public function registrarTipoUsuario(){


        $id_tipo_usuario = $this->input->post('id_tipo_usuario');
        $nombre_tipo_usuario= $this->input->post('nombre_tipo_usuario');
        $flg_estado= $this->input->post('flg_estado');

        

        $data = $this->t_usuario->_insert_tipo_usuario($id_tipo_usuario,$nombre_tipo_usuario,$flg_estado);

        if($data){
            $result['status'] = 'success';
            $result['msg'] = 'Se registró correctamente';	
        }else{
            $result['status'] = 'error';
            $result['msg'] = 'Ocurrio un error al registrar';	
        }

        $this->json_output($result);
    }

    public function listarTiposUsuario(){
        $result['status'] = 'success';
        $result['msg'] = 'Se listó correctamente...';	

        $data= $this->t_usuario->_get_tipos_usuario();
        $result['data'] =$data;

        $this->json_output($data);
    }


    public function obtenerTipoUsuario(){
        $result['status'] = 'success';
        $result['msg'] = 'Se listó correctamente...';
        
        $id_tipo_usuario = $this->input->post('id');
          

        $data= $this->t_usuario->_get_tipo_usuario_by_id($id_tipo_usuario);
        $result['data'] =$data;

        $this->json_output($data);
    }


    public function eliminarTipoUsuario(){

        $id_tipo_usuario = $this->input->post('id_tipo_usuario');
        

        $data = $this->t_usuario->_delete_tipo_usuario($id_tipo_usuario);

        if($data){
            $result['status'] = 'success';
            $result['msg'] = 'Se eliminó correctamente';	
        }else{
            $result['status'] = 'error';
            $result['msg'] = 'Ocurrio un error al eliminar';	
        }

        $this->json_output($result);
    }



    public function listarUsuario(){
        $result['status'] = 'success';
        $result['msg'] = 'Se listó correctamente...';	

        $data= $this->t_usuario->_get_usuario();


        $this->json_output($data);
    }


    public function registrarUsuario(){


        $obj = $this->input->post();        

        $data = $this->t_usuario->_insert_usuario($obj);

        if($data){
            $result['status'] = 'success';
            $result['msg'] = 'Se registró correctamente';	
        }else{
            $result['status'] = 'error';
            $result['msg'] = 'Ocurrio un error al registrar';	
        }

        $this->json_output($result);
    }

    public function listarUsuarios(){
        $result['status'] = 'success';
        $result['msg'] = 'Se listó correctamente...';	

        $data= $this->t_usuario->_get_usuarios();
        $result['data'] =$data;

        

        $this->json_output($data);
    }

}