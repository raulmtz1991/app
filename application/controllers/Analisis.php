<?php

class Analisis extends MX_Controller {
    
    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('Analisis_model','common_model',TRUE);
                $this->lang->load("english", "english");
	}	
	
	function index(){
		$this->manage();
	}

	function manage(){
        $this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = site_url().'/Analisis/manage/';
        $config['total_rows'] = $this->common_model->count('Analisis');
        $config['per_page'] = 3;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
		$this->data['results'] = $this->common_model->get('Analisis','idAnalisis,Nombre,Caracteristica,Descripcion','',$config['per_page'],$this->uri->segment(3));
       
	   $this->load->view('Analisis/list', $this->data); 
       
		
    }
	
    function add(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('Analisis') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="alert alert-error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'Nombre' => set_value('Nombre'),
					'Caracteristica' => set_value('Caracteristica'),
					'Descripcion' => set_value('Descripcion')
            );
           
			if ($this->common_model->add('Analisis',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(site_url().'/Analisis/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="alert alert-error"><p>An Error Occured.</p></div>';

			}
		}		   
		$this->load->view('Analisis/add', $this->data);   
       
    }	
    
    function edit(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('Analisis') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="alert alert-error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'Nombre' => $this->input->post('Nombre'),
					'Caracteristica' => $this->input->post('Caracteristica'),
					'Descripcion' => $this->input->post('Descripcion')
            );
           
			if ($this->common_model->edit('Analisis',$data,'idAnalisis',$this->input->post('idAnalisis')) == TRUE)
			{
				redirect(site_url().'/Analisis/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

			}
		}

		$this->data['result'] = $this->common_model->get('Analisis','idAnalisis,Nombre,Caracteristica,Descripcion','idAnalisis = '.$this->uri->segment(3),NULL,NULL,true);
		
		$this->load->view('Analisis/edit', $this->data);		
        
    }
	
    function delete(){
            $ID =  $this->uri->segment(3);
            $this->common_model->delete('Analisis','idAnalisis',$ID);
            redirect(site_url().'/Analisis/manage/');
    }
}

/* End of file Analisis.php */
/* Location: ./system/application/controllers/Analisis.php */