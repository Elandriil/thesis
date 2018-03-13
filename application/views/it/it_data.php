<?php 
$this->load->helper('download');
if(isset($info)){  
		foreach($info as $row)
		{
			echo'<h2>'.$row->name_prog.'</h2><br>
			<h3 align="left">Description</h3>
			<p>'.$row->descr_prog.'</p><br>
			<h3 align="left">Download: <span class="art_link">';
			
			echo anchor_popup($row->dl_link, $row->name_prog);
			echo '<br></span></h3><br>';
			
			}}

?>