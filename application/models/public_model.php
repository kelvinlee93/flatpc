<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class public_model extends CI_Model {
		
	function __construct()
	{
		parent::__construct();
	}

	public function sanpham($id){		
		$query = $this->db->query("SELECT S.*, H.TENANH, N.TENNCC, L.TENLOAI FROM SANPHAM S, HINHANH H, NHACUNGCAP N, LOAISANPHAM L WHERE S.HINHDAIDIEN = H.ID AND N.ID = S.NHACUNGCAP AND L.ID = S.LOAI AND S.ID = ".$id);		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;		
		
	}

	public function danhgiasanpham($id){		
		$query = $this->db->query("SELECT * FROM DANHGIA WHERE ID = ".$id);		
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
		return false;		
		
	}
	
	public function chitietsanpham($id){		
		$query = $this->db->query("SELECT * FROM CHITIETSANPHAM WHERE ID = ".$id);		
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

	public function get_tongsploai($loai){
		$query = $this->db->query("SELECT COUNT(*) AS SOLUONG FROM SANPHAM WHERE LOAI = ?", $loai);
		return $query->result_array();
	}

	public function get_sanpham_loai($perpage,$sortby,$page,$loai){
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