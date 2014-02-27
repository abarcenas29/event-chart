<?php print Asset::css('admin/dashboard.event.2.css'); ?>
<article class="uk-width-1-1 uk-margin-top">
	<ul class="uk-pagination">
	<?php for($x = 1;$x <= $total_page;$x++): ?>
		<li>
		<a href="<?php print \Fuel\Core\Uri::create("admin/dashboard2/index/$x"); ?>">
			<?php print $x;?>
		</a>
		</li>
	<?php endfor;?>
	</ul>
</article>
<article class="uk-width-1-1" id="ec-event-container">
<section class="uk-grid">
	
<?php foreach($q as $row): ?>
	<div class="uk-width-large-1-3 uk-margin-top">
	<div class="uk-panel uk-panel-box ec-event-card uk-panel-header">
		<h1 class="uk-panel-title uk-text-truncate" title="<?php print $row['name']; ?>">
			<?php print $row['name']; ?>
		</h1>
	<div class="uk-width-1-1">
		<div class="uk-grid">
		<div class="uk-width-large-1-3">
		<?php if(!is_null($row['photo'])): ?>
		<img src="<?php print Uri::create('uploads/'.$row['photo']['date'].'/thumb-'.$row['photo']['filename']); ?>"
			 class="uk-width-1-1"/>
		<?php else: ?>
		<img src="http://placehold.it/290x290"
			 class="uk-width-1-1"/>
		<?php endif;?>
		</div>
		<div class="uk-width-large-2-3">
			<i><?php print $row['start_at'].' - '.$row['end_at']; ?></i>
			<p class="uk-margin-remove uk-text-truncate" 
			   title="<?php print $row['organization']['name']; ?>">
			<?php print $row['organization']['name']; ?>
			</p>
			
			
			<div class="uk-button-dropdown" data-uk-dropdown>
				<button class="uk-button uk-button-primary uk-button-small">
					<?php print $row['status'] ?>
					<i class="uk-icon-caret-down"></i>
				</button>
				<div class="uk-dropdown uk-dropdown-small">
				<ul class="uk-nav uk-nav-dropdown">
					
				<li>
				<a href="<?php print Uri::create('admin/dashboard2/event_live/'.$row['id']); ?>">
					Live
				</a>
				</li>
				
				<li>
				<a href="<?php print Uri::create('admin/dashboard2/event_Pending/'.$row['id']); ?>">
					Pending
				</a>
				</li>
				
				<li>
				<a href="<?php print Uri::create('admin/dashboard2/event_cancel/'.$row['id']) ?>">
					Canceled
				</a>
				</li>
				
				</ul>
				</div>
			</div>
				
			<a class="uk-button 
					  uk-button-small 
					  uk-button-success"
				  href="<?php print \Fuel\Core\Uri::create('admin/dashboard2/event_manage/'.$row['id']); ?>">
				<i class="uk-icon-gear"></i>
				MANAGE
			</a>
				
			<button class="uk-button 
						   uk-button-small 
						   uk-button-danger
						   ec-delete-button"
					data-url="<?php print \Fuel\Core\Uri::create('admin/dashboard2/event_delete/'.$row['id']); ?>"
					data-uk-modal="{target:'#ec-modal-delete'}">
				<i class="uk-icon-trash-o"></i>
			</button>
	
		</div>
		</div>
	</div>
	</div>
	</div>
<?php endforeach; ?>
	
</section>
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
$(document).ready(function()
{
	$('.ec-delete-button').click(function()
	{
		var url = $(this).data('url');
		$('#ec-delete-button').attr('href',url);
	});
});
</script>