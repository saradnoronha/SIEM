<?php

	session_start();
	include_once "../includes/connectDB.php";
	include_once "../db/users.php";
	
	
	//Only if the user fills each field
	if (!empty($_POST["username"]) and !empty($_POST["password"])) {
		
		$name = $_POST["username"];
		$pass = $_POST["password"];
		
		$user = validateUser($name, $pass);
		
		//If the user does not exist, an error message is saved
		if ($user == NULL) {
			$_SESSION['user'] = NULL;
			$_SESSION['msgErro'] = "Error. This user does not exist";
			header("Location: ../pages/formLogin.php");
		}
		
		else {
			$_SESSION['user'] = $user;
			$result = findUserType($_SESSION['user']);
			$type = pg_fetch_result($result, 0, "type");
			
			//redirect the user according to its type
			if ($type == 'user') {
				header("Location: ../pages/user/userFirstPage.php");
			}
			else {
				
				if($type == 'manager'){
					header("Location: ../pages/manager/listSearchUsers.php");
				}
				else {
					$_SESSION['user'] = NULL;
					header("Location: ../pages/formLogin.php");
				}
			}
		}
	}
	
	else {
		
		$_SESSION['user'] = NULL;
		$_SESSION['msgErro'] = "Error. You must fill in both fields";
		header("Location: ../pages/formLogin.php");
	}
	
?>
