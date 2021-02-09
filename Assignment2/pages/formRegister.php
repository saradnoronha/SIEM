<!DOCTYPE html> <!--defines document type HTML5-->


<?php
	session_start();
	
	include_once "../includes/connectDB.php";
	include_once "../db/users.php";
	include("../includes/components/navBar.php");
	include ("../includes/pagesHead.php");
?>

<html>
<body>

<div id="Main">
	<h1 class="TituloPag"> <i><b> Create your Account </i></b> </h1>
</div>

<?php 
	
	//if an error occurs, present it and clean the session variable
	if (!empty($_SESSION['msgError'])) {
		echo "<p style=\"color:red\" align=\"center\">".$_SESSION['msgError']."<p>";
		$_SESSION['msgError'] = NULL;
	}
		
	if (!empty($_SESSION['username'])) 		$username = $_SESSION['username']; 		else $username = "";
	if (!empty($_SESSION['pass'])) 		 	$pass = $_SESSION['pass']; 				else $pass = "";
	if (!empty($_SESSION['birthdate'])) 	$birthdate = $_SESSION['birthdate']; 	else $birthdate = "";
	if (!empty($_SESSION['email'])) 		$email = $_SESSION['email']; 			else $email = "";
	
	//clean the session variables
	$_SESSION['username'] = NULL;
	$_SESSION['pass'] = NULL;
	$_SESSION['birthdate'] = NULL;
	$_SESSION['email'] = NULL;
	
	
	//HTML form
	echo "<form method = \"GET\" action = \"../actions/actionUserRegist.php\">";

		echo "<p><label for=\"username\"> Username:</label>	<input type=\"text\" 		name=\"username\"	value=\"".$username."\"/></p>";
		echo "<p><label for=\"password\">Password:</label>	<input type=\"password\" 	name=\"password\" 	value=\"".$pass."\"/> </p/>";
		echo "<p><label for=\"birthdate\">Birthdate:</label><input type=\"date\" 		name=\"birthdate\"	value=\"".$birthdate."\"/> </p/>";
		echo "<p><label for=\"email\">Email:</label>		<input type=\"text\" 		name=\"email\"		value=\"".$email."\"/> </p/>";
		echo "<p align=\"center\">
				<input type=\"submit\" name=\"Submit\" value=\"Submit\" />
				<input type=\"submit\" name=\"Cancel\" value=\"Cancel\" />";
			  
	echo "</form>";
	
?>


</body>
</html>