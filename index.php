<?php
	//check if user is logged in
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
	<input type="text" name="userName" placeholder="USERNAME"><br>
	<input type="text" name="pass" placeholder="PASSWORD"><br>
	<button type="submit">Sign In</button><br>
</form>
</center>
		
<?php include("views/footer.php"); ?>
