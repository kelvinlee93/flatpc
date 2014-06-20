<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class chucnang{
	var $CI;	
	//Table: Username,
	var $admin = 'NGUOIDUNG';	
	
	//checkSession(): un, bm, lg
	function checkSession(){
		$this->CI=&get_instance();
		$arr = $this->CI->session->all_userdata();
		
		if(isset($arr['un']))
		{
			$str = $this->CI->security->xss_clean($arr['un']);
			if($str!=$arr['un'])
			{
				$this->CI->session->sess_destroy();
				return FALSE;
			}
		}
		
		if(isset($arr['bm']))
		{
			$str = $this->CI->security->xss_clean($arr['bm']);
			if($str!='FlatPC')
			{
				$this->CI->session->sess_destroy();
				return FALSE;
			}
		}
		
		if(isset($arr['lg']))
		{
			$str = $this->CI->security->xss_clean($arr['lg']);
			if($str!=TRUE)
			{
				$this->CI->session->sess_destroy();
				return FALSE;
			}
		}

		return TRUE;
	}

	function checkInput($arr){
		$this->CI=&get_instance();		
		if(is_array($arr))
		{
			if(isset($arr['username']))
			{
				$str = $this->CI->security->xss_clean($arr['username']);
				if($str!=$arr['username']) return FALSE;
			}			
			if(isset($arr['password']))
			{
				$str = $this->CI->security->xss_clean($arr['password']);
				if($str!=$arr['password']) return FALSE;
			}			
			if(isset($arr['newpassword']))
			{
				$str = $this->CI->security->xss_clean($arr['newpassword']);
				if($str!=$arr['newpassword']) return FALSE;
			}			
			if(isset($arr['type']))
			{
				$str = $this->CI->security->xss_clean($arr['type']);
				if($str!=$arr['type']) return FALSE;
			}			
			if(isset($arr['status']))
			{
				$str = $this->CI->security->xss_clean($arr['status']);
				if($str!=$arr['status']) return FALSE;
				if(!is_numeric($str)) return FALSE;
			}			
			if(isset($arr['LoaiGame']))
			{
				$str = $this->CI->security->xss_clean($arr['LoaiGame']);
				if($str!=$arr['LoaiGame']) return FALSE;
			}			
			if(isset($arr['Store']))
			{
				$str = $this->CI->security->xss_clean($arr['Store']);
				if($str!=$arr['Store']) return FALSE;
			}			
			if(isset($arr['Blog']))
			{
				$str = $this->CI->security->xss_clean($arr['Blog']);
				if($str!=$arr['Blog']) return FALSE;
			}			
			if(isset($arr['Support']))
			{
				$str = $this->CI->security->xss_clean($arr['Support']);
				if($str!=$arr['Support']) return FALSE;
				if(!is_numeric($str)) return FALSE;
			}			
			if(isset($arr['PromotionCode']))
			{
				$str = $this->CI->security->xss_clean($arr['PromotionCode']);
				if($str!=$arr['PromotionCode']) return FALSE;
				if(!is_numeric($str)) return FALSE;
			}			
			if(isset($arr['FreeStuff']))
			{
				$str = $this->CI->security->xss_clean($arr['FreeStuff']);
				if($str!=$arr['FreeStuff']) return FALSE;
			}			
			if(isset($arr['Image']))
			{
				$str = $this->CI->security->xss_clean($arr['Image']);
				if($str!=$arr['Image']) return FALSE;
			}			
			if(isset($arr['Email']))
			{
				$str = $this->CI->security->xss_clean($arr['Email']);
				if($str!=$arr['Email']) return FALSE;
			}			
			return TRUE;
			if(isset($arr['Library']))
			{
				$str = $this->CI->security->xss_clean($arr['Library']);
				if($str!=$arr['Library']) return FALSE;
			}			
			return TRUE;
			if(isset($arr['NguoiDung']))
			{
				$str = $this->CI->security->xss_clean($arr['NguoiDung']);
				if($str!=$arr['NguoiDung']) return FALSE;
			}			
			return TRUE;
		}
		
		return FALSE;
	}

	function checkUsername($arr){
		$this->CI=&get_instance();
		if($this->checkInput($arr))
		{
			if(isset($arr['username'])&&($arr['username']!=NULL))
			{
				$query = $this->CI->db->query('	SELECT a.ID
												FROM '.$this->admin.' a
												WHERE a.TENDANGNHAP = ?',
												$arr['username']);
				if($query->num_rows() > 0)
				{
					return TRUE;
				}
				else 
				{
					$query = $this->CI->db->query('	SELECT a.ID
												FROM '.$this->admin.' a
												WHERE a.SDT = ?',
												$arr['username']);
					if($query->num_rows() > 0)
					{
						return TRUE;
					}
				}
			}
		}
		return FALSE;
	}

	function checkStatus($arr){
		$this->CI=&get_instance();
		if($this->checkInput($arr))
		{
			if($this->checkUsername($arr))
			{				
				$query = $this->CI->db->query('SELECT TRANGTHAI FROM '.$this->admin.' WHERE TENDANGNHAP = ?', $arr['username']);					
				if($query->num_rows() > 0)
				{
					return $query->row()->TRANGTHAI;
				}
				else
				{
					$query = $this->CI->db->query('SELECT TRANGTHAI FROM '.$this->admin.' WHERE SDT = ?', $arr['username']);					
					if($query->num_rows() > 0)
					{
						return $query->row()->TRANGTHAI;
					}
					else return 0;
				} 
			}
			else return -3;
		}
		else return -2;
	}

	function ktdangnhap(){
		$this->CI=&get_instance();
		$arr = array();
		if(($this->CI->session->userdata('un') != NULL) && ($this->CI->session->userdata('lg') != NULL) 
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
				$this->dangxuat();
				return -1;
			}
		}
		else return 0;
	}

	public function dangnhap($arr, $baomat = 'FlatPC'){
		$this->CI=&get_instance();			
		if($this->checkInput($arr))
		{			
			if($this->checkUsername($arr))
			{
				if(isset($arr['username'])&&($arr['username']!=NULL)&&isset($arr['password'])&&($arr['password']!=NULL))
				{
					$status = $this->checkStatus($arr);
					if($status == 1)
					{
						$query = $this->CI->db->query(" SELECT QUYEN 
														FROM ".$this->admin." 
														WHERE TENDANGNHAP = ? AND TRANGTHAI = 1 AND MATKHAU = ?",
														array($arr['username'], md5($arr['password'])));
						if($query->num_rows()>0)
						{
							$quyen = $query->row()->QUYEN;
							if(($quyen == 0)||($quyen == 1)||($quyen == 2))
							{
								$arrUser = array('un' => $arr['username'], 'bm' => $baomat, 'lg' => TRUE);																													
								$this->CI->session->set_userdata($arrUser);
								if(!isset($_SESSION)) 
								{ 
									session_start(); 
								} 
								$_SESSION['bm'] = $arrUser['bm'];
								$_SESSION['un'] = $arrUser['un'];
								$_SESSION['lg'] = $arrUser['lg'];
								$_SESSION['quyen'] = $quyen;								
								return 1;
							}
							else return -7;
						}
						else
						{
							$query = $this->CI->db->query(" SELECT TENDANGNHAP, QUYEN 
														FROM ".$this->admin." 
														WHERE SDT = ? AND TRANGTHAI = 1 AND MATKHAU = ?",
														array($arr['username'], md5($arr['password'])));
							if($query->num_rows()>0)
							{
								$quyen = $query->row()->QUYEN;
								$arr['username'] = $query->row()->TENDANGNHAP;								
								if(($quyen == 0)||($quyen == 1)||($quyen == 2))
								{
									$arrUser = array('un' => $arr['username'], 'bm' => $baomat, 'lg' => TRUE);																													
									$this->CI->session->set_userdata($arrUser);
									if(!isset($_SESSION)) 
									{ 
										session_start(); 
									} 
									$_SESSION['bm'] = $arrUser['bm'];
									$_SESSION['un'] = $arrUser['un'];
									$_SESSION['lg'] = $arrUser['lg'];
									$_SESSION['quyen'] = $quyen;								
									return 1;
								}
								else return -7;
							}								
							else return -6;
						} 
					}
					else return -5;
				}
				else return -4;
			}
			else return -3;
		}
		else return -2;
	}

	function getLoginUsername(){
		$this->CI=&get_instance();							
		$arr = array();	
		if(($this->CI->session->userdata('un') != NULL) && ($this->CI->session->userdata('lg') != NULL) 
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
				else
				{

				} 
					return NULL;
			}
			else
			{
				$this->dangxuat();
				return NULL;
			}
		}
		else return NULL;
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

	function GetName(){
		$this->CI=&get_instance();
		$temp = $this->getLoginUsername();
		if(!empty($temp))
		{
			$query = $this->CI->db->get_where($this->admin,array("TENDANGNHAP" => $temp));
			$Name = $query->row()->TENNGUOIDUNG;
			if(!empty($Name))
			{
				return $Name;
			}
			else
			{
				return "";
			}
		}
		return "";
	}

	function GetEmail(){
		$this->CI=&get_instance();
		$temp = $this->getLoginUsername();
		if(!empty($temp))
		{
			$query = $this->CI->db->get_where($this->admin,array("TENDANGNHAP" => $temp));
			$Email = $query->row()->EMAIL;
			if(!empty($Email))
			{
				return $Email;
			}
			else
			{
				return "";
			}
		}
		return "";
	}

	function GetUserID(){
		$this->CI=&get_instance();
		$temp = $this->getLoginUsername();
		if(!empty($temp))
		{
			$query = $this->CI->db->get_where($this->admin,array("TENDANGNHAP" => $temp));
			$UserID = $query->row()->ID;
			if(!empty($UserID))
			{
				return $UserID;
			}
			else
			{
				return "";
			}
		}
		return "";
	}

	function GetAvatar(){
		$this->CI=&get_instance();
		$temp = $this->getLoginUsername();
		if(!empty($temp))
		{
			$query = $this->CI->db->query('SELECT H.TENANH FROM NGUOIDUNG N, HINHANH H WHERE N.HINHDAIDIEN = H.ID AND N.TENDANGNHAP = \''.$temp.'\'');
			$UserAvatar = $query->row()->TENANH;
			if(!empty($UserAvatar))
			{
				return $UserAvatar;
			}
			else
			{
				return "";
			}
		}
		return "";
	}
	
	function dangxuat(){
		$this->CI=&get_instance();			
		$this->CI->session->sess_destroy();
	}
}