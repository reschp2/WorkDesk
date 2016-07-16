<?php
	$session_status = session_status();
	if($session_status != 2)
	{
		session_start();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Work Desk</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<?php
			if(isset($_SESSION['id']))
			{
		?>
				<form action="logout.php">
					<button type="submit">Log Out</button>
				</form>
		<?php
			}
		?>
		<center>
		<h1> Work Desk </h1>
		</center>		