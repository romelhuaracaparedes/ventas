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
        $result['data'] =$data;

        $this->json_output($data);
    }

    public function obtenerCategoria(){
        $result['status'] = 'success';
        $result['msg'] = 'Se listó correctamente...';
        
        $id_categoria = @$_POST['id'];       

        $data= $this->t_categoria->_get_categoria_by_id($id_categoria);
        $result['data'] =$data;

        $this->json_output($data);
    }

    public function registrarCategoria(){

        $nombre_caterogia = @$_POST['nombre_caterogia'];       
		$flg_estado = @$_POST['flg_estado'];    
        $data = $this->t_categoria->_insert_categoria($nombre_caterogia,$flg_estado);

        if($data){
            $result['status'] = 'success';
            $result['msg'] = 'Se registró correctamente';	
        }else{
            $result['status'] = 'error';
            $result['msg'] = 'Ocurrio un error al registrar';	
        }

        $this->json_output($result);
    }

    public function actualizarCategoria(){

        $id_categoria = @$_POST['id_categoria'];
        $nombre_categoria = @$_POST['nombre_caterogia'];
        $flg_estado = @$_POST['flg_estado'];

        $data = $this->t_categoria->_update_categoria($id_categoria,$nombre_categoria,$flg_estado);

        if($data){
            $result['status'] = 'success';
            $result['msg'] = 'Se actualizó correctamente';	
        }else{
            $result['status'] = 'error';
            $result['msg'] = 'Ocurrio un error al actualizar';	
        }

        $this->json_output($result);
    }

    public function eliminarCategoria(){

        $id_categoria = @$_POST['id_categoria'];
        

        $data = $this->t_categoria->_delete_categoria($id_categoria);

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