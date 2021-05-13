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

        $result = array();
        $result['status'] = 'error';
        $result['msg'] = 'Error de servidor';		

        
		if(isset($usuario) && trim($usuario)!='' && isset($clave) && trim($clave)!=''){

            $data= $this->t_usuario->_get_usuario($usuario, md5($clave));
            
            
            if(!empty($data)){
                
                if($data[0]["flg_estado"]==1){
                    $result['status'] = 'success';
                    $result['msg'] = 'Inicio correctamente';

                    
                    $sess_array = array(                        
                        'numero_documento' =>$data[0]["numero_documento"],
                        'nombres' =>$data[0]["nombres"],
                        'apellido_paterno' =>$data[0]["apellido_paterno"],
                        'apellido_materno' =>$data[0]["apellido_materno"],
                        'perfil' =>$data[0]["perfil"],
                        'flg_estado' =>$data[0]["flg_estado"],
                        'logged_in' => TRUE);
                    
                    

                    $this->session->set_userdata('sitio', 'http://tutsplus.com');
                    
                        
                    $this->session->set_userdata($sess_array);
                    
                    
                    
                    

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
            
            

        } else{
            $result['status'] = 'error';
			$result['msg'] = 'Ingrese usuario y/o clave';
        }

        $this->json_output($result);

        
    }

}

