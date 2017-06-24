<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');    
    class Informe extends CI_Controller {
    	function __construct(){
    		parent::__construct();
                 $this->load->library(array('session'));
			$this->load->model('informe/informe_model');
			$this->load->library('Datatables');
    	}

    	public function datatable($historia){
    		if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
			$this->datatables->select("informeid,fecha,CONCAT(nombre,'',tipo) AS nombre ",FALSE)
							 ->from('histo_informe_labs')
							 ->where('historiaclinicaid',$historia)
							 ->unset_column('informeid')
							 ->add_column('Descargar','<center><a href="#"><i class="glyphicon glyphicon-download-alt"></i></a></center>', 'informeid');
			echo $this->datatables->generate();
		}
		public function uploadInforme() {
	        if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
	        $config['allowed_types'] = 'doc|docx|pdf|xls|xlsx';
	        $config['overwrite'] = true;
	        $config['max_size'] = '500';
	        if(!is_dir('./documentos/informes/'.$this->input->post('historiaid'))){
	        	mkdir('./documentos/informes/'.$this->input->post('historiaid'),0777,TRUE);
	        }
	        $config['upload_path'] = './documentos/informes/'.$this->input->post('historiaid').'/';
	        $this->load->library('upload', $config);
	        if(! $this->upload->do_upload('f_subir_informe')){
	        	$error = array('error' => $this->upload->display_errors());
	        	echo json_encode($error);
	        }
	        else{
	        	$file_info = $this->upload->data();
		        $data = array('upload_data' => $this->upload->data());
		        $nombre = $file_info['raw_name'];
		        $tipo = $file_info['file_ext'];
		        $historiaclinicaid = $this->input->post('historiaid');
		        $registro=$this->informe_model->comprobar($nombre,$tipo,$historiaclinicaid);
		        $informe = array('nombre'=>$nombre,'fecha'=>date('Y-m-d'),'tipo'=>$tipo,'historiaclinicaid'=>$historiaclinicaid);
		        if($registro==NULL){
		        	$this->informe_model->save($informe);
		        }
		        else{
		        	$this->informe_model->update($informe,$registro->informeid);	
		        }
		        echo json_encode($data);
	        }
	    }
	    public function download($nombre,$historiaid){
	    	if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
	    	$data = file_get_contents('documentos/informes/'.$historiaid.'/'.$nombre); 
       		force_download($nombre,$data);
	    }
		public function delete($informeid,$historia,$nombre){
			if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
			$rpta=$this->informe_model->delete($informeid);
			$data['informes']=$this->informe_model->getAll($historia);
			if($rpta){
	    		$data['mensaje']='Informe eliminado satisfactoriamente';
	    		unlink('documentos/informes/'.$historia.'/'.$nombre);
	    	}
	    	else{
	    		$data['error']='No se pudo eliminar el informe';
	    	}
			$this->load->view('paciente/paciente_view_informe',$data);
		}
    }
?>