<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends MY_Controller {

          function __construct() {
             parent::__construct();
        }


	public function index(){

mail('csselitepl@gmail.com','cron job test','this is current time'.date('d F Y G:i'));
        }

        public function sent_first_reminder(){

            mail('csselitepl@gmail.com','cron job test','this is current time'.date('d F Y G:i'),'From: MyCheapRemovals <quote@mycheapremovals.co.uk>');
            

        }


}