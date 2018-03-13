Create an account
<?php
$attr=array('id'=>'form');
echo form_open('login/create_user',$attr);
echo 'Username'.form_input('usern');//,set_value('usern','Username'));
echo form_password('pass',set_value('pass','Password'));
echo form_password('pass2',set_value('pass2','Password Confirmed'));
echo form_input('mail',set_value('mail','E-mail'));
echo form_submit('submit','Create account');
echo validation_errors('<p class="error"/>'); ?>


