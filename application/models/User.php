<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



Class User extends MY_Model {


    function __construct() {
        parent::__construct();
    }

    public function email_exists($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    function get_user_details($id){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id',$id);
        $query = $this->db->get();
        $user = $query->result();
        return$user[0];
    }


}
