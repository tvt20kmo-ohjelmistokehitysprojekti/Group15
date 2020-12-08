<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';


class Credit extends REST_Controller {

     public function credit_whitdrawal_post(){
        $this->load->model('Credit_model');
        $id=$this->post('first_id');
        $amount=$this->post('amount');
        $result=$this->Account_model->credit_whitdrawal($id, $amount);

        if($result>0){
          $respond=true;
        }
        else{
          $respond=false;
        }
        echo json_encode($result);
    } 
    public function credit_get(){
      $this->load->model('Credit_model');
      $id=$this->get('first_id');
      $result=$this->Account_model->get_credit($id);

      if($result>0){
        $respond=true;
      }
      else{
        $respond=false;
      }
      echo json_encode($result);
    } 
    
}