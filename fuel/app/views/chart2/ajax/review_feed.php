<?php foreach($q as $row): ?>
<?php if(!empty($row['content'])):?>
<article class="ec-fb-review-feed uk-width-1-1 uk-margin-top"
         id="ec-review-feed-<?php print $row['id']; ?>">
    <main class="uk-panel uk-panel-header">
    <header class="uk-panel-title">
        <img src="<?php print 'https://graph.facebook.com/'. $row['fb_id'] .'/picture?&height=50&type=square&width=50' ?>"/>
        <?php print json_decode(file_get_contents('http://graph.facebook.com/'.$row['fb_id']))->name; ?>
        <div class="uk-float-right uk-text-large">
        <?php print $row['rating']; ?>
        </div>
    </header>
    <section>
    <?php print $row['content']; ?>
    </section>
    <footer class="uk-margin-top">
    <?php if(!is_null($user_fb) && $user_fb == $row['fb_id']): ?>    
    <div class="uk-button-group uk-float-right">
        <a class="uk-button ec-review-edit" 
           href="#ec-fb-review" 
           data-uk-smooth-scroll="{offset:90}"
           data-rate="4"
           data-id="<?php print $row['id']; ?>">
            <i class="uk-icon-edit"></i>
        </a>
        <a class="uk-button uk-button-danger">
            <i class="uk-icon-trash-o"></i>
        </a>
    </div>
    <?php endif; ?>
    </footer>
    </main>
</article>
<?php endif; ?>
<?php endforeach; ?>
<script>
$(document).ready(function(e)
{
    $('.ec-review-edit').click(function(e)
    {
        var content = $(this).parentsUntil('article').find('section').text();
        var rate    = $(this).data('rate');
        var $editor= $($(this).attr('href'));
        var id      = $(this).data('id');
        
        $editor.find('textarea').val(content.trim());
        $editor.find('.ec-review-rating').removeClass('uk-button-primary');
        $editor.find('a[data-rating="'+ rate +'"]').addClass('uk-button-primary');
        $editor.find('input[name="rating"]').val(rate);
        $editor.find('#ec-review-smooth-scroll').attr('href','#ec-review-feed-'+id);
        $editor.find('input[name="edit-id"]').val(id);
    });
});
</script>