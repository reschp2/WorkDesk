<?php
	session_start();
	include("dbTestConnect.php");
	$fName = $_POST['fName'];
	$lName = $_POST['lName'];
	$userName = $_POST['userName'];
	$pass = $_POST['pass'];
	$fName = "'".strval($fName)."'";
	$lName = "'".strval($lName)."'";
	$userName = "'".strval($userName)."'";
	$pass = "'".strval($pass)."'";
	$sql = "insert into user_cool(fName,lName,userName,pass)
		values($fName, $lName, $userName, $pass)";
	$stmt = sqlsrv_query( $conn, $sql);
	if( $stmt === false ) 
	{
	     die( print_r( sqlsrv_errors(), true));
	}
	header("Location: home.php");
?>