<?php include("start_session.php"); ?>
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
				include("dbTestConnect.php");
				$id = "'".strval($_SESSION['id'])."'";
				$sql = "SELECT userId,fName,lName from user_cool
					WHERE userId = $id";
				$stmt = sqlsrv_query( $conn, $sql);
				if( $stmt === false ) 
				{
				     die( print_r( sqlsrv_errors(), true));
				}
				
				if(sqlsrv_has_rows($stmt))
				{
					$row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC);
					echo ucfirst($row['fName'])." ".ucfirst($row['lName']);
					
				}
				else
				{
					echo "we got a problem";
				}
				
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