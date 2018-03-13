<?php
class Cat_model extends CI_Model{
	
	
	function __construct(){
		parent::__construct();
	}
	
	function list_all(){
		$this->db->order_by('id_cat','asc');
		return $this->db->get('category');
	}
	
	
	
	function count_all(){
		return $this->db->count_all('category');
	}
	
	function get_paged_list($limit = 10, $offset = 0){
		$this->db->order_by('id_cat','asc');
		return $this->db->get('category',$limit,$offset);
	}
	
	function get_by_id($id){
		$this->db->where('id_cat', $id);
		return $this->db->get('category');
	}
	
	function save($cat){
		$this->db->insert('category',$cat);
		return $this->db->insert_id();
	}
	
	function update($id, $cat){
		$this->db->where('id_cat', $id);
		$this->db->update('category',$cat);
	}
	
	function delete($id){
		$this->db->where('id_cat', $id);
		$this->db->delete('category');
	}

	}
	
