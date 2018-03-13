<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Customer extends MY_Model {


    public $has_many = array('job');

    function __construct() {
        parent::__construct();
    }

    public function new_customer_by_email($email){

        $new_customer = New Customer();
        $new_customer->get_by('email',$email);
        if($new_customer->result_count()> 0){
            return $new_customer;
        } else {
            $create_new_cusomer = New Customer();
            $create_new_cusomer->email = $email;
            $create_new_cusomer->save();
            return $create_new_cusomer;
        }



        }
    }




