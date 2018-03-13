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
echo form_hidden('id',$this->form_data->id_news);
echo '</p><p>'.form_label('Title', 'title');
echo form_input('title',$this->form_data->title);
echo '</p><p>'.form_label('Text', 'text');
echo form_textarea('txt',$this->form_data->txt);
echo '</p><p class="submit">'.form_button($attr).'</p>';
echo form_fieldset_close().'<br />';
echo validation_errors('<p class="error"/>');
echo $link_back;
	
