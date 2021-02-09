<?php
	session_start();
	include_once "../includes/connectDB.php";
	include_once "../db/users.php";
	
	
	if (!empty($_GET['Cancel'])) {
		//if the user cancels, redirect to the account page
		header("Location: ../pages/user/listAccount.php");
	}
	
	if (!empty($_GET['Confirm'])) {
		//if confirmed, recover the values introduced in the form
		$idUser = $_GET['id'];
		$name = $_GET['name'];
		$birthdate = $_GET['birthdate'];
		$email = $_GET['email'];
		$pass = $_GET['pass'];
		
		//Validate the data -> every field must have information
		if (empty($name) || empty($birthdate) || empty($email) || empty($pass)) {
			$validData = false;
		}
		else {
			$validData = true;
		}
		
		if (!$validData) {
			//save the error message
			$_SESSION['msgErro'] = "At least one field missing<p>";
			
			//Save the data introduced by the user
			$_SESSION['id'] = $idUser;
			$_SESSION['name'] = $name;
			$_SESSION['birthdate'] = $birthdate;
			$_SESSION['email'] = $email;
			$_SESSION['pass'] = $pass;
			
			//And redirect to the from where the user must fill all the fields
			header("Location: ../pages/user/formChangeAccount.php");
		}
		else {
			//data is valid -> execute the query and head to the account page
			$query = editAccountInfo ($idUser, $name, $birthdate, $email, $pass);
			$_SESSION['user'] = $name;
			header("Location: ../pages/user/listAccount.php");
		}
	}	
?>