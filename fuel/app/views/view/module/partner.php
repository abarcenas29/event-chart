<div class="uk-modal" id="ec-sub-partners-modal">
    <article class="uk-panel uk-panel-header uk-modal-dialog"
             id="ec-sub-partners">
        <a class="uk-modal-close uk-close"></a>
        <header class="uk-panel-title">
            <h1 class="uk-margin-remove">
                Participating Partners
            </h1>
        </header>
        <section class="<?php print (count($q['sub_org']) > 4)?'uk-overflow-container':''; ?> 
                        uk-width-1-1">
        <table class="uk-table uk-table-striped">
            <tbody>
                <?php foreach($q['sub_org'] as $row): ?>
                <tr>
                <td>
                    <img class="uk-thumbnail-small"
                         style="width:100px;"
                         src="<?php print Uri::create('uploads/'.$row['org']['photo']['date'].'/thumb-'.$row['org']['photo']['filename']); ?>"/>
                </td>
                <td style="vertical-align:middle;" class="partner-name">
                    <?php print $row['org']['name']; ?>
                </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        </section>
    </article>
</div>