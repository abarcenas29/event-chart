<header id="ec-main-nav">
    <section id="container">
    
    <nav id="right-nav">
        <ul>
        <li>
            <a href="#ec-main-menu" data-uk-offcanvas>
                <i class="fa fa-bars"></i>
            </a>
        </li>
        </ul>
    </nav>    
    
    <div id="brand">
        <a href="<?php print Uri::base(); ?>">
            <img src="<?php print Uri::create('assets/img/calendar-v3.svg'); ?>"/>
        </a>
    </div>
        
    </section>
</header>

<!-- OFF-CANVAS MENU -->
<div id="ec-main-menu" class="uk-offcanvas">
    <div class="uk-offcanvas-bar">
    <ul class="uk-nav uk-nav-offcanvas" data-uk-nav>
        <li class="uk-nav-header">Main Site</li>
        <li><a href="http://deremoe.com" 
               target="_new">
                Deremoe
            </a>
        </li>
        <li class="uk-nav-header">Affiliate Sites</li>
        <li><a href="https://www.facebook.com/OtakuEvent"
               target="_new">
            Otaku Events (Facebook)
            </a>
        </li>
        <li><a href="http://animephproject.com">
                AnimePH Project
            </a>
        </li>
        <li class="uk-nav-header">Feeds</li>
        <li><a href="<?php print Uri::create('feeds/iframe'); ?>">
                IFrame Embed
            </a>
        </li>
        <li><a href="<?php print Uri::create('feeds/rss'); ?>">
                Event Chart RSS
            </a>
        </li>
        <li class="uk-nav-header">Main Navigation</li>
        <li><a href="http://www.iubenda.com/privacy-policy/215152"
               target="_new">
            Privacy Policy
            </a>
        </li>
        <li>
            <a href="mailto:events@deremoe.com">
            Contact Us
            </a>
        </li>
    </ul>
    </div>
</div>