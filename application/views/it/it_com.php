<h3 align="left">Comments</h3>
<table id="news">
<?php 
//echo $news->id_cat;
//$cat=$news->id_cat;
//if($category){foreach($category as $row){$cat=$row->id_cat;}}
//echo $cat;
//echo $category[0]->id_cat;

//print_r($category);
if(isset($comments)) : foreach($comments as $row): 
//$cat=array($row->cat_com);
echo '
<tr>
<td align="left">'.$row->user_by.'<br>Posted: '.substr($row->date_c,0,-8).'</td><td align="left"></td>
</tr>
<tr>
<td id="avatar"><img src="'.$row->avatar.'"/></td><td align="left">'.$row->txt_com.'</td>
</tr>';
endforeach;?>
<?php else: ?> 
<h3>No comments yet, be the first.</h3>
<?php endif;?>
</table><br>

<?php
//echo $this->pagination->create_links();
$attr=array('id'=>'form');
$attr2=array(
'name'=>'submit',
'value'=>'Submit',
'type'=>'submit',
'content'=>'Submit');
echo '<table class="form_p"><tr><td>';
echo form_open('it_contr/add_com',$attr);
echo form_fieldset('Leave a comment');
echo '<p class="first">';
echo form_label('Name','name');
echo form_input('name',set_value('name','anonymus'));
echo '</p><p>'.form_label('Comment', 'comment');
echo form_textarea('comment',set_value('comment','Type your comment'));
echo '</p><p>'.form_hidden('cat',$category[0]->id_cat);//[0]);
echo '</p><p>'.form_label('Avatar', 'avatar');
echo form_textarea('avatar',set_value('avatar','http://avatar.coolclip.ru/albums/Avatars/Avatars%20150x150/Avatars_150x150_26.gif'));
echo '</p><p class="submit">'.form_button($attr2).'</p>';//echo '</p><p class="submit">'.form_submit('submit','Add comment').'</p>';
echo form_fieldset_close();
echo '</td></tr></table>';
echo validation_errors('<p class="error"/>'); ?>
