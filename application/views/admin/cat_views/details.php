
	<div class="content">
		<h1><?php echo $title; ?></h1>
		<div class="data">
		<table>
			<tr>
				<td width="30%">ID</td>
				<td><?php echo $cats->id_cat; ?></td>
			</tr>
			<tr>
				<td valign="top">Name</td>
				<td><?php echo $cats->name_cat; ?></td>
			</tr>
			<tr>
				<td valign="top">Description</td>
				<td><?php echo $cats->descr_cat; ?></td>
			</tr>
		</table>
		</div>
		<br />
		<?php echo $link_back; ?>
	</div>