<?php

class Account_model extends CI_model{
    function transfer_money($first_id, $second_id, $amount){
        $call_procedure="CALL credit_transfer(?,?,?)";
        $data=array('first_id'=>$first_id, 'second_id'=>$second_id, 'amount'=>$amount);
        $this->db->query($call_procedure, $data);
        
        return $this->db->affected_rows();

    }

}