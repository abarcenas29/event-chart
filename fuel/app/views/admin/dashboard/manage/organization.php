<section class="uk-margin-top
			ec-admin-container
			uk-container-center">
<form action="api-site"
	  method="post"
	  class="uk-form 
			 uk-form-horizontal">
<legend>
	<i class="uk-icon-list"></i>
	Event Organization
</legend>
<div class="uk-form-row">

<div id="ec-org-tags">
<?php foreach($orgs as $row): ?>
<?php foreach($q['sub_org'] as $org):
		if($row['name'] == $org['org']['name']):?>
		<a href="#"
		   data-org-id="<?php print $row['id']; ?>"
		   data-eorg-id="<?php print $org['id']?>"
		   class="uk-button 
				  uk-margin-bottom
				  uk-button-primary
				  ec-org-tag">
			 <?php print $row['name']; ?>
		 </a>
<?php break;endif;
	  endforeach;?>
	  <?php if(isset($org)): ?>
	  <?php if($org['org']['name'] !== $row['name']): ?>
	  <a href="#"
		 data-org-id="<?php print $row['id']; ?>"
		 data-eorg-id="0"
		 class="uk-button 
				uk-margin-bottom
				ec-org-tag">
		 <?php print $row['name']; ?>
	  </a>
	  <?php endif; ?>
	  <?php else: ?>
	  <a href="#"
		 data-org-id="<?php print $row['id']; ?>"
		 data-eorg-id="0"
		 class="uk-button 
				uk-margin-bottom
				ec-org-tag">
		 <?php print $row['name']; ?>
	  </a>
	  <?php endif; ?>
<?php endforeach;?>
</div>

</div>
</form>
</section>