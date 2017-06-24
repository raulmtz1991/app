<?php

class Estado extends MX_Controller {
    
    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('Estado_model','common_model',TRUE);
                $this->lang->load("english", "english");
	}	
	
	function index(){
		$this->manage();
	}

	function manage(){
        $this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = site_url().'/Estado/manage/';
        $config['total_rows'] = $this->common_model->count('Estado');
        $config['per_page'] = 3;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
		$this->data['results'] = $this->common_model->get('Estado','idEstado,IdPais,Capital,Nombre','',$config['per_page'],$this->uri->segment(3));
       
	   $this->load->view('Estado/list', $this->data); 
       
		
    }
	
    function add(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('Estado') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="alert alert-error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'IdPais' => set_value('IdPais'),
					'Capital' => set_value('Capital'),
					'Nombre' => set_value('Nombre')
            );
           
			if ($this->common_model->add('Estado',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(site_url().'/Estado/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="alert alert-error"><p>An Error Occured.</p></div>';

			}
		}		   
		$this->load->view('Estado/add', $this->data);   
       
    }	
    
    function edit(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('Estado') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="alert alert-error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'IdPais' => $this->input->post('IdPais'),
					'Capital' => $this->input->post('Capital'),
					'Nombre' => $this->input->post('Nombre')
            );
           
			if ($this->common_model->edit('Estado',$data,'idEstado',$this->input->post('idEstado')) == TRUE)
			{
				redirect(site_url().'/Estado/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

			}
		}

		$this->data['result'] = $this->common_model->get('Estado','idEstado,IdPais,Capital,Nombre','idEstado = '.$this->uri->segment(3),NULL,NULL,true);
		
		$this->load->view('Estado/edit', $this->data);		
        
    }
	
    function delete(){
            $ID =  $this->uri->segment(3);
            $this->common_model->delete('Estado','idEstado',$ID);
            redirect(site_url().'/Estado/manage/');
    }
}

/* End of file Estado.php */
/* Location: ./system/application/controllers/Estado.php */