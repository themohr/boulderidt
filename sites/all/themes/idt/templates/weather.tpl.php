<?php
/**
 * @file
 * Template for the weather module.
 */
?>
<div class="weather-custom">
	<?php foreach($weather as $place): ?>
    	<?php if (empty($place['forecasts'])): ?>
    	  <?php print(t('Currently, there is no weather information available.')); ?>
	    <?php endif ?>
    	<?php foreach($place['forecasts'] as $forecast): ?>
        	<?php // print_r($forecast); ?>
            <?php //print substr($forecast['formatted_date'],0,5); ?>
        	<?php foreach($forecast['time_ranges'] as $time_range => $data): ?>
            	<?php if(substr($forecast['formatted_date'],0,5) == "Today"){ ?>
                	<div class="weather-current">
                    	<div class="weather-current-item weather-current-day">
		     		       	<?php print date('l F j, Y', strtotime($forecast['formatted_date'])); ?>
                        </div>
                        <div class="weather-current-item weather-current-temp">
			                <?php print $data['temperature']; ?>
                        </div>
                    </div>
               <?php } else {?>
               		<div class="weather-forecast">
                     	<span class="weather-forecast-day">
                            <?php if(substr($forecast['formatted_date'],0,8) == "Tomorrow"){
							 print date('D n/j', strtotime(substr($forecast['formatted_date'],strpos($forecast['formatted_date'],","))));
							} else {
								print date('D n/j', strtotime($forecast['formatted_date']));	
							}?>
                        </span>
                        <span class="weather-forecast-temp">
	                		<?php print $data['temperature']; ?>
                        </span>
                    </div>
 	           <?php } ?>
            <?php endforeach; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
</div>