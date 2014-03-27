<article class="uk-width-1-1
		ec-chart-container">
        <div style="padding:1em;">
	<section class="uk-grid">
	</section>
        </div>
</article>
<script>
var region      = "<?php print Cookie::get('region','ncr'); ?>";
var menu        = 'normal';
var urlChart    = "<?php print Uri::create('ajax/chart/init');?>";
var $result     = $('.ec-chart-container');
$(document).ready(function(e)
{
    var data = {region:region,type:menu};
    $.post(urlChart,data,function(d){$result.find('.uk-grid').html(d);});
});
</script>
<?php 
    print Asset::js('chart/jquery.filter.region.js');
    print Asset::js('chart/jquery.menu.js');
?>