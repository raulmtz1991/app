<?php

class Alergias extends CI_Controller {
    
    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('Alergias_model','common_model',TRUE);
                $this->lang->load("english", "english");
	}	
	
	function index(){
		$this->manage();
	}

	function manage(){
        $this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = site_url().'/Alergias/manage/';
        $config['total_rows'] = $this->common_model->count('Alergias');
        $config['per_page'] = 3;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
		$this->data['results'] = $this->common_model->get('Alergias','IdAlergias,Nombre,Causante,Descripcion','',$config['per_page'],$this->uri->segment(3));
       
	   $this->load->view('Alergias/list', $this->data); 
       
		
    }
	
    function add(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('Alergias') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="alert alert-error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'Nombre' => set_value('Nombre'),
					'Causante' => set_value('Causante'),
					'Descripcion' => set_value('Descripcion')
            );
           
			if ($this->common_model->add('Alergias',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(site_url().'/Alergias/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="alert alert-error"><p>An Error Occured.</p></div>';

			}
		}		   
		$this->load->view('Alergias/add', $this->data);   
       
    }	
    
    function edit(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('Alergias') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="alert alert-error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'Nombre' => $this->input->post('Nombre'),
					'Causante' => $this->input->post('Causante'),
					'Descripcion' => $this->input->post('Descripcion')
            );
           
			if ($this->common_model->edit('Alergias',$data,'IdAlergias',$this->input->post('IdAlergias')) == TRUE)
			{
				redirect(site_url().'/Alergias/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

			}
		}

		$this->data['result'] = $this->common_model->get('Alergias','IdAlergias,Nombre,Causante,Descripcion','IdAlergias = '.$this->uri->segment(3),NULL,NULL,true);
		
		$this->load->view('Alergias/edit', $this->data);		
        
    }
	
    function delete(){
            $ID =  $this->uri->segment(3);
            $this->common_model->delete('Alergias','IdAlergias',$ID);
            redirect(site_url().'/Alergias/manage/');
    }
}

/* End of file Alergias.php */
/* Location: ./system/application/controllers/Alergias.php */