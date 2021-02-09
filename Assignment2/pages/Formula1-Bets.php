<!DOCTYPE html> <!--defines document type HTML5-->

<?php
	session_start();
	include("../includes/pagesHead.php");
?>
<html>

<body>

	<div id="Nav">
		<ul>
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


	<div id="Main">

		<h1 class="TituloPag"> <i><b>Formula 1  Bets </i></b> </h1>
		<img class="bckImg" src="../images/fundo2.jpg" > 

	</div>
	
	<p> Final version | Prefered Browser: Chrome | Prefered resolution: 15' </p>
	
	<p class="button"><a href="reportPage.php">Report</a></p>
		
			
	<div class="footer">

		<ul>
			<li>Joana Santos <br><a  href="malito:up201606208@fe.up.pt">up201606208@fe.up.pt</a></li>
			<li><img id="img_id" src="../images/201606208.jpg"></li>
			<li>Sara Noronha <br><a  href="malito:up201605755@fe.up.pt">up201605755@fe.up.pt</a></li>
			<li><img id="img_id" src="../images/201605755.jpg"></li>

		</ul>

	</div>


</body>
</div>
</html>