<?php

class Enfermedades extends CI_Controller {
    
    function __construct() {
        parent::__construct();
             $this->load->helper('language');
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('Enfermedades_model','common_model',TRUE);
                $this->lang->load("english", "english");
                $this->load->model("menu_model", "menu");
		$items = $this->menu->all();
       
		$this->load->library("multi_menu");
		$this->multi_menu->set_items($items);
	}	
	
	function index(){
		$this->manage();
	}

	function manage(){
        $this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = site_url().'/Enfermedades/manage/';
        $config['total_rows'] = $this->common_model->count('Enfermedades');
        $config['per_page'] = 3;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
		$this->data['results'] = $this->common_model->get('Enfermedades','IdEnfermedades,Nombre,Descripcion,IdEspecialidad','',$config['per_page'],$this->uri->segment(3));
       
                $this->load->view('include/head');
                $this->load->view('include/menu');
	   $this->load->view('Enfermedades/list', $this->data); 
           $this->load->view('include/footer');
       
		
    }
                
    function add(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('Enfermedades') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="alert alert-error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'Nombre' => set_value('Nombre'),
					'Descripcion' => set_value('Descripcion'),
					'IdEspecialidad' => set_value('IdEspecialidad')
            );
           
			if ($this->common_model->add('Enfermedades',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(site_url().'/Enfermedades/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="alert alert-error"><p>An Error Occured.</p></div>';

			}
		}		   
                 $this->load->view('include/head');
                $this->load->view('include/menu');
		$this->load->view('Enfermedades/add', $this->data);   
       
    }	
    
    function edit(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('Enfermedades') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="alert alert-error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'Nombre' => $this->input->post('Nombre'),
					'Descripcion' => $this->input->post('Descripcion'),
					'IdEspecialidad' => $this->input->post('IdEspecialidad')
            );
           
			if ($this->common_model->edit('Enfermedades',$data,'IdEnfermedades',$this->input->post('IdEnfermedades')) == TRUE)
			{
				redirect(site_url().'/Enfermedades/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

			}
		}

		$this->data['result'] = $this->common_model->get('Enfermedades','IdEnfermedades,Nombre,Descripcion,IdEspecialidad','IdEnfermedades = '.$this->uri->segment(3),NULL,NULL,true);
		 $this->load->view('include/head');
                $this->load->view('include/menu');
		$this->load->view('Enfermedades/edit', $this->data);		
        
    }
	
    function delete(){
            $ID =  $this->uri->segment(3);
            $this->common_model->delete('Enfermedades','IdEnfermedades',$ID);
            redirect(site_url().'/Enfermedades/manage/');
    }
}

/* End of file Enfermedades.php */
/* Location: ./system/application/controllers/Enfermedades.php */