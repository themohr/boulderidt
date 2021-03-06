<div id="header" class="header full-width">
	<div id="metaNav" class="meta-nav bg-bar-dark">
    	<div class="container-fluid max-width-lg">
        	<div class="row">
            	<div class="col-md-4 col-md-offset-8">
                	<?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('class' => array('list-horizontal','pull-right')))); ?>
                    <?php $search_block = module_invoke('search','block_view','form'); ?>
                    <!-- <div id="search-box"><?php print render($search_block); ?></div> -->
                </div>
            </div>
        </div>
    </div>
    <div id="mainNav" class="main-nav bg-bar-gradient">
    	<div class="container-fluid max-width-lg">
        	<div class="row">
            	<div class="col-md-2">
                	<div id="logo" class="logo">
                    	<a href="/" class="logo-anchor"><img src="<?php print $logo; ?>" width="140" height="70" alt="IDT Logo"></a>
                    </div>
                </div>
                <div class="col-md-10">
                	<div class="mobile-nav"><img src="sites/all/themes/idt/assets/css/assets/mobile-menu.png" width="75" height="50" alt="Louisville Slugger"></div>
                	<ul class="list-horizontal"><li class="menu-812 first"><a href="/boulderidt/?q=node/6">Home</a></li>
						<li class="menu-813"><a href="/boulderidt/?q=node/5" title="2016 Hotel Buyout Document">Hotels</a></li>
						<li class="menu-811"><a href="/boulderidt/?q=node/3" title="2015 IDT Pools and Brackets (All Ages)">Pools/Brackets</a></li>
						<li class="menu-814"><a href="/boulderidt/?q=node/7">Practice Games</a></li>
						<li class="menu-815"><a href="/boulderidt/?q=node/8">All-Star Game</a></li>
						<li class="menu-1190"><a href="/boulderidt/?q=node/24">College Coach Information</a></li>
						<li class="menu-816"><a href="/boulderidt/?q=node/9">Attending Colleges</a></li>
						
					</ul>
                	<?php //print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('class' => array('list-horizontal')))); ?>
                </div>
            </div>
        </div>
	</div>
</div>
<div id="content" class="content content-header">
	<div class="container-fluid max-width-lg horizontal-rule-thick">
		<div class="row">
        	<div class="col-md-12 horizontal-rule-thick">
            	<div class="content-center">
            		<img src="sites/all/themes/idt/assets/images/banner-ls.jpg" width="623" height="100" alt="Louisville Slugger">
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-6 col-sm-6">
            	<div class="main-promo content-center">
            		<div class="region region-content">
					    <div id="block-system-main" class="block block-system">
					
					    
					  <div class="content">
					    
					  
					        <h2><a href="/boulderidt/?q=node/2">IDT</a></h2>
					        <p>Independence Day Tournament</p>
					    <span property="dc:title" content="IDT" class="rdf-meta element-hidden"></span><span property="sioc:num_replies" content="0" datatype="xsd:integer" class="rdf-meta element-hidden"></span>
					  
					    <div class="field field-name-body field-type-text-with-summary field-label-hidden"><div class="field-items"><div class="field-item even" property="content:encoded"><h1 class="main-promo-primary">2017</h1>
					<p class="main-promo-base">Jun 28 - July 2</p>
					</div></div></div>
					  <ul class="links inline"><li class="node-readmore first last"><a href="/boulderidt/?q=node/2" rel="tag" title="IDT">Read more<span class="element-invisible"> about IDT</span></a></li>
					</ul>
					    </div>
					</div>
				  </div>
                	<?php // print render($page['content']);?>
                	<div class="btn btn-fixed-width btn-primary">
                		<a href="/boulderidt/?q=nade/20">Entry Form</a>
                	</div>
                	<div class="btn btn-fixed-width btn-primary">
                		<a href="/boulderidt/?q=node/10">Tournament Results</a>
                	</div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
            	<div id="slideShow" class="carousel">
                	<div class="carousel-item active" style="display: block;">
	            		<img class="carousel-item-element" src="sites/all/themes/idt/assets/images/ASAScholar_I7C4465.png" />
                    </div>
                    <div class="carousel-item" style="display: none;">
	            		<img class="carousel-item-element" src="sites/all/themes/idt/assets/images/rotator-catch.png" />
                    </div>
                     <div class="carousel-item" style="display: none;">
	            		<img class="carousel-item-element" src="sites/all/themes/idt/assets/images/rotator-hit.png" />
                    </div>
                </div>
                <script src="sites/all/themes/idt/assets/js/rotator.js"></script>
            </div>
        </div>
    </div>
	<div class="content container-fluid max-width-lg">
		<div class="row">
			<div class="col-md-12">
				<h1 class="content-center">Tournament Information</h1>
			</div>
		</div>
        <div class="row">
        	<div class="col-md-4">
            	<div class="feature">
                	<ul class="feature-list">
                    	<li><a href="/?q=boulder-fields" class="feature-link">Boulder</a></li>
                        <li><a href="/?q=broomfield-fields" class="feature-link">Broomfield</a></li>
                        <li><a href="/?q=longmont-fields" class="feature-link">Longmont</a></li>
                        <li><a href="/?q=louisville-fields" class="feature-link">Louisville</a></li>
                    </ul>
            		<h1 class="feature-title">Playing Fields</h1>
                </div>
            </div>
            <div class="col-md-4">
            	<div class="feature">
                	<?php print render($page['featured']);?>
                    <h1 class="feature-title">Weather</h1>
                </div>
            </div>
            <div class="col-md-4">
            	<div class="feature">
                	<p><a class="twitter-timeline"  href="https://twitter.com/BoulderIDT"  data-widget-id="349729745606430720">Tweets 
      by @BoulderIDT</a> 
      <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</p>
            		<h1 class="feature-title">Twitter</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="footer" class="footer">
	<div class="container-fluid max-width-lg">
    	<div class="row">
        	<div class="col-md-6">
            	<div class="footer-logo content-center">
            		<img src="<?php print $logo; ?>" width="140" height="70" alt="IDT Logo">
                </div>
            </div>
            <div class="col-md-6">
            	<div class="copyright content-center">
                	<p>Copyright 2002 - 2015 Bouldersoftball.org
                    	<br>All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
(function(){
	$(".mobile-nav").click(function(){
		console.log("Open the mobile nav");
		if($('.main-nav ul').hasClass("open")){
			$('.main-nav ul').removeClass("open");
		} else {
			$('.main-nav ul').addClass("open");	
		}
	});	
})();
</script>