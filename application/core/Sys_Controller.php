<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sys_Controller extends CI_Controller {
    
	var $usuario_login;
	var $usuario_sesion;
	var $validar_login = false;
	var $tokensms_duration;
	var $tokenapi_duration;

	function __construct($validar = true)
	{
		parent::__construct();

		// $this->validar_login = $validar;
        // $this->usuario_login = $this->session->userdata('usuario_login');
		// $this->usuario_sesion = $this->session->userdata('usuario_sesion');

		// if(!$this->usuario_login && $this->validar_login){
		// 	redirect('/login', 'refresh');
		// }
		//elseif($this->usuario_login && $this->validar_login){
			// $sesion = $this->m_sesion->get_SesionActiva($this->usuario_login);
			// if(!$sesion || $sesion['ipmaqreg']!=$this->_getIP()){
			// 	$this->session->set_userdata('usuario_login', FALSE);
			// 	$this->session->set_userdata('usuario_sesion', FALSE);
			// 	redirect('/login', 'refresh');
			// }
		// }
    }

	protected function sys_render($view, $data = array(), $datah = array(), $dataf = array()){
		$data_header = array();
		//$data_header['obj_usuario'] = $this->usuario_login;//$this->getUsuarioLogin();
        // $data_header['sidebar']        = @$_COOKIE['sidebar'];
		$data_header = array_merge($data_header, $datah);

		// $data_header['menu'] = $this->get_menu($data_header['obj_usuario']['idusuario']);

		$data_footer = array();
		$data_footer = array_merge($data_footer, $dataf);

		// $data_footer['ses_duracion'] = $this->m_sesion->_get_duracion($data_header['obj_usuario']['idusuario']);

	//	$data['obj_usuario'] = $this->usuario_login;//$this->getUsuarioLogin();
		// $data['obj_modulo'] = $this->modulo_base;

		$this->load->view('vw_header', $data_header);
		$this->load->view($view, $data);
		$this->load->view('vw_footer', $data_footer);
	}

	public function index(){

	}

	protected function json_output($arr = array())
	{
		header('Content-Type: application/json');
		echo json_encode( $arr );
	}



}