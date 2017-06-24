<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Estado_civil_model extends CI_Model{
        function __construct() {
            parent::__construct();
        }
		function getAll(){
			$this->db->select('*');
			$this->db->from('cat_estadocivil');
			$query = $this->db->get();
			return $query->result();
		}
		function get($estadocivilid){
			$this->db->where('estadocivilid',$estadocivilid);
			$query = $this->db->get('cat_estadocivil');
			return $query->row();
		}
		function add($estadocivil){
			if($this->db->insert('cat_estadocivil',$estadocivil)){
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		function delete($estadocivilid){
				
			$this->db->where('estadocivilid',$estadocivilid);
			if($this->db->delete('cat_estadocivil')){
				return true;
			}
			else{
				return false;
			}
		}
		function update($estadocivilid, $estadocivil){
			$this->db->where('estadocivilid',$estadocivilid);
			if($this->db->update('cat_estadocivil',$estadocivil)){
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
    }
?>