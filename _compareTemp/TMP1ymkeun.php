<?php
	class Registration {
		
		private $regname;
		private $regemail;
		private $regorganization;
		private $subject = "Boulder IDT";
		private $sendto = "daniel.j.burns@att.net,coloradostars@gmail.com,dennis.m.mohr@gmail.com";
		private $replyto = "webmaster@boulderidt.com";
		private $from = "webmaster@boulderidt.com";
		private $text;
		private $insert;
		private $db = "costars_drup1";
		
		public function processForm($data,$formName){
			$this->subject .= " - " . $formName;
			$setCount = 0;
			$itemCount = 0;
			
			foreach($data['form'] as $dataSet => $dataSetItems) {
				$setCount++;
				$this->insert .= "(";

				foreach($dataSetItems as $dataSetItem => $item) {
					$itemCount++;
					$this->text .= $this->cleanTextField($item) . "\r\n"; // Email Message Text needs additional formatting
					$this->insert .=  "'" . $this->cleanTextField($item) . "'"; // Insert into db
					if($itemCount % 3 !== 0) {
						$this->insert .= ',';
					}
				}

				$this->insert .= ",NOW(),1)";
				if($setCount < count($data['form'])){
					$this->insert .= ",";	
				}
			}
			
			// Save the registration
			$this->saveData($this->dbConnect(),$this->insert);
			// Email to the organization
			$this->sendEmail($this->subject,$this->sendto,$this->from,$this->replyto,$this->text);
			// Display Message to the User
			echo $this->formSuccess($formName);
						
		}
		
		/**
		 *  Form Success Message
		 */
		public function formSuccess($formName){
			 
			 $message = "";

			 switch($formName){
				 case "College Coach Registration":
				 	$message = "<h3>Thanks for registering to attend IDT!</h3>";
					$message .= "<p>When you arrive at the tournament, visit the registration table and there will be a Tournament Guide with all the schedule and player information. We look forward to seeing you there!</p>";
				 break;
				 case "All Star Nomination":
				 	$message = "<h3>Your Player Nomination has been submitted!</h3>";
				 break;
				 default:
				 	"Form submission complete.";
			 }
			 
			 return $message;
			 
		}
		
		/**
		 *	Send Email message
		 *  @param $subject equals email subject line
		 *  @param $sendto equals email addresses to send the message
		 *  @param $from equals email address the message is sent from
		 *  @param $replyto equals email address to reply-to
		 *  @param $message equals email message body
		 */
		public function sendEmail($subject,$sendto,$from,$replyto,$message) {
			
			$headers = 'From: ' . $from . "\r\n" .
               'Reply-To: ' . $replyto . "\r\n";
			
			if( substr($_SERVER['DOCUMENT_ROOT'],3,4) != 'wamp' ){
				mail($sendto,$subject,$message,$headers);
			} else {
				echo "<p>" . $sendto . " | " . $subject . " | " . $message . " | " . $headers . "</p>";
			}
			
		}
		
		public function dbConnect( ) {
		
			$credentials = array();
			
			$credentials['db'] = $this->db;
			// DB info
			if(substr($_SERVER['DOCUMENT_ROOT'],3,4) != 'wamp'){// Production
				$credentials['host'] = 'localhost';
				$credentials['user'] = 'costars_admin';
				$credentials['password'] = '^54Q)Z#H%J?^';
			} else { // LOCAL
				$credentials['host'] = 'localhost';
				$credentials['user'] = 'root';
				$credentials['password'] = '';
			}
			return $credentials;
		}
		
		public function emailExists($email) {
			
			$valid = false;
			
			if($this->readData($this->dbConnect(),'email',$email) > 0){
				$valid = true;	
			}
			
			return $valid;
			
		}
		
		/**
		 *  Read from the db
		 *
		 */
		public function readData( $credentials, $readColumn, $readValue) {
			
			$mysqli = new mysqli();
			
			$mysqli->connect($credentials['host'],$credentials['user'],$credentials['password'],$credentials['db']);
			$sql = "SELECT " . $readColumn . " FROM drup_coach_register WHERE " . $readColumn . " = " . $readValue;

			if($mysqli->connect_error) { 
				die('Unable to complete operation ' . $mysqli->error);
			}
			
			// Return the number of rows that match
			$result = $mysqli->query($sql);
			return $result->num_rows;	
			
			$mysqli->close($connect);
			
		}
		
		public function incrementRegistrations( $credentials, $column, $columnValue ) {
		
			$mysqli = new mysqli();
			
			$connect = $mysqli->connect($credentials['host'],$credentials['user'],$credentials['password'],$credentials['db']);
			$sql = "UPDATE drup_coach_register SET register_quantity = register_quantity + 1 WHERE " . $column . " = " . $columnValue;
			
			if($mysql->connect_error){
				die('Unable to complete operation ' . $mysqli->error);	
			}
			
			if($mysqli->query($sql) === TRUE){
				// Update Successful
			} else {
				echo "Something went wrong " . $mysqli->error;	// The update failed
			}
			
			$mysqli->close($connect);
			
		}
		
		/**
		 *	Insert into db
		 *  @param credentials passes an array with host, user and password to connect to the db
		 *  
		 */
		public function saveData( $credentials,$insert ) {
			
			// Initialze variables
			$connect = mysqli_connect($credentials['host'],$credentials['user'],$credentials['password'],$credentials['db']);
			$insertArray = explode(",",$insert);
			$sql = "INSERT INTO drup_coach_register (name,email,school,date_registered,register_quantity) VALUES " . $insert;
			
			if($this->emailExists($insertArray[1])){
				
				//Increment the registration quantity
				$this->incrementRegistrations($this->dbConnect(),'email',$insertArray[1]);
					
			} else {
			
				$retval = mysqli_query($connect,$sql);
				
				if(!$retval) { 
					die('Unable to complete registration' . mysqli_error($connect));
				}
				
			}
			
			
			mysqli_close($connect);
			
		}
		
		public function cleanTextField($fieldValue) {
			
			if( ini_get( 'magic_quotes_gpc' )){ // Strip the slashes...
		
				$fieldValue = trim( strip_tags( stripslashes( $fieldValue )));
				
			} else { // Don't strip slashes.
			
				$fieldValue = trim( strip_tags( $fieldValue ));
				
			}
			
			return $fieldValue;
		}
		
	}
?>