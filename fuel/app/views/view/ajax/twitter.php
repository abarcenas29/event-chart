<?php print Asset::js('jquery.wookmark.min.js'); ?>
<?php print Asset::js('jquery.imageloaded.js'); ?>
<section class="uk-width-1-1 
				uk-margin-top"
		 style="position:relative;"
		 id="ec-twitter-canvas">
<ul id="ec-twitter" style="padding:0;margin:0;">
<?php foreach(array_reverse($rsp) as $row): ?>
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
			 class="ec-twitter-text"
			 data-url="<?php print (!is_null($row['url']))?$row['url']:''; ?>">
	<?php print $row['caption']; ?>
	</section>
	</article>
</li>
<?php endforeach; ?>
</ul>
</section>

<section class="uk-width-1-1 
				uk-margin-top
				uk-text-center
				uk-margin-bottom">
	<a href="#" 
	   class="uk-button uk-button-primary"
	   id="ec-twitter-pagination">
		<i class="uk-icon-arrow-down"></i>
		More Photos
	</a>
</section>

<script>
var page			= 0;
var urlPagination	= "<?php print Uri::create('ajax/view/page_twitter'); ?>";
var $pagination		= $('#ec-twitter-pagination');
var $handler		= null;

var opt = {
			itemWidth: 400,
			autoResize:true,
			offset:2,
			container:$('#ec-twitter-canvas')
		  };

function convertHTMLTextLink()
{
	var exp = /(\b(https?|ftp|file):\/\/[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
	
	$('.ec-twitter-text').each(function(i)
	{
		var url  = $(this).data('url');
		var text = $(this).html().replace(exp,"<a href='"+ url +"' target='_new'>$1</a>");
		$('.ec-twitter-text').eq(i).html(text);
	});
}

function initWookmark()
{
	$('#ec-twitter li').imagesLoaded().always(function()
	{
		$handler = $('#ec-twitter li');
		$handler.wookmark(opt);
		
		convertHTMLTextLink();
	});
}

function applyWookmark()
{
	$('#ec-twitter li').imagesLoaded().always(function()
	{
		$handler = $('#ec-twitter li');
		$handler.wookmark(opt);
		
		if ($handler.wookmarkInstance) 
		{
			$handler.wookmarkInstance.clear();
		}
		
		handler = $('#ec-twitter li');
        handler.wookmark(options);
	});
}

$(document).ready(function(){
	initWookmark();
	$pagination.click(function(e)
	{
		page = page + 1;

		var $page = $(this);
		$page.hide();
		$.post(urlPagination,{event_id:eventId,page:page},function(d)
		{
			console.log(d.length);
			if(d.length !== 0)
			{
				$('#ec-twitter').append(d);
				$page.show();
			}
			applyWookmark();
			convertHTMLTextLink();
		});
		e.preventDefault();
	});
});
</script>