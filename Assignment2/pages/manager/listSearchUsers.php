<!DOCTYPE html> <!--defines document type HTML5-->
<?php
	session_start();
	
	include ("../../includes/pagesHeadUserManager.php");
	include("../../includes/components/navBarManager.php");
	include_once "../../includes/connectDB.php";
	include_once "../../db/users.php";
?>

<html>
<body>

<div id="Main">
	<h1 class="TituloPag"> <i>Users </i> </h1>
</div>
<?php
	$user = "";
	//variable where search user is stored
	if(isset($_GET['user'])){
		$user = $_GET['user'];
	}
	
	// List of all Users
	$users = getAllUsers($user);
?>
	<form method="get" action="listSearchUsers.php">
	
			<p><label for="User">Search by User:</label><input type="text" name="user" value="<?php if(!empty($user)){echo $user;}?>"/> </p>
			<p><input type="submit" value="Search" /> </p>
			
	</form>
	
	
<?php	
	// Search
	//$users = getAllUsers($user);
	if(pg_numrows($users)>0){

		// Table with the users list
		echo "<table border=1>";
		echo "<tr>";
			echo "<th >name</th><th>email</th><th>birthdate</th><th>points</th>";
		echo "</tr>";
		$row = pg_fetch_assoc($users); 
   		
		while (isset($row["name"])) {	
			echo "<tr>";
				echo "<td>".$row['name']."</td>";
				echo "<td>".$row['email']."</td>";
				echo "<td>".$row['birthdate']."</td>";
				echo "<td>".$row['points']."</td>";
			echo "</tr>";

			$row = pg_fetch_assoc($users);	
		}
		echo "</table>";
	}
	
	else {
		echo "<p>No results were found.</p>";
	}	

?>

</body>
</html>

