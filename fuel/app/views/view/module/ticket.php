<div id="ec-ticket-modal" class="uk-modal">
    <article id="ec-ticket" 
             class="uk-panel uk-panel-header uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
        <header class="uk-panel-title">
            <h1>
            <i class="fa fa-money"></i>
            Ticket Price(s)
            </h1>
        </header>
        <section class="uk-grid uk-width-1-1" id="ec-ticket-prices">
        <?php foreach($q['ticket'] as $row): ?>
            <div class="uk-width-1-2 uk-margin-bottom"
                 data-uk-tooltip title="<?php print $row['note']; ?>"
                 title="<?php print $row['note'] ?>">
                <div class="ec-ticket-price">
                <?php print 'Php '.number_format($row['price'],2); ?>
                </div>
            </div>
        <?php endforeach; ?>
        </section>
    </article>
</div>