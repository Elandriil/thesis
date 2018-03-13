<?php
$attr=array('class'=>'formm');
$attr2=array(
'name'=>'submit',
'value'=>'true',
'type'=>'submit',
'content'=>'Login');

echo '<table class="form_p"><tr><td>';

echo form_open('login/validate_credentials',$attr);
echo form_fieldset('Login');
echo '<p class="first">';
echo form_label('Username','username');
echo form_input('usern','Username');
echo '</p><p>'.form_label('Password', 'password');
echo form_password('pass','Password');
echo '</p><p class="submit">'.form_button($attr2).'</p>';
echo form_fieldset_close();

echo '</td></tr></table>';
//echo anchor('login/signup','Create Account');
echo validation_errors('<p class="error"/>');