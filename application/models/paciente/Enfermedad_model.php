<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Enfermedad_model extends CI_Model{
        function __construct() {
            parent::__construct();
        }
		
		function getAll($historiaclinicaid){
			$this->db->where('historiaclinicaid',$historiaclinicaid);
			$query = $this->db->get('histo_diagnostico');
			return $query->result();
		}
		
		function get($diagnosticoid){
			$this->db->where('diagnosticoid',$diagnosticoid);
			$query = $this->db->get('histo_diagnostico');
			return $query->row();
		}
		
		function add($diagnostico){
			if($this->db->insert('histo_diagnostico',$diagnostico)){
				//return $this->db->insert_id();
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
		
		function update($diagnosticoid, $diagnostico){
			$this->db->where('diagnosticoid',$diagnosticoid);
			if($this->db->update('histo_diagnostico',$diagnostico)){
				//return $diagnosticoid;
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
    }
?>