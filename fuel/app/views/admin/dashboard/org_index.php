<!-- Event Table Main Controls -->
<section class="uk-margin-top
				ec-admin-container
				uk-container-center">
	<div class="uk-grid">
		<div class="uk-width-1-2">
		<a href="<?php print \Fuel\Core\Uri::create('admin/dashboard/org_add') ?>" 
		   class="uk-button uk-button-primary">
			<i class="uk-icon-plus-sign"></i> Add Organizer
		</a>
		</div>
		<div class="uk-width-1-2">
			<ul class="uk-pagination">
			<?php for($x = 1; $x <= $pages; $x++): ?>
			<li><a href="<?php print Uri::create("admin/dashboard/org_index/$x"); ?>"><?php print $x;?></a></li>
			<?php endfor; ?>
			</ul>
		</div>
	</div>
</section>

<!-- Event Table Header -->
<section class="uk-margin-top
				ec-admin-container
				uk-container-center">
<div class="uk-grid" style="background-color:#eee;">
	<div class="uk-width-3-10 ec-event-table-header">
		<i class="uk-icon-group"></i> Organization
	</div>
	<div class="uk-width-2-10 
				ec-event-table-header 
				uk-text-center">
		<i class="uk-icon-star"></i> Events Organized
	</div>
	<div class="uk-width-2-10 
				ec-event-table-header
				uk-text-center">
		<i class="uk-icon-calendar-empty"></i> Events Participated
	</div>
	<div class="uk-width-3-10 ec-event-table-header">
		<i class="uk-icon-gears"></i> Controls
	</div>
</div>

<!-- Event Table Events -->
<section class="uk-margin-top
				ec-admin-container
				uk-container-center">

<?php foreach($q as $row): ?>
<div class="uk-grid ec-event uk-margin-top-remove">
	
	<div class="uk-width-3-10 ec-event-table-header">
		<?php print $row['name']; ?>
	</div>
	
	<div class="uk-width-2-10 
				ec-event-table-header 
				uk-text-center">
		<?php print count($row['event_lists']); ?>
	</div>
	
	<div class="uk-width-2-10 
				ec-event-table-header
				uk-text-center">
		2
	</div>
	
	<div class="uk-width-3-10 ec-event-table-header">
		<a href="<?php print \Fuel\Core\Uri::create("admin/dashboard/org_edit/".$row['id']);?>" 
		   class="uk-button uk-button-primary">
			<i class="uk-icon-edit"></i> Edit
		</a>
		<a href="<?php print \Fuel\Core\Uri::create("admin/dashboard/statistic/".$row['id']);?>" 
		   class="uk-button uk-button-success">
			<i class="uk-icon-gears"></i> Statistics</a>
	</div>
	
</div>
<?php endforeach; ?>
	
</section>

</section>