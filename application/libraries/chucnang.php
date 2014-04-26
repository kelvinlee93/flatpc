<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class chucnang{
	var $CI;	
	//Table: Username,
	var $admin = 'NGUOIDUNG';

	function ktdangnhap(){
		$this->CI=&get_instance();
		$arr = array();
		if(isset($_COOKIE['un']) && isset($_COOKIE['lg']) && isset($_COOKIE['bm']))
		{
			if($this->checkCookie())
			{
				$arr['username'] = $this->CI->input->cookie('un',TRUE);
				$query = $this->CI->db->query('SELECT TENDANGNHAP FROM '.$this->admin.' WHERE TENDANGNHAP = ? AND TRANGTHAI = 1',$arr['username']);
				if($query->num_rows()>0)
				{
					return 2;
				}
				else return -2;
			}
			else
			{
				$this->logout();
				return -1;
			}
		}
		elseif(($this->CI->session->userdata('un') != NULL) && ($this->CI->session->userdata('lg') != NULL) 
		&& ($this->CI->session->userdata('bm') != NULL))
		{
			if($this->checkSession())
			{
				$arr['username'] = $this->CI->session->userdata('un',TRUE);
				$query = $this->CI->db->query('SELECT TENDANGNHAP FROM '.$this->admin.' WHERE TENDANGNHAP = ? AND TRANGTHAI = 1',$arr['username']);
				if($query->num_rows()>0)
				{
					return 1;
				}
				else return -2;
			}
			else
			{
				$this->logout();
				return -1;
			}
		}
		else return 0;
	}

	function GetUserRole(){
		$this->CI=&get_instance();
		$username = $this->getLoginUsername();
		$QUYEN = 0;
		if(!empty($username))
		{
			$query = $this->CI->db->get_where($this->admin,array("TENDANGNHAP" => $username));			
			$QUYEN = $query->row()->QUYEN;
		}
		return $QUYEN;
	}

	function getLoginUsername(){
		$this->CI=&get_instance();
		$arr = array();
		if(isset($_COOKIE['un']) && isset($_COOKIE['lg']) && isset($_COOKIE['bm']))
		{
			if($this->checkCookie())
			{
				$arr['username'] = $this->CI->input->cookie('un',TRUE);
				$query = $this->CI->db->query('	SELECT TENDANGNHAP 
												FROM '.$this->admin.' 
												WHERE TENDANGNHAP = ? AND TRANGTHAI = 1',
												$arr['username']);
				if($query->num_rows() > 0)
				{
					return $arr['username'];
				}
				else return NULL;
			}
			else
			{
				$this->logout();
				return NULL;
			}
		}
		elseif(($this->CI->session->userdata('un') != NULL) && ($this->CI->session->userdata('lg') != NULL) 
		&& ($this->CI->session->userdata('bm') != NULL))
		{
			if($this->checkSession())
			{
				$arr['username'] = $this->CI->session->userdata('un',TRUE);
				$query = $this->CI->db->query('	SELECT TENDANGNHAP 
												FROM '.$this->admin.' 
												WHERE TENDANGNHAP = ? AND TRANGTHAI = 1',
												$arr['username']);
				if($query->num_rows()>0)
				{
					return $arr['username'];
				}
				else return NULL;
			}
			else
			{
				$this->logout();
				return NULL;
			}
		}
		else return NULL;
	}

	// Đăng xuất
	function logout(){
		$this->CI=&get_instance();
		delete_cookie("un");delete_cookie("bm");delete_cookie("lg");
		$this->CI->session->sess_destroy();
	}
}