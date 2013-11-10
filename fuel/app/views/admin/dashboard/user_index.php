<!-- Event Table Main Controls -->
<section class="uk-margin-top
				ec-admin-container
				uk-container-center">
	<div class="uk-grid">
		<div class="uk-width-1-2">
		<a href="<?php print \Fuel\Core\Uri::create('admin/dashboard/user_add') ?>" 
		   class="uk-button uk-button-primary">
			<i class="uk-icon-plus-sign"></i> Add User
		</a>
		</div>
		<div class="uk-width-1-2">
			<ul class="uk-pagination">
			<?php for($x = 1; $x <= 10; $x++): ?>
			<li><a href="#"><?php print $x;?></a></li>
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
	<div class="uk-width-4-10 ec-event-table-header">
		<i class="uk-icon-user"></i> User
	</div>
	<div class="uk-width-1-10 ec-event-table-header">
		<i class="uk-icon-star"></i> Type
	</div>
	<div class="uk-width-2-10 ec-event-table-header">
		<i class="uk-icon-calendar-empty"></i> Created By
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
	<div class="uk-width-4-10 ec-event-table-header">
		<?php print $row['username'] ?>
	</div>
	<div class="uk-width-1-10 ec-event-table-header">
		<?php print $row['type'] ?>
	</div>
	<div class="uk-width-2-10 ec-event-table-header">
		<?php print $row['created_at']; ?>
	</div>
	<div class="uk-width-3-10 ec-event-table-header">
		<a href="<?php print \Fuel\Core\Uri::create('admin/dashboard/user_delete/'.$row['id']); ?>" 
		   class="uk-button uk-button-danger">Delete</a>
	</div>
</div>
<?php endforeach; ?>
</section>

</section>