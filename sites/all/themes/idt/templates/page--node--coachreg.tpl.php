<div id="header" class="header full-width">
	<div id="metaNav" class="meta-nav bg-bar-dark">
    	<div class="container-fluid max-width-lg">
        	<div class="row">
            	<div class="col-md-4 col-md-offset-8 col">
                	<ul class="list-horizontal">
                    	<?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('class' => array('list-horizontal')))); ?>
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
                    	<img src="<?php print $logo; ?>" width="140" height="70" alt="IDT Logo">
                    </div>
                </div>
                <div class="col-md-10">
                	<?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('class' => array('list-horizontal')))); ?>
                </div>
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
            	<h1>Coach Registration Form</h1>
                <?php
					$serverTest = $_SERVER['DOCUMENT_ROOT'];
					$serverEnv = false;
					$formAction = "mailto:dennis.m.mohr@gmail.com?subject=test";
					
					echo substr($serverTest, 3, 4);
					
					if(substr($serverTest, 3, 4)){
						$serverEnv = true; //"sites/all/themes/idt/templates/coach-reg.php"
					}
					
				?>
                <form name="reg-form" id="reg-form" action="<?php echo $formAction; ?>" method="post">
                	<div id="reg">
                	<label for="firstname">First name: </label> <input type="text" id="firstname" name="form['reg']['firstname']" />
                    <label for="lastname">Last name: </label> <input type="text" id="lastname" name="form['reg']['lastname']" />
                    <label for="organization">College Name: </label> <input type="text" id="organization" name="form['reg']['organization']" />
                    </div>
                    <br />
                    <br />
                    <input type="button" id="addItem" value="Add Coach" />
                    <br />
                    <br />
                    <input type="submit" name="send" value="submit" />
                </form>
                
                
            </div>
            <script>
				var clicks = 0;
				$('#addItem').click(function(){
					clicks++;
					console.log(clicks);
					if(clicks <= 5){
						$('#reg').after('<hr><div id="reg' + clicks +'">'
						+ '<label for="firstname">First name:</label> <input type="text" id="firstname" name="form[\'reg' + clicks + '\'][\'firstname\']" />'
                    	+ '<label for="lastname">Last name:</label> <input type="text" id="lastname" name="form[\'reg' + clicks + '\'][\'lastname\']" />'
                    	+ '<label for="organization">College Name:</label> <input type="text" id="organization" name="form[\'reg' + clicks + '\'][\'organization\']" />'
						+ '</div>');
					}
					
				});
			</script>
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
                    	<li><a href="/?q=coachreg/form">College Coaches</a></li>
						<li><a href="/?q=node/9">Attending Colleges</a></li>
						<li><a href="/?q=node/10">Past Results</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
            	<div class="footer-main-nav">
            		<ul>
                    	<li><a href="/?q=boulder-fields">Boulder</a></li>
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