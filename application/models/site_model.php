<?php
class Site_model extends CI_Model{
//function to get news, theres a query and result is passed is returned
	function get_news()
	{
		$query=$this->db->query('select news.title, news.txt, news.date_w, 
		users.usern, picture.p_link
		from news,users, picture
		where news.news_by=users.id_user and users.avatar=picture.id_pic and news.news_by=10');
		return $query->result();
		}

//function to get art with passed variable
	function get_art($seg){
		$query=$this->db->query(
		'SELECT picture.t_link, picture.p_link, picture.name_pic
		FROM picture, category
		WHERE picture.pic_cat=category.id_cat and category.name_cat="'.$seg.'"');
		return $query->result();
		}
	function get_pro_pic($seg){
		$query=$this->db->query('
		SELECT picture.p_link, programs.descr_prog, programs.name_prog, programs.dl_link
		FROM programs, picture, pic_prog, category
		WHERE programs.id_prog=pic_prog.id_prop and 
		picture.id_pic=pic_prog.id_picp and 
		category.id_cat=picture.pic_cat and
		category.name_cat="'.$seg.'"');
		return $query->result();
		}
	function get_pro_info($seg){
		$query=$this->db->query('
		SELECT programs.descr_prog, programs.name_prog, programs.dl_link
		FROM programs, picture, pic_prog, category
		WHERE programs.id_prog=pic_prog.id_prop and 
		picture.id_pic=pic_prog.id_picp and
		category.id_cat=picture.pic_cat and
		category.name_cat="'.$seg.'"
		limit 1');
		return $query->result();
		}	
	function get_pro_com($seg){
		$query=$this->db->query('
		SELECT comments.user_by, comments.txt_com, comments.avatar, comments.date_c, comments.cat_com
		FROM comments, category
		WHERE category.id_cat=comments.cat_com and
		category.name_cat="'.$seg.'"');
		return $query->result();
		}	
	function get_cat($seg){
		$query=$this->db->query('
		Select id_cat from category where
		category.name_cat="'.$seg.'"');
		//return $query->row();
		return $query->result();
		}	
	function add_com(){
		$new_com=array(
		'user_by'=>$this->input->post('name'),
		'txt_com'=>$this->input->post('comment'),
		'avatar'=>$this->input->post('avatar'),
		'cat_com'=>$this->input->post('cat')
		);
		$insert=$this->db->insert('comments',$new_com);
		return $insert;
		}
	}
?>