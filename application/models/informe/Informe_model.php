<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Informe_model extends CI_Model{
        function __construct() {
            parent::__construct();
        }
        
        public function save($informe){
            $this->db->insert('histo_informe_labs',$informe);
        }
        public function update($informe,$informeid){
            $this->db->where('informeid',$informeid);
            $this->db->update('histo_informe_labs',$informe);
        }
        public function getAll($historia){
            $this->db->where('historiaclinicaid',$historia);
            $query=$this->db->get('histo_informe_labs');
            return $query->result();
        }
        public function get($informeid){
            $this->db->where('informeid',$informeid);
            return $this->db->get('histo_informe_labs')->row();
        }
        public function delete($informeid){
            $this->db->where('informeid',$informeid);
            if($this->db->delete('histo_informe_labs'))
                return true;
            else
                return false;
        }
        public function comprobar($nombre,$extension,$id){
            $this->db->select('informeid,nombre,tipo');
            $this->db->where('nombre',$nombre);
            $this->db->where('tipo',$extension);
            $this->db->where('historiaclinicaid',$id);
            $query = $this->db->get('histo_informe_labs');
            return $query->row();
        }
    }
?>