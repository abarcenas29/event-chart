<?php for($x = 0; $x < 10; $x++): ?>
<br>
<article class="ec-fb-review-feed" 
         class="uk-width-1-1 uk-margin-top"
         id="ec-review-feed-<?php print $x; ?>">
    <main class="uk-panel uk-panel-header">
    <header class="uk-panel-title">
        <img src="http://placehold.it/50x50"/>
        Name of User
        <div class="uk-float-right uk-text-large">
            4
        </div>
    </header>
    <section>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </section>
    <footer class="uk-margin-top">
    <div class="uk-button-group uk-float-right">
        <a class="uk-button ec-review-edit" 
           href="#ec-fb-review" 
           data-uk-smooth-scroll="{offset:90}"
           data-rate="4"
           data-id="<?php print $x; ?>">
            <i class="uk-icon-edit"></i>
        </a>
        <a class="uk-button uk-button-danger">
            <i class="uk-icon-trash-o"></i>
        </a>
    </div>
    </footer>
    </main>
</article>
<?php endfor; ?>
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