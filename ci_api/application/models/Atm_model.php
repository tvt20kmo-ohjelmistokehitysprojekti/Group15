<?php

class Atm_model extends CI_model{

    function get_name($id){
        $this->db->select('Etunimi');
        $this->db->from('Tilin_haltija');
        if($id !== NULL){
          $this->db->where('idTilin_haltija',$id);
        }
        return $this->db->get()->result_array();
    }

    function get_balance($id){
        $this->db->select('Saldo');
        $this->db->from('Debit_tili');
        if($id !==NULL){
            $this->db->where('idDebit_tili',$id);
        }
        return $this->db->get()->result_array();
    }

    function get_credit($id){
        $this->db->select('Luotto');
        $this->db->from('Credit_tili');
        if($id !==NULL){
            $this->db->where('idCredit_tili',$id);
        }
        return $this->db->get()->result_array();
    }

    function get_credit_limit($id){
        $this->db->select('Luottoraja');
        $this->db->from('Credit_tili');
        if($id !==NULL){
            $this->db->where('idCredit_tili',$id);
        }
        return $this->db->get()->result_array();
    }

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
    function debit_whitdrawal($first_id, $amount){
        $call_procedure="CALL debit_whitdrawal(?,?)";
        $data=array('first_id'=>$first_id, 'amount'=>$amount);
        $this->db->query($call_procedure, $data);
        
        return $this->db->affected_rows();

    }

    function credit_whitdrawal($first_id, $amount){
        $call_procedure="CALL credit_whitdrawal(?,?)";
        $data=array('first_id'=>$first_id, 'amount'=>$amount);
        $this->db->query($call_procedure, $data);
        
        return $this->db->affected_rows();
    }
}
