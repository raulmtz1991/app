<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Historia_clinica_model extends CI_Model{
        function __construct() {
            parent::__construct();
        }
		
		function getAll($pacienteid){
			$this->db->where('$pacienteid',$pacienteid);
			$query = $this->db->get('tb_historiaclinica');
			return $query->result();
		}
		
		function get($pacienteid){
			$this->db->where('pacienteid',$pacienteid);
			$query = $this->db->get('tb_historiaclinica');
			return $query->row();
		}
		
		function add($historiaclinica){
			if($this->db->insert('tb_historiaclinica',$historiaclinica)){
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		/*function delete($pacienteid){
				
			$this->db->where('pacienteid',$pacienteid);
			$this->db->delete('tb_paciente');
		}*/
		
		function update($historiaclinicaid, $historiaclinica){
			$this->db->where('historiaclinicaid',$historiaclinicaid);
			if($this->db->update('tb_historiaclinica',$historiaclinica)){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
    }
?>