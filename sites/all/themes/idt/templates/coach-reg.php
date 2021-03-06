<?php
function process_form($data) {
	// Initialize variables
	$formName = '';
	$mailto = "daniel.j.burns@att.net,coloradostars@gmail.com,dennis.m.mohr@gmail.com";
	$subject = "Boulder IDT - " . $pageName;
	$headers = 'From: webmaster@boulderidt.com' . "\r\n" .
               'Reply-To: webmaster@boulderidt.com' . "\r\n";
	$messageType = '';
	$message = '';
	$count = 1;
	
	if( substr($_SERVER['QUERY_STRING'],-8) == "nominate"){
		$formName = "All Star Nomination";
		$messageType = "Nominate";
	} else {
		$formName = "College Coach Registration";
		$messageType = "Register";
	}
	
	// Prepare values
	if($messageType == 'Nominate'){
		
		$message .= 'Team: ' . $data['reg']['team'] . "\r\n";
		$message .= 'Age: ' . $data['reg']['age'] .  "\r\n";
		$message .= 'Coach: ' . $data['reg']['coach'] . "\r\n";
	}
	foreach($data as $formItem => $formItemValue){
		if($messageType == 'Nominate'){
			if($formItem != 'reg'){
				$message .= "Nomination " . $count++ . "\r\n";
				$message .= "Player Name: " . clean_text_field($data[$formItem]['name']) . "\r\n";
				$message .= "Position: " . clean_text_field($data[$formItem]['position']) . "\r\n";
				$message .= "Graduating Class: " . clean_text_field($data[$formItem]['gradyear']) . "\r\n";
				$message .= "Uniform Number: " . clean_text_field($data[$formItem]['uninumber']) . "\r\n";
			} 
		} else {
			$message .= $messageType . " " . $count++ . "\r\n";
			
			foreach($formItemValue as $itemValue){
				$message .= clean_text_field( $itemValue ) . "\r\n";
			}
		}
		$message .= "\r\n";
	}
	
	if(!empty( $message )){ // Notify the user they are signed up
		
		switch($messageType){
			case 'Nominate':
				echo "<h3>Your Player Nomination has been submitted!</h3>";
			break;
			case 'Register':
			break;
				echo "<h3>Thanks for registering to attend IDT!</h3>";
				echo "<p>When you arrive at the tournament, visit the registration table and there will be a Tournament Guide with all the schedule and player information. We look forward to seeing you there!</p>";
			default:
		}

		if( substr($_SERVER['DOCUMENT_ROOT'],3,4) != 'wamp' ){ // If this is public environment
			mail($mailto,$subject,$message,$headers);
			
		} else { // Local environment, just display the contents of the message
			echo $message;	
		}
	} else { // If the message is empty, it's not worth sending an email.
		echo '<p>We are currently unable to process your request</p>';	
	}
	
}

function clean_text_field($fieldValue) {

	if( ini_get( 'magic_quotes_gpc' )){ // Strip the slashes...
		
		$fieldValue = trim( strip_tags( stripslashes( $fieldValue )));
		
	} else { // Don't strip slashes.
	
		$fieldValue = trim( strip_tags( $fieldValue ));
		
	}
	
	return $fieldValue;
	
}
?>
