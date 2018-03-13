
	<div class="content">
		<h1><?php echo $title; ?></h1>
		<div class="data">
		<table>
			<tr>
				<td width="30%">ID</td>
				<td><?php echo $progs->id_prog; ?></td>
			</tr>
			<tr>
				<td valign="top">Name</td>
				<td><?php echo $progs->name_prog; ?></td>
			</tr>
			<tr>
				<td valign="top">Description</td>
				<td><?php echo $progs->descr_prog; ?></td>
			</tr>
            	<tr>
				<td valign="top">Download</td>
				<td><?php echo $progs->dl_link; ?></td>
			</tr>
		</table>
		</div>
		<br />
		<?php echo $link_back; ?>
	</div>