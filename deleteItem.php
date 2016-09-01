<?php
	include("start_session.php");
	include("checkLoginStatus.php"); 
	include("dbTestConnect.php");
	include("todo_class.php");
	$id = "'".strval($_SESSION['id'])."'";
	$todo = new todo($id,$conn);
	$itemId = $_POST["itemId"];
	$todo->deleteItem($itemId);
	header("Location: todo.php");	
?>