<?php
class Members_model extends CI_Model{
	
	function validate(){
		$salt='j78kftspie4j7SnY6S12xGt5SMh6osLg';
		$passw=hash('sha256',$this->input->post('pass'));
		$passw=$passw.$salt;
		$passw=hash('sha256',$passw);
		
		$this->db->select('is_admin');
		$this->db->where('usern',$this->input->post('usern'));
		$this->db->where('pass',$passw);
		$query=$this->db->get('users');
		if($query->num_rows==1){
			return $query;
				}
			}
	function create_member(){
		$salt='j78kftspie4j7SnY6S12xGt5SMh6osLg';
		$passw=hash('sha256',$this->input->post('pass'));
		$passw=$passw.$salt;
		$passw=hash('sha256',$passw);
		
		$new_member=array(
		'usern'=>$this->input->post('usern'),
		'pass'=>$passw,
		'mail'=>$this->input->post('mail')
		);
		$insert=$this->db->insert('users',$new_member);
		return $insert;
		}
	}
?>