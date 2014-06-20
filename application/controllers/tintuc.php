<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class tintuc extends Public_Controller {	

	public function __construct(){
		parent:: __construct();						
	}

	public function index()
	{
		$id = $this->input->get("id");
		if (!$id||!is_numeric($id)||$id<1)			
		{
			$page = $this->input->get("page");
			if (!$page||!is_numeric($page)||$page<1)
				$page = 1;			

			$this->data['tintuc'] = $this->public_model->get_tintuc($page);
			$this->data['tongtintuc'] = $this->public_model->tongtintuc($page);
			$this->data['page'] = $page;

			$this->data['page_title'] = 'Tin tức';
			$this->data['page_link'] = 'tintuc';
			$this->data['page_type'] = 0;
			$this->data['page_title2'] = 0;
			$this->data['page_link2'] = 0;
			$this->data['subpage_title'] = 0;
			$this->data['subpage_link'] = 0;

			$this->load->view('home/header',$this->data);			
			$this->load->view('home/breadcrum',$this->data);			
			$this->load->view('home/tintuc',$this->data);			
			$this->load->view('home/footer',$this->data);
		}
		else
		{
			if (!$id||!is_numeric($id)||$id<1)
				return redirect(base_url('tintuc'));

			$page = $this->input->get("page");
			if (!$page||!is_numeric($page)||$page<1)
				$page = 1;
			
			if(isset($_POST["noidung"])&&!empty($_POST['noidung']))
			{
				$tmp = $this->binhluan_model->insert_tintuc($id,$_POST["noidung"]);
			}

			$this->data['chitiettintuc'] = $this->public_model->chitiettintuc($id);
			$this->data['binhluantintuc'] = $this->public_model->binhluantintuc($id,$page);
			$this->data['tongbinhluantintuc'] = $this->public_model->tongbinhluantintuc($id);
			$this->data['page'] = $page;
			
			$this->data['page_title'] = 'Tin tức';
			$this->data['page_link'] = 'tintuc';
			$this->data['page_type'] = 0;
			$this->data['page_title2'] = $this->data['chitiettintuc'][0]['TIEUDE'];
			$this->data['page_link2'] = 'tintuc?id='.$this->data['chitiettintuc'][0]['ID'];
			$this->data['subpage_title'] = 0;
			$this->data['subpage_link'] = 0;

			$this->load->view('home/header',$this->data);			
			$this->load->view('home/breadcrum',$this->data);			
			$this->load->view('home/chitiettintuc',$this->data);			
			$this->load->view('home/footer',$this->data);
		}
		
	}
}
	