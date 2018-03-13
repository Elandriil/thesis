<?php 
$attr=array(
'name'=>'submit',
'value'=>'true',
'type'=>'submit',
'content'=>'Upload');
echo '<div class="content">
<h1>';
echo 'Administrator: upload slider picture</h1>';
echo $error;
echo form_open_multipart('upload/do_upload');
echo form_fieldset('');
echo '<p class="first">';

echo '</p><p>'.form_label('Upload', 'upload');?>

<input type="file" name="userfile" size="20" />
<br /><br />
<?php echo '</p><p class="submit">'.form_button($attr).'</p>'; ?>
</form>
</div>