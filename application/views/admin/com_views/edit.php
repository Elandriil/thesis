<?php
echo '<div class="content">
<h1>';
echo $title.'</h1>';
echo $message; 
$attr=array(
'name'=>'submit',
'value'=>'true',
'type'=>'submit',
'content'=>'Save');



echo form_open($action);
echo form_fieldset('');
echo '<p class="first">';
echo form_hidden('id',$this->form_data->id_com);
echo '</p><p>'.form_label('Name', 'name');
echo form_input('user_by',$this->form_data->user_by);
echo '</p><p>'.form_label('Comment', 'comment');
echo form_textarea('txt_com',$this->form_data->txt_com);
echo '</p><p>'.form_label('Avatar', 'avatar');
echo form_textarea('avatar',$this->form_data->avatar);
echo '</p><p class="submit">'.form_button($attr).'</p>';
echo form_fieldset_close().'<br />';
echo validation_errors('<p class="error"/>');
echo $link_back;
	
