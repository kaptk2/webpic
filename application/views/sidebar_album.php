<div class="container-fluid">
	<div class="row-fluid">
		<div class="span2">
			<div class="well sidebar-nav affix">
				<ul class="nav nav-list">
					<li class="nav-header">Actions</li>
					<li><a href="<?= site_url("/upload/new_directory")?>">Add Album</a></li>
					<li><a href="<?= site_url("/upload")?>">Add Photo</a></li>
					<li id="trash"><img src="<?=base_url("/static/img/trash.png")?>"></li>
				</ul>
				<ul class="nav nav-list">
					<li class="nav-header">Albums</li>
					<?php foreach ($items as $item):?>
						<?php echo $item;?>
					<?php endforeach;?>
				</ul>
				</div><!--/.well -->
			</div><!--/span-->
