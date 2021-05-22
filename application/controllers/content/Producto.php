<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('display_errors', 1);
ini_set('memory_limit', '-1');
set_time_limit(0);

class Producto extends Sys_Controller {
    
    function __construct()
    {
    	parent::__construct();
        $this->load->model('producto_model', 't_producto');
        session_write_close();
    }

    public function index(){
        $data = array();
        $parametroFooter = array(
            'jslib' => array(
                'assets/js/VentasJS/producto.js',
            ),
        );
        $data_header = array();
        $this->sys_render('producto', $data, $data_header, $parametroFooter);
    }

    public function listarProductos(){
        $result['status'] = 'success';
        $result['msg'] = 'Se listó correctamente...';	

        $data= $this->t_producto->_get_producto();
        $result['data'] =$data;

        $this->json_output($data);
    }

    public function registrarProducto(){

        $nombre = @$_POST['nombre'];       
		$stock = @$_POST['stock'];    
        $stockmin = @$_POST['stockmin'];    
        $categoria = @$_POST['categoria'];    
        $presentacion = @$_POST['presentacion'];    
        $marca = @$_POST['marca'];    

        $data = $this->t_producto->_insert_producto($nombre,$stock,$stockmin,$categoria,$presentacion,$marca);

        if($data){
            $result['status'] = 'success';
            $result['msg'] = 'Se registró correctamente';	
        }else{
            $result['status'] = 'error';
            $result['msg'] = 'Ocurrio un error al registrar';	
        }

        $this->json_output($result);
    }

    
    public function obtenerProducto(){
        $result['status'] = 'success';
        $result['msg'] = 'Se listó correctamente...';
        
        $id_producto = @$_POST['id'];       

        $data= $this->t_producto->_get_producto_by_id($id_producto);
        $result['data'] =$data;

        $this->json_output($data);
    }

    
    public function actualizarProducto(){

        $id_producto = @$_POST['id_producto'];        
        $nombre = @$_POST['nombre'];       
		$stock = @$_POST['stock'];    
        $stockmin = @$_POST['stockmin'];      
        $categoria = @$_POST['categoria'];    
        $presentacion = @$_POST['presentacion'];    
        $marca = @$_POST['marca'];    

        $data = $this->t_producto->_update_producto($id_producto,$nombre,$stock,$stockmin,$categoria,$presentacion,$marca);

        if($data){
            $result['status'] = 'success';
            $result['msg'] = 'Se actualizó correctamente';	
        }else{
            $result['status'] = 'error';
            $result['msg'] = 'Ocurrio un error al actualizar';	
        }

        $this->json_output($result);
    }

    public function eliminarProducto(){

        $id_producto = @$_POST['id_producto'];
        

        $data = $this->t_producto->_delete_producto($id_producto);

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