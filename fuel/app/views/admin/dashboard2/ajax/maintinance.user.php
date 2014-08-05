<?php foreach($q as $row): ?>
	<?php if(Session::get('user_id') != $row['id']): ?>
		<div class="uk-width-1-2 ec-user-<?php print $row['id']; ?>">
		<?php print $row['email']; ?>
		</div>
		<div class="uk-width-1-2 ec-user-<?php print $row['id']; ?>">
		<a href="<?php print Uri::create('api/admin/maintinance/del_user.json'); ?>"
		   class="uk-button uk-button-danger ec-delete-user"
		   data-id="<?php print $row['id'] ?>">
			<i class="uk-icon-minus"></i>
		</a>
		</div>
	<?php endif; ?>
	<?php endforeach;?>