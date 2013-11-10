<div class="uk-width-1-1 uk-margin-top">
<div class="uk-grid">
	<div class="uk-width-3-10 ec-event-table-header">
		PHP <?php print $args['price']; ?>
	</div>
	<div class="uk-width-6-10 ec-event-table-header">
		<?php print $args['note']; ?>
	</div>
	<div class="uk-width-1-10 ec-event-table-header">
		<div class="uk-button-group">
			<a href="#"
			   data-ticket-id="<?php print $args['ticket_id'] ?>"
			   class="uk-button 
					  uk-button-danger
					  ec-delete-ticket">
			<i class="uk-icon-minus"></i>
		</a>
		</div>
	</div>
</div>
</div>
