<div id="ec-admin-twitter" 
         class="uk-modal">
    <article class="uk-modal-dialog uk-panel uk-panel-header">
        <a href="" class="uk-modal-close uk-close"></a>
        <header class="uk-panel-title">
            <i class="fa fa-twitter"></i>
            Authenticate Twitter
        </header>
        <section>
            <form class="uk-form uk-form-horizontal"
                  action="<?php print Uri::create('admin/dashboard2/twitter'); ?>"
                  method="POST">
            <div class="uk-form-row">
                <label class="uk-form-label">
                    Consumer Key
                </label>
                <div class="uk-form-controls">
                    <input type="text"
                           value="<?php print $ckey['value']; ?>"
                           name="consumer_key"/>
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label">
                    Consumer Secret
                </label>
                <div class="uk-form-controls">
                    <input type="text" 
                           value="<?php print $csecret['value']; ?>"
                           name="consumer_secret"/>
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label">
                    OAuth Token
                </label>
                <div class="uk-form-controls">
                    <input type="text" 
                           value="<?php print $atoken['value']; ?>"
                           name="auth_token"/>
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label">
                    OAuth Secret
                </label>
                <div class="uk-form-controls">
                    <input type="text" 
                           value="<?php print $asecret['value']; ?>"
                           name="auth_secret"/>
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