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

echo form_hidden('id',$this->form_data->id_pic);

echo '</p><p>'.form_label('Name', 'name');
echo form_input('name_pic',$this->form_data->name_pic);

echo '</p><p>'.form_label('Description', 'description');
echo form_input('descr_pic',$this->form_data->descr_pic);



echo form_hidden('pic_cat',21);

echo '</p><p>'.form_label('Thumbnail name', 'thumbnail_name');
echo form_textarea('t_link',$this->form_data->t_link);

echo '</p><p>'.form_label('Picture name', 'picture_name');
echo form_textarea('p_link',$this->form_data->p_link);

echo '</p><p class="submit">'.form_button($attr).'</p>';
echo form_fieldset_close().'<br />';
echo validation_errors('<p class="error"/>');
echo $link_back;
	
