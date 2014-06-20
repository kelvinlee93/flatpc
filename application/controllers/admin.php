<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class admin extends CI_Controller{
	
	public $data;

	function __construct(){
		parent:: __construct();							
		$this->data['Username'] = $this->chucnang->getLoginUsername();  
		$this->data['Name'] = $this->chucnang->GetName();
		$this->data['UserID'] = $this->chucnang->GetUserID();
		$this->data['Role'] = $this->chucnang->GetUserRole();
		$this->data['Avatar'] = $this->chucnang->GetAvatar();
	}	

	// Trang chủ

	public function index(){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{			
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else{
				$this->data['title'] = 'Bảng thông tin';
				$this->data['page'] = 'dashboard';
				$this->data['subpage'] = 'dashboard';
				$this->data['rp1'] = $this->public_model->get_rp1();				

				$this->load->view('admin/include/header',$this->data);
				$this->load->view('admin/include/sidebar',$this->data);									
				$this->load->view('admin/home/index',$this->data);				
				$this->load->view('admin/include/footer',$this->data);	
			}
		}
		else
			return redirect(base_url('dangnhap'));	
	}

	// Quản lý người dùng

	function nguoidung($chucnang = "xem"){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else{												
				if($chucnang == "xem"){
					$this->data['title'] = 'Người dùng';
					$this->data['page'] = 'user';
					$this->data['subpage'] = 'user-manage';
					if($this->session->userdata('nguoidung_action')==FALSE){
						$this->session->set_userdata('nguoidung_action', '1');
						$this->data['nguoidung_action'] = $this->session->userdata('nguoidung_action');
					}
					else $this->data['nguoidung_action'] = $this->session->userdata('nguoidung_action');	
					$this->session->set_userdata('nguoidung_action', '1');

					$this->data['result'] = $this->nguoidung_model->get_nguoidung();
						
					$this->load->view('admin/include/header',$this->data);
					$this->load->view('admin/include/sidebar',$this->data);									
					$this->load->view('admin/nguoidung/index',$this->data);				
					$this->load->view('admin/include/footer',$this->data);					
				}
				elseif ($chucnang == "them") {
					$this->data['title'] = 'Thêm người dùng';
					$this->data['page'] = 'user';
					$this->data['subpage'] = 'user-add';					
					
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
		                     'rules'   => 'trim|required|xss_clean|min_length[6]|alpha_dash|is_unique[NGUOIDUNG.TENDANGNHAP]|max_length[20]'
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
		                     'field'   => 'sdt', 
		                     'label'   => 'Số điện thoại', 
		                     'rules'   => 'numeric|max_length[13]|min_length[10]|is_unique[NGUOIDUNG.SDT]'
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

					$this->form_validation->set_error_delimiters('<label class="control-label col-lg-6" style="color: red"><strong>', '</strong></label>');

					$this->setting =  array(
		                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/static/img/",
		                  'upload_url'      => base_url()."static/img",
		                  'allowed_types'   => "gif|jpg|png|jpeg",                  
		                  'max_size'        => 10240,
		                  'max_height'      => 2048,
		                  'max_width'       => 2048  
	                );        			        
				    $this->load->library('upload', $this->setting);
					
					if ($this->form_validation->run() == FALSE){
						$this->data['tinhthanh'] = $this->nguoidung_model->get_tinhthanh();
						$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/sidebar',$this->data);									
						$this->load->view('admin/nguoidung/insert',$this->data);				
						$this->load->view('admin/include/footer',$this->data);
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
						$CMND = $this->input->post('cmnd',TRUE);
						$SDT = $this->input->post('sdt',TRUE);
						$Quyen = $this->input->post('role',TRUE);
						$Trangthai = $this->input->post('status',TRUE);						
		                $Anhdaidien = 6;		                

				        if($this->upload->do_upload('avatar'))
				        {			            	
		                	$img_data = array('upload_data' => $this->upload->data());		                	
		                	$Anhdaidien = $img_data['upload_data']['file_name'];		                			                			                
				        }				        		                					       

						$tmp = $this->nguoidung_model->insert($Hodem, $Ten, $Tendangnhap, $Matkhau, $Email, $Ngaysinh, $Diachi, $Tinhthanh, $Gioitinh, $CMND, $SDT, $Quyen, $Trangthai, $Anhdaidien);
						
						if($tmp)
						{							
							$this->session->set_userdata('nguoidung_action', '2');														
							return redirect(base_url('admin/nguoidung'));
						}							
						else
						{ 
							$this->session->set_userdata('nguoidung_action', '3');
							return redirect(base_url('admin/nguoidung'));
						}
					}					
				}
				elseif ($chucnang == "doithongtin") {
					$id = $this->input->get("id");																				
					if(!is_numeric($id)||$id<1)
					{ 
						$this->session->set_userdata('nguoidung_action', '3');
						return redirect(base_url('admin/nguoidung'));
					}				

					$this->data['title'] = 'Đổi thông tin người dùng';
					$this->data['page'] = 'user';
					$this->data['subpage'] = 'user-edit';					
					
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
		                     'field'   => 'password', 
		                     'label'   => 'Mật khẩu', 
		                     'rules'   => 'max_length[20]|min_length[6]|callback_ktmatkhau'
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
		                     'field'   => 'sdt', 
		                     'label'   => 'Số điện thoại', 
		                     'rules'   => 'numeric|max_length[13]|min_length[10]'		                     
		                  )		               
		            );
					
					$this->form_validation->set_rules($config);
					$this->form_validation->set_message('required', '%s không được trống');													
					$this->form_validation->set_message('max_length', '%s quá dài');
					$this->form_validation->set_message('min_length', '%s quá ngắn');										
					$this->form_validation->set_message('numeric', 'Vui lòng chỉ nhập số');
					$this->form_validation->set_message('exact_length', 'Vui lòng nhập chính xác 9 chữ số CMND');

					$this->form_validation->set_error_delimiters('<label class="control-label col-lg-6" style="color: red"><strong>', '</strong></label>');

					$this->setting =  array(
		                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/static/img/",
		                  'upload_url'      => base_url()."static/img",
		                  'allowed_types'   => "gif|jpg|png|jpeg",                  
		                  'max_size'        => 10240,
		                  'max_height'      => 2048,
		                  'max_width'       => 2048  
	                );        			        
				    $this->load->library('upload', $this->setting);

					if ($this->form_validation->run() == FALSE)
					{
						$this->data['result'] = $this->nguoidung_model->get_userinfo($id);						
						if($this->data['result']==FALSE)
						{
							$this->session->set_userdata('nguoidung_action', '3');
							return redirect(base_url('admin/nguoidung'));
						}
						$this->data['tinhthanh'] = $this->nguoidung_model->get_tinhthanh();
						$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/sidebar',$this->data);									
						$this->load->view('admin/nguoidung/edit',$this->data);				
						$this->load->view('admin/include/footer',$this->data);
					}
					else
					{
						$Hodem = $this->input->post('firstname',TRUE);
						$Ten = $this->input->post('lastname',TRUE);
						$Tendangnhap = $this->input->post('username',TRUE);
						$Matkhau = $this->input->post('password',TRUE);
						if($Matkhau)
							$Matkhau = do_hash($Matkhau,'md5');
						else
						{
							$Matkhau_old = $this->input->post('password_old',TRUE);
							$Matkhau = $Matkhau_old;
						}						
						$Email = $this->input->post('email',TRUE);						
						$Ngaysinh = $this->input->post('birth',TRUE);
						$Ngaysinh = date('Y-m-d', strtotime($Ngaysinh));
						$Diachi = $this->input->post('address',TRUE);
						$Tinhthanh = $this->input->post('city',TRUE);
						$Gioitinh = $this->input->post('sex',TRUE);						
						$CMND = $this->input->post('cmnd',TRUE);
						$SDT = $this->input->post('sdt',TRUE);
						$Quyen = $this->input->post('role',TRUE);
						$Trangthai = $this->input->post('status',TRUE);						
		                $Anhdaidien = $this->input->post('avatar_old',TRUE);

				        if($this->upload->do_upload('avatar'))
				        {			            	
		                	$img_data = array('upload_data' => $this->upload->data());		                	
		                	$Anhdaidien = $img_data['upload_data']['file_name'];		                			                			                
				        }				        				        		                					        

						$tmp = $this->nguoidung_model->edit($id, $Hodem, $Ten, $Tendangnhap, $Matkhau, $Email, $Ngaysinh, $Diachi, $Tinhthanh, $Gioitinh, $CMND, $SDT, $Quyen, $Trangthai, $Anhdaidien);
						
						if($tmp)
						{							
							$this->session->set_userdata('nguoidung_action', '2');														
							return redirect(base_url('admin/nguoidung'));
						}							
						else
						{ 
							$this->session->set_userdata('nguoidung_action', '3');
							return redirect(base_url('admin/nguoidung'));
						}
					}						
				}
				elseif ($chucnang == "dongtaikhoan") {
						$id = $this->input->get("id");																				
						if(!is_numeric($id)||$id<1)
						{ 
							$this->session->set_userdata('nguoidung_action', '3');
							return redirect(base_url('admin/nguoidung'));
						}												
						$tmp = $this->nguoidung_model->dongtaikhoan($id);
						if($tmp)
						{
							$this->session->set_userdata('nguoidung_action', '2');
							return redirect(base_url('admin/nguoidung'));													
						}							
						else
						{ 
							$this->session->set_userdata('nguoidung_action', '3');						
							return redirect(base_url('admin/nguoidung'));
						}
				}
				elseif ($chucnang == "motaikhoan") {
						$id = $this->input->get("id");																				
						if(!is_numeric($id)||$id<1)
						{ 
							$this->session->set_userdata('nguoidung_action', '3');
							return redirect(base_url('admin/nguoidung'));
						}												
						$tmp = $this->nguoidung_model->motaikhoan($id);
						if($tmp)
						{
							$this->session->set_userdata('nguoidung_action', '2');
							return redirect(base_url('admin/nguoidung'));													
						}							
						else
						{ 
							$this->session->set_userdata('nguoidung_action', '3');						
							return redirect(base_url('admin/nguoidung'));
						}					
				}												
			}
		}
		else
			return redirect(base_url('dangnhap'));
	}

	// Quản lý sản phẩm

	function sanpham($chucnang = "xem"){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else{
				if($chucnang == "xem"){
					$this->data['title'] = 'Sản phẩm';
					$this->data['page'] = 'product';
					$this->data['subpage'] = 'product-manage';
					if($this->session->userdata('sanpham_action')==FALSE){
						$this->session->set_userdata('sanpham_action', '1');
						$this->data['sanpham_action'] = $this->session->userdata('sanpham_action');
					}
					else $this->data['sanpham_action'] = $this->session->userdata('sanpham_action');	
					$this->session->set_userdata('sanpham_action', '1');

					$this->data['result'] = $this->sanpham_model->get_sanpham();
						
					$this->load->view('admin/include/header',$this->data);
					$this->load->view('admin/include/sidebar',$this->data);									
					$this->load->view('admin/sanpham/index',$this->data);				
					$this->load->view('admin/include/footer',$this->data);					
				}
				elseif ($chucnang == "them") {
					$this->data['title'] = 'Thêm sản phẩm';
					$this->data['page'] = 'product';
					$this->data['subpage'] = 'product-add';					
					
					$config = array(	
		               array(
		                     'field'   => 'productname', 
		                     'label'   => 'Tên sản phẩm', 
		                     'rules'   => 'trim|required|xss_clean|min_length[2]'
		                  ),
		               array(
		                     'field'   => 'productcategory', 
		                     'label'   => 'Loại sản phẩm', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'provider', 
		                     'label'   => 'Nhà cung cấp', 
		                     'rules'   => 'required'
		                  ),		               
		               array(
		                     'field'   => 'price', 
		                     'label'   => 'Đơn giá', 
		                     'rules'   => 'required|numeric|min_length[4]'
		                  )		               
		            );
					
					$this->form_validation->set_rules($config);
					$this->form_validation->set_message('required', '%s không được trống');					
					$this->form_validation->set_message('min_length', '%s quá thấp');					
					$this->form_validation->set_message('numeric', 'Vui lòng chỉ nhập số');					

					$this->form_validation->set_error_delimiters('<label class="control-label col-lg-6" style="color: red"><strong>', '</strong></label>');

					$this->setting =  array(
		                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/static/img/",
		                  'upload_url'      => base_url()."static/img",
		                  'allowed_types'   => "gif|jpg|png|jpeg",                  
		                  'max_size'        => 10240,
		                  'max_height'      => 2048,
		                  'max_width'       => 2048  
	                );  

				    $this->load->library('upload', $this->setting);
				    																		
					if ($this->form_validation->run() == TRUE)
					{
						$Tensanpham = $this->input->post('productname',TRUE);
						$Id = $this->input->post('chonsanpham',TRUE);
						$Loaisanpham = $this->input->post('productcategory',TRUE);
						$Soluong = $this->input->post('soluong',TRUE);
						$Tinhtrang = $this->input->post('tinhtrang',TRUE);
						if ($Tinhtrang==-2)
							$Tinhtrang = 0;
						$Luotxem = $this->input->post('luotxem',TRUE);
						$Luotmua = $this->input->post('luotmua',TRUE);
						$Nhacungcap = $this->input->post('provider',TRUE);
						$Mota = $this->input->post('desc',TRUE);
						$Dongia = $this->input->post('price',TRUE);
						date_default_timezone_set('Asia/Jakarta');						
						$Ngay = date('Y-m-d H:i:s');																		
		                $Hinhdaidien = 0;

		                if($this->upload->do_upload('avatar'))
				        {			            	
		                	$img_data = array('upload_data' => $this->upload->data());		                	
		                	$Hinhdaidien = $img_data['upload_data']['file_name'];		                			                			                
				        }			                

		                $Hedieuhanh = $this->input->post('os',TRUE);
		                $Manhinh = $this->input->post('screen',TRUE);
		                $Vixuly = $this->input->post('cpu',TRUE);
		                $Chipset = $this->input->post('chipset',TRUE);
		                $Dohoa = $this->input->post('graphic',TRUE);
		                $RAM = $this->input->post('ram',TRUE);
		                $ROM = $this->input->post('rom',TRUE);
		                $Camera = $this->input->post('camera',TRUE);
		                $Ketnoi = $this->input->post('connect',TRUE);
		                $Diaquang = $this->input->post('cdrom',TRUE);
		                $Pin = $this->input->post('pin',TRUE);
		                $Trongluong = $this->input->post('weight',TRUE);
		                $Baohanh = $this->input->post('warranty',TRUE);
		                $Khuyenmai = $this->input->post('promotion',TRUE);		                
		                
		                $tmp = $this->sanpham_model->update($Id, $Tensanpham, $Loaisanpham, $Soluong, $Tinhtrang, $Luotxem, $Luotmua, $Nhacungcap, $Mota, $Dongia, $Ngay, $Hinhdaidien, $Hedieuhanh, $Manhinh, $Vixuly, $Chipset, $Dohoa, $RAM, $ROM, $Camera, $Ketnoi, $Diaquang, $Pin, $Trongluong, $Baohanh, $Khuyenmai);
						
						if($tmp)
						{							
							$this->session->set_userdata('sanpham_action', '2');														
							return redirect(base_url('admin/sanpham'));
						}							
						else
						{ 
							$this->session->set_userdata('sanpham_action', '3');
							return redirect(base_url('admin/sanpham'));
						}	                				        				        		                					      				        			        				
					}				   
				    elseif ($this->form_validation->run() == FALSE&&isset($_POST["chonsanpham"]))
				    {
				    	$Chonsanpham = $this->input->post('chonsanpham',TRUE);				    					    	
				    	$this->data['product'] = $this->sanpham_model->get_sanpham_moinhap_info($Chonsanpham);
				    	$this->data['loaisanpham'] = $this->sanpham_model->get_loaisanpham();
						$this->data['nhacungcap'] = $this->sanpham_model->get_nhacungcap();

				    	$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/sidebar',$this->data);									
						$this->load->view('admin/sanpham/insert',$this->data);				
						$this->load->view('admin/include/footer',$this->data);
				    }
				    elseif (!isset($_POST["chonsanpham"]))
				    {
				    	$this->data['product'] = $this->sanpham_model->get_sanpham_moinhap();

						$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/sidebar',$this->data);									
						$this->load->view('admin/sanpham/them',$this->data);				
						$this->load->view('admin/include/footer',$this->data);
				    }

				}
				elseif ($chucnang == "capnhat") {
					$id = $this->input->get("id");																				
					if(!is_numeric($id)||$id<1)
					{ 
						$this->session->set_userdata('sanpham_action', '3');
						return redirect(base_url('admin/sanpham'));
					}				

					$this->data['title'] = 'Cập nhật sản phẩm';
					$this->data['page'] = 'product';
					$this->data['subpage'] = 'product-edit';					
					
					$config = array(	
		               array(
		                     'field'   => 'productname', 
		                     'label'   => 'Tên sản phẩm', 
		                     'rules'   => 'trim|required|xss_clean|min_length[2]'
		                  ),
		               array(
		                     'field'   => 'productcategory', 
		                     'label'   => 'Loại sản phẩm', 
		                     'rules'   => 'required'
		                  ),
		               array(
		                     'field'   => 'provider', 
		                     'label'   => 'Nhà cung cấp', 
		                     'rules'   => 'required'
		                  ),		               
		               array(
		                     'field'   => 'price', 
		                     'label'   => 'Đơn giá', 
		                     'rules'   => 'required|numeric|min_length[4]'
		                  )		               
		            );
					
					$this->form_validation->set_rules($config);
					$this->form_validation->set_message('required', '%s không được trống');					
					$this->form_validation->set_message('min_length', '%s quá thấp');					
					$this->form_validation->set_message('numeric', 'Vui lòng chỉ nhập số');					

					$this->form_validation->set_error_delimiters('<label class="control-label col-lg-6" style="color: red"><strong>', '</strong></label>');

					$this->setting =  array(
		                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/static/img/",
		                  'upload_url'      => base_url()."static/img",
		                  'allowed_types'   => "gif|jpg|png|jpeg",                  
		                  'max_size'        => 10240,
		                  'max_height'      => 2048,
		                  'max_width'       => 2048  
	                );

				    $this->load->library('upload', $this->setting);

					if ($this->form_validation->run() == FALSE)
					{
						$this->data['loaisanpham'] = $this->sanpham_model->get_loaisanpham();
						$this->data['nhacungcap'] = $this->sanpham_model->get_nhacungcap();

						$this->data['result_sanpham'] = $this->sanpham_model->edit($id);
						$this->data['result_chitietsanpham'] = $this->sanpham_model->detail($id);
												
						if($this->data['result_sanpham']==FALSE||$this->data['result_chitietsanpham']==FALSE)
						{
							$this->session->set_userdata('sanpham_action', '3');
							return redirect(base_url('admin/sanpham'));
						}
						
						$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/sidebar',$this->data);									
						$this->load->view('admin/sanpham/edit',$this->data);				
						$this->load->view('admin/include/footer',$this->data);
					}
					else
					{
						$Tensanpham = $this->input->post('productname',TRUE);
						$Loaisanpham = $this->input->post('productcategory',TRUE);
						$Soluong = $this->input->post('soluong',TRUE);
						$Tinhtrang = $this->input->post('tinhtrang',TRUE);
						$Luotxem = $this->input->post('luotxem',TRUE);
						$Luotmua = $this->input->post('luotmua',TRUE);
						$Nhacungcap = $this->input->post('provider',TRUE);
						$Mota = $this->input->post('desc',TRUE);
						$Dongia = $this->input->post('price',TRUE);
						$Ngay = $this->input->post('ngay',TRUE);
						$Ngay = date('Y-m-d H:i:s', strtotime($Ngay));																		
		                $Hinhdaidien = $this->input->post('avatar',TRUE);

		                $Hedieuhanh = $this->input->post('os',TRUE);
		                $Manhinh = $this->input->post('screen',TRUE);
		                $Vixuly = $this->input->post('cpu',TRUE);
		                $Chipset = $this->input->post('chipset',TRUE);
		                $Dohoa = $this->input->post('graphic',TRUE);
		                $RAM = $this->input->post('ram',TRUE);
		                $ROM = $this->input->post('rom',TRUE);
		                $Camera = $this->input->post('camera',TRUE);
		                $Ketnoi = $this->input->post('connect',TRUE);
		                $Diaquang = $this->input->post('cdrom',TRUE);
		                $Pin = $this->input->post('pin',TRUE);
		                $Trongluong = $this->input->post('weight',TRUE);
		                $Baohanh = $this->input->post('warranty',TRUE);
		                $Khuyenmai = $this->input->post('promotion',TRUE);

				        if($this->upload->do_upload('avatar'))
				        {			            	
		                	$img_data = array('upload_data' => $this->upload->data());		                	
		                	$Anhdaidien = $img_data['upload_data']['file_name'];		                			                			                
				        }				        

						$tmp = $this->sanpham_model->update($id, $Tensanpham, $Loaisanpham, $Soluong, $Tinhtrang, $Luotxem, $Luotmua, $Nhacungcap, $Mota, $Dongia, $Ngay, $Hinhdaidien, $Hedieuhanh, $Manhinh, $Vixuly, $Chipset, $Dohoa, $RAM, $ROM, $Camera, $Ketnoi, $Diaquang, $Pin, $Trongluong, $Baohanh, $Khuyenmai);
						
						if($tmp)
						{							
							$this->session->set_userdata('sanpham_action', '2');														
							return redirect(base_url('admin/sanpham'));
						}							
						else
						{ 
							$this->session->set_userdata('sanpham_action', '3');
							return redirect(base_url('admin/sanpham'));
						}
					}						
				}
				elseif ($chucnang == "quanlynhaphang") {
					$this->data['title'] = 'Quản lý nhập hàng';
					$this->data['page'] = 'product';
					$this->data['subpage'] = 'product-import-manage';
					if($this->session->userdata('nhaphang_action')==FALSE){
						$this->session->set_userdata('nhaphang_action', '1');
						$this->data['nhaphang_action'] = $this->session->userdata('nhaphang_action');
					}
					else $this->data['nhaphang_action'] = $this->session->userdata('nhaphang_action');	
					$this->session->set_userdata('nhaphang_action', '1');

					$this->data['result'] = $this->sanpham_model->get_nhaphang();

					$this->load->view('admin/include/header',$this->data);
					$this->load->view('admin/include/sidebar',$this->data);									
					$this->load->view('admin/sanpham/nhaphang',$this->data);				
					$this->load->view('admin/include/footer',$this->data);
				}
				elseif ($chucnang == "nhaphang") {
					$this->data['title'] = 'Nhập hàng';
					$this->data['page'] = 'product';
					$this->data['subpage'] = 'product-import';
					if($this->session->userdata('nhaphang_action')==FALSE){
						$this->session->set_userdata('nhaphang_action', '1');
						$this->data['nhaphang_action'] = $this->session->userdata('nhaphang_action');
					}
					else $this->data['nhaphang_action'] = $this->session->userdata('nhaphang_action');	
					$this->session->set_userdata('nhaphang_action', '1');
					
					if (isset($_POST['nguoinhaphang2']))
					{
						$Nguoinhap = $this->chucnang->GetUserID();

						$Danhsach = $this->session->userdata('import_list');
						$Soluong = $this->input->post('sanpham',TRUE);
						$Dongia = $this->input->post('dongia',TRUE);

						$Sanphammoi = $this->input->post('sanphammoi',TRUE);
						$Soluongmoi = $this->input->post('soluongmoi',TRUE);
						$Dongiamoi = $this->input->post('dongiamoi',TRUE);								
						
						$tmp = $this->sanpham_model->nhaphang($Nguoinhap, $Danhsach, $Soluong, $Dongia, $Sanphammoi, $Soluongmoi, $Dongiamoi);
						
						if($tmp)
						{			
							$this->session->set_userdata('import_list', FALSE);				
							$this->session->set_userdata('nhaphang_action', '2');														
							return redirect(base_url('admin/sanpham/quanlynhaphang'));
						}							
						else
						{ 
							$this->session->set_userdata('import_list', FALSE);
							$this->session->set_userdata('nhaphang_action', '3');
							return redirect(base_url('admin/sanpham/quanlynhaphang'));
						}	
						
					}
					elseif (isset($_POST['chonsanpham'])||isset($_POST['sanphammoi']))
					{
						if (!isset($_POST['chonsanpham']))
							if ($_POST['sanphammoi']<1)
								return redirect(current_url());

						$this->data['import_list'] = $this->input->post('chonsanpham',TRUE);
						$this->data['sanphammoi'] = $this->input->post('sanphammoi',TRUE);
						$this->data['nguoinhaphang'] = $this->input->post('nguoinhaphang',TRUE);
						$this->data['sanpham'] = $this->thongtindathang_model->get_sanpham();
						$this->session->set_userdata('import_list', $this->data['import_list']);
						$this->session->set_userdata('sanphammoi', $this->data['sanphammoi']);

						$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/sidebar',$this->data);									
						$this->load->view('admin/sanpham/import2',$this->data);				
						$this->load->view('admin/include/footer',$this->data);
					}
					else
					{
						$this->data['tablet'] = $this->thongtindathang_model->get_sanpham_tablet();
						$this->data['laptop'] = $this->thongtindathang_model->get_sanpham_laptop();
						$this->data['desktop'] = $this->thongtindathang_model->get_sanpham_desktop();
						$this->data['phukien'] = $this->thongtindathang_model->get_sanpham_phukien();

						$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/sidebar',$this->data);									
						$this->load->view('admin/sanpham/import',$this->data);				
						$this->load->view('admin/include/footer',$this->data);
					}										
				}
				elseif ($chucnang == "thongtinnhaphang") {
					$id = $this->input->get("id");																				
					if(!is_numeric($id)||$id<1)
					{ 
						$this->session->set_userdata('nhaphang_action', '3');
						return redirect(base_url('admin/sanpham/quanlynhaphang'));
					}				

					$this->data['title'] = 'Thông tin nhập hàng';
					$this->data['page'] = 'product';
					$this->data['subpage'] = 'product-import-info';

					$this->data['chitiet'] = $this->sanpham_model->get_chitietnhaphang($id);
					$this->data['nhaphang'] = $this->sanpham_model->get_thongtinnhaphang($id);	

					$this->load->view('admin/include/header',$this->data);
					$this->load->view('admin/include/sidebar',$this->data);									
					$this->load->view('admin/sanpham/info-import',$this->data);				
					$this->load->view('admin/include/footer',$this->data);
				}
				elseif ($chucnang == "xacnhannhaphang") {
						$id = $this->input->get("id");																				
						if(!is_numeric($id)||$id<1)
						{ 
							$this->session->set_userdata('nhaphang_action', '3');
							return redirect(base_url('admin/sanpham/quanlynhaphang'));
						}

						$tmp = $this->sanpham_model->xacnhannhaphang($id);

						if($tmp)
						{
							$this->session->set_userdata('nhaphang_action', '2');
							return redirect(base_url('admin/sanpham/quanlynhaphang'));													
						}							
						else
						{ 
							$this->session->set_userdata('nhaphang_action', '3');						
							return redirect(base_url('admin/sanpham/quanlynhaphang'));
						}
				}
				elseif ($chucnang == "huynhaphang") {
						$id = $this->input->get("id");																				
						if(!is_numeric($id)||$id<1)
						{ 
							$this->session->set_userdata('nhaphang_action', '3');
							return redirect(base_url('admin/sanpham/quanlynhaphang'));
						}

						$tmp = $this->sanpham_model->huynhaphang($id);

						if($tmp)
						{
							$this->session->set_userdata('nhaphang_action', '2');
							return redirect(base_url('admin/sanpham/quanlynhaphang'));													
						}							
						else
						{ 
							$this->session->set_userdata('nhaphang_action', '3');						
							return redirect(base_url('admin/sanpham/quanlynhaphang'));
						}
				}
				elseif ($chucnang == "ngungkinhdoanh") {
						$id = $this->input->get("id");																				
						if(!is_numeric($id)||$id<1)
						{ 
							$this->session->set_userdata('sanpham_action', '3');
							return redirect(base_url('admin/sanpham'));
						}												
						$tmp = $this->sanpham_model->ngungkinhdoanh($id);
						if($tmp)
						{
							$this->session->set_userdata('sanpham_action', '2');
							return redirect(base_url('admin/sanpham'));													
						}							
						else
						{ 
							$this->session->set_userdata('sanpham_action', '3');						
							return redirect(base_url('admin/sanpham'));
						}
				}
				elseif ($chucnang == "batdaukinhdoanh") {
						$id = $this->input->get("id");																				
						if(!is_numeric($id)||$id<1)
						{ 
							$this->session->set_userdata('sanpham_action', '3');
							return redirect(base_url('admin/sanpham'));
						}												
						$tmp = $this->sanpham_model->batdaukinhdoanh($id);
						if($tmp)
						{
							$this->session->set_userdata('sanpham_action', '2');
							return redirect(base_url('admin/sanpham'));													
						}							
						else
						{ 
							$this->session->set_userdata('sanpham_action', '3');						
							return redirect(base_url('admin/sanpham'));
						}
				}												
			}
		}
		else
			return redirect(base_url('dangnhap'));
	}

	// Quản lý hóa đơn

	function hoadon($chucnang = "xem"){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else{												
				if($chucnang == "xem"){
					$this->data['title'] = 'Hóa đơn';
					$this->data['page'] = 'invoice';
					$this->data['subpage'] = 'invoice-manage';
					if($this->session->userdata('hoadon_action')==FALSE){
						$this->session->set_userdata('hoadon_action', '1');
						$this->data['hoadon_action'] = $this->session->userdata('hoadon_action');
					}
					else $this->data['hoadon_action'] = $this->session->userdata('hoadon_action');	
					$this->session->set_userdata('hoadon_action', '1');

					$this->data['result'] = $this->hoadon_model->get_danhsachhoadon();
						
					$this->load->view('admin/include/header',$this->data);
					$this->load->view('admin/include/sidebar',$this->data);									
					$this->load->view('admin/hoadon/index',$this->data);				
					$this->load->view('admin/include/footer',$this->data);					
				}				
				elseif($chucnang == "chitiet"){
					$id = $this->input->get("id");																				
					if(!is_numeric($id)||$id<1)
					{ 
						$this->session->set_userdata('hoadon_action', '3');
						return redirect(base_url('admin/hoadon'));
					}				

					$this->data['title'] = 'Thông tin hóa đơn';
					$this->data['page'] = 'invoice';
					$this->data['subpage'] = 'invoice-info';

					$this->data['chitiet'] = $this->hoadon_model->get_chitiethoadon($id);
					$this->data['hoadon'] = $this->hoadon_model->get_hoadon($id);												

					if($this->data['chitiet']==FALSE||$this->data['hoadon']==FALSE)
					{
						$this->session->set_userdata('hoadon_action', '3');
						return redirect(base_url('admin/hoadon'));
					}
					
					$this->load->view('admin/include/header',$this->data);
					$this->load->view('admin/include/sidebar',$this->data);									
					$this->load->view('admin/hoadon/info',$this->data);				
					$this->load->view('admin/include/footer',$this->data);
				}
				elseif($chucnang == "inhoadon"){
					$id = $this->input->get("id");																				
					if(!is_numeric($id)||$id<1)
					{ 
						$this->session->set_userdata('hoadon_action', '3');
						return redirect(base_url('admin/hoadon'));
					}				

					$this->data['title'] = 'Thông tin hóa đơn';
					$this->data['page'] = 'invoice';
					$this->data['subpage'] = 'invoice-info';

					$this->data['chitiet'] = $this->hoadon_model->get_chitiethoadon($id);
					$this->data['hoadon'] = $this->hoadon_model->get_hoadon($id);	

					if($this->data['chitiet']==FALSE||$this->data['hoadon']==FALSE)
					{
						$this->session->set_userdata('hoadon_action', '3');
						return redirect(base_url('admin/hoadon'));
					}
					$filename = 'hoadon'.$id;
					$pdfFilePath = FCPATH."\static\hoadon\\$filename.pdf";					
					 
					if (file_exists($pdfFilePath) == FALSE)
					{
					    ini_set('memory_limit','32M');
					 //    $this->load->view('admin/include/header',$this->data);
						// $this->load->view('admin/include/sidebar',$this->data);									
						// $this->load->view('admin/hoadon/info',$this->data);				
						// $this->load->view('admin/include/footer',$this->data);
					    $html = $this->load->view('admin/hoadon/print', $this->data, true);
					     
					    $this->load->library('pdf');
					    $pdf = $this->pdf->load(); 
					    $pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure <img src="http://davidsimpson.me/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley"> 
					    $pdf->WriteHTML($html); // write the HTML into the PDF
					    $pdf->Output($pdfFilePath, 'F'); // save to file because we can
					}			 		
					redirect("static\hoadon\\$filename.pdf"); 
				}				
			}
		}
		else
			return redirect(base_url('dangnhap'));
	}

	// Quản lý đặt hàng

	function dathang($chucnang = "xem"){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else{												
				if($chucnang == "xem"){
					$this->data['title'] = 'Đặt hàng';
					$this->data['page'] = 'order';
					$this->data['subpage'] = 'order-manage';
					if($this->session->userdata('dathang_action')==FALSE){
						$this->session->set_userdata('dathang_action', '1');
						$this->data['dathang_action'] = $this->session->userdata('dathang_action');
					}
					else $this->data['dathang_action'] = $this->session->userdata('dathang_action');	
					$this->session->set_userdata('dathang_action', '1');

					$this->data['result'] = $this->thongtindathang_model->get_thongtindathang();
						
					$this->load->view('admin/include/header',$this->data);
					$this->load->view('admin/include/sidebar',$this->data);									
					$this->load->view('admin/dathang/index',$this->data);				
					$this->load->view('admin/include/footer',$this->data);					
				}
				elseif ($chucnang == "them") {
					$this->data['page'] = 'order';
					$this->data['subpage'] = 'order-add';

					$config = array(
		               array(
		                     'field'   => 'tenkhachhang', 
		                     'label'   => 'Tên khách hàng', 
		                     'rules'   => 'trim|required|xss_clean|min_length[2]|max_length[20]'
		                  ),
		               array(
		                     'field'   => 'sdtkhachhang', 
		                     'label'   => 'SĐT khách hàng', 
		                     'rules'   => 'trim|required|xss_clean|min_length[10]|max_length[13]|numeric'
		                  ),
		               array(
		                     'field'   => 'tennguoinhan', 
		                     'label'   => 'Tên người nhận', 
		                     'rules'   => 'trim|required|xss_clean|min_length[2]|max_length[20]'
		                  ),
		               array(
		                     'field'   => 'sdtnguoinhan', 
		                     'label'   => 'SĐT người nhận', 
		                     'rules'   => 'trim|required|xss_clean|min_length[10]|max_length[13]|numeric'
		                  ),
		               array(
		                     'field'   => 'diachi', 
		                     'label'   => 'Địa chỉ', 
		                     'rules'   => 'trim|xss_clean'
		                  ),
		               array(
		                     'field'   => 'chonsanpham', 
		                     'label'   => 'Sản phẩm', 
		                     'rules'   => 'required'
		                  )	               
		            );
					
					$this->form_validation->set_rules($config);
					$this->form_validation->set_message('required', '%s không được trống');					
					$this->form_validation->set_message('max_length', '%s quá dài');
					$this->form_validation->set_message('min_length', '%s quá ngắn');					
					$this->form_validation->set_message('numeric', 'Vui lòng chỉ nhập số');					

					$this->form_validation->set_error_delimiters('<label class="control-label col-lg-6" style="color: red"><strong>', '</strong></label>');					
					if (isset($_POST["hidden_field"])){
						$Danhsach = $this->session->userdata('order_list');
						if ($Danhsach!=FALSE)
						{
							$Tenkhachhang = $this->input->post('tenkhachhang',TRUE);
							$Sdtkhachhang = $this->input->post('sdtkhachhang',TRUE);
							$Thanhvien = $this->input->post('thanhvien',TRUE);
							if ($Thanhvien==0)
							{
								$Hoten = explode(" ", $Tenkhachhang);
								$Hodem = $Hoten[0];
								for ($i=1; $i < count($Hoten); $i++) { 
									if ($i==(count($Hoten)-1))
										$Ten = $Hoten[$i];
									else $Hodem = $Hodem.' '.$Hoten[$i];
								}								
								$tmp = $this->nguoidung_model->insert($Hodem, $Ten, $Sdtkhachhang, $Sdtkhachhang, '', '', '', '64', '1', '', $Sdtkhachhang, '0', '1', '6');							
								if(!$tmp)
								{			
									$this->session->set_userdata('order_list', FALSE);
									$this->session->set_userdata('dathang_action', '3');
									return redirect(base_url('admin/dathang'));
								}							
							}																				
							$Tennguoinhan = $this->input->post('tennguoinhan',TRUE);
							$Sdtnguoinhan = $this->input->post('sdtnguoinhan',TRUE);
							$Diachi = $this->input->post('diachi',TRUE);
							$Pttt = $this->input->post('pttt',TRUE);
							$Ptvc = $this->input->post('ptvc',TRUE);
							$Soluong = $this->input->post('sanpham',TRUE);
							$Dongia = $this->input->post('dongia',TRUE);												

							$tmp = $this->thongtindathang_model->insert($Tenkhachhang, $Sdtkhachhang, $Tennguoinhan, $Sdtnguoinhan, $Diachi, $Pttt, $Ptvc, $Danhsach, $Soluong, $Dongia);
						
							if($tmp)
							{			
								$this->session->set_userdata('order_list', FALSE);				
								$this->session->set_userdata('dathang_action', '2');														
								return redirect(base_url('admin/dathang'));
							}							
							else
							{ 
								$this->session->set_userdata('order_list', FALSE);
								$this->session->set_userdata('dathang_action', '3');
								return redirect(base_url('admin/dathang'));
							}														
						}
						else
						{
							$this->session->set_userdata('dathang_action', '3');
							return redirect(base_url('admin/dathang'));
						}																		
					}	
					elseif ($this->form_validation->run() == FALSE){
						$this->data['title'] = 'Thêm đơn đặt hàng';
					
						$this->data['tablet'] = $this->thongtindathang_model->get_sanpham_tablet();
						$this->data['laptop'] = $this->thongtindathang_model->get_sanpham_laptop();
						$this->data['desktop'] = $this->thongtindathang_model->get_sanpham_desktop();
						$this->data['phukien'] = $this->thongtindathang_model->get_sanpham_phukien();						

						$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/sidebar',$this->data);									
						$this->load->view('admin/dathang/add',$this->data);				
						$this->load->view('admin/include/footer',$this->data);
					}						
					elseif ($this->form_validation->run() == TRUE){
						$this->data['title'] = 'Thông tin đặt hàng';

						$Tenkhachhang = $this->input->post('tenkhachhang',TRUE);
						$Sdtkhachhang = $this->input->post('sdtkhachhang',TRUE);
						$check_sdt = $this->thongtindathang_model->check_sdt($Sdtkhachhang);
						if ($check_sdt)
						{
							$Tenkhachhang = $check_sdt;
							$Thanhvien = 1;
						}
						else $Thanhvien = 0;						
						$Tennguoinhan = $this->input->post('tennguoinhan',TRUE);
						$Sdtnguoinhan = $this->input->post('sdtnguoinhan',TRUE);
						$Diachi = $this->input->post('diachi',TRUE);
						$Pttt = $this->input->post('pttt',TRUE);
						$Ptvc = $this->input->post('ptvc',TRUE);						 

						$this->data['order_info'] = array('Tenkhachhang' => $Tenkhachhang, 'Sdtkhachhang' => $Sdtkhachhang, 'Tennguoinhan' => $Tennguoinhan, 'Sdtnguoinhan' => $Sdtnguoinhan, 'Diachi' => $Diachi, 'Pttt' => $Pttt, 'Ptvc' => $Ptvc, 'Thanhvien' => $Thanhvien);
						$this->data['order_list'] = $this->input->post('chonsanpham',TRUE);						
						$this->data['sanpham'] = $this->thongtindathang_model->get_sanpham();
						$this->session->set_userdata('order_list', $this->data['order_list']);
						
						$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/sidebar',$this->data);									
						$this->load->view('admin/dathang/add2',$this->data);				
						$this->load->view('admin/include/footer',$this->data);						
					}									
				}
				elseif($chucnang == "capnhat"){
					$id = $this->input->get("id");																				
					if(!is_numeric($id)||$id<1)
					{ 
						$this->session->set_userdata('dathang_action', '3');
						return redirect(base_url('admin/dathang'));
					}				

					$this->data['title'] = 'Thông tin đặt hàng';
					$this->data['page'] = 'order';
					$this->data['subpage'] = 'order-edit';

					if (!isset($_POST["product_name"]))
					{
						$this->data['thongtin'] = $this->thongtindathang_model->get_chitietdathang($id);
						$this->data['dathang'] = $this->thongtindathang_model->get_chitietdathang2($id);												

						if($this->data['thongtin']==FALSE||$this->data['dathang']==FALSE)
						{
							$this->session->set_userdata('dathang_action', '3');
							return redirect(base_url('admin/dathang'));
						}
						
						$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/sidebar',$this->data);									
						$this->load->view('admin/dathang/edit',$this->data);				
						$this->load->view('admin/include/footer',$this->data);
					}
					else
					{						
						$Tenkhachhang = $this->input->post('customer_name',TRUE);
						$Email = $this->input->post('email',TRUE);
						$Noidung = $this->input->post('content',TRUE);												
						$Thoigian = $this->input->post('cmt_time',TRUE);						
						$Thoigian = date('Y-m-d H:i:s', strtotime($Thoigian)); 																									        		        				        		                					        
						
						$tmp = $this->binhluan_model->update_binhluan($id, $Tenkhachhang, $Email, $Noidung, $Thoigian);
						
						if($tmp)
						{							
							$this->session->set_userdata('binhluan_action', '2');														
							return redirect(base_url('admin/binhluan'));
						}							
						else
						{ 
							$this->session->set_userdata('binhluan_action', '3');
							return redirect(base_url('admin/binhluan'));
						}
					}
				}
				elseif ($chucnang == "huy") {
						$id = $this->input->get("id");																				
						if(!is_numeric($id)||$id<1)
						{ 
							$this->session->set_userdata('dathang_action', '3');
							return redirect(base_url('admin/dathang'));
						}											
						$tmp = $this->thongtindathang_model->cancel($id);
						if($tmp)
						{
							$this->session->set_userdata('dathang_action', '2');
							return redirect(base_url('admin/dathang'));													
						}							
						else
						{ 
							$this->session->set_userdata('dathang_action', '3');						
							return redirect(base_url('admin/dathang'));
						}
				}
				elseif ($chucnang == "xacnhan") {
						$id = $this->input->get("id");																				
						if(!is_numeric($id)||$id<1)
						{ 
							$this->session->set_userdata('dathang_action', '3');
							return redirect(base_url('admin/dathang'));
						}
						$tmp = $this->thongtindathang_model->confirm($id);
						if($tmp)
						{
							$this->session->set_userdata('dathang_action', '2');
							return redirect(base_url('admin/dathang'));													
						}							
						else
						{ 
							$this->session->set_userdata('dathang_action', '3');						
							return redirect(base_url('admin/dathang'));
						}
				}
				elseif ($chucnang == "dathanhtoan") {
						if ($this->data['Role']==1)
						{
							$id = $this->input->get("id");																				
							if(!is_numeric($id)||$id<1)
							{ 
								$this->session->set_userdata('dathang_action', '3');
								return redirect(base_url('admin/dathang'));
							}
							$tmp = $this->thongtindathang_model->paid($id, $this->data['Role']);
							if($tmp)
							{
								$this->session->set_userdata('dathang_action', '2');
								return redirect(base_url('admin/dathang'));													
							}							
							else
							{ 
								$this->session->set_userdata('dathang_action', '3');						
								return redirect(base_url('admin/dathang'));
							}
						}
						else
						{
							$this->session->set_userdata('dathang_action', '3');
							return redirect(base_url('admin/dathang'));
						} 
				}																				
			}
		}
		else
			return redirect(base_url('dangnhap'));
	}

	// Quản lý tin tức

	function tintuc($chucnang = "xem"){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else{
				date_default_timezone_set('Asia/Jakarta');
				if($chucnang == "xem"){
					$this->data['title'] = 'Tin tức';
					$this->data['page'] = 'news';
					$this->data['subpage'] = 'news-manage';
					if($this->session->userdata('tintuc_action')==FALSE){
						$this->session->set_userdata('tintuc_action', '1');
						$this->data['tintuc_action'] = $this->session->userdata('tintuc_action');
					}
					else $this->data['tintuc_action'] = $this->session->userdata('tintuc_action');	
					$this->session->set_userdata('tintuc_action', '1');

					$this->data['result'] = $this->tintuc_model->get_tintuc();
						
					$this->load->view('admin/include/header',$this->data);
					$this->load->view('admin/include/sidebar',$this->data);									
					$this->load->view('admin/tintuc/index',$this->data);				
					$this->load->view('admin/include/footer',$this->data);					
				}
				elseif ($chucnang == "them"){
					$this->data['title'] = 'Thêm tin tức';
					$this->data['page'] = 'news';
					$this->data['subpage'] = 'news-add';					

					$this->setting =  array(
		                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/static/img/",
		                  'upload_url'      => base_url()."static/img",
		                  'allowed_types'   => "gif|jpg|png|jpeg",                  
		                  'max_size'        => 10240,
		                  'max_height'      => 2048,
		                  'max_width'       => 2048  
	                );        			        
				    $this->load->library('upload', $this->setting);
					
					if (!isset($_POST["title"])){
						$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/sidebar',$this->data);									
						$this->load->view('admin/tintuc/insert',$this->data);				
						$this->load->view('admin/include/footer',$this->data);
					}			
					else{
						$Tieude = $this->input->post('title',TRUE);
						$Loaitin = $this->input->post('category',TRUE);
						$Mota = $this->input->post('desc',TRUE);
						$Noidung = $this->input->post('content',TRUE);
						$Ngaydang = $this->input->post('cmt_time',TRUE);
						$Ngaydang = date('Y-m-d H:i:s', strtotime($Ngaydang));
						$Tacgia = $this->chucnang->GetUserID();
		                $Anhtieubieu = 6;
		                $Tinhtrang = ($Ngaydang>date('Y-m-d H:i:s')) ? 2 : 1;		                

				        if($this->upload->do_upload('feature_img'))
				        {			            	
		                	$img_data = array('upload_data' => $this->upload->data());		                	
		                	$Anhtieubieu = $img_data['upload_data']['file_name'];		                			                			                
				        }
				        
						$tmp = $this->tintuc_model->insert($Tieude, $Loaitin, $Mota, $Noidung, $Ngaydang, $Tacgia, $Anhtieubieu, $Tinhtrang);
						
						if($tmp)
						{							
							$this->session->set_userdata('tintuc_action', '2');														
							return redirect(base_url('admin/tintuc'));
						}							
						else
						{ 
							$this->session->set_userdata('tintuc_action', '3');
							return redirect(base_url('admin/tintuc'));
						}
					}					
				}
				elseif ($chucnang == "capnhat"){
					$id = $this->input->get("id");																				
					if(!is_numeric($id)||$id<1)
					{ 
						$this->session->set_userdata('tintuc_action', '3');
						return redirect(base_url('admin/tintuc'));
					}				

					$this->data['title'] = 'Cập nhật tin tức';
					$this->data['page'] = 'news';
					$this->data['subpage'] = 'news-edit';										

					$this->setting =  array(
		                  'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/static/img/",
		                  'upload_url'      => base_url()."static/img",
		                  'allowed_types'   => "gif|jpg|png|jpeg",                  
		                  'max_size'        => 10240,
		                  'max_height'      => 2048,
		                  'max_width'       => 2048  
	                );        			        
				    $this->load->library('upload', $this->setting);

					if (!isset($_POST["title"])){
						$this->data['result'] = $this->tintuc_model->get_tintucinfo($id);
						$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/sidebar',$this->data);									
						$this->load->view('admin/tintuc/edit',$this->data);				
						$this->load->view('admin/include/footer',$this->data);
					}			
					else{
						$Tieude = $this->input->post('title',TRUE);
						$Loaitin = $this->input->post('category',TRUE);
						$Mota = $this->input->post('desc',TRUE);
						$Noidung = $this->input->post('content',TRUE);
						$Ngaydang = $this->input->post('cmt_time',TRUE);
						$Ngaydang = date('Y-m-d H:i:s', strtotime($Ngaydang));
						$Tacgia = $this->input->post('author',TRUE);
		                $Anhtieubieu = $this->input->post('feature_img_old',TRUE);
		                $Tinhtrang = ($Ngaydang>date('Y-m-d H:i:s')) ? 2 : 1;		                

				        if($this->upload->do_upload('feature_img'))
				        {			            	
		                	$img_data = array('upload_data' => $this->upload->data());		                	
		                	$Anhtieubieu = $img_data['upload_data']['file_name'];		                			                			                
				        }
				        
						$tmp = $this->tintuc_model->edit($id, $Tieude, $Loaitin, $Mota, $Noidung, $Ngaydang, $Anhtieubieu, $Tacgia, $Tinhtrang);
						
						if($tmp)
						{							
							$this->session->set_userdata('tintuc_action', '2');														
							return redirect(base_url('admin/tintuc'));
						}							
						else
						{ 
							$this->session->set_userdata('tintuc_action', '3');
							return redirect(base_url('admin/tintuc'));
						}
					}
				}										
				elseif ($chucnang == "xoa") {
						$id = $this->input->get("id");																				
						if(!is_numeric($id)||$id<1)
						{ 
							$this->session->set_userdata('tintuc_action', '3');
							return redirect(base_url('admin/tintuc'));
						}											
						$tmp = $this->tintuc_model->delete($id);
						if($tmp)
						{
							$this->session->set_userdata('tintuc_action', '2');
							return redirect(base_url('admin/tintuc'));													
						}							
						else
						{ 
							$this->session->set_userdata('tintuc_action', '3');						
							return redirect(base_url('admin/tintuc'));
						}
				}
				elseif ($chucnang == "binhluan")
				{					
					if($this->session->userdata('tintuc_action')==FALSE){
						$this->session->set_userdata('tintuc_action', '1');
						$this->data['tintuc_action'] = $this->session->userdata('tintuc_action');
					}
					else $this->data['tintuc_action'] = $this->session->userdata('tintuc_action');	
					$this->session->set_userdata('tintuc_action', '1');					

					$id = $this->input->get("id");																									
					$xoa = $this->input->get("xoa");																								
					
					if ($id)
					{
						if(!is_numeric($id)||$id<1)
						{ 
							$this->session->set_userdata('tintuc_action', '3');
							return redirect(base_url('admin/tintuc/binhluan'));
						}
																
						if (!isset($_POST["title"])){
							$this->data['title'] = 'Bình luận tin tức';
							$this->data['page'] = 'news';
							$this->data['subpage'] = 'news-comment-edit';	

							$this->data['result'] = $this->tintuc_model->get_chitiettintucbinhluan($id);

							$this->load->view('admin/include/header',$this->data);
							$this->load->view('admin/include/sidebar',$this->data);									
							$this->load->view('admin/tintuc/edit-comment',$this->data);				
							$this->load->view('admin/include/footer',$this->data);
						}			
						else{							
							$Noidung = $this->input->post('content',TRUE);									               					        
					        
							$tmp = $this->tintuc_model->edit_cmt($id, $Noidung);
							
							if($tmp)
							{							
								$this->session->set_userdata('tintuc_action', '2');														
								return redirect(base_url('admin/tintuc/binhluan'));
							}							
							else
							{ 
								$this->session->set_userdata('tintuc_action', '3');
								return redirect(base_url('admin/tintuc/binhluan'));
							}
						}
					}
					elseif ($xoa)
					{
						if(!is_numeric($xoa)||$xoa<1)
						{ 
							$this->session->set_userdata('tintuc_action', '3');
							return redirect(base_url('admin/tintuc/binhluan'));
						}						
						$tmp = $this->tintuc_model->delete_cmt($xoa);

						if($tmp)
						{							
							$this->session->set_userdata('tintuc_action', '2');														
							return redirect(base_url('admin/tintuc/binhluan'));
						}							
						else
						{ 
							$this->session->set_userdata('tintuc_action', '3');
							return redirect(base_url('admin/tintuc/binhluan'));
						}
					}
					else
					{
						$this->data['title'] = 'Bình luận tin tức';
						$this->data['page'] = 'news';
						$this->data['subpage'] = 'news-comment';

						$this->data['result'] = $this->tintuc_model->get_tintucbinhluan();
						$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/sidebar',$this->data);									
						$this->load->view('admin/tintuc/comment',$this->data);				
						$this->load->view('admin/include/footer',$this->data);
					}														
				}												
			}
		}
		else
			return redirect(base_url('dangnhap'));
	}

	// Quản lý bình luận

	function binhluan($chucnang = "xem"){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{			
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else
			{								
				$this->data['title'] = 'Bình luận';
				$this->data['page'] = 'comment';
				$this->data['subpage'] = 'comment-manage';

				if($chucnang == "xem")
				{
					if($this->session->userdata('binhluan_action')==FALSE){
						$this->session->set_userdata('binhluan_action', '1');
						$this->data['binhluan_action'] = $this->session->userdata('binhluan_action');
					}
					else $this->data['binhluan_action'] = $this->session->userdata('binhluan_action');	
					$this->session->set_userdata('binhluan_action', '1');

					$this->data['result'] = $this->binhluan_model->get_binhluan();					

					$this->load->view('admin/include/header',$this->data);
					$this->load->view('admin/include/sidebar',$this->data);									
					$this->load->view('admin/binhluan/index',$this->data);				
					$this->load->view('admin/include/footer',$this->data);	
				}
				elseif($chucnang == "capnhat")
				{
					$id = $this->input->get("id");																				
					if(!is_numeric($id)||$id<1)
					{ 
						$this->session->set_userdata('danhgia_action', '3');
						return redirect(base_url('admin/binhluan'));
					}				

					$this->data['title'] = 'Cập nhật bình luận';
					$this->data['page'] = 'comment';
					$this->data['subpage'] = 'comment-edit';

					if (!isset($_POST["product_name"]))
					{
						$this->data['result'] = $this->binhluan_model->get_binhluaninfo($id);
						if($this->data['result']==FALSE)
						{
							$this->session->set_userdata('binhluan_action', '3');
							return redirect(base_url('admin/binhluan'));
						}
						
						$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/sidebar',$this->data);									
						$this->load->view('admin/binhluan/edit',$this->data);				
						$this->load->view('admin/include/footer',$this->data);
					}
					else
					{						
						$Tenkhachhang = $this->input->post('customer_name',TRUE);
						$Email = $this->input->post('email',TRUE);
						$Noidung = $this->input->post('content',TRUE);												
						$Thoigian = $this->input->post('cmt_time',TRUE);						
						$Thoigian = date('Y-m-d H:i:s', strtotime($Thoigian)); 																									        		        				        		                					        
						
						$tmp = $this->binhluan_model->update_binhluan($id, $Tenkhachhang, $Email, $Noidung, $Thoigian);
						
						if($tmp)
						{							
							$this->session->set_userdata('binhluan_action', '2');														
							return redirect(base_url('admin/binhluan'));
						}							
						else
						{ 
							$this->session->set_userdata('binhluan_action', '3');
							return redirect(base_url('admin/binhluan'));
						}
					}
				}
				elseif ($chucnang == "xoa") {
						$id = $this->input->get("id");																				
						if(!is_numeric($id)||$id<1)
						{ 
							$this->session->set_userdata('binhluan_action', '3');
							return redirect(base_url('admin/binhluan'));
						}											
						$tmp = $this->binhluan_model->delete($id);
						if($tmp)
						{
							$this->session->set_userdata('binhluan_action', '2');
							return redirect(base_url('admin/binhluan'));													
						}							
						else
						{ 
							$this->session->set_userdata('binhluan_action', '3');						
							return redirect(base_url('admin/binhluan'));
						}
				}				
			}
		}
		else
			return redirect(base_url('dangnhap'));	
	}

	// Quản lý đánh giá

	function danhgia($chucnang = "xem"){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{			
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else
			{								
				$this->data['title'] = 'Đánh giá';
				$this->data['page'] = 'rating';
				$this->data['subpage'] = 'rating-manage';

				if($chucnang == "xem")
				{
					if($this->session->userdata('danhgia_action')==FALSE){
						$this->session->set_userdata('danhgia_action', '1');
						$this->data['danhgia_action'] = $this->session->userdata('danhgia_action');
					}
					else $this->data['danhgia_action'] = $this->session->userdata('danhgia_action');	
					$this->session->set_userdata('danhgia_action', '1');

					$this->data['result'] = $this->danhgia_model->get_danhgia();					

					$this->load->view('admin/include/header',$this->data);
					$this->load->view('admin/include/sidebar',$this->data);									
					$this->load->view('admin/danhgia/index',$this->data);				
					$this->load->view('admin/include/footer',$this->data);	
				}
				if($chucnang == "chitiet")
				{					
					if($this->session->userdata('danhgia_action')==FALSE){
						$this->session->set_userdata('danhgia_action', '1');
						$this->data['danhgia_action'] = $this->session->userdata('danhgia_action');
					}
					else $this->data['danhgia_action'] = $this->session->userdata('danhgia_action');	
					$this->session->set_userdata('danhgia_action', '1');
					
					$id = $this->input->get("id");
					$thaotac = $this->input->get("thaotac");
					if (!($thaotac==1||$thaotac==2))
						$thaotac=0;

					if (!is_numeric($id)||$id<1)
					{
						$this->session->set_userdata('danhgia_action', '3');
						return redirect(base_url('admin/danhgia'));
					}

					$this->data['title'] = 'Chi tiết đánh giá';
					$this->data['page'] = 'rating';
					$this->data['subpage'] = 'rating-info';
					
					if ($thaotac==1)
					{						
						$rate = $this->input->get("rate");
						if(!is_numeric($rate)||$rate<1)
						{ 
							$this->session->set_userdata('danhgia_action', '3');
							return redirect(base_url('admin/danhgia'));
						}				

						$this->data['title'] = 'Cập nhật đánh giá';
						$this->data['page'] = 'rating';
						$this->data['subpage'] = 'rating-edit';

						if (!isset($_POST["product_name"]))
						{
							$this->data['result'] = $this->danhgia_model->get_danhgiainfo($rate);

							if($this->data['result']==FALSE)
							{
								$this->session->set_userdata('danhgia_action', '3');
								return redirect(base_url().'admin/danhgia/chitiet?id='.$id);
							}
							
							$this->load->view('admin/include/header',$this->data);
							$this->load->view('admin/include/sidebar',$this->data);									
							$this->load->view('admin/danhgia/edit',$this->data);				
							$this->load->view('admin/include/footer',$this->data);
						}
						else
						{							
							$Diem = $this->input->post('point',TRUE);
							$Noidung = $this->input->post('content',TRUE);																										        		        				        		                					        
							
							$tmp = $this->danhgia_model->update_danhgia($rate, $Diem, $Noidung);
							
							if($tmp)
							{							
								$this->session->set_userdata('danhgia_action', '2');														
								return redirect(base_url().'admin/danhgia/chitiet?id='.$id);
							}							
							else
							{ 
								$this->session->set_userdata('danhgia_action', '3');
								return redirect(base_url().'admin/danhgia/chitiet?id='.$id);
							}
						}
					}
					elseif ($thaotac==2)
					{											
						$rate = $this->input->get("rate");
						$tmp = $this->danhgia_model->xoa($rate);

						if($tmp)
						{							
							$this->session->set_userdata('danhgia_action', '2');														
							return redirect(base_url().'admin/danhgia/chitiet?id='.$id);
						}							
						else
						{ 
							$this->session->set_userdata('danhgia_action', '3');
							return redirect(base_url().'admin/danhgia/chitiet?id='.$id);
						}
					}
					else
					{						
						$this->data['result'] = $this->danhgia_model->get_danhgiachitiet($id);
						$this->data['get_danhgiachitiet_tensp'] = $this->danhgia_model->get_danhgiachitiet_tensp($id);

						$this->load->view('admin/include/header',$this->data);
						$this->load->view('admin/include/sidebar',$this->data);									
						$this->load->view('admin/danhgia/info',$this->data);				
						$this->load->view('admin/include/footer',$this->data);
					}										
				}				
			}
		}
		else
			return redirect(base_url('dangnhap'));	
	}

	// Các chức năng phụ

	public function ktngaysinh($input){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else{
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
    	}
		else
			return redirect(base_url('dangnhap'));
	}	

	public function kttinhthanh($input){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else{
			    	if ($input!="") return TRUE;    	
			    	else 
			    	{
						$this->form_validation->set_message('kttinhthanh', 'Chưa chọn tỉnh thành');
			    		return FALSE;
			    	}
			    }
    	}
		else
			return redirect(base_url('dangnhap'));
	}	

	public function ktmatkhau($matkhau){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else{
					if($matkhau=="") return TRUE;					
				    if (preg_match("/^[0-9A-Za-z!@#$%]+$/", $matkhau)) return TRUE;
			    	else 
			    	{
						$this->form_validation->set_message('ktmatkhau', 'Mật khẩu không hợp lệ');
			    		return FALSE;
			    	}
			    }
    	}
		else
			return redirect(base_url('dangnhap'));
	} 

	public function ktcaptcha($cap){
		$check = $this->chucnang->ktdangnhap();		
		if($check == 1 || $check == 2 )
		{
			$role = $this->data['Role'];
			if($role == 0)
				return redirect(base_url());
			else{
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
		else
			return redirect(base_url('dangnhap'));
	}	   
}