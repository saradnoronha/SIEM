<?php
	session_start();
	include_once "../includes/connectDB.php";
	include_once "../db/users.php";
	
	
	if (!empty($_GET['Cancel'])) {
		//if the user cancels, redirect to the first page
		header("Location: ../pages/formLogin.php");
	}

	if (!empty($_GET['Submit'])) { 
		//if confirmed, recover the values introduced
		$username = $_GET['username'];
		$pass = $_GET['password'];
		$birthdate = $_GET['birthdate'];
		$email = $_GET['email'];
	
		//validate the data -> to make a bet every field most be field
		if (empty($username) || empty($pass) || empty($birthdate) || empty($email)) {
			$validData = false;
		}
		else {
			$validData = true;	
		}
		
		//validation of the user's age
		$atual = date("Y-m-d");
		$diff = abs(strtotime($atual) - strtotime($birthdate));
		$years = floor($diff / (365*60*60*24));
		
		if ($years >= 18) $oldEnough = true; else $oldEnough = false;
		
		//validation of the users' name (not possible users witn the same name)
		$result = compareUsersNames($username);
		
		if (pg_fetch_assoc($result) == NULL) $validUsername = true; else $validUsername = false;
		
		if ($oldEnough) {
			
			if ($validUsername) {
				
				if (!$validData) {
				
					//save the error message
					$_SESSION['msgError'] = "You must fill every parameter<br>";
					
					//save the data that was introduced by the user
					$_SESSION['username'] = $username;
					$_SESSION['pass'] = $pass;
					$_SESSION['birthdate'] = $birthdate;
					$_SESSION['email'] = $email;
					
					//and redirect to the register form
					header("Location: ../pages/formRegister.php");
				}
			
				else {
					
					$query = registUser($username,$pass,$birthdate,$email);
					header("Location: ../pages/formLogin.php");
				}
			}
			else {
				
				//save the error message
				$_SESSION['msgError'] = "That username already exists<br>";
				
				//save the data that was introduced by the user
				$_SESSION['pass'] = $pass;
				$_SESSION['birthdate'] = $birthdate;
				$_SESSION['email'] = $email;
				
				//and redirect to the register form
				header("Location: ../pages/formRegister.php");
			}	
		}
		else {
			
			$_SESSION['msgError']="You must be at least 18 years old<br>";			
			header("Location: ../pages/formRegister.php");
			
		}
	}


?>
