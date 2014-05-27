<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Hoadon_model extends CI_Model{

	var $table = 'HOADON';

	function __construct(){
		parent:: __construct();
	}

	function get_danhsachhoadon(){	
		$query = $this->db->query('SELECT * FROM HOADON');
		return $query->result_array();
	}

	function get_chitiethoadon($id){	
		$query = $this->db->query('SELECT * FROM HOADON WHERE ID = '.$id);
		return $query->result_array();
	}

	function get_hoadon($id){	
		$query = $this->db->query('SELECT D.*, S.TENSANPHAM, S.DONGIA, L.TENLOAI, C.BAOHANH, (D.SOLUONG*S.DONGIA) AS THANHTIEN FROM CHITIETHOADON D, SANPHAM S, LOAISANPHAM L, CHITIETSANPHAM C  WHERE D.MASANPHAM = S.ID AND S.LOAI = L.ID AND S.ID = C.MASANPHAM AND MADATHANG = '.$id);
		return $query->result_array();
	}

/*
	function get_hoadon(){		
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	function insert($Madathang, $Masanpham, $Soluong)
	{
		$data = array(
			"Madathang" => $Madathang,
			"Masanpham" => $Masanpham,
			"Soluong"	=>	$Soluong			
		);
		$q = $this->db->insert($this->table, $data);
		if($this->db->insert_id() > 0) return TRUE;
		return FALSE;
	}
	
	function thongke_thunhap()
	{
		$query = $this->db->query('SELECT SUM(TONGTIENHANG) AS TONGTIEN, (SELECT SUM(TONGTIENHANG) FROM thongtindathang WHERE NGAYDATHANG > DATE_SUB(CURDATE(),INTERVAL 1 month)) AS TONGTIENTHANG, (SELECT SUM(TONGTIENHANG) FROM thongtindathang WHERE NGAYDATHANG > DATE_SUB(CURDATE(),INTERVAL 7 day)) AS TONGTIENTUAN FROM thongtindathang WHERE TINHTRANG = 1');
		return $query->result();		
	}
*/
}