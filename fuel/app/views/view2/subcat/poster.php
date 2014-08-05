<?php foreach ($q as $row): ?>
<a href="#ec-modal-poster"
   class="ec-modal-poster"
   data-img="<?php print Uri::create('uploads/'.$row['photo']['date'].'/flow-'.$row['photo']['filename']); ?>"
   data-uk-modal>
<img src="<?php print Uri::create('uploads/'.$row['photo']['date'].'/thumb-'.$row['photo']['filename']); ?>"
     class="uk-thumbnail uk-margin-bottom"/>
</a>
<?php endforeach; ?>

<!-- Modal -->
<div id="ec-modal-poster" class="uk-modal">
<div class="uk-modal-dialog uk-modal-dialog-frameless">
    <a href="#" class="uk-modal-close uk-close uk-close-alt"></a>
    <img src="" alt="" class="uk-width-1-1"/>
</div>
</div>

<script>
$(document).on('click','.ec-modal-poster',function(e)
{
    $('#ec-modal-poster').find('img').attr('src',$(this).data('img'));
    e.preventDefault();
});
</script>