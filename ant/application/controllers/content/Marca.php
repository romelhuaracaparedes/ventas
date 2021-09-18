<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('display_errors', 1);
ini_set('memory_limit', '-1');
set_time_limit(0);

class Marca extends Sys_Controller {
    
    function __construct()
    {
    	parent::__construct();
        $this->load->model('marca_model', 't_marca');

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
        $this->sys_render('marca', $data, $data_header, $parametroFooter);
    }

    public function listarMarcas(){
        $result['status'] = 'success';
        $result['msg'] = 'Se listó correctamente...';	

        $data= $this->t_marca->_get_marca();
        $result['data'] =$data;

        $this->json_output($data);
    }

    public function obtenerMarca(){
        $result['status'] = 'success';
        $result['msg'] = 'Se listó correctamente...';
        
        $id_marca = @$_POST['id'];       

        $data= $this->t_marca->_get_marca_by_id($id_marca);
        $result['data'] =$data;

        $this->json_output($data);
    }

    public function registrarMarca(){

        $nombre_marca = @$_POST['nombre_marca'];       
		$flg_estado = @$_POST['flg_estado'];    
        $data = $this->t_marca->_insert_marca($nombre_marca,$flg_estado);

        if($data){
            $result['status'] = 'success';
            $result['msg'] = 'Se registró correctamente';	
        }else{
            $result['status'] = 'error';
            $result['msg'] = 'Ocurrio un error al registrar';	
        }

        $this->json_output($result);
    }

    public function actualizarMarca(){

        $id_marca = @$_POST['id_marca'];
        $nombre_marca = @$_POST['nombre_marca'];
        $flg_estado = @$_POST['flg_estado'];

        $data = $this->t_marca->_update_marca($id_marca,$nombre_marca,$flg_estado);

        if($data){
            $result['status'] = 'success';
            $result['msg'] = 'Se actualizó correctamente';	
        }else{
            $result['status'] = 'error';
            $result['msg'] = 'Ocurrio un error al actualizar';	
        }

        $this->json_output($result);
    }

    public function eliminarMarca(){

        $id_marca = @$_POST['id_marca'];
        

        $data = $this->t_marca->_delete_marca($id_marca);

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