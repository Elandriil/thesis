<?php
class Slider_model extends CI_Model{
	
	
	function __construct(){
		parent::__construct();
	}
	
	function list_all(){
		$this->db->order_by('name_pic','asc');
		$this->db->where('pic_cat',21);
		return $this->db->get('picture');
	}
	
	function count_all(){
		return $this->db->count_all('picture');
	}
	
	function get_paged_list($limit = 10, $offset = 0){
		$this->db->order_by('name_pic','asc');
		$this->db->where('pic_cat',21);
		return $this->db->get('picture',$limit,$offset);
	}
	
	function get_by_id($id){
		$this->db->where('id_pic', $id);
		return $this->db->get('picture');
	}
	
	function save($pic){
		$this->db->insert('picture',$pic);
		return $this->db->insert_id();
	}
	
	function update($id, $pic){
		$this->db->where('id_pic', $id);
		$this->db->update('picture',$pic);
	}
	
	function delete($id){
		$this->db->where('id_pic', $id);
		$this->db->delete('picture');
	}

	}
	
