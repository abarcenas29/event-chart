<!-- Event Table Main Controls -->
<section class="uk-margin-top
				ec-admin-container
				uk-container-center">
	<div class="uk-grid">
		<div class="uk-width-1-2">
		<a href="<?php print \Fuel\Core\Uri::create('admin/dashboard/event_add') ?>" 
		   class="uk-button uk-button-primary">
			<i class="uk-icon-plus-sign"></i> Add Event
		</a>
		</div>
		<div class="uk-width-1-2">
		<ul class="uk-pagination">
		<?php for($x = 1; $x <= $pages; $x++): ?>
		<li>
		<a href="<?php print \Fuel\Core\Uri::create("admin/dashboard/index/$x"); ?>">
			<?php print $x;?>
		</a>
		</li>
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
		<i class="uk-icon-calendar"></i> Events
	</div>
	<div class="uk-width-1-10 ec-event-table-header">
		<i class="uk-icon-calendar-empty"></i> Start Date
	</div>
	<div class="uk-width-1-10 ec-event-table-header">
		<i class="uk-icon-calendar-empty"></i> End Date
	</div>
	<div class="uk-width-4-10 ec-event-table-header">
		<i class="uk-icon-gears"></i> Controls
	</div>
</div>
</section>

<!-- Event Table Events -->
<section class="uk-margin-top
				ec-admin-container
				uk-container-center">

<?php foreach($q as $row): ?>
<div class="uk-grid ec-event uk-margin-top-remove">
	<div class="uk-width-4-10 ec-event-table-header">
		<?php print $row['name']; ?>
	</div>
	<div class="uk-width-1-10 ec-event-table-header">
		<?php print $row['start_at']; ?>
	</div>
	<div class="uk-width-1-10 ec-event-table-header">
		<?php print $row['end_at']; ?>
	</div>
	<div class="uk-width-4-10 ec-event-table-header">
	<?php if($row['private']): ?>
	<a href="<?php print \Fuel\Core\Uri::create('admin/dashboard/event_visibility/'.$row['id']); ?>" 
	   class="uk-button">
	<i class="uk-icon-eye-close"></i>
		Private
	</a>
	<?php else:?>
	<a href="<?php print \Fuel\Core\Uri::create('admin/dashboard/event_visibility/'.$row['id']); ?>" 
	   class="uk-button uk-button-primary">
	<i class="uk-icon-eye-open"></i>	
		Public
	</a>
	<?php endif;?>
	<a href="<?php print \Fuel\Core\Uri::create('admin/dashboard/event_manage/'.$row['id']); ?>" 
	   class="uk-button uk-button-success">
	<i class="uk-icon-pencil"></i>
		Manage
	</a>
	<button class="uk-button 
				   uk-button-danger
				   ec-delete-button"
			data-url="<?php print \Fuel\Core\Uri::create('admin/dashboard/event_delete/'.$row['id']); ?>"
			data-uk-modal="{target:'#ec-modal-delete'}">
	<i class="uk-icon-trash"></i>
		Delete
	</button>
	</div>
</div>
<?php endforeach; ?>
</section>

<article id="ec-modal-delete" class="uk-modal">
<div class="uk-modal-dialog uk-modal-dialog-slide">
<section class="uk-panel">
<header class="uk-panel-header">
<h1 class="uk-panel-title">
	<i class="uk-icon-warning-sign"></i>
	Woah There!
</h1>
<section>
	You are about to do something irreversible. By deleting the event, you will also be deleting anything related to it.
	Are you sure you want to do this?
</section>
<section class="uk-margin-top uk-text-center">
	<a href="" class="uk-button uk-button-danger" id="ec-delete-button">
		<i class="uk-icon-trash"></i>
		Yeah! I am doing this.
	</a>
</section>
</header>
</section>
</div>
</article>
<script>
$(document).ready(function()
{
	$('.ec-delete-button').click(function()
	{
		var url = $(this).data('url');
		$('#ec-delete-button').attr('href',url);
	});
});
</script>
