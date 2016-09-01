<?php
	if(!isset($_SESSION))
	{
		session_start();
	}
	//check if user is logged in; go to home if so
	if(isset($_SESSION['id']))
	{
		header("Location: home.php");
	}
?>

<?php include("/views/header.php"); ?>
<center>		
<?php
	echo "Welcome To Work Desk.  Please sign in.";
?>
<form action="signin.php" method="post">
	<input type="text" name="userName" placeholder="USERNAME"></input><br>
	<input type="password" name="pass" placeholder="PASSWORD"></input><br>
	<button type="submit">Sign In</button><br>
</form>
</center>
		
<?php include("views/footer.php"); ?>
