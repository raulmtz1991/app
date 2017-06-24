<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');    
    class Reportes extends CI_Controller {
    	
    	function __construct(){
    		parent::__construct();
			$this->load->model('medico/medico_model');
			$this->load->model('secretaria/secretaria_model');
    	}
		
		public function index(){
			$this->html2pdf->folder('./files/pdfs/');
			$this->html2pdf->filename('lista_de_doctores.pdf');
			$this->html2pdf->paper('a4','portrait');
			$secretaria['secretarias'] = $this->secretaria_model->getAll();
			$this->html2pdf->html(utf8_decode($this->load->view('secretaria/secretaria_view_report',$secretaria,TRUE)));
			
			if($this->html2pdf->create('save')){
				$this->show();
			}
		}
		
		public function show(){
			if(is_dir("./files/pdfs"))
        	{
            	$filename = "lista_de_doctores.pdf"; 
            	$route = base_url("files/pdfs/lista_de_doctores.pdf"); 
            	if(file_exists("./files/pdfs/".$filename))
            	{
                	header('Content-type: application/pdf'); 
                	readfile($route);
            	}	
        	}
		}	
    }
?>