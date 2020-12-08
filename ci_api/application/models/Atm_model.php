<?php

class Atm_model extends CI_model{

    function account_holder_id($card_id);
        $this->db->select('idTilin_haltija');
        $this->db->from('Tilin_haltija');
        if($id !== NULL){
          $this->db->where('Kortin_id',$card_id);
        }
        return $this->db->get()->result_array();
    }

    function get_name($id){
        $this->db->select('Etunimi');
        $this->db->from('Tilin_haltija');
        if($id !== NULL){
          $this->db->where('idTilin_haltija',$id);
        }
        return $this->db->get()->result_array();
    }


}
