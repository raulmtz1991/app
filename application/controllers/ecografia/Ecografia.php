<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Ecografia extends CI_Controller{
		public function __construct(){
            $this->load->library(array('session'));
			parent::__construct();
			$this->load->model('ecografia/ecografia_model');
		}

		public function uploadEcografia(){
	    	if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
	    	$config['allowed_types']='jpg|png';
	    	$config['overwrite'] = true;
	    	$config['max_size']='500';
	    	if(!is_dir('./documentos/ecografias/'.$this->input->post('historiaid'))){
	        	mkdir('./documentos/ecografias/'.$this->input->post('historiaid'),0777,TRUE);
	        }
	        $config['upload_path']='./documentos/ecografias/'.$this->input->post('historiaid').'/';
	    	$this->load->library('upload',$config);
	    	if(!$this->upload->do_upload('f_subir_imagen')){
	    		$error=array('error' => $this->upload->display_errors());
	    		echo json_encode($error);
	    	}
	    	else{
	    		$file_info = $this->upload->data();
		        $data=array('upload_data' => $this->upload->data());
		        $nombre=$file_info['raw_name'];
		        $tipo=$file_info['file_ext'];
		        $historiaclinicaid = $this->input->post('historiaid');
		        $registro=$this->ecografia_model->comprobar($nombre,$tipo,$historiaclinicaid);
		        $ecografia = array('nombre'=>$nombre,'fecha'=>date('Y-m-d'),'tipo'=>$tipo,'historiaclinicaid'=>$historiaclinicaid);
		        if($registro==NULL){
		        	$subir=$this->ecografia_model->subir($ecografia);
		        }
		        else{
		        	$this->ecografia_model->update($ecografia,$registro->ecografiaid);	
		        }
		        echo json_encode($data);	
	    	}
	    }
	    public function download($nombre,$historiaid){
	    	if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
	    	$data = file_get_contents('documentos/ecografias/'.$historiaid.'/'.$nombre); 
       		force_download($nombre,$data);
	    }
	    public function delete($ecografiaid,$historiaid,$nombre){
	    	if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
	    	$rpta=$this->ecografia_model->delete($ecografiaid);
	    	$data['ecografias']=$this->ecografia_model->get($historiaid);
	    	if($rpta){
	    		$data['mensaje']='Ecografia eliminada satisfactoriamente';
	    		unlink('documentos/ecografias/'.$historiaid.'/'.$nombre);
	    	}
	    	else{
	    		$data['error']='No se pudo eliminar la ecografia';
	    	}
	    	$this->load->view('paciente/paciente_view_ecografia',$data);
	    }
	    public function getEcografia($historiaclinicaid){
	    	if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
	    	$ecografias=$this->ecografia_model->get($historiaclinicaid);
	    	$ecografia = array('ecografias' => $ecografias); 
			$this->load->view('paciente/paciente_view_ecografia',$ecografia);
		}
	} 
?>