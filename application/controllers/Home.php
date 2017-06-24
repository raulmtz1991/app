<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

public function __construct()
	{
		parent::__construct();
                $this->load->library(array('session'));

		$this->load->model("menu_model", "menu");
		$items = $this->menu->all();

		$this->load->library("multi_menu");
		$this->multi_menu->set_items($items);
	}
	
    
	public function index()
	{
            
	
           
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
		
            $this->load->view('include/head');
            $this->load->view('include/menu');
		$this->load->view('home_message');
                        $this->load->view('include/footer');
                
            }else{
                redirect('User/login');
            }
                
	}
}
