<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends Public_Controller {

	public function __construct(){
		parent:: __construct();		
	}

	public function index()
	{	
		$this->load->view('home/header',$this->data);					
		$this->load->view('home/index',$this->data);
		$this->load->view('home/footer',$this->data);	
	}	
}