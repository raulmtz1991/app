<?php

class Consultorios extends MX_Controller {
    
    function __construct() {
        parent::__construct();
		$this->load->library('form_validation');		
		$this->load->helper(array('form','url','codegen_helper'));
		$this->load->model('Consultorios_model','common_model',TRUE);
                $this->lang->load("english", "english");
	}	
	
	function index(){
		$this->manage();
	}

	function manage(){
        $this->load->library('table');
        $this->load->library('pagination');
        
        //paging
        $config['base_url'] = site_url().'/Consultorios/manage/';
        $config['total_rows'] = $this->common_model->count('Consultorios');
        $config['per_page'] = 3;	
        $this->pagination->initialize($config); 	
        // make sure to put the primarykey first when selecting , 
		//eg. 'userID,name as Name , lastname as Last_Name' , Name and Last_Name will be use as table header.
		// Last_Name will be converted into Last Name using humanize() function, under inflector helper of the CI core.
		$this->data['results'] = $this->common_model->get('Consultorios','idConsultorio,Nombre,Calle,Ni,Ne,id_cd,Telefono','',$config['per_page'],$this->uri->segment(3));
       
	   $this->load->view('Consultorios/list', $this->data); 
       
		
    }
	
    function add(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('Consultorios') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="alert alert-error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'Nombre' => set_value('Nombre'),
					'Calle' => set_value('Calle'),
					'Ni' => set_value('Ni'),
					'Ne' => set_value('Ne'),
					'id_cd' => set_value('id_cd'),
					'Telefono' => set_value('Telefono')
            );
           
			if ($this->common_model->add('Consultorios',$data) == TRUE)
			{
				//$this->data['custom_error'] = '<div class="form_ok"><p>Added</p></div>';
				// or redirect
				redirect(site_url().'/Consultorios/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="alert alert-error"><p>An Error Occured.</p></div>';

			}
		}		   
		$this->load->view('Consultorios/add', $this->data);   
       
    }	
    
    function edit(){        
        $this->load->library('form_validation');    
		$this->data['custom_error'] = '';
		
        if ($this->form_validation->run('Consultorios') == false)
        {
             $this->data['custom_error'] = (validation_errors() ? '<div class="alert alert-error">'.validation_errors().'</div>' : false);

        } else
        {                            
            $data = array(
                    'Nombre' => $this->input->post('Nombre'),
					'Calle' => $this->input->post('Calle'),
					'Ni' => $this->input->post('Ni'),
					'Ne' => $this->input->post('Ne'),
					'id_cd' => $this->input->post('id_cd'),
					'Telefono' => $this->input->post('Telefono')
            );
           
			if ($this->common_model->edit('Consultorios',$data,'idConsultorio',$this->input->post('idConsultorio')) == TRUE)
			{
				redirect(site_url().'/Consultorios/manage/');
			}
			else
			{
				$this->data['custom_error'] = '<div class="form_error"><p>An Error Occured</p></div>';

			}
		}

		$this->data['result'] = $this->common_model->get('Consultorios','idConsultorio,Nombre,Calle,Ni,Ne,id_cd,Telefono','idConsultorio = '.$this->uri->segment(3),NULL,NULL,true);
		
		$this->load->view('Consultorios/edit', $this->data);		
        
    }
	
    function delete(){
            $ID =  $this->uri->segment(3);
            $this->common_model->delete('Consultorios','idConsultorio',$ID);
            redirect(site_url().'/Consultorios/manage/');
    }
}

/* End of file Consultorios.php */
/* Location: ./system/application/controllers/Consultorios.php */