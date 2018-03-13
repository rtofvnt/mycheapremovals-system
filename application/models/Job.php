<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

Class Job extends MY_Model {

    public $has_one = array('customer');

    function __construct() {
        parent::__construct();
    }
    function get_jobs_by_status($status){
        
        if(!$status){
            show_404();
            exit();
        }
        
        
    }
}
