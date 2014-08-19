<div id="ec-admin-email" 
     class="uk-modal">
    <article class="uk-modal-dialog uk-panel uk-panel-header">
        <a href="#" class="uk-modal-close uk-close"></a>
        <header class="uk-panel-title">
            <i class="fa fa-envelope"></i>
            Email Template
        </header>
        <section class="uk-width-1-1">
            <form class="uk-form uk-form-horizontal"
                  id="ec-admin-email-form"
                  method="POST"
                  action="<?php print Uri::create(''); ?>">
                <div class="uk-form-row">
                    <label class="uk-form-label">
                        Subject
                    </label>
                    <div class="uk-form-controls">
                        <input type="text"
                               value="<?php ?>"
                               name="subject"/>
                    </div>
                </div>
                <div class="uk-form-row">
                    <textarea name="body" data-uk-htmleditor></textarea>
                </div>
                <div class="uk-form-row">
                    <label class="uk-form-label">
                        Send Test Mail
                    </label>
                    <div class="uk-form-controls">
                        <input type="checkbox" name="test" />
                        <input type="text" name="email"/>
                    </div>
                </div>
                <div class="uk-form-row">
                    <button type="submit" 
                            class="uk-float-right uk-button uk-button-primary">
                        <i class="fa fa-cloud"></i>
                        Submit
                    </button>
                </div>
            </form>
        </section>
    </article>
</div>