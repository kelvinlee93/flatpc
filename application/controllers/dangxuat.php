<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class dangxuat extends CI_Controller{

	public $data;

	function __construct(){
		parent:: __construct();
		$this->data['loi'] = "";
	}

	public function index(){
		$this->chucnang->dangxuat();
		return redirect(base_url());
	}
}