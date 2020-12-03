<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

class Account extends REST_Controller {
    public function transfer_post(){
        $this->load->model('Account_model');
        $first_id=$this->post('first_id');
        $second_id=$this->post('second_id');
        $amount=$this->post('amount');
        $result=$this->Account_model->transfer_money($first_id, $second_id, $amount);

        if($result>0){
          $respond=true;
        }
        else{
          $respond=false;
        }
        echo json_encode($result);
    }
}