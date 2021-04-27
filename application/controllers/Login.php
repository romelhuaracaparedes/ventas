<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Sys_Controller  {

	var $usuario_login;

	function __construct()
    {
        parent::__construct(FALSE);
    }


	public function index(){
        if(isset($this->usuario_login) && $this->usuario_login !== FALSE){
			redirect('/acceso/home', 'refresh');
		}else{
			$data = array();
			$this->load->view('login', $data);
		}
    }

    public function validar(){
        $codigo = $this->input->post('usr_codigo');
		$clave = $this->input->post('usr_clave');
		// $submit = $this->input->post('action'); //login o token
		$usr_tokensms = $this->input->post('usr_tokensms');

        $result = array();
		if(isset($codigo) && trim($codigo)!='' && isset($clave) && trim($clave)!=''){
            if($codigo == 'JMEJIA' && $clave='123'){
                $result['status'] = 'success';
                $result['msg'] = 'Datos de accesos correctos...';	
                $login['idusuario'] = '1';
                $login['usuario'] = $codigo;
                $login['clave'] = $clave;
                $this->session->set_userdata('usuario_login', $login);
                $this->session->set_userdata('usuario_sesion', 'ses1');
            } else{
                $result['status'] = 'error';
                $result['msg'] = 'Credenciales incorrectas';
            }
        } else{
            $result['status'] = 'error';
			$result['msg'] = 'Ingrese usuario y/o clave';
        }

        echo json_encode($result);
    }

}

