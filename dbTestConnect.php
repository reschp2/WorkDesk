<?php
	$serverName = "PETERPC\SQLEXPRESS"; //serverName\instanceName
	
	// The connection will be attempted using Windows Authentication.
	$connectionInfo = array( "Database"=>"test");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);
	
	if( !$conn ) 
	{
	     echo "Connection could not be established.<br />";
	     die( print_r( sqlsrv_errors(), true));
	}	
?>