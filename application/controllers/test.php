<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Test extends CI_Controller{
	
	public $data;

	function __construct(){
		parent:: __construct();	
	}	

	public function index()
	{
		for ($i=0; $i < 10; $i++) { 
			$arr[$i]["period"] = "2011 Q3";
			$arr[$i]["licensed"] = 3407;
			$arr[$i]["sorned"] = 660;
		}
		echo json_encode($arr);
	}

	public function getcount()
	{
		echo 865;
	}
}