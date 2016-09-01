<?php
	include("start_session.php");
	include("checkLoginStatus.php");
	include("dbTestConnect.php");
	include("todo_class.php");
	$itemId = $_SESSION['itemId'];
	$todoItem = $_POST['todoitem'];
	$todoItemCategory = $_POST['todoitemcategory'];
	$todoItemType = $_POST['todoitemtype'];
	$todoItem = $todoItem;
	$todoItemCategory = $todoItemCategory;
	$todoItemType = $todoItemType;
	$id = "'".strval($_SESSION['id'])."'";
	$todo = new todo($id,$conn);
	$todo->updateItem($itemId, $todoItem, $todoItemCategory, $todoItemType);
	unset($_SESSION['itemId']);
	header("Location: todo.php");
?>
