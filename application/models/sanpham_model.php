<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Sanpham_model extends CI_Model{

	var $table = 'SANPHAM';

	function __construct(){
		parent:: __construct();
	}
	
	function get_sanpham(){
		$query = $this->db->query("SELECT S.*, N.TENNCC, H.TENANH, L.TENLOAI FROM SANPHAM S, NHACUNGCAP N, HINHANH H, LOAISANPHAM L WHERE S.NHACUNGCAP = N.ID AND S.HINHDAIDIEN = H.ID AND S.LOAI = L.ID ORDER BY S.ID ASC");
		return $query->result_array();
	}

	function get_loaisanpham(){
		$query = $this->db->query("SELECT * FROM LOAISANPHAM ORDER BY ID DESC");
		return $query->result_array();
	}

	function get_nhacungcap(){
		$query = $this->db->query("SELECT * FROM NHACUNGCAP ORDER BY ID DESC");
		return $query->result_array();
	}

	function ngungkinhdoanh($id){	      		   				
		if ($this->data['Role']!=1)
			return FALSE;
		$this->db->trans_start();
		$query = $this->db->query('UPDATE SANPHAM SET TINHTRANG = -1 WHERE ID = '.$id);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;
	}

	function batdaukinhdoanh($id){	      		   				
		if ($this->data['Role']!=1)
			return FALSE;
		$this->db->trans_start();
		$query = $this->db->query('UPDATE SANPHAM SET TINHTRANG = 1 WHERE ID = '.$id);
		$query = $this->db->query('UPDATE SANPHAM SET TINHTRANG = 0 WHERE ID = ? AND SOLUONG = 0', $id);
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE)
			return FALSE;
		else return TRUE;
	}

	function insert($Tensanpham, $Loaisanpham, $Nhacungcap, $Mota, $Dongia, $Hinhdaidien, $Hedieuhanh, $Manhinh, $Vixuly, $Chipset, $Dohoa, $RAM, $ROM, $Camera, $Ketnoi, $Diaquang, $Pin, $Trongluong, $Baohanh, $Khuyenmai){
		if (!is_numeric($Hinhdaidien))
		{
			$query = $this->db->query('INSERT INTO HINHANH (TENANH) VALUES (\''.$Hinhdaidien.'\')');
			$query = $this->db->query('SELECT ID FROM HINHANH WHERE TENANH = \''.$Hinhdaidien.'\'');		
			if ($query->num_rows() > 0)				
			   foreach ($query->result() as $row)		   
			      $Hinhdaidien = $row->ID;
		}

		$data = array(
			"Tensanpham" => $Tensanpham,
			"Loai" => $Loaisanpham,
			"Nhacungcap" =>	$Nhacungcap,
			"Soluong" => 0,
			"Hinhdaidien" => $Hinhdaidien,
			"Mota" => $Mota,			
			"Dongia" => $Dongia,
			"Tinhtrang" => 0,
			"Luotxem" => 0,
			"Luotmua" => 0
		);

		$this->db->insert($this->table, $data);

		if($this->db->insert_id() > 0)
		{
			$query = $this->db->query('SELECT ID FROM CHITIETSANPHAM ORDER BY ID DESC LIMIT 1');		
			if ($query->num_rows() > 0)				
			   foreach ($query->result() as $row)		   
			      $Masanpham = $row->ID;
			$data = array(
				"Masanpham" => $Masanpham,
				"Hedieuhanh" => $Hedieuhanh,
				"Manhinh" =>	$Manhinh,
				"CPU" => $Vixuly,
				"Chipset" => $Chipset,
				"Dohoa" => $Dohoa,			
				"RAM" => $RAM,
				"ROM" => $ROM,
				"Camera" => $Camera,
				"Ketnoi" => $Ketnoi,
				"Diaquang" => $Diaquang,
				"Pin" => $Pin,
				"Trongluong" => $Trongluong,
				"Baohanh" => $Baohanh,
				"Khuyenmai" => $Khuyenmai										
			);

			$this->db->trans_start();
			$this->db->insert('CHITIETSANPHAM', $data);									
			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE)
				return FALSE;
			else return TRUE;
		}
		else return FALSE;
	}

	function edit($id){		
		$query = $this->db->query('SELECT S.*, H.TENANH FROM SANPHAM S, HINHANH H WHERE S.HINHDAIDIEN = H.ID AND S.ID = '.$id);
		return $query->result_array();
	}

	function detail($id){		
		$query = $this->db->get_where('CHITIETSANPHAM',array('ID'=>$id));
		return $query->result_array();
	}	

	function update($Id, $Tensanpham, $Loaisanpham, $Soluong, $Tinhtrang, $Luotxem, $Luotmua, $Nhacungcap, $Mota, $Dongia, $Hinhdaidien, $Hedieuhanh, $Manhinh, $Vixuly, $Chipset, $Dohoa, $RAM, $ROM, $Camera, $Ketnoi, $Diaquang, $Pin, $Trongluong, $Baohanh, $Khuyenmai){
		if (!is_numeric($Hinhdaidien))
		{
			$query = $this->db->query('INSERT INTO HINHANH (TENANH) VALUES (\''.$Hinhdaidien.'\')');
			$query = $this->db->query('SELECT ID FROM HINHANH WHERE TENANH = \''.$Hinhdaidien.'\'');		
			if ($query->num_rows() > 0)				
			   foreach ($query->result() as $row)		   
			      $Hinhdaidien = $row->ID;
		}

		$data = array(
			"Tensanpham" => $Tensanpham,
			"Loai" => $Loaisanpham,
			"Nhacungcap" =>	$Nhacungcap,
			"Soluong" => $Soluong,
			"Hinhdaidien" => $Hinhdaidien,
			"Mota" => $Mota,			
			"Dongia" => $Dongia,
			"Tinhtrang" => $Tinhtrang,
			"Luotxem" => $Luotxem,
			"Luotmua" => $Luotmua
		);
		
		$this->db->trans_start();
		$this->db->where("Id", $Id);
		$query = $this->db->update($this->table, $data);
		$this->db->trans_complete();

		if ($this->db->trans_status() === TRUE)
		{			
			$data = array(
				"Masanpham" => $Id,
				"Hedieuhanh" => $Hedieuhanh,
				"Manhinh" =>	$Manhinh,
				"CPU" => $Vixuly,
				"Chipset" => $Chipset,
				"Dohoa" => $Dohoa,			
				"RAM" => $RAM,
				"ROM" => $ROM,
				"Camera" => $Camera,
				"Ketnoi" => $Ketnoi,
				"Diaquang" => $Diaquang,
				"Pin" => $Pin,
				"Trongluong" => $Trongluong,
				"Baohanh" => $Baohanh,
				"Khuyenmai" => $Khuyenmai										
			);
			
			$this->db->trans_start();
			$this->db->where("MASANPHAM", $Id);
			$query = $this->db->update('CHITIETSANPHAM', $data);										
			$this->db->trans_complete();

			if ($this->db->trans_status() === FALSE)
				return FALSE;
			else return TRUE;
		}
		else return FALSE;
	}


