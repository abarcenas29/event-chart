<div id="ec-admin-facebook" 
         class="uk-modal">
    <article class="uk-modal-dialog uk-panel uk-panel-header">
        <a href="" class="uk-modal-close uk-close"></a>
        <header class="uk-panel-title">
            <i class="fa fa-facebook"></i>
            Authenticate Facebook
        </header>
        <section>
            <form class="uk-form uk-form-horizontal"
                  action="<?php print Uri::create('admin/dashboard2/facebook'); ?>"
                  method="POST">
            <div class="uk-form-row">
                <label class="uk-form-label">
                    App Id
                </label>
                <div class="uk-form-controls">
                    <input type="text"
                           value="<?php print $appid['value']; ?>"
                           name="appid"/>
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label">
                    App Secret
                </label>
                <div class="uk-form-controls">
                    <input type="text" 
                           value="<?php print $secret['value']; ?>"
                           name="secret"/>
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label">
                    Page id (Deremoe)
                </label>
                <div class="uk-form-controls">
                    <input type="text" 
                           value="<?php print $pageid['value']; ?>"
                           name="pageid"/>
                </div>
            </div>
            <div class="uk-form-row">
                <button type="submit" class="uk-button uk-button-primary">
                    <i class="fa fa-cloud"></i> Submit
                </button>
            </div>
            </form>
        </section>
    </article>
</div>