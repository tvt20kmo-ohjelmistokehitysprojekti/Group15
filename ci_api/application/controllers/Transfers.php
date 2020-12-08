<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';


class Transfers extends REST_Controller {
    public function debit_transfers_post(){
        $this->load->model('Transfers_model');
        $id=$this->post('id');
        $result=$this->Transfers_model->get_debit_transfers($id);

        if($result>0){
          $respond=true;
        }
        else{
          $respond=false;
        }
        echo json_encode($result);
    }

    public function credit_transfers_post(){
        $this->load->model('Transfers_model');
        $id=$this->post('id');
        $result=$this->Transfers_model->get_credit_transfers($id);

        if($result>0){
          $respond=true;
        }
        else{
          $respond=false;
        }
        echo json_encode($result);
    }