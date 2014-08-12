<div class="uk-modal" id="ec-poster-modal">
    <article class="uk-panel 
                    uk-panel-header 
                    uk-modal-dialog 
                    uk-modal-dialog-large">
        <a class="uk-modal-close uk-close"></a>
        <header class="uk-panel-title">
            <h1><i class="fa fa-image"></i> Event Images</h1>
        </header>
        <section class="uk-width-1-1 uk-grid uk-margin-remove uk-overflow-container"
                 id="ec-poster-modal">
            <?php foreach($q['poster'] as $row): ?>
            <div class="uk-width-1-4 uk-margin-bottom">
                <a href="<?php print Uri::create('uploads/'.$row['photo']['date'].'/'.$row['photo']['filename']); ?>" 
                   target="_new">
                    <img 
                        class="uk-thumbnail"
                        src="<?php print Uri::create('uploads/'.$row['photo']['date'].'/thumb-'.$row['photo']['filename']); ?>"/>
                </a>
            </div>
            <?php endforeach; ?>
        </section>
    </article>
</div>