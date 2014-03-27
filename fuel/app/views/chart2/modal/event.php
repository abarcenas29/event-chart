<div id="ec-event-info" 
     class="bo-modal bo-modal-open">
	<article class="bo-modal-dialog">
	<div class="uk-grid uk-width-1-1" data-uk-grid-match>
		<div class="uk-width-large-1-2
                            uk-width-medium-1-1
                            ec-event-info-image">
			
		<div>
		<div class="ec-event-info-social">
                <ul>
                <li><a href="#"
                       id="facebook"
                       class="uk-button facebook"
                       target="_new">
                    <i class="uk-icon-facebook"></i>
                </a></li>

                <li><a href="#"
                       id="twitter"
                       class="uk-button twitter"
                       target="_new">
                <i class="uk-icon-twitter"></i>
                </a></li>

                <li><a href="#"
                       id="website"
                       class="uk-button
                              uk-button-success"
                        target="_new">
                <i class="uk-icon-globe"></i>	  
                </a></li>
                </ul>
		</div>
                    <img src="http://placehold.it/640x843"
                         class="uk-visible-large"
                         id="ec-event-info-poster"
                         style="width:100%;height:48em;"/>
                    
                    <img src="http://placehold.it/546x307"
                         class="uk-hidden-large"
                         id="ec-event-info-cover"
                         style="width:100%;"/>
		</div>
		
		</div>
		<div class="uk-width-large-1-2
                            uk-width-medium-1-1
                            ec-event-info">
		<div class="uk-panel uk-panel-header uk-panel-box">
		<div class="uk-panel-title 
                            ec-event-info-main-title">
                    <p class="uk-text-truncate uk-margin-remove">
                    Event Information: <span id="ec-info-title"></span>
                    </p>
                    <div>
                    <a href="#"
                       id="ec-view-event"
                       target="_new"
                       class="uk-button uk-button-success">
                        <i class="uk-icon-info-circle"></i>
                    </a>
                    </div>
		</div>
		<img src="http://staticmap.openstreetmap.de/staticmap.php?center=14.323332344997763,120.95918297767638&zoom=18&markers=14.323332344997763,120.95918297767638,ltblu-pushpin&size=546x168"
                     class="uk-width-1-1"
                     id="ec-event-info-map"/>
		
		<div class="uk-panel-title uk-margin-top">
		<i class="uk-icon-map-marker"></i>
                    Venue Title
		</div>
                <div id="ec-event-info-venue">
                    De La Salle University - Dasmarinas
                </div>
		
		
		<div class="uk-panel-title uk-margin-top">
			<i class="uk-icon-tags"></i>
			Categories
		</div>
		<ul class="ec-category-list">
		
		<?php for($x = 0; $x < 5; $x++): ?>
		<li>
		<a href="#" 
		   class="uk-button 
                          uk-button-primary 
			  uk-margin-bottom">
		<i class="uk-icon-tag"></i>
			Category
		</a>
		</li>
		<?php endfor; ?>
		
		</ul>
		
		<div class="uk-panel-title 
                            uk-margin-top">
                <i class="uk-icon-ticket"></i>
                    Ticket Information
		</div>
		
		<ul class="ec-ticket-list">
		</ul>
		
		</div>
		</div>
	</div>
	</article>
</div>