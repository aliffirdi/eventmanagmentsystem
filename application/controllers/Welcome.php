<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    public function index()
    {
        // Load package path
        $this->load->view('dashboard');
    }
    public function cli()
    {
        // Load package path
        $this->load->add_package_path(FCPATH.'vendor/romainrg/ratchet_client');
        $this->load->library('ratchet_client');
        $this->load->remove_package_path(FCPATH.'vendor/romainrg/ratchet_client');

        $this->ratchet_client->set_callback('auth', array($this, '_auth'));
        // Run server
        $this->ratchet_client->run();
    }
    public function _auth($datas = null)
 {
     // Here you can verify everything you want to perform user login.
     // However, method must return integer (client ID) if auth succedeed and false if not.
     return (!empty($datas->user_id)) ? $datas->user_id : false;
 }
}