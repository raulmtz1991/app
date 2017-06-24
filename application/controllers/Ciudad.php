<?php

class Ciudad extends MX_Controller {
    
    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('Ciudad_model','common_model',TRUE);
                $this->lang->load("english", "english");
	}	
	
	function index(){
		$this->manage();
	}

	function manage(){
        $this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = site_url().'/Ciudad/manage/';
        $config['total_rows'] = $this->common_model->count('Ciudad');
        $config['per_page'] = 3;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
		$this->data['results'] = $this->common_model->get('Ciudad','id_cd,Nombre,IdEdo,poblacion','',$config['per_page'],$this->uri->segment(3));
       
	   $this->load->view('Ciudad/list', $this->data); 
       
		
    }
	
    function add(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('Ciudad') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="alert alert-error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'Nombre' => set_value('Nombre'),
					'IdEdo' => set_value('IdEdo'),
					'poblacion' => set_value('poblacion')
            );
           
			if ($this->common_model->add('Ciudad',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(site_url().'/Ciudad/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="alert alert-error"><p>An Error Occured.</p></div>';

			}
		}		   
		$this->load->view('Ciudad/add', $this->data);   
       
    }	
    
    function edit(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('Ciudad') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="alert alert-error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'Nombre' => $this->input->post('Nombre'),
					'IdEdo' => $this->input->post('IdEdo'),
					'poblacion' => $this->input->post('poblacion')
            );
           
			if ($this->common_model->edit('Ciudad',$data,'id_cd',$this->input->post('id_cd')) == TRUE)
			{
				redirect(site_url().'/Ciudad/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

			}
		}

		$this->data['result'] = $this->common_model->get('Ciudad','id_cd,Nombre,IdEdo,poblacion','id_cd = '.$this->uri->segment(3),NULL,NULL,true);
		
		$this->load->view('Ciudad/edit', $this->data);		
        
    }
	
    function delete(){
            $ID =  $this->uri->segment(3);
            $this->common_model->delete('Ciudad','id_cd',$ID);
            redirect(site_url().'/Ciudad/manage/');
    }
}

/* End of file Ciudad.php */
/* Location: ./system/application/controllers/Ciudad.php */