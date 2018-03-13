
	<div class="content">
		<h1><?php echo $title; ?></h1>
		<div class="data">
		<table>
			<tr>
				<td width="30%">ID</td>
				<td><?php echo $coms->id_com; ?></td>
			</tr>
			<tr>
				<td valign="top">Name</td>
				<td><?php echo $coms->user_by; ?></td>
			</tr>
			<tr>
				<td valign="top">Comment</td>
				<td><?php echo $coms->txt_com ?></td>
			</tr>
            <tr>
				<td valign="top">Avatar</td>
				<td><?php echo '<img src="'.$coms->avatar.'"'; ?></td>
			</tr>
            <tr>
				<td valign="top">date_c</td>
				<td><?php echo $coms->date_c ?></td>
			</tr>
            <tr>
				<td valign="top">Category</td>
				<td><?php echo $coms->cat_com ?></td>
			</tr>
		</table>
		</div>
		<br />
		<?php echo $link_back; ?>
	</div>