<?php foreach ($q as $row): ?>
<a href="#ec-modal-instagram"
   class="ec-modal-instagram"
   data-img="<?php print $row['img_large']; ?>"
   data-user="<?php print $row['username']; ?>"
   data-caption="<?php print $row['caption']; ?>"
   data-uk-modal>
<img src="<?php print $row['img_thumb']; ?>"
     class="uk-thumbnail uk-margin-bottom"/>
</a>
<?php endforeach; ?>