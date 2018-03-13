<br />
<!--<p align="left">News</p>-->
<table id="news">
<?php if(isset($news)) : foreach($news as $row): 
echo '
<tr>
<td align="left">'.$row->usern.'<br>Posted: '.substr($row->date_w,0,-8).'</td><td align="left">'.$row->title.'</td>
</tr>
<tr>
<td id="avatar"><img src="'.$row->p_link.'"/></td><td>'.$row->txt.'</td>
</tr>';
endforeach;?>
<?php else: ?> 
<h2>no news</h2>
<?php endif;?>
</table>
