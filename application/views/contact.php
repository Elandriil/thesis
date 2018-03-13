<?php 
$attr=array('id'=>'form');
$js = 'onClick="this.value=""';
$attr2=array(
'name'=>'send',
'value'=>'true',
'type'=>'submit',
'content'=>'Send');

echo '<table class="form_p"><tr><td>';
echo form_open('main/mail_send',$attr);
echo form_fieldset('Contact');
echo '<p class="first">';
echo form_label('E-mail address','mail');
echo form_input('mail','Mail',$js);
echo '</p><p>'.form_label('Name', 'name');
echo form_input('name','Name',$js);
echo '</p><p>'.form_label('Subject', 'subject');
echo form_input('subject','Subject');
echo '</p><p>'.form_label('Message', 'message');
echo form_textarea('message','Message',$js);

echo '</p><p class="submit">'.form_button($attr2).'</p>';
echo form_fieldset_close();
echo '</td></tr></table>';
echo validation_errors('<p class="error"/>');