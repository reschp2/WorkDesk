<?php
	include("start_session.php");
	include("checkLoginStatus.php");
	include("dbTestConnect.php");
	include("todo_class.php");
	$todoItem = $_POST['todoitem'];
	$todoItemCategory = $_POST['todoitemcategory'];
	$todoItemType = $_POST['todoitemtype'];
	$todoItem = $todoItem;
	$todoItemCategory = $todoItemCategory;
	$todoItemType = $todoItemType;
	$id = "'".strval($_SESSION['id'])."'";
	$todo = new todo($id,$conn);
	$todo->addItem($todoItem, $todoItemCategory, $todoItemType);
	header("Location: todo.php");
?>
