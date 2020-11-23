<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';

/**
* This is an example of a RestApi based on PHP and CodeIgniter 3.
* 
*
* @package         CodeIgniter
* @subpackage      Rest Server
* @category        Controller
* @author          Pekka Alaluukas (edited the version made by Phil Sturgeon & Chris Kacerguis)
* @license         MIT
* @link            https://github.com/chriskacerguis/codeigniter-restserver
*/

class Atm extends REST_Controller {
    
    public function debit_whitdrawal_post(){
        $this->load->model('Atm_model');
        $first_id=$this->post('first_id');
        $amount=$this->post('amount');
        $result=$this->Account_model->debit_whitdrawal($first_id, $amount);

        if($result>0){
          $respond=true;
        }
        else{
          $respond=false;
        }
        echo json_encode($result);
    }

    public function credit_whitdrawal_post(){
        $this->load->model('Atm_model');
        $first_id=$this->post('first_id');
        $amount=$this->post('amount');
        $result=$this->Account_model->credit_whitdrawal($first_id, $amount);

        if($result>0){
          $respond=true;
        }
        else{
          $respond=false;
        }
        echo json_encode($result);
    }

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

    public function credit_get(){
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
    }