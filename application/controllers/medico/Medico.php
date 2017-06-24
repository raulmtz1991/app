<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');    
    class Medico extends CI_Controller {
    		
    	function __construct(){
    		parent::__construct();
                   $this->load->library(array('session'));
			$this->load->model('medico/medico_model');
			$this->load->model('persona/persona_model');
			$this->load->model('estadoCivil/estado_civil_model');
			$this->load->library('Datatables');
                        $this->load->model("menu_model", "menu");
		$items = $this->menu->all();

		$this->load->library("multi_menu");
		$this->multi_menu->set_items($items);
    	}
		
        function formMedico() {
        if ($this->session->userdata['logged_in'] == FALSE) {
             redirect('User/login');
        }
       
          $estado_civil['estadocivil'] = $this->estado_civil_model->getAll();
     
          $this->load->view('include/head');
                  $this->load->view('include/menu');
				$this->load->view('medico/medico_view', $estado_civil);
                                $this->load->view('include/footer');
    }

    function formListarMedico() {
        if ($this->session->userdata['logged_in'] == FALSE) {
             redirect('User/login');
        }
            $this->load->view('include/head');
                  $this->load->view('include/menu');
				$this->load->view('medico/medico_view_list', '');
                                $this->load->view('include/footer');
    
    }

		function report(){
			if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
			$this->html2pdf->folder('./files/pdfs/medico/');
			$this->html2pdf->filename('medicos.pdf');
			$this->html2pdf->paper('a4','portrait');
			$medico['medicos'] = $this->medico_model->getAll();
			$this->html2pdf->html(utf8_decode($this->load->view('doctor/medico_view_report',$medico,TRUE)));
			
			if($this->html2pdf->create('save')){
				if(is_dir("./files/pdfs/medico"))
        		{
            		$filename = "medicos.pdf"; 
            		$route = base_url("files/pdfs/medico/medicos.pdf"); 
            		if(file_exists("./files/pdfs/medico/".$filename))
            		{
                		header('Content-type: application/pdf'); 
                		readfile($route);
            		}	
        		}
			}
		}

		function datatable(){
			if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
			$this->datatables->select("medicoid, tb_medico.personaid, dni ,nombcompleto, domicilio, telefono")
							 ->from('tb_medico')
							 ->join('tb_persona','tb_medico.personaid=tb_persona.personaid')
							 ->unset_column('tb_medico.personaid')
							 ->unset_column('medicoid')
							 ->add_column('editar', '<center><a href="actualizar-medico/$1"><i class="glyphicon glyphicon-pencil"></i></a></center>', 'medicoid')
							 ->add_column('eliminar', '<center><a id=eliminar url="eliminar_medico/$1/$2"><i class="glyphicon glyphicon-remove"></i></a></center>', 'medicoid, tb_medico.personaid');
			echo $this->datatables->generate();
		}
		
		function addOrUpdate(){
			if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
			if($this->input->post('hdnpersonaid')==NULL){
				$persona = array(
							'nombres'=>$this->input->post('txtnombre'),
							'apepaterno'=>$this->input->post('txtapepaterno'),
							'apematerno'=>$this->input->post('txtapematerno'),
							'nombcompleto'=>$this->input->post('txtnombre').' '.$this->input->post('txtapepaterno').' '.$this->input->post('txtapematerno'),
							'fechnacimiento'=>$this->input->post('txtfecha'),
							'domicilio'=>$this->input->post('txtdireccion'),
							'telefono'=>$this->input->post('txttelefono'),
							'celular'=>$this->input->post('txtcelular'),
							'dni'=>$this->input->post('txtdni'),
							'ColoniaID'=>0,
							'estadocivilid'=>$this->input->post('list_estado'));
				$personaid = $this->persona_model->add($persona);
				$medico =array('personaid'=>$personaid,
							   'especialidad'=>ucwords($this->input->post('txtespecialidad')));
				$this->medico_model->add($medico);
				$this->session->set_flashdata('mensaje','Registro guardado satisfactoriamente');
				redirect(base_url().'listar-medico','refresh');
			}
			else{
				$personaid = $this->input->post('hdnpersonaid');
				$medicoid = $this->input->post('hdnmedicoid');
				$persona = array(
							'nombres'=>$this->input->post('txtnombre'),
							'apepaterno'=>$this->input->post('txtapepaterno'),
							'apematerno'=>$this->input->post('txtapematerno'),
							'nombcompleto'=>$this->input->post('txtnombre').' '.$this->input->post('txtapepaterno').' '.$this->input->post('txtapematerno'),
							'fechnacimiento'=>$this->input->post('txtfecha'),
							'domicilio'=>$this->input->post('txtdireccion'),
							'telefono'=>$this->input->post('txttelefono'),
							'celular'=>$this->input->post('txtcelular'),
							'dni'=>$this->input->post('txtdni'),
							'ColoniaID'=>0,
							'estadocivilid'=>$this->input->post('list_estado'));
				$medico = array('personaid'=>$personaid,
								'especialidad' => ucwords($this->input->post('txtespecialidad')));
				$this->persona_model->update($personaid,$persona);
				$this->medico_model->update($medico,$medicoid);
				$this->session->set_flashdata('mensaje','Registro actualizado satisfactoriamente');
				redirect(base_url().'listar-medico','refresh');
			}
			
		}
		
		function delete($medicoid,$personaid){
			if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
			$valor=$this->medico_model->delete($medicoid,$personaid);
			if($valor){
				$this->session->set_flashdata('mensaje','Registro eliminado satisfactoriamente');
			}else{
				$this->session->set_flashdata('mensaje_a','No se puede eliminar un registro asociado');
			}
			redirect(base_url().'listar-medico','refresh');
		}
		
		function getAll(){
			
		}

		public function buscar_dni($dni='NULL'){
			if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
			$sw = $this->persona_model->get_dni($dni);
			$json=array();
			if($sw){
				$json[] = array('success'=>TRUE);
			}
			else{
				$json[] = array('success'=>FALSE);	
			}
			echo json_encode($json);
		}

		function autocomplete(){
			if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
			$row = $this->medico_model->getLike($this->input->post('dato'));
			echo json_encode($row);
		}
		
		function get($personaid){
			if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
            if($this->medico_model->get($personaid)!=NULL){
            	$datos = array('estadocivil'=>$this->estado_civil_model->getAll(),
				     'medico'=>$this->medico_model->get($personaid));
				
                $this->load->view('include/head');
                  $this->load->view('include/menu');
				$this->load->view('medico/medico_view',$datos);
                                $this->load->view('include/footer');
                                }
            else{
            	redirect(base_url().'listar-medico');
            }
		}

		function getByEspecialidad(){
			if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
			$query = $this->medico_model->getByEspecialidad($this->input->post('especialidad'));
			echo json_encode($query);
		}
    }
?>