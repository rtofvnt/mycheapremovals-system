<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Ferries_costs extends MY_Model {



    function __construct() {
        parent::__construct();


    }


    public function get_all_ferries_costs(){


        $q = "SELECT fc.*, c1.name AS origin_country_name, c2.name AS destination_country_name
                FROM ferries_costs fc
                LEFT JOIN countries c1 ON c1.iso_short =fc.origin_country
                LEFT JOIN countries c2 ON c2.iso_short =fc.destination_country";


        $query = $this->db->query($q);

        return $query->result();

    }




}
