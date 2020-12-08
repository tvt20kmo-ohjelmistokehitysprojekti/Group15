<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';


class Debit extends REST_Controller {

    public function debit_whitdrawal_post(){
        $this->load->model('Debit_model');
        $id=$this->post('first_id');
        $amount=$this->post('amount');
        $result=$this->Atm_model->debit_whitdrawal($id, $amount);

        if($result>0){
          $respond=true;
        }
        else{
          $respond=false;
        }
        echo json_encode($result);
    }

    public function balance_get(){
        $this->load->model('Debit_model');
        $id=$this->get('first_id');
        $result=$this->Account_model->get_balance($id);

        if($result>0){
          $respond=true;
        }
        else{
          $respond=false;
        }
        echo json_encode($result);
    }

}