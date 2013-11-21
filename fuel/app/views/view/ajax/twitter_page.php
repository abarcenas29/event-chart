<?php foreach($rsp as $row): ?>
<li style="list-style-type:none;">
	<article class="uk-panel uk-panel-box uk-panel-box-primary">
	<header class="uk-panel-title">
	<div class="uk-grid data-uk-grid-match">
	<div class="uk-width-3-10">
	<img src="<?php print $row['user_img']; ?>"/>
	</div>
	<div class="uk-width-7-10 uk-vertical-align" style="height:73px;">
		<p class="uk-vertical-align-middle">
		<?php print $row['username'] ?>
		</p>
	</div>
	</div>
	</header>
	<?php if(!is_null($row['media'])): ?>
	<section style="width:350px" class="uk-margin-bottom">
	<div class="uk-thumbnail">
	<img src="<?php print $row['media'] ;?>"/>
	</div>
	</section>
	<?php endif;?>
	<section style="width:350px;"
			 data-url="<?php print (!is_null($row['url']))?$row['url']:''; ?>"
			 class="ec-twitter-text">
	<?php print $row['caption']; ?>
	</section>
	</article>
</li>
<?php endforeach; ?>
<script>
$(document).ready(function(){
	convertHTMLTextLink();
});
</script>