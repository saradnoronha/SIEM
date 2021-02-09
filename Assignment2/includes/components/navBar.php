<!DOCTYPE html> <!--defines document type HTML5-->

<html>
<body id="background">

<div id="Nav">
	<ul>
		<li> <a href="Formula1-Bets.php"> &#127937 </a> </li>
		<li> <a href="listCalendar.php"> <i><b>Calendar </a></li>
		<li> <a href="listDrivers.php"> Drivers </a></li>
		<li> <a href="listOdds.php"> Odds </i></a></li>
		
		<?php if(!isset($_SESSION['user'])){ ?>
		<li style="float:right"> <a href="formLogin.php">Login </b></a></li>
		<?php } else { if($_SESSION['user'] == 'manager'){ ?> 
		<li style="float:right" class ="dropdown"> <a class="dropbtn">Login </b></a>
			<div class="dropdown-content">
				<a href="manager/listSearchUsers.php">Users</a>
				<a href="manager/listSearchBets.php">Bets </a>
				<a href="../actions/actionLogout.php">Logout</a>
			</div>
		</li> <?php } else { ?>
		<li style="float:right" class ="dropdown"> <a class="dropbtn">Login </b></a>
			<div class="dropdown-content">
				<a href="user/listMyBets.php">My Bets</a>
				<a href="user/listAccount.php">Account </a>
				<a href="../actions/actionLogout.php">Logout</a>
			</div>
		</li>
		<li style="float:right"> <a href="user/formMakeBet.php"> Bet! </i></a></li><?php } } ?>
		
	</ul>
</div>
</body>
</html>