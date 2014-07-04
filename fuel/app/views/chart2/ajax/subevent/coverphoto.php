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
        
        <!-- EVENT TITLE PANEL -->
        <article class="uk-container uk-container-center" style="color:#fff;">
            <div class="uk-grid">
            <div class="uk-width-2-10">
                &nbsp;
            </div>
            <div class="uk-width-6-10">
                <div class="uk-grid">
                <div class="uk-width-1-10">
                    <div class="calendar">
                    <div class="uk-width-1-1 uk-text-center">
                        May
                    </div>
                    <div class="uk-width-1-1 uk-text-center">
                        <?php print Session::get('event_id','999'); ?>
                    </div>
                    </div>
                </div>
                <div class="uk-width-9-10"
                     title="<?php print $q['name']; ?>">
                    <h1 class="title uk-text-truncate">
                        <?php print $q['name']; ?>
                    </h1>
                </div>
                </div>
            </div>
            <div class="uk-width-2-10">
                &nbsp;
            </div>
        </div>
        </article>
        </div>
    </div>
    
    <!-- ORGANIZATION PHOTO -->
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