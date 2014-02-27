<tr>
	<td><?php print 'Php'.$q['price']; ?></td>
	<td><?php print $q['note']; ?></td>
	<td><a href="#" 
		   class="uk-button 
				  uk-button-danger
				  ec-delete-ticket"
		   data-ticket-id="<?php print $q['id']; ?>">
		<i class="uk-icon-minus-circle"></i>
		</a>
	</td>
</tr>