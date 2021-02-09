<?php
	session_start();
	session_destroy();

	header("Location: ../pages/Formula1-Bets.php");
?>