/*
	

	function get_sanpham_loai($id){
		$query = $this->db->query("SELECT B1.*, (SELECT B2.TENLOAI FROM loaisanpham B2 WHERE B1.LOAI = B2.ID ) LOAISANPHAM , (SELECT B3.TENNCC FROM nhacungcap B3 WHERE B1.NHACUNGCAP = B3.ID ) TENNHACUNGCAP FROM `".$this->table."` B1 WHERE LOAI = ".$id." ORDER BY `ID` DESC ");
		return $query->result_array();
	}

	function edit($id){
		
		$query = $this->db->get_where($this->table,array('ID'=>$id));
		return $query->result_array();
	}		

	function delete($id){
		$this->db->delete($this->table,array('id'=>$id));
		if($this->db->affected_rows() > 0 ) return TRUE;
		return FALSE;
	}

	function thongke_sanpham_top10sell()
	{
		$query =  $this->db->query('SELECT S.TENSANPHAM, D.LUOTMUA FROM danhgia D, sanpham S WHERE D.MASANPHAM = S.ID ORDER BY D.LUOTMUA DESC LIMIT 10');
		return $query->result();
	}

	function thongke_sanpham_top10rate()
	{
		$query =  $this->db->query('SELECT B1.ID, TENSANPHAM, COUNT(*) AS DIEMDANHGIA FROM SANPHAM B1, BINHLUAN B2 WHERE B1.ID = B2.MASANPHAM GROUP BY MASANPHAM ORDER BY COUNT(*) DESC LIMIT 10');
		return $query->result();
	}

	function thongke_sanpham_soluong()
	{
		$query = $this->db->query('SELECT COUNT(*) AS SOLUONG FROM sanpham');
		return $query->result();		
	}

	function thongke_sanpham_tongmuaxem()
	{
		$query = $this->db->query('SELECT SUM(LUOTXEM) AS XEM, SUM(LUOTMUA) AS MUA FROM danhgia');
		return $query->result();		
	}
*/
}