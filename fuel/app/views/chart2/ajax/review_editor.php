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
        
    <form id="ec-form-review" 
          class="uk-form uk-form-horizontal"
          action="<?php print Uri::create('api/chart/review.json'); ?>"
          method="post">
    <div class="uk-form-row">
        <textarea placeholder="Write Your Review"
                  name="content"
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
                   name="edit-id"
                   value=""/>
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
                    class="uk-button 
                           uk-button-success">
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
        var $form = $('#ec-form-review');
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
        
        $('#ec-form-review').ajaxForm({
            beforeSubmit:function(arr, $form, options)
            {
                $form.find('button[type="submit"]').attr('disabled','');
                $.UIkit.notify('Sending Data ...',{status:'info'});
            },
            success:function(d)
            {
                var $reviewFeed     = $('#ec-detail-review-feed');
                var $reviewRating   = $('#ec-detail-review-rating');
                var loadingHTML     = '<div class="uk-text-center"><i class="uk-icon-refresh uk-icon-spin"></i> Updating Data</div>';
                
                if(d.success)
                {
                    $.UIkit.notify('Review Registered',{status:'success'});
                }
                else
                {
                    $.UIkit.notify('Review Not Registered',{status:'danger'});
                }
                
                $('#ec-review-smooth-scroll').trigger('click');
                $form.find('input[name="edit-id"]').val('');
                $form.find('.ec-review-rating').removeClass('uk-button-primary');
                $form.find('.ec-review-rating').eq(0).addClass('uk-button-primary');
                $form.find('button[type="submit"]').removeAttr('disabled');
                
                $reviewFeed.html(loadingHTML);
                $reviewRating.html(loadingHTML);
                
                $.post(urlReviewFeed,function(d){
                    $reviewFeed.html(d);
                });
                
                $.post(urlReviewRating,function(d){
                    $reviewRating.html(d);
                });
            },
            clearForm: true,
        });
    });
</script>
<?php endif; ?>