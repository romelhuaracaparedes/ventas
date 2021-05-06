<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Sys_Controller  {

	var $usuario_login;

	function __construct()
    {
        parent::__construct(FALSE);
        
        $this->load->model('Usuario_model', 't_usuario');

        session_write_close();
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
        $usuario = $this->input->post('usuario');
        $clave= $this->input->post('clave');
        $result['status'] = 'error';
        $result['msg'] = 'Error de servidor';
		

        $result = array();
		if(isset($usuario) && trim($usuario)!='' && isset($clave) && trim($clave)!=''){

            $data= $this->t_usuario->_get_usuario($usuario, md5($clave));
            if(!empty($data)){
                
                if($data[0]["flg_estado"]==1){
                    $result['status'] = 'success';
                    $result['msg'] = 'Inicio correctamente';
                    $this->session->set_userdata('usuario_login', $data);

                }
                else{
                    $result['status'] = 'error';
			        $result['msg'] = 'Su cuenta se encuentrada inhabilitada';
                }
                
                
            }
            else {
                $result['status'] = 'error';
			    $result['msg'] = 'Credenciales incorrectas';
            }
            
            
            // if($codigo == 'JMEJIA' && $clave='123'){
            //     $result['status'] = 'success';
            //     $result['msg'] = 'Datos de accesos correctos...';	
            //     $login['idusuario'] = '1';
            //     $login['usuario'] = $codigo;
            //     $login['clave'] = $clave;
            //     $this->session->set_userdata('usuario_login', $login);
            //     $this->session->set_userdata('usuario_sesion', 'ses1');
            // } else{
            //     $result['status'] = 'error';
            //     $result['msg'] = 'Credenciales incorrectas';
            // }

        } else{
            $result['status'] = 'error';
			$result['msg'] = 'Ingrese usuario y/o clave';
        }

        $this->json_output($result);

        
    }

}

