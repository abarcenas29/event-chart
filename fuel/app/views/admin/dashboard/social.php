<section class="uk-margin-top
		 ec-admin-container
		 uk-container-center">
<?php foreach($content['data'] as $row): ?>
<pre>
<?php print_r($row); ?>
</pre>
<?php endforeach;?>
	
<pre>
<?php 
	print_r($content);
?>
</pre>
</section>