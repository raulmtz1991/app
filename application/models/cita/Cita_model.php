<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Cita_model extends CI_Model{
        function __construct() {
            parent::__construct();
        }

        function cita_asignada($medicoid, $simbolo){
        	$this->db->select('tb_paciente.nomcompleto as nombpaciente, tb_persona.nombcompleto as nombmedico,
        					   tb_medico.especialidad as espec, sys_cita.fecha, sys_cita.horainicio');	
			$this->db->from('sys_cita');
			$this->db->join('tb_paciente','sys_cita.pacienteid=tb_paciente.pacienteid');
			$this->db->join('tb_medico','tb_medico.medicoid=sys_cita.medicoid');
			$this->db->join('tb_persona','tb_persona.personaid=tb_medico.personaid');	
			if($simbolo==='pendientes'){
				$this->db->where('CURDATE()<=sys_cita.fecha');
			}else{
				$this->db->where('CURDATE()>sys_cita.fecha');
			}
			$this->db->where('sys_cita.medicoid', $medicoid);
			$query = $this->db->get();
			return $query->result();
        }
		
		function getAll($campo, $valor){
			$this->db->select('*');	
			$this->db->from('sys_cita');
			$this->db->join('tb_paciente','sys_cita.pacienteid=tb_paciente.pacienteid');
			$this->db->join('tb_medico','tb_medico.medicoid=sys_cita.medicoid');
			$this->db->join('tb_persona','tb_persona.personaid=tb_medico.personaid');	
			if($campo!='null'){
				$this->db->where($campo, $valor);
			}
			$query = $this->db->get();
			return $query->result();
		}
		function get(){
			
		}
		function add($cita){
			if($this->db->insert('sys_cita',$cita)){
				return TRUE;
			}
			else {
				return FALSE;
			}
		}
		
		function get_like($letra,$campo){
			$this->db->select("$campo as query");
			$this->db->from('sys_cita');
			$this->db->join('tb_medico','tb_medico.medicoid=sys_cita.medicoid');
			$this->db->join('tb_persona','tb_persona.personaid=tb_medico.personaid');
			$this->db->like($campo,$letra);
			$this->db->group_by($campo);
			$query = $this->db->get('');
			return $query->result();
		}
		
		function move($id, $dias, $tiempo){
			$this->db->set('fecha',"DATE_ADD(fecha,INTERVAL $dias DAY)",FALSE);
			$this->db->set('horainicio',"SEC_TO_TIME(time_to_sec(horainicio)+$tiempo)",FALSE);
			$this->db->set('horafin',"SEC_TO_TIME(time_to_sec(horafin)+$tiempo)",FALSE);			
			$this->db->where('citaid',$id);
			$this->db->update('sys_cita');
		}
				
		function resizable($id,$tiempo){
			$this->db->set('horafin',"SEC_TO_TIME(time_to_sec(horafin)+$tiempo)",FALSE);
			$this->db->where('citaid',$id);
			$this->db->update('sys_cita');
		}
		
		function delete($citaid){
			$this->db->where('citaid', $citaid);
			$this->db->delete('sys_cita');
		}
		
		function update(){
			
		}
    }
?>