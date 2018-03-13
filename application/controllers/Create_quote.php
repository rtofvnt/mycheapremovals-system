<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_quote extends MY_Controller {

	public function index(){

            $this->data['page_name'] = 'create quote';

            if($this->input->post('create_quote',TRUE)=='new'){

                $customer = $this->customer->new_customer_by_email($this->input->post('email',TRUE));

                $this->data['post'] = $_POST;


                $new_job = New Job();

                $new_job->status_id = 1;
                $new_job->customer_id = $customer->id;
                $new_job->weight =  $this->input->post('weight',TRUE);
                $new_job->preferred_date =  $this->input->post('date',TRUE);
                $new_job->origin =  $this->input->post('origin',TRUE);
                $new_job->origin_country =  $this->input->post('setting_country',TRUE);
                $new_job->origin_country =  $this->input->post('setting_country',TRUE);
                $new_job->origin_country_short =  $this->input->post('setting_country_short',TRUE);
                $new_job->origin_state =  $this->input->post('setting_city',TRUE);
                $new_job->origin_latitude =  $this->input->post('setting_latitude',TRUE);
                $new_job->origin_longitude =  $this->input->post('setting_longitude',TRUE);

                $new_job->destination =  $this->input->post('destination',TRUE);
                $new_job->destination_country =  $this->input->post('destination_setting_country',TRUE);
                $new_job->destination_country_short =  $this->input->post('destination_setting_country_short',TRUE);
                $new_job->destination_state =  $this->input->post('destination_setting_city',TRUE);
                $new_job->destination_latitude =  $this->input->post('destination_setting_latitude',TRUE);
                $new_job->destination_longitude =  $this->input->post('destination_setting_longitude',TRUE);
                $new_job->distance_found = $this->input->post('distance_found',TRUE); // remember this is in meters !!!

                $quote = $this->calculate_quote($this->input->post('distance_found',TRUE),$new_job->origin_country_short, $new_job->destination_country_short,$new_job->destination_country_short);

                $new_job->calculated_quote_5 = $quote['quote_5'];
                $new_job->calculated_quote_10 = $quote['quote_10'];
                $new_job->calculated_quote_15 = $quote['quote_15'];

                $new_job->save();
            }

            $quotes = New Job();
            $this->data['quick_quotes'] = $quotes->where('status_id',1)->include_related('customer')->order_by('created','asc')->get();


            $this->load->view('create_quote/index',$this->data);
	}

        public function new_quote(){

            if (!$this->input->is_ajax_request()) {exit('No direct script access allowed'); }

            if($_SERVER['HTTP_ORIGIN']!='https://www.mycheapremovals.co.uk'){exit('nice try');}

            if($_POST){

                $customer = $this->customer->new_customer_by_email($this->input->post('email',TRUE));

                 $new_job = New Job();

                $new_job->status_id = 1;
                $new_job->customer_id = $customer->id;
                $new_job->weight =  $this->input->post('weight',TRUE);
                $new_job->preferred_date =  $this->input->post('date',TRUE);
                $new_job->origin =  $this->input->post('origin',TRUE);
                $new_job->origin_country =  $this->input->post('setting_country',TRUE);
                $new_job->origin_country =  $this->input->post('setting_country',TRUE);
                $new_job->origin_country_short =  $this->input->post('setting_country_short',TRUE);
                $new_job->origin_state =  $this->input->post('setting_city',TRUE);
                $new_job->origin_latitude =  $this->input->post('setting_latitude',TRUE);
                $new_job->origin_longitude =  $this->input->post('setting_longitude',TRUE);

                $new_job->destination =  $this->input->post('destination',TRUE);
                $new_job->destination_country =  $this->input->post('destination_setting_country',TRUE);
                $new_job->destination_country_short =  $this->input->post('destination_setting_country_short',TRUE);
                $new_job->destination_state =  $this->input->post('destination_setting_city',TRUE);
                $new_job->destination_latitude =  $this->input->post('destination_setting_latitude',TRUE);
                $new_job->destination_longitude =  $this->input->post('destination_setting_longitude',TRUE);
                $new_job->distance_found = $this->input->post('distance_found',TRUE); // remember this is in meters !!!

                $quote = $this->calculate_quote($this->input->post('distance_found',TRUE),$new_job->origin_country_short, $new_job->destination_country_short,$new_job->destination_country_short);

                $new_job->calculated_quote_5 = $quote['quote_5'];
                $new_job->calculated_quote_10 = $quote['quote_10'];
                $new_job->calculated_quote_15 = $quote['quote_15'];
                $new_job->calculated_quote_30 = $quote['quote_30'];

                $new_job->save();


                $this->data['job'] = $new_job->stored;
                $this->data['customer'] = $customer->stored;

                $this->send_quote_email($this->data);




            }
            return TRUE;
   /*
                [origin] => Wigan, United Kingdom
       [destination] => 2017-12-20
       [weight] => 5
       [email] => csselitepl@gmail.com
       [setting_country] => United Kingdom
       [setting_country_short] => GB
       [setting_state] => England
       [setting_state_short] => England
       [setting_city] => Greater Manchester
       [setting_latitude] => 53.5450645
       [setting_longitude] => -2.6325074000000086
       [destination_setting_country] => Germany
       [destination_setting_country_short] => DE
       [destination_setting_state] => Berlin
       [destination_setting_state_short] => Berlin
       [destination_setting_city] =>
       [destination_setting_latitude] => 52.52000659999999
       [destination_setting_longitude] => 13.404953999999975
       [distance_found] => 1435222



*/

        }


        function calculate_quote($distance, $origin_country=NULL, $destination_country=NULL){

            $ferries_costs = $this->get_ferries_cost($origin_country,$destination_country);

            // multiplier by volume

            $quote_5 =  round($distance/1000) * $this->volume_multiplier[5];
            $quote_10 = round($distance/1000) * $this->volume_multiplier[10];
            $quote_15 = round($distance/1000) * $this->volume_multiplier[15];
            $quote_30 = round($distance/1000) * $this->volume_multiplier[30];

            // add ferries costs
            if(!empty($ferries_costs)){
                $quote_5 = $quote_5 + $ferries_costs[0]->cost_5;
                $quote_10 = $quote_10 + $ferries_costs[0]->cost_10;
                $quote_15 = $quote_15 + $ferries_costs[0]->cost_15;
                $quote_30 = $quote_15 + $ferries_costs[0]->cost_15;
            }



            $return_array = array(
                'quote_5'=>floor($quote_5 /10) * 10 -1,
                'quote_10'=>floor($quote_10 /10) * 10 -1,
                'quote_15'=>floor($quote_15 /10) * 10 -1,
                'quote_30'=>floor($quote_30 /10) * 10 -1,
            );
            return $return_array;

        }




        function display_email($id){


           $job = New Job();

           $job->where('id',$id)
                   ->include_related('customer')
                   ->get();






           $this->data['job'] = $job->stored;


           $this->load->view('emails/new_quote',$this->data);


        }


}