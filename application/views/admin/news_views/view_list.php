
	<div class="content">
		<h1>Administrator: News</h1>
		
		<div class="data"><?php echo $table; ?></div>
        <div class="paging"><?php echo $pagination; ?></div>
		<br />
		<?php echo anchor('news/add/','add new data',array('class'=>'add')); ?>
	</div>

