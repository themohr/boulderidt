<div id="header" class="header full-width">
	<div id="metaNav" class="meta-nav bg-bar-dark">
    	<div class="container-fluid max-width-lg">
        	<div class="row">
            	<div class="col-md-4 col-md-offset-8 col">
                	<ul class="list-horizontal">
                    	<?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('class' => array('list-horizontal','pull-right')))); ?>
                        <?php $search_block = module_invoke('search','block_view','form'); ?>
                        <!-- <div id="search-box"><?php print render($search_block); ?></div> -->
                    </ul>
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
                	<?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('class' => array('list-horizontal')))); ?>
                </div>
                <script>
					$(".mobile-nav").click(function(){
							console.log("Open the mobile nav");
							if($('.main-nav ul').hasClass("open")){
								$('.main-nav ul').removeClass("open");
							} else {
								$('.main-nav ul').addClass("open");	
							}
						});
				</script>
            </div>
        </div>
	</div>
</div>
<?php print $messages; ?>
<div id="banner" class="content content-header">
	<div class="container-fluid max-width-lg">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="content-center">
            		<img src="sites/all/themes/idt/assets/images/banner-ls.jpg" width="623" height="100" alt="Louisville Slugger">
                </div>
            </div>
        </div>
    </div>
</div>
<div id="content" class="content">
	<div class="container-fluid max-width-lg content-internal">
    	<div class="row">
        	<div class="col-md-12">
            	<h1 class="section-title content-center"><?php print render($title); ?></h1>
            </div>
        </div>
		<div class="row">
        	<div class="col-md-8">
            	<?php print render($page['content']); ?>
            </div>
            <div class="col-md-4">
            	<h3>Text follow idtweather to 40404</h3>
            	<div class="feature">
                	<?php print render($page['featured']);?>
            		<h1 class="feature-title">Weather</h1>
                </div>
                <h3>Follow us on Twitter</h3>
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
        	<div class="col-md-2">
            	<div class="footer-main-nav">
                	<ul>
                		<li><a href="/?q=node/6" class="active-trail active">Home</a></li>
						<li><a href="/?q=node/5">Hotels</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
            	<div class="footer-main-nav">
            		<ul>
                    	<li><a href="/?q=node/3">Pools/Brackets</a></li>
						<li><a href="/?q=node/7">Practice Games</a></li>
						<li><a href="/?q=node/8">All-Star Game</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
            	<div class="footer-main-nav">
            		<ul>
                    	<li><a href="/?q=node/16">College Coaches</a></li>
						<li><a href="/?q=node/9">Attending Colleges</a></li>
						<li><a href="/?q=node/10">Past Results</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
            	<div class="footer-main-nav">
            		<ul>
                    	<li><a href="/?q=boulder-fields">Boulder</a></li>
                        <li><a href="/?q=broomfield-fields">Broomfield</a></li>
                        <li><a href="/?q=longmont-fields">Longmont</a></li>
                        <li><a href="/?q=louisville-fields">Louisville</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
            	<div class="copyright content-center">
                <img src="<?php print $logo; ?>" width="140" height="70" alt="IDT Logo">
                	<p>Copyright 2002 - 2015 Bouldersoftball.org
                    	<br>All Rights Reserved</p>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-8">
            	<div class="footer-meta-nav content-center">
                	<a href="/?q=contact">Contact us</a> | <a href="/?q=node/4">About us</a>
                </div>
            </div>
        </div>
    </div>
</div>