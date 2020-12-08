<?php

class Debit_model extends CI_model{

    function get_balance($id){
        $this->db->select('Saldo');
        $this->db->from('Debit_tili');
        if($id !==NULL){
            $this->db->where('idDebit_tili',$id);
        }
        return $this->db->get()->result_array();
    }

    function debit_whitdrawal($id, $amount){
        $call_procedure="CALL debit_whitdrawal(?,?)";
        $data=array('first_id'=>$id, 'amount'=>$amount);
        $this->db->query($call_procedure, $data);
        
        return $this->db->affected_rows();
    }
}