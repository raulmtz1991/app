<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Rayosx extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('rayosx/rayosx_model');
		}

		public function uploadRayosx(){
	    	if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
	    	$config['allowed_types']='jpg|png';
	    	$config['overwrite'] = true;
	    	$config['max_size']='0';
	    	if(!is_dir('./documentos/rayosx/'.$this->input->post('historiaid'))){
	        	mkdir('./documentos/rayosx/'.$this->input->post('historiaid'),0777,TRUE);
	        }
	        $config['upload_path']='./documentos/rayosx/'.$this->input->post('historiaid').'/';
	    	$this->load->library('upload',$config);
	    	if(!$this->upload->do_upload('f_subir_rayosx')){
	    		$error=array('error' => $this->upload->display_errors());
	    		echo json_encode($error);
	    	}
	    	else{
	    		$file_info = $this->upload->data();
		        $data=array('upload_data' => $this->upload->data());
		        $nombre=$file_info['raw_name'];
		        $tipo=$file_info['file_ext'];
		        $historiaclinicaid = $this->input->post('historiaid');
		        $registro=$this->rayosx_model->comprobar($nombre,$tipo,$historiaclinicaid);
		        $rayosx = array('nombre'=>$nombre,'fecha'=>date('Y-m-d'),'tipo'=>$tipo,'historiaclinicaid'=>$historiaclinicaid);
		        if($registro==NULL){
		        	$subir=$this->rayosx_model->subir($rayosx);
		        }
		        else{
		        	$this->rayosx_model->update($rayosx,$registro->rayosxid);	
		        }
		        echo json_encode($data);	
	    	}
	    }
	    public function download($nombre,$historiaid){
	    	if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
	    	$data = file_get_contents('documentos/rayosx/'.$historiaid.'/'.$nombre); 
       		force_download($nombre,$data);
	    }
	    public function delete($rayosxid,$historiaid,$nombre){
	    	if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
	    	$rpta=$this->rayosx_model->delete($rayosxid);
	    	$data['rayos']=$this->rayosx_model->get($historiaid);
	    	if($rpta){
	    		$data['mensaje']='Rayo-x eliminado satisfactoriamente';
	    		unlink('documentos/rayosx/'.$historiaid.'/'.$nombre);
	    	}
	    	else{
	    		$data['error']='No se pudo eliminar el rayo-x';
	    	}
	    	$this->load->view('paciente/paciente_view_rayosx',$data);
	    }
	    public function getRayosx($historiaclinicaid){
	    	if ($this->session->userdata['logged_in'] == FALSE) {
            	redirect('User/login');
        	}
	    	$rayosxs=$this->rayosx_model->get($historiaclinicaid);
	    	$rayosx = array('rayos' => $rayosxs); 
			$this->load->view('paciente/paciente_view_rayosx',$rayosx);
		}
	} 
?>