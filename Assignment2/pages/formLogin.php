<!DOCTYPE html> <!--defines document type HTML5-->

<?php
	session_start();
	include("../includes/components/navBar.php");
	include("../includes/pagesHead.php");
?>

<html>
<body>

<div id="Main">
	<h1 class="TituloPag"> <i><b> Login </i></b> </h1>
</div>

<?php
	if (!empty($_SESSION["msgErro"])) {
		
		echo "<p style=\"color:red\" align=\"center\">".$_SESSION['msgErro']."<p>";
		$_SESSION['msgErro'] = NULL;
	}
	
	echo "<form method = \"post\" action = \"../actions/actionUserValidation.php\">";

			
			echo "<p><label for=\"username\"> Username:</label><input type=\"text\" name=\"username\"/> </p>";
			echo "<p><label for=\"password\">Password:</label><input type=\"password\" name=\"password\"/> </p/>";
			echo "<p align=\"center\">
					<input type=\"submit\" value=\"Login\" />";
				  
		echo "</form>";
		
	echo "<p align=\"center\"> You don't have an account? <a href=\"formRegister.php\" > Click here </a> </p>";
		
?>

<br>
<table>
		<tr> <th> Username </th> <th> Password </th> 	</tr>
		<tr> <td> user </td>	 <td> userpass </td> 	</tr>
		<tr> <td> manager </td>	 <td> managerpass </td> </tr>
	</table>

</body>
</html>

