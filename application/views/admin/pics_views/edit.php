<?php
echo '<div class="content">
<h1>';
echo $title.'</h1>';
echo $message; 
/*if(isset($category)){$cats=array(); foreach($category as $row){
	$cats=array($row->name_cat);
	
	}}
print_r($cats);*/

//$cats = array();
//foreach($category as $row) {
//$cats = array_merge($cats, array($row['id_cat'] => $row['name_cat']));}
//print_r(array_merge($cats));


$attr=array(
'name'=>'submit',
'value'=>'true',
'type'=>'submit',
'content'=>'Save');
$cat=array(
1=>'avatar',
2=>'tribal',
3=>'portraits',
4=>'cars',
5=>'rosario',
6=>'it',
7=>'art',
8=>'manga',
9=>'ds2',
19=>'program',
20=>'other',
21=>'slides',
22=>'cs',
23=>'vk',
24=>'js',
25=>'mvc',
26=>'weather',
27=>'acc',
28=>'html',
29=>'java'
);


echo form_open($action);
echo form_fieldset('');
echo '<p class="first">';

echo form_hidden('id',$this->form_data->id_pic);

echo '</p><p>'.form_label('Name', 'name');
echo form_input('name_pic',$this->form_data->name_pic);

echo '</p><p>'.form_label('Description', 'description');
echo form_input('descr_pic',$this->form_data->descr_pic);

echo '</p><p>'.form_label('Category', 'category');
echo form_dropdown('pic_cat',$cat,$this->form_data->pic_cat);

echo '</p><p>'.form_label('Thumbnail', 'thumbnail');
echo form_textarea('t_link',$this->form_data->t_link);

echo '</p><p>'.form_label('Picture', 'Picture');
echo form_textarea('p_link',$this->form_data->p_link);

echo '</p><p class="submit">'.form_button($attr).'</p>';
echo form_fieldset_close().'<br />';
echo validation_errors('<p class="error"/>');
echo $link_back;
	
