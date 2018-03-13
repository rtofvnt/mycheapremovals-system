<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends MY_Controller {

          function __construct() {
             parent::__construct();
        }


	public function index(){

            if($this->input->post('delete',TRUE)){
                $this->db->delete('ferries_costs', array('id' => $this->input->post('delete',TRUE)));
            }

            if($this->input->post('update_ferry_cost',TRUE)){
                $update_cost = New Ferries_costs();
                $update_cost->where('id',$this->input->post('update_ferry_cost',TRUE))->get();
                $update_cost->cost_5 = $this->input->post('ferry_cost_5',TRUE);
                $update_cost->cost_10 = $this->input->post('ferry_cost_10',TRUE);
                $update_cost->cost_15 = $this->input->post('ferry_cost_15',TRUE);
                $update_cost->cost_30 = $this->input->post('ferry_cost_30',TRUE);
                $update_cost->save();
            }

            if($this->input->post('add_ferry_cost',TRUE)=='new'){
                $new_cost = New Ferries_costs();
                $new_cost->origin_country = $this->input->post('country_from',TRUE);
                $new_cost->destination_country = $this->input->post('country_to',TRUE);
                $new_cost->cost_5 = $this->input->post('cost_5',TRUE);
                $new_cost->cost_10 = $this->input->post('cost_10',TRUE);
                $new_cost->cost_15 = $this->input->post('cost_15',TRUE);
                $new_cost->cost_30 = $this->input->post('cost_30',TRUE);
                $new_cost->save();
            }


            $countries_array = array();
            $countries = New Country();
            $countries->order_by('name','asc');
            $countries->get();

            foreach($countries as $country){
                $countries_array[$country->iso_short] = $country->iso_short.' - '.$country->name;
            }

            $this->data['all_ferries_costs'] = $this->get_all_ferries_costs();
            $this->data['countries'] = $countries_array;
            $this->data['countries_to'] = $countries_array;

            $this->load->view('config/index',$this->data);

        }


        public function ajax_get_countires(){


        }

}