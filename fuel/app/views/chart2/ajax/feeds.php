<?php foreach($q['data'] as $row): ?>
<article class="uk-width-1-1 ec-fb-feed uk-margin-bottom" 
         data-fb="<?php print $row['from']['id']; ?>">
<section id="feed-header" class="uk-width-1-1 uk-margin-bottom">
<img class="uk-float-left" 
     src="http://graph.facebook.com/<?php print $row['from']['id'] ?>/picture"/>
<div class="uk-float-left uk-margin-left">
    <h2><?php print $row['from']['name']; ?></h2>
    <?php 
        $date = new DateTime($row['created_time'],new DateTimeZone('Asia/Manila'));
    ?>
    <p>Date and Time</p>
</div>
</section>
<section id="message" class="uk-margin-top">
    <div class="uk-width-1-1">
        <?php print $row['message']; ?>
        
        <?php if(isset($row['comments'])):?>
        <?php foreach($row['comments']['data'] as $comment): ?>
        <article class="uk-panel uk-panel-box feed-comments">
        <section class="uk-grid">
            <div class="uk-width-2-10">
                <img class="uk-float-left" 
                     src="http://graph.facebook.com/<?php print $comment['from']['id'] ?>/picture"/>
            </div>
            <div class="uk-width-8-10" style="padding-left:0em;">
                <a href="#" class="uk-text-bold">
                    <?php print $comment['from']['name']; ?>
                </a>
                <?php print $comment['message']; ?>
            </div>
        </section>
        </article>
        <?php endforeach;?>
        <?php endif; ?>
        
    </div>
</section>
</article>
<?php endforeach; ?>