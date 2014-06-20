<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class public_model extends CI_Model {
		
	function __construct()
	{
		parent::__construct();
	}

	public function sanpham($id){		
		$query = $this->db->query("SELECT S.*, H.TENANH, N.TENNCC, L.TENLOAI, D.ID AS MADANHGIA FROM SANPHAM S, HINHANH H, NHACUNGCAP N, LOAISANPHAM L, DANHGIA D WHERE D.MASANPHAM = S.ID AND S.HINHDAIDIEN = H.ID AND N.ID = S.NHACUNGCAP AND L.ID = S.LOAI AND S.ID = ".$id);		
		$query2 = $this->db->query('UPDATE SANPHAM SET LUOTXEM = LUOTXEM + 1 WHERE ID = '.$id);		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;		
		
	}

	public function get_userinfo(){
		$id = $this->chucnang->GetUserID();
		$query = $this->db->query("SELECT * FROM NGUOIDUNG WHERE ID = ".$id);
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;
	}

	public function get_lichsudathang(){
		$id = $this->chucnang->GetUserID();		
		$query = $this->db->query("SELECT * FROM THONGTINDATHANG WHERE SDTKHACHHANG = (SELECT SDT FROM NGUOIDUNG WHERE ID = ?)
ORDER BY NGAYDATHANG DESC",$id);
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;
	}

	public function get_lichsumuahang(){
		$id = $this->chucnang->GetUserID();		
		$query = $this->db->query("SELECT * FROM HOADON WHERE SDTKHACHHANG = (SELECT SDT FROM NGUOIDUNG WHERE ID = ?)
ORDER BY NGAYDATHANG DESC",$id);
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;
	}	

	public function danhgiasanpham($id){		
		$query = $this->db->query("SELECT * FROM DANHGIA WHERE MASANPHAM = ".$id);		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;		
		
	}

	public function chitietdanhgia($id,$page){		
		$query = $this->db->query("SELECT C.*, N.HODEM, N.TENNGUOIDUNG FROM CHITIETDANHGIA C, NGUOIDUNG N WHERE C.MAKHACHHANG = N.ID AND C.MASANPHAM = ? ORDER BY THOIGIAN DESC LIMIT ?,5", array($id,$page));		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;		
		
	}

	public function ktdanhgia($id,$uid){
		if ($this->data['Login']!=1) return false;
		$query = $this->db->query("SELECT * FROM CHITIETDANHGIA WHERE MASANPHAM = ? AND MAKHACHHANG = ?", array($id,$uid));		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;
	}

	public function binhluansanpham($id,$page){		
		$query = $this->db->query("SELECT * FROM BINHLUAN WHERE MASANPHAM = ? ORDER BY THOIGIAN DESC LIMIT ?,5", array($id,$page));		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;		
		
	}

	public function tongdanhgia($id){
		$query = $this->db->query("SELECT COUNT(*) AS SOLUONG FROM CHITIETDANHGIA WHERE MASANPHAM = ".$id);		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;
	}
	
	public function tongbinhluan($id){
		$query = $this->db->query("SELECT COUNT(*) AS SOLUONG FROM BINHLUAN WHERE MASANPHAM = ".$id);		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;
	}

	public function chitietsanpham($id){		
		$query = $this->db->query("SELECT * FROM CHITIETSANPHAM WHERE MASANPHAM = ".$id);		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;		
		
	}
	
	public function thongtindathang($id){		
		$query = $this->db->query("SELECT * FROM THONGTINDATHANG WHERE ID = ".$id);		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;		
		
	}

	public function danhsachdathang($id){		
		$query = $this->db->query("SELECT D.*, S.TENSANPHAM, S.DONGIA, L.TENLOAI, N.TENNCC FROM DATHANG D, SANPHAM S, LOAISANPHAM L, NHACUNGCAP N WHERE D.MASANPHAM = S.ID AND S.LOAI = L.ID AND S.NHACUNGCAP = N.ID AND D.MADATHANG = ".$id);		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;		
		
	}

	public function thongtinmuahang($id){		
		$query = $this->db->query("SELECT * FROM HOADON WHERE ID = ".$id);		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;		
		
	}

	public function danhsachmuahang($id){		
		$query = $this->db->query("SELECT D.*, S.TENSANPHAM, S.DONGIA, L.TENLOAI, N.TENNCC FROM CHITIETHOADON D, SANPHAM S, LOAISANPHAM L, NHACUNGCAP N WHERE D.MASANPHAM = S.ID AND S.LOAI = L.ID AND S.NHACUNGCAP = N.ID AND D.MADATHANG = ".$id);		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;		
		
	}

	public function get_tintuc($page){	
		$page = ($page - 1)*5;	
		$query = $this->db->query("SELECT T.*, H.TENANH, N.TENDANGNHAP FROM TINTUC T, HINHANH H, NGUOIDUNG N WHERE T.HINH = H.ID AND N.ID = TACGIA ORDER BY T.NGAYDANG DESC LIMIT ?,5", $page);		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;				
	}

	public function tongtintuc(){			
		$query = $this->db->query("SELECT COUNT(*) AS SOLUONG FROM TINTUC WHERE TINHTRANG = 1");		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;				
	}

	public function tongbinhluantintuc($id){			
		$query = $this->db->query("SELECT COUNT(*) AS SOLUONG FROM BINHLUANTINTUC WHERE MATINTUC = ".$id);		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;				
	}

	public function binhluantintuc($id,$page){
		$page = ($page-1)*5;			
		$query = $this->db->query("SELECT B.*, N.TENDANGNHAP, H.TENANH FROM BINHLUANTINTUC B, NGUOIDUNG N, HINHANH H WHERE B.MAKHACHHANG = N.ID AND N.HINHDAIDIEN = H.ID AND B.MATINTUC = ? ORDER BY B.THOIGIAN DESC LIMIT ?,5", array($id,$page));		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;				
	}

	public function chitiettintuc($id){			
		$query = $this->db->query("SELECT T.*, H.TENANH, N.TENDANGNHAP FROM TINTUC T, HINHANH H, NGUOIDUNG N WHERE T.HINH = H.ID AND N.ID = TACGIA AND T.ID = ".$id);		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;				
	}

	public function show_tablet_active(){		
		$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI = 1 AND TINHTRANG = 1
ORDER BY S.NGAY  DESC LIMIT 0,4");
		return $query->result_array();						
	}

	public function show_tablet_deactive(){		
		$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI = 1 AND TINHTRANG = 1
ORDER BY S.NGAY  DESC LIMIT 4,4");
		return $query->result_array();						
	}

	public function sanphamlq_active(){		
		$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI BETWEEN 1 AND 3 AND TINHTRANG = 1
ORDER BY RAND()  DESC LIMIT 0,4");
		return $query->result_array();						
	}

	public function sanphamlq_deactive(){		
		$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI = 0 AND TINHTRANG = 1
ORDER BY RAND()  DESC LIMIT 4,4");
		return $query->result_array();						
	}

	public function show_laptop_active(){		
		$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI = 2 AND TINHTRANG = 1
ORDER BY S.NGAY  DESC LIMIT 0,4");
		return $query->result_array();						
	}

	public function show_laptop_deactive(){		
		$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI = 2 AND TINHTRANG = 1
ORDER BY S.NGAY  DESC LIMIT 4,4");
		return $query->result_array();						
	}

	public function show_desktop_active(){		
		$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI = 3 AND TINHTRANG = 1
ORDER BY S.NGAY  DESC LIMIT 0,4");
		return $query->result_array();						
	}

	public function show_desktop_deactive(){		
		$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI = 3 AND TINHTRANG = 1
ORDER BY S.NGAY  DESC LIMIT 4,4");
		return $query->result_array();						
	}

	public function show_accessory_active(){		
		$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI = 0 AND TINHTRANG = 1
ORDER BY S.NGAY  DESC LIMIT 0,4");
		return $query->result_array();						
	}

	public function show_accessory_deactive(){		
		$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI = 0 AND TINHTRANG = 1
ORDER BY S.NGAY  DESC LIMIT 4,4");
		return $query->result_array();						
	}

	public function show_featureproduct_active(){		
		$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI != 0 AND TINHTRANG = 1
ORDER BY S.LUOTMUA  DESC LIMIT 0,3");
		return $query->result_array();						
	}

	public function show_featureproduct_deactive(){		
		$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI != 0 AND TINHTRANG = 1
ORDER BY S.LUOTMUA  DESC LIMIT 3,3");
		return $query->result_array();						
	}

	public function show_hotproduct_active(){		
		$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI != 0 AND TINHTRANG = 1
ORDER BY D.DIEMDANHGIA  DESC LIMIT 1");
		return $query->result_array();						
	}

	public function show_hotproduct_deactive(){		
		$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI != 0 AND TINHTRANG = 1
ORDER BY D.DIEMDANHGIA  DESC LIMIT 1,2");
		return $query->result_array();						
	}

	public function get_soluongloai($loai){
		$query = $this->db->query("SELECT N.*, COUNT(*) AS SOLUONG FROM NHACUNGCAP N, SANPHAM S WHERE S.NHACUNGCAP = N.ID AND LOAI = ? GROUP BY N.ID", $loai);
		return $query->result_array();
	}

	public function get_soluongncc($ncc){
		$query = $this->db->query("SELECT L.*, COUNT(*) AS SOLUONG FROM LOAISANPHAM L, SANPHAM S WHERE S.LOAI = L.ID AND NHACUNGCAP = ? GROUP BY L.ID", $ncc);
		return $query->result_array();
	}

	public function get_tongsploai($loai,$ncc){
		if ($ncc)
		{
			$query = $this->db->query("SELECT COUNT(*) AS SOLUONG FROM SANPHAM WHERE LOAI = ? AND NHACUNGCAP = ?", array($loai,$ncc));
		}
		else
		{
			$query = $this->db->query("SELECT COUNT(*) AS SOLUONG FROM SANPHAM WHERE LOAI = ?", $loai);
		}
		
		return $query->result_array();
	}

	public function get_tongspncc($ncc,$loai){
		if ($loai)
		{
			$query = $this->db->query("SELECT COUNT(*) AS SOLUONG FROM SANPHAM WHERE NHACUNGCAP = ? AND LOAI = ?", array($ncc,$loai));
		}
		else
		{
			$query = $this->db->query("SELECT COUNT(*) AS SOLUONG FROM SANPHAM WHERE NHACUNGCAP = ?", $ncc);
		}
		
		return $query->result_array();
	}

	public function get_sanpham_loai($perpage,$sortby,$page,$loai,$ncc){
		if ($ncc)
		{
			if ($sortby=='time')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY NGAY DESC", array($loai,$ncc));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY NGAY DESC LIMIT ?,?", array($loai,$ncc,$page,$perpage));
				return $query->result_array();
			}
			elseif ($sortby=='nameaz')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY TENSANPHAM ASC", array($loai,$ncc,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY TENSANPHAM ASC LIMIT ?,?", array($loai,$ncc,$page,$perpage));
				return $query->result_array();
			}
			elseif ($sortby=='nameza')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY TENSANPHAM DESC", array($loai,$ncc,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY TENSANPHAM DESC LIMIT ?,?", array($loai,$ncc,$page,$perpage));
				return $query->result_array();
			}
			elseif ($sortby=='pricelh')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY DONGIA ASC", array($loai,$ncc,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY DONGIA ASC LIMIT ?,?", array($loai,$ncc,$page,$perpage));
				return $query->result_array();
			}
			elseif ($sortby=='pricehl')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY DONGIA DESC", array($loai,$ncc,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY DONGIA DESC LIMIT ?,?", array($loai,$ncc,$page,$perpage));
				return $query->result_array();
			}
			elseif ($sortby=='view')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY LUOTXEM DESC", array($loai,$ncc,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY LUOTXEM DESC LIMIT ?,?", array($loai,$ncc,$page,$perpage));
				return $query->result_array();
			}
		}
		else
		{
			if ($sortby=='time')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI = ? ORDER BY NGAY DESC", array($loai,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI = ? ORDER BY NGAY DESC LIMIT ?,?", array($loai,$page,$perpage));
				return $query->result_array();
			}
			elseif ($sortby=='nameaz')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI = ? ORDER BY TENSANPHAM ASC", array($loai,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI = ? ORDER BY TENSANPHAM ASC LIMIT ?,?", array($loai,$page,$perpage));
				return $query->result_array();
			}
			elseif ($sortby=='nameza')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI = ? ORDER BY TENSANPHAM DESC", array($loai,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI = ? ORDER BY TENSANPHAM DESC LIMIT ?,?", array($loai,$page,$perpage));
				return $query->result_array();
			}
			elseif ($sortby=='pricelh')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI = ? ORDER BY DONGIA ASC", array($loai,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI = ? ORDER BY DONGIA ASC LIMIT ?,?", array($loai,$page,$perpage));
				return $query->result_array();
			}
			elseif ($sortby=='pricehl')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI = ? ORDER BY DONGIA DESC", array($loai,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI = ? ORDER BY DONGIA DESC LIMIT ?,?", array($loai,$page,$perpage));
				return $query->result_array();
			}
			elseif ($sortby=='view')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI = ? ORDER BY LUOTXEM DESC", array($loai,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND LOAI = ? ORDER BY LUOTXEM DESC LIMIT ?,?", array($loai,$page,$perpage));
				return $query->result_array();
			}
		}		
	}

	public function get_sanpham_ncc($perpage,$sortby,$page,$loai,$ncc){
		if ($loai)
		{
			if ($sortby=='time')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY NGAY DESC", array($loai,$ncc));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY NGAY DESC LIMIT ?,?", array($loai,$ncc,$page,$perpage));
				return $query->result_array();
			}
			elseif ($sortby=='nameaz')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY TENSANPHAM ASC", array($loai,$ncc,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY TENSANPHAM ASC LIMIT ?,?", array($loai,$ncc,$page,$perpage));
				return $query->result_array();
			}
			elseif ($sortby=='nameza')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY TENSANPHAM DESC", array($loai,$ncc,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY TENSANPHAM DESC LIMIT ?,?", array($loai,$ncc,$page,$perpage));
				return $query->result_array();
			}
			elseif ($sortby=='pricelh')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY DONGIA ASC", array($loai,$ncc,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY DONGIA ASC LIMIT ?,?", array($loai,$ncc,$page,$perpage));
				return $query->result_array();
			}
			elseif ($sortby=='pricehl')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY DONGIA DESC", array($loai,$ncc,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY DONGIA DESC LIMIT ?,?", array($loai,$ncc,$page,$perpage));
				return $query->result_array();
			}
			elseif ($sortby=='view')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY LUOTXEM DESC", array($loai,$ncc,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND S.LOAI = ? AND S.NHACUNGCAP = ? ORDER BY LUOTXEM DESC LIMIT ?,?", array($loai,$ncc,$page,$perpage));
				return $query->result_array();
			}
		}
		else
		{
			if ($sortby=='time')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND NHACUNGCAP = ? ORDER BY NGAY DESC", array($ncc,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND NHACUNGCAP = ? ORDER BY NGAY DESC LIMIT ?,?", array($ncc,$page,$perpage));
				return $query->result_array();
			}
			elseif ($sortby=='nameaz')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND NHACUNGCAP = ? ORDER BY TENSANPHAM ASC", array($ncc,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND NHACUNGCAP = ? ORDER BY TENSANPHAM ASC LIMIT ?,?", array($ncc,$page,$perpage));
				return $query->result_array();
			}
			elseif ($sortby=='nameza')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND NHACUNGCAP = ? ORDER BY TENSANPHAM DESC", array($ncc,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND NHACUNGCAP = ? ORDER BY TENSANPHAM DESC LIMIT ?,?", array($ncc,$page,$perpage));
				return $query->result_array();
			}
			elseif ($sortby=='pricelh')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND NHACUNGCAP = ? ORDER BY DONGIA ASC", array($ncc,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND NHACUNGCAP = ? ORDER BY DONGIA ASC LIMIT ?,?", array($ncc,$page,$perpage));
				return $query->result_array();
			}
			elseif ($sortby=='pricehl')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND NHACUNGCAP = ? ORDER BY DONGIA DESC", array($ncc,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND NHACUNGCAP = ? ORDER BY DONGIA DESC LIMIT ?,?", array($ncc,$page,$perpage));
				return $query->result_array();
			}
			elseif ($sortby=='view')
			{
				if ($perpage=='all')
				{
					$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND NHACUNGCAP = ? ORDER BY LUOTXEM DESC", array($ncc,$page,$perpage));
					return $query->result_array();
				}	

				$page = ($page - 1)*$perpage;
				$perpage = (int)$perpage;

				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM AND NHACUNGCAP = ? ORDER BY LUOTXEM DESC LIMIT ?,?", array($ncc,$page,$perpage));
				return $query->result_array();
			}
		}		
	}

	public function timkiem_tongsp($loaisanpham,$ncc,$gia,$keyword)
	{
		if ($loaisanpham=='all'&&$ncc=='all'&&$gia=='all'&&$keyword=='')			
			$query = $this->db->query("SELECT COUNT(*) AS SOLUONG FROM SANPHAM");	
		else
		{
			$string = '';
			if ($loaisanpham!='all')
			{				
				$string = $string.' AND S.LOAI = '.$loaisanpham;
			}
			if ($ncc!='all')
			{
				$string = $string.' AND S.NHACUNGCAP = '.$ncc;
			}
			if ($gia!='all')
			{
				if ($gia==3)
					$string = $string.' AND S.DONGIA < 3000000';
				elseif ($gia==35)
					$string = $string.' AND S.DONGIA BETWEEN 3000000 AND 4999999';
				elseif ($gia==510)
					$string = $string.' AND S.DONGIA BETWEEN 5000000 AND 9999999';
				elseif ($gia==1020)
					$string = $string.' AND S.DONGIA BETWEEN 10000000 AND 19999999';
				elseif ($gia==20)
					$string = $string.' AND S.DONGIA > 20000000';
			}						
			if ($keyword!='')
			{				
				$string = $string.' AND S.TENSANPHAM LIKE \'%'.$keyword.'%\'';
			}			
					
			$query = $this->db->query("SELECT COUNT(*) AS SOLUONG FROM SANPHAM S, CHITIETSANPHAM C WHERE C.MASANPHAM = S.ID".$string);
		}			
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;
	}

	public function timkiem_getsp($loaisanpham,$ncc,$gia,$sapxep,$hienthi,$keyword,$page)
	{
		if ($hienthi!='all')
		{
			if (is_numeric($page))
				$page = ($page - 1)*$hienthi;
		}

		if ($loaisanpham=='all'&&$ncc=='all'&&$gia=='all'&&$sapxep=='all'&&$hienthi=='all'&&$keyword=='')			
			$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, CHITIETSANPHAM C, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE C.MASANPHAM = S.ID AND S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM ORDER BY S.NGAY DESC LIMIT ?,?", array($page,1000));	
		else
		{
			$string = '';
			if ($loaisanpham!='all')
			{				
				$string = $string.' AND S.LOAI = '.$loaisanpham;
			}
			if ($ncc!='all')
			{
				$string = $string.' AND S.NHACUNGCAP = '.$ncc;
			}
			if ($gia!='all')
			{
				if ($gia==3)
					$string = $string.' AND S.DONGIA < 3000000';
				elseif ($gia==35)
					$string = $string.' AND S.DONGIA BETWEEN 3000000 AND 4999999';
				elseif ($gia==510)
					$string = $string.' AND S.DONGIA BETWEEN 5000000 AND 9999999';
				elseif ($gia==1020)
					$string = $string.' AND S.DONGIA BETWEEN 10000000 AND 19999999';
				elseif ($gia==20)
					$string = $string.' AND S.DONGIA > 20000000';
			}			
			if ($keyword!='')
			{
				$string = $string.' AND S.TENSANPHAM LIKE \'%'.$keyword.'%\'';
			}
			if ($sapxep!='all')
			{
				if ($sapxep=='giatang')
					$string = $string.' ORDER BY S.DONGIA ASC';
				elseif ($sapxep=='giagiam')
					$string = $string.' ORDER BY S.DONGIA DESC';
				elseif ($sapxep=='tenaz')
					$string = $string.' ORDER BY S.TENSANPHAM ASC';
				elseif ($sapxep=='tenza')
					$string = $string.' ORDER BY S.TENSANPHAM DESC';
				elseif ($sapxep=='luotxem')
					$string = $string.' ORDER BY S.LUOTXEM DESC';
				elseif ($sapxep=='luotmua')
					$string = $string.' ORDER BY S.LUOTMUA DESC';
				elseif ($sapxep=='danhgia')
					$string = $string.' ORDER BY D.DIEMDANHGIA DESC';
				elseif ($sapxep=='moinhat')
					$string = $string.' ORDER BY S.NGAY DESC';
				elseif ($sapxep=='cunhat')
					$string = $string.' ORDER BY S.NGAY ASC';
			}
			else
				$string = $string.' ORDER BY S.NGAY DESC';

			if ($hienthi=='all')
				$string = $string.' LIMIT 0,1000';
			else
			{
				$string = $string.' LIMIT '.$page.','.$hienthi.'';
			}
				$query = $this->db->query("SELECT S.*, H.TENANH, L.TENLOAI, N.TENNCC, D.DIEMDANHGIA FROM SANPHAM S, CHITIETSANPHAM C, HINHANH H, LOAISANPHAM L, NHACUNGCAP N, DANHGIA D WHERE C.MASANPHAM = S.ID AND S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID AND N.ID = S.NHACUNGCAP AND S.ID = D.MASANPHAM".$string);			
		}		
		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;
	}

	public function get_rp1()
	{
		$query = $this->db->query("SELECT (SELECT COUNT(*) FROM NGUOIDUNG WHERE TRANGTHAI = 1 AND QUYEN =0) AS KHACHHANG, (SELECT COUNT(*) FROM SANPHAM WHERE TINHTRANG =1) AS SANPHAM, (SELECT COUNT(*) FROM HOADON WHERE TINHTRANG = -1) AS HOADON, ROUND((SELECT SUM(TONGTIEN) FROM HOADON WHERE TINHTRANG = -1)/1000000,0) AS DOANHTHU");
		return $query->result_array();
	}	
}