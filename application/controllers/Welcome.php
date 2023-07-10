<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!is_dir('./uploads/')) {
            mkdir('./uploads/', 0777, true);
        }
    }

    public function index()
  	{
  		$this->load->view('sign-in');
  	}


}
