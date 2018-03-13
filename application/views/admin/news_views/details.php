
	<div class="content">
		<h1><?php echo $title; ?></h1>
		<div class="data">
		<table>
			<tr>
				<td width="30%">ID</td>
				<td><?php echo $news->id_news; ?></td>
			</tr>
			<tr>
				<td valign="top">Title</td>
				<td><?php echo $news->title; ?></td>
			</tr>
			<tr>
				<td valign="top">Text</td>
				<td><?php echo $news->txt; ?></td>
			</tr>
		</table>
		</div>
		<br />
		<?php echo $link_back; ?>
	</div>