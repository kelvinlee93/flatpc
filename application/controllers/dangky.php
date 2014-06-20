<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class dangky extends CI_Controller{

	public $data;
	private $captcha_path = 'static/captcha/';

	function __construct(){
		parent:: __construct();									
		$this->data['Role'] = $this->chucnang->GetUserRole();		
	}

	public function index(){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else
				return redirect(base_url('admin'));			
		}
		else
		{
			$this->data['title'] = 'Đăng ký thành viên';
			$this->data['page'] = 'register';							
			
			$config = array(	
	           array(
	                 'field'   => 'firstname', 
	                 'label'   => 'Họ đệm', 
	                 'rules'   => 'trim|required|xss_clean|min_length[2]|max_length[20]'
	              ),
	           array(
	                 'field'   => 'lastname', 
	                 'label'   => 'Tên', 
	                 'rules'   => 'trim|required|xss_clean|min_length[2]|max_length[20]'
	              ),
	           array(
	                 'field'   => 'username', 
	                 'label'   => 'Tên đăng nhập', 
	                 'rules'   => 'trim|required|xss_clean|min_length[6]|alpha_dash|is_unique[NGUOIDUNG.TENDANGNHAP]|is_unique[NGUOIDUNG.SDT]|max_length[20]'
	              ),
	           array(
	                 'field'   => 'email', 
	                 'label'   => 'Email', 
	                 'rules'   => 'trim|required|valid_email|is_unique[NGUOIDUNG.EMAIL]'
	              ),
	           array(
	                 'field'   => 'password', 
	                 'label'   => 'Mật khẩu', 
	                 'rules'   => 'required|max_length[20]|min_length[6]|callback_ktmatkhau'
	              ),
	           array(
	                 'field'   => 'confirm_password', 
	                 'label'   => 'Nhập lại mật khẩu', 
	                 'rules'   => 'required|matches[password]'
	              ),
	           array(
	                 'field'   => 'birth', 
	                 'label'   => 'Ngày sinh', 
	                 'rules'   => 'trim|required|callback_ktngaysinh'
	              ),		               
	           array(
	                 'field'   => 'city', 
	                 'label'   => 'tỉnh thành', 
	                 'rules'   => 'callback_kttinhthanh'
	              ),		               
	           array(
	                 'field'   => 'cmnd', 
	                 'label'   => 'Chứng minh nhân dân', 
	                 'rules'   => 'numeric|exact_length[9]'
	              ),
	           array(
	           		 'field'   => 'agree',
	           		 'label'   => 'Điều khoản và chính sách',
	           		 'rules'   => 'callback_checked'
	           	  ),
	           array(
	                 'field'   => 'sdt', 
	                 'label'   => 'Số điện thoại', 
	                 'rules'   => 'required|numeric|max_length[13]|min_length[10]|is_unique[NGUOIDUNG.SDT]'
	              ),
				array(
				     'field'   => 'captcha', 
				     'label'   => 'Mã xác nhận', 
				     'rules'   => 'required|callback_ktcaptcha'
				  )		               
	        );
			
			$this->form_validation->set_rules($config);
			$this->form_validation->set_message('required', '%s không được trống');
			$this->form_validation->set_message('is_unique', '%s đã được sử dụng');					
			$this->form_validation->set_message('matches', 'Nhập lại mật khẩu chưa đúng');
			$this->form_validation->set_message('max_length', '%s quá dài');
			$this->form_validation->set_message('min_length', '%s quá ngắn');
			$this->form_validation->set_message('valid_email', 'Địa chỉ email không hợp lệ');	
			$this->form_validation->set_message('alpha_dash', 'Tên đăng nhập không hợp lệ');
			$this->form_validation->set_message('numeric', 'Vui lòng chỉ nhập số');
			$this->form_validation->set_message('exact_length', 'Vui lòng nhập chính xác 9 chữ số CMND');

			$this->form_validation->set_error_delimiters('<label class="control-label col-lg-12" style="color: red"><strong>', '</strong></label>');		
			
			if ($this->form_validation->run() == FALSE){
				$captcha = create_captcha(array(
		            'word'        => strtoupper(substr(md5(time()), 0, 6)),
		            'img_path'    => $this->captcha_path,
		            'img_url'    => $this->captcha_path
		        ));
				$this->data['captcha'] = $captcha;	       
        		$this->session->set_userdata('captcha', $captcha['word']);

				$this->data['tinhthanh'] = $this->nguoidung_model->get_tinhthanh();	
				$this->data['loi'] = '';
				$this->load->view('dangky',$this->data);							
			}			
			else{
				$Hodem = $this->input->post('firstname',TRUE);
				$Ten = $this->input->post('lastname',TRUE);
				$Tendangnhap = $this->input->post('username',TRUE);
				$Matkhau = $this->input->post('password',TRUE);
				$Email = $this->input->post('email',TRUE);						
				$Ngaysinh = $this->input->post('birth',TRUE);
				$Ngaysinh = date('Y-m-d', strtotime($Ngaysinh));				
				$Diachi = $this->input->post('address',TRUE);
				$Tinhthanh = $this->input->post('city',TRUE);
				$Gioitinh = $this->input->post('sex',TRUE);
				$CMND = '';
				$SDT = $this->input->post('sdt',TRUE);										
				$Quyen = 0;
				$Trangthai = 1;							            			     
				$Anhdaidien = 6;				
				$tmp = $this->nguoidung_model->insert($Hodem, $Ten, $Tendangnhap, $Matkhau, $Email, $Ngaysinh, $Diachi, $Tinhthanh, $Gioitinh, $CMND, $SDT, $Quyen, $Trangthai, $Anhdaidien);				
				
				if($tmp)
				{												
					return redirect(base_url('dangnhap?dangky=thanhcong'));
				}							
				else
				{ 					
					return redirect(base_url('dangky'));
				}
			}
		}					
	}

	public function ktngaysinh($input){		
		$ngay = explode("-",$input);

		if (count($ngay)!=3)
		{			
			$this->form_validation->set_message('ktngaysinh', 'Ngày sinh không hợp lệ');
    		return FALSE;
		}		
    	elseif (checkdate($ngay[1],$ngay[0],$ngay[2]))
    	{			    		
    		if ((date("Y")-$ngay[2])>6) return TRUE;
    		else 
    		{
    			$this->form_validation->set_message('ktngaysinh', 'Chưa đủ tuổi');
    			return FALSE;
    		}
    	} 			    	
    	else 
    	{    		
			$this->form_validation->set_message('ktngaysinh', 'Ngày sinh không hợp lệ');
    		return FALSE;
    	}		
	}

	public function kttinhthanh($input){		
    	if ($input!="") return TRUE;    	
    	else 
    	{
			$this->form_validation->set_message('kttinhthanh', 'Chưa chọn tỉnh thành');
    		return FALSE;
    	}			    
	}

	public function ktmatkhau($matkhau){
		if($matkhau=="") return TRUE;					
	    if (preg_match("/^[0-9A-Za-z!@#$%]+$/", $matkhau)) return TRUE;
    	else 
    	{
			$this->form_validation->set_message('ktmatkhau', 'Mật khẩu không hợp lệ');
    		return FALSE;
    	}			
	}

	public function checked($check){
		if($check) return TRUE;						    
    	else 
    	{
			$this->form_validation->set_message('checked', 'Bạn chưa đồng ý với điều khoản và chính sách của FlatPC');
    		return FALSE;
    	}			
	}

	public function ktcaptcha($cap)
	{
		$recaptcha = $this->session->userdata('captcha');
		if ($cap==$recaptcha)
			return TRUE;
		else
		{
			$this->form_validation->set_message('ktcaptcha', 'Mã xác nhận chưa đúng');
			return FALSE;
		}
	}

}