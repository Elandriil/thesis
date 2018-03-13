</div>
	</div>
	<!--<div id="sidebar" valign="top">
    
    <?php /*
	$is_logged_in=$this->session->userdata('is_logged_in');
	if($is_logged_in!=true){
	echo 'Not logged in';
		}
	
	else{
	echo 'Logged in as:<br />';
	echo $this->session->userdata('usern');
		
		} */?>
       <hr size="3" color="#006500" />-->
	  <!--<a href="http://elandir.deviantart.com" target="_blank"><img src="/img/icons/da.png" ></a><br> 
      <a href="https://www.facebook.com/timo.soiunen" target="_blank"><img src="/img/icons/fb.png"></a><br>
      <table id="counter"><tr><td valign="bottom">

 </td></tr></table>
 </div>-->
	<div id="footer">
		&copy; Timo Soiunen 2014  |         <span class="art_link"><?php
	   $is_logged_in=$this->session->userdata('is_logged_in');
		if($is_logged_in!=true){
				echo anchor('main/login', 'Login'); 
      	 }
		else {
				echo anchor('main/admin', 'Admin').' '; 
				echo anchor('main/logout', 'Logout');} 
        ?>
        </span>
        
        <a href="#wrap"><img src="/img/arrow.png"></a></div>
</div>
</body>
</html>