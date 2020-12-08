<?php

class Credit_model extends CI_model{


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
    
   function credit_whitdrawal($id, $amount){
        $call_procedure="CALL credit_whitdrawal(?,?)";
        $data=array('first_id'=>$id, 'amount'=>$amount);
        $this->db->query($call_procedure, $data);
        
        return $this->db->affected_rows();
    }