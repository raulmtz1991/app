<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Persona_model extends CI_Model{
        	
        function __construct() {
            parent::__construct();
        }
		
		function add($persona){
			if($this->db->insert('tb_persona',$persona)){
				return $this->db->insert_id();
			}
			else {
				return FALSE;
			}
		}
		
		function getAll(){
			$query = $this->db->get('tb_persona');
			return $query->result();
		}
		
		function get($personaid){
			$this->db->where('personaid',$personaid);
			$query = $this->db->get('tb_persona');
			return $query->row();
		}

		function get_dni($dni){
			$this->db->where('dni',$dni);
			$query=$this->db->get('tb_persona');
			if($query->row()!=NULL){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		
		function update($personaid, $persona){
			$this->db->where('personaid',$personaid);
			if($this->db->update('tb_persona',$persona)){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
	}
?>