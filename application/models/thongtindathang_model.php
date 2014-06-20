<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Thongtindathang_model extends CI_Model{

	var $table = 'THONGTINDATHANG';	

	function __construct(){
		parent:: __construct();
	}

	function create_order($Tenkhachhang,$Sdt,$Ten_gh,$Diachi_gh,$Sdt_gh,$Pttt,$Ptvc,$Thanhtien,$Danhsach){
		if ($Ptvc==1)
			$Tongtien = ($Thanhtien*0.1) + $Thanhtien + 50000;
		else $Tongtien = ($Thanhtien*0.1) + $Thanhtien;
		date_default_timezone_set('Asia/Jakarta');				
		$data = array(
			"Ngaydathang" =>  date('Y-m-d H:i:s'),
			"Ngaythanhtoan" =>  NULL,
			"Tenkhachhang" => $Tenkhachhang,
			"Sdtkhachhang"	=> $Sdt,
			"Tennguoinhan" => $Ten_gh,
			"Sdtnguoinhan" => $Sdt_gh,
			"Diachi" => $Diachi_gh,
			"Ptthanhtoan" => $Pttt,
			"Ptvanchuyen" => $Ptvc,			
			"Thanhtien" => $Thanhtien,
 			"Tinhtrang" => 2,
 			"Giamgia" => NULL,
 			"Nguoilapdon" => $this->chucnang->GetUserID(),
 			"Tongtien" => $Tongtien
		);

		$this->db->trans_start();
		$this->db->insert($this->table, $data);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else 
		{	

			$query = $this->db->query('SELECT ID FROM THONGTINDATHANG ORDER BY  ID DESC LIMIT 1');		
			if ($query->num_rows() > 0)				
			   foreach ($query->result() as $row)		   
			      $MDH = $row->ID;
			$i = 0;			

			foreach ($Danhsach as $item) {
				$this->db->trans_start();
				$query = $this->db->query('INSERT INTO DATHANG VALUES (?, ?, ?)', array($MDH, $item['id'], $item['qty']));
				$this->db->trans_complete();				
				if ($this->db->trans_status() === TRUE)
					$i++;			
			}

			$query = $this->db->query('SELECT * FROM DATHANG WHERE MADATHANG = '.$MDH);
			$a = $query->result_array();			
			foreach ($a as $item) {				
				$query = $this->db->query('UPDATE SANPHAM SET SOLUONG = SOLUONG - ? WHERE ID = ?', array($item['SOLUONG'],$item['MASANPHAM']));
			}

			if ($i==(count($Danhsach)))
			{
				foreach ($Danhsach as $item)
				{
					$query = $this->db->query('UPDATE SANPHAM SET LUOTMUA = LUOTMUA + 1 WHERE ID = '.$item['id']);		
				}
				return $MDH;
			}
			else return FALSE;
		}
	}

	function insert($Tenkhachhang, $Sdtkhachhang, $Tennguoinhan, $Sdtnguoinhan, $Diachi, $Pttt, $Ptvc, $Danhsach, $Soluong, $Dongia)
	{	
		$Thanhtien = 0;
		for ($i=1; $i <= count($Dongia); $i++) { 
			$Thanhtien = $Thanhtien + $Dongia[$i]*$Soluong[$i];
		}		
		if($Ptvc == 0)
			$Tongtien = $Thanhtien + ($Thanhtien*10)/100;		
		else
			$Tongtien = $Thanhtien + ($Thanhtien*10)/100 + 50000;
		date_default_timezone_set('Asia/Jakarta');				
		$data = array(
			"Ngaydathang" =>  date('Y-m-d H:i:s'),
			"Ngaythanhtoan" =>  NULL,
			"Tenkhachhang" => $Tenkhachhang,
			"Sdtkhachhang"	=> $Sdtkhachhang,
			"Tennguoinhan" => $Tennguoinhan,
			"Sdtnguoinhan" => $Sdtnguoinhan,
			"Diachi" => $Diachi,
			"Ptthanhtoan" => $Pttt,
			"Ptvanchuyen" => $Ptvc,			
			"Thanhtien" => $Thanhtien,
 			"Tinhtrang" => 2,
 			"Giamgia" => NULL,
 			"Nguoilapdon" => $this->chucnang->GetUserID(),
 			"Tongtien" => $Tongtien
		);

		$this->db->trans_start();
		$this->db->insert($this->table, $data);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else 
		{	

			$query = $this->db->query('SELECT ID FROM THONGTINDATHANG ORDER BY  ID DESC LIMIT 1');		
			if ($query->num_rows() > 0)				
			   foreach ($query->result() as $row)		   
			      $MDH = $row->ID;

			$i = 0; $s = 0;			
			foreach ($Soluong as $item) {
				$this->db->trans_start();
				$query = $this->db->query('INSERT INTO DATHANG VALUES (?, ?, ?)', array($MDH, $Danhsach[$i], $item));
				$this->db->trans_complete();
				$i++;
				if ($this->db->trans_status() === TRUE)
					$s = $i;				
			}

			return ($s==$i);										
		}	
	}

	function get_thongtindathang(){	
		$query = $this->db->query('SELECT * FROM THONGTINDATHANG');
		return $query->result_array();
	}

	function check_sdt($Sdtkhachhang){		
		$query = $this->db->query('SELECT * FROM NGUOIDUNG WHERE SDT = ?', $Sdtkhachhang);
		if($query->num_rows()>0)
		{
			$Tenkhachhang = $query->row()->HODEM.' '.$query->row()->TENNGUOIDUNG;
			return $Tenkhachhang;
		}
		else return FALSE;
	}

	function get_chitietdathang($id){	
		$query = $this->db->query('SELECT * FROM THONGTINDATHANG WHERE ID = '.$id);
		return $query->result_array();
	}

	function get_chitietdathang2($id){	
		$query = $this->db->query('SELECT D.*, S.TENSANPHAM, S.DONGIA, L.TENLOAI, C.BAOHANH, (D.SOLUONG*S.DONGIA) AS THANHTIEN FROM DATHANG D, SANPHAM S, LOAISANPHAM L, CHITIETSANPHAM C  WHERE D.MASANPHAM = S.ID AND S.LOAI = L.ID AND S.ID = C.MASANPHAM AND MADATHANG = '.$id);
		return $query->result_array();
	}	

	function get_sanpham_tablet(){
		$query = $this->db->query('SELECT ID, TENSANPHAM, SOLUONG, TINHTRANG FROM SANPHAM WHERE LOAI = 1');
		return $query->result_array();
	}

	function get_sanpham_laptop(){
		$query = $this->db->query('SELECT ID, TENSANPHAM, SOLUONG, TINHTRANG FROM SANPHAM WHERE LOAI = 2');
		return $query->result_array();
	}

	function get_sanpham_desktop(){
		$query = $this->db->query('SELECT ID, TENSANPHAM, SOLUONG, TINHTRANG FROM SANPHAM WHERE LOAI = 3');
		return $query->result_array();
	}

	function get_sanpham_phukien(){
		$query = $this->db->query('SELECT ID, TENSANPHAM, SOLUONG, TINHTRANG FROM SANPHAM WHERE LOAI = 0');
		return $query->result_array();
	}

	function get_sanpham(){
		$query = $this->db->query('SELECT S.ID, S.TENSANPHAM, S.SOLUONG, S.DONGIA, C.BAOHANH FROM SANPHAM S, CHITIETSANPHAM C WHERE S.ID = C.MASANPHAM');
		return $query->result_array();
	}

	function confirm($id)
	{
		$this->db->trans_start();
		$query = $this->db->query('UPDATE THONGTINDATHANG SET TINHTRANG = 2 WHERE ID = ?', $id);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;	
	}

	function paid($id, $Role)
	{
		if ($Role==1)
		{
			$this->db->trans_start();					
			$query = $this->db->query('UPDATE THONGTINDATHANG SET TINHTRANG = -1, NGAYTHANHTOAN = NOW() WHERE ID = ?', $id);					
			$query = $this->db->query('INSERT HOADON SELECT * FROM THONGTINDATHANG WHERE ID = ?', $id);
			$query = $this->db->query('INSERT CHITIETHOADON SELECT * FROM DATHANG WHERE MADATHANG = ?', $id);
			
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE)
				return FALSE;
			else return TRUE;
		}
		else return FALSE;	
	}	

	function cancel($id)
	{
		$this->db->trans_start();
		$query = $this->db->query('UPDATE THONGTINDATHANG SET TINHTRANG = 0 WHERE ID = ?', $id);

		$query = $this->db->query('SELECT * FROM DATHANG WHERE MADATHANG = '.$id);
		$a = $query->result_array();			
		foreach ($a as $item) {				
			$query = $this->db->query('UPDATE SANPHAM SET SOLUONG = SOLUONG + ? WHERE ID = ?', array($item['SOLUONG'],$item['MASANPHAM']));
		}

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;	
	}

