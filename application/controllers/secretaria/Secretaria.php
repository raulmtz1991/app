<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');    
    class Secretaria extends CI_Controller {
    		
    	function __construct(){
    		parent::__construct();
                   $this->load->library(array('session'));
			$this->load->model('secretaria/secretaria_model');
			$this->load->model('persona/persona_model');
			
                        $this->load->model('estadoCivil/estado_civil_model');
			$this->load->library('Datatables');
                        $this->load->model("menu_model", "menu");
		$items = $this->menu->all();

		$this->load->library("multi_menu");
		$this->multi_menu->set_items($items);
    	}
 function formSecretaria() {
        if ($this->session->userdata['logged_in'] == FALSE) {
             redirect('User/login');
        }
        
       $estado_civil['estadocivil'] = $this->estado_civil_model->getAll();
     
         $this->load->view('include/head');
                  $this->load->view('include/menu');
				$this->load->view('secretaria/secretaria_view',$estado_civil);
                                $this->load->view('include/footer');
                
    }

    function formListarSecretaria() {
        if ($this->session->userdata['logged_in'] == FALSE) {
             redirect('User/login');
        }
  
         $this->load->view('include/head');
                  $this->load->view('include/menu');
				$this->load->view('secretaria/secretaria_view_list','');
                                $this->load->view('include/footer');
    }

    	function datatable()
		{
			if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
			$this->datatables->select("secretariaid, tb_secretaria.personaid, dni ,nombcompleto, domicilio, telefono")
							 ->from('tb_secretaria')
							 ->join('tb_persona','tb_secretaria.personaid=tb_persona.personaid')
							 ->unset_column('tb_secretaria.personaid')
							 ->unset_column('secretariaid')
							 ->add_column('editar', '<center><a href="actualizar_secretaria/$1"><i class="glyphicon glyphicon-pencil"></i></a></center>', 'secretariaid')
							 ->add_column('eliminar', '<center><a id=eliminar url="eliminar_secretaria/$1/$2"><i class="glyphicon glyphicon-remove"></i></a></center>', 'secretariaid, tb_secretaria.personaid');

			echo $this->datatables->generate();
		}
		
		function report(){
			if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
			$this->html2pdf->folder('./files/pdfs/secretaria/');
			$this->html2pdf->filename('secretarias.pdf');
			$this->html2pdf->paper('a4','portrait');
			$secretaria['secretarias'] = $this->secretaria_model->getAll();
			$this->html2pdf->html(utf8_decode($this->load->view('secretaria/secretaria_view_report',$secretaria,TRUE)));
			
			if($this->html2pdf->create('save')){
				if(is_dir("./files/pdfs/secretaria"))
        		{
            		$filename = "secretarias.pdf"; 
            		$route = base_url("files/pdfs/secretaria/secretarias.pdf"); 
            		if(file_exists("./files/pdfs/secretaria/".$filename))
            		{
                		header('Content-type: application/pdf'); 
                		readfile($route);
            		}	
        		}
			}
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
				$secretaria =array('personaid'=>$personaid);
				$this->secretaria_model->add($secretaria);
				$this->session->set_flashdata('mensaje','Registro guardado satisfactoriamente');
				redirect(base_url().'listar-secretaria','refresh');
			}
			else{
				$personaid = $this->input->post('hdnpersonaid');
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
				$this->persona_model->update($personaid,$persona);
				$this->session->set_flashdata('mensaje','Registro actualizado satisfactoriamente');
				redirect(base_url().'listar-secretaria','refresh');
			}
			
		}
		
		function delete($secretariaid,$personaid){
			if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
			$valor=$this->secretaria_model->delete($secretariaid,$personaid);
			if($valor){
				$this->session->set_flashdata('mensaje','Registro eliminado satisfactoriamente');
			}else{
				$this->session->set_flashdata('mensaje_a','No se puede eliminar un registro asociado');
			}
			redirect(base_url().'listar-secretaria','refresh');
		}
		
		function getAll(){
			if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
			$data = $this->secretaria_model->getAll();
			echo json_encode($data);
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

		function get($secretariaid){
			if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
            if($this->secretaria_model->get($secretariaid)!=NULL){
            	$datos = array('estadocivil'=>$this->estado_civil_model->getAll(),
							    'secretaria'=>$this->secretaria_model->get($secretariaid));
				
                                 $this->load->view('include/head');
                  $this->load->view('include/menu');
				$this->load->view('secretaria/secretaria_view',$datos);
                                $this->load->view('include/footer');
            }else{
            	redirect(base_url().'listar-secretaria');
            }
		}
    }
?>