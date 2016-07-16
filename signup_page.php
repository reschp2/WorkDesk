<!DOCTYPE html>
<html>
	<head>
		<meta charset = "UTF-8">
		<title>Work Desk</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
	<center>
	<h1> Work Desk </h1>
	<?php
		echo "Please provide the following information to create an account.";
	?>
	<form action="signup.php" method="post">
		<input type="text" name="fName" placeholder="FIRST NAME"><br>
		<input type="text" name="lName" placeholder="LAST NAME"><br>
		<input type="text" name="userName" placeholder="USERNAME"><br>
		<input type="text" name="pass" placeholder="PASSWORD"><br>
		<button type="submit">Sign Up</button><br>
	</form>
	</center>
<?php include("views/footer.php"); ?>