/*	

	function get_lichsudathang($Id){
		$query = $this->db->query('SELECT B1.*, B2.TENNGUOIDUNG,(SELECT SUM(SOLUONG) FROM DONHANG WHERE MADATHANG = B1.ID ) AS SOSANPHAM FROM THONGTINDATHANG B1, NGUOIDUNG B2 WHERE B1.MAKHACHHANG = B2.ID AND B1.MAKHACHHANG = '.$Id.' ORDER BY NGAYDATHANG');
		return $query->result_array();
	}

	function get_id_thongtindathang($Maxacnhan){		
		$query = $this->db->query('SELECT ID FROM THONGTINDATHANG WHERE MAXACNHAN ='.$Maxacnhan);
		return $query->row();
	}

	function get_thongtindathang_id($id){		
		$query = $this->db->query('SELECT B1.*, B2.TENNGUOIDUNG, B2.EMAIL, B2.SDT AS SDT_TT, B2.DIACHI AS DIACHI_TT FROM THONGTINDATHANG B1, NGUOIDUNG B2 WHERE B1.MAKHACHHANG = B2.ID AND B1.ID = '.$id.' ORDER BY NGAYDATHANG');
		return $query->row();
	}

	function get_giohang_id($id){		
		$query = $this->db->query('SELECT B1.*, (SELECT B2.TENLOAI FROM LOAISANPHAM B2 WHERE B1.LOAI = B2.ID ) AS LOAISANPHAM, B3.*  FROM SANPHAM B1, DONHANG B3 WHERE B3.MASANPHAM = B1.ID AND MADATHANG = '.$id);
		return $query->result();
	}	

	function update($Id, $Ngaydathang, $Tongtienhang, $Tinhtrang, $Tennguoinhan, $Diachi, $SDT, $Makhachhang, $Manvgiaohang, $Phuongthucthanhtoan, $Phuongthucvanchuyen)
	{		
		$data = array(
			"Ngaydathang" => $Ngaydathang,
			"Tongtienhang" => $Tongtienhang,
			"Tinhtrang"	=>	$Tinhtrang,
			"Tennguoinhan" => $Tennguoinhan,
			"Diachi" => $Diachi,
			"SDT" => $SDT,
			"Makhachhang" => $Makhachhang,
			"Manvgiaohang" => $Manvgiaohang,
			"Phuongthucthanhtoan" => $Phuongthucthanhtoan,
			"Phuongthucvanchuyen"	=>	$Phuongthucvanchuyen
		);		
		$this->db->trans_start();
		$this->db->where("Id", $Id);
		$query = $this->db->update($this->table, $data);							
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;		
	}

	function update_admin($Id, $Tinhtrang)
	{		
		$data = array(
			"Tinhtrang"	=>	$Tinhtrang
		);		
		$this->db->trans_start();
		$this->db->where("Id", $Id);
		$query = $this->db->update($this->table, $data);							
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;		
	}
*/
}