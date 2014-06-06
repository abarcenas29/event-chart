<!-- FACEBOOK NOT LOGGED IN -->
<?php if(is_null($fb_user)): ?>
<article id="ec-fb-login" class="uk-width-1-1 uk-margin-bottom">
<main class="uk-panel">
    <section class="uk-text-center">
    <a href="<?php print Uri::base().'redirect/auth_review'; ?>" class="uk-button uk-button-primary">
        <i class="uk-icon-facebook"></i> Facebook
    </a>
    </section>
    <section class="uk-text-center uk-margin-top">
        In order to write  review, you need to login to facebook.
    </section>
</main>
</article>
<?php else:?>
<article id="ec-fb-review" class="uk-width-1-1 uk-margin-bottom">
<main class="uk-panel uk-panel-header">
    <header class="uk-panel-title">
        <i class="uk-icon-edit"></i> 
        Write a Review
        (<?php print $fb_user['name'] ?>)
    </header>
    <section>
        
    <form id="ec-fb-text" class="uk-form uk-form-horizontal">
    <div class="uk-form-row">
        <textarea placeholder="Write Your Review"
                  class="uk-width-1-1"
                  rows="5"></textarea>
    </div>
        
    <div class="uk-form-row">
        <label class="uk-form-label" style="width:25px;">
            Rating:
        </label>
        <div class="uk-form-controls">
        
        <div class="uk-float-left">
        <div class="uk-button-group" style="margin-left:-11em;">
            <a class="uk-button ec-review-rating uk-button-primary"
               data-rating="1">1</a>
            <a class="uk-button ec-review-rating"
               data-rating="2">2</a>
            <a class="uk-button ec-review-rating"
               data-rating="3">3</a>
            <a class="uk-button ec-review-rating"
               data-rating="4">4</a>
            <a class="uk-button ec-review-rating"
               data-rating="5">5</a>
        </div>
        </div>
        <div class="uk-float-right">
            <input type="hidden"
                   name="fbid"
                   value="<?php print $fb_user['id']; ?>"/>
            <input type="hidden"
                   name="rating"
                   value="1"/>
            <input type="hidden"
                   name="postFb"
                   value="1"/>
            <a class="uk-button uk-button-primary"
               id="ec-post-to-facebook">
                <i class="uk-icon-facebook"></i>
                 Post Facebook
            </a>
            <button type="submit" 
                    class="uk-button uk-button-success">
                Post Review
            </button>
        </div>
        
        </div>
    </div>
    </form>
        
    </section>
    
</main>
</article>
<script>
    $(document).ready(function(e)
    {
        $('.ec-review-rating').click(function(e)
        {
            $('.ec-review-rating').removeClass('uk-button-primary');
            $(this).addClass('uk-button-primary');
            $('input[name="rating"]').val($(this).data('rating'));
        });
        
        $('#ec-post-to-facebook').click(function(e)
        {
            if($(this).hasClass('uk-button-primary'))
            {
                $(this).removeClass('uk-button-primary');
                $('input[name="postFb"]').val('0');
            }
            else
            {
                $('input[name="postFb"]').val('1');
                $(this).addClass('uk-button-primary');
            }
        });
    });
</script>
<?php endif; ?>