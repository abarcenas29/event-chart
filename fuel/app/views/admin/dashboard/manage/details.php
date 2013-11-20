<section class="uk-margin-top
			ec-admin-container
			uk-container-center">
<div class="uk-grid">
<div class="uk-width-1-2">
<form action="<?php print $ticket_action; ?>"
	  method="post"
	  class="uk-form 
			 uk-form-horizontal"
	  id="ec-form-ticket">
<legend>
	<i class="uk-icon-ticket"></i>
	Ticket Information
</legend>
	
<div class="uk-form-row">
<label class="uk-form-label">
	Ticket Price
</label>
<div class="uk-form-controls">
	<input name="price"
		   class="uk-width-1-1"
		   type="text"/>
</div>
</div>
	
<div class="uk-form-row">
	<label class="uk-form-label">
		Ticket Information
	</label>
	<div class="uk-form-controls">
		<input name="note"
			   type="text"
			   class="uk-width-1-1"/>
	</div>
</div>
	
<div class="uk-form-row">
<div class="uk-form-controls uk-float-right">
	<button class="uk-button uk-button-success ec-submit">
	<i class="uk-icon-save"></i>
	Save Ticket
	</button>
</div>
</div>
	
</form>

<!-- PRICE TABLE -->
<div class="uk-width-1-1 uk-margin-top">
<div class="uk-grid">
	<div class="uk-width-3-10 ec-event-table-header">
		<i class="uk-icon-calendar"></i> Price
	</div>
	<div class="uk-width-6-10 ec-event-table-header">
		<i class="uk-icon-info-sign"></i> Note
	</div>
	<div class="uk-width-1-10 ec-event-table-header">
		
	</div>
</div>
</div>

<div id="ec-price-table">
<?php foreach($q['ticket'] as $row): ?>
<div class="uk-width-1-1 uk-margin-top">
<div class="uk-grid">
	<div class="uk-width-3-10 ec-event-table-header">
		PHP <?php print $row['price']; ?>
	</div>
	<div class="uk-width-6-10 ec-event-table-header">
		<?php  print $row['note']; ?>
	</div>
	<div class="uk-width-1-10 ec-event-table-header">
		<div class="uk-button-group">
			<a href="#"
			   data-ticket-id="<?php print $row['id']; ?>"
			   class="uk-button 
					  uk-button-danger
					  ec-delete-ticket">
			<i class="uk-icon-minus"></i>
			</a>
		</div>
	</div>
</div>
</div>
<?php endforeach; ?>
</div>
	
</div>
	
<div class="uk-width-1-2">
<div class="uk-width-1-1 uk-margin-top">
<div class="uk-grid">

<div class="uk-width-1-1">
<form action="<?php print $guest_action; ?>"
	  method="post"
	  id="ec-form-guest"
	  class="uk-form 
			 uk-form-horizontal">
<legend>
	<i class="uk-icon-user"></i>
	Event Guests
</legend>
<div class="uk-form-row">
	<label class="uk-form-label">
		Guest
	</label>
	<div class="uk-form-controls">
		<input type="text"
			   class="uk-width-1-1"
			   name="name"
			   />
	</div>
</div>
<div class="uk-form-row">
	<label class="uk-form-label">
		Type
	</label>
	<div class="uk-form-controls">
	<select name="type">
	<?php foreach($g_type as $row): ?>
	<option value="<?php print $row; ?>">
		<?php print $row; ?>
	</option>
	<?php endforeach;?>
	</select>
	</div>
</div>
<div class="uk-form-row">
<div class="uk-form-controls uk-float-right">
	<button type="submit" 
			class="uk-button uk-button-success ec-submit">
	<i class="uk-icon-save"></i>
	 Save Guest	
	</button>
</div>
</div>
</form>
</div>
	
<div class="uk-width-1-1 uk-margin-top">
<div class="uk-grid">
<div class="uk-width-6-10">
	<i class="uk-icon-user"></i>
	Guest Name
</div>
<div class="uk-width-3-10">
	<i class="uk-icon-tags"></i>
	Type
</div>
<div class="uk-width-1-10">
	<i class="uk-icon-trash"></i>
</div>
</div>
</div>



<div class="uk-width-1-1 uk-margin-top">
<div id="ec-guest-table">
<?php foreach($q['guest'] as $row): ?>	
<div class="uk-grid">
<div class="uk-width-6-10">
	<?php print $row['name']; ?>
</div>
<div class="uk-width-3-10">
	<?php print $row['type']; ?>
</div>
<div class="uk-width-1-10">
	<a href="#"
	   class="uk-button 
			  uk-button-danger 
			  ec-guest-del"
	   data-guest-id="<?php print $row['id']; ?>">
	<i class="uk-icon-minus"></i>
	</a>
</div>
</div>
<?php endforeach; ?>
</div>
</div>
	

	
</div>
</div>
</div>
</div>
</section>