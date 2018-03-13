<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quotes extends MY_Controller {

           
	public function index(){

           
            
            $quotes = New Job();
            $this->data['quick_quotes'] = $quotes->where('status_id',1)->include_related('customer')->order_by('created','asc')->get();
            $this->load->view('quotes/index',$this->data);
	}

        public function create_new_quote(){ /* this is only for build */



        }
        
        
        public function show_single_job($id=NULL){
            
            if(!$id){
                show_404();
             
            }
            
            $job = New Job();
            $job->where('id',$id)->include_related('customer')->get(1);
            pr($job->stored);
            exit();
            
        }

        public function send_first_reminder(){
            
            $quotes = New Job();
            $this->data['quick_quotes'] = $quotes->where('status_id',1)->include_related('customer')->order_by('created','asc')->get();
            
            
        }
        
        public function encode($input){

            $ciphertext = $this->encryption->encrypt($input);
            echo $ciphertext;
            echo '<br />';

// Outputs: This is a plain-text message!
            echo $this->encryption->decrypt($ciphertext);


        }

        public function decode($input){

            echo $this->encryption->decrypt($input);


        }


        }
