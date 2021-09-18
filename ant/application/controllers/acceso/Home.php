<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('display_errors', 1);
ini_set('memory_limit', '-1');
set_time_limit(0);

class Home extends Sys_Controller {
    
    function __construct()
    {
    	parent::__construct();
        $this->load->model('marca_model', 't_marca');

        session_write_close();
    }

    public function index(){
        $data = array();
        $parametroFooter = array(
            // 'jslib' => array(
            //     'assets/js/advanced-datatable/js/jquery.dataTables.js',
            //     'assets/js/data-tables/DT_bootstrap.js',
            //     'assets/js/advanced-datatable/js/dataTables.fixedColumns.min.js',
            //     'assets/js/highcharts/highcharts.js',
            //     'assets/js/highcharts/highcharts.exporting.js'
            // ),
        );
        $data_header = array();
        $this->sys_render('principal', $data, $data_header, $parametroFooter);
    }

    public function listarMarcas(){
        $result['status'] = 'success';
        $result['msg'] = 'Datos de accesos correctos...';	

        $data['marcas'] = $this->t_marca->_get_marcas_segundaopcion();


        $this->json_output($data);
    }

    public function crearMarca(){

        $data['marcas'] = $this->t_marca->_insert_marca(3,'Mi Marca',1);


        $this->json_output($data);
    }
}