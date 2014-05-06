<?php print Asset::css('view/event.css'); ?>
<div class="uk-width-1-1 uk-vertical-align" id="ec-event-cover-container">
    <style>
    #ec-event-cover-container
    {
        background-image:url('<?php print $cover; ?>');
        background-repeat:no-repeat;
        background-position:center center;
        background-size:cover;
    }
    .ec-chart-container
    {
        margin-top:3em !important;
        padding:0em !important;
    }
    </style>
    <div id="ec-event-detail-event-title" class="uk-vertical-align">
        <div class="uk-vertical-align-middle" style="width:inherit;">
            <article class="uk-container uk-container-center" style="color:#fff;">
                asd
            </article>
        </div>
    </div>
    <div id="ec-event-detail-org-img-container" class="uk-vertical-align">
        <div class="uk-vertical-align-bottom" style="width:inherit;">
        <div class="uk-container uk-container-center">
        <div class="uk-grid">
            <div class="uk-width-2-10">
            <div class="uk-thumbnail ec-org-img">
                <img src="<?php print $org_img; ?>"/>
            </div>
            </div>
            
            <div class="uk-width-6-10"></div>
            <div class="uk-width-2-10"></div>
        </div>
        </div>
        </div>
    </div>
</div>
<nav class="ec-event-status uk-vertical-align">
    <div class="uk-vertical-align-middle" style="width:inherit;">
        <div class="uk-container uk-container-center">
        <div class="uk-grid">
            <div class="uk-width-2-10">&nbsp;</div>
            <div class="uk-width-6-10">b</div>
            <div class="uk-width-2-10">&nbsp;</div>
        </div>
        </div>
    </div>
</nav>

<article id="ec-event-detail">
    <div class="uk-container uk-container-center">
        <div class="uk-grid">
            <aside class="uk-width-2-10">
            <div class="uk-panel uk-panel-header ec-left-aside">
                <div class="uk-panel-title">
                <p style="font-family:'Conv_weblysleekuisb'">
                    <?php print $q['name'] ?>
                </p>
                </div>
            </div>
            </aside>
            <main class="uk-width-6-10 
                         ec-event-detail-container">
                <nav class="uk-width-1-1 ec-sub-event-menu uk-margin-top">
                    <ul>
                    <li>Menu 1</li>
                    <li>Menu 2</li>
                    </ul>
                </nav>
                
                <article class="uk-panel uk-width-1-1"
                         id="ec-event-description">
                <?php print trim($sq); ?>
                    <div class="ec-description-more">
                        <a href="#more" 
                           class="uk-button uk-button-primary"
                           title="More">
                        <i class="uk-icon-ellipsis-h"></i>
                        </a>
                    </div>
                </article>
            </main>
            <aside class="uk-width-2-10">c</aside>
        </div>
    </div>
</article>
