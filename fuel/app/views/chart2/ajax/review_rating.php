<article class="ec-fb-review-ratings-only 
                uk-margin-bottom">
    <main class="uk-panel uk-panel-header">
    <header class="uk-panel-title">
        People Who Rated The Event
    </header>
    <section>
    <?php foreach($q as $row): ?>
        <?php if(empty($row['content'])): ?>
        <img src="<?php print 'https://graph.facebook.com/'. $row['fb_id'] .'/picture?&height=50&type=square&width=50' ?>"
             data-uk-tooltip
             title="<?php print json_decode(file_get_contents('http://graph.facebook.com/'.$row['fb_id']))->name; ?>"
             />
        <?php else: ?>
        <script>
        $('.ec-fb-review-ratings-only').hide();
        </script>
        <?php endif; ?>
    <?php endforeach;?>
    </section>
    </main>
</article>
<!-- display the Rating average -->
<script>
    var urlRating = "<?php print Uri::create('api/chart/rating_avg.json'); ?>";
    $(document).ready(function(e){
        $.post(urlRating,function(d){
            $('#ec-average-rating').html(d.data+'/5');
        })
    });
</script>