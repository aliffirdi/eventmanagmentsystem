<?php
class User extends CI_Controller
{
    public function index($user_id=null)
    {
    	$usr = array('user_id' => $user_id);
	// We load the CI welcome page with some lines of Javascript
        $this->load->view('welcome_message',$usr);
    }
    public function updatenilai()
    {
    	if ( $this->input->post('nilai_merah') > $this->input->post('nilai_biru')) {$win = "SUDUT MERAH";} 
    		else if ($this->input->post('nilai_merah') < $this->input->post('nilai_biru')) {$win = "SUDUT BIRU";} 
    			else if ($this->input->post('nilai_merah') == $this->input->post('nilai_biru')) {$win = "IMBANG";}
    			$data = array(
				        'nilai_merah' => $this->input->post('nilai_merah'),
				        'pemenang' => $win,
				        'nilai_biru' => $this->input->post('nilai_biru')
				);
				$this->db->where('id', $this->input->post('id'));
				$this->db->update('pertandingan', $data);
    }
    public function penilaian($user_id=null,$juri_id=null)
    {
    	$usr = array(
    		'juri_id' => $juri_id,
    		'user_id' => $user_id
    	);
	// We load the CI welcome page with some lines of Javascript
        $this->load->view('penilaian',$usr);
    }
    public function score($user_id=null)
    {
    	$usr = array('user_id' => $user_id);
	// We load the CI welcome page with some lines of Javascript
        $this->load->view('scoreboard',$usr);
    }
    public function scoremgmt($user_id=null)
    {
    	$usr = array('user_id' => $user_id);
	// We load the CI welcome page with some lines of Javascript
        $this->load->view('scoreboard_man',$usr);
    }
    public function register($user_id=null)
    {
    	$usr = array('user_id' => $user_id);
	// We load the CI welcome page with some lines of Javascript
        $this->load->view('register_peserta',$usr);
    }
    public function data($user_id=null,$r_id=null)
    {
    	$usr = array(
    		'r_id' => $r_id,
    		'user_id' => $user_id
    	);
	// We load the CI welcome page with some lines of Javascript
        $this->load->view('welcome_message',$usr);
    }
}