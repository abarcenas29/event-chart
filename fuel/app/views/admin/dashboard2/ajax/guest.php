<tr>
	<td><?php print $q['name']; ?></td>
	<td><?php print $q['type']; ?></td>
	<td><a href="#" 
		   class="uk-button 
				  uk-button-danger
				  ec-delete-guest"
		   data-guest-id="<?php print $q['id']; ?>">
		<i class="uk-icon-minus-circle"></i>
		</a>
	</td>
</tr>