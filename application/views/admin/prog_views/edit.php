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
echo form_hidden('id',$this->form_data->id_prog);

echo '</p><p>'.form_label('Name', 'name');
echo form_input('name_prog',$this->form_data->name_prog);

echo '</p><p>'.form_label('Description', 'description');
echo form_textarea('descr_prog',$this->form_data->descr_prog);

echo '</p><p>'.form_label('Download', 'download');
echo form_textarea('dl_link',$this->form_data->dl_link);

echo '</p><p class="submit">'.form_button($attr).'</p>';
echo form_fieldset_close().'<br />';
echo validation_errors('<p class="error"/>');
echo $link_back;
	
