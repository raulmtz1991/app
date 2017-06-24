<?php

class Especialidades extends MX_Controller {
    
    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('Especialidades_model','common_model',TRUE);
                $this->lang->load("english", "english");
	}	
	
	function index(){
		$this->manage();
	}

	function manage(){
        $this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = site_url().'/Especialidades/manage/';
        $config['total_rows'] = $this->common_model->count('Especialidades');
        $config['per_page'] = 3;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
		$this->data['results'] = $this->common_model->get('Especialidades','IdEspecialidad,nombre,descripcion,foto','',$config['per_page'],$this->uri->segment(3));
       
	   $this->load->view('Especialidades/list', $this->data); 
       
		
    }
	
    function add(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('Especialidades') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="alert alert-error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'nombre' => set_value('nombre'),
					'descripcion' => set_value('descripcion'),
					'foto' => set_value('foto')
            );
           
			if ($this->common_model->add('Especialidades',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(site_url().'/Especialidades/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="alert alert-error"><p>An Error Occured.</p></div>';

			}
		}		   
		$this->load->view('Especialidades/add', $this->data);   
       
    }	
    
    function edit(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('Especialidades') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="alert alert-error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'nombre' => $this->input->post('nombre'),
					'descripcion' => $this->input->post('descripcion'),
					'foto' => $this->input->post('foto')
            );
           
			if ($this->common_model->edit('Especialidades',$data,'IdEspecialidad',$this->input->post('IdEspecialidad')) == TRUE)
			{
				redirect(site_url().'/Especialidades/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

			}
		}

		$this->data['result'] = $this->common_model->get('Especialidades','IdEspecialidad,nombre,descripcion,foto','IdEspecialidad = '.$this->uri->segment(3),NULL,NULL,true);
		
		$this->load->view('Especialidades/edit', $this->data);		
        
    }
	
    function delete(){
            $ID =  $this->uri->segment(3);
            $this->common_model->delete('Especialidades','IdEspecialidad',$ID);
            redirect(site_url().'/Especialidades/manage/');
    }
}

/* End of file Especialidades.php */
/* Location: ./system/application/controllers/Especialidades.php */