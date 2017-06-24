<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Secretaria_model extends CI_Model{
        function __construct() {
            parent::__construct();
        }
		
		function getAll(){
			$this->db->select('*');
			$this->db->from('tb_secretaria');
			$this->db->join('tb_persona','tb_secretaria.personaid=tb_persona.personaid');
			$query = $this->db->get();
			return $query->result();
		}
		function get($secretariaid){
			$query=$this->db->query("SELECT
			  tb_secretaria.secretariaid,
			  tb_persona.personaid,
			  tb_persona.nombres,
			  tb_persona.apepaterno,
			  tb_persona.apematerno,
			  tb_persona.nombcompleto,
			  DATE_FORMAT(tb_persona.fechnacimiento,'%Y-%m-%d') as fechnacimiento,
			  tb_persona.domicilio,
			  tb_persona.celular,
			  tb_persona.telefono,
			  tb_persona.dni,
			   cat_estadocivil.estadocivilid
			FROM
			  tb_secretaria
			  INNER JOIN tb_persona
			    ON tb_secretaria.personaid = tb_persona.personaid
			  INNER JOIN cat_estadocivil
			    ON tb_persona.estadocivilid = cat_estadocivil.estadocivilid
			    WHERE tb_secretaria.secretariaid=$secretariaid");
			if($query){
				$q2=$query->row();
				$query->free_result();
				return $q2;
			}else{
				return NULL;
			}
		}
		/*function get($secretariaid){
			$query=$this->db->query("call sp_lista_secretaria($secretariaid)");
			$q2=$query->row();
			$query->next_result();
			$query->free_result();
			return $q2;
		}*/
		function add($secretaria){
			if($this->db->insert('tb_secretaria',$secretaria)){
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		
		function delete($secretariaid, $personaid){

			$this->db->where('secretariaid',$secretariaid);
			if($this->db->delete('tb_secretaria')){
				$this->db->where('personaid', $personaid);
				$this->db->delete('tb_persona');
				return TRUE;
			}
			else{
				return FALSE;
			}
		}
		
		function update($secretaria){
			
		}
    }
?>