<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class dangnhap extends CI_Controller{

	public $data;

	function __construct(){
		parent:: __construct();
		$this->data['loi'] = "";
	}

/*	function index($reg = ""){
		if(isset($reg) && $reg != "")
			$this->data['success'] = "Đăng ký thành công! Mời bạn đăng nhập...";
		$this->data['title'] = 'Đăng nhập';
		$this->data['page'] = 'dangnhap';
		$chk = $this->chucnang->ktdangnhap();		
		if($chk==1||$chk==2)
		{
			$role = $this->chucnang->GetUserRole();
			if ($role == 3)
				return redirect(base_url());
			else return redirect(base_url('admin'));
		}
		if(isset($_POST['username'])&&($_POST['username']!=NULL)&&isset($_POST['password'])&&($_POST['password']!=NULL))
		{
			$remember = FALSE;
			if(isset($_POST['remember'])&&($_POST['remember']==1)) $remember = TRUE;			
			$arr = array('username'=>$this->input->post('username'),'password'=>$this->input->post('password'));
			$tmp = $this->chucnang->dangnhap($arr, $remember);
			if($tmp==1)
			{
				$role = $this->login->GetUserRole();
				if ($role == 3)
					return redirect(base_url());
				else return redirect(base_url('admin'));
			}
			else
			{
				switch($tmp)
				{
					case -3 : $loi = 'Tên đăng nhập hoặc mật khẩu chưa đúng! Vui lòng thử lại'; break;
					case -7 : $loi = 'Tình trạng tài khoản không hoạt động'; break;
					case -4 : $loi = 'Bạn không có quyền truy cập vào trang này'; break;
					case -6 : $loi = 'Tên đăng nhập hoặc mật khẩu chưa đúng! Vui lòng thử lại'; break;
					default: $loi = ''; break;
				}
				$this->data['loi'] = 	$loi;
				$this->load->view('admin/index',$this->data);
			}
		}
		else $this->load->view('admin/index',$this->data);
	}
*/
	function index(){
		$this->load->view('dangnhap');
	}

}