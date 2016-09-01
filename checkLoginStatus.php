<?php
	//redirect to sign in page if user is not logged in
	if(!isset($_SESSION['id']))
	{
		header("Location: index.php");
	}
	else
	{
		echo $_SESSION['id'];
		echo "<br>";
	}
?>