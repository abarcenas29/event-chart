<?php print Asset::css('chart.css'); ?>
<main id="ec-chart-content" class="uk-width-1-1">
<section class="uk-width-9-10 uk-container-center">
<div class="uk-grid uk-width-1-1 uk-margin-remove">
    
    <?php foreach($c as $row): ?>
    <a href="<?php print Uri::create('view/event/'.$row['event_id']); ?>" 
       class="uk-width-large-1-3 
              uk-width-small-1-1
              ec-chart-container">
    <article class="uk-margin-bottom
                    ec-chart-<?php print $row['event_id']; ?>
                    ec-chart">
    <header style="background-image:url('<?php print $row['cover']; ?>');">
    </header>
    <section>
    <h1 class="uk-text-truncate uk-text-large">
        <?php print $row['title']; ?>
    </h1>
    <h2 class="uk-text-small">
        <span class="fa fa-calendar"></span> &nbsp; <?php print $row['start_at']; ?>
    </h2>
    </section>
    </article>
    </a>
    <?php endforeach;?>
    
</div>
</section>
</main>

<!-- City Filter -->
<aside id="ec-filter-toolbar">
<section>
<ul>
    <li>
    <a href="#ec-filter-city" data-uk-modal>
    <i class="fa fa-building"></i>
    </a>
    </li>
</ul>
</section>
</aside>

<!-- FILTER BY CITY -->
<div id="ec-filter-city" class="uk-modal">
    <article class="uk-modal-dialog uk-panel">
    <a class="uk-modal-close uk-close"></a>
    <header class="uk-panel-title uk-text-bold">
        Filter By City <?php print "(Current: $city)"; ?>
    </header>
    <section>
        <form type="GET" 
              class="uk-form uk-form-horizontal"
              action="<?php print Uri::base(); ?>">
        <div class="uk-form-row">
            <label class="uk-form-label">
                City
            </label>
            <div class="uk-form-controls">
                <select name="city">
                <option value="all">All Region</option>
                <?php foreach($area as $row): ?>
                <option value="<?php print $row['major_area']; ?>">
                    <?php print $row['major_area'] ?>
                </option>
                <?php endforeach; ?>
                </select>
                <button type="submit" class="uk-button">
                    <i class="fa fa-refresh"></i>
                </button>
            </div>
        </div>
        </form>
    </section>
    </article>
</div>

<script>
    var eventsToday     = '<?php print json_encode($today); ?>';
    var parseEventToday = $.parseJSON(eventsToday);
    
    for(i = 0;i < parseEventToday.length;i++){
        $('.ec-chart-'+parseEventToday[i]).addClass('ec-chart-active');
    }
    
    if(parseEventToday.length > 0){
        $.UIkit.notify("There are " + parseEventToday.length + " event(s) happening right now", {status:'danger'});
    }
   
    console.log(parseEventToday[0]);
</script>