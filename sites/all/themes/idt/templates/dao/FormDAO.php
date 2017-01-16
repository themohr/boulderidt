<?php
/*
 *  FormDAO (Data Access Object)
 *  
 */
 include("model/FormVO.php");
	class FormDAO {
		
		function dbConnect() {
			
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
			
		function create( $credentials, $insert ) {
			
			// Initialze variables
			$connect = mysqli_connect($credentials['host'],$credentials['user'],$credentials['password'],$credentials['db']);
			$insertArray = explode(",",$insert);
			$sql = "INSERT INTO drup_coach_register (name,email,school,date_registered,register_quantity) VALUES " . $insert;
			
			$retval = mysqli_query($connect,$sql);
				
			if(!$retval) { 
				die('Unable to complete registration' . mysqli_error($connect));
			}
				
			mysqli_close($connect);
			
		}
		
		function read( $credentials, $readColumn, $readValue ) {
			
			$mysqli = new mysqli();
			
			$mysqli->connect($credentials['host'],$credentials['user'],$credentials['password'],$credentials['db']);
			$sql = "SELECT " . $readColumn . " FROM drup_coach_register WHERE " . $readColumn . " = '" . $readValue . "'";

			if($mysqli->connect_error) { 
				die('Unable to complete operation ' . $mysqli->error);
				return $result;
			}
			
			// Return the number of rows that match
			$result = $mysqli->query($sql);
			return $result->num_rows;	
			
			$mysqli->close($connect);
			
		}
		
		function increment() {
			
			$mysqli = new mysqli();
			
			$connect = $mysqli->connect($credentials['host'],$credentials['user'],$credentials['password'],$credentials['db']);
			$sql = "UPDATE drup_coach_register SET register_quantity = register_quantity + 1 WHERE " . $column . " = '" . $columnValue . "'";
			
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
		
		function recordExists($email) {
			$valid = false;

			if($this->readData($this->dbConnect(),'email',$email) > 0){
				$valid = true;
			} 
			
			return $valid;
		}
		
		function cleanTextField( $fieldValue ) {
			
			if( ini_get( 'magic_quotes_gpc' )){ // Strip the slashes...
		
				$fieldValue = trim( strip_tags( stripslashes( $fieldValue )));
				
			} else { // Don't strip slashes.
			
				$fieldValue = trim( strip_tags( $fieldValue ));
				
			}
			
			return $fieldValue;
			
		}
	
	}
?>