
	<div class="content">
		<h1><?php echo $title; ?></h1>
		<div class="data">
		<table>
			<tr>
				<td width="30%">ID</td>
				<td><?php echo $pics->id_pic; ?></td>
			</tr>
			<tr>
				<td valign="top">Name</td>
				<td><?php echo $pics->name_pic; ?></td>
			</tr>
			<tr>
				<td valign="top">Description</td>
				<td><?php echo $pics->descr_pic; ?></td>
			</tr>
            <tr>
				<td valign="top">Category</td>
				<td><?php echo $pics->pic_cat; ?></td>
			</tr>
            <tr>
				<td valign="top">Thumbnail</td>
				<td><?php echo $pics->t_link; ?></td>
			</tr>
            <tr>
				<td valign="top">Picture</td>
				<td><br>
				<?php echo $pics->p_link; ?></td>
			</tr>
		</table>
		</div>
		<br />
		<?php echo $link_back; ?>
	</div>