<article class="uk-width-1-1
		ec-chart-container">
	<section class="uk-grid">
	</section>
</article>
<script>
var region      = "<?php print Cookie::get('region','ncr'); ?>";
var urlChart    = "<?php print Uri::create('ajax/chart/init');?>";
var $result     = $('.ec-chart-container')
$(document).ready(function(e)
{
    var data = {region:region};
    $.post(urlChart,data,function(d){$result.find('.uk-grid').html(d);});
});
</script>