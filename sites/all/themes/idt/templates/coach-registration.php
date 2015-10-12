<?php
function process_form($data) {
	
	// DB info
	if(substr($_SERVER['DOCUMENT_ROOT'],3,4) != 'wamp'){// Production
		$host = 'localhost';
		$user = 'costars_admin';
		$password = '^54Q)Z#H%J?^';
	} else { // LOCAL
		$host = 'localhost';
		$user = 'root';
		$password = '';
	}
	$connect = mysqli_connect($host,$user,$password,'costars_drup1');

	// Initialize variables
	$formName = '';
	$mailto = "daniel.j.burns@att.net,coloradostars@gmail.com,dennis.m.mohr@gmail.com";
	$subject = "Boulder IDT - " . $formName;
	$headers = 'From: webmaster@boulderidt.com' . "\r\n" .
               'Reply-To: webmaster@example.com' . "\r\n";
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
	
	/* NOTE: Check the logic from ln 39 thru 64 */
	// Prepare values
	if($messageType == 'Nominate'){
		
		$message .= 'Team: ' . $data['reg']['team'] . "\r\n";
		$message .= 'Age: ' . $data['reg']['age'] .  "\r\n";
		$message .= 'Coach: ' . $data['reg']['coach'] . "\r\n";
	}
	
	foreach($data as $formItem => $formItemValue){
	
		if($messageType == 'Nominate'){
			if($formItem != 'reg'){
				echo $formItem . '<br>';
				$message .= "Nomination " . $count++;
			}
		} else {
			$message .= $messageType . " " . $count++ . "\r\n";
		}
		foreach($formItemValue as $itemValue){
			if($messageType == 'Register'){
				$message .= clean_text_field( $itemValue ) . "\r\n";
			}
		}
	}
	
	if(!empty( $message )){ // Notify the user they are signed up
		
		$subject .= $formName;
		
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

		// Save Coach Registration record
		if( $messageType == 'Register' ){
			$reg = 0;
			$inc = 0;
			// MySQL connect and insert
			if(!$connect) {
				die("We are unable to process you're request at this time. " . mysqli_connect_error());	
			}
			$sql = "INSERT INTO drup_coach_register (name,email,school,date_registered) VALUES ";
			foreach($data as $formItem => $formItemValue){
				$reg++;
				$sql .= "(";
				foreach($formItemValue as $itemValue){
					$inc++;
					$sql .= "'" . clean_text_field( $itemValue ) . "'";
					if($inc % 3 !== 0) {
						$sql .= ',';
					}
				}
				$sql .= ",NOW())";
				if($reg < count($data)) {
					$sql .= ',';	
				}
			}
			
			echo "<h3>Thanks for registering to attend IDT!</h3>";
				echo "<p>When you arrive at the tournament, visit the registration table and there will be a Tournament Guide with all the schedule and player information. We look forward to seeing you there!</p>";
			
			$retval = mysqli_query($connect,$sql);
			
			if(!$retval) { die('Unable to complete registration' . mysqli_error($connect));}
			
			mysqli_close($connect);
		}
		
		if( substr($_SERVER['DOCUMENT_ROOT'],3,4) != 'wamp' ){ // If this is public environment
			mail($mailto,$subject,$message,$headers);
			
		} else { // Local environment, just display the contents of the message
			echo $message . "<br>";
			echo $subject . "<br>";
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
