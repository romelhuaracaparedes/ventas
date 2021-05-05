<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('display_errors', 1);
ini_set('memory_limit', '-1');
set_time_limit(0);

class Presentacion extends Sys_Controller {
    
    function __construct()
    {
    	parent::__construct();
        $this->load->model('presentacion_model', 't_presentacion');

        session_write_close();
    }

    public function index(){
        $data = array();
        $parametroFooter = array(
            'jslib' => array(
                'assets/js/VentasJS/presentacion.js'
            ),
        );
        $data_header = array();
        $this->sys_render('presentacion', $data, $data_header, $parametroFooter);
    }

    public function listarPresentaciones(){
        $result['status'] = 'success';
        $result['msg'] = 'Se listó correctamente...';	

        $data= $this->t_presentacion->_get_presentacion();
        $result['data'] =$data;

        $this->json_output($data);
    }

    public function obtenerPresentacion(){
        $result['status'] = 'success';
        $result['msg'] = 'Se listó correctamente...';
        
        $id_presentacion = @$_POST['id'];       

        $data= $this->t_presentacion->_get_presentacion_by_id($id_presentacion);
        $result['data'] =$data;

        $this->json_output($data);
    }

    public function registrarpresentacion(){

        $nombre_presentacion = @$_POST['nombre_presentacion'];       
		$flg_estado = @$_POST['flg_estado'];    
        $data = $this->t_presentacion->_insert_presentacion($nombre_presentacion,$flg_estado);

        if($data){
            $result['status'] = 'success';
            $result['msg'] = 'Se registró correctamente';	
        }else{
            $result['status'] = 'error';
            $result['msg'] = 'Ocurrio un error al registrar';	
        }

        $this->json_output($result);
    }

    public function actualizarPresentacion(){

        $id_presentacion = @$_POST['id_presentacion'];
        $nombre_presentacion = @$_POST['nombre_presentacion'];
        $flg_estado = @$_POST['flg_estado'];

        $data = $this->t_presentacion->_update_presentacion($id_presentacion,$nombre_presentacion,$flg_estado);

        if($data){
            $result['status'] = 'success';
            $result['msg'] = 'Se actualizó correctamente';	
        }else{
            $result['status'] = 'error';
            $result['msg'] = 'Ocurrio un error al actualizar';	
        }

        $this->json_output($result);
    }

    public function eliminarPresentacion(){

        $id_presentacion = @$_POST['id_presentacion'];
        

        $data = $this->t_presentacion->_delete_presentacion($id_presentacion);

        if($data){
            $result['status'] = 'success';
            $result['msg'] = 'Se eliminó correctamente';	
        }else{
            $result['status'] = 'error';
            $result['msg'] = 'Ocurrio un error al eliminar';	
        }

        $this->json_output($result);
    }
}