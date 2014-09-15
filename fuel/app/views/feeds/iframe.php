<!DOCTYPE html>
<html>
<head>
    <title>Events Chart - List of Events</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" 
          type="image/x-icon" 
          href="<?php print Uri::create('assets/img/favicon.ico'); ?>">
    <?php 
        cdn::jquery();

        cdn::uikit();
        cdn::uikit_css_addon();
        cdn::uikit_js_addon('notify.min.js');

        print Asset::css('header.css');
        print Asset::css('chart.css');
    ?>
</head>
<body>
<main id="ec-chart-content" class="uk-width-1-1">
<section class="uk-width-9-10 uk-container-center">
<div class="uk-grid uk-width-1-1 uk-margin-remove">
    
    <!-- FOR TODAY EVENTS -->
    <?php foreach($today as $row): ?>
    <a href="<?php print Uri::create('view/event/'.$row['event_id']); ?>" 
       class="uk-width-large-1-3 
              uk-width-small-1-1
              ec-chart-container"
       target="_new">
    <article class="uk-margin-bottom
                    ec-chart-active
                    ec-chart">
    <header style="background-image:url('<?php print $row['cover']; ?>');">
    </header>
    <section>
    <h1 class="uk-text-truncate uk-text-large">
        <?php print $row['title']; ?>
    </h1>
    <h2 class="uk-text-small">
       <?php print $row['start_at']; ?>
    </h2>
    </section>
    </article>
    </a>
    <?php endforeach; ?> 
    
    <!-- FOR EVENTS SOON -->
    <?php foreach($c as $row): ?>
    <a href="<?php print Uri::create('view/event/'.$row['event_id']); ?>" 
       class="uk-width-large-1-3 
              uk-width-small-1-1
              ec-chart-container"
       target="_new">
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
        <?php print $row['start_at']; ?>
    </h2>
    </section>
    </article>
    </a>
    <?php endforeach;?>
    
</div>
</section>
</main>
</body>
</html>