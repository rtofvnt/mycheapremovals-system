<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{


    var $volume_multiplier = array(
        5=>0.3,
        10=>0.4,
        15=>0.6,
        30=>1.2
    );
    // this could be good to move to some sort of config 

    public function __construct() {
        parent::__construct();

            if($this->input->is_ajax_request()) {
                $this->output->enable_profiler(false);
            } elseif(in_array($this->input->ip_address(),array('82.10.102.154'))) {
                $this->output->enable_profiler(true);
            }

            $this->encryption->initialize(
                array(
                    'cipher' => 'aes-256',
                    'mode' => 'ctr',
                    'key' => $this->config->item('encryption_key')
                    )
                );

	}

        public function get_all_ferries_costs(){
            $q = "SELECT fc.*, c1.name AS origin_country_name, c2.name AS destination_country_name
                    FROM ferries_costs fc
                    LEFT JOIN countries c1 ON c1.iso_short =fc.origin_country
                    LEFT JOIN countries c2 ON c2.iso_short =fc.destination_country";
            $query = $this->db->query($q);
            return $query->result();
        }

        public function get_ferries_cost($origin_country, $destination_country){




            $q = "SELECT cost_5, cost_10, cost_15 FROM ferries_costs
                    WHERE (origin_country IN ('$origin_country','$destination_country')) AND (destination_country IN ('$origin_country','$destination_country'))";

            $query = $this->db->query($q);
            return $query->result();

        }

        public function send_quote_email($job){





            $job['encoded_id'] = $this->encryption->encrypt($job['job']->id);

            $this->data['job'] = $job;




            $this->load->library('email');

            $this->email->from('quote@mycheapremovals.co.uk', 'MyCheapRemovals')
                        ->to($job['customer']->email)
                        ->cc('natalia@acustransport.eu')
                        ->subject('Quote removal from '.$job['job']->origin.' to '.$job['job']->destination.' provided by MyCheapRemoval')
                        ->message($this->load->view('emails/new_quote',$this->data,TRUE))
                        ->set_mailtype('html');

            $email = $this->email->send();

            if(!$email){
                $this->email->print_debugger(array('headers'));
            }


        }

}

/* End of MY_Controller.php */
