<div id="ec-pagination">
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
</div>

<div class="uk-width-1-1 uk-text-center uk-margin-bottom">
    <a href="<?php print Uri::create('ajax/view/event_instagram_pagination'); ?>" 
       class="uk-button uk-button-primary ec-pagination">
       More Photos
    </a>
</div>

<!-- Modal -->
<div id="ec-modal-instagram" class="uk-modal">
<div class="uk-modal-dialog">
    <a href="#" class="uk-modal-close uk-close uk-close-alt"></a>
    <div class="uk-panel uk-panel-header">
        <div class="uk-panel-title"></div>
        <img src="" alt="" class="uk-width-1-1"/>
    </div>
</div>
</div>

<script>
var page = 2;
$(document).on('click','.ec-pagination',function(e){
    var $page   = $(this);
    var url     = $page.attr('href');
    
    $.post(url,{page:page},function(d){
        if(d === '')
        {
            $page.parent().remove();
        }
        else
        {
            $('#ec-pagination').append(d);
            page++;
        }
    });
    e.preventDefault();
});
$(document).on('click','.ec-modal-instagram',function(e){
    var $instagram = $('#ec-modal-instagram');
    $instagram.find('img').attr('src',$(this).data('img'));
    $instagram.find('.uk-panel-title')
              .html('<i class="uk-icon-instagram"></i> '+$(this).data('user'));
    e.preventDefault();
});
</script>