<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');    
    class Enfermedad extends CI_Controller {
    		
    	function __construct(){
    		parent::__construct();
                 $this->load->library(array('session'));
			$this->load->model('paciente/paciente_model');
			$this->load->model('paciente/enfermedad_model');
    	}
		
		function addOrUpdate(){

			if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
			$diagnostico = array(
				'fecha'=>$this->input->post('txtFecha'),
				'tiemenferm'=>$this->input->post('txtTiempo'),
				'sp'=>$this->input->post('txtsp'),
				'relato'=>$this->input->post('txtRelato'),
				'fc'=>$this->input->post('txtFC'),
				'pa'=>$this->input->post('txtPA'),
				'fr'=>$this->input->post('txtFR'),
				'temperatura'=>$this->input->post('txtT'),
				'peso'=>$this->input->post('txtPeso'),
				'general'=>$this->input->post('txtGeneral'),
				'cabeza'=>$this->input->post('txtCabeza'),
				'cuello'=>$this->input->post('txtCuello'),
				'toraxpulmones'=>$this->input->post('txtTorax'),
				'cardiovascular'=>$this->input->post('txtCardio'),
				'abdomen'=>$this->input->post('txtAbdomen'),
				'genitourinario'=>$this->input->post('txtGenito'),
				'loconeurolo'=>$this->input->post('txtLocoNeuro'),
				'dx1'=>$this->input->post('txtDiagnostico1'),
				'dx2'=>$this->input->post('txtDiagnostico2'),
				'dx3'=>$this->input->post('txtDiagnostico3'),
				'dx4'=>$this->input->post('txtDiagnostico4'),
				'tratamiento1'=>$this->input->post('txtTratamiento1'),
				'tratamiento2'=>$this->input->post('txtTratamiento2'),
				'tratamiento3'=>$this->input->post('txtTratamiento3'),
				'tratamiento4'=>$this->input->post('txtTratamiento4'),
				'exauxiliares'=>$this->input->post('txtExa'),
				'historiaclinicaid'=>$this->input->post('hdnhistoriaid')
			);
			if($this->input->post('hdndiagnosticoid')==NULL){
				$this->enfermedad_model->add($diagnostico);
			}else{
				$this->enfermedad_model->update($this->input->post('hdndiagnosticoid'),$diagnostico);
			}
		}
		
		function getAll(){
			if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
			$id = json_decode($_POST['id'],TRUE);
			$data = $this->enfermedad_model->getAll($id);
			$data['success']=true;
			echo json_encode($data);
		}
		
		function get($diagnosticoid){
			if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
			$data['enfermedad']=$this->enfermedad_model->get($diagnosticoid);
			$this->load->view('paciente/paciente_view_enfermedad_form',$data);
		}
    }
?>