<?php print \Fuel\Core\Asset::js('jquery.form.min.js'); ?>
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
	
	<div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
		<button class="uk-button" type="submit">
			<?php print $row['status']; ?> 
			<i class="uk-icon-caret-down"></i>
		</button>
		<div class="uk-dropdown">
		<ul class="uk-nav uk-nav-dropdown">
		
		<li>
		<a href="<?php print Uri::create('admin/dashboard/event_live/'.$row['id']) ?>">
			Live
		</a>
		</li>
		
		<li>
		<a href="<?php print Uri::create('admin/dashboard/event_Pending/'.$row['id']) ?>">
			Pending
		</a>
		</li>
		
		<li>
		<a href="<?php print Uri::create('admin/dashboard/event_cancel/'.$row['id']) ?>">
			Canceled
		</a>
		</li>
		</ul>
		</div>
	</div>
	
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
		
	<button class="uk-button uk-button-primary" 
			data-uk-modal="{target:'#ec-share-update'}">
		<i class="uk-icon-globe"></i>
		 Share Update
	</button>
	</div>
</div>
<?php endforeach; ?>
</section>

<!-- Share Modal -->
<article id="ec-share-update" class="uk-modal">
<div class="uk-modal-dialog uk-modal-dialog-slide">
<form 
	action="<?php print Uri::create('api/admin/event/share_event.json'); ?>"
	method="POST"
	id="ec-form-share"
	class="uk-form uk-form-horizontal">
	<legend>
		Share Update 
		<span id="ec-share-msg" style="display:none">(Sent!)</span> 
	</legend>
	<div class="uk-form-row">
	<textarea name="content"
			  class="uk-width-1-1"
			  rows="5"></textarea>
	<input type="hidden" name="event_id" value="<?php print $row['id']; ?>"/>
	</div>
	<div class="uk-form-row">	
	<div class="uk-form-controls">
		<button type="submit" 
				class="uk-button uk-button-primary">
			Post Update
		</button>
	</div>
	</div>
</form>
</div>
</article>

<!-- Delete Modal -->
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
var $shareMsg = $('#ec-share-msg');
$(document).ready(function()
{
	$('.ec-delete-button').click(function()
	{
		var url = $(this).data('url');
		$('#ec-delete-button').attr('href',url);
	});
	$('#ec-form-share').ajaxForm({
		success:function(d)
		{
			console.log(d);
			$shareMsg.show();
			setTimeout(function(){$shareMsg.hide()},2000);
		}
	});
});
</script>
