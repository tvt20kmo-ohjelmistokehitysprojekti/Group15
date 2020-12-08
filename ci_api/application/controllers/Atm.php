<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';


class Atm extends REST_Controller {
    
 /* public function account_holder_get($card_id=NULL)
  {
     $card_id=$this->uri->segment(3);

      if ($card_id === NULL)
      {
          $account=$this->Atm_model->get_account_holder_id(NULL);
          if ($account)
          {
              $this->response($account, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
          }
          else
          {
              $this->response([
                  'status' => FALSE,
                  'message' => 'No account were found'
              ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
          }
      }

      else {
          if ($card_id <= 0)
          {
              $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
          }

          $account=$this->Atm_model->get_account_holder_id($card_id);
          if (!empty($card_id))
          {
              $this->set_response($card_id, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
          }
          else
          {
              $this->set_response([
                  'status' => FALSE,
                  'message' => 'account could not be found'
              ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
          }
      }

  } */

    public function holderid_post(){
      $this->load->model('Atm_model');
      $card_id=$this->post('kortin_id');
      $result=$this->Atm_model->account_holder_id($card_id);

      if($result>0){
        $respond=true;
      }
      else{
        $respond=false;
      }
      echo json_encode($result);
    }

    public function name_get(){
      $this->load->model('Atm_model');
      $id=$this->uri->segment(4);
      $result=$this->Atm_model->get_name($id);

      if($result>0){
        $respond=true;
      }
      else{
        $respond=false;
      }
      echo json_encode($result);
    }

    public function debit_whitdrawal_post(){
        $this->load->model('Atm_model');
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

   /* public function credit_whitdrawal_post(){
        $this->load->model('Atm_model');
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
    } */

    public function balance_get(){
        $this->load->model('Atm_model');
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

  /*  public function credit_get(){
        $this->load->model('Atm_model');
        $id=$this->get('first_id');
        $result=$this->Account_model->get_credit($id);

        if($result>0){
          $respond=true;
        }
        else{
          $respond=false;
        }
        echo json_encode($result);
    } */
    