<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Cita extends CI_Controller {

    function __construct() {
                
        parent::__construct();
           $this->load->library(array('session'));
        $this->load->model('cita/cita_model');
         $this->load->model('medico/medico_model');
         $this->load->model("menu_model", "menu");
		$items = $this->menu->all();

		$this->load->library("multi_menu");
		$this->multi_menu->set_items($items);
	
    }

    function cita_medica(){
		if ($this->session->userdata['logged_in'] == FALSE) {
            redirect('User/login');
        }
        $datos['especialidades']=$this->medico_model->getEspecialidad();
        $datos['titulo']='Cita';
		 $this->load->view('include/head');
                 $this->load->view('include/menu');
				$this->load->view('cita/cita_view',$datos);
				$this->load->view('include/footer');
	}

	function cita_medica_elegir(){
		if ($this->session->userdata['logged_in'] == FALSE) {
            redirect('User/login');
        }
        $busqueda['especialidades']=$this->medico_model->getEspecialidad();
		$this->load->view('include/head');
                 $this->load->view('include/menu');
				$this->load->view('cita/cita_elegir_paciente',$busqueda);
				$this->load->view('include/footer');
	}

    function cita_asignada(){
        if ($this->session->userdata['logged_in'] == FALSE) {
            redirect('User/login');
        }
       
        $data=array('contenido' => $this->load->view('cita/cita_view_asignada','',TRUE),
                    'titulo' => 'Ver citas asignadas');
      $this->load->view('include/head');
                 $this->load->view('include/menu');
				$this->load->view('cita/cita_view_asignada',$busqueda);
				$this->load->view('include/footer');

    }

    function report(){
    	if ($this->session->userdata['logged_in'] == FALSE) {
            redirect('User/login');
        }
		$this->html2pdf->folder('./files/pdfs/cita/');
		$this->html2pdf->filename('citas.pdf');
		$this->html2pdf->paper('a4','portrait');
		$cita['citas'] = $this->cita_model->cita_asignada($this->uri->segment(4),$this->uri->segment(5));
		$this->html2pdf->html(utf8_decode($this->load->view('cita/cita_view_report',$cita,TRUE)));
			
		if($this->html2pdf->create('save')){
			if(is_dir("./files/pdfs/cita"))
        	{
            	$filename = "citas.pdf"; 
            	$route = base_url("files/pdfs/cita/citas.pdf"); 
            	if(file_exists("./files/pdfs/cita/".$filename))
            	{
                	header('Content-type: application/pdf'); 
                	readfile($route);
            	}	
        	}
		}
	}

    function index() {
        if ($this->session->userdata['logged_in'] == FALSE) {
            redirect('User/login');
        }
        $data['titulo'] = 'Home';
        $this->load->view('home/home_view', $data);
    }

	function tiempo_f($minutos,$horas){
		switch ($minutos) {
			case '00':
				return $hora_final=$horas.':30';
			case '10':
				return $hora_final=$horas.':40';
			case '20':
				return $hora_final=$horas.':50';
			case '30':
				return $hora_final=($horas+1).':00';
			case '40':
				return $hora_final=($horas+1).':10';
			case '50':
				return $hora_final=($horas+1).':20';
		}
	}
	
	function autocomplete(){
		if ($this->session->userdata['logged_in'] == FALSE) {
            redirect('User/login');
        }
		$letra = $this->input->post('dato');
		$campo = $this->input->post('campo');
		if($campo==='especialidad'){$campo='sys_cita.especialidad';}
		$row = $this->cita_model->get_like($letra,$campo);
		echo json_encode($row);
	}
	
	function addOrUpdate(){
		if ($this->session->userdata['logged_in'] == FALSE) {
            redirect('User/login');
        }
		$hora_i = $this->input->post('list_horas_i');
		$hora_f = $this->tiempo_f($this->input->post('list_minutos_i'),$hora_i);
		$cita = array('especialidad'=>$this->input->post('cboEspecialidad'),
					  'tipocita'=>'P',
					  'fecha'=>$this->input->post('hdnfechaCita'),
					  'horainicio'=>$hora_i.':'.$this->input->post('list_minutos_i'),
					  'horafin'=>$hora_f,
					  'pacienteid'=>$this->input->post('hdnpacienteid'),
					  'medicoid'=>$this->input->post('cboMedico'));
		$this->cita_model->add($cita);
		redirect(base_url().'calendario-citas');
	}
	
	function getAll(){
		if ($this->session->userdata['logged_in'] == FALSE) {
            redirect('User/login');
        }
		$campo=$this->input->post('campo');
		$valor=$this->input->post('valor');
		if($campo==='especialidad'){$campo='sys_cita.especialidad';}
		$citas = $this->cita_model->getAll($campo,$valor);
		$cita_json = array();
		date_default_timezone_set('America/Lima');
		$today = date('Y-m-d');
		$color = '#2980b9';
		$bColor = '#2980b9';
		foreach ($citas as $cita) {
			if($cita->fecha<$today){$color='#ff5454';$bColor='#ff5454';}
			$cita_json[] = array('id'=>$cita->citaid,
							     'title'=>$cita->nomcompleto,
							     'start'=>$cita->fecha.' '.$cita->horainicio,
							     'end'=>$cita->fecha.' '.$cita->horafin,
							     'allDay'=>FALSE,
							     'backgroundColor'=>$color,
							     'borderColor'=>$bColor);
			$color='#2980b9';
			$bColor = '#2980b9';
		}
		echo json_encode($cita_json);
	}
	
	function move($id,$dias,$tiempo){
		if ($this->session->userdata['logged_in'] == FALSE) {
            redirect('User/login');
        }
		$this->cita_model->move($id, $dias,$tiempo*60);
	}
	
	function resize($id,$tiempo){
		if ($this->session->userdata['logged_in'] == FALSE) {
            redirect('User/login');
        }
		$this->cita_model->resizable($id,$tiempo*60);
	}

	function delete($citaid){
		if ($this->session->userdata['logged_in'] == FALSE) {
            redirect('User/login');
        }
		$this->cita_model->delete($citaid);
		redirect(base_url().'calendario-citas');
	}
}
?>