<?php

class Transfers_model extends CI_model{

    function get_debit_transfers($id){
        $this->db->select('*');
        $this->db->from('Tilitapahtumat');
        $this->db->where('Tapahtuma','DEBIT-nosto');
        $this->db->and;
        if($id !==NULL){
            $this->db->where('idTilin_haltija',$id);
        }
        return $this->db->get()->result_array();
    } 
    
    function get_credit_transfers($id){
        $this->db->select('*');
        $this->db->from('Tilitapahtumat');
        $this->db->where('Tapahtuma','CREDIT-nosto');
        $this->db->and;
        if($id !==NULL){
            $this->db->where('idTilin_haltija',$id);
        }
        return $this->db->get()->result_array();
    } 
}