<?php
	$session_status = session_status();
	if($session_status != 2)
	{
		session_start();
	}
	//redirect to sign in page if user is not logged in
	if(!isset($_SESSION['id']))
	{
		header("Location: index.php");
	}
	else
	{
		echo $session_status;
		echo "<br>";
		echo $_SESSION['id'];
	}
?>