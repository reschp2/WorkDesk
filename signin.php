<?php
	session_start();
	include("dbTestConnect.php");
	$userName = $_POST['userName'];
	$pass = $_POST['pass'];
	$userName = "'".strval($userName)."'";
	$pass = "'".strval($pass)."'";
	$sql = "select userId from user_cool
		where userName = $userName and pass = $pass";
	$stmt = sqlsrv_query( $conn, $sql);
	if( $stmt === false ) 
	{
	     die( print_r( sqlsrv_errors(), true));
	}
	
	if(sqlsrv_has_rows($stmt))
	{
		$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
		$_SESSION['id'] = $row['userId'];
		header("Location: home.php");
	}
	else
	{
		header("Location: signup_page.php");
	}		
?